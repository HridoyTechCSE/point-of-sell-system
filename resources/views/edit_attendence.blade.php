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
                                        <h3 class="panel-title">update Attendence <h3 class="panel-title"> <a href="{{route('all.attendence')}}" class="btn btn-sm btn-info pull-right"> <b>All attendence</b> </a><br></h3></h3>
                                    </div>
                                    <h3 class="text-success" align="center">update Attendence {{ $date->att_date }}</h3>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table  class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>phone</th>
                                                            
                                                            <th>attendence</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                    <form action="{{ url('/update-attendence') }}" method="post">
                                                        @csrf
                                                    	@foreach($data as $row)
                                                        <tr>
                                                            <td>{{ $row->name }}</td>
                                                          
                                                            <td> <img src="{{URL::to($row->photo ) }}" alt="" style="height: 80px" width="80px"></td>
                                                            <input type="hidden" name="id[]" value="{{ $row->id }}">
                                                            <td>
                                                            	<input type="radio" name="attendence[{{ $row->id }}]" value="present" required  <?php
                                                                 
                                                               if($row->attendence == 'present'){
                                                                echo "checked";
                                                               }
                                                                ?>>present <br>
                                                                <input type="radio" name="attendence[{{ $row->id }}]" value="absence" <?php
                                                                 
                                                               if($row->attendence == 'absence'){
                                                                echo "checked";
                                                               }
                                                                ?> > absence
                                                            </td>



                                                            <input type="hidden" name="att_date" value="{{ date("d/m/y")}}">
                                                            <input type="hidden" name="att_year" value="{{ date("Y")}}">
                                                        </tr>
                                                        @endforeach
                                                           
                                                          
                                                    </tbody>
                                                </table>
                                                   
                                                <button type="submit" class="btn btn-info">update attendence</button>
                                           </form>

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