@include('backend.templates.header')


<!-- Main Content-->
<div class="main-content side-content pt-0">
<div class="container-fluid">
<div class="inner-body">


    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> Orders</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('order.all')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> All Orders</li>
            </ol>
        </div>

    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>  {{ session::get('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Customer Name </th>
                                    <th>Customer Phone</th>
                                    <th>Transaction Id</th>
                                    <th>Total Amount</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @php $i= 1;   @endphp
                            @foreach ($orders as $item)
                                @php
                                    if ($item->transaction_id =='COD') {

                                       $transaction = "Cash On Delivery";
                                    }  else {

                                       $transaction = "Razor Pay";
                                    }
                                @endphp

                                <tr>
                                    <td> {{ $i++ }} </td>
                                    <td>{{ $item->billing_firstname }}  {{ $item->billing_lastname }}</td>
                                    <td>{{ $item->billing_phone }}</td>
                                    <td>{{ $transaction }}</td>
                                    <td>{{ $item->total }}</td>
                                    @php

                                        if ($item->order_status == 0)
                                        {
                                            $status_is    = "Order Placed";
                                        }
                                    elseif ($item->order_status == 1)
                                        {
                                            $status_is    = "In Progress";
                                        }
                                        else
                                        {
                                            $status_is    = "Delivered";
                                        }

                                    @endphp

                                    <td>{{ $status_is }}</td>

                                    <td>
                                        <a href="{{ route('order.view',['id'=>$item['id']]) }}"><i class="fa fa-eye" style="color: green;"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        {{-- <a href="{{ route('order.delete',$item->id) }}"> <i class="fa fa-remove" style="color: green;"></i></a> --}}
                                    </td>

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


</div>
</div>
</div>
<!-- End Main Content-->



@include('backend.templates.footer')
