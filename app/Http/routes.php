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


//================ ADMIN ===============//

Route::get('admin', function () {
    return view('layouts.inspinia_admin');
});

Route::resource('admin/category', 'AdminCategoryController');

Route::resource('admin/sub_category' , 'AdminSubCategoryController');


//================ FARMER ===============//

Route::get('farmer', function () {
    return view('layouts.inspinia_farmer');
});

Route::get('farmer/category', 'FarmerCategoryController@getCategory');

Route::get('farmer/sub_category', 'FarmerCategoryController@getSubCategory');

Route::resource('farmer/product', 'FarmProductController');

Route::get('farmer/selectCategory/', 'FarmProductController@getSelectCategory');