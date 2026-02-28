<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CacheHelper;
use App\Http\Controllers\Controller;
use App\Models\FocusSetting;
use App\Services\PostCacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FocusSettingController extends Controller
{
    private const MODULE = 'focus-setting';

    public function index(Request $request): JsonResponse
    {
        $lang = in_array($request->query('lang'), ['id', 'en']) ? $request->query('lang') : 'en';
        app()->setLocale($lang);

        $cacheKey = PostCacheService::generateSingleKey(self::MODULE, $lang);

        $cached = CacheHelper::getCache($cacheKey);
        if ($cached !== null) {
            return response()->json($cached);
        }

        $setting = FocusSetting::first();

        if (! $setting) {
            return response()->json(['message' => 'Focus setting not found.'], 404);
        }

        $url = fn (?string $path) => $path ? asset('storage/' . $path) : null;

        $items = $setting->getTranslation('focus_items', $lang) ?? [];

        $responseData = [
            'lang' => $lang,
            'data' => [
                'heading'            => $setting->focus_heading,
                'description'        => $setting->focus_description,
                'items'              => $items,
                'bg_desktop'         => $url($setting->focus_bg_desktop),
                'use_mobile_bg'      => (bool) $setting->use_focus_bg_mobile,
                'bg_mobile'          => $url($setting->focus_bg_mobile),
            ],
        ];

        CacheHelper::setCache($cacheKey, $responseData, PostCacheService::DEFAULT_TTL);

        return response()->json($responseData);
    }
}
