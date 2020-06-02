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
                                        <h3 class="panel-title"><a href="{{route('take.attendence')}}" class="btn btn-sm btn-info pull-right"> <b>take new attendence</b> </a><br></h3>
                                        
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl</th>
                                                            <th>name</th>
                                                           
                                                            <th>action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
													<?php 
													$s1=1;

													?>


                                                    	@foreach($all_att as $row)
                                                        <tr>
                                                            <td>{{ $s1++ }}</td>
                                                            
                                                            <td>{{ $row->edit_date }}</td>
                                                           
                            
                                                            <td>
                                                            	<a href="{{ URL::to('/edit-attendence/'.$row->edit_date) }}" class="btn btn-sm btn-info">edit</a>
                                                                <a href="" class="btn btn-sm btn-info">delete</a>
                                                                <a href="{{ URL::to('/view-attendence/'.$row->edit_date) }}" class="btn btn-sm btn-info">view</a>
                                                            	
                                                            	

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