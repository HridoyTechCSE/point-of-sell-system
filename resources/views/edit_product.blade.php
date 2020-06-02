@extends('layouts.app')

@section('content')
<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <div class="row">
                        	 <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">edit product</h3></div>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/update-product/'.$product->id)}}" method="post" enctype="multipart/form-data">

                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Name</label>
                                                <input type="text" class="form-control" name="product_name"  value="{{$product->product_name}}"  required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product code</label>
                                                <input type="text" class="form-control" name="product_code" value="{{ $product->product_code }}"   required>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">categories</label>
                                               @php
                                                   $cat=DB::table('categories')->get();
                                               @endphp
                                                <select name="cat_id" class="form-control">
                                                    @foreach($cat as $row)


                                                        <option value="{{$row->id}}" <?php  if($product->cat_id==$row->id){echo "selected"; }?> >{{$row->cat_name}}</option>
                                                    
                                                    @endforeach
                                                    
                                                </select>
                                            </div>

                                              <div class="form-group">
                                                <label for="exampleInputPassword1">suppliers</label>
                                               @php
                                                   $cat=DB::table('suppliers')->get();
                                               @endphp
                                                <select name="sup_id" class="form-control">
                                                    @foreach($cat as $row)
                                                        <option value="{{$row->id}}" <?php  if($product->sup_id==$row->id){echo "selected"; }?>>{{$row->name}}</option>
                                                    
                                                    @endforeach
                                                    
                                                </select>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Garage</label>
                                                <input type="text" class="form-control" name="product_garage"  value="{{$product->product_garage}}"  required>
                                            </div>

                                             

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Product Route</label>
                                                <input type="text" class="form-control" name="Product_route" value="{{$product->product_route}}"  required>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Buying Date</label>
                                                <input type="date" class="form-control" name="buy_date" value="{{$product->buy_date}}"  required>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">expire date</label>
                                                <input type="date" class="form-control" name="expire_date" value="{{$product->expire_date }}"  required>
                                            </div> <div class="form-group">
                                                <label for="exampleInputPassword1">buying price</label>
                                                <input type="text" class="form-control" name="buying_price" value="{{$product->buying_price}}"  required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">selling price</label>
                                                <input type="text" class="form-control" name="selling_price" value="{{$product->selling_price}}"  required>
                                            </div>
                                          

                                            <div class="form-group">
                                                <img src="#" id="image" alt="">
                                                <label for="exampleInputPassword1">photo</label>
                                                <input type="file"  name="product_image"  accept="image/*"  onchange="readURL(this);">
                                              
                                            </div>
                                                
                                                <input type="hidden"  name="old_photo" value="{{ $product->product_image }}">

                                             <div class="form-group">
                                                <img src="#" id="image" alt="">
                                                <label for="exampleInputPassword1">old photo</label>
                                               
                                                <img src="{{URL::to($product->product_image)}}"  height="100px" width="100px">
                                            </div>


                                            <button type="submit" class="btn btn-purple waves-effect waves-light">update</button>
                                        </form>

                                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                         </div>
                        <!-- End row-->



                    </div> <!-- container -->
                               
                </div> <!-- content -->



<script type="text/javascript">
	
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#image')
      .attr('src', e.target.result)
      .width(80)
      .height(80);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}


</script>


@endsection