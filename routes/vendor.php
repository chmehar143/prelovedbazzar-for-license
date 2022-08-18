<?php

use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', 'HomeController@index')->name('home')->middleware('vendor.verified');

// Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Reset Password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Confirm Password
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

//Route::group(['namespace' => 'Vendor'], function() {
// Verify Email
    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
//});

// Product Vendor
Route::get('/product_list', 'ProductController@index')->name('product_list');
Route::get('/product_create', 'ProductController@create')->name('product_create');
Route::get('/product_edit', 'ProductController@edit')->name('product_edit');
Route::get('/product_view', 'ProductController@view')->name('product_view');


// Affilated Product  Vendor
Route::get('/affilateproduct_list', 'AffilateProductController@index')->name('affilateproduct_list');
Route::get('affilateproduct_create', 'AffilateProductController@create')->name('affilateproduct_create');
Route::get('/affilateproduct_edit', 'AffilateProductController@edit')->name('affilateproduct_edit');
Route::get('/affilateproduct_view', 'AffilateProductController@view')->name('affilateproduct_view');


// Withdraw  Product  Vendor
Route::get('/withdraw_list', 'WithdrawController@index')->name('withdraw_list');
Route::get('/withdraw_create', 'WithdrawController@create')->name('withdraw_create');
Route::get('/withdraw_edit', 'WithdrawController@edit')->name('withdraw_edit');
Route::get('/withdraw_view', 'WithdrawController@view')->name('withdraw_view');


// Service  
Route::get('/setting_service_list', 'SettingServiceController@index')->name('setting_service_list');
Route::get('/setting_service_create', 'SettingServiceController@create')->name('setting_service_create');
Route::get('/setting_service_edit', 'SettingServiceController@edit')->name('setting_service_edit');
Route::get('/setting_service_view', 'SettingServiceController@view')->name('setting_service_view');

Route::get('/setting_banner_list', 'BannerController@create')->name('setting_banner_list');


// Shipping  Product  Vendor
Route::get('/setting_shipping_list', 'ShippingController@index')->name('setting_shipping_list');
Route::get('/setting_shipping_create', 'ShippingController@create')->name('setting_shipping_create');
Route::get('/setting_shipping_edit', 'ShippingController@edit')->name('setting_shipping_edit');
Route::get('/setting_shipping_view', 'ShippingController@view')->name('setting_shipping_view');


// Packagings  Product  Vendor
Route::get('/setting_packgings_list', 'PackagingController@index')->name('setting_packgings_list');
Route::get('/setting_packgings_create', 'PackagingController@create')->name('setting_packgings_create');
Route::get('/setting_packgings_edit', 'PackagingController@edit')->name('setting_packgings_edit');
Route::get('/setting_packgings_view', 'PackagingController@view')->name('setting_packgings_view');


Route::get('/setting_socialmedia_list', 'SocialMediaController@index')->name('setting_socialmedia_list');

Route::get('/order_list', 'OrderController@index')->name('order_list');









