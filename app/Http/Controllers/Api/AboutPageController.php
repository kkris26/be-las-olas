<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CacheHelper;
use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Services\PostCacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    private const MODULE = 'about-page';

    /**
     * GET /api/about-page?lang=en|id
     *
     * Returns fully localised about page data (cached 300s).
     */
    public function index(Request $request): JsonResponse
    {
        $lang = in_array($request->query('lang'), ['id', 'en'])
            ? $request->query('lang')
            : 'en';

        app()->setLocale($lang);

        $cacheKey = PostCacheService::generateSingleKey(self::MODULE, $lang);

        $cached = CacheHelper::getCache($cacheKey);
        if ($cached !== null) {
            return response()->json($cached);
        }

        $page = AboutPage::first();

        if (! $page) {
            return response()->json(['message' => 'About page data not found.'], 404);
        }

        $url  = fn (?string $path) => $path ? asset('storage/' . $path) : null;
        $items = $page->getTranslation('value_items', $lang) ?? [];

        $responseData = [
            'lang' => $lang,
            'data' => [
                'banner' => [
                    'title' => $page->banner_title,
                    'image' => $url($page->banner_image),
                ],
                'owner' => [
                    'headline' => $page->owner_headline,
                    'message'  => $page->owner_message,
                    'name'     => $page->owner_name,
                    'position' => $page->owner_position,
                    'image'    => $url($page->owner_image),
                ],
                'about' => [
                    'headline'    => $page->about_headline,
                    'description' => $page->about_description,
                ],
                'values' => [
                    'subheading'  => $page->value_subheading,
                    'heading'     => $page->value_heading,
                    'description' => $page->value_description,
                    'image'       => $url($page->value_image),
                    'items'       => collect($items)->map(fn ($item) => [
                        'title'   => $item['title']   ?? '',
                        'content' => $item['content'] ?? '',
                    ])->values(),
                ],
                'collaboration' => [
                    'heading'          => $page->collaboration_heading,
                    'description'      => $page->collaboration_description,
                    'image'            => $url($page->collaboration_image),
                    'video_link'       => $page->collaboration_video_link,
                    'video_target_url' => $page->collaboration_video_target_url,
                ],
                'certified' => [
                    'heading'     => $page->certified_heading,
                    'description' => $page->certified_description,
                    'image'       => $url($page->certified_image),
                    'logos'       => collect($page->certified_logos ?? [])->map(fn ($item) => [
                        'logo_image' => $url($item['logo_image'] ?? null),
                    ])->values(),
                ],
                'team' => [
                    'team_heading'         => $page->team_heading,
                    'team_description'     => $page->team_description,
                ],
                'seo' => [
                    'title'       => $page->seo_title,
                    'description' => $page->seo_description,
                    'keywords'    => $page->seo_keywords,
                    'og_image'    => $url($page->seo_og_image),
                ],
            ],
        ];

        CacheHelper::setCache($cacheKey, $responseData, PostCacheService::DEFAULT_TTL);

        return response()->json($responseData);
    }
}
