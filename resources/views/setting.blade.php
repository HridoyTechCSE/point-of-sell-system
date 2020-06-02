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
                                    <div class="panel-heading"><h3 class="panel-title">Update company information</h3></div>
                                    <div class="panel-body">


                                        <form role="form" action="{{ url('/update-website/'.$setting->id)}}" method="post" enctype="multipart/form-data">

                                           

                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Company Name</label>
                                                <input type="text" class="form-control" name="company_name" value="{{ $setting->company_name }}"  required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Company Email</label>
                                                <input type="email" class="form-control" name="company_email" value="{{ $setting->company_email }}" required>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Company phone</label>
                                                <input type="text" class="form-control" name="company_phone" value="{{ $setting->company_phone }}" required>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Company Mobile</label>
                                                <input type="text" class="form-control" name="company_mobile" value="{{ $setting->company_mobile }}" required>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Company Address</label>
                                                <input type="text" class="form-control" name="company_address" value="{{ $setting->company_address }}" required>
                                            </div>

                                             <div class="form-group">
                                             	<img src="#" id="image" alt="">
                                                <label for="exampleInputPassword1">company photo</label>
                                                <input type="file"  name="company_logo" accept="image/*"  onchange="readURL(this);">
                                            </div>

                                            <div class="form-group">
                                            	

                                            	<img src="{{ URL::to($setting->company_logo) }}"   width="80px" height="80px">

                                                <input type="hidden" name="old_photo" value="{{ URL::to($setting->company_logo) }}">
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">company city</label>
                                                <input type="text" class="form-control" name="company_city" value="{{ $setting->company_city }}" required>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">company country</label>
                                                <input type="text" class="form-control" name="company_country" value="{{ $setting->company_country }}" required>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">company zipcode</label>
                                                <input type="text" class="form-control" name="company_zipcode" value="{{ $setting->company_zipcode }}" required>
                                           
                                          
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
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