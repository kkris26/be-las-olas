<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

use App\Traits\HasImageCleanup;

class ArticlePost extends Model
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
     * Boot the model to auto-generate slug from title.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $locales = ['en', 'id'];
            $slug_data = [];

            foreach ($locales as $locale) {
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
     * Calculate reading time in minutes.
     */
    public function getReadingTimeAttribute(): int
    {
        $wordCount = str_word_count(strip_tags($this->content ?? ''));
        return max(1, ceil($wordCount / 200));
    }
}
