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
                                        <h3 class="panel-title">All product</h3>
                                        <a href="{{route('add.customer')}}" class="btn btn-sm btn-info pull-right"> <b>Add New</b> </a><br>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th> Product Name </th>
                                                            <th> Product code </th>
                                                            <th>selling price</th>
                                                            <th>image</th>
                                                            <th>garage</th>
                                                            <th>route </th>
                                                            <th>action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>

                                                    	@foreach($product as $row)
                                                        <tr>
                                                            <td>{{ $row->product_name }}</td>
                                                            <td>{{ $row->product_code }}</td>
                                                            <td>{{ $row->selling_price }}</td>
                                                            <td> <img src="{{ $row->product_image }}" alt="" style="height: 80px" width="80px"></td>
                                                            <td>{{ $row->product_garage }}</td>
                                                            <td>{{ $row->product_route }}</td>
                                                            <td>
                                                            	<a href="{{ URL::to('edit-product/'.$row->id) }}" class="btn btn-sm btn-info">edit</a>
                                                            	<a href="{{ URL::to('view-product/'.$row->id) }}" class="btn btn-sm btn-info">view</a>
                                                            	<a href="{{ URL::to('delete-product/'.$row->id) }}" id="delete" class="btn btn-sm btn-danger">delete</a>

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