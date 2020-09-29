<?php

use Illuminate\Support\Facades\Route;
// use Auth;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::match(['get','post'],'/','IndexController@Index');

Route::match(['get','post'],'/admin','AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>['auth']],function(){
  Route::match(['get','post'],'/admin/dashboard','AdminController@dashboard');


//Category
Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
Route::match(['get','post'],'/admin/view-categories','CategoryController@viewCategories');
Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
  Route::post('/admin/update-category-status','CategoryController@updateStatus');





  //Proudct
  Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
  Route::match(['get','post'],'/admin/view-products','ProductsController@viewProducts');
  Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
  Route::match(['get','post'],'/admin/delete-product/{id}','ProductsController@deleteProduct');
  Route::post('/admin/update-product-status','ProductsController@updateStatus');

  //Banners Route
  Route::post('/admin/banners','BannerssController@banners');

});

Route::get('/logout','AdminController@logout');
