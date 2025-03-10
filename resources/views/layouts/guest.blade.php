<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="favicon.ico" type="image/x-icon"/>

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" href="{{ asset('assets/admin-assets/plugins/bootstrap/css/bootstrap.min.css') }}" />

    <!-- Core css -->
    <link rel="stylesheet" href="{{ asset('assets/admin-assets/css/style.min.css') }}"/>

    @yield('style')
</head>
<body class="font-muli theme-cyan gradient">

    <div class="auth option2" style="background-image: url('{{ asset('assets/admin-assets/images/9094466.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
        <div class="auth_left" style="@yield('auth_left_style')">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <a class="header-brand" href="{{ route('home') }}">{{--<i class="fa fa-graduation-cap brand-logo"></i>--}} 
                            <span style="font-size: 32px;
                            font-weight: bold;
                            font-family: 'Poppins', sans-serif;
                            background: linear-gradient(to right, #007bff, #00c6ff); /* Blue Gradient */
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            text-transform: uppercase;
                            letter-spacing: 3px;
                            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
                        ">{{ config('app.name', 'Laravel') }}</span>
                        </a>
                        <div class="card-title mt-3">@yield('login-title')</div>
                    </div>
                    {{ $slot }}
                </div>
            </div>        
        </div>
    </div>

    <!-- Start Main project js, jQuery, Bootstrap -->
    <script src="{{ asset('assets/admin-assets/bundles/lib.vendor.bundle.js') }}"></script>

    <!-- Start project main js  and page js -->
    <script src="{{ asset('assets/admin-assets/js/core.js') }}"></script>
    
    @yield('script')
</body>
</html>