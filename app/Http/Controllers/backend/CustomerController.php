<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function AllCustomers()
    {
        $customers = User::get();
        return view('backend.customers.all_customers', compact('customers'));
    }

    public function ViewCustomer(Request $request)
    {
        $id        = $request->id;
        $customer  = User::findOrFail($id);

        return view('backend.customers.customer_details', compact('customer'));
    }


    


}
