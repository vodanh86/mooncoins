<?php
use Illuminate\Support\Facades\Auth;
?>
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

    <div class="block-schedule overlay site-section" style="background-image: url('images/bitcoin-moon.jpeg');">
      <div class="container">
         <div class="tab-pane fade show active" id="pills-sunday" role="tabpanel" aria-labelledby="pills-sunday-tab">
            <div class="row-wrap">
              <div class="row bg-white p-4 align-items-center">
                <div class="col-sm-3 col-md-3 col-lg-3"></div>
                <div class="col-sm-3 col-md-3 col-lg-3"><a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary pill px-4 mt-3 mt-md-0">Facebook Login</a></div>
                <div class="col-sm-3 col-md-3 col-lg-3"></div>
                <div class="col-sm-3 col-md-3 col-lg-3 text-md-right"></div>     
              </div>
            </div>
            
            <div class="row-wrap">
              <div class="row bg-white p-4 align-items-center">
                <div class="col-sm-3 col-md-3 col-lg-3"></div>
                <div class="col-sm-3 col-md-3 col-lg-3"><a href="{{ url('/auth/redirect/google') }}" class="btn btn-primary pill px-4 mt-3 mt-md-0">Gmail Login</a></div>
                <div class="col-sm-3 col-md-3 col-lg-3"></div>
                <div class="col-sm-3 col-md-3 col-lg-3 text-md-right"></div>     
              </div>
            </div>
          </div>
      </div>
    </div>
	@include('includes.footer')

  </div>
  @include('includes.js')
  </body>
</html>