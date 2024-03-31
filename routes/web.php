<?php

use App\Http\Controllers\LabItemCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\LabTestController;
use App\Http\Controllers\LabTestCategoryController;
use App\Http\Controllers\LabItemController;
use App\Http\Controllers\UserController;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/ideas', function(){ return view('pages.ideas'); });
Route::get('/welcome', function () { return view('welcome'); });

Route::middleware('guest')->group(function () {
    Route::get('/login/redirect/google', [
        SocialLoginController::class, 'googleRedirect'
    ])->name('login.google');
    Route::get('/login/callback/google', [
        SocialLoginController::class, 'googleCallback'
    ]);
});

Route::middleware('auth')->prefix('dashboard')->group(function(){
    Route::resource('lab-tests', LabTestController::class, [
        'name' => 'lab-tests'
    ]);
    Route::resource('lab-test-categories', LabTestCategoryController::class, [
        'name' => 'lab-test-categories'
    ]);

    Route::resource('lab-items', LabItemController::class, [
        'name' => 'lab-items',
    ]);
    Route::resource('lab-item-categories', LabItemCategoryController::class, [
        'name' => 'lab-item-categories',
    ]);

    Route::resource('users', UserController::class, [
        'name' => 'users',
    ]);

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
});
