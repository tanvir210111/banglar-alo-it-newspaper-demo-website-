<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/login/assets/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/login/assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/login/assets/fonts/flaticon/font/flaticon.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600;700&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/login/assets/css/style.css') }}">

    <style>
        body { background-color: #f8f9fa; font-family: 'Jost', sans-serif; }
        .login-7 .form-section {
            max-width: 480px;
            margin: 0 auto;
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
        }
        .form-box { position: relative; }
        .form-box i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }
        .btn-theme {
            background: #0069d9;
            color: #fff;
            border: none;
            padding: 10px 0;
            font-weight: 600;
            border-radius: 5px;
        }
        .btn-theme:hover {
            background: #0056b3;
        }
        .back-login {
            margin-top: 15px;
            display: block;
        }
        .back-login a {
            text-decoration: none;
            font-weight: 600;
            color: #0069d9;
        }
        .back-login a:hover {
            text-decoration: underline;
        }
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>

<body id="top">
<div class="login-7">
    <div class="container">
        <div class="form-section">

            {{-- Logo --}}
            <div class="logo mb-3">
                <a href="{{ route('frontend.index') }}">
                    <img src="{{ asset('assets/images/logo/'.$gs->logo) }}" alt="logo" style="max-height:80px;">
                </a>
            </div>

            <h3 class="mb-3">{{ __('Forgot Password') }}</h3>
            <p class="text-muted mb-4">{{ __('Enter your email address and we’ll send you a reset link.') }}</p>

            {{-- ✅ Success / Error Message --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            {{-- ✅ Validation Error --}}
            @include('includes.validation.form_validation')

            {{-- ✅ Forgot Form --}}
            <form id="forgotform" action="{{ route('front.forgot.submit') }}" method="POST">
                @csrf
                <div class="form-group mb-3 form-box">
                    <input type="email" name="email" class="form-control" placeholder="{{ __('Email Address') }}" required>
                    <i class="flaticon-mail-2"></i>
                </div>

                <button type="submit" class="btn btn-primary w-100 btn-theme">{{ __('Send Reset Link') }}</button>

                <div class="back-login mt-3">
                    <a href="{{ route('front.LogReg') }}"><i class="fa fa-arrow-left"></i> {{ __('Back to Login') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JS -->
<script src="{{ asset('assets/frontend/login/assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/login/assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
