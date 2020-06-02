<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SupplierController extends Controller
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
    	return view('add_supplier');
    }


public function SupplierStore(Request $request)
    {

    	 $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:suppliers|max:255',
        'phone' => 'required|unique:suppliers|max:255',
        'address' => 'required',
        'photo' => 'required',
       
    ]);






    	$data=array();
     	$data['name']=$request->name;
     	$data['email']=$request->email;
     	$data['phone']=$request->phone;
     	$data['address']=$request->address;
     	$data['shop']=$request->shopname;
     	$data['accountholder']=$request->accountholder;
     	$data['accountnumber']=$request->accountnumber;
     	$data['bankname']=$request->bankname;
     	$data['branchname']=$request->branchname;
     	$data['city']=$request->city;
     	$data['type']=$request->type;
$image = $request->file('photo');


    if($image)
        {
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension() );
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            
            if($success)
            {
                $data['photo']=$image_url;
                $supplier=db::table('suppliers')->insert($data);
                if($supplier)
                {
                     $notification=array(
                        'messege'=>' Successfully suppliers inserted',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('all.supplier')->with($notification);
                    
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




public function AllSupplier()
{

	$supplier=DB::table('suppliers')->get();
	return view('all_supplier', compact('supplier'));
}


public function ViewSupplier($id)
{

	$supplier=DB::table('suppliers')->where('id',$id)->first();


	return view('view_supplier', compact('supplier'));
}


public function DeleteSupplier($id)
{

	$delete=DB::table('suppliers')
			->where('id',$id)
			->first();


$photo=$delete->photo;
unlink($photo);
$dltuser=DB::table('suppliers')
			->where('id',$id)
			->delete();

			if($dltuser)
                {
                     $notification=array(
                        'messege'=>' Successfully supplier deleted',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('all.supplier')->with($notification);
                    
                }else{
                    $notification=array(
                        'messege'=>' error',
                        'alert-type'=>'success'
                    );
                    return redirect()->back()->with($notification);
                    
                }


		

}




public function editSupplier($id)
	{
		$sup=DB::table('suppliers')->where('id',$id)->first();

		return view('edit_supplier', compact('sup'));
	}





public function updateesupplier(Request $request, $id)
	{
				$data=array();
     	$data['name']=$request->name;
     	$data['email']=$request->email;
     	$data['phone']=$request->phone;
     	$data['address']=$request->address;
     	$data['shop']=$request->shopname;
     	$data['accountholder']=$request->accountholder;
     	$data['accountnumber']=$request->accountnumber;
     	$data['bankname']=$request->bankname;
     	$data['branchname']=$request->branchname;
     	$data['city']=$request->city;
     	$data['type']=$request->type;
$image = $request->file('photo');


    if($image)
        {
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension() );
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            
            if($success)
            {
                $data['photo']=$image_url;
                $img=db::table('suppliers')->where('id',$id)->first();
                $image_path = $img->photo;
                $done = unlink($image_path);
                $user = DB::table('suppliers')->where('id',$id)->update($data);
                if($user)
                {
                     $notification=array(
                        'messege'=>' Successfully suppliers updated',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('all.supplier')->with($notification);
                    
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
               
                $user = DB::table('suppliers')->where('id',$id)->update($data);
                if($user)
                {
                     $notification=array(
                        'messege'=>' Successfully suppliers updated',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('all.supplier')->with($notification);
                    
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
