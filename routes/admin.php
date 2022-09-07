<?php

use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', 'HomeController@index')->name('home');

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

// Verify Email
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

// Main Category
Route::get('/category_list', 'CategoryController@index')->name('category_list');
Route::get('/category_create', 'CategoryController@create')->name('category_create');
Route::get('/category_edit/{category}', 'CategoryController@edit')->name('category_edit');
Route::post('/category_edit/{category}', 'CategoryController@update')->name('category_update');
Route::post('/category_store', 'CategoryController@store')->name('category_store');
Route::get('/delete/{id}', 'CategoryController@destroy')->name('category_destroy');

// Sub Category
Route::get('/sub_category_list', 'SubCategoryController@index')->name('sub_category_list');
Route::get('/sub_category_create', 'SubCategoryController@create')->name('sub_category_create');
Route::post('/sub_category_store', 'SubCategoryController@store')->name('sub_category_store');
Route::get('/sub_category_edit/{subcategory}', 'SubCategoryController@edit')->name('sub_category_edit');
Route::post('/sub_category_edit/{subcategory}', 'SubCategoryController@update')->name('sub_category_update');
Route::get('/sub_category_delete/{id}', 'SubCategoryController@destroy')->name('sub_category_destroy');

// Child Category
Route::get('/child_category_list', 'ChildCategoryController@index')->name('child_category_list');
Route::get('/child_category_create', 'ChildCategoryController@create')->name('child_category_create');
Route::post('/child_category_store', 'ChildCategoryController@store')->name('child_category_store');
Route::get('/child_category_edit/{childcategory}', 'ChildCategoryController@edit')->name('child_category_edit');
Route::post('/child_category_edit/{childcategory}', 'ChildCategoryController@update')->name('child_category_update');
Route::get('/child_category_delete/{id}', 'ChildCategoryController@destroy')->name('child_category_destroy');
Route::get('/child_category_view', 'ChildCategoryController@view')->name('child_category_view');


// All  Products
Route::get('/allproducts_list', 'AllProductController@index')->name('allproducts_list');
Route::get('/allproducts_create', 'AllProductController@create')->name('allproducts_create');
Route::post('/allproducts_store', 'AllProductController@store')->name('allproducts_store');
Route::post('/GetSubCat', 'AllProductController@GetSubCat')->name('GetSubCat'); 
Route::post('/GetChildCat', 'AllProductController@GetChildCat')->name('GetChildCat');
Route::get('/allproducts_edit/{id}', 'AllProductController@edit')->name('allproducts_edit');
Route::put('/allproducts_update', 'AllProductController@update')->name('allproducts_update');
Route::get('/allproducts_view/{id}', 'AllProductController@view')->name('allproducts_view');
Route::get('/product_del/{id}', 'AllProductController@destroy')->name('allproducts_del');


// productcatalog

Route::get('/productcatalog_list', 'ProductCatalogsController@index')->name('productcatalog_list');
Route::get('/productcatalog_create', 'ProductCatalogsController@create')->name('productcatalog_create');
Route::get('/productcatalog_edit', 'ProductCatalogsController@edit')->name('productcatalog_edit');
Route::get('/productcatalog_view', 'ProductCatalogsController@view')->name('productcatalog_view');


Route::get('/deactivateproduct_list', 'DeactivedProductController@index')->name('deactivateproduct_list');


// Affilate product

Route::get('/affilateproduct_list', 'AffilateController@index')->name('affilateproduct_list');
Route::get('/affilateproduct_create', 'AffilateController@create')->name('affilateproduct_create');
Route::post('/affilateproduct_store', 'AffilateController@store')->name('affilateproduct_store');
Route::get('/affilateproduct_edit/{id}', 'AffilateController@edit')->name('affilateproduct_edit');
Route::put('/affilateproduct_update/{id}', 'AffilateController@update')->name('affilateproduct_update');
Route::get('/affilateproduct_delete/{id}', 'AffilateController@destroy')->name('affilateproduct_delete');
Route::get('/affilateproduct_view/{id}', 'AffilateController@view')->name('affilateproduct_view');

//Vendors Lists Rout...
Route::get('/vendors_list', 'VendorController@index')->name('vendors_list');





