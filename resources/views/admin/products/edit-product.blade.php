@extends('admin.layouts.master')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
     <div class="header-icon">
        <i class="fa fa-product-hunt"></i>
     </div>
     <div class="header-title">
        <h1>Edit Product</h1>
        <small>Edit Product</small>
     </div>
  </section>

    @if(Session::has('flash_message_error'))
    <div class="alert alert-sm alert-danger alert-block">
      <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>{{!! session('flash_message_error') !!}}</strong>
    </div>
    @endif
        
    

    @if(Session::has('flash_message_success'))
    <div class="alert alert-sm alert-success alert-block" role="alert">
      <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>{{!! session('flash_message_success') !!}}</strong>
    </div>
    @endif

  <!-- Main content -->
  <section class="content">
     <div class="row">
        <!-- Form controls -->
        <div class="col-sm-12">
           <div class="panel panel-bd lobidrag">
              <div class="panel-heading">
                 <div class="btn-group" id="buttonlist"> 
                    <a class="btn btn-add " href="{{url('/admin/view-products')}}"> 
                    <i class="fa fa-eye"></i>  View Products </a>  
                 </div>
              </div>
              <div class="panel-body">
              <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/edit-product/'.$productDetails->id)}}" method="post">{{csrf_field()}}
                    <div class="form-group">
                       <label>Product Name</label>
                       <input type="text" class="form-control" placeholder="Enter Product Name..." 
                       value="{{$productDetails->name}}"
                       name="product_name" id="product_name" required>
                    </div>
                    <div class="form-group">
                       <label>Product Code</label>
                       <input type="text" class="form-control" placeholder="Enter Product Code..."
                       value="{{$productDetails->code}}"
                       name="product_code"
                       id="product_code"
                       required>
                    </div>
                    <div class="form-group">
                       <label>Product Color</label>
                       <input type="text" class="form-control" placeholder="Enter Product Color" 
                       value="{{$productDetails->color}}"
                       name="product_color"
                       id="product_color"
                       required>
                    </div>
                    <div class="form-group">
                       <label>Product description</label>
                       <textarea class="form-control"
                       id="product_description"
                       name="product_description"
                       value="{{$productDetails->description}}"
                       cols="30"
                       rows="10"
                       ></textarea>
                    </div>
                    <div class="form-group">
                   
                    <div class="form-group">
                      <label>Product Price</label>
                       <input type="text" class="form-control" placeholder="Enter Price" 
                       value="{{$productDetails->price}}"
                       id="product_price"
                       name="product_price"
                       required>
                      </div>
                      <div class="form-group">
                         <label>Picture upload</label>
                         <input type="file" name="current_image">
                      <input type="hidden" name="current_image" value="{{$productDetails->image}}">
                      @if(!empty($productDetails->image))
                      <img style="width:100px;margin-top:10px;" src="{{asset('/uploads/products/'.$productDetails->image)}}"/>
                      @endif
                      </div>
                      <div class="reset-button">
                        <input type="submit" class="btn btn-success" value="Update Product">
                      </div>
                 </form>
              </div>
           </div>
        </div>
     </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection