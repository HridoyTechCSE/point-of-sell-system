<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ExpenseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function Addexpense(){

    	return view('add_expense');
    }


   public function insertexpense(Request $request)
   {

   		$data= array();
   		$data['details']=$request->details;
   		$data['amount']=$request->amount;
   		$data['date']=$request->date;
   		$data['month']=$request->month;
   		$data['year']=$request->year;

$exp=DB::table('expenses')
			->insert($data);
			

			if($exp)
                {
                     $notification=array(
                        'messege'=>' Successfully expense inserted',
                        'alert-type'=>'success'
                    );
                    return redirect()->back()->with($notification);
                    
                }else{
                    $notification=array(
                        'messege'=>' error',
                        'alert-type'=>'success'
                    );
                    return redirect()->back()->with($notification);
                    
                }
   }




public function todayexpense()
{    
	$date=date("d/m/y");
	$today=DB::table('expenses')->where('date',$date)->get();
	return view('today_expense', compact('today'));

}

public function edittodayexpense($id)
{
	$tdy=DB::table('expenses')->where('id',$id)->first();

	return view('edit_today_expense', compact('tdy'));
}

public function updateexpense(Request $request,$id)

{
$data= array();
   		$data['details']=$request->details;
   		$data['amount']=$request->amount;
   		$data['date']=$request->date;
   		$data['month']=$request->month;
   		$data['year']=$request->year;

$exp=DB::table('expenses')
			->where('id',$id)->update($data);
			

			if($exp)
                {
                     $notification=array(
                        'messege'=>' Successfully expense updated',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('today.expense')->with($notification);
                    
                }else{
                    $notification=array(
                        'messege'=>' error',
                        'alert-type'=>'success'
                    );
                    return redirect()->back()->with($notification);
                    
                }

}



public function monthlyexpense()
{

  $month=date("F");
  $expense=DB::table('expenses')->where('month',$month)->get();
  return view('monthly_expense', compact('expense'));
}



public function yearlyexpense()
{

  $year=date("Y");
  $year=DB::table('expenses')->where('year',$year)->get();
  return view('yearly_expense', compact('year'));
}




}
