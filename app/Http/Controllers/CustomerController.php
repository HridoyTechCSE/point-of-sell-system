<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customers;
class CustomerController extends Controller
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





    public function index()
    {
    	return view('add_customer');
    }


 public function Store(Request $request)
    {

    	 $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:customers|max:255',
        'phone' => 'required|unique:customers|max:255',
        'address' => 'required',
        'photo' => 'required',
       
    ]);






    	$data=array();
     	$data['name']=$request->name;
     	$data['email']=$request->email;
     	$data['phone']=$request->phone;
     	$data['address']=$request->address;
     	$data['shopname']=$request->shop_name;
     	$data['account_holder']=$request->account_holder;
     	$data['account_number']=$request->account_number;
     	$data['bank_name']=$request->bank_name;
     	$data['bank_branch']=$request->bank_branch;
     	$data['city']=$request->city;
     	$image = $request->file('photo');


    if($image)
        {
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension() );
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            
            if($success)
            {
                $data['photo']=$image_url;
                $customers=db::table('customers')->insert($data);
                if($customers)
                {
                     $notification=array(
                        'messege'=>' Successfully customers inserted',
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



public function AllECustomer()
	{
		$customer=DB::table('customers')->get();
		return view('all_customer')->with('customer',$customer);

	}



public function ViewCustomer($id)
{

	$single=DB::table('customers')
			->where('id',$id)
			->first();
		return view('view_customer', compact('single'));

}




public function DeleteCustomer($id)
{

	$delete=DB::table('customers')
			->where('id',$id)
			->first();


$photo=$delete->photo;
unlink($photo);
$dltuser=DB::table('customers')
			->where('id',$id)
			->delete();

			if($dltuser)
                {
                     $notification=array(
                        'messege'=>' Successfully Customer deleted',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('all.customer')->with($notification);
                    
                }else{
                    $notification=array(
                        'messege'=>' error',
                        'alert-type'=>'success'
                    );
                    return redirect()->back()->with($notification);
                    
                }


		

}





public function editcustomer($id)
    {
        $cus=DB::table('customers')->where('id',$id)->first();
        return view('edit_customer', compact('cus'));
    }
    

public function updatecustomer(Request $request, $id)
    {
                    $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopname']=$request->shop_name;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;

$image = $request->file('photo');


    if($image)
        {
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension() );
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            
            if($success)
            {
                $data['photo']=$image_url;
                $img=db::table('customers')->where('id',$id)->first();
                $image_path = $img->photo;
                $done = unlink($image_path);
                $user = DB::table('customers')->where('id',$id)->update($data);
                if($user)
                {
                     $notification=array(
                        'messege'=>' Successfully customers updated',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('all.customer')->with($notification);
                    
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
               
                $user = DB::table('customers')->where('id',$id)->update($data);
                if($user)
                {
                     $notification=array(
                        'messege'=>' Successfully customers updated',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('all.customer')->with($notification);
                    
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
