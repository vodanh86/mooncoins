<!DOCTYPE html>
<html lang="en">
  @include('includes.header')	
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
	@include('includes.menu')	

    <div class="site-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-5 mb-5 mb-lg-0">
            <h2 class="mb-3 text-uppercase">
            <strong class="text-black font-weight-bold">Promote your coin</strong></h2>
            <p class="lead">Get the visibility you need.</p>
              <ul class="site-block-check">
              <li>By promoting on coinhunt, your coin will be visible on top of all other coins.</li>
              <li>Do never pay anyone for a promotion on our platform, unless you have received a confirmation email from this address.</li>
              <li>To promote your coin
Mail to: contact@coinhunt.cc</li>
            </ul>
            <p><a href="mailto:someone@example.com" class="btn btn-success pill px-4">Mail</a></p>
          </div>
          <div class="col-md-12 col-lg-6 ml-auto">
            <img src="{{ URL::asset('public/images/moon.jpeg') }}" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

	@include('includes.footer')	
   
  </div>
  @include('includes.js')	
  </body>
</html>