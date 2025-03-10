@include('header')<main>


    <article class="article">
        <section class="topBanner heroSection bsb-hero-5 px-3 bsb-overlay mt-5"  style="background-image: url('{{ asset('assets/site-assets/img/banner/360.jpg') }}');">
        <div class="container">
          <div class="row align-items-center">
            <!-- Left empty column -->
            <div class="col-12 col-md-2"></div>
            <!-- Content column -->
            <div class="col-12 col-md-8 text-start gerw">
              <h2 class="text-center text-start fw-bold mb-4" style="font-size: 50px;">Contact Us</h2>

              <p class="lead text-white mb-5"> There are three ways to ultimate success: The first way is to be kind. The second way is to be kind. The third way is to be kind.</p>
            </div>
            <div class="col-12 col-md-2"></div>
          </div>
        </div>
      </section>

      <section class="bsb-hero-5 px-3 bsb-overlay">
        <div class="container">
          <div class="row ">
            <div class="col-12 col-md-6">
                <img src="{{ asset('assets/site-assets/img/photo/HILmr.png') }}" alt="World illustration" class="img-fluid">
              </div>
            <div class="col-12 col-md-6">
                <div class="contact-form">
                    <h2>Contact Us</h2>
                    <form action="/submit-contact" method="POST">
                      <label for="name">Your Name</label>
                      <input type="text" id="name" name="name" placeholder="Enter your name" required>
                
                      <label for="email">Your Email</label>
                      <input type="email" id="email" name="email" placeholder="Enter your email" required>
                
                      <label for="message">Your Message</label>
                      <textarea id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>
                
                      <button type="submit">Send Message</button>
                    </form>
                  </div>
          </div>
            
          </div>
        </div>
      </section>

      
      <section class="fre_cunsultend">

          <div class="container">
            <div class="row header-banner box_warp">
              <div class="heading" style=" border-radius:30px;">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                <a href="#">Free Consultation</a>
              </div>
            </div>

        </div>
      </section>

    </article>


</main>
@include('footer')