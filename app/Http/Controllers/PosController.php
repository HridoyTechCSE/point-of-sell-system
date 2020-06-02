<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PosController extends Controller
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

		$product=DB::table('products')
		->join('categories','products.cat_id','categories.id')
		->select('categories.cat_name','products.*')
		->get();
		$customer=DB::table('customers')->get();
		$categories=DB::table('categories')->get();
		return view('pos',compact('product','customer','categories'));
	}


public function pendingorders()
{
	$pending=DB::table('orders')
	->join('customers','orders.customer_id','customers.id')
	->select('customers.name','orders.*')
	->where('order_status','pending')->get();

	return view('pending_order',compact('pending'));

}

public function vieworder($id)
{
	$order=DB::table('orders')
	->join('customers','orders.customer_id','customers.id')
	->where('orders.id', $id)->first();


	$order_details=DB::table('ordersdetails')
	->join('products','ordersdetails.Product_id','products.id')
	->select('ordersdetails.*','products.product_name','products.product_code')
	->where('order_id', $id)->get();

	return view('order_confirmation', compact('order','order_details'));

}





public function posdone($id)
{

	$approve=DB::table('orders')->where('id',$id)->update(['order_status'=>'success']);

	if($approve)
                {
                     $notification=array(
                        'messege'=>'Order approved',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('pending.orders')->with($notification);
                    
                }else{
                    $notification=array(
                        'messege'=>'error',
                        'alert-type'=>'success'
                    );
                    return redirect()->back()->with($notification);
                    
                }


}

public function successorder()
{
	$success=DB::table('orders')
	->join('customers','orders.customer_id','customers.id')
	->select('customers.name','orders.*')
	->where('order_status','success')->get();

	return view('success_order',compact('success'));
}








}
