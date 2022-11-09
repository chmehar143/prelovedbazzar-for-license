<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController, AboutController, ShopController, VendorController, VendorStoreDetailsController,
    BlogsController, BlogsDetailsController, BecomeAVendorController, WishlistController,
    CartController, CompareController, ContactUsController, CheckoutController,
    ProductDetailsController, MyaccountController, LoginController, BlogDetailsController,
    OrderController, OrderViewController, ErrorPageController, BotManController,
    StripePaymentController, SearchController, InstructorController, PrivacyController
};

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
Route::get('/privacy-policy', [PrivacyController::class, 'index'])->name('privacy-policy');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/sort/{id}', [ShopController::class, 'sortby'])->name('sortby');
Route::get('/subcat/{id}', [ShopController::class, 'subcat'])->name('subcat');
Route::get('/sort-p/{min}/{max}', [ShopController::class, 'sort_price'])->name('sort_price');
Route::get('/vendor-store', [VendorController::class, 'index'])->name('vendor-store');
Route::get('/vendor-store-details/{id}', [VendorStoreDetailsController::class, 'index'])->name('vendor-store-details');
Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
Route::get('/become-a-vendor', [BecomeAVendorController::class, 'index'])->name('become-a-vendor');
Route::get('/how-to-become-a-vendor', [InstructorController::class, 'index'])->name('how-to-become-a-vendor');

Route::get('/user/wishlist', [WishlistController::class, 'index'])->middleware(['user.auth', 'user.verified'])->name('wishlist');
Route::get('/user/my-account', [MyaccountController::class, 'index'])->middleware(['user.auth', 'user.verified'])->name('my-account');

Route::get('/addwish/{id}', [WishlistController::class, 'store'])->name('addwish');
Route::get('/delwish/{id}', [WishlistController::class, 'destroy'])->name('destroy');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart_store', [CartController::class, 'store'])->name('addcart');
Route::get('/remove_item/{id}', [CartController::class, 'remove'])->name('remove_cart');
Route::get('/clear_cart', [CartController::class, 'clear'])->name('clear_cart');
Route::get('/upcart/{id}', [CartController::class, 'upcart'])->name('upcart');
Route::get('/downcart/{id}', [CartController::class, 'down'])->name('down');
Route::get('/compare', [CompareController::class, 'index'])->name('compare');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/product/{id}', [ProductDetailsController::class, 'index'])->name('product');
Route::post('/add_review', [ProductDetailsController::class, 'add_rating'])->name('add_review');
Route::get('/login', [LoginController::class, 'index'])->name('Login');
Route::post('/order-place', [OrderController::class, 'store'])->name('place');
Route::get('/order/{id}', [OrderController::class, 'index'])->name('order');
Route::get('/orders-view', [OrderViewController::class, 'index'])->name('order-view');
Route::get('/404-error', [ErrorPageController::class, 'index'])->name('404-error');
Route::get('/blog-details', [BlogsDetailsController::class, 'index'])->name('blog-details');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
// Route::get('/vendor-details', [VendorController::class, 'vendordetails'])->name('vendor-details');


Route::post('/contact-post', [ContactUsController::class, 'store'])->name('contact_send');
// Search route
Route::get('/search_product', [SearchController::class, 'search'])->name('search_product');

// end search route

// Botman route....
Route::match(['get','post'],'/botman',[BotManController::class,'handle']);
// end botman...

//stripe payment method start here....
Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});
//end stripe...

