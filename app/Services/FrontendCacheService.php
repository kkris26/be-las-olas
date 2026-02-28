<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FrontendCacheService
{
    /**
     * Revalidate home page cache on the frontend
     */
    public static function revalidateHomePage(): bool
    {
        try {
            $frontendUrl = config('services.frontend.url') ?? 'http://localhost:3000';
            $secret = config('services.frontend.revalidate_secret') ?? 'your-secret-key';

            $response = Http::withHeaders([
                'X-Revalidate-Secret' => $secret,
                'Content-Type' => 'application/json',
            ])->post("{$frontendUrl}/api/revalidate/home-page");

            return $response->successful();
        } catch (\Exception $e) {
            \Log::error('Frontend cache revalidation failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Revalidate multiple cache tags
     */
    public static function revalidate(string $endpoint): bool
    {
        try {
            $frontendUrl = config('services.frontend.url') ?? 'http://localhost:3000';
            $secret = config('services.frontend.revalidate_secret') ?? 'your-secret-key';

            $response = Http::withHeaders([
                'X-Revalidate-Secret' => $secret,
                'Content-Type' => 'application/json',
            ])->post("{$frontendUrl}/api/revalidate/{$endpoint}");

            return $response->successful();
        } catch (\Exception $e) {
            \Log::error("Frontend cache revalidation failed for {$endpoint}: " . $e->getMessage());
            return false;
        }
    }
}
