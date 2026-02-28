<?php

namespace App\Services;

use App\Helpers\CacheHelper;
use Illuminate\Database\Eloquent\Model;

/**
 * Unified cache service for all post-type content (news, articles, onboarding).
 *
 * Centralizes versioned cache key generation and targeted invalidation.
 * Modules are identified by a string prefix (e.g., 'news', 'articles', 'onboarding').
 */
class PostCacheService
{
    // ─── Constants ────────────────────────────────────────────────────────────

    /**
     * Cache key version prefix.
     * Bump this when the API response structure changes.
     */
    public const CACHE_VERSION = 'v1';

    /**
     * Default cache TTL in seconds (5 minutes).
     */
    public const DEFAULT_TTL = 300;

    /**
     * Supported locales for cache key generation and invalidation.
     */
    public const LOCALES = ['en', 'id'];

    // ─── Key Generators ──────────────────────────────────────────────────────

    /**
     * Generate a cache key for a paginated list.
     *
     * Format: v1:{module}:lang:{lang}:page:{page}:per:{perPage}
     */
    public static function generateListKey(string $module, string $lang, int $page, int $perPage): string
    {
        return self::CACHE_VERSION . ":{$module}:lang:{$lang}:page:{$page}:per:{$perPage}";
    }

    /**
     * Generate a cache key for a single post by slug.
     *
     * Format: v1:{module}:slug:{slug}:lang:{lang}
     */
    public static function generateSlugKey(string $module, string $slug, string $lang): string
    {
        return self::CACHE_VERSION . ":{$module}:slug:{$slug}:lang:{$lang}";
    }

    /**
     * Generate a cache key for a singleton/settings endpoint.
     *
     * Format: v1:{module}:lang:{lang}
     */
    public static function generateSingleKey(string $module, string $lang): string
    {
        return self::CACHE_VERSION . ":{$module}:lang:{$lang}";
    }

    // ─── Invalidation Methods ────────────────────────────────────────────────

    /**
     * Invalidate all locale variants of a singleton/settings cache.
     */
    public static function invalidateSingle(string $module): void
    {
        foreach (self::LOCALES as $locale) {
            CacheHelper::deleteCache(self::generateSingleKey($module, $locale));
        }
    }

    /**
     * Invalidate all locale variants of a slug cache for a given module.
     */
    public static function invalidateSlug(string $module, string $slug): void
    {
        foreach (self::LOCALES as $locale) {
            CacheHelper::deleteCache(self::generateSlugKey($module, $slug, $locale));
        }
    }

    /**
     * Invalidate list caches for a specific page across all locales and per_page values.
     */
    public static function invalidateListPage(string $module, int $page = 1): void
    {
        $allowedPerPage = config('cache_posts.allowed_per_page', [6, 12]);

        foreach (self::LOCALES as $locale) {
            foreach ($allowedPerPage as $perPage) {
                CacheHelper::deleteCache(self::generateListKey($module, $locale, $page, $perPage));
            }
        }
    }

    /**
     * Full invalidation for a post: slugs (old + new) and page 1 lists.
     *
     * Works with any Spatie Translatable model (NewsPost, ArticlePost, OnboardingPost).
     */
    public static function invalidateAllForPost(
        string $module,
        Model $post,
        ?string $oldSlugEn = null,
        ?string $oldSlugId = null,
    ): void {
        // Invalidate old slugs if provided
        if ($oldSlugEn) {
            self::invalidateSlug($module, $oldSlugEn);
        }
        if ($oldSlugId) {
            self::invalidateSlug($module, $oldSlugId);
        }

        // Invalidate current slugs
        $currentSlugEn = $post->getTranslation('slug', 'en', false);
        $currentSlugId = $post->getTranslation('slug', 'id', false);

        if ($currentSlugEn && $currentSlugEn !== $oldSlugEn) {
            self::invalidateSlug($module, $currentSlugEn);
        }
        if ($currentSlugId && $currentSlugId !== $oldSlugId) {
            self::invalidateSlug($module, $currentSlugId);
        }

        // Invalidate page 1 lists
        self::invalidateListPage($module, 1);
    }
}
