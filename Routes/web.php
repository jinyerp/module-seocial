<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/**
 * 소셜 로그인
 */
Route::get('/login/{provider}', [
    \Modules\Social\Http\Controllers\OAuthRedirect::class,
    'index'
])->name('oauth-redirect')->middleware(['web']);


Route::get('/login/{provider}/callback', [
    \Modules\Social\Http\Controllers\OAuthController::class,
    'callback'])->middleware(['web']);






// admin prefix 모듈 검사
// admin 모듈에 선언됨
if(function_exists('admin_prefix')) {
    $prefix = admin_prefix();
} else {
    $prefix = "admin";
}


## 인증 Admin
use Modules\Social\Http\Controllers\AdminOAuthController;
use Modules\Social\Http\Controllers\AdminOAuthProviderController;
use Modules\Social\Http\Controllers\Dashboard;

Route::middleware(['web','auth:sanctum', 'verified', 'admin'])
->name('admin.auth')
->prefix($prefix.'/auth')->group(function () {

    // 소셜로그인
    Route::resource('oauth',AdminOAuthController::class);
    Route::resource('provider',AdminOAuthProviderController::class);
});

// Alias 라우터
Route::middleware(['web','auth:sanctum', 'verified', 'admin'])
->name('admin.auth')
->prefix($prefix.'/module/social')->group(function () {

    // 사이트 데쉬보드
    Route::get('/', [Dashboard::class, "index"]);

    // 소셜로그인
    Route::resource('oauth',AdminOAuthController::class);
    Route::resource('provider',AdminOAuthProviderController::class);
});

