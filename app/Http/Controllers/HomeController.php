<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::query()->get();
        return view('auth.orders.index', compact('orders'));

    }

    public function show(Order $order){
        return view('auth.orders.show' , compact('order'));
    }


    public function finish_order(int $id){
        $order = Order::find($id);
        $order->status = 0;
        $order->save();
        return redirect(route('home'));
    }
    public function del_order(int $id){
        $order = Order::query()->where('id', '=', $id)->delete();
//        $order->save();
        return redirect(route('home'));
    }
    public function reject_order(int $id){
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        return redirect(route('home'));
    }
}
