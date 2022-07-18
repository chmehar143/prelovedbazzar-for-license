<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VendorStoreDetailsController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BlogsDetailsController;
use App\Http\Controllers\BecomeAVendorController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\MyaccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogDetailsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderViewController;
use App\Http\Controllers\ErrorPageController;




















/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about-us', [AboutController::class, 'index'])->name('about-us');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/vendor-store', [VendorController::class, 'index'])->name('vendor-store');
Route::get('/vendor-store-details', [VendorStoreDetailsController::class, 'index'])->name('vendor-store-details');
Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
Route::get('/become-a-vendor', [BecomeAVendorController::class, 'index'])->name('become-a-vendor');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/compare', [CompareController::class, 'index'])->name('compare');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/prodcut-details', [ProductDetailsController::class, 'index'])->name('product-details');
Route::get('/my-account', [MyaccountController::class, 'index'])->name('my-account');
Route::get('/login', [LoginController::class, 'index'])->name('Login');
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/order-view', [OrderViewController::class, 'index'])->name('order-view');
Route::get('/404-error', [ErrorPageController::class, 'index'])->name('404-error');
Route::get('/blog-details', [BlogsDetailsController::class, 'index'])->name('blog-details');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');







