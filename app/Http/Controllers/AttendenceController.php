<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Attendence;
class AttendenceController extends Controller
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




    public function takeattendence(){

    	$employee=DB::table('employees')->get();
    	return view('take_attendence', compact('employee'));
    }

    public function insertattendence(Request $request)
    {

    	$date=$request->att_date;
    	$att_date=DB::table('attendences')->where('att_date',$date)->first();

    	if ($att_date) {
    		$notification=array(
                        'messege'=>' Todays atendence allready taken ',
                        'alert-type'=>'error'
                    );
                    return redirect()->back()->with($notification);
    	}else{

		foreach ($request->user_id as $id) {
		    		$data[]=[
		    			"user_id"=>$id,
		    			"attendence"=>$request->attendence[$id],
		    			"att_date"=>$request->att_date,
		    			"att_year"=>$request->att_year,
                        "month"=>$request->month,
		    			"edit_date"=>date("d_m_y")

		    		];
		    	}

		$att=DB::table('attendences')->insert($data);
		if($att)
		                {
		                     $notification=array(
		                        'messege'=>' Successfully attedence taken',
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
  public function allattendence()
    {
    	
    	$all_att=DB::table('attendences')->select('edit_date')->groupBy('edit_date')->get();
    	return view('all_attendence', compact('all_att'));
    }


public function editattendence($edit_date)
		{

$date=DB::table('attendences')->where('edit_date',$edit_date)->first();

$data=DB::table('attendences')->join('employees','attendences.user_id','employees.id','employees.id')->select('employees.name','employees.photo','attendences.*')->where('edit_date',$edit_date)->get();
    	return view('edit_attendence', compact('data','date'));
		}





        public function updateattendence(Request $request)
        {
                foreach ($request->id as $id) {
                    $data=[
                        
                        "attendence"=>$request->attendence[$id],
                        "att_date"=>$request->att_date,
                        "att_year"=>$request->att_year,
                        "month"=>$request->month,
                        

                    ];

                    $attendence=Attendence::where(['att_date' =>$request->att_date, 'id'=>$id])->first();
                    $attendence->update($data);


                }


                if($attendence)
                        {
                             $notification=array(
                                'messege'=>' Successfully attedence updated',
                                'alert-type'=>'success'
                            );
                            return redirect()->route('all.attendence')->with($notification);
                            
                        }else{
                            $notification=array(
                                'messege'=>' error',
                                'alert-type'=>'success'
                            );
                            return redirect()->back()->with($notification);
                            
                        }
                }
        


                public function viewattendence($edit_date)
                {
                        $date=DB::table('attendences')->where('edit_date',$edit_date)->first();

                        $data=DB::table('attendences')->join('employees','attendences.user_id','employees.id','employees.id')->select('employees.name','employees.photo','attendences.*')->where('edit_date',$edit_date)->get();
                         return view('view_attendence', compact('data','date'));
                }



                public function setting()
                {
                     


                    $setting=DB::table('settings')->first();
                   
                    return view('setting', compact('setting'));
                    
                }




                public function UpdateWebsite(Request $request, $id)
                {

                    $validatedData = $request->validate([
                        'company_name' => 'required|max:255',
                        'company_address' => 'required|max:255',
                        'company_email' => 'required|max:255',
                        'company_mobile' => 'required',
                        'company_city' => 'required|max:255',
                        'company_country' => 'required',
                        'company_phone' => 'required',
                    ]);
                    
                    $data=array();
                    $data['company_name']=$request->company_name;
                    $data['company_address']=$request->company_address;
                    $data['company_email']=$request->company_email;
                    $data['company_mobile']=$request->company_mobile;
                    $data['company_city']=$request->company_city;
                    $data['company_country']=$request->company_country;
                    $data['company_phone']=$request->company_phone;
                    $data['company_zipcode']=$request->company_zipcode;
                   

                                      
                   
 $image = $request->company_logo;


    if($image)
        {
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension() );
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/company/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            
            if($success)
            {
                $data['company_logo']=$image_url;
                $img=db::table('settings')->where('id',$id)->first();

                $image_path = $img->company_logo;
                $done=unlink($image_path);
                $company=DB::table('settings')->where('id',$id)->update($data);
                if($company)
                {
                     $notification=array(
                        'messege'=>' Setting update successfully',
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
        else{
            return redirect()->back();
        }
       
    }else
    {
        $oldphoto=$request->old_photo;
        if($oldphoto)
            {
                $data['company_logo']=$oldphoto;
               
                $comp = DB::table('settings')->where('id',$id)->update($data);
                if($comp)
                {
                     $notification=array(
                        'messege'=>' Setting update successfully',
                        'alert-type'=>'success'
                    );
                    return redirect()->back()->with($notification);
                    
                }else{
                    
                    return redirect()->back();
                    
                }
                
            
        }
    }
                }

    }


