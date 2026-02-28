<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CacheHelper;
use App\Http\Controllers\Controller;
use App\Models\PartnerSetting;
use App\Services\PostCacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PartnerSettingController extends Controller
{
    private const MODULE = 'partner-setting';

    public function index(Request $request): JsonResponse
    {
        $lang = in_array($request->query('lang'), ['id', 'en']) ? $request->query('lang') : 'en';
        app()->setLocale($lang);

        $cacheKey = PostCacheService::generateSingleKey(self::MODULE, $lang);

        $cached = CacheHelper::getCache($cacheKey);
        if ($cached !== null) {
            return response()->json($cached);
        }

        $setting = PartnerSetting::first();

        if (! $setting) {
            return response()->json(['message' => 'Partner setting not found.'], 404);
        }

        $url = fn (?string $path) => $path ? asset('storage/' . $path) : null;

        $logos = collect($setting->partner_logos ?? [])->map(fn ($logo) => [
            'logo_image' => isset($logo['logo_image']) ? $url($logo['logo_image']) : null,
        ])->values()->all();

        $responseData = [
            'lang' => $lang,
            'data' => [
                'heading'     => $setting->partner_heading,
                'description' => $setting->partner_description,
                'logos'       => $logos,
            ],
        ];

        CacheHelper::setCache($cacheKey, $responseData, PostCacheService::DEFAULT_TTL);

        return response()->json($responseData);
    }
}
