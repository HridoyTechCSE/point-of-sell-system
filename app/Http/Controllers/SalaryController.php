<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SalaryController extends Controller
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



    public function AddAdvanceSalary()
    {
    	return view('advance_salary');

    }

     public function AllSalary()
    {
    	$salary=DB::table('advance_salaries')
    	->join('employees','advance_salaries.emp_id','employees.id')
    	->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
    	->orderBy('id','DESC')
    	->get();

    	return view('all_advanced_salary', compact('salary'));

    }

 public function insertadvanced(Request $request)
    {
    	

    	$month=$request->month;
    	$emp_id=$request->emp_id;

    	$advanced=DB::table('advance_salaries')
    			->where('month',$month)
    			->where('emp_id',$emp_id)
    			->first();

    	if ($advanced === NULL){
    			$data=array();
    	$data['emp_id']=$request->emp_id;
    	$data['month']=$request->month;
    	$data['year']=$request->year;
    	$data['advanced_salary']=$request->advance_salary;

    	$advance=DB::table('advance_salaries')->insert($data);

    	if($advance)
                {
                     $notification=array(
                        'messege'=>' Successfully advance salary inserted',
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
    	}else{
    		$notification=array(
                        'messege'=>' already advanced paid in this month',
                        'alert-type'=>'error'
                    );
                    return redirect()->back()->with($notification);
    	}


    	
    }





public function PaySalary()
		{


		//$salary=DB::table('advance_salaries')
    	//->join('employees','advance_salaries.emp_id','employees.id')
    	//->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
    	//->orderBy('id','DESC')
    	//->get();



    	$employee=DB::table('employees')->get();

    	return view('pay_salary', compact('employee'));
		}



public function Addcategoryy(){


	return view('add_category');
}



public function insertCategory(Request $request){


	$data=array();
	$data['cat_name']=$request->cat_name;
	$cat=DB::table('categories')->insert($data);
	if($cat)
                {
                     $notification=array(
                        'messege'=>' Successfully category inserted',
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

public function Allcategory(){

$category=DB::table('categories')->get();

	return view('all_category', compact('category'));
}


public function Deletecategory($id)
{
	$dlt=DB::table('categories')->where('id',$id)->delete();
	if($dlt)
                {
                     $notification=array(
                        'messege'=>' Successfully category deleted',
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


public function editcategory($id)
{
	$cat=DB::table('categories')->where('id',$id)->first();
	return view('edit_category')->with('cat', $cat);
}




public function updatecategory(Request $request, $id)
	{
		$data=array();
		$data['cat_name']=$request->cat_name;
		$data=DB::table('categories')->where('id',$id)->update($data);

		if($data)
                {
                     $notification=array(
                        'messege'=>' Successfully category updated',
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



	




}
