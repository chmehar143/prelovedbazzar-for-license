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
Route::get('/category_view', 'CategoryController@view')->name('category_view');
Route::post('/category_store', 'CategoryController@store')->name('category_store');
Route::get('/delete/{id}', 'CategoryController@destroy')->name('category_destroy');

// Sub Category
Route::get('/SubCategory_list', 'SubCategoryController@index')->name('SubCategory_list');
Route::get('/SubCategory_create', 'SubCategoryController@create')->name('SubCategory_create');
Route::get('/SubCategory_edit', 'SubCategoryController@edit')->name('SubCategory_edit');
Route::get('/SubCategory_view', 'SubCategoryController@view')->name('SubCategory_view');


// Child Category
Route::get('/ChildCategory_list', 'ChildCategoryController@index')->name('ChildCategory_list');
Route::get('/ChildCategory_create', 'ChildCategoryController@create')->name('ChildCategory_create');
Route::get('/ChildCategory_edit', 'ChildCategoryController@edit')->name('ChildCategory_edit');
Route::get('/ChildCategory_view', 'ChildCategoryController@view')->name('ChildCategory_view');




