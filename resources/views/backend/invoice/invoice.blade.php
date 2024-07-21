@include('backend.templates.header')


<!-- Main Content-->
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">


            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5"> Invoice</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('invoice') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Invoice</li>
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
                                    <strong> {{ session::get('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong> {{ session::get('error') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table id="exportexample"
                                    class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Order Id</th>
                                            <th>Customer Name </th>
                                            <th>Order Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php $i= 1; @endphp

                                        @foreach ($invoice as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->id }}</td>

                                                @php
                                                    $user_id = $item->user_id;

                                                    $user_name = App\Models\User::where('id',$user_id)->pluck('name')->first();

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

                                                <td>{{ $user_name }}</td>
                                                <td>{{ $status_is }}</td>
                                                <td>
                                                    <a href="{{ route('invoice', ['id' => $item['id']]) }}"><i
                                                            class="fa fa-eye" style="color: green;"></i></a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="{{ route('slider.delete', $item->id) }}" onclick="myDelete(event)"> <i
                                                            class="fa fa-remove" style="color: green;"></i></a>
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



<script>
    function myDelete(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    console.log('urlToredirect');
    swal({
            title: `Do you want to Delete ?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
          window.location.href = urlToRedirect;
          }
        });
       }
  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>



@include('backend.templates.footer')
