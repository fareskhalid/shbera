<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Dashboard\ProductController;

// Public routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/locale/{locale}', [PageController::class, 'setLocale'])->name('locale');

// Auth routes (Breeze)
require __DIR__.'/auth.php';

// Dashboard (protected)
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', fn() => redirect()->route('dashboard.products.index'))->name('home');
    Route::resource('products', ProductController::class);
});
