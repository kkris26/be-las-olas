<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CacheHelper;
use App\Http\Controllers\Controller;
use App\Models\HomePage;
use App\Services\PostCacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    private const MODULE = 'home-page';

    /**
     * GET /api/home-page?lang=en|id
     *
     * Returns fully localised home page data (cached 300s).
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

        $page = HomePage::first();

        if (! $page) {
            return response()->json(['message' => 'Home page data not found.'], 404);
        }

        $url = fn (?string $path) => $path ? asset('storage/' . $path) : null;

        $stats   = $page->getTranslation('statistics_items', $lang) ?? [];
        $cruises = $page->getTranslation('cruise_services',  $lang) ?? [];
        $lands   = $page->getTranslation('land_services',    $lang) ?? [];

        $responseData = [
            'lang' => $lang,
            'data' => [
                'hero' => [
                    'subheading'       => $page->hero_subheading,
                    'heading'          => $page->hero_heading,
                    'description'      => $page->hero_description,
                    'button_text'      => $page->hero_button_text,
                    'button_link'      => $page->hero_button_link,
                    'mobile_bg_image'  => $url($page->hero_mobile_bg_image),
                    'desktop_bg_image' => $url($page->hero_desktop_bg_image),
                ],
                'highlight' => [
                    'subheading'  => $page->highlight_subheading,
                    'heading'     => $page->highlight_heading,
                    'description' => $page->highlight_description,
                    'button_text' => $page->highlight_button_text,
                    'button_link' => $page->highlight_button_link,
                    'image'       => $url($page->highlight_image),
                ],
                'statistics' => collect($stats)
                    ->map(fn ($item) => [
                        'value'       => $item['value']       ?? null,
                        'heading'     => $item['heading']     ?? '',
                        'has_prefix'  => (bool) ($item['has_prefix'] ?? false),
                        'prefix_text' => $item['prefix_text'] ?? null,
                    ])
                    ->values(),
                'services' => [
                    'cruise' => [
                        'subheading'  => $page->cruise_subheading,
                        'heading'     => $page->cruise_heading,
                        'description' => $page->cruise_short_description,
                        'items'       => collect($cruises)
                            ->map(fn ($item) => [
                                'image'       => $url($item['image'] ?? null),
                                'heading'     => $item['heading']     ?? '',
                                'description' => $item['description'] ?? '',
                                'button_text' => $item['button_text'] ?? '',
                                'button_link' => $item['button_link'] ?? null,
                            ])
                            ->values(),
                    ],
                    'land' => [
                        'subheading'  => $page->land_subheading,
                        'heading'     => $page->land_heading,
                        'description' => $page->land_short_description,
                        'items'       => collect($lands)
                            ->map(fn ($item) => [
                                'image'       => $url($item['image'] ?? null),
                                'heading'     => $item['heading']     ?? '',
                                'description' => $item['description'] ?? '',
                                'button_text' => $item['button_text'] ?? '',
                                'button_link' => $item['button_link'] ?? null,
                            ])
                            ->values(),
                    ],
                ],
                'news' => [
                    'subheading'  => $page->news_subheading,
                    'heading'     => $page->news_heading,
                    'description' => $page->news_short_description,
                    'button_text' => $page->news_button_text,
                    'button_link' => $page->news_button_link,
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
