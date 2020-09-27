<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
// use Illuminate\Support\Facades\Input;
use App\Products;


class ProductsController extends Controller
{
    public function addProduct(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            // echo "<pre>";print_r($data);die;

            $product=new Products;
            $product->name = $data['product_name'];
            $product->code = $data['product_code'];
            $product->color = $data['product_color'];
            if(!empty($data['product_description'])){
            $product->description = $data['product_description'];
            }
            else{
                $product->description='';
            };

            $product->price = $data['product_price'];

            //Upload image
            if($request->has('image')){
                echo $img_tmp = $request->file('image');

                //image code
                // $img_tmp=$request->image;
                $extension = $img_tmp->getClientOriginalExtension();
                if($img_tmp->isValid()){
                $filename=rand(111,999999).'.'.$extension;
                $img_path='uploads/products/'.$filename;

                //image resize
                Image::make($img_tmp)->resize(500,500)->save($img_path);

                $product->image =$filename;
            }
        }
            $product->save();
            return redirect('/admin/add-product')->with('flash_message_success','Product has been added successfully...');
        };
        return view('admin.products.add_product');
    }

    public function viewProducts(){
        $products = Products::get();
        return view('admin.products.view_products')->with(compact('products'));
    }

    public function editProduct(Request $request,$id=null){
        if($request->isMethod('post')){
            $data= $request->all();

            if($request->has('image')){
                echo $img_tmp = $request->file('image');

                //image code
                // $img_tmp=$request->image;
                $extension = $img_tmp->getClientOriginalExtension();
                if($img_tmp->isValid()){
                $filename=rand(111,999999).'.'.$extension;
                $img_path='uploads/products/'.$filename;

                //image resize
                Image::make($img_tmp)->resize(500,500)->save($img_path);

                }
            }else{
            $filename=$data['current_image'];
            }
            if(empty($data['product_description'])){
                $data['product_description']='';
            }
            Products::where(['id'=>$id])->update(['name'=>$data['product_name'],'code'=>$data['product_code'],
            'color'=>$data['product_color'],'description'=>$data['product_description'],'price'=>$data['product_price'],'image'=>$filename]);

            return redirect()->back()->with('flash_message_success','Product has been updated...');

        }
        $productDetails = Products::where(['id'=>$id])->first();
        return view('admin.products.edit-product')->with(compact('productDetails'));
    }
}