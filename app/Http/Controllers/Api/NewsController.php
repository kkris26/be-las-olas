<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CacheHelper;
use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use App\Services\PostCacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private const MODULE = 'news';

    /**
     * Helper Sakti: Ambil konten sesuai request, kalau kosong ambil bahasa sebelah.
     */
    private function getFallbackContent(NewsPost $post, string $field, string $requestedLang)
    {
        // 1. Coba ambil bahasa yang diminta
        $content = $post->getTranslation($field, $requestedLang, false);

        // 2. Jika kosong, cari bahasa alternatif (ID <-> EN)
        if (empty($content)) {
            $fallbackLang = ($requestedLang === 'id') ? 'en' : 'id';
            return $post->getTranslation($field, $fallbackLang, false);
        }

        return $content;
    }

    /**
     * GET /api/news?lang=en|id&page=1&per_page=6
     *
     * Returns paginated list of published news posts (cached 300s).
     */
    public function index(Request $request): JsonResponse
    {
        $lang = in_array($request->query('lang'), ['id', 'en'])
            ? $request->query('lang')
            : 'en';

        app()->setLocale($lang);

        $perPage = intval($request->query('per_page', 6));
        $perPage = min($perPage, 12);
        $page    = intval($request->query('page', 1));

        $cacheKey = PostCacheService::generateListKey(self::MODULE, $lang, $page, $perPage);

        // ── Cache Read ──────────────────────────────────────────────
        $cached = CacheHelper::getCache($cacheKey);
        if ($cached !== null) {
            return response()->json($cached);
        }

        // ── Database Query ──────────────────────────────────────────
        $posts = NewsPost::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate($perPage);

        $url = fn (?string $path) => !$path
            ? null
            : (str_starts_with($path, 'http') ? $path : asset('storage/' . $path));

        $responseData = [
            'lang'       => $lang,
            'pagination' => [
                'total'        => $posts->total(),
                'per_page'     => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'last_page'    => $posts->lastPage(),
            ],
            'data' => $posts->map(fn ($post) => [
                'id'             => $post->id,
                'title'          => $this->getFallbackContent($post, 'title', $lang),
                'slug'           => $this->getFallbackContent($post, 'slug', $lang),
                'published_at'   => $post->published_at,
                'featured_image' => $url($post->use_mobile_image ? $post->featured_image_mobile : $post->featured_image_desktop),
                'description'    => $this->getFallbackContent($post, 'meta_description', $lang),
                'reading_time'   => $post->reading_time,
            ])->all(),
        ];

        // ── Cache Write ─────────────────────────────────────────────
        CacheHelper::setCache($cacheKey, $responseData, PostCacheService::DEFAULT_TTL);

        return response()->json($responseData);
    }

    /**
     * GET /api/news/{slug}?lang=en|id
     *
     * Returns full news post details by slug (cached 300s).
     */
    public function show(string $slug, Request $request): JsonResponse
    {
        $lang = in_array($request->query('lang'), ['id', 'en'])
            ? $request->query('lang')
            : 'en';

        app()->setLocale($lang);
        $otherLang = $lang === 'id' ? 'en' : 'id';

        $cacheKey = PostCacheService::generateSlugKey(self::MODULE, $slug, $lang);

        // ── Cache Read ──────────────────────────────────────────────
        $cached = CacheHelper::getCache($cacheKey);
        if ($cached !== null) {
            return response()->json($cached);
        }

        // ── Optimized Database Query ────────────────────────────────
        $post = NewsPost::whereNotNull('published_at')
            ->where(function ($query) use ($slug, $lang, $otherLang) {
                $query->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(slug, ?)) = ?", ['$.' . $lang, $slug])
                      ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(slug, ?)) = ?", ['$.' . $otherLang, $slug]);
            })
            ->first();

        if (!$post) {
            return response()->json(['message' => 'News post not found.'], 404);
        }

        $url = fn (?string $path) => !$path
            ? null
            : (str_starts_with($path, 'http') ? $path : asset('storage/' . $path));

        $responseData = [
            'lang' => $lang,
            'fallback_used' => false,
            'data' => [
                'id'                      => $post->id,
                'title'                   => $this->getFallbackContent($post, 'title', $lang),
                'slug'                    => $this->getFallbackContent($post, 'slug', $lang),
                'published_at'            => $post->published_at,
                'featured_image_desktop'  => $url($post->featured_image_desktop),
                'featured_image_mobile'   => $url($post->featured_image_mobile),
                'use_mobile_image'        => $post->use_mobile_image,
                'content'                 => $this->getFallbackContent($post, 'content', $lang),
                'meta_title'              => $this->getFallbackContent($post, 'meta_title', $lang),
                'meta_description'        => $this->getFallbackContent($post, 'meta_description', $lang),
                'seo_keywords'            => $this->getFallbackContent($post, 'seo_keywords', $lang),
                'reading_time'            => $post->reading_time,
            ],
        ];

        // ── Cache Write ─────────────────────────────────────────────
        CacheHelper::setCache($cacheKey, $responseData, PostCacheService::DEFAULT_TTL);

        return response()->json($responseData);
    }
}
