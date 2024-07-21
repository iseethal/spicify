<?php

namespace App\Http\Controllers\backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function AllOrders()
    {
        $orders = Order::OrderBy('id','desc')->where('transaction_id','<>',1234)->get();
        return view('backend.orders.orders', compact('orders'));
    }

    public function OrderDetails(Request $request)
    {
        $id            = $request->id;
        $order_details = Order::findOrFail($id);
        $orders = Order::where('id',$id)->get();
        $order_items   = OrderItem::where('order_id',$id)->get();

        return view('backend.orders.order_view', compact('order_details','order_items','orders'));
    }

    public function OrderStatus(Request $request, $id)
    {
        Order::findOrFail($id)->update([

            'order_status'   => $request->order_status,
        ]);

        return redirect()->route('order.all')->with('success', 'Order status updated' );
    }

    public function Invoice(Request $request)
    {
        $id             = $request->id;
        $order          = Order::findOrFail($id);
        $order_items    = OrderItem::where('order_id',$id)->get();

        return view('backend.orders.invoice_view', compact('order','order_items'));
    }
}
