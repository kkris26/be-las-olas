<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Allowed per_page values for post API pagination
    |--------------------------------------------------------------------------
    |
    | Used for validating API requests and for cache invalidation loops.
    | Applies to news, articles, and onboarding endpoints.
    |
    */
    'allowed_per_page' => [6, 12],
];
