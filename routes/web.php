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
  Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
  Route::match(['get','post'],'/admin/view-products','ProductsController@viewProducts');
  Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
  Route::match(['get','post'],'/admin/delete-product/{id}','ProductsController@deleteProduct');

});

Route::get('/logout','AdminController@logout');