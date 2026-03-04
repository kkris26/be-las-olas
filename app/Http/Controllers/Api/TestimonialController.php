<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CacheHelper;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Services\PostCacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    private const MODULE = 'testimonials';

    /**
     * Helper Sakti: Ambil konten sesuai request, kalau kosong ambil bahasa sebelah.
     */
    private function getFallbackContent(Testimonial $post, string $field, string $requestedLang)
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

        $testimonials = Testimonial::orderBy('id')->get()->map(fn ($t) => [
            'id'          => $t->id,
            'name'        => $t->name,
            'position'    => $this->getFallbackContent($t, 'position', $lang),
            'testimonial' => $this->getFallbackContent($t, 'testimonial', $lang),
            'image'       => $url($t->image),
        ])->all();

        $responseData = [
            'lang' => $lang,
            'data' => $testimonials,
        ];

        CacheHelper::setCache($cacheKey, $responseData, PostCacheService::DEFAULT_TTL);

        return response()->json($responseData);
    }
}
