@include('backend.templates.header')

<!-- InternalFileupload css-->
<link href="{{asset('backend/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('backend/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />


<!-- Main Content-->
<div class="main-content side-content pt-0">
<div class="container-fluid">
<div class="inner-body">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> Coupons</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('coupons.all')}}"> Coupons</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </div>

    </div>
    <!-- End Page Header -->
    @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{ session::get('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <!-- Row -->
    <div class="row row-sm">

        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">

                    <form action="{{ route('coupon.update', [ 'id'=> $coupon->id ]) }}"  method="POST" enctype="multipart/form-data" >

                    @csrf
                    <div class="">
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Product</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <select  class="form-control select2" name="product_id" id="product_id" >

                                @foreach ($products as $product)
                                    <option value={{$product->id}} @if($product->id==$coupon->product_id) selected @endif> {{ $product->name }}</option>
                                @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Coupon Name</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="coupon_name" id="coupon_name" value="{{ $coupon->coupon_name}}" placeholder="Enter Coupon name" type="text" required>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Coupon Code</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="coupon_code" value="{{ $coupon->coupon_code}}" id="coupon_code" placeholder="Enter Coupon code" type="text" required>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Discount(In Percentage)</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="discount" id="discount" value="{{ $coupon->discount}}" placeholder="Enter discount" type="number" >
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Coupon Limit</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="coupon_limit" id="coupon_limit" placeholder="Enter limit" type="number"  value="{{ $coupon->coupon_limit }}">
                            </div>
                        </div>


                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Valid From</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                type="date" name="valid_from" id="valid_from"
                                value="{{ $coupon->valid_from }}" >
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Valid To</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input  class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                type="date" name="valid_to" id="valid_to"  value="{{ $coupon->valid_to }}">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Status</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select class="form-control select" name="status" id="status">
                                    <option value="1"  @if($coupon->status =='1') selected='selected' @endif>Active</option>
                                    <option value="0"  @if($coupon->status =='0') selected='selected' @endif>In active</option>
                                </select>
                            </div>
                        </div>

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
    <!-- End Row -->

</div>
</div>
</div>
<!-- End Main Content-->

<script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Internal Fileuploads js-->
<script src="{{asset('backend/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{asset('backend/assets/plugins/fileuploads/js/file-upload.js')}}"></script>

@include('backend.templates.footer')
