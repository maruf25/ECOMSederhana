<?php

use App\Http\Livewire\Dashboard\Index;
use App\Http\Livewire\Dashboard\Product\Edit;
use App\Http\Livewire\Dashboard\Product\Index as ProductIndex;
use App\Http\Livewire\Dashboard\Transaction\Index as TransactionIndex;
use App\Http\Livewire\Front\Chart;
use App\Http\Livewire\Front\Index as FrontIndex;
use App\Http\Livewire\Front\Order;
use App\Http\Livewire\Front\Shipping;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
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

// Route::get('/');

Route::get('/', function () {
    if (auth()->user()->hasRole('admin')) {
        return redirect(route('dashboard.index'));
    } elseif (!auth()->user()->hasRole('admin')) {
        return redirect(route('ecom.index'));
    }
})->middleware(['auth', 'verified'])->name('home');

// Route Auth
Route::get('/login', Login::class)->middleware('guest')->name('login');
Route::get('/register', Register::class)->middleware('guest')->name('register');

// Route Dashboard
Route::middleware(['auth', 'verified', 'role:admin'])
    ->name('dashboard.')
    ->prefix('dashboard')
    ->group(function () {
        Route::get('/', Index::class)->name('index');
        Route::get('/product', ProductIndex::class)->name('product.index');
        Route::get('/product/edit/{id}', Edit::class)->name('product.edit');
        Route::get('/transaction', TransactionIndex::class)->name('transaction.index');
    });

// Route User
Route::middleware(['auth', 'verified'])
    ->name('ecom.')
    ->prefix('ecom')
    ->group(function () {
        Route::get('/', FrontIndex::class)->name('index');
        Route::get('/order/{id}', Order::class)->name('order');
        Route::get('/chart', Chart::class)->name('chart');
        Route::get('/shipping', Shipping::class)->name('shipping');
    });
