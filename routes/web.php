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

Route::match(['get','post'],'/admin/dashboard','AdminController@dashboard');
