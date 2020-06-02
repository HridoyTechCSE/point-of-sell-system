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
                                    <div class="panel-heading"><h3 class="panel-title">Advance Salary Provide</h3></div>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/insert-advancesalary')}}" method="post" enctype="multipart/form-data">

                                        	@csrf



                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Employee </label>

													@php
														$emp=DB::table('employees')->get();
													@endphp

                                                <select  name="emp_id" id="" class="form-control">
                                                	
                                                	<option disabled="" selected="" ></option>
                                                	@foreach($emp as $row)
                                                	<option value="{{$row->id}}" >{{$row->name}}</option>
                                                	@endforeach
                                                </select>
                                            </div>
                                          
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">supplier type</label>
                                                <select  name="month" id="" class="form-control">
                                                	
                                                	<option disabled="" selected="" ></option>
                                                	<option value="january" >january</option>
                                                	<option value="February" >February</option>
                                                	<option value="March" >March</option>
                                                	<option value="April" >April</option>
                                                	<option value="May" >May</option>
                                                	<option value="June" >June</option>
                                                	<option value="July" >July</option>
                                                	<option value="August" >August</option>
                                                	<option value="September" >September</option>
                                                	<option value="October" >October</option>
                                                	<option value="November" >November</option>
                                                	<option value="December" >December</option>
                                                	
                                                </select>
                                            </div>
                                          

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Advance salary</label>
                                                <input type="text" class="form-control" name="advance_salary" placeholder="Advance salary" >
                                            </div>
                                          

                                          	 <div class="form-group">
                                                <label for="exampleInputPassword1">Year</label>
                                                <input type="text" class="form-control" name="year" placeholder="Year" >
                                            </div>
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
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