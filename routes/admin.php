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
Route::put('/allproducts_update/{id}', 'AllProductController@update')->name('allproducts_update');
Route::get('/allproducts_view/{id}', 'AllProductController@view')->name('allproducts_view');
Route::get('/product_del/{id}', 'AllProductController@destroy')->name('allproducts_del');
Route::get('/product_del_gall/{id}', 'AllProductController@removegallery')->name('product_del_gall');


// productcatalog

Route::get('/productcatalog_list', 'ProductCatalogsController@index')->name('productcatalog_list');
Route::get('/productcatalog_create', 'ProductCatalogsController@create')->name('productcatalog_create');
Route::post('/productcatalog_store', 'ProductCatalogsController@store')->name('productcatalog_store');
Route::get('/productcatalog_edit/{id}', 'ProductCatalogsController@edit')->name('productcatalog_edit');
Route::get('/productcatalog_update/{id}', 'ProductCatalogsController@update')->name('productcatalog_update');
Route::get('/productcatalog_view/{id}', 'ProductCatalogsController@view')->name('productcatalog_view');


Route::get('/deactivateproduct_list', 'DeactivedProductController@index')->name('deactivateproduct_list');


// Affilate product

Route::get('/affilateproduct_list', 'AffilateController@index')->name('affilateproduct_list');
Route::get('/affilateproduct_create', 'AffilateController@create')->name('affilateproduct_create');
Route::post('/affilateproduct_store', 'AffilateController@store')->name('affilateproduct_store');
Route::get('/affilateproduct_edit/{id}', 'AffilateController@edit')->name('affilateproduct_edit');
Route::put('/affilateproduct_update/{id}', 'AffilateController@update')->name('affilateproduct_update');
Route::get('/affilateproduct_delete/{id}', 'AffilateController@destroy')->name('affilateproduct_delete');
Route::get('/affilateproduct_view/{id}', 'AffilateController@view')->name('affilateproduct_view');

// Vendor  product

Route::get('vendors_list', 'VendorsController@index')->name('vendors_list');
Route::get('/vendors_edit/{id}', 'VendorsController@edit')->name('vendors_edit');
Route::put('/vendors_update/{id}', 'VendorsController@update')->name('vendors_update');
Route::get('/vendors_view/{id}', 'VendorsController@view')->name('vendors_view');
Route::post('/vendors_status/{id}', 'VendorsController@status')->name('vendors_status');
Route::get('/vendors_question', 'VendorsController@question')->name('vendors_question');
Route::get('/vendors_withdraw', 'VendorsController@list')->name('vendors_withdraw');


// Vendor  product

Route::get('vendorverification_list', 'VendorVerificationController@index')->name('vendorverification_list');
Route::put('vendorverification_verify/{id}', 'VendorVerificationController@verify')->name('vendorverification_verify');
Route::put('vendorverification_unverify/{id}', 'VendorVerificationController@unverify')->name('vendorverification_unverify');
Route::get('vendorverification_del/{id}', 'VendorVerificationController@remove')->name('vendorverification_del');
Route::get('/vendorverification_pending', 'VendorVerificationController@pending')->name('vendorverification_pending');



//Cusomters

Route::get('customer_list', 'CustomersController@index')->name('customer_list');
Route::get('/customer_deposit', 'CustomersController@deposit')->name('customer_deposit');
Route::get('/customer_withdraw', 'CustomersController@withdraw')->name('customer_withdraw');
Route::get('/customer_transaction', 'CustomersController@transactions')->name('customer_transaction');
Route::get('/customer_viewdetails', 'CustomersController@view')->name('customer_viewdetails');
Route::get('/customer_edit', 'CustomersController@edit')->name('customer_edit');
Route::get('/customer_details', 'CustomersController@details')->name('customer_details');
Route::get('/customer_invoice', 'CustomersController@invoice')->name('customer_invoice');

//Products Discussions...

Route::get('productdisscussion_comments', 'ProductDisscussionController@comments')->name('productdisscussion_comments');
Route::get('/productdisscussion_report', 'ProductDisscussionController@report')->name('productdisscussion_report');
Route::get('/productdisscussion_review', 'ProductDisscussionController@review')->name('productdisscussion_review');
Route::get('/productdisscussion_reviewview/{id}', 'ProductDisscussionController@reviewview')->name('productdisscussion_reviewview');
Route::get('/productdisscussion_delete/{id}', 'ProductDisscussionController@destroy')->name('productdisscussion_delete');


//Orders

Route::get('order_allorder', 'OrderController@allorder')->name('order_allorder');
Route::get('order_allorderdetails/{id}', 'OrderController@allorderdetails')->name('order_allorderdetails');
Route::get('order_allorderinvoice', 'OrderController@allorderinvoice')->name('order_allorderinvoice');
Route::get('order_allorderdelivery/{id}', 'OrderController@allorderdelivery')->name('order_allorderdelivery');
Route::put('order_allorderstatus/{id}', 'OrderController@allorderstatus')->name('order_allorderstatus');


// Complete Orders

Route::get('/order_complete_completedorder', 'OrderController@completedorder')->name('order_complete_completedorder');
Route::get('order_complete_completeorderdetails/{id}', 'OrderController@completeorderdetails')->name('order_complete_completeorderdetails');
Route::get('order_complete_completeorderinvoice', 'OrderController@completeorderinvoice')->name('order_complete_completeorderinvoice');
Route::get('order_complete_completeorderdelivery', 'OrderController@completeorderdelivery')->name('order_complete_completeorderdelivery');
// pending Orders

Route::get('/order_pending_pendingorder', 'OrderController@pendingorder')->name('order_pending_pendingorder');
Route::get('order_pending_pendingorderdetails/{id}', 'OrderController@pendingorderdetails')->name('order_pending_pendingorderdetails');
Route::get('order_pending_pendingorderinvoice', 'OrderController@pendingorderinvoice')->name('order_pending_pendingorderinvoice');
Route::get('order_pending_pendingorderdelivery', 'OrderController@pendingorderdelivery')->name('order_pending_pendingorderdelivery');

// Declined Orders Orders



Route::get('/order_decline_declinedorder', 'OrderController@declineorder')->name('order_decline_declinedorder');
Route::get('order_decline_declineorderdetails/{id}', 'OrderController@declineorderdetails')->name('order_decline_declineorderdetails');
Route::get('order_decline_declineorderinvoice', 'OrderController@declineorderinvoice')->name('order_decline_declineorderinvoice');
Route::get('order_decline_declineorderdelivery', 'OrderController@declineorderdelivery')->name('order_decline_declineorderdelivery');

// Processing Orders Orders


Route::get('/order_processing_processingorder', 'OrderController@processingorder')->name('order_processing_processingorder');
Route::get('order_processing_processingorderdetails/{id}', 'OrderController@processingorderdetails')->name('order_processing_processingorderdetails');
Route::get('order_processing_processingorderinvoice', 'OrderController@processingorderinvoice')->name('order_processing_processingorderinvoice');
Route::get('order_processing_processingorderdelivery', 'OrderController@processingorderdelivery')->name('order_processing_processingorderdelivery');

// Blog

Route::get('/blog_categorieslist', 'BlogController@index')->name('blog_categorieslist');
Route::get('blog_addcategories', 'BlogController@create')->name('blog_addcategories');
Route::get('blog_editcategories', 'BlogController@edit')->name('blog_editcategories');

Route::get('blog_postlist', 'BlogController@post')->name('blog_postlist');
Route::get('blog_addpost', 'BlogController@postcreate')->name('blog_addpost');
Route::get('blog_editpost', 'BlogController@postedit')->name('blog_editpost');

//Message

Route::get('message_messagelist', 'MessageController@message')->name('message_messagelist');
Route::get('message_messagelist_view', 'MessageController@messageview')->name('message_messagelist_view');
Route::post('message_send', 'MessageController@notifyto')->name('message_send');
Route::get('message_view', 'MessageController@view')->name('message_view');
Route::get('message_details', 'MessageController@details')->name('message_details');
Route::get('message_invoice', 'MessageController@invoice')->name('message_invoice');

//Subscribe
Route::get('subscribe_list', 'SubscribeController@index')->name('subscribe_list');
Route::get('remove_subscript/{id}', 'SubscribeController@remove')->name('remove_subscript');

// Manage staff
Route::get('managestaff_list', 'ManageStaffController@list')->name('managestaff_list');
Route::get('managestaff_create', 'ManageStaffController@create')->name('managestaff_create');
Route::post('managestaff_store', 'ManageStaffController@store')->name('managestaff_store');
Route::get('managestaff_edit/{id}', 'ManageStaffController@edit')->name('managestaff_edit');
Route::put('managestaff_update/{id}', 'ManageStaffController@update')->name('managestaff_update');
Route::get('managestaff_view/{id}', 'ManageStaffController@view')->name('managestaff_view');
Route::get('managestaff_delete/{id}', 'ManageStaffController@destroy')->name('managestaff_delete');



// Vendor  product

// Route::get('vendors_list', 'VendorsController@index')->name('vendors_list');
// Route::get('/vendors_edit', 'VendorsController@edit')->name('vendors_edit');
// Route::get('/vendors_view', 'VendorsController@view')->name('vendors_view');
// Route::get('/vendors_question', 'VendorsController@question')->name('vendors_question');
// Route::get('/vendors_withdraw', 'VendorsController@list')->name('vendors_withdraw');


// Vendor  product

Route::get('vendorverification_list', 'VendorVerificationController@index')->name('vendorverification_list');
Route::get('/vendorverification_pending', 'VendorVerificationController@pending')->name('vendorverification_pending');



//Cusomters

Route::get('customer_list', 'CustomersController@index')->name('customer_list');
Route::get('/customer_deposit', 'CustomersController@deposit')->name('customer_deposit');
Route::get('/customer_withdraw', 'CustomersController@withdraw')->name('customer_withdraw');
Route::get('/customer_transaction', 'CustomersController@transactions')->name('customer_transaction');
Route::get('/customer_viewdetails', 'CustomersController@view')->name('customer_viewdetails');
Route::get('/customer_edit', 'CustomersController@edit')->name('customer_edit');
Route::get('/customer_details', 'CustomersController@details')->name('customer_details');
Route::get('/customer_invoice', 'CustomersController@invoice')->name('customer_invoice');

//Cusomters

// Route::get('productdisscussion_comments', 'ProductDisscussionController@comments')->name('productdisscussion_comments');
// Route::get('/productdisscussion_report', 'ProductDisscussionController@report')->name('productdisscussion_report');
// Route::get('/productdisscussion_review', 'ProductDisscussionController@review')->name('productdisscussion_review');
// Route::get('/productdisscussion_reviewview', 'ProductDisscussionController@reviewview')->name('productdisscussion_reviewview');


//Orders

// Route::get('order_allorder', 'OrderController@allorder')->name('order_allorder');
// Route::get('order_allorderdetails', 'OrderController@allorderdetails')->name('order_allorderdetails');
// Route::get('order_allorderinvoice', 'OrderController@allorderinvoice')->name('order_allorderinvoice');
// Route::get('order_allorderdelivery', 'OrderController@allorderdelivery')->name('order_allorderdelivery');


// Complete Orders

// Route::get('/order_complete_completedorder', 'OrderController@completedorder')->name('order_complete_completedorder');
// Route::get('order_complete_completeorderdetails', 'OrderController@completeorderdetails')->name('order_complete_completeorderdetails');
// Route::get('order_complete_completeorderinvoice', 'OrderController@completeorderinvoice')->name('order_complete_completeorderinvoice');
// Route::get('order_complete_completeorderdelivery', 'OrderController@completeorderdelivery')->name('order_complete_completeorderdelivery');

// pending Orders

// Route::get('/order_pending_pendingorder', 'OrderController@pendingorder')->name('order_pending_pendingorder');
// Route::get('order_pending_pendingorderdetails', 'OrderController@pendingorderdetails')->name('order_pending_pendingorderdetails');
// Route::get('order_pending_pendingorderinvoice', 'OrderController@pendingorderinvoice')->name('order_pending_pendingorderinvoice');
// Route::get('order_pending_pendingorderdelivery', 'OrderController@pendingorderdelivery')->name('order_pending_pendingorderdelivery');

// Declined Orders Orders



// Route::get('/order_decline_declinedorder', 'OrderController@declineorder')->name('order_decline_declinedorder');
// Route::get('order_decline_declineorderdetails', 'OrderController@declineorderdetails')->name('order_decline_declineorderdetails');
// Route::get('order_decline_declineorderinvoice', 'OrderController@declineorderinvoice')->name('order_decline_declineorderinvoice');
// Route::get('order_decline_declineorderdelivery', 'OrderController@declineorderdelivery')->name('order_decline_declineorderdelivery');

// Processing Orders Orders
// Route::get('/order_processing_processingorder', 'OrderController@processingorder')->name('order_processing_processingorder');
// Route::get('order_processing_processingorderdetails', 'OrderController@processingorderdetails')->name('order_processing_processingorderdetails');
// Route::get('order_processing_processingorderinvoice', 'OrderController@processingorderinvoice')->name('order_processing_processingorderinvoice');
// Route::get('order_processing_processingorderdelivery', 'OrderController@processingorderdelivery')->name('order_processing_processingorderdelivery');

// Blog
Route::get('/blog_categorieslist', 'BlogController@index')->name('blog_categorieslist');
Route::get('blog_addcategories', 'BlogController@create')->name('blog_addcategories');
Route::get('blog_editcategories', 'BlogController@edit')->name('blog_editcategories');

Route::get('blog_postlist', 'BlogController@post')->name('blog_postlist');
Route::get('blog_addpost', 'BlogController@postcreate')->name('blog_addpost');
Route::get('blog_editpost', 'BlogController@postedit')->name('blog_editpost');

//Message

Route::get('message_messagelist', 'MessageController@message')->name('message_messagelist');
Route::get('message_messagelist_view', 'MessageController@messageview')->name('message_messagelist_view');
Route::get('message_view', 'MessageController@view')->name('message_view');
Route::get('message_details', 'MessageController@details')->name('message_details');
Route::get('message_invoice', 'MessageController@invoice')->name('message_invoice');



//subscriptionplan

Route::get('/subscriptionplan_list', 'SubscriptionPlanController@index')->name('subscriptionplan_list');
Route::get('/subscriptionplan_create', 'SubscriptionPlanController@create')->name('subscriptionplan_create');
Route::post('/subscriptionplan_store', 'SubscriptionPlanController@store')->name('subscriptionplan_store');
Route::get('/subscriptionplan_edit/{id}', 'SubscriptionPlanController@edit')->name('subscriptionplan_edit');
Route::put('/subscriptionplan_update/{id}', 'SubscriptionPlanController@update')->name('subscriptionplan_update');
Route::get('/subscriptionplan_view/{id}', 'SubscriptionPlanController@view')->name('subscriptionplan_view');
Route::get('/subscriptionplan_remove/{id}', 'SubscriptionPlanController@remove')->name('subscriptionplan_remove');


Route::get('manageroles_list', 'ManageRolesController@list')->name('manageroles_list');
Route::get('manageroles_create', 'ManageRolesController@create')->name('manageroles_create');
Route::get('manageroles_edit', 'ManageRolesController@edit')->name('manageroles_edit');

//Web Banner
Route::get('webbanner_list', 'WebsiteBannerController@list')->name('webbanner_list');
Route::get('webbanner_create', 'WebsiteBannerController@create')->name('webbanner_create');
Route::post('webbanner_store', 'WebsiteBannerController@store')->name('webbanner_store');
Route::get('webbanner_edit/{id}', 'WebsiteBannerController@edit')->name('webbanner_edit');
Route::put('webbanner_update/{id}', 'WebsiteBannerController@update')->name('webbanner_update');
Route::get('webbanner_remove/{id}', 'WebsiteBannerController@remove')->name('webbanner_remove');


//Contact Us 
Route::get('contactus_list', 'ContactUsController@list')->name('contactus_list');
Route::get('contactus_view/{id}', 'ContactUsController@view')->name('contactus_view');
Route::get('contactus_rem/{id}', 'ContactUsController@remove')->name('contactus_rem');


//Front Cat
Route::get('frontcat_list', 'frontCatController@list')->name('frontcat_list');
Route::get('frontcat_create', 'frontCatController@create')->name('frontcat_create');
Route::post('frontcat_post', 'frontCatController@store')->name('frontcat_post');
Route::get('frontcat_del/{id}', 'frontCatController@destroy')->name('frontcat_del');
