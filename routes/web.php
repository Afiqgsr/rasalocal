<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;


Route::view('/', 'welcome');
Route::get('/menu/search', [MenuController::class, 'search'])->name('menu.search');
Route::post('/cart/checkout', [CartController::class, 'checkout']);

Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


// Route untuk halaman CRUD
Route::get('/crud', [MenuController::class, 'crudIndex'])->name('crud.index');
Route::get('/crud/create', [MenuController::class, 'crudCreate'])->name('crud.create');
Route::post('/crud', [MenuController::class, 'crudStore'])->name('crud.store');
Route::get('/crud/{menu}/edit', [MenuController::class, 'crudEdit'])->name('crud.edit');
Route::put('/crud/{menu}', [MenuController::class, 'crudUpdate'])->name('crud.update');
Route::delete('/crud/{menu}', [MenuController::class, 'crudDestroy'])->name('crud.destroy');




// Menggunakan MenuController untuk route /menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');


Route::middleware(['auth'])->group(function () {
    Route::post('/cart/checkout', [CartController::class, 'checkout']);
    Route::get('/cart', [CartController::class, 'getCart']);
    Route::post('/cart/remove', [CartController::class, 'removeFromCart']);
});

Route::middleware(['web'])->group(function () {
    Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('login.google.callback');
    Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
});


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

require __DIR__.'/auth.php';
