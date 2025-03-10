<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('assets/site-assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" href="path-to-your-favicon.ico" type="{{ asset('assets/site-assets/image/x-icon') }}">
    <link rel="stylesheet" href="{{ asset('assets/site-assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site-assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Toast message -->
    <link href="{{ asset('assets/admin-assets/plugins/toast/toastr.css') }}" rel="stylesheet" type="text/css" />
    <!-- Toast message -->

    <!-- Select2 -->
    <link href="{{ asset('assets/admin-assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Select2 -->


    @yield('style')

</head>
  
<body>

    @include('layouts.site-include.header')

    @yield('content')

    @include('layouts.site-include.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/site-assets/bundle/bootstrap.bundle.min.js') }}"></script>

    <!-- toast message -->
    <script src="{{ asset('assets/admin-assets/plugins/toast/toastr.js') }}"></script>
    <script src="{{ asset('assets/admin-assets/js/toastr.init.js') }}"></script>
    <!-- toast message -->
    @include('layouts._massages')

    <!-- Select2 -->
    <script src="{{ asset('assets/admin-assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin-assets/js/form-advanced.init.js') }}"></script>
    <!-- Select2 -->

    <script>
        $('#subscribeBtn').on('click', function () {
            var email = $('#emailInput').val();

            if (email.trim() === "") {
                showToast('error', 'Error', 'Please enter your email.');
                return;
            }

            $.ajax({
                url: "{{ route('newsletter-subscribe') }}",
                method: 'POST',
                data: {
                    email: email,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    $('#emailInput').val('');
                    showToast('success', 'Success', 'Thank you for subscribing!');
                },
                error: function (xhr, status, error) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors; // Get validation errors
                        let errorMessages = '';

                        // Loop through errors and append to the message
                        $.each(errors, function (key, value) {
                            errorMessages += value[0] + '<br>'; // Add each error message
                        });

                        // Show all error messages
                        showToast('error', 'Error', errorMessages);
                    } else {
                        // Show generic error message
                        showToast('error', 'Error', 'Something went wrong. Please try again.');
                    }
                }
            });
        });
    </script>

    @yield('script')
</body>

</html>