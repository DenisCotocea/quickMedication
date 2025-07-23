<?php

declare(strict_types=1);

use App\Livewire\Pages;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Shopper\Core\Models\ProductVariant;
use App\Http\Controllers\ArticleController;

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

//Home
Route::get('/', Pages\Home::class)->name('home');

//Products
Route::get('/products/{slug}', Pages\SingleProduct::class)->name('single-product');

//Category
Route::get('/category/{id}', Pages\CategoryPage::class)->name('category-view');

//Articles
Route::resource('articles', ArticleController::class)->except(['show']);
Route::get('articles-page', Pages\ArticlePage::class)->name('article-view');
Route::get('/articles/{id}', Pages\SingleArticle::class)->name('single-article');

//Checkout
Route::get('/instant-buy/{id}', function (){

    $variant = ProductVariant::with(['prices'])->findOrFail(request('id'));

    $sessionKey = session()->getId();

    \Darryldecode\Cart\Facades\CartFacade::session($sessionKey)->clear();

    \Darryldecode\Cart\Facades\CartFacade::session($sessionKey)->add([
        'id' => $variant->id,
        'name' => $variant->name,
        'price' => 200,
        'quantity' => 1,
        'attributes' => [],
        'associatedModel' => $variant,
    ]);

    return redirect()->route('checkout');
})->name('instant-buy');

Volt::route('/order/confirmed/{number}', 'pages.order.confirmed')
    ->name('order-confirmed');

Route::get('checkout', Pages\Checkout::class)->name('checkout');

require __DIR__.'/auth.php';

