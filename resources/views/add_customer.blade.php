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
                                    <div class="panel-heading"><h3 class="panel-title">Add customer</h3></div>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/insert-customer')}}" method="post" enctype="multipart/form-data">

                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Customer Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">phone</label>
                                                <input type="text" class="form-control" name="phone" placeholder="phone" required>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="Address" required>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Shop Name</label>
                                                <input type="text" class="form-control" name="shop_name" placeholder="Shop name" required>
                                            </div>

                                             <div class="form-group">
                                             	<img src="#" id="image" alt="">
                                                <label for="exampleInputPassword1">photo</label>
                                                <input type="file"  name="photo" accept="image/*" class="upload" required onchange="readURL(this);">
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">account holder</label>
                                                <input type="text" class="form-control" name="account_holder" placeholder="account holder" required>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">account number</label>
                                                <input type="text" class="form-control" name="account_number" placeholder="account number" required>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">bank name</label>
                                                <input type="text" class="form-control" name="bank_name" placeholder="bank name" required>
                                            </div> <div class="form-group">
                                                <label for="exampleInputPassword1">bank branch</label>
                                                <input type="text" class="form-control" name="bank_branch" placeholder="bank branch" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">city</label>
                                                <input type="text" class="form-control" name="city" placeholder="city" required>
                                            </div>
                                          
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
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