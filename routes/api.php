<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('throttle:api')->group(function () {
    Route::get('/home-page',  [App\Http\Controllers\Api\HomePageController::class,  'index']);
    Route::get('/about-page', [App\Http\Controllers\Api\AboutPageController::class, 'index']);

    // Page Settings
    Route::get('/onboarding-setting', [App\Http\Controllers\Api\OnboardingSettingController::class, 'index']);
    Route::get('/article-setting',    [App\Http\Controllers\Api\ArticleSettingController::class,    'index']);
    Route::get('/news-setting',       [App\Http\Controllers\Api\NewsSettingController::class,       'index']);
    Route::get('/contact-setting',    [App\Http\Controllers\Api\ContactSettingController::class,    'index']);

    // Global Settings
    Route::get('/company-identity', [App\Http\Controllers\Api\CompanyIdentityController::class, 'index']);
    Route::get('/footer-setting',   [App\Http\Controllers\Api\FooterSettingController::class,   'index']);

    // News Content
    Route::get('/news',       [App\Http\Controllers\Api\NewsController::class, 'index']);
    Route::get('/news/{slug}', [App\Http\Controllers\Api\NewsController::class, 'show']);

    // Onboarding Content
    Route::get('/onboarding',       [App\Http\Controllers\Api\OnboardingController::class, 'index']);
    Route::get('/onboarding/{slug}', [App\Http\Controllers\Api\OnboardingController::class, 'show']);

    // Articles Content
    Route::get('/articles',       [App\Http\Controllers\Api\ArticleController::class, 'index']);
    Route::get('/articles/{slug}', [App\Http\Controllers\Api\ArticleController::class, 'show']);

    // ── Section Settings (separated) ──────────────────────────────────────────────
    Route::get('/focus-setting',        [App\Http\Controllers\Api\FocusSettingController::class,       'index']);
    Route::get('/partner-setting',      [App\Http\Controllers\Api\PartnerSettingController::class,     'index']);
    Route::get('/testimonial-setting',  [App\Http\Controllers\Api\TestimonialSettingController::class, 'index']);

    // ── Testimonials List ─────────────────────────────────────────────────────────
    Route::get('/testimonials', [App\Http\Controllers\Api\TestimonialController::class, 'index']);

    // ── Team (separated) ──────────────────────────────────────────────────────────
    Route::get('/board-members',     [App\Http\Controllers\Api\BoardMemberController::class,       'index']);
    Route::get('/professional-team', [App\Http\Controllers\Api\ProfessionalTeamController::class,  'index']);

    // ── Service Lists ─────────────────────────────────────────────────────────────
    Route::get('/cruise-services', [App\Http\Controllers\Api\CruiseServiceController::class, 'index']);
    Route::get('/land-services',   [App\Http\Controllers\Api\LandServiceController::class,   'index']);
});
