@extends('layouts.app')

@section('content')

<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container" id="printableArea">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Invoice</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Pages</a></li>
                                    <li class="active">Invoice</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h4 class="text-right"><img src="images/logo_dark.png" alt="velonic"></h4>
                                                
                                            </div>
                                            <div class="pull-right">
                                                <h4>Order Date <br>
                                                    <strong> {{ $order->order_date}} </strong>
                                                   
                                                </h4>

                                               
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>name : {{ $order->name }}</strong><br>
                                                     shop name: {{ $order->shopname }} <br>
                                                     Address: {{ $order->address }} <br>
                                                      City : {{ $order->city }}<br>
                                                      <abbr title="Phone">P:</abbr> {{ $order->phone }}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Today's Date: </strong>  {{date('d/m/y')}} </p>

                                                    @if($order->order_status == 'success')
                                                        <p class="m-t-10"><strong>Order Status: </strong> <span class="badge badge-success">Success</span></p>
                                                    @else
                                                        <p class="m-t-10"><strong>Order Status: </strong> <span class="badge badge-danger">Pending</span></p>
                                                    @endif

                                                    <p class="m-t-10"><strong>Order ID: </strong> {{ $order->id }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr><th>#</th>
                                                            <th>Product Name</th>
                                                            <th>Product code</th>
                                                         
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>
														@php
														$s1=1;	
														@endphp
														
														@foreach($order_details as $cont)

                                                            <tr>
                                                                <td>{{ $s1++ }}</td>
                                                                <td>{{ $cont->product_name }}</td>
                                                                <td>{{ $cont->product_code }}</td>
                                                                <td>{{ $cont->quantity }}</td>
                                                                <td>{{ $cont->unitcost }}</td>
                                                                <td>{{ $cont->unitcost*$cont->quantity }}</td>
                                                               
                                                            </tr>
                                                         @endforeach   
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>







                                        <div class="row" style="border-radius: 0px;"> <hr>
                                            
                                            <div class="col-md-9">
                                                 <h3 >Payment By : {{ $order->payment_status }}</h3>
                                                 <h3 >Pay : {{ $order->pay }}</h3>
                                                 <h3 >Due : {{ $order->due }}</h3>
                                                
                                            </div>


                                            <div class="col-md-3 ">
                                                <p class="text-right"><b>Sub-total:</b>{{ $order->sub_total }}</p>
                                                
                                                <p class="text-right">VAT: {{ $order->vat }}</p>
                                                <hr>
                                                <h3 class="text-right">Total : {{ $order->total }}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        @if($order->order_status == 'success')

                                        @else

                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#"  
               onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href=" {{ URL::to('/pos-done/'.$cont->order_id)  }} " class="btn btn-primary waves-effect waves-light" >Approve</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>



            </div> <!-- container -->
                               
                </div> <!-- content -->

                

            </div>




@endsection