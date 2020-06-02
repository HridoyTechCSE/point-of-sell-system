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

                                @php
                                    $yearr=date("Y");
                                    $expensee=DB::table('expenses')->where('year',$yearr)->sum('amount');
                                @endphp
                                <h4 style="background-color: yellow; color: black;" align="center">tottal amount = {{$expensee}}</h4>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">{{ date("Y") }} All expense</h3>
                                        <a href="{{route('add.expense')}}" class="btn btn-sm btn-info pull-right"> <b>Add expense</b> </a><br>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                           
                                                            <th>details</th>
                                                           
                                                            <th>amount</th>
                                                           
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>

                                                    	@foreach($year as $row)
                                                        <tr>
                                                            <td>{{ $row->details }}</td>
                                                            
                                                            <td>{{ $row->amount }}</td>
                                                           
                            
                                                        
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