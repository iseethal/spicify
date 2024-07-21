@include('frontend.templates.header')

@include('frontend.templates.toastr-notifications')

<style>
    .tp-checkout-btn {
        background-color: #006677;
    }
</style>

<main>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">My Orders</h3>
                        <div class="breadcrumb__list">
                            <!-- <span><a href="{{ route('frontend.home') }}">Home</a></span> -->
                            <span>Order History</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- checkout area start -->
    <section class="tp-contact-area pb-100">
        <div class="container">
            <div class="tp-contact-inner">

                @if (!$orders->isEmpty())

                    <div class="myaccount-content">
                        <br><br>
                        <h6>YOUR ORDERS</h6><br>

                        <div class="myaccount-table table-responsive text-center">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Id</th>
                                        <th>Date</th>
                                        <th>Item</th>
                                        <th>Total</th>
                                        <th>Discount</th>
                                        <th>Sub Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                @php    $i = 1; @endphp
                                @foreach ($orders as $item)
                                    @php
                                        $order_id = $item->id;
                                        $order_items = App\Models\OrderItem::where('order_id', $order_id)->get();

                                        $status_is = $style = '';

                                        if ($item->order_status == 0) {
                                            $status_is = 'Order Placed';
                                            $style = 'style=color:red;';
                                        } elseif ($item->order_status == 1) {
                                            $status_is = 'In Progress';
                                            $style = 'style=color:green;';
                                        } else {
                                            $status_is = 'Delivered';
                                            $style = 'style=color:green;';
                                        }

                                        $order_date = $item->order_date;
                                        $discount = 0; $amount = 0; $grandtotal = 0;
                                    @endphp

                                    <tbody>
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $order_date }}</td>

                                            <td>

                                                @foreach ($order_items as $item1)
                                                    @php
                                                        $amount      = $item1->amount;
                                                        $grandtotal += $amount;
                                                        $discount   += $item1->discount;
                                                    @endphp
                                                    {{ $item1->product_name . '  -  ' . $item1->quantity . '  ×  ' . $amount }}
                                                    <br>
                                                @endforeach
                                            </td>
                                            <td> {{ $grandtotal }} </td>
                                            <td> {{ $discount }} </td>

                                            <td>{{ $item->total }}</td>
                                            <td {{ $style }}>{{ $status_is }}</td>
                                        </tr>




                                    </tbody>
                                @endforeach

                            </table>
                        </div>
                    </div>

            </div>
        @else
            <div class="myaccount-content">
                <center>
                    <h6>No Orders yet</h6><br>
                </center>
            </div>

        </div>
        @endif



        </div>
    </section>
    <!-- checkout area end -->


</main>



@include('frontend.templates.footer')
