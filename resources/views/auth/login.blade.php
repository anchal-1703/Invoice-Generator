<head>
    <meta charset="utf-8" />
    <title>Log In </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="{{ asset('public/assets/css2/bootstrap-creative.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{ asset('public/assets/css2/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{ asset('public/assets/css2/bootstrap-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{ asset('public/assets/css2/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled />
    <link href="{{ asset('public/assets/css2/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('public/assets/style.css') }}">

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
                        <input type="text" id="emailaddress" name="email" class="login__input @error('email') is-invalid @enderror" value="{{ old('email') }}" required placeholder="User name / Email">
                        @error('email')
                        <span class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="login__field" style="display: flex; align-items: center" >
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" id="password" name="password" required class="login__input @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append" data-password="false" >
                           
                                <span class="password-eye" id="togglePassword">
                                    <!-- Optionally, you can use an icon here, e.g., FontAwesome -->
                                    <i class="fa fa-eye" ></i>
                                </span>
                            
                        </div>
                        @error('password')
                        <span class="alert alert-danger" role="alert">
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
    <!-- Vendor js -->
    <script src="{{ asset('js2/vendor.min.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('js2/app.min.js') }}"></script>
    <script src="{{ asset('js2/script.js') }}"></script>
</body>