@include('backend.templates.header')

<!-- Main Content-->
<div class="main-content side-content pt-0">
<div class="container-fluid">
<div class="inner-body">

	<!-- Page Header -->
	<div class="page-header">
		<div>
			<h2 class="main-content-title tx-24 mg-b-5">Change Password</h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.profile')}}">Change Password</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit  </li>
			</ol>
		</div>
	</div>
	<!-- End Page Header -->

	<!-- Row -->
	<div class="row row-sm">

		<div class="col-lg-12 col-md-12">
			<div class="card custom-card">
				<div class="card-body">
					<div></div>
					<form action="{{ route('password.update', [ 'id'=> $profile->id ]) }}"  method="POST" >

					@csrf


						<div class="row row-xs align-items-center mg-b-20">
							<div class="col-md-4">
								<label class="mg-b-0"> Name</label>
							</div>
							<div class="col-md-8 mg-t-5 mg-md-t-0">
								<input class="form-control" name="name"  placeholder =" Enter Name" type="text" value="{{ $profile->name }}" required>
							</div>
						</div>
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Username</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="user_name" id="user_name" type="text" value="{{ $profile->user_name }}" placeholder ="user name" required>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Password</label>
                            </div>
                            @php
                             $value     = $profile->password;
                             $decrypted = Crypt::decrypt($value);
                            @endphp
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="password" id="password" type="text" value="{{ $decrypted }}" placeholder ="password" required>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end mb-0">
                            <div class="col-md-8 pl-md-2">
                                <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-5 float-right" value="Submit">Update</button>


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
