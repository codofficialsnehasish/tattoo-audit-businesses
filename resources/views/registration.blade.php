@include('header')
<main>
  <article class="article">
  <section class="bsb-hero-5 px-3 bsb-overlay mt-5">

      <div class="container">
          <div class="row ">
              <div class="col-12 col-md-12">
                  <!-- <fieldset style="border: 1px solid #fff;"> -->
                  <form class="regist_from">
                      <fieldset>
                          <legend>Basic Information: </legend>

                      <div class="form-group row">
                          <div class="col-lg-6 col-md-6">
                          <label for="validationCustom01">First Name</label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" id="validationCustom01"
                                  placeholder="Enter First name">
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                      <label for="validationCustom02">Last Name</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" id="validationCustom02"
                              placeholder="Enter Last name">
                      </div>
                  </div>
                      </div>


                      <div class="form-group row">
                          <div class="col-lg-6 col-md-6">
                              <label for="businessName">Business Name</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="businessName"
                                      placeholder="Enter Business name">
                              </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <label for="businessCategory">Business Category</label>
                          <div class="col-sm-12 ">
                              <select class="col-lg-12 custom-select my-1 mr-sm-2" id="businessCategory">
                                  <option selected>Choose...</option>
                                  <option value="1">One</option>
                                  <option value="2">Two</option>
                                  <option value="3">Three</option>
                              </select>
                          </div>
                  </div>
                      </div>


                      <div class="form-group row">
                          <div class="col-lg-6 col-md-6">
                              <label for="inputEmail3">Email</label>
                              <div class="col-sm-12">
                                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                              </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <label for="gender">Gender</label>
                          <div class="col-sm-12 ">
                              <select class="col-lg-12 custom-select my-1 mr-sm-2" id="gender">
                                  <option selected>Choose...</option>
                                  <option value="1">Male</option>
                                  <option value="2">Female</option>
                                  <!-- <option value="3">Three</option> -->
                              </select>
                          </div>
                  </div>
                      </div>


                      <div class="form-group row">
                          <div class="col-lg-4 col-md-6">
                              <label for="phone">Mobile Number</label>
                              <div class="col-sm-12">
                                  <input type="tel" class="form-control" id="phone" placeholder="+91">
                              </div>
                      </div>
                      <div class="col-lg-4 col-md-6">
                          <label for="alternativePhone">Alternative Mobile
                              Number</label>
                          <div class="col-sm-12">
                              <input type="tel" class="form-control" id="alternativePhone" placeholder="+91">
                          </div>
                  </div>

                  <div class="col-lg-4 col-md-6">
                      <label for="dob">Date Of Birth</label>
                          <div id="datepicker" class="input-group date col-sm-12" data-date-format="mm-dd-yyyy"
                              style="width: 100%;">
                              <input class="form-control datetimepicker flatpickr-input" type="date"/>
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
                              <input type="text" class="form-control" id="address" placeholder="Enter Address">
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <label for="businessAddress">Business Address</label>
                          <div class="col-sm-12 ">
                              <input type="text" class="form-control" id="businessAddress"
                                  placeholder="Enter Business Address">
                          </div>
                  </div>
                      </div>

                      
                      <div class="form-group row">
                          <div class="col-lg-4 col-md-4">
                              <label for="customFile">Profile Picture</label>
                              <div class="col-sm-12">
                                  <input type="file" class="form-control custom-file-input" id="customFile"
                                      placeholder="Enter First name">
                              </div>
                      </div>
                      <div class="col-lg-4 col-md-4">
                          <label for="phone">Trade License Number</label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" id="phone" placeholder="">
                          </div>
                  </div>

                  <div class="col-lg-4 col-md-4">
                      <label for="customFile">Trade License Image</label>
                      <div class="col-sm-12">
                          <input type="file" class="form-control custom-file-input" id="customFile"
                              placeholder="">
                      </div>
              </div>
                      </div>


                     </fieldset>
                      <fieldset>
                          <legend>Status : </legend>

                          <div class="form-group row">

                          <div class="col-lg-6 col-md-6">
                               <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-12">
                                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                              </div>
                      </div>


                          <div class="col-lg-6 col-md-6">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                              <div class="col-sm-12">
                                  <input type="password" class="form-control" id="inputPassword3"
                                      placeholder="Password">
                              </div>
                      </div>
                          </div>


                          
                          <div class="form-group row">

                              <div class="col-lg-1 col-md-1">
                                  <div class="form-check">
                                      <input class="form-check-input" type="radio" name="gridRadios"
                                          id="gridRadios1" value="option1" checked>
                                      <label class="form-check-label" for="gridRadios1">
                                          Active
                                      </label>
                                  </div>
                          </div>


                              <div class="col-lg-1 col-md-1">
                                  <div class="form-check">
                                      <input class="form-check-input" type="radio" name="gridRadios"
                                          id="gridRadios2" value="option2">
                                      <label class="form-check-label" for="gridRadios2">
                                          Inactive
                                      </label>
                                  </div>
                          </div>
</div>

                          <div class="form-group row">
                          
                          <div class="col-lg-1 col-md-1">
                              <button type="submit" class="submit btn btn-primary">Submit</button>
                      </div>

                      <div class="col-lg-1 col-md-1">
                          <button type="cancel" class="cancel btn btn-primary">Cancel</button>
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
@include('footer')