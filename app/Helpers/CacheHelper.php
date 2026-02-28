<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;

class CacheHelper
{
    /**
     * Default TTL in seconds (5 minutes).
     */
    public const DEFAULT_TTL = 300;

    /**
     * Retrieve and JSON-decode cached data.
     */
    public static function getCache(string $key): mixed
    {
        $raw = Cache::get($key);

        if ($raw === null) {
            return null;
        }

        return json_decode($raw, true);
    }

    /**
     * JSON-serialize data and store it in the cache with a TTL.
     */
    public static function setCache(string $key, mixed $data, int $ttl = self::DEFAULT_TTL): void
    {
        Cache::put($key, json_encode($data), $ttl);
    }

    /**
     * Remove a specific key from the cache.
     */
    public static function deleteCache(string $key): void
    {
        Cache::forget($key);
    }
}
