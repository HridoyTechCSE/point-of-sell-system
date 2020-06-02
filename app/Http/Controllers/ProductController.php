<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
class ProductController extends Controller
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





    public function Addproduct()
    {
    	return view('add_product');
    }
	 public function Allproduct()
	    {


	    	$product=DB::table('products')->get();
	    	return view('all_product', compact('product'));
	    }
	





	 public function insertproduct(Request $request)
	    {
	    	$data=array();
	    	$data['product_name']=$request->product_name;
	    	$data['product_code']=$request->product_code;
	    	$data['cat_id']=$request->cat_id;
	    	$data['sup_id']=$request->sup_id;
	    	$data['product_garage']=$request->product_garage;
	    	$data['product_route']=$request->Product_route;
	    	$data['buy_date']=$request->buy_date;
	    	$data['expire_date']=$request->expire_date;
	    	$data['buying_price']=$request->buying_price;
	    	$data['selling_price']=$request->selling_price;
			$image = $request->file('product_image');


			    if($image)
			        {
			            $image_name=str_random(5);
			            $ext=strtolower($image->getClientOriginalExtension() );
			            $image_full_name=$image_name.'.'.$ext;
			            $upload_path='public/product/';
			            $image_url=$upload_path.$image_full_name;
			            $success=$image->move($upload_path,$image_full_name);
			            
			            if($success)
			            {
			                $data['product_image']=$image_url;
			                $product=db::table('products')->insert($data);
			                if($product)
			                {
			                     $notification=array(
			                        'messege'=>' Successfully product inserted',
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
			    	return redirect()->back();
			    }
	    }




public function Deleteproduct($id)
{
	$delete=DB::table('products')
			->where('id',$id)
			->first();


$photo=$delete->product_image ;
unlink($photo);
$dltproduct=DB::table('products')
			->where('id',$id)
			->delete();

			if($dltproduct)
                {
                     $notification=array(
                        'messege'=>' Successfully product deleted',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('all.product')->with($notification);
                    
                }else{
                    $notification=array(
                        'messege'=>' error',
                        'alert-type'=>'success'
                    );
                    return redirect()->back()->with($notification);
                    
                }


}




public function Viewproduct($id)
{

	$product=DB::table('products')
			->join('categories','products.cat_id','categories.id')
			->join('suppliers','products.sup_id','suppliers.id')
			->select('categories.cat_name','products.*','suppliers.name')
			->where('products.id',$id)
			->first();

			return view('view_product', compact('product'));
}



public function editproduct($id)
	{
		$product=DB::table('products')->where('id',$id)->first();
		return view('edit_product', compact('product'));
	}




public function updateproduct(Request $request,$id)
 {
                $data=array();
	    	$data['product_name']=$request->product_name;
	    	$data['product_code']=$request->product_code;
	    	$data['cat_id']=$request->cat_id;
	    	$data['sup_id']=$request->sup_id;
	    	$data['product_garage']=$request->product_garage;
	    	$data['product_route']=$request->Product_route;
	    	$data['buy_date']=$request->buy_date;
	    	$data['expire_date']=$request->expire_date;
	    	$data['buying_price']=$request->buying_price;
	    	$data['selling_price']=$request->selling_price;
			$image = $request->file('product_image');


    if($image)
        {
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension() );
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            
            if($success)
            {
                $data['product_image']=$image_url;
                $img=db::table('products')->where('id',$id)->first();
                $image_path = $img->product_image;
                $done = unlink($image_path);
                $product = DB::table('products')->where('id',$id)->update($data);
                if($product)
                {
                     $notification=array(
                        'messege'=>' Successfully product updated',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('all.product')->with($notification);
                    
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
                $data['product_image']=$oldphoto;
               
                $user = DB::table('products')->where('id',$id)->update($data);
                if($user)
                {
                     $notification=array(
                        'messege'=>' Successfully product updated',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('all.product')->with($notification);
                    
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





    //product import and export

    public function Importproduct()
    {
    	return view('import_product');
    }

    public function export()
    {
    	return Excel::download(new ProductsExport, 'products.xlsx');
    }




 public function import(Request $request)
    {
    	 $import=Excel::import(new ProductsImport, $request->file('import_file'));
        
        if($import)
                {
                     $notification=array(
                        'messege'=>' Successfully product importated',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('all.product')->with($notification);
                    
                }else{
                    $notification=array(
                        'messege'=>' error',
                        'alert-type'=>'success'
                    );
                    return redirect()->back()->with($notification);
                    
                }
    }


}