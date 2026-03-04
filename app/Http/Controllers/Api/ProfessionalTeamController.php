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

    /**
     * Helper Sakti: Ambil konten sesuai request, kalau kosong ambil bahasa sebelah.
     */
    private function getFallbackContent(ProfessionalTeamMember $post, string $field, string $requestedLang)
    {
        $content = $post->getTranslation($field, $requestedLang, false);
        if (empty($content)) {
            $fallbackLang = ($requestedLang === 'id') ? 'en' : 'id';
            return $post->getTranslation($field, $fallbackLang, false);
        }
        return $content;
    }

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
            'role'       => $this->getFallbackContent($m, 'role', $lang),
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
