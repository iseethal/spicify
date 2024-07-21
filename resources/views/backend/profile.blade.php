@include('backend.templates.header')


<!-- Main Content-->
<div class="main-content side-content pt-0">
<div class="container-fluid">
<div class="inner-body">


	<!-- Page Header -->
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">Profile</h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Profile</li>
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
									<th>Name</th>
									<th>Role</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

							@php $i=1 @endphp

							@foreach ($profiles as $item)

                                    @php
                                        $role = $item->role;
                                        if($role == 1)
                                        {
                                            $role_is = "Admin";
                                        }
                                    @endphp

								<tr>
									<td>{{ $i++ }}</td>
									<td>{{ $item->name }}</td>
									<td>{{ $role_is }}</td>
									<td>
										<a href="{{ route('password.change',['id'=>$item['id']]) }}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
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

@include('backend.templates.footer')
