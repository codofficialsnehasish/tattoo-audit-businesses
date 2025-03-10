<!DOCTYPE html>
  <html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('assets/site-assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" href="path-to-your-favicon.ico" type="{{ asset('assets/site-assets/image/x-icon') }}">
    <link rel="stylesheet" href="{{ asset('assets/site-assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site-assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container top">
          <a class="navbar-brand d-flex logo" href="{{ route('home') }}">
            <img src="{{ asset('assets/site-assets/img/logo/TheBeautyXtenso-logo.png') }}" alt="Brand Logo"  class="d-inline-block align-text-top logoSm">
            <!-- <span class="logoFull">TQCS International
              <small>Lorem ipsum dolor sit amet.</small>
            </span> -->
          </a>
  
          <div class="font-color collapse d-flex" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <!-- <a class="nav-link active" aria-current="page" href="#">ABOUT</a>
              <a class="nav-link" href="#">SERVICES</a>
              <a class="nav-link" href="#">CERTIFIED ORGANISATIONS</a>
              <a class="nav-link" href="#">NEWS</a>
              <a class="nav-link" href="#">RESOURCES</a>
              <a class="nav-link" href="#">CONTACT</a> -->
  
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About Us</a>
                  </li>
                  <!--  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Services</a>
                   <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li> -->
              
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('certificate') }}">Certification</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('blogs') }}">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link">Resources</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('registration') }}">Registration</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                  </li>
                </ul>
  
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



