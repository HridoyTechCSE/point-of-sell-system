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
                                        <h3 class="panel-title">All Pending order</h3>
                                        <a href="{{route('add.customer')}}" class="btn btn-sm btn-info pull-right"> <b>Add New</b> </a><br>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>  Name </th>
                                                            <th> Date</th>
                                                            <th>Quantity</th>
                                                            <th>Total Amount</th>
                                                            <th>Payment</th>
                                                            <th>Order Status </th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>

                                                    	@foreach($pending as $row)
                                                        <tr>
                                                            <td>{{ $row->name }}</td>
                                                            <td>{{ $row->order_date }}</td>
                                                            <td>{{ $row->total_products }}</td>
                                                            <td> {{ $row->total }}</td>
                                                            <td>{{ $row->payment_status }}</td>
                                                            <td> <span class="badge badge-danger"> {{ $row->order_status }}</span></td>
                                                            <td>
                                                            	
                                                            	<a href="{{ URL::to('view-order-status/'.$row->id) }}" class="btn btn-sm btn-info">view</a>
                                                            	

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