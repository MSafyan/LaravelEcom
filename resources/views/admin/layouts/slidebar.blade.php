 <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
         <aside class="main-sidebar">
          <!-- sidebar -->
          <div class="sidebar">
             <!-- sidebar menu -->
             <ul class="sidebar-menu">
                <li class="active">
                <a href="{{url('/dashboard')}}"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                   <span class="pull-right-container">
                   </span>
                   </a>
                </li>
                <li class="treeview">
                   <a href="#">
                   <i class="fa fa-product-hunt"></i><span>Category</span>
                   <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                   </span>
                   </a>
                   <ul class="treeview-menu">
                   <li><a href="{{url('/admin/add-category')}}">Add Category</a></li>
                   <li><a href="{{url('/admin/view-categories')}}">View Categories</a></li>
                   </ul>
                </li><li class="treeview">
                   <a href="#">
                   <i class="fa fa-product-hunt"></i><span>Product</span>
                   <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                   </span>
                   </a>
                   <ul class="treeview-menu">
                   <li><a href="{{url('/admin/add-product')}}">Add Product</a></li>
                   <li><a href="{{url('/admin/view-products')}}">View Products</a></li>
                   </ul>
                </li>
               
             </ul>
          </div>
          <!-- /.sidebar -->
       </aside>


       {{-- <script>
          $(document).ready(function(){
            $('#table_id').DataTable();
            $(".ProductStatus").change(function(){
              var id = $(this).attr('rel');

              if(($this).prop("checked")==true){
                $.ajax({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type:'post',
                  url:'/admin/update-product-success',
                  data: {status:'1',id:id},
                  success:function(data){
                    $("#message_success").show();
                    setTimeout(function(){
                      $("#message_success").fadeout('slow');
                    },2000);
                  },error:function(){
                    alert("Error")
                  }
                });
              }else{
                $.ajax({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type:'post',
                  url:'/admin/update-product-success',
                  data: {status:'0',id:id},
                  success:function(resp){
                    $("#message_error").show();
                    setTimeout(function(){
                      $("#message_error").fadeout('slow');
                    },2000);
                  },error:function(){
                    alert("Error")
                  }
                });
              }
            })
          })
          <script> --}}