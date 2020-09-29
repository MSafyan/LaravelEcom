<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BannersController extends Controller
{
  public function banners(){
    return view('admin.banner.banners');
  }
}
