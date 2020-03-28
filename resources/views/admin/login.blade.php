<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{url('/')}}/loginassets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('/')}}/loginassets/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{url('/')}}/loginassets/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
                 
                        <form method="POST" action='{{ url("admin/login") }}'>
                       
					<span class="login100-form-title p-b-51">
						Login
					</span>
                    
                   
                    
                    
					{{csrf_field()}}
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100">
                       
                        </span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

				</form>
				@if(Session::has('login_feedback'))
				<div style="color: red;font-size: 20px;text-align: center;">
					{{Session::get('login_feedback')}}
				</div>
				@endif
			</div>
		</div>
	</div>
	

	
	
	<script src="{{url('/')}}/loginassets/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="{{url('/')}}/loginassets/js/main.js"></script>

</body>
</html>