<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;


Route::view('/', 'welcome');
Route::get('/menu/search', [MenuController::class, 'search'])->name('menu.search');

// Route untuk halaman CRUD
Route::get('/crud', [MenuController::class, 'crudIndex'])->name('crud.index');
Route::get('/crud/create', [MenuController::class, 'crudCreate'])->name('crud.create');
Route::post('/crud', [MenuController::class, 'crudStore'])->name('crud.store');
Route::get('/crud/{menu}/edit', [MenuController::class, 'crudEdit'])->name('crud.edit');
Route::put('/crud/{menu}', [MenuController::class, 'crudUpdate'])->name('crud.update');
Route::delete('/crud/{menu}', [MenuController::class, 'crudDestroy'])->name('crud.destroy');

// Menggunakan MenuController untuk route /menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

// Middleware auth untuk akses ke cart dan checkout
Route::middleware(['auth'])->group(function () {
    // Menampilkan halaman keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    // Menambahkan item ke keranjang
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');

    // Mengupdate jumlah item di keranjang
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');

    // Menghapus item dari keranjang
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    // Checkout keranjang
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    // API untuk mendapatkan data keranjang (untuk keperluan frontend asinkron)
    Route::get('/cart/data', [CartController::class, 'getCart'])->name('cart.data');
});

// Route untuk login Google
Route::middleware(['web'])->group(function () {
    Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('login.google.callback');
});

// Dashboard dan Profile
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth'])->get('/profile', function () {
    return view('profile');
})->name('profile');

// Halaman About dan Contact
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Membuat Admin
Route::get('/make-admin', [MenuController::class, 'makeAdmin']);

Route::get('/crud/trashed', [MenuController::class, 'trashed'])->name('crud.trashed');
Route::put('/crud/{id}/restore', [MenuController::class, 'restore'])->name('crud.restore');
Route::delete('/crud/{id}/force-delete', [MenuController::class, 'forceDelete'])->name('crud.force-delete');

require __DIR__.'/auth.php';
