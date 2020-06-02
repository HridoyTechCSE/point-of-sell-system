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
                        	   <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">pay  salary</h3>
                                       <h1>{{ date("F Y") }}</h1>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>photo</th>
                                                            <th>salary</th>
                                                            <th>month</th>
                                                            <th>advance</th>
                                                           
                                                            
                                                            <th>action</th>
                                                        </tr>
                                                    </thead>
													<!-- return advance salary of employees 
                                           
                                             	$salary=DB::table('advance_salaries')
										    	->join('employees','advance_salaries.emp_id','employees.id')
										    	->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
										    	->orderBy('id','DESC')
										    	->get();
                                            

-->


                                                    <tbody>

                                                    	@foreach($employee as $row)
                                                        <tr>
                                                            <td>{{ $row->name }}</td>
                                                            <td><img src="{{ $row->photo }}" alt="" style="height: 80px" width="80px"></td>
                                                            <td>{{ $row->salary }}</td>
                                                            <td> <span class="badge badge-success"> {{ date("F" , strtotime('-1 months')) }}</span></td>
                                                           
                                            				<td></td>
                                                            
                                                            
                                                            <td>
                                                            	
                                                            	<a href="" class="btn btn-sm btn-primary">pay now</a>

                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                        <!-- End row-->



                    </div> <!-- container -->
                               
                </div> <!-- content -->






@endsection