<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\StripeController;
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
    return view('auth.login');
});

Auth::routes();

Route::resource('products', ProductController::class);

Route::resource('transactions', TransactionController::class);

Route::get('/transaction', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function(){
    Route::get('/products', [App\Http\Controllers\TransactionController::class, 'gProduct'])->name('transactions.gProducts');
    Route::get('exportExcel', [TransactionController::class, 'exportExcel'])->name('transactions.exportExcel');
    Route::get('exportPdf', [TransactionController::class, 'exportPdf'])->name('transactions.exportPdf');
});


Route::prefix('user')->middleware(['auth', 'user'])->group(function(){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/foods', [ProductController::class, 'food'])->name('products.food');
Route::get('/drinks', [ProductController::class, 'drink'])->name('products.drink');
Route::get('/snacks', [ProductController::class, 'snack'])->name('products.snack');

Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');

Route::get('/', [ProductController::class, 'index']);
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ProductController::class, 'updateCart'])->name('update_cart');
Route::delete('remove-from-cart', [ProductController::class, 'removeCart'])->name('remove_from_cart');
});

Route::get('getTransactions', [TransactionController::class, 'getData'])->name('transactions.getData');

// Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');


