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
                                <div class="panel panel-info">
                                    <div class="panel-heading"><h3 class="panel-title">edite category</h3></div>
                                    <a href="{{route('all.category')}}" class="btn btn-sm btn-info pull-right"> <b>all category</b> </a><br>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/update-category/'.$cat->id)}}" method="post" >

                                        	@csrf



                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Category name</label>
                                                <input type="text" class="form-control" name="cat_name" value="{{$cat->cat_name}}" required>
                                            </div>
                                          

                                          	
                                            <button type="submit" class="btn btn-success waves-effect waves-light">update</button>
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