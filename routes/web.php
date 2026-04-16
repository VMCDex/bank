<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\SettingController;
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/private', [PageController::class, 'private'])->name('private');
Route::get('/loans', [PageController::class, 'loans'])->name('loans');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail');
Route::get('/deposits', [PageController::class, 'deposits'])->name('deposits');
Route::get('/cards', [PageController::class, 'cards'])->name('cards');
Route::get('/business', [PageController::class, 'business'])->name('business');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::post('/api/applications', [ApplicationController::class, 'store'])->name('applications.store');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});