<head>
	<meta charset="utf-8" />
	<title>Log In | UBold - Responsive Admin Dashboard Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
	<meta content="Coderthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css2/login.css') }}">

</head>

<body class="authentication-bg">
	<div class="container">
		<div class="screen">
			<div class="screen__content">
				<form class="login" action="{{ route('login') }}" method="post">
					@csrf
					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
						<input type="text" id="emailaddress" name="email" class="login__input" value="{{ old('email') }}" required placeholder="User name / Email">
						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" id="password" name="password" required class="login__input" placeholder="Password">
						<div class="input-group-append" data-password="false">
							<div class="input-group-text">
								<span class="password-eye"></span>
							</div>
						</div>
						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					<button class="button login__submit" type="submit">
						<span class="button__text">Log In Now</span>
						<i class="button__icon fas fa-chevron-right"></i>
					</button>
				</form>
				<div class="social-login">
					<h3>log in via</h3>
					<div class="social-icons">
						<a href="#" class="social-login__icon fab fa-instagram"></a>
						<a href="#" class="social-login__icon fab fa-facebook"></a>
						<a href="#" class="social-login__icon fab fa-twitter"></a>
					</div>
				</div>
			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>
		</div>
	</div>
	<script src="{{ asset('js2/vendor.min.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('js2/app.min.js') }}"></script>
</body>