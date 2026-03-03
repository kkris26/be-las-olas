<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasImageCleanup
{
    /**
     * Boot the trait and register model events.
     */
    protected static function bootHasImageCleanup(): void
    {
        static::saving(function ($model) {
            $model->optimizeHtmlImages();
        });

        static::updating(function ($model) {
            $model->cleanupOldImages();
        });

        static::deleted(function ($model) {
            $model->cleanupAllImages();
        });
    }

    /**
     * Scan HTML content and optimize local images (convert to WebP).
     */
    public function optimizeHtmlImages(): void
    {
        foreach ($this->getDirty() as $attribute => $value) {
            // We optimize anything that looks like HTML or is an array containing HTML
            if ($this->isAttributeTranslatable($attribute)) {
                $translations = $this->getTranslations($attribute);
                $updated = false;

                foreach ($translations as $locale => $html) {
                    $newHtml = $this->recursiveOptimizeHtml($html);
                    if ($newHtml !== $html) {
                        $translations[$locale] = $newHtml;
                        $updated = true;
                    }
                }

                if ($updated) {
                    $this->setTranslations($attribute, $translations);
                }
            } else {
                $newValue = $this->recursiveOptimizeHtml($value);
                if ($newValue !== $value) {
                    $this->setAttribute($attribute, $newValue);
                }
            }
        }
    }

    /**
     * Recursively scan strings or arrays for HTML image paths and optimize them.
     */
    protected function recursiveOptimizeHtml($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $this->recursiveOptimizeHtml($value);
            }
            return $data;
        }

        if (is_string($data) && (str_contains($data, '<img') || str_contains($data, 'storage/'))) {
            return $this->processHtmlOptimization($data);
        }

        return $data;
    }

    /**
     * Helper to regex-replace paths and optimize files in HTML strings.
     */
    protected function processHtmlOptimization(string $html): string
    {
        $pattern = '/(?<=\/storage\/|storage\/)([^\s"\'>]+\.(?:jpe?g|png|gif|bmp|tiff))/i';
        preg_match_all($pattern, $html, $matches);
        $paths = array_unique($matches[1] ?? []);

        foreach ($paths as $path) {
            if (str_ends_with(strtolower($path), '.webp')) continue;

            $fullPath = storage_path('app/public/' . $path);
            if (!file_exists($fullPath)) continue;

            $dir = dirname($path);
            $newPath = \App\Services\ImageService::optimizeLocalFile($fullPath, $dir);

            if ($newPath && $newPath !== $path) {
                $html = str_replace($path, $newPath, $html);
                
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }

        return $html;
    }

    /**
     * Delete images that are being replaced or removed.
     */
    public function cleanupOldImages(): void
    {
        foreach ($this->getDirty() as $attribute => $value) {
            $oldData = $this->getOriginal($attribute);
            $newData = $this->getAttribute($attribute);

            // 1. Extract paths from both old and new (using both simple and HTML extractors)
            $oldPaths = array_unique(array_merge(
                $this->extractPaths($oldData),
                $this->extractPathsFromHtmlFields($oldData)
            ));

            $newPaths = array_unique(array_merge(
                $this->extractPaths($newData),
                $this->extractPathsFromHtmlFields($newData)
            ));

            // 2. Delete paths that no longer exist in the new data
            $deletedPaths = array_diff($oldPaths, $newPaths);
            foreach ($deletedPaths as $path) {
                $this->deleteFile($path);
            }
        }
    }

    /**
     * Delete all images associated with the model.
     */
    public function cleanupAllImages(): void
    {
        foreach ($this->getAttributes() as $attribute => $value) {
            $data = $this->getOriginal($attribute);
            
            $paths = array_unique(array_merge(
                $this->extractPaths($data),
                $this->extractPathsFromHtmlFields($data)
            ));

            foreach ($paths as $path) {
                $this->deleteFile($path);
            }
        }
    }

    /**
     * Extract storage paths from HTML data (string or recursive array).
     */
    protected function extractPathsFromHtmlFields($data): array
    {
        if (empty($data)) return [];

        if (is_array($data)) {
            $paths = [];
            foreach ($data as $value) {
                $paths = array_merge($paths, $this->extractPathsFromHtmlFields($value));
            }
            return array_unique($paths);
        }

        if (is_string($data)) {
            // Check if it's JSON (translatable or repeater)
            $decoded = json_decode($data, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return $this->extractPathsFromHtmlFields($decoded);
            }
            
            return $this->extractPathsFromHtml($data);
        }

        return [];
    }

    /**
     * Extract storage paths from HTML content.
     */
    protected function extractPathsFromHtml(?string $html): array
    {
        if (empty($html)) return [];

        $pattern = '/(?<=\/storage\/|storage\/)([^\s"\'>]+\.(?:jpe?g|png|webp|gif|bmp|tiff))/i';
        preg_match_all($pattern, $html, $matches);
        
        return array_unique($matches[1] ?? []);
    }

    /**
     * Helper to extract file paths from value (string or json array).
     */
    protected function extractPaths($value): array
    {
        if (empty($value)) return [];

        if (is_string($value)) {
            // Check if it's JSON (translatable or repeater)
            $decoded = json_decode($value, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return $this->extractPathsFromArray($decoded);
            }

            // Fix: ignore HTML content or long text which are mistakenly treated as paths
            if (str_contains($value, '<') || str_contains($value, '>') || strlen($value) > 500) {
                return [];
            }

            return [$value];
        }

        if (is_array($value)) {
            return $this->extractPathsFromArray($value);
        }

        return [];
    }

    /**
     * Recursively find potential paths in an array/object.
     */
    protected function extractPathsFromArray(array $array): array
    {
        $paths = [];
        foreach ($array as $item) {
            if (is_array($item)) {
                $paths = array_merge($paths, $this->extractPathsFromArray($item));
            } elseif (is_string($item)) {
                // Ignore strings that look like HTML or are too long to be paths
                if (str_contains($item, '<') || str_contains($item, '>') || strlen($item) > 500 || str_contains($item, ' ')) {
                    continue;
                }
                
                if (str_contains($item, '/') || str_ends_with($item, '.webp') || str_ends_with($item, '.png')) {
                    $paths[] = $item;
                }
            }
        }
        return array_unique($paths);
    }

    /**
     * Verify if an attribute is translatable.
     */
    protected function isAttributeTranslatable(string $key): bool
    {
        return property_exists($this, 'translatable') && 
               is_array($this->translatable) && 
               in_array($key, $this->translatable);
    }

    /**
     * Physically delete the file from the public disk.
     */
    protected function deleteFile(?string $path): void
    {
        if (!$path) return;

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
