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
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title"> View supplier</h3></div>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/insert-employee')}}" method="post" enctype="multipart/form-data">

                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <p>{{ $supplier->name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <p>{{ $supplier->email }}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">phone</label>
                                               <p>{{ $supplier->phone }}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <p>{{ $supplier->address }}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">profession</label>
                                                <p>{{ $supplier->type }}</p>
                                            </div>

                                             <div class="form-group">
                                             	<img src="#" id="image" alt="">
                                                <label for="exampleInputPassword1">photo</label><br>
                                                <img src="{{URL::to($supplier->photo)  }}" alt="" height="80px" width="80px">
                                                
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">shop name</label>
                                                <p>{{ $supplier->shop }}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">account name</label>
                                                <p>{{ $supplier->accountholder }}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputPassword1">bank name</label>
                                                <p>{{ $supplier->bankname }}</p>
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">account number</label>
                                                <p>{{ $supplier->accountnumber }}</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">branch name</label>
                                                <p>{{ $supplier->branchname }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">city</label>
                                                <p>{{ $supplier->city }}</p>
                                            </div>
                                          
                                            
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                         </div>
                        <!-- End row-->



                    </div> <!-- container -->
                               
                </div> <!-- content -->






@endsection