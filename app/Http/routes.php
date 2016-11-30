<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function() {
	return view('customer.index');
});

//================ UNIVERSE ===============//

Route::post('upload/image', 'HomeController@uploadImage');


//================ ADMIN ===============//

Route::get('admin/login', 'AdminController@getLogin');

Route::post('admin/login', 'AdminController@postLogin');

Route::group(['middleware' => 'admin'], function () {

	Route::get('admin', 'AdminHomeController@index');

	Route::get('admin/analyze', 'AdminAnalyzeController@index');

	Route::get('admin/analyze/get_top_product_seller/{start_date}/{end_date}', 'AdminAnalyzeController@getTopProductSeller');

	Route::resource('admin/category', 'AdminCategoryController');

	Route::resource('admin/sub_category' , 'AdminSubCategoryController');

	Route::get('admin/admin', 'AdminController@index');

	Route::get('admin/admin/create', 'AdminController@create');

	Route::post('admin/admin/store', 'AdminController@store');

	Route::get('admin/logout', 'AdminController@getLogout');

	Route::get('admin/farmer', 'AdminFarmerController@index');

	Route::get('admin/farmer/activate_farmer', 'AdminFarmerController@farmerActivate');

	Route::get('admin/farmer/deactivate_farmer', 'AdminFarmerController@farmerDeactivate');

	Route::get('admin/farmer/show', 'AdminFarmerController@show');

	Route::get('admin/product_selection', 'AdminProductSelectionController@index');

	Route::post('admin/product_select', 'AdminProductSelectionController@productSelect');

	Route::resource('admin/product', 'AdminProductController');

	Route::get('admin/notification', 'AdminNotificationController@index');

	Route::resource('admin/admininformation'  , 'AdminInformationController');
	Route::resource('admin/coinpackage' , 'CoinPackageController');

	Route::get('admin/order', 'AdminOrderController@index');

	Route::get('admin/order/detail/{order_id}', 'AdminOrderController@getOrderDetail');

	Route::get('admin/order/activeShipped/{order_id}', 'AdminOrderController@activeShipped');

	Route::get('admin/order/sendToFarm/{order_id}', 'AdminOrderController@sendToFarm');

	Route::resource('admin/feed' , 'FeedController');

	Route::get('admin/inbox/customer', 'AdminInboxController@getCustomerInbox');

	Route::get('admin/inbox/customer/detail/{slug}', 'AdminInboxController@getCustomerInboxDetail');

	Route::get('admin/inbox/customer/send', 'AdminInboxController@getCustomerInboxSend');

	Route::post('admin/inbox/customer/send', 'AdminInboxController@postCustomerInboxSend');

	Route::get('admin/inbox/farmer', 'AdminInboxController@getFarmerInbox');

	Route::get('admin/inbox/farmer/detail/{slug}', 'AdminInboxController@getFarmerInboxDetail');

	Route::get('admin/inbox/farmer/send', 'AdminInboxController@getFarmerInboxSend');

	Route::post('admin/inbox/farmer/send', 'AdminInboxController@postFarmerInboxSend');

});




//================ FARMER ===============//

Route::get('farmer/register', 'FarmerController@getRegister');

Route::post('farmer/register', 'FarmerController@postRegister');

Route::get('farmer/login', 'FarmerController@getLogin');

Route::post('farmer/login', 'FarmerController@postLogin');

Route::group(['middleware' => ['farmer', 'farmer_not_activated']], function () {
	Route::get('farmer', function () {
    	return view('layouts.inspinia_farmer');
	});

	Route::get('farmer/category', 'FarmerCategoryController@getCategory');

	Route::get('farmer/sub_category', 'FarmerCategoryController@getSubCategory');

	Route::resource('farmer/product', 'FarmProductController');

	Route::get('farmer/selectCategory/', 'FarmProductController@getSelectCategory');

	Route::get('farmer/logout', 'FarmerController@getLogout');

	Route::post('farmer/product/sendToAdmin', 'FarmProductController@sendToAdmin');

	Route::get('farmer/admin_product', 'FarmerAdminProduct@index');

	Route::post('farmer/admin_product/returnProductToFarmer', 'FarmerAdminProduct@returnProductToFarmer');

	Route::post('farmer/admin_product/cancelAdminProduct', 'FarmerAdminProduct@cancelAdminProduct');


	Route::get('farmer/notification', 'FarmerNotificationController@index');

	Route::resource('farmer/certification' , 'FarmerCertificationController');

	Route::get('farmer/order', 'FarmerOrderController@index');
});

//================ CUSTOMER ===============//

// NOT AUTH
Route::get('products/category/{category}', 'CustomerCategoryController@getProductByCategory');

Route::get('products/category/{category}/{sub_category}', 'CustomerCategoryController@getProductBySubCategory');

Route::get('products', 'CustomerProductController@getProductsPage');

Route::get('cart', 'CustomerCartController@index');

Route::get('cart/{id}', [
	'uses' => 'CustomerCartController@addCart',
	'as' => 'cart'
]);

Route::get('remove_cart/{rowId}', [
	'uses' => 'CustomerCartController@removeCart',
	'as' => 'cart.remove'
]);

Route::post('update_cart/{rowId}', [
	'uses' => 'CustomerCartController@updateCart',
	'as' => 'cart.update'
]);

Route::get('product/{slug}', 'CustomerProductController@getProduct');

Route::get('login', 'CustomerController@getLogin');

Route::get('register', 'CustomerController@getRegister');

Route::post('register', 'CustomerController@postRegister');

Route::post('login', 'CustomerController@postLogin');

Route::get('veggiecoin', 'CustomerCoinController@getVeggiecion');

//AUTH
Route::group(['middleware' => ['member']], function () {
	Route::get('logout', 'CustomerController@getLogout');

	Route::get('member/my_account', 'CustomerController@getAccount');

	Route::get('member/orders', 'CustomerController@getOrders');

	Route::get('member/order/{order_number}', 'CustomerController@getOrder');

	Route::get('member/order_coin', 'CustomerController@getOrderCoin');

	Route::get('checkout', 'CustomerOrderController@getCheckout');

	Route::post('order', 'CustomerOrderController@placeOrder');

	Route::get('order_success/{order_number}', [
		'as' => 'order_success',
		'uses' => 'CustomerOrderController@getOrderSuccess'
	]);

	Route::get('member/inbox', 'CustomerInboxController@index');

	Route::get('member/inbox/send', 'CustomerInboxController@getSendInbox');

	Route::post('member/inbox/send', 'CustomerInboxController@postSendInbox');

	Route::get('member/inbox/detail/{inbox_slug}', 'CustomerInboxController@getInBoxDetail');
});
