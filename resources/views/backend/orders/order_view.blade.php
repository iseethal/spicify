@include('backend.templates.header')


@php

    foreach ($orders as $order) {

        $id         = $order->id;
        $first_name = $order->billing_firstname;
        $last_name  = $order->billing_lastname;
        $email      = $order->billing_email;
        $order_date = $order->order_date;
        $phone      = $order->billing_phone;
        $total      = $order->total;
        $address1   = $order->billing_address1;
        $address2   = $order->billing_address2;
        $notes      = $order->order_notes;
        $transaction = $order->transaction_id;
        $order_status = $order->order_status;

    }
    if ($transaction == 'COD') {

        $transaction = 'Cash On Delivery';
    } else {

        $transaction = 'Razor Pay';
    }

@endphp
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">

            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Order View</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('order.all') }}">Order</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
                    </ol>
                </div>

            </div>

            <div class="row row-sm">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="main-content-title tx-24 mg-b-5">
                                <h6 class="main-content-label mb-1"> Order View </h6>
                            </div>
                            <br>
                            <hr>


                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Firstname <span
                                            style="padding-left:87px;">:</span></label>
                                </div>

                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    {{ $first_name }}
                                </div>

                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Last Name
                                        <span style="padding-left:83px;">:</span>
                                    </label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    {{ $last_name }}
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Email <span
                                            style="padding-left:115px;">:</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    {{ $email }}
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Order Date <span
                                            style="padding-left:83px;">:</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    {{ \Carbon\Carbon::parse($order_date)->format('d M Y') }}
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Phone <span
                                            style="padding-left:110px;">:</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    {{ $phone }}
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Address <span
                                            style="padding-left:97px;">:</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    {{ $address1 }} {{ $address2 }}
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Transaction <span
                                            style="padding-left:75px;">:</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    {{ $transaction }}
                                </div>
                            </div>

                            @if ($notes != null)
                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-4">
                                        <label class="mg-b-0" style="font-weight:500;">Notes <span
                                                style="padding-left:110px;">:</span></label>
                                    </div>
                                    <div class="col-md-8 mg-t-5 mg-md-t-0">

                                        {{ $notes }}
                                    </div>
                                </div>
                            @endif
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Order Total <span
                                            style="padding-left:81px;">:</span></label>
                                </div>

                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    ₹ {{ $total }}
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->


            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="main-content-title tx-24 mg-b-5">
                                <h6 class="main-content-label mb-1">PRODUCT DETAILS
                            </div>

                            <hr>

                            <div class="table-responsive border">
                                <table class="table text-nowrap text-md-nowrap table-bordered mg-b-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th> Product Amount </th>
                                            {{-- <th>Coupon Applied</th> --}}
                                            <th>Discount</th>
                                            <th>Quantity</th>
                                            <th>Total </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp

                                        @foreach ($order_items as $items)
                                        @php
                                            $amount   = App\Models\ProductAmountOptions::where('id',$items->amount_id)->pluck('amount')->first();

                                            $coupon_applied = 0;

                                            if ($coupon_applied == 1) {

                                                // $discount = $amount - $items->amount;
                                                 $coupon_applied = "Yes";
                                            } else {

                                                // $discount = 0;
                                                 $coupon_applied = "Yes";
                                            }

                                            $discount = $amount - $items->amount;

                                        @endphp
                                            <tr>
                                                <td> {{ $i++ }} </td>
                                                <td> {{ $items->product_name }} </td>
                                                <td> {{ $amount }} </td>
                                                {{-- <td> {{ $coupon_applied }} </td> --}}
                                                <td> {{ $discount}} </td>
                                                <td> {{ $items->quantity }} </td>
                                                <td> {{ $items->amount }} </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->


            <div class="row row-sm">

                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">

                            <form action="{{ route('order.status', [ 'id'=> $id ]) }}"  method="POST" >

                            @csrf

                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-4">
                                        <label class="mg-b-0">Order Status</label>
                                    </div>
                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select class="form-control select select2" name="order_status" id="order_status" required>
                                        <option value="1"  @if($order_status =='0') selected='selected' @endif>Order Placed</option>
                                        <option value="2"  @if($order_status =='1') selected='selected' @endif>In Progress</option>
                                        <option value="3"  @if($order_status =='2') selected='selected' @endif>Delivered</option>

                                    </select>
                                    </div>
                                </div>

                                <br>

                                <div class="form-group row justify-content-end mb-0">
                                    <div class="col-md-8 pl-md-2">
                                        <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-5" style="background-color: #006677;">Submit</button>
                                        <!-- <button class="btn ripple btn-secondary pd-x-30">Cancel</button> -->
                                    </div>
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>


@include('backend.templates.footer')
