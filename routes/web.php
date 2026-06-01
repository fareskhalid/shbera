<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Dashboard\ProductController;

// Public routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/products/{product}', [PageController::class, 'show'])->name('products.show');
Route::post('/products/{product}/order', [PageController::class, 'order'])->name('products.order');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendContactMessage'])->name('contact.send');
Route::get('/locale/{locale}', [PageController::class, 'setLocale'])->name('locale');

// Auth routes (Breeze)
require __DIR__.'/auth.php';

// Dashboard (protected)
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', fn() => redirect()->route('dashboard.products.index'))->name('home');
    Route::resource('products', ProductController::class);
});
