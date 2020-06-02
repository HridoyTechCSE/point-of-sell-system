<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;
class EmployeeController extends Controller
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












    public function index(){

    	return view('add_employee');
    }


     public function store(Request $request){

     		 $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:employees|max:255',
        'nid_no' => 'required|unique:employees|max:255',
        'address' => 'required',
        'phone' => 'required|max:255',
        'photo' => 'required',
        'salary' => 'required',
    ]);

     	$data=array();
     	$data['name']=$request->name;
     	$data['email']=$request->email;
     	$data['phone']=$request->phone;
     	$data['address']=$request->address;
     	$data['experience']=$request->experience;
     	$data['nid_no']=$request->nid_no;
     	$data['salary']=$request->salary;
     	$data['vacation']=$request->vacation;
     	$data['city']=$request->city;
     	$image = $request->file('photo');


    if($image)
        {
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension() );
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            
            if($success)
            {
                $data['photo']=$image_url;
                $employee=db::table('employees')->insert($data);
                if($employee)
                {
                     $notification=array(
                        'messege'=>' Successfully Employee inserted',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('home')->with($notification);
                    
                }else{
                    $notification=array(
                        'messege'=>' error',
                        'alert-type'=>'success'
                    );
                    return redirect()->back()->with($notification);
                    
                }
                
            
        }
        else{
            return redirect()->back();
        }
       
    }else
    {
    	return redirect()->back();
    }
     
}

public function AllEmployess(){

		$employees=Employee::all();
		return view('all_employee', compact('employees'));
}




public function ViewEmployee($id)
{

	$single=DB::table('employees')
			->where('id',$id)
			->first();
		return view('view_employee', compact('single'));

}



public function DeleteEmployee($id)
{

	$delete=DB::table('employees')
			->where('id',$id)
			->first();


$photo=$delete->photo;
unlink($photo);
$dltuser=DB::table('employees')
			->where('id',$id)
			->delete();

			if($dltuser)
                {
                     $notification=array(
                        'messege'=>' Successfully Employee deleted',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('all.employee')->with($notification);
                    
                }else{
                    $notification=array(
                        'messege'=>' error',
                        'alert-type'=>'success'
                    );
                    return redirect()->back()->with($notification);
                    
                }


		

}




public function editEmployee($id)
		{

			$edit=DB::table('employees')
			->where('id',$id)
			->first();
			return view('edit_employee', compact('edit'));
		}

public function updateemployee(Request $request, $id)
		{
				$validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'nid_no' => 'required|max:255',
        'address' => 'required',
        'phone' => 'required|max:255',
        
        'salary' => 'required',
    ]);

     	$data=array();
     	$data['name']=$request->name;
     	$data['email']=$request->email;
     	$data['phone']=$request->phone;
     	$data['address']=$request->address;
     	$data['experience']=$request->experience;
     	$data['nid_no']=$request->nid_no;
     	$data['salary']=$request->salary;
     	$data['vacation']=$request->vacation;
     	$data['city']=$request->city;
     	$image = $request->photo;


    if($image)
        {
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension() );
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            
            if($success)
            {
                $data['photo']=$image_url;
                $img=db::table('employees')->where('id',$id)->first();

                $image_path = $img->photo;
                $done=unlink($image_path);
                $user=DB::table('employees')->where('id',$id)->update($data);
                if($user)
                {
                     $notification=array(
                        'messege'=>' Employee update successfully',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('all.employee')->with($notification);
                    
                }else{
                    $notification=array(
                        'messege'=>' error',
                        'alert-type'=>'success'
                    );
                    return redirect()->back()->with($notification);
                    
                }
                
            
        }
        else{
            return redirect()->back();
        }
       
    }else
    {
    	$oldphoto=$request->old_photo;
        if($oldphoto)
            {
                $data['photo']=$oldphoto;
               
                $user = DB::table('employees')->where('id',$id)->update($data);
                if($user)
                {
                     $notification=array(
                        'messege'=>' Successfully employees updated',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('all.employee')->with($notification);
                    
                }else{
                    $notification=array(
                        'messege'=>' error',
                        'alert-type'=>'success'
                    );
                    return redirect()->back()->with($notification);
                    
                }
                
            
        }
    }

		}




}
