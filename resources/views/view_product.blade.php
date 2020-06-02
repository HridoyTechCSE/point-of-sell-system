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
                                    <div class="panel-heading"><h3 class="panel-title">view product</h3></div>
                                    <div class="panel-body">
                                        <img src="{{URL::to($product->product_image)}}" height="300px" width="300px" alt="">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Name</label>
                                                <p>{{$product->product_name}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product code</label>
                                                <p>{{$product->product_code}}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">categories</label>
                                               <p>{{$product->cat_name}}</p>
                                            </div>

                                              <div class="form-group">
                                                <label for="exampleInputPassword1">suppliers</label>
                                              <p>{{$product->name}}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Garage</label>
                                               <p>{{$product->product_garage}}</p>
                                            </div>

                                             

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Product Route</label>
                                                  <p>{{$product->product_route}}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Buying Date</label>
                                                <p>{{$product->buy_date}}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">expire date</label>
                                                <p>{{$product->expire_date}}</p>
                                            </div> <div class="form-group">
                                                <label for="exampleInputPassword1">buying price</label>
                                                <p>{{$product->buying_price}}</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">selling price</label>
                                                <p>{{$product->selling_price}}</p>
                                            </div>
                                          

                                           

                                            

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



<


@endsection