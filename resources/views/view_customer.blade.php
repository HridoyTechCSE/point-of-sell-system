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
                                    <div class="panel-heading"><h3 class="panel-title"> View customer</h3></div>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/insert-employee')}}" method="post" enctype="multipart/form-data">

                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <p>{{ $single->name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <p>{{ $single->email }}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">phone</label>
                                               <p>{{ $single->phone }}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <p>{{ $single->address }}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">shop name</label>
                                                <p>{{ $single->shopname }}</p>
                                            </div>

                                             <div class="form-group">
                                             	<img src="#" id="image" alt="">
                                                <label for="exampleInputPassword1">photo</label><br>
                                                <img src="{{URL::to($single->photo)  }}" alt="" height="80px" width="80px">
                                                
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">city</label>
                                                <p>{{ $single->city }}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">account holder</label>
                                                <p>{{ $single->account_holder }}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">account number</label>
                                                <p>{{ $single->account_number }}</p>
                                            </div> <div class="form-group">
                                                <label for="exampleInputPassword1">bank name</label>
                                                <p>{{ $single->bank_name }}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">branch name</label>
                                                <p>{{ $single->bank_branch }}</p>
                                            </div>
                                          
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                         </div>
                        <!-- End row-->



                    </div> <!-- container -->
                               
                </div> <!-- content -->






@endsection