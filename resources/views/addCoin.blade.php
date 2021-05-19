<!DOCTYPE html>
<html lang="en">
  @include('includes.header')
  <body>
  @include('includes.tag')
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

    <div class="block-schedule overlay site-section" style="background-image: url('public/images/bitcoin-moon.jpeg');">
      <div class="container">

        <ul class="nav nav-pills tab-nav mb-4" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-sunday-tab" data-toggle="pill" href="#pills-sunday" role="tab" aria-controls="pills-sunday" aria-selected="true">Add coin</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-sunday" role="tabpanel" aria-labelledby="pills-sunday-tab">
             <div class="row bg-white p-4 align-items-center" >
                <div class="w-100" id="comDiv">
                {!! form($form) !!}
                </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
	@include('includes.footer')

  </div>
  @include('includes.js')
    <script>
      function submitComment(){
        if ($("#comment").val()){
          $.ajax("../api/addComment", {
            data: {id : 1, comment: $("#comment").val()},
            success: function(data) { 
                $('#comDiv').html(data);
                $("#comment").val("");
              },
              error: function() {
              }
          });
        }
        return false;
      }
      function copyToClipboard(id) {
          document.getElementById("inp_contract").value = document.getElementById(id).innerHTML;
          document.getElementById("inp_contract").select();
          document.getElementById("img_contract").src = document.getElementById("img_contract").src.replace("copyIcon", "tick");
          document.execCommand('copy');
      }
      $(document).ready(function() {
          $.ajax("../api/getComments", {
          data: {id : 1},
          success: function(data) { 
              $('#comDiv').html(data);
            },
            error: function() {
            }
        });
      } );
  </script>
  </body>
</html>
