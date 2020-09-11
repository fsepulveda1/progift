<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Progift | Login
    </title>
    <!-- Favicon -->
    <link href="/assets_admin/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="/assets_admin/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="/assets_admin/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="/assets_admin/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
    <style>
        .login .btn-primary:active,
        .login .btn-primary {
            background-color: #eac707 !important;
            border-color: #ebc707 !important;
        }
    </style>
</head>

<body class="bg-dark">
<div class="main-content">
    <!-- Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-progift-left py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <!-- <h1 class="text-white">Welcome!</h1> -->
                        <!-- <p class="text-lead text-light">Use these awesome forms to login or create new account in your project for free.</p> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-dark" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <div class="container mt--9 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center mb-3">
                            <img src="{{asset('assets/images/logo_pdf.png')}}" alt="" width="150px">
                        </div>
                        <div class="text-center text-muted mb-5">
                        </div>
                        @if(!$errors->isEmpty())
                            <div class="alert alert-danger mb-4">
                                <ul class="list-unstyled mb-0">
                                    @foreach($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" class="login" action="{{ route('voyager.login') }}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">
                                    {{ __('voyager::generic.email') }}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('voyager::generic.email') }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">
                                    {{ __('voyager::generic.password') }}
                                </label>
                                <div class="col-md-6">
                                    <input type="password" name="password" placeholder="{{ __('voyager::generic.password') }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" id="remember" value="1"><label for="remember" class="remember-me-text">&nbsp;&nbsp;{{ __('voyager::generic.remember_me') }}</label>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-block login-button btn-primary">
                                        <span class="signin">{{ __('voyager::generic.login') }}</span>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div style="clear:both"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--   Core   -->
<script src="/assets_admin/js/plugins/jquery/dist/jquery.min.js"></script>
<script src="/assets_admin/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!--   Optional JS   -->
<!--   Argon JS   -->
<script src="/assets_admin/js/argon-dashboard.min.js?v=1.1.0"></script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script>
    var btn = document.querySelector('button[type="submit"]');
    var form = document.forms[0];
    var email = document.querySelector('[name="email"]');
    var password = document.querySelector('[name="password"]');
    btn.addEventListener('click', function(ev){
        if (form.checkValidity()) {
            btn.querySelector('.signingin').className = 'signingin';
            btn.querySelector('.signin').className = 'signin hidden';
        } else {
            ev.preventDefault();
        }
    });
    email.focus();
    document.getElementById('emailGroup').classList.add("focused");

    // Focus events for email and password fields
    email.addEventListener('focusin', function(e){
        document.getElementById('emailGroup').classList.add("focused");
    });
    email.addEventListener('focusout', function(e){
        document.getElementById('emailGroup').classList.remove("focused");
    });

    password.addEventListener('focusin', function(e){
        document.getElementById('passwordGroup').classList.add("focused");
    });
    password.addEventListener('focusout', function(e){
        document.getElementById('passwordGroup').classList.remove("focused");
    });

</script>
</body>

</html>