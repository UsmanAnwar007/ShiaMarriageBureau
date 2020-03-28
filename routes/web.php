<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('admin.login');
});
Route::get('/admin', 'AdminController@showAdminLoginForm');
Route::post('/admin/login', 'AdminController@adminLogin');
Route::get('/admin/logout','AdminController@adminlogout');
Route::group(['prefix'=>'admin','middleware'=>['isAdmin']],function(){
    Route::get('/dashboard','AdminController@dashboard');
    Route::get('/users', 'AdminController@manageusers');
    // Route::post('/shopperstatus/{id}','AdminController@shopperstatus');
    // Route::post('/deleteshopper/{id}','AdminController@deleteshopper');
    // Route::get('/retailers', 'AdminController@manageretailers');
    // Route::post('/retailerstatus/{id}','AdminController@retailerstatus');
    // Route::post('/deleteretailer/{id}','AdminController@deleteretailer');

    // Route::get('/category','CategoryController@index');
    // Route::post('/addcategory','CategoryController@addcategory');
    // Route::get('/managecategory','CategoryController@managecategory');
    // Route::get('/deletecategory/{id}','CategoryController@destroy');
    // Route::get('/editcategory/{id}','CategoryController@edit');
    // Route::post('/updatecategory','CategoryController@update');


    // Route::get('/subcategory','SubcategoryController@index');

    // Route::post('/addsubcategory','SubcategoryController@insert');
	// 	Route::get('/managesubcategory','SubcategoryController@managesubcategory');
	// 	Route::post('/deletesubcategory/{id}','SubcategoryController@destroy');
	// 	Route::get('/editsubcategory/{id}','SubcategoryController@edit');
	// 	Route::post('/updatesubcategory','SubcategoryController@update');
		
});
    