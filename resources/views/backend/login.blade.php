
<!DOCTYPE html>
<html lang="en">

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>


		<!-- Favicon -->
		<link rel="icon" href="{{ asset('backend/assets/img/logo/preloader/logo.png') }}" type="image/x-icon"/>

		<!-- Title -->
		<title>Spiciffy</title>

		<!-- Bootstrap css-->
		<link href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>

		<!-- Icons css-->
		<link href="{{asset('backend/assets/plugins/web-fonts/icons.css')}}" rel="stylesheet"/>
		<link href="{{asset('backend/assets/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{asset('backend/assets/plugins/web-fonts/plugin.css')}}" rel="stylesheet"/>

		<!-- Style css-->
		<link href="{{asset('backend/assets/css/style/style.css')}}" rel="stylesheet">
		<link href="{{asset('backend/assets/css/skins.css')}}" rel="stylesheet">
		<link href="{{asset('backend/assets/css/dark-style.css')}}" rel="stylesheet">
		<link href="{{asset('backend/assets/css/colors/default.css')}}" rel="stylesheet">


		<!-- Color css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('backend/assets/css/colors/color.css')}}">

		<!-- Switcher css-->
		<link href="{{asset('backend/assets/switcher/css/switcher.css')}}" rel="stylesheet">
		<link href="{{asset('backend/assets/switcher/demo.css')}}" rel="stylesheet">



	</head>



	<body class="main-body leftmenu">


		</div>
		<!-- End Switcher -->

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{asset('backend/assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
        <!-- End Loader -->


		<!-- Page -->
		<div class="page main-signin-wrapper">

			<!-- Row -->
			<div class="row signpages text-center">
				<div class="col-md-12">
					<div class="card">
						<div class="row row-sm">
							<div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
								<div class="mt-5 pt-4 p-2 pos-absolute">
									<img style="padding-left:31px;" src="{{asset('backend/assets/img/brand/logo.png')}}" width="220px" height="120px" class="header-brand-img mb-4" alt="logo">
									<div class="clearfix"></div>
									{{-- <img src="assets/img/svgs/user.svg" class="ht-100 mb-0" alt="user"> --}}
									<h5 style="padding-left:31px;" class="mt-4 text-white">Signin to Your Account</h5>

								</div>
							</div>


							<div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form ">
								<div class="container-fluid">
									<div class="row row-sm">
										<div class="card-body mt-2 mb-2">
											<img src="assets/img/brand/1690196928294.png" class=" d-lg-none header-brand-img text-left float-left mb-4" alt="logo">
											<div class="clearfix"></div>
@if (Session::has('error'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>  {{ session::get('error')}}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
 @endif
											<form action="{{ route('admin.login') }}" method="POST">

											@csrf

												{{-- <h5 class="text-left mb-2">Signin to Your Account</h5> --}}
												{{-- <p class="mb-4 text-muted tx-13 ml-0 text-left">Signin to create, discover and connect with the global community</p> --}}
												<div class="form-group text-left">
													<label>User Name</label>
													<input class="form-control" placeholder="Enter your user name" id="user_name" name="user_name" type="text">
												</div>
												<div class="form-group text-left">
													<label>Password</label>
													<input class="form-control" placeholder="Enter your password" id="password" name="password" type="password">
												</div>
												<button class="btn ripple btn-main-primary btn-block">Sign In</button>
											</form>


											<!-- <div class="text-left mt-5 ml-0">
												<div class="mb-1"><a href="#">Forgot password?</a></div>
												<div>Don't have an account? <a href="#">Register Here</a></div>
											</div> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->

		</div>
		<!-- End Page -->

		<!-- Jquery js-->
		<script src="{{asset('backend/assets/plugins/jquery/jquery.min.js')}}"></script>

		<!-- Bootstrap js-->
		<script src="{{asset('backend/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!-- Select2 js-->
		<script src="{{asset('backend/assets/plugins/select2/js/select2.min.js')}}"></script>


		<!-- Custom js -->
		<script src="{{asset('backend/assets/js/custom.js')}}"></script>

		<!-- Switcher js -->
		<script src="{{asset('backend/assets/switcher/js/switcher.js')}}"></script>




	</body>

</html>
