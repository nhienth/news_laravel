<!DOCTYPE html>
<html lang="en">
<head>
	<title>NEWS - Đặt lại mật khẩu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v1/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v1/vendor/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v1/vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v1/vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v1/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v1/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('assets/Login_v1/images/img-01.png')}}" alt="IMG">
				</div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />


				<form class="login100-form validate-form" action="{{ route('password.update') }}" method="POST">
                    @csrf

                     <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
					<span class="login100-form-title">
						<h3>ĐẶT LẠI MẬT KHẨU</h3> 
					</span>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

					<div style="margin-bottom : 20px" class="wrap-input100 validate-input">
						<input class="input100" id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div style="margin-bottom : 20px" class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" data-validate = "Vui lòng nhập mật khẩu" placeholder="Mật khẩu" required >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password_confirmation" data-validate = "Vui lòng nhập mật khẩu" placeholder="Nhập lại mật khẩu" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Đặt lại mật khẩu
						</button>
					</div>


					<div class="text-center p-t-136">
						<a class="txt2" href="http://127.0.0.1:8000/register">
							Tạo tài khoản mới
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
	<script src="{{asset('assets/Login_v1/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/Login_v1/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('assets/Login_v1/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/Login_v1/vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('assets/Login_v1/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="{{asset('assets/Login_v1/js/main.js')}}"></script>

</body>
</html>