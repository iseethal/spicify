@include('backend.templates.header')



<!-- Main Content-->
<div class="main-content side-content pt-0">
<div class="container-fluid">
<div class="inner-body">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> Enquiry Details</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('category.all')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> All Enqueries</li>
            </ol>
        </div>

    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">

                    @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>  {{ session::get('error')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div>
                        <!-- <h6 class="main-content-label mb-1">Products</h6> -->
                        <!-- <p class="text-muted card-sub-title">Exporting data from a table can often be a key part of a complex application. The Buttons extension for DataTables provides three plug-ins that provide overlapping functionality for data export:</p> -->

                    </div>
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name </th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Date & Time</th>
                                    <th>Add Follow-Up</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $i =1;
                            @endphp
                            @foreach ($contacts as $item)

                                @php
                                $is_viewed = $item->is_viewed;
                                $followup  = $item->followup;

                                if($followup==1) $str = "Yes";
                                else $str = "-";

                                @endphp

                                <tr @if($is_viewed == 0) style="background-color:hsla(107, 70%, 87%);" @endif>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $str }}</td>
                                    <td>
                                        <a href="{{ route('contact.view',['id'=>$item['id']]) }}"><i class="fa fa-eye" style="color: green;"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{ route('contact.delete',$item->id) }}" onclick="myDelete(event)"> <i class="fa fa-remove" style="color: green;"></i></a>
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
