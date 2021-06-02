<!DOCTYPE html>
<html lang="en">
<head>
	<title>Halaman Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('loginpage/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginpage/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginpage/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginpage/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginpage/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginpage/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginpage/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginpage/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginpage/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginpage/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('loginpage/css/main.css') }}">
<!--===============================================================================================-->



</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 ">
                <form class="form-auth-small py-4" action="/postlogin" method="POST">
                    {{ csrf_field() }}
					<span class="login100-form-title p-b-30">
						Sistem Pendukung Keputusan
                    </span>
                    <span class="login100-form-title p-b-30">
						Penerimaan Beasiswa
                    </span>

					<span class="login100-form-avatar">
						<img src="{{ asset('loginpage/images/smp14.jpeg') }}" alt="AVATAR">
                    </span>

                    <main class="py-8">
                        @if(Session::has('pesan'))
                            <div class="alert alert-info alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                {{ Session::get('pesan') }}
                            </div>
                        @endif
                    </main>

					<div class="form-group100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<label for="email" class="control-label sr-only">Username</label>
						<input name="email" class="form-control" id="email"  placeholder="Masukkan Username">
					</div>

					<div class="form-group100 validate-input m-b-50" data-validate="Enter password">
						<label for="signin-password" class="control-label sr-only">Password</label>
						<input name="password" type="password" class="form-control" id="signin-password" placeholder="Masukkan Password">
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn mb-2">
							Login
                        </button>

                        <a class="btn btn-primary login100-form" href="/info-penerima-beasiswa" role="button">Informasi Penerima Beasiswa</a>

					</div>
                </form>

                <!--
                    <form class="form-auth-small" action="/daftaranggota">

                    <div class="container-register100-form-btn mb-2">
						<button class="register100-form-btn">
							Daftar
                        </button>

					</div>

                </form>
            -->
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="{{ asset('loginpagevendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('loginpagevendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('loginpagevendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('loginpagevendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('loginpagevendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('loginpagevendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('loginpagevendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('loginpagevendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('loginpagejs/main.js') }}"></script>

</body>
</html>
