<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::orderBy('id','desc')->get();
        $tables = Table::all();
        return view('order_form',compact('foods','tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        $data = array_filter($request->except('_token','table_name'));
        $orderId = rand();
        foreach ($data as $key => $value) {
            if ($value > 1){
                for ($i=0;$i<$value;$i++){
                    $this->saveOrder($orderId,$key,$request);
                }
            }else{
                $this->saveOrder($orderId,$key,$request);
            }
        }
        return redirect()->back()->with('success','Successfully Order Submitted.');
    }

    public function saveOrder($orderId,$food_id,$request)
    {
        $order = new Order();
        $order->order_id = $orderId;
        $order->food_id = $food_id;
        $order->table_id = $request->table_name;
        $order->status = config('custom.order_status.new');
        $order->save();
//        return redirect()-back();
    }

    public function approve(Order $order){
     $order->status = config('custom.order_status.processing');
     $order->save();

     return redirect()->back()->with('success','Order Approved.');
    }
    public function cancel(Order $order){
        $order->status = config('custom.order_status.cancel');
        $order->save();

        return redirect()->back()->with('success','Order Canceled.');
    }
    public function ready(Order $order){
        $order->status = config('custom.order_status.ready');
        $order->save();

        return redirect()->back()->with('success','Order Ready.');
    }
    public function done(Order $order){
        $order->status = config('custom.order_status.done');
        $order->save();

        return redirect()->back()->with('success','Order Done.');
    }
    public function orderList(){
        $statusCount = config('custom.order_status');
        $status = array_flip($statusCount);
        $orders = Order::whereIn('status',[4])->get();

        return view('admin.order_list',compact('orders','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
