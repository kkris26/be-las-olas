<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CacheHelper;
use App\Http\Controllers\Controller;
use App\Models\ArticlePost;
use App\Services\PostCacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private const MODULE = 'articles';

    /**
     * GET /api/articles?lang=en|id&page=1&per_page=6
     *
     * Returns paginated list of published article posts (cached 300s).
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
        $posts = ArticlePost::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate($perPage);

        $url = fn (?string $path) => $path ? asset('storage/' . $path) : null;

        $responseData = [
            'lang'       => $lang,
            'pagination' => [
                'total'        => $posts->total(),
                'per_page'     => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'last_page'    => $posts->lastPage(),
            ],
            'data' => $posts->map(fn ($post) => [
                'id'                  => $post->id,
                'title'               => $post->title,
                'slug'                => $post->slug,
                'published_at'        => $post->published_at,
                'featured_image'      => $url($post->use_mobile_image ? $post->featured_image_mobile : $post->featured_image_desktop),
                'description'         => $post->meta_description,
                'reading_time'        => $post->reading_time,
            ])->all(),
        ];

        // ── Cache Write ─────────────────────────────────────────────
        CacheHelper::setCache($cacheKey, $responseData, PostCacheService::DEFAULT_TTL);

        return response()->json($responseData);
    }

    /**
     * GET /api/articles/{slug}?lang=en|id
     *
     * Returns full article post details by slug (cached 300s).
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
        $post = ArticlePost::whereNotNull('published_at')
            ->where(function ($query) use ($slug, $lang, $otherLang) {
                $query->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(slug, ?)) = ?", ['$.' . $lang, $slug])
                      ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(slug, ?)) = ?", ['$.' . $otherLang, $slug]);
            })
            ->first();

        if (!$post) {
            return response()->json(['message' => 'Article post not found.'], 404);
        }

        $url = fn (?string $path) => $path ? asset('storage/' . $path) : null;

        $responseData = [
            'lang' => $lang,
            'data' => [
                'id'                      => $post->id,
                'title'                   => $post->title,
                'slug'                    => $post->getTranslation('slug', $lang),
                'published_at'            => $post->published_at,
                'featured_image_desktop'  => $url($post->featured_image_desktop),
                'featured_image_mobile'   => $url($post->featured_image_mobile),
                'use_mobile_image'        => $post->use_mobile_image,
                'content'                 => $post->content,
                'meta_title'              => $post->meta_title,
                'meta_description'        => $post->meta_description,
                'seo_keywords'            => $post->seo_keywords,
                'reading_time'            => $post->reading_time,
            ],
        ];

        // ── Cache Write ─────────────────────────────────────────────
        CacheHelper::setCache($cacheKey, $responseData, PostCacheService::DEFAULT_TTL);

        return response()->json($responseData);
    }
}
