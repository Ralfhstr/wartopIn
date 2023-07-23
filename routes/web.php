<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth\login');
});

Route::resource('Product', ProductController::class);

Auth::routes();

// middleware auth dari controller
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/foods', [ProductController::class, 'food'])->name('products.food');
Route::get('/drinks', [ProductController::class, 'drink'])->name('products.drink');
Route::get('/snacks', [ProductController::class, 'snack'])->name('products.snack');
