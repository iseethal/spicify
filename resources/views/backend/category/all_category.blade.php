@include('backend.templates.header')


<!-- Main Content-->
<div class="main-content side-content pt-0">
<div class="container-fluid">
<div class="inner-body">


    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> Categories</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('category.all')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> All Categories</li>
            </ol>
        </div>

        <a href="{{ route('category.add')}}">
                <button class="btn ripple btn-main-primary" style="background-color: #006677;"><i class="fe fe-plus mr-2"></i>Add New</button>
            </a>
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
                                    <th>Category name </th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i =1;  @endphp
                            @foreach ($categories as $item)

                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->category_name }}</td>


                                    @php

                                    $status_is = $style = "";
                                    if ($item->is_active == 1)
                                    {
                                        $status_is    = "Active";
                                        $style 		  = "style=color:green;";
                                    }
                                    else
                                    {
                                        $status_is    = "InActive";
                                        $style 		  = "style=color:red;";
                                    }

                                    @endphp

                                    <td {{ $style  }}>{{ $status_is }}</td>

                                    <td>
                                        <a href="{{ route('category.edit',['id'=>$item['id']]) }}"><i class="fa fa-edit" style="color: green;"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{ route('category.delete',$item->id) }}" onclick="myDelete(event)"> <i class="fa fa-remove" style="color: green;"></i></a>
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
