<?php

namespace App\Http\Controllers\WEB\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use Auth;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderProducts')->where('user_id', Auth::id())->latest()->get();
        return view('frontend.order.index', compact('orders'));
    }
    
    public function front_all_order()
    {
        $orders = Order::with('orderProducts')->where('user_id' , Auth::id())->latest()->get();
        $title = 'All Order';
        $html = view('frontend.order.status_wise_order', compact('orders','title'))->render();
        return response()->json(['status' => true, 'pending_orders' =>   $html]);
    }
    public function front_pending_order()
    {
        $orders = Order::with('orderProducts')->where(['user_id' => Auth::id(),'order_status' => 0])->latest()->get();
        $title = 'Pending Order';
        $html = view('frontend.order.status_wise_order', compact('orders','title'))->render();
        return response()->json(['status' => true, 'pending_orders' =>   $html]);
    }
    public function front_processing_order()
    {
        $orders = Order::with('orderProducts')->where(['user_id' => Auth::id(),'order_status' => 1])->latest()->get();
        $title = 'Processing Order';
        $html = view('frontend.order.status_wise_order', compact('orders','title'))->render();
        return response()->json(['status' => true, 'pending_orders' =>   $html]);
    }
    public function front_onhold_order()
    {
        $orders = Order::with('orderProducts')->where(['user_id' => Auth::id(),'order_status' => 5])->latest()->get();
        $title = 'On Hold Order';
        $html = view('frontend.order.status_wise_order', compact('orders','title'))->render();
        return response()->json(['status' => true, 'pending_orders' =>   $html]);
    }
    public function front_courier_order()
    {
        $orders = Order::with('orderProducts')->where(['user_id' => Auth::id(),'order_status' => 2])->latest()->get();
        $title = 'Courier Order';
        $html = view('frontend.order.status_wise_order', compact('orders','title'))->render();
        return response()->json(['status' => true, 'pending_orders' =>   $html]);
    }
    public function front_complete_order()
    {
        $orders = Order::with('orderProducts')->where(['user_id' => Auth::id(),'order_status' => 3])->latest()->get();
        $title = 'Complete Order';
        $html = view('frontend.order.status_wise_order', compact('orders','title'))->render();
        return response()->json(['status' => true, 'pending_orders' =>   $html]);
    }
    public function front_cancelled_order()
    {
        $orders = Order::with('orderProducts')->where(['user_id' => Auth::id(),'order_status' => 4])->latest()->get();
        $title = 'Cancelled Order';
        $html = view('frontend.order.status_wise_order', compact('orders','title'))->render();
        return response()->json(['status' => true, 'pending_orders' =>   $html]);
    }
    public function front_return_order()
    {
        $orders = Order::with('orderProducts')->where(['user_id' => Auth::id(),'order_status' => 6])->latest()->get();
        $title = 'Return Order';
        $html = view('frontend.order.status_wise_order', compact('orders','title'))->render();
        return response()->json(['status' => true, 'pending_orders' =>   $html]);
    }
    
    public function order_list($phone)
    {
        $orders = Order::with('orderProducts')->where('order_phone', $phone)->latest()->get();
      	$order_inv = Order::with('orderProducts')->where('order_phone', $phone)->first();
      			  
        return view('frontend.order.index', compact('orders', 'order_inv'));
    }
  	public function thanks_page($phone)
    {
      	$order_inv = Order::with('orderProducts')->where('order_phone', $phone)->first();
        return view('frontend.order.thanks_page', compact('order_inv'));
    }
  	

    public function show($id)
    {
        $order = Order::with('user', 'orderProducts')->findOrFail($id);
      //dd($order);

        // $view = view('frontend.order.show', compact('order'))->render();
        // return response()->json([
        //     'status' => true,
        //     'html' => $view,
        // ]);
        return view('frontend.order.show', compact('order'));
    }    
    
    public function print($id)
    {
        $order = Order::with('user', 'orderProducts')->findOrFail($id);

        return view('frontend.order.print', compact('order'));
    }
    
    public function trackOrder(){
        $track_order = view('frontend.order.track_order')->render();
        return response()->json([
            'status' => true,
            'track_order' => $track_order
        ]);
    }
    
    public function findTrack(Request $request){
      
        $order = Order::where('order_id', $request->order_id)->first();
        $track_order = view('frontend.profile.track_order', compact('order'))->render();
        return response()->json([
            'status' => true,
            'track_order' => $track_order
        ]);
    }
}
