<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CacheHelper;
use App\Http\Controllers\Controller;
use App\Models\TestimonialSetting;
use App\Services\PostCacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestimonialSettingController extends Controller
{
    private const MODULE = 'testimonial-setting';

    public function index(Request $request): JsonResponse
    {
        $lang = in_array($request->query('lang'), ['id', 'en']) ? $request->query('lang') : 'en';
        app()->setLocale($lang);

        $cacheKey = PostCacheService::generateSingleKey(self::MODULE, $lang);

        $cached = CacheHelper::getCache($cacheKey);
        if ($cached !== null) {
            return response()->json($cached);
        }

        $setting = TestimonialSetting::first();

        if (! $setting) {
            return response()->json(['message' => 'Testimonial setting not found.'], 404);
        }

        $responseData = [
            'lang' => $lang,
            'data' => [
                'heading'     => $setting->testimonial_heading,
                'description' => $setting->testimonial_description,
                'button_text' => $setting->testimonial_button_text,
            ],
        ];

        CacheHelper::setCache($cacheKey, $responseData, PostCacheService::DEFAULT_TTL);

        return response()->json($responseData);
    }
}
