<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SocialAccountController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/privacy-policy', 'privacy-policy')->name('privacy.policy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/subscription', [SubscriptionController::class, 'index'])->name('subscription.index');
    Route::post('/subscription', [SubscriptionController::class, 'store'])->name('subscription.store');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserManagementController::class);
});

Route::get('/auth/twitter/redirect', [SocialAccountController::class, 'redirectToProvider'])->name('twitter.login');
Route::get('/auth/twitter/callback', [SocialAccountController::class, 'handleProviderCallback']);

require __DIR__.'/auth.php';
