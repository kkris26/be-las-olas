<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CacheHelper;
use App\Http\Controllers\Controller;
use App\Models\CompanyIdentity;
use App\Services\PostCacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanyIdentityController extends Controller
{
    private const MODULE = 'company-identity';

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

        $identity = CompanyIdentity::first();

        if (! $identity) {
            return response()->json(['message' => 'Company identity data not found.'], 404);
        }

        $responseData = [
            'lang' => $lang,
            'data' => [
                'company_name' => $identity->company_name,
                'tagline'      => $identity->tagline,
                'contacts'     => $identity->getTranslation('contact_items', $lang) ?? [],
                'locations'    => $identity->getTranslation('location_items', $lang) ?? [],
                'socials'      => $identity->social_items ?? [],
            ],
        ];

        CacheHelper::setCache($cacheKey, $responseData, PostCacheService::DEFAULT_TTL);

        return response()->json($responseData);
    }
}
