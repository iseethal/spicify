@include('backend.templates.header')


<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">

            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Enquiry View</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('enquiry.all') }}">Enquiry</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
                    </ol>
                </div>

            </div>

            <div class="row row-sm">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="main-content-title tx-24 mg-b-5">
                                <h6 class="main-content-label mb-1"> Customer Details </h6>
                            </div>
                            <br>
                            <hr>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Name <span
                                            style="padding-left:85px;">:</span></label>
                                </div>

                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    {{ $enquiry->name }}
                                </div>

                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Mobile
                                        <span style="padding-left:78px;">:</span>
                                    </label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    {{ $enquiry->mobile }}
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Email <span
                                            style="padding-left:85px;">:</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    {{ $enquiry->email }}
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Address <span
                                            style="padding-left:67px;">:</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    {{ $enquiry->address }}
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
@php
    $variant_option_id = $enquiry->variant_option_id;
    $variant_options   = App\Models\VariantOptions::where('id', $variant_option_id)->get();

    $variants = App\Models\Variants::get();
    $categories = App\Models\Category::get();

    $category_nameARR = array();
    $variant_nameARR = array();

    foreach ($variants as $variant){

    $variant_id   = $variant->id;
    $variant_name = $variant->name;
    $variant_nameARR[$variant_id] = $variant_name;

    }

    foreach ($categories as $category){

    $category_id   = $category->id;
    $category_name = $category->category_name;
    $category_nameARR[$category_id] = $category_name;
    }


    foreach ($variant_options as $option){

        $category_id   = $option->category_id;
        $variant_id    =  $option->variant_id;
        $product_name  =  $option->name;
        $amount        =  $option->amount;
        $image         =  $option->image;

    }


@endphp

<div class="row row-sm">
    <div class="col-lg-12 col-md-12">
        <div class="card custom-card">
            <div class="card-body">
                <div class="main-content-title tx-24 mg-b-5">
                    <h6 class="main-content-label mb-1"> Product Details </h6>
                </div>
                <br>
                <hr>

                <div class="row row-xs align-items-center mg-b-20">
                    <div class="col-md-4">
                        <label class="mg-b-0" style="font-weight:500;">Product Name <span
                                style="padding-left:42px;">:</span></label>
                    </div>

                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                        {{ $product_name }}
                    </div>

                </div>

                <div class="row row-xs align-items-center mg-b-20">
                    <div class="col-md-4">
                        <label class="mg-b-0" style="font-weight:500;">category
                            <span style="padding-left:78px;">:</span>
                        </label>
                    </div>
                    <div class="col-md-8 mg-t-5 mg-md-t-0">

                        {{ $category_nameARR[ $category_id] }}
                    </div>
                </div>

                <div class="row row-xs align-items-center mg-b-20">
                    <div class="col-md-4">
                        <label class="mg-b-0" style="font-weight:500;">variant <span
                                style="padding-left:89px;">:</span></label>
                    </div>
                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                        {{ $variant_nameARR[$variant_id] }}
                    </div>
                </div>

                <div class="row row-xs align-items-center mg-b-20">
                    <div class="col-md-4">
                        <label class="mg-b-0" style="font-weight:500;">Amount <span
                                style="padding-left:81px;">:</span></label>
                    </div>
                    <div class="col-md-8 mg-t-5 mg-md-t-0">

                        {{ $amount }}
                    </div>
                </div>

                <div class="row row-xs align-items-center mg-b-20">
                    <div class="col-md-4" style="font-weight:500;">
                        <label class="mg-b-0" style="padding-bottom:285px;">Product Image <span
                                style="padding-left:40px;">:</span></label>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-3">
                        <a href="#" class="wd-100p">
                            <img class="img-responsive"
                                src="{{ asset('backend/images/product_images/' . $image) }}"
                                width="250" height="250" alt="Thumb-1">
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

            <!-- Row -->
            {{-- <div class="row row-sm">
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
                                            <th>Category</th>
                                            <th>Variant</th>
                                            <th>Product Name</th>
                                            <th>Amount</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp

                                        @foreach ($variant_options as $option)
                                            <tr>
                                                <td> {{ $i++ }} </td>
                                                <td> {{ $category_nameARR[ $option->category_id] }} </td>
                                                <td> {{ $variant_nameARR[$option->variant_id] }} </td>
                                                <td> {{ $option->name }} </td>
                                                <td> {{ $option->amount }} </td>

                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- End Row -->


            <div class="row row-sm">

                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">

                            <form action="{{ route('update.status', [ 'id'=> $enquiry->id ]) }}"  method="POST" enctype="multipart/form-data">

                            @csrf

                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-4">
                                        <label class="mg-b-0">Enquiry Status</label>
                                    </div>
                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select class="form-control select select2" name="status" id="status" required>
                                        <option value="1"  @if($enquiry->status =='1') selected='selected' @endif>New enquiry</option>
                                        <option value="2"  @if($enquiry->status =='2') selected='selected' @endif>Converted</option>
                                        <option value="3"  @if($enquiry->status =='3') selected='selected' @endif>Delivered</option>

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
