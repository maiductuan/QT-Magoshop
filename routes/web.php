<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\App;


//  dashboard
// Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/', 'HomeController@index');
// category
Route::get('danh-muc/tao-danh-muc', 'CategoryController@create'); 
Route::post('danh-muc/tao-danh-muc', 'CategoryController@store'); 
Route::get('admin/category/{id}/edit', 'CategoryController@edit'); 
Route::post('admin/category/update', 'CategoryController@update'); 
Route::get('danh-muc/delete/{id}', 'CategoryController@destroy'); 
// products
Route::get('san-pham/danh-sach-san-pham', 'ProductController@index');
Route::get('san-pham/tao-san-pham', 'ProductController@create'); 
Route::post('san-pham/tao-san-pham', 'ProductController@store');
Route::get('san-pham/edit/{id}', 'ProductController@redit');
Route::post('san-pham/update', 'ProductController@update');
Route::get('san-pham-delete/{id}',  'ProductController@destroy'); 
Route::get('admin/san-pham/{id}/show', 'ProductsController@show');
Route::get('get-post-slug', 'san-phamController@getSlug')->name('posts.getslug');


Route::get('admin/unactive-products/{id}', 'ProductsController@unactive'); 
Route::get('admin/active-products/{id}', 'ProductsController@active');
//workshop
Route::get('nhan-cung-cap/tao-nha-cung-cap', 'WorkshopController@create'); 
Route::post('nhan-cung-cap/tao-nha-cung-cap', 'WorkshopController@store'); 
Route::get('admin/workshop/{id}/edit', 'CategoryController@edit'); 
Route::post('admin/workshop/update', 'CategoryController@update'); 
Route::get('workshop-delete/{id}', 'WorkshopController@destroy'); 
//POS bán hàng
Route::get('pos-ban-hang', 'PosController@index');
Route::post('search', 'PosController@getSearchAjax')->name('pos-ban-hang');



// Cart
Route::get('add-cart-ajax', 'PosController@add_cart_ajax');
Route::post('save-cart', 'PosController@SaveCart'); 
Route::get('datele-to-cart/{rowId}', 'PosController@datele_to_cart');
// Users
Route::get('user/danh-sach-nguoi-dung', 'UsersController@index'); 
Route::post('user/tao-nguoi-dung', 'UsersController@store'); 
Route::get('user-delete/{id}', 'UsersController@destroy'); 

Route::post('search-nguoi-dung', 'UsersController@getSearchAjax');
// Nhân Viên
Route::get('nhan-vien/danh-sach-nhan-vien', 'NhanvienController@index'); 
Route::get('nhan-vien/tao-nhan-vien', 'NhanvienController@create'); 
Route::post('nhan-vien/tao-nhan-vien', 'NhanvienController@store'); 

