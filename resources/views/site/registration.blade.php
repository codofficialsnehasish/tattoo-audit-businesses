@extends('layouts.web-app')

@section('title') Registration @endsection

@section('content')

<main>
    <article class="article">
        <section class="bsb-hero-5 px-3 bsb-overlay mt-5">

            <div class="container">
                <div class="row ">
                    <div class="col-12 col-md-12">
                        <!-- <fieldset style="border: 1px solid #fff;"> -->
                        <form class="regist_from" action="{{ route('register-user') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <legend>Basic Information: </legend>

                                <div class="form-group row">
                                    <div class="col-lg-6 col-md-6">
                                        <label for="first_name">First Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Enter First name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <label for="last_name">Last Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Enter Last name">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-lg-6 col-md-6">
                                        <label for="businessName">Business Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="businessName" name="business_name" value="{{ old('business_name') }}" placeholder="Enter Business name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <label for="businessCategory">Business Category</label>
                                        <div class="col-sm-12 ">
                                            <select class="col-lg-12 custom-select my-1 mr-sm-2" id="businessCategory" name="business_category">
                                                <option selected disabled>Choose...</option>
                                                @foreach($business_categorys as $business_category)
                                                <option value="{{ $business_category->id }}" @if( old('business_category') == $business_category->id ) selected @endif>{{ $business_category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-lg-6 col-md-6">
                                        <label for="email">Email</label>
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <label for="gender">Gender</label>
                                        <div class="col-sm-12 ">
                                            <select class="col-lg-12 custom-select my-1 mr-sm-2" id="gender" name="gender">
                                                <option selected disabled>Choose...</option>
                                                <option value="male" @if( old('gender') == 'male' ) selected @endif>Male</option>
                                                <option value="female" @if( old('gender') == 'female' ) selected @endif>Female</option>
                                                <option value="others" @if( old('gender') == 'others' ) selected @endif>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-lg-4 col-md-6">
                                        <label for="phone">Mobile Number</label>
                                        <div class="col-sm-12">
                                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+91">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <label for="alternativePhone">Alternative Mobile Number</label>
                                        <div class="col-sm-12">
                                            <input type="tel" class="form-control" id="alternativePhone" name="opt_mobile_no" value="{{ old('opt_mobile_no') }}" placeholder="+91">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <label for="dob">Date Of Birth</label>
                                        <div id="datepicker" class="input-group date col-sm-12" data-date-format="mm-dd-yyyy" style="width: 100%;">
                                            <input class="form-control datetimepicker flatpickr-input" name="date_of_birth" value="{{ old('date_of_birth') }}" type="date"/>
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6 col-md-6">
                                        <label for="address">Address</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Enter Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <label for="businessAddress">Business Address</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" id="businessAddress" name="business_address" value="{{ old('business_address') }}" placeholder="Enter Business Address">
                                        </div>
                                    </div>
                                </div>

                      
                                <div class="form-group row">
                                    <div class="col-lg-4 col-md-4">
                                        <label for="customFile">Profile Picture</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control custom-file-input" id="customFile" name="profile_image" placeholder="Enter First name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <label for="trade_license_number">Trade License Number</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="trade_license_number" name="trade_license_number" value="{{ old('trade_license_number') }}" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4">
                                        <label for="trade_license_image">Trade License Image</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control custom-file-input" name="trade_license_image" id="trade_license_image" placeholder="">
                                        </div>
                                    </div>
                                </div>


                            </fieldset>
                            <fieldset>
                                <legend>Status : </legend>

                                <div class="form-group row mb-5">

                                    <div class="col-lg-6 col-md-6">
                                        <label for="login-email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control" id="login-email" value="{{ old('email') }}" placeholder="Email" readonly>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputPassword3" name="password" value="{{ old('password') }}" placeholder="Password">
                                        </div>
                                    </div>
                                </div>


                          
                                {{-- <div class="form-group row">

                                    <div class="col-lg-1 col-md-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                            <label class="form-check-label" for="gridRadios1">Active</label>
                                        </div>
                                    </div>


                                    <div class="col-lg-1 col-md-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                            <label class="form-check-label" for="gridRadios2">Inactive</label>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="form-group row justify-content-center">
                                
                                    <div class="col-lg-1 col-md-1">
                                        <button type="submit" class="submit btn btn-primary">Submit</button>
                                    </div>

                                    <div class="col-lg-1 col-md-1">
                                        <button type="reset" class="cancel btn btn-primary">Cancel</button>
                                    </div>

                                </div>

                            </fieldset>
                        </form>
                        <!-- </fieldset> -->
                    </div>
                </div>
            </div>
        </section>
    </article>
</main>

@endsection

@section('script')
<script>
    $('#email').on('keyup',function(){
        $('#login-email').val($(this).val());
    });
</script>
@endsection