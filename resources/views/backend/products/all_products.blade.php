@include('backend.templates.header')


<!-- Main Content-->
<div class="main-content side-content pt-0">
<div class="container-fluid">
<div class="inner-body">


    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> Products</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> All Products</li>
            </ol>
        </div>

        <a href="{{ route('products.add')}}">
                <button class="btn ripple btn-main-primary"><i class="fe fe-plus mr-2"></i>Add New</button>
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

                    <div>
                        <!-- <h6 class="main-content-label mb-1">Products</h6> -->
                        <!-- <p class="text-muted card-sub-title">Exporting data from a table can often be a key part of a complex application. The Buttons extension for DataTables provides three plug-ins that provide overlapping functionality for data export:</p> -->

                    </div>
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>name </th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach ($products as $item)

                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->product_name }}</td>


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
                                        <a href="{{ route('products.edit',['id'=>$item['id']]) }}"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{ route('products.delete',$item->id) }}"> <i class="fa fa-remove"></i></a>
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
