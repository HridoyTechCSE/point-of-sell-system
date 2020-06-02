@extends('layouts.app')

@section('content')
<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">

                        	
                            <div class="col-sm-12 bg-info">
                                <h1 class="pull-left page-title text-white">Welcome !</h1>
                                <ol class="breadcrumb pull-right">
                                   
                                    <li class="active "><h1 class="text-white">date: {{ date('d/m/y') }}</h1>  </li>
                                </ol>
                            </div>
                        </div>
						
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="portfolioFilter">

									<br>
<br>
<br>
									@foreach($categories as $row)
										<a href="" data-filter="*" class="current">{{ $row->cat_name }}</a>
									@endforeach
									<br>
<br>
<br>
								</div>

							</div>

</div>
                       <div class="row">
                       	<div class="col-lg-4">
                       		

<div class="price_card text-center">
                                       
                                        <ul class="price-features">
                                            <table class="table">
                                            	
												<thead>
													<tr>
														<th>Name</th>
														<th>Qty</th>
														<th>Price</th>
														<th>Sub Total</th>
														<th>Action</th>
													</tr>
												</thead>
													@php
														$cart_product=Cart::content();
													@endphp




												<tbody>
													@foreach ($cart_product as $prod)
														{{-- expr --}}
													

													<tr>
														<th> {{ $prod->name }} </th>
														<th> 
															<form action=" {{ url('/cart-update/'.$prod->rowId) }} " method="post">
																@csrf
															<input type="number" name="qty" value="{{ $prod->qty }}" style="width: 50px; "> 
															<button type="submit" class="btn btn-sm btn-success" style="margin-top: 0px;position: relative;left: 12px;"> <i class="fa fa-check"></i> </button>


															</form>

														</th>
														<th>{{ $prod->price }}</th>
														<th>{{ $prod->price*$prod->qty }}</th>
														<th> <a href="{{ URL::to('/cart-remove/'.$prod->rowId) }}"><i class="fa fa-trash text-danger" style="font-size: 25px;"></i></a>   </th>
													</tr>

													@endforeach
												</tbody>
                                            </table>
                                            
                                        </ul>

                                         <div class="pricing-header bg-primary">
                                         	<p>Quantity : {{ Cart::count() }}</p>
                                         	<p>Sub Total: {{ Cart::subtotal() }}</p>
                                         	<p>vat:  {{ Cart::tax() }}</p>
                                         	<hr>
                                            <span class="price">Total:{{ Cart::total() }}</span>
                                           
                                        </div>
                                        
                                        <form action="{{ url('/invoice') }}" method="post">
                        		@csrf

                        		<div class="panel">
                       			
                       			<h4 class="text-info">Customer
                       				<a href="" class="btn btn-sm btn-primary pull-right waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Add New</a>
                       			</h4>
								@if ($errors->any())
								    <div class="alert alert-danger">
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif
								<select name="cus_id"  class="form-control">
									
									<option disabled="" selected="">select customer</option>
									@foreach($customer as $cus)
									<option value="{{ $cus->id }}">{{ $cus->name }}</option>
									@endforeach()
								</select>



</div>
                                    <button type="submit" class="btn btn-primary">Create Invoice</button>


						
                       		</div>


                       	</div>


 
</form>




						<div class="col-lg-7 col-sm-offset-1">



							<table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                           <th>Image</th>
                                                            <th>name</th>
                                                            <th></th>
                                                           
                                                           
                                                            <th>category</th>
                                                            <th>product code</th>
                                                           
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
														@foreach($product as $row)
														
                                                        <tr>
															<form action="{{ url('/add-cart') }}" method="post">
                                                        	@csrf
                                                        	
															<input type="hidden" name="id" value="{{ $row->id }}">
															<input type="hidden" name="name" value="{{ $row->product_name }}">
															<input type="hidden" name="qty" value="1">
															<input type="hidden" name="price" value="{{ $row->selling_price }}">



                                                            <td>

															

                                                             <img src="{{ URL::to($row->product_image) }}" alt="" width="60px" height="60px"> </td>
                                                            
                                                            <td>{{ $row->product_name }}</td>
                                                            <td>{{ $row->cat_name }}</td>
                                                            <td>{{ $row->product_code }}</td>
                                                            <td> <button class="btn btn-info btn-sm"> <i class="fa fa-plus-square"></i> </button> </td>
                            								
                                                            </form>
                                                        </tr>
                                                        
                                                        @endforeach
                                                       
                                                    </tbody>
                                                </table>
						</div>

                       </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->


<form action="{{ url('insert-customer') }}" method="POST" enctype="multipart/form-data">
   @csrf         
  <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog"> 
                                                <div class="modal-content"> 
                                                    <div class="modal-header "> 
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                                        <h4 class="modal-title text-white">Add a new Customer</h4> 
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

                                                    <div class="modal-body"> 
                                                        
                                                        
                                                        <div class="row"> 
                                                            <div class="col-md-4"> 
                                                                <div class="form-group"> 
                                                                    <label for="field-4" class="control-label">name</label> 
                                                                    <input type="text" class="form-control" id="field-4" name="name"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-4"> 
                                                                <div class="form-group"> 
                                                                    <label for="field-5" class="control-label">email</label> 
                                                                    <input type="email" class="form-control" id="field-5" name="email"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-4"> 
                                                                <div class="form-group"> 
                                                                    <label for="field-6" class="control-label">phone</label> 
                                                                    <input type="text" class="form-control" id="field-6" name="phone"> 
                                                                </div> 
                                                            </div> 
                                                        </div> 


                                                         <div class="row"> 
                                                            <div class="col-md-4"> 
                                                                <div class="form-group"> 
                                                                    <label for="field-4" class="control-label">address</label> 
                                                                    <input type="text" class="form-control" id="field-4" name="address"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-4"> 
                                                                <div class="form-group"> 
                                                                    <label for="field-5" class="control-label">shop name</label> 
                                                                    <input type="text" class="form-control" id="field-5" name="shopname"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-4"> 
                                                                <div class="form-group"> 
                                                                    <label for="field-6" class="control-label">city</label> 
                                                                    <input type="text" class="form-control" id="field-6" name="city"> 
                                                                </div> 
                                                            </div> 
                                                        </div> 


                                                         <div class="row"> 
                                                            <div class="col-md-4"> 
                                                                <div class="form-group"> 
                                                                    <label for="field-4" class="control-label">account number </label> 
                                                                    <input type="text" class="form-control" id="field-4" name="account_number"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-4"> 
                                                                <div class="form-group"> 
                                                                    <label for="field-5" class="control-label">account holder</label> 
                                                                    <input type="text" class="form-control" id="field-5" name="account_holder"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-4"> 
                                                                <div class="form-group"> 
                                                                    <label for="field-6" class="control-label">bank name</label> 
                                                                    <input type="text" class="form-control" id="field-6" name="bank_name"> 
                                                                </div> 
                                                            </div> 
                                                        </div> 

                                                          <div class="row"> 
                                                            <div class="col-md-4"> 
                                                                <div class="form-group"> 
                                                                    <label for="field-4" class="control-label"> bank branch </label> 
                                                                    <input type="text" class="form-control" id="field-4" name="bank_branch"> 
                                                                </div> 
                                                            </div> 

                                                            <div class="col-md-4"> 
                                                               <img src="#" id="image" alt="">
                                                <label for="exampleInputPassword1">photo</label>
                                              
                                                            </div> 

                                                            <div class="col-md-4"> 
                                                                <div class="form-group"> 
                                                                    <label for="field-4" class="control-label"> photo </label> 
                                                                    <input type="file"  name="photo" accept="image/*" class="upload" required onchange="readURL(this);">
                                                                </div> 
                                                            </div> 
                                                            
                                                        </div> 


                                                        
                                                    </div> 
                                                    <div class="modal-footer"> 
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                                                        <button type="submit" class="btn btn-info waves-effect waves-light">Add Customer</button> 
                                                    </div> 
                                                </div> 
                                            </div>
                                        </div><!-- /.modal -->

</form>




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
