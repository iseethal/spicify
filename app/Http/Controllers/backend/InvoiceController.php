<?php

namespace App\Http\Controllers\backend;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function InvoiceList()
    {
        $invoice = Order::where('order_status','>=', 1)->get();

        return view('backend.invoice.invoice', compact('invoice'));
    }

    public function Invoice(Request $request)
    {
        $id    = $request->id;
        $order = Order::findOrFail($id);
        $order_items   = OrderItem::where('order_id',$id)->get();

        return view('backend.invoice.invoice_view', compact('order','order_items'));
    }
}
