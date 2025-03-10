<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container top">
            <a class="navbar-brand d-flex logo" href="{{ route('home') }}">
                {{-- <img src="{{ asset('assets/site-assets/img/logo/TheBeautyXtenso-logo.png') }}" alt="Brand Logo"  class="d-inline-block align-text-top logoSm"> --}}
                <span style="font-size: 32px;
                            font-weight: bold;
                            font-family: 'Poppins', sans-serif;
                            background: linear-gradient(to right, #007bff, #00c6ff); /* Blue Gradient */
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            text-transform: uppercase;
                            letter-spacing: 3px;
                            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
                        ">PHCRO</span>
            </a>

            <div class="font-color collapse d-flex" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link @if(request()->segment(1) == '') active @endif" aria-current="page" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->segment(1) == 'about') active @endif" href="{{ route('about') }}">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->segment(1) == 'certification') active @endif" href="{{ route('certificate') }}">Certification</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->segment(1) == 'blogs') active @endif" href="{{ route('blogs') }}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->segment(1) == 'course') active @endif" href="{{ route('course') }}">Course</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->segment(1) == 'registration') active @endif" href="{{ route('registration') }}">Registration</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->segment(1) == 'contact') active @endif" href="{{ route('contact') }}">Contact Us</a>
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="navbar-nav secondary-nav socal_i">
                    <!-- <a class="show-search nav-link active nav-locations" aria-current="page" href="#">AU</a> -->
                    {{-- <a class="nav-link nav-locations active" href="#"><i class="fa-solid fa-location-dot"></i></a> --}}
                    <!-- <a class="nav-link nav-locations" href="#"><i class="fa-brands fa-google-scholar"></i></a> -->
                    <a class="nav-link nav-locations" href="{{ route('login') }}"><i class="fa-solid fa-user"></i></a>
                    {{-- <a class="nav-link nav-locations" href="#"><i class="fa-solid fa-magnifying-glass"></i></a> --}}
                </div>
            </div>
        </div>
    </nav>
</header>



