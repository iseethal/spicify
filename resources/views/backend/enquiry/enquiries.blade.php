@include('backend.templates.header')


<!-- Main Content-->
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">


            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5"> Enquiries</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('enquiry.all') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> All Enquiries</li>
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

                            @php

                                $variant_option = App\Models\VariantOptions::get();
                                $variantOption_nameARR = [];

                                foreach ($variant_option as $option) {
                                    $variant_option_id = $option->id;
                                    $variant_option_name = $option->name;
                                    $variantOption_nameARR[$variant_option_id] = $variant_option_name;
                                }
                            @endphp

                            <div class="table-responsive">
                                <table id="exportexample"
                                    class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Type</th>
                                            <th>Customer Name </th>
                                            <th>Customer Phone</th>
                                            <th>Product Name</th>
                                            <th>Enquiry Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($enquiries as $item)

                                            @php

                                                if ($item->status == 1) {
                                                    $status_is = 'New enquiry';
                                                } elseif ($item->status == 2) {
                                                    $status_is = 'Converted';
                                                } else {
                                                    $status_is = 'Delivered';
                                                }

                                                if ($item->type == 1) {
                                                    $type_is = 'Whatsapp';
                                                } else {
                                                    $type_is = 'Form Enquiry';
                                                }

                                            @endphp
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $type_is }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->mobile }}</td>
                                                <td>{{ $variantOption_nameARR[$item->variant_option_id] }}</td>


                                                <td>{{ $status_is }}</td>

                                                <td>
                                                    <a href="{{ route('enquiry.edit',['id'=>$item['id']]) }}"><i class="fa fa-edit" style="color: green;"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;


                                                    <a href="{{ route('enquiry.view', ['id' => $item['id']]) }}"><i
                                                            class="fa fa-eye" style="color: green;"></i></a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="{{ route('enquiry.delete', $item->id) }}"
                                                        onclick="myDelete(event)"> <i class="fa fa-remove"
                                                            style="color: green;"></i></a>
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
