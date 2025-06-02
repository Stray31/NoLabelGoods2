<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('home');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/main', [ProductController::class, 'index'])->name('main');
Route::get('/edibles', [ProductController::class, 'index'])->name('edibles');
Route::get('/toys', [ProductController::class, 'index'])->name('toys');
Route::get('/problemsolvers', [ProductController::class, 'index'])->name('problemsolvers');
Route::get('/legalfriends', [ProductController::class, 'index'])->name('legalfriends');

Route::get('/cart', [CartController::class, 'show'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/wishlist', function () {
    return view('wishlist');
});

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');


Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/productdetails', [ProductController::class, 'show']);
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
Route::post('/balance/deposit', [BalanceController::class, 'deposit'])->name('balance.deposit');