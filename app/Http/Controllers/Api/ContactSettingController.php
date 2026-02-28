<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CacheHelper;
use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use App\Services\PostCacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    private const MODULE = 'contact-setting';

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

        $page = ContactSetting::first();

        if (! $page) {
            return response()->json(['message' => 'Contact setting not found.'], 404);
        }

        $url = fn (?string $path) => $path ? asset('storage/' . $path) : null;

        $responseData = [
            'lang' => $lang,
            'data' => [
                'banner' => [
                    'title' => $page->banner_title,
                    'image' => $url($page->banner_image),
                ],
                'header' => [
                    'heading'     => $page->contact_heading,
                    'description' => $page->contact_description,
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
