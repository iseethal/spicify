@include('backend.templates.header')

<style>
element.style {
}
.card-item .card-item-icon.card-icon {
    background: rgba(77,76,178,.1);
    fill: #14591b;
}
</style>

<div class="main-content side-content pt-0">
	<div class="container-fluid">
		<div class="inner-body">

			<!-- Page Header -->
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5">Welcome To Dashboard</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page"> Dashboard</li>
					</ol>
				</div>
				
			</div>
			<!-- End Page Header -->

            @if (Session::has('success'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>  {{ session::get('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

		<!--Row-->
		<div class="row row-sm">
			<div class="col-sm-12 col-lg-12 col-xl-12">

				 <!--Row-->
                 <div class="row row-sm  mt-lg-4">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="card bg-primary custom-card card-box" >
                            <div class="card-body p-4" style="background-color: #006677;">
                                <div class="row align-items-center">
                                    <div class="offset-xl-3 offset-sm-6 col-xl-8 col-sm-6 col-12 img-bg " >
                                        <h4 class="d-flex  mb-3">
                                            <span class="font-weight-bold text-white "></span>
                                        </h4>
                                        <a href="{{ route('order.all')}}">
                                            <p class="tx-white-7 mb-1"> Welcome to Spiciffy :)
                                            </p>
                                        </a>
                                    </div>
                                    <img src="{{asset('backend/assets/img/pngs/work3.png')}}" alt="user-img" class="wd-200">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Row -->

                <!--Row-->
                <div class="row row-sm">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="card-item">
                                    <div class="card-item-icon card-icon">
                                        <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect height="14" opacity=".3" width="14" x="5" y="5"/><g><rect fill="none" height="24" width="24"/><g><path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M19,19H5V5h14V19z"/><rect height="5" width="2" x="7" y="12"/><rect height="10" width="2" x="15" y="7"/><rect height="3" width="2" x="11" y="14"/><rect height="2" width="2" x="11" y="10"/></g></g></g></svg>

                                    </div>
                                    <div class="card-item-title mb-2">
                                        <label class="main-content-label tx-13 font-weight-bold mb-1" > <a
                                                href="{{ route('category.all') }}" style="color: #006677;">Total Categories</a></label>
                                    </div>

                                    @php
                                    $category_count = App\Models\Category::where('is_deleted','<>', 1)->count('id');
                                        @endphp

                                        <div class="card-item-body">
                                            <div class="card-item-stat">
                                                <h4 class="font-weight-bold">{{ $category_count }} </h4>
                                                <!-- <small><b class="text-success">55%</b> higher</small> -->
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="card-item">
                                    <div class="card-item-icon card-icon">
                                        <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect height="14" opacity=".3" width="14" x="5" y="5"/><g><rect fill="none" height="24" width="24"/><g><path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M19,19H5V5h14V19z"/><rect height="5" width="2" x="7" y="12"/><rect height="10" width="2" x="15" y="7"/><rect height="3" width="2" x="11" y="14"/><rect height="2" width="2" x="11" y="10"/></g></g></g></svg>
                                    </div>
                                    <div class="card-item-title mb-2">

                                        <label class="main-content-label tx-13 font-weight-bold mb-1">
                                            <a href="{{ route('variant_options.all') }}" style="color: #006677;">Total Products</a>
                                        </label>
                                        
                                    </div>
                                    @php
                                    $product_count = App\Models\VariantOptions::where('is_deleted','<>',1)->count('id');
                                    @endphp

                                    <div class="card-item-body">
                                        <div class="card-item-stat">
                                            <h4 class="font-weight-bold"> {{ $product_count }} </h4>
                                            <!-- <small><b class="text-success">5%</b> Increased</small> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

		        </div>
			</div>
		</div>

</div>
</div>
</div>

@include('backend.templates.footer')