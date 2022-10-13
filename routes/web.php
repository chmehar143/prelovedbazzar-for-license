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
use App\Http\Controllers\BotManController;
use App\Http\Controllers\StripePaymentController;



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
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
Route::get('/about-us', [AboutController::class, 'index'])->name('about-us');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/sort/{cat_id}', [ShopController::class, 'sortby'])->name('sortby');
Route::get('/sort-p/{min}/{max}', [ShopController::class, 'sort_price'])->name('sort_price');
Route::get('/vendor-store', [VendorController::class, 'index'])->name('vendor-store');
Route::get('/vendor-store-details/{id}', [VendorStoreDetailsController::class, 'index'])->name('vendor-store-details');
Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
Route::get('/become-a-vendor', [BecomeAVendorController::class, 'index'])->name('become-a-vendor');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::get('/addwish/{id}', [WishlistController::class, 'store'])->name('addwish');
Route::get('/delwish/{id}', [WishlistController::class, 'destroy'])->name('destroy');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart_store', [CartController::class, 'store'])->name('addcart');
Route::get('/remove_item/{id}', [CartController::class, 'remove'])->name('remove_cart');
Route::get('/clear_cart', [CartController::class, 'clear'])->name('clear_cart');
Route::post('/update', [CartController::class, 'update'])->name('update');
Route::get('/compare', [CompareController::class, 'index'])->name('compare');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/product/{id}', [ProductDetailsController::class, 'index'])->name('product');
Route::post('/add_review', [ProductDetailsController::class, 'add_rating'])->name('add_review');
Route::get('/my-account', [MyaccountController::class, 'index'])->middleware(['user.auth'])->name('my-account');
Route::get('/login', [LoginController::class, 'index'])->name('Login');
Route::post('/order-place', [OrderController::class, 'store'])->name('place');
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/order-view', [OrderViewController::class, 'index'])->name('order-view');
Route::get('/404-error', [ErrorPageController::class, 'index'])->name('404-error');
Route::get('/blog-details', [BlogsDetailsController::class, 'index'])->name('blog-details');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::post('/contact-post', [ContactUsController::class, 'store'])->name('contact_send');

// Botman route....
Route::match(['get','post'],'/botman',[BotManController::class,'handle']);
// end botman...

//stripe payment method start here....
Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});
//end stripe...


