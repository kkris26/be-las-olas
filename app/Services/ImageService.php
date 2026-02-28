<?php

namespace App\Services;

use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ImageService
{
    /**
     * Memory limit to apply during image processing.
     * Override via env IMAGE_MEMORY_LIMIT (e.g. "512M").
     */
    protected static string $memoryLimit = '256M';

    /**
     * Temporarily raise PHP memory limit for image processing,
     * then restore the original value afterwards.
     */
    protected static function withMemoryLimit(callable $callback): mixed
    {
        $limit = env('IMAGE_MEMORY_LIMIT', static::$memoryLimit);
        $original = ini_get('memory_limit');

        // Only raise, never lower the limit
        $originalBytes = self::parseMemory($original);
        $limitBytes    = self::parseMemory($limit);

        if ($limitBytes > $originalBytes) {
            ini_set('memory_limit', $limit);
        }

        try {
            return $callback();
        } finally {
            if ($limitBytes > $originalBytes) {
                ini_set('memory_limit', $original);
            }
        }
    }

    /**
     * Convert PHP memory shorthand (e.g. "128M", "1G") to bytes.
     */
    protected static function parseMemory(string $value): int
    {
        $value = trim($value);
        $last  = strtolower($value[strlen($value) - 1]);
        $num   = (int) $value;

        return match ($last) {
            'g' => $num * 1024 * 1024 * 1024,
            'm' => $num * 1024 * 1024,
            'k' => $num * 1024,
            default => $num,
        };
    }

    /**
     * Convert an uploaded file to WebP and store it in the public disk.
     *
     * @param  \Livewire\Features\SupportFileUploads\TemporaryUploadedFile  $file
     * @param  string  $directory  e.g. 'home/hero'
     * @param  int  $quality  WebP quality (1-100)
     * @return string  The path relative to the public disk (e.g. 'home/hero/uuid.webp')
     */
    public static function storeAsWebp($file, string $directory, int $quality = 75): string
    {
        $filename = Str::uuid() . '.webp';
        $path = $directory . '/' . $filename;
        $fullPath = storage_path('app/public/' . $path);

        // Ensure the target directory exists
        $dirPath = dirname($fullPath);
        if (!is_dir($dirPath)) {
            mkdir($dirPath, 0755, true);
        }

        static::withMemoryLimit(function () use ($file, $fullPath, $quality): void {
            $image = Image::read($file->getRealPath())
                ->scaleDown(width: 1600, height: 1600)
                ->toWebp($quality);

            $image->save($fullPath);
        });

        return $path;
    }

    /**
     * Convert an image from a URL or local path to WebP and store it.
     */
    public static function storeFromPathAsWebp(string $sourcePath, string $directory, string $filename = null, int $quality = 75): string
    {
        $filename = ($filename ?? Str::uuid()) . '.webp';
        $path = $directory . '/' . $filename;
        $fullPath = storage_path('app/public/' . $path);

        $dirPath = dirname($fullPath);
        if (!is_dir($dirPath)) {
            mkdir($dirPath, 0755, true);
        }

        static::withMemoryLimit(function () use ($sourcePath, $fullPath, $quality): void {
            Image::read($sourcePath)
             ->scaleDown(width: 1600, height: 1600)
                ->toWebp($quality)
                ->save($fullPath);
        });

        return $path;
    }
    /**
     * Optimize an existing local file (e.g. from RichEditor) and convert to WebP.
     *
     * @param  string  $fullPath  Absolute path to the source file
     * @param  string  $directory  Target directory relative to public disk
     * @return string|null  The new relative path if successful
     */
    public static function optimizeLocalFile(string $fullPath, string $directory): ?string
    {
        if (!file_exists($fullPath)) return null;

        $filename = Str::uuid() . '.webp';
        $relativeNewPath = $directory . '/' . $filename;
        $fullNewPath = storage_path('app/public/' . $relativeNewPath);

        static::withMemoryLimit(function () use ($fullPath, $fullNewPath): void {
            Image::read($fullPath)
                ->scaleDown(width: 1400, height: 1400)
                ->toWebp(75)
                ->save($fullNewPath);
        });

        return $relativeNewPath;
    }
}
