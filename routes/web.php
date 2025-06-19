<?php

declare(strict_types=1);

use App\Livewire\Pages;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

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

Route::get('/', Pages\Home::class)->name('home');
//Products
Route::get('/products/{slug}', Pages\SingleProduct::class)->name('single-product');

//Category
Route::get('/category/{id}', Pages\CategoryPage::class)->name('category-view');


Route::middleware('auth')->group(function (): void {
    Volt::route('/order/confirmed/{number}', 'pages.order.confirmed')
        ->name('order-confirmed');

    Route::get('checkout', Pages\Checkout::class)->name('checkout');
});

require __DIR__.'/auth.php';

