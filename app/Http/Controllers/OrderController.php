<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('admin.pages.order.index', compact('orders'));
    }
    public function product()
    {
        $orders = Order::where('type', '2')->get();

        return view('admin.pages.order.product', compact('orders'));
    }
    public function course()
    {
        $orders = Order::where('type', '1')->get();


        return view('admin.pages.order.course', compact('orders'));
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required',
            'item_id' => 'required',
            'payment_type' => 'required',
            'phone' => 'required',
            'price' => 'required',
            'transaction_id' => 'required',
        ]);

        $data['user_id'] = Auth::user()->id;



        $order = Order::create($data);

        if ($order) {
            // dd('success');
            return back()->with('success', 'Order recived successfully.');
            # code...
        } else {
            return back()->with('error', 'Order placing showing error.');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function Active(Order $order)
    {
        $order->status = '1';
        if ($order->save()) {
            return redirect()->back()->with('success', 'order Activated successfully.');
        } else {
            return back()->with('error', 'order Activation Unsuccessfull');
        }
    }
    public function Pending(Order $order)
    {

        $order->status = '1';
        if ($order->save()) {
            return redirect()->back()->with('success', 'order Accepted successfully.');
        } else {
            return back()->with('error', 'order Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Order $order)

    {
        // dd($order->status);
        $order->status = '0';
        if ($order->save()) {
            return redirect()->back()->with('success', 'order Deactivated successfully.');
        } else {
            return back()->with('error', 'order Dactivation Unsuccessfull.');
        }
    }
}
