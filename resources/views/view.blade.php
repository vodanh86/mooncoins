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

    <div class="block-schedule overlay site-section" style="background-image: url('{{ URL::asset('/images/bitcoin-moon.jpeg') }}');">
      <div class="container">
        <h2 class="text-white display-4 mb-5">{{$coin["name"]}}</h2>
            <div class="row-wrap">
              <div class="row bg-white p-4 align-items-center">
                <div class="col-sm-8 col-md-8 col-lg-8">
                   <div class="row">
                      <div class="col-sm-3 col-md-3 col-lg-3"><img src='{{$coin["logo"]}}' style="width:90px;"/></div>
                      <div class="col-sm-9 col-md-9 col-lg-9">
                     <h4>{{$coin["name"]."(".$coin["symbol"].")"}}</h4>
                     @foreach(array("facebook", "twitter", "telegram", "youtube", "website", "instagram") as $network)
                        @if($coin[$network])
                          <a target="_blank" href="{{$coin[$network]}}" class="btn btn-primary">{{$network}}</a>
                        @endif
                    @endforeach
                    </div>
                    </div>
                   <div class="row-wrap"><h5>Contract<h5></div>
                   <div class="row-wrap">
                      <div class="Coin_AddressContainer">
                        <input type="text" style="z-index:-100; position: absolute; width:10px" id="inp_contract"/>
                        <span  id="span_contract" style="display:none">{{ $coin['contract'] }}</span>
                        <span class="Coin_AddressTitle" style="cursor: pointer;">Binance Smart Chain: </span>
                        <span id="address0" class="Coin_Address__YsLPG" style="cursor: pointer;">{{ $coin['contract'] }}</span>
                        <div class="Coin_CopyIcon">
                          <img id="img_contract" src="{{ URL::asset('/images/copyIcon.png') }}" onClick="copyToClipboard('span_contract')" style="max-width: 100%; max-height: 100%;">
                          </div>
                        </div>
                    </div>
                   <div class="row-wrap"><h5>{{$coin["description"]}}</h5></div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                   <div class="row-wrap"><h5>{{$coin["name"]."(".$coin["symbol"].") Price"}}</h5></div>
                   <div class="row-wrap"><h4>${{number_format($coin["price"])}}</h4></div>
                   <div class="row-wrap"><h5>Market cap</h5></div>
                   <div class="row-wrap"><h4>${{number_format($coin["market_cap"])}}</h4></div>
                   <div class="row-wrap"><h5>Lauch date</h5></div>
                   <div class="row-wrap"><h4>{{$coin["lauched_date"]}}</h4></div>

                </div>     
            </div>
        </div>
      </div>      
    </div>

    <div class="block-schedule overlay site-section" style="background-image: url('{{ URL::asset('/images/bitcoin-moon.jpeg') }}');">
      <div class="container">
            <div class="row-wrap" >
              <div class="row bg-white p-4 align-items-center" >
                <div class="w-100" id="comDiv">
                </div>  
              @if ($user)
              <div class="sc-bdvvaa eRQARU">
                  <form>
                    <div class="align-items-center form-row">
                        <div class="col-auto" style="margin-top: 16px;">
                          <div style="background: rgb(27, 61, 80); width: 40px; height: 40px; border-radius: 50%; display: flex; justify-content: center; align-items: center; transition: all 0.5s ease 0s;"><img src="{{$user->avatar}}" style="width: 40px; height: 40px; border-radius: 50%;"></div>
                        </div>
                        <div class="my-1 col-sm-8">
                          <p style="float: left; font-size: 12px; margin-bottom: 0px">{{$user->name}}</p>
                          <input placeholder="What do you think about this coin" name="comment" maxlength="100" required="" id="comment" class="form-control" value="">
                        </div>
                        <div class="my-1 col-auto"><button class="btn btn-primary" onclick="return submitComment();"style="margin-top: 16px;">Submit</button></div>
                    </div>
                  </form>
              </div>
              @endif
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
            data: {id : {{$coin["id"]}}, comment: $("#comment").val()},
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
          data: {id : {{$coin["id"]}}},
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
