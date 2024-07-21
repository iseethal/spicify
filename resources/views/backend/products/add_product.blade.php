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
                <li class="breadcrumb-item"><a href="#"> Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New</li>
            </ol>
        </div>

    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="row row-sm">

        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">

                    <form action="{{ route('products.store') }}"  method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="">

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Category</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <select  class="form-control select2" name="category_id" id="category_id" >
                                <option label="Choose one"></option>

                                @foreach ($categories as $category)
                                    <option value={{$category->id}}> {{ $category->category_name }}</option>
                                @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Product</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="product_name" id="product_name" placeholder="Enter product name" type="text" required>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Status</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <select class="form-control select select2" name="is_active" id="is_active" required>
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end mb-0">
                            <div class="col-md-8 pl-md-2">
                                <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-5">Submit</button>
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

@include('backend.templates.footer')
