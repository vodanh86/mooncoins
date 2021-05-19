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
            <strong class="text-black font-weight-bold">Subscribe to our newsletter</strong></h2>
            <p class="lead">Get the best high potential coins right into your inbox..</p>
              <div style="width: 80%; float: left; margin-top: 5%;">
                <div style="font-size: 12px; text-align: left; padding-bottom: 8px;display:none" id="inp_thank">
                  <div style="color: green;">Thank you for subscribing!</div>
                </div>
                <div class="form-group">
                  <input placeholder="Your email" type="email" id="formBasicEmail" class="form-control" style="width: 100%;">
                </div>
                <button type="button" class="btn btn-primary" onclick="subcribe()" style="width: 100%;">Submit</button></div>
          </div>
          <div class="col-md-12 col-lg-6 ml-auto">
            <img src="{{ URL::asset('public/images/moon1.jpeg') }}" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

	@include('includes.footer')	
   
  </div>
  @include('includes.js')	
  </body>
  <script>
    function subcribe(){
      if($("#formBasicEmail").val()){
        $('#inp_thank').css('display','block');
      }
    }
  </script>
</html>