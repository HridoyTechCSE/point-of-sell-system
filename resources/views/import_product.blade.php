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
                        	 <div class="col-md-8">
                                <div class="panel panel-info">
                                    <div class="panel-heading"><h3 class="panel-title">Product import <a href="{{route('export')}}" class="btn btn-sm btn-danger pull-right"> <b>export Xlsx</b> </a></h3> </div>
                                    <br>
                                    <div class="panel-body">
                                        <form role="form" action="{{ route('import')}}" method="post"  enctype="multipart/form-data">

                                        	@csrf



                                             <div class="form-group">
                                                <label for="exampleInputPassword1">XLxs file import</label>
                                                <input type="file" name="import_file"  required>
                                            </div>
                                          

                                          	
                                            <button type="submit" class="btn btn-success waves-effect waves-light">upload</button>
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