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

	Route::get('admin', function () {
	    return view('layouts.inspinia_admin');
	});

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
});