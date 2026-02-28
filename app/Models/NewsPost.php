<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

use App\Traits\HasImageCleanup;

class NewsPost extends Model
{
    use HasFactory, HasTranslations, HasImageCleanup;

    protected $guarded = [];

    public $translatable = [
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        'seo_keywords',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'use_mobile_image' => 'boolean',
    ];

    /**
     * Boot the model to auto-generate slug from title if not provided.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $locales = ['en', 'id'];
            $slug_data = [];

            foreach ($locales as $locale) {
                // get the raw translation without fallback
                $title = $model->getTranslation('title', $locale, false);
                $slug = $model->getTranslation('slug', $locale, false);

                if (empty($slug) && $title) {
                    $slug_data[$locale] = Str::slug($title);
                } elseif (!empty($slug)) {
                    $slug_data[$locale] = Str::slug($slug);
                }
            }

            if (!empty($slug_data)) {
                $model->setTranslations('slug', array_merge($model->getTranslations('slug'), $slug_data));
            }
        });
    }

    /**
     * Get reading time in minutes based on word count.
     * Assumes ~200 words per minute.
     */
    public function getReadingTimeAttribute(): int
    {
        $lang = app()->getLocale();
        $content = $this->getTranslation('content', $lang) ?? '';
        $wordCount = str_word_count(strip_tags($content));
        return max(1, ceil($wordCount / 200));
    }
}
