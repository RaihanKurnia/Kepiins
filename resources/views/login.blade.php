<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>Metronic | Login</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{asset('assets/css/pages/users/login-2.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{asset('assets/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{{asset('assets/media/logos/Logo-Kepiins.png')}}" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-signin-on login-2 d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(assets/media/bg/bg-1.jpg);">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="{{asset('assets/media/logos/Logo-Kepiins.png')}}" class="max-h-200px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3>Sign In To Admin</h3>
								<p class="opacity-60 font-weight-bold">Enter your details to login to your account:</p>
							</div>
							<!-- <form class="form"> -->

								<div id="alert_in">	
									<!-- alert begin -->
								</div>
														
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="text" placeholder="Email" name="username" id="email_in" autocomplete="off" />
								</div>
								<div class="form-group">
									<div class="input-icon input-icon-right">
										<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 " type="password" placeholder="Password" id="password_in"/>
										<span>
											<button class="btn" type="button" id="pass_hide">
											<!-- <i class=' fas fa-eye'></i> -->
											<i class=' fas fa-eye-slash'></i>
											</button>
										</span>
									</div>
								</div>

								

								<div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8">
									<label class="checkbox checkbox-outline checkbox-white text-white m-0">
									<input type="checkbox" name="remember" />Remember me
									<span></span></label>
									<a href="javascript:;" id="kt_login_forgot" class="text-white font-weight-bold">Forget Password ?</a>
								</div>
								<div class="form-group text-center mt-10">
									<button id="login_signup_submit_in" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Sign In</button>
								</div>
							<!-- </form> -->
							<div class="mt-10">
								<span class="opacity-70 mr-4">Don't have an account yet?</span>
								<a href="javascript:;" id="kt_login_signup" class="text-white font-weight-bold">Sign Up</a>
							</div>
						</div>
						<!--end::Login Sign in form-->
						<!--begin::Login Sign up form-->
						<div class="login-signup">
							<div class="mb-20">
								<h3>Sign Up</h3>
								<p class="opacity-60">Enter your details to create your account</p>
							</div>
							<form class="form text-center">
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Fullname" name="fullname" />
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password" />
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="Confirm Password" name="rpassword" />
								</div>
								<div class="form-group text-left px-8">
									<label class="checkbox checkbox-outline checkbox-white text-white m-0">
									<input type="checkbox" name="agree" />I Agree the
									<a href="#" class="text-white font-weight-bold">terms and conditions</a>.
									<span></span></label>
									<div class="form-text text-muted text-center"></div>
								</div>
								<div class="form-group">
									<button id="kt_login_signup_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Sign Up</button>
									<button id="kt_login_signup_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
								</div>
							</form>
						</div>
						<!--end::Login Sign up form-->
						<!--begin::Login forgot password form-->
						<div class="login-forgot">
							<div class="mb-20">
								<h3>Forgotten Password ?</h3>
								<p class="opacity-60">Enter your email to reset your password</p>
							</div>
							<form class="form">
								<div class="form-group mb-10">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off" />
								</div>
								<div class="form-group">
									<button id="kt_login_forgot_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Request</button>
									<button id="kt_login_forgot_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
								</div>
							</form>
						</div>
						<!--end::Login forgot password form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('assets/js/pages/custom/login/login.js')}}"></script>
		<!--end::Page Scripts-->
		<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

		<script type="text/javascript">
		$('#pass_hide').click(function(){
			var passwordInput = $('#password_in');
			var icon = $(this).find('i');
			var newType = (passwordInput.attr('type') === 'password') ? 'text' : 'password';
			passwordInput.attr('type', newType);
			icon.toggleClass('fas fa-eye-slash fas fa-eye');
    	});



		$(document).ready(function() {
			$('#email_in, #password_in').keypress(function(event) {
				if (event.keyCode === 13) { 
					event.preventDefault();
					$('#login_signup_submit_in').trigger('click'); 
				}
			});
		});

      	$("#login_signup_submit_in").click(function(){
			var email = $('#email_in').val();
       		var password = $('#password_in').val();

			if(email == "" || password == ""){
				// $('#alert_in').prop('hidden', false);
				$('#alert_in').append("<div class='alert alert-custom alert-light-danger fade show mb-5' role='alert'><div class='alert-icon'><i class='flaticon-warning'></i></div>"+
									"<div class='alert-text'>Masukkan Email/Password dengan Benar</div><div class='alert-close'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>"+
									"<span aria-hidden='true'><i class='ki ki-close'></i></span></button></div></div>")
			} else{
				$.ajax({  
					url : "{{route('loginproses')}}",
					type : "post",
					dataType : "json",
              		async : true,
					data : {
						"_token": "{{ csrf_token() }}",
						email : email,
						password : password
					},
					success:function(response){
						if (response.success == false){
						$('#alert_in').append("<div class='alert alert-custom alert-light-danger fade show mb-5' role='alert'><div class='alert-icon'><i class='flaticon-warning'></i></div>"+
								"<div class='alert-text'>"+response.message+"</div><div class='alert-close'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>"+
								"<span aria-hidden='true'><i class='ki ki-close'></i></span></button></div></div>")
						}else{
							let timerInterval
							Swal.fire({
								title: 'Login Berhasil!',
								html: 'Anda akan di arahkan dalam beberapa detik.',
								icon: 'success',
								timer: 2000,
								timerProgressBar: true,
								showConfirmButton: false,
								didOpen: () => {
									Swal.showLoading()
									const b = Swal.getHtmlContainer().querySelector('b')
									timerInterval = setInterval(() => {
									b.textContent = Swal.getTimerLeft()
									}, 100)
								},
								willClose: () => {
									clearInterval(timerInterval)
								}
							}).then((result) => {
								if (result.dismiss === Swal.DismissReason.timer) {
								window.location.href = "{{ route('dashboard') }}";
								}
							})
							
						}
					},
					error: function(xhr, errorType, thrownError) {
						console.error("Kesalahan AJAX:", thrownError);
						Swal.fire({
								position: "top-end",
								title: 'Sorry!',
								text: thrownError,
								icon: 'error',
								timer: 2000,
								showConfirmButton: false,
								timerProgressBar: true
							})

							
					}

				});
			}

		});

		



		</script>


	</body>
	<!--end::Body-->
</html>