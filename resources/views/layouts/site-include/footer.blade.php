<footer class="footer">
    <div class="container">
        <div class="row header-banner">
            <div class="col-6 col-md-2 mb-3">
                <h5>Quick Links</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('home') }}" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('certificate') }}" class="nav-link p-0 text-muted">Our Certifications</a></li>
                    <li class="nav-item mb-2"><a href="javascript:void(0);" class="nav-link p-0 text-muted">Apply for Certification</a></li>
                    <li class="nav-item mb-2"><a href="javascript:void(0);" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('contact') }}" class="nav-link p-0 text-muted">Contact</a></li>
                </ul>
            </div>
            
            <div class="col-6 col-md-2 mb-3">
                <h5>For Tattoo Artists</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('home') }}" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="javascript:void(0);" class="nav-link p-0 text-muted">Tattoo Guidelines</a></li>
                    <li class="nav-item mb-2"><a href="javascript:void(0);" class="nav-link p-0 text-muted">Find Certified Artists</a></li>
                    <li class="nav-item mb-2"><a href="javascript:void(0);" class="nav-link p-0 text-muted">Become a Certified Artist</a></li>
                    <li class="nav-item mb-2"><a href="javascript:void(0);" class="nav-link p-0 text-muted">FAQs</a></li>
                </ul>
            </div>
            
            <div class="col-6 col-md-2 mb-3">
                <h5>For Studio Owners</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('home') }}" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="javascript:void(0);" class="nav-link p-0 text-muted">Studio Requirements</a></li>
                    <li class="nav-item mb-2"><a href="javascript:void(0);" class="nav-link p-0 text-muted">Apply for Certification</a></li>
                    <li class="nav-item mb-2"><a href="javascript:void(0);" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('contact') }}" class="nav-link p-0 text-muted">Contact</a></li>
                </ul>
            </div>
            

            <div class="col-md-5 offset-md-1 mb-3">
                <form>
                    <h5>Subscribe to our newsletter</h5>
                    <p>Monthly digest of what's new and exciting from us.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="emailInput" class="visually-hidden">Email address</label>
                        <input id="emailInput" type="email" class="form-control" placeholder="Email address">
                        <button class="btn btn-primary" type="button" id="subscribeBtn">Subscribe</button>
                    </div>
                </form>
            </div>
 
            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>Copyright © 2025 <a href="{{ route('home') }}" class="text-info text-decoration-none">{{ config('app.name', 'Laravel') }}</a>. 
                    Crafted with <i class="fa fa-heart text-danger"></i>
                    by <a href="https://codeofdolphins.com/" class="text-info text-decoration-none"><b>Code of Dolphins</b></a></p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-light" href="#"><i width="24" height="24" class="fa-brands fa-twitter"></i></a></li>
                    <li class="ms-3"><a class="link-light" href="#"><i width="24" height="24" class="fa-brands fa-instagram"></i></a></li>
                    <li class="ms-3"><a class="link-light" href="#"><i width="24" height="24" class="fa-brands fa-facebook"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
