<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CacheHelper;
use App\Http\Controllers\Controller;
use App\Models\ProfessionalTeamMember;
use App\Services\PostCacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfessionalTeamController extends Controller
{
    private const MODULE = 'professional-team';

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

        $members = ProfessionalTeamMember::orderBy('sort_order')->get()->map(fn ($m) => [
            'id'         => $m->id,
            'name'       => $m->name,
            'role'       => $m->role,
            'image'      => $url($m->image),
            'linkedin'   => $m->linkedin,
            'email'      => $m->email,
            'sort_order' => $m->sort_order,
        ])->all();

        $responseData = [
            'lang' => $lang,
            'data' => $members,
        ];

        CacheHelper::setCache($cacheKey, $responseData, PostCacheService::DEFAULT_TTL);

        return response()->json($responseData);
    }
}
