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
                                        <h3 class="panel-title">All customer</h3>
                                        <a href="{{route('add.customer')}}" class="btn btn-sm btn-info pull-right"> <b>Add New</b> </a><br>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>phone</th>
                                                            <th>address</th>
                                                            <th>image</th>
                                                            <th>city </th>
                                                            <th>action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>

                                                    	@foreach($customer as $row)
                                                        <tr>
                                                            <td>{{ $row->name }}</td>
                                                            <td>{{ $row->phone }}</td>
                                                            <td>{{ $row->address }}</td>
                                                            <td> <img src="{{ $row->photo }}" alt="" style="height: 80px" width="80px"></td>
                                                            <td>{{ $row->city }}</td>
                                                            <td>
                                                            	<a href="{{ URL::to('edit-customer/'.$row->id) }}" class="btn btn-sm btn-info">edit</a>
                                                            	<a href="{{ URL::to('view-customer/'.$row->id) }}" class="btn btn-sm btn-info">view</a>
                                                            	<a href="{{ URL::to('delete-customer/'.$row->id) }}" id="delete" class="btn btn-sm btn-danger">delete</a>

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