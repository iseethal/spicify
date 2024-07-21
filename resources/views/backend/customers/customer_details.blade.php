@include('backend.templates.header')

@php

    $id           = $customer->id;
    $address1     = App\Models\Order::where('user_id',$id)->pluck('billing_address1')->first();
    $address2     = App\Models\Order::where('user_id',$id)->pluck('billing_address2')->first();
    $phone        = App\Models\Order::where('user_id',$id)->pluck('billing_phone')->first();
    $orders       = App\Models\Order::where('user_id',$id)->get();
@endphp


<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">

            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Customer Details</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('customer.all') }}">Customer</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Details</li>
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
                                    <label class="mg-b-0" style="font-weight:500;">Name <span
                                            style="padding-left:86px;">:</span></label>
                                </div>

                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    {{ $customer->name }}
                                </div>

                            </div>


                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Email <span
                                            style="padding-left:89px;">:</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    {{ $customer->email }}
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Phone <span
                                            style="padding-left:83px;">:</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    {{ $phone }}
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Address <span
                                            style="padding-left:71px;">:</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    {{ $address1 }} {{ $address2 }}
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
                                            <th>Quantity</th>
                                            <th>Amount</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp

                                        @foreach ($orders as $order)

                                        @php
                                            $order_id = $order->id;
                                            $order_items  = App\Models\OrderItem::where('order_id',$order_id)->get();
                                        @endphp

                                            @foreach ($order_items as $items)

                                                <tr>
                                                    <td> {{ $i++ }} </td>
                                                    <td> {{ $items->product_name }} </td>
                                                    <td> {{ $items->quantity }} </td>
                                                    <td> {{ $items->amount }} </td>
                                                </tr>
                                            @endforeach

                                        @endforeach


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->



        </div>
    </div>
</div>


@include('backend.templates.footer')
