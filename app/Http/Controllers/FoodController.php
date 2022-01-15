<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Models\Order;

class FoodController extends Controller
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
        $foods = Food::latest('id')->get();
        return view('admin.food.food',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.food.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodRequest $request)
    {
        $food = new Food();
        $food->name = $request->name;
        $food->category_id = $request->category_id;

        $newName = date('YmdHis').".".request()->photo->getClientOriginalExtension();
        request()->photo->move(public_path('images'),$newName);
        $food->photo = $newName;
        $food->save();

        return redirect()->route('food.index')->with('success','success Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        $categories = Category::all();
        return view('admin.food.edit',compact('food','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFoodRequest  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $food->name = $request->name;
        $food->category_id = $request->category_id;

        if($request->photo){
            $newName = date('YmdHis').".".request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('images'),$newName);
            $food->photo = $newName;
        }
        $food->update();

        return redirect()->route('food.index')->with('success','success Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();

        return redirect()->back()->with('success','Success Deleted');
    }

    public function order(){
        $statusCount = config('custom.order_status');
        $status = array_flip($statusCount);
        $orders = Order::whereIn('status',[1,2])->get();

        return view('admin.order',compact('orders','status'));
    }


}
