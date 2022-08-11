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
Route::get('/AffilateProduct_list', 'AffilateProductController@index')->name('AffilateProduct_list');
Route::get('/AffilateProduct_create', 'AffilateProductController@create')->name('AffilateProduct_create');
Route::get('/AfffilateProduct_edit', 'AffilateProductController@edit')->name('AffilateProduct_edit');
Route::get('/AffilateProduct_view', 'AffilateProductController@view')->name('AffilateProduct_view');

// Bulk  Product  Vendor
Route::get('/BulkProduct_home', 'BulkProductController@index')->name('BulkProduct_home');

// Withdraw  Product  Vendor
Route::get('/Withdraw_home', 'WithdrawController@index')->name('Withdraw_home');
Route::get('/Withdraw_create', 'WithdrawController@create')->name('Withdraw_create');
Route::get('/Withdraw_edit', 'WithdrawController@edit')->name('Withdraw_edit');
Route::get('/Withdraw_view', 'WithdrawController@view')->name('Withdraw_view');


// Withdraw  Product  Vendor
Route::get('/Setting_Service_list', 'SettingServiceController@index')->name('Setting_Service_list');
Route::get('/Setting_Service_create', 'SettingServiceController@create')->name('Setting_Service_create');
Route::get('/Setting_Service_edit', 'SettingServiceController@edit')->name('Setting_Service_edit');
Route::get('/Setting_Service_view', 'SettingServiceController@view')->name('Setting_Service_view');

Route::get('/Setting_banner_list', 'BannerController@create')->name('Setting_banner_list');


// Shipping  Product  Vendor
Route::get('/Setting_Shipping_list', 'ShippingController@index')->name('Setting_Shipping_list');
Route::get('/Setting_Shipping_create', 'ShippingController@create')->name('Setting_Shipping_create');
Route::get('/Setting_Shipping_edit', 'ShippingController@edit')->name('Setting_Shipping_edit');
Route::get('/Setting_Shipping_view', 'ShippingController@view')->name('Setting_Shipping_view');


// Packagings  Product  Vendor
Route::get('/Setting_packgings_list', 'PackagingController@index')->name('Setting_packgings_list');
Route::get('/Setting_packgings_create', 'PackagingController@create')->name('Setting_packgings_create');
Route::get('/Setting_packgings_edit', 'PackagingController@edit')->name('Setting_packgings_edit');
Route::get('/Setting_packgings_view', 'PackagingController@view')->name('Setting_packgings_view');


Route::get('/Setting_SocialMedia_list', 'SocialMediaController@index')->name('Setting_SocialMedia_list');








