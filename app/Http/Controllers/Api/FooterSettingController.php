<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CacheHelper;
use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use App\Services\PostCacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FooterSettingController extends Controller
{
    private const MODULE = 'footer-setting';

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

        $footer = FooterSetting::first();

        if (! $footer) {
            return response()->json(['message' => 'Footer setting data not found.'], 404);
        }

        $url = fn (?string $path) => $path ? asset('storage/' . $path) : null;

        $copyright = str_replace(
            ':year',
            date('Y'),
            $footer->footer_copyright_text ?? ''
        );

        $brandLogos = collect($footer->footer_brand_logos ?? [])
            ->map(fn ($item) => [
                'logo_url' => $url($item['logo_image'] ?? null),
            ])
            ->values()
            ->all();

        $responseData = [
            'lang' => $lang,
            'data' => [
                'headings' => [
                    'links'    => $footer->footer_link_heading,
                    'services' => $footer->footer_service_heading,
                    'location' => $footer->footer_location_heading,
                ],
                'services' => $footer->getTranslation('footer_services', $lang) ?? [],
                'branding' => [
                    'left_description' => $footer->footer_left_description,
                    'brand_logos'      => $brandLogos,
                    'copyright'        => $copyright,
                ],
            ],
        ];

        CacheHelper::setCache($cacheKey, $responseData, PostCacheService::DEFAULT_TTL);

        return response()->json($responseData);
    }
}
