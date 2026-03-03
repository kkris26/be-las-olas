<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CacheHelper;
use App\Http\Controllers\Controller;
use App\Models\CruiseService;
use App\Services\PostCacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CruiseServiceController extends Controller
{
    private const MODULE = 'cruise-services';

    public function index(Request $request): JsonResponse
    {
        $lang = in_array($request->query('lang'), ['id', 'en']) ? $request->query('lang') : 'en';
        app()->setLocale($lang);

        $cacheKey = PostCacheService::generateSingleKey(self::MODULE, $lang);

        $cached = CacheHelper::getCache($cacheKey);
        if ($cached !== null) {
            return response()->json($cached);
        }

        $url = fn (?string $path) => $path ? asset('storage/' . $path) : null;

        $services = CruiseService::orderBy('sort_order')->get()->map(fn ($s) => [
            'id'          => $s->id,
            'image'       => $url($s->image),
            'heading'     => $s->heading,
            'description' => $s->description,
            'button_text' => $s->button_text,
            'button_link' => $s->button_link,
            'sort_order'  => $s->sort_order,
        ])->all();

        $responseData = [
            'lang' => $lang,
            'data' => $services,
        ];

        CacheHelper::setCache($cacheKey, $responseData, PostCacheService::DEFAULT_TTL);

        return response()->json($responseData);
    }
}
