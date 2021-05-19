<?php
use Illuminate\Support\Facades\Auth;
?>
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

        <!-- small modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" 
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Your coin is added&times;&nbsp;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
                        We are reviewing and let you know the result as soon as possible. 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="block-schedule overlay site-section" style="background-image: url('public/images/bitcoin-moon.jpeg');">
      <div class="container">

        <h2 class="text-white display-4 mb-5">Promoted coins</h2>

        <ul class="nav nav-pills tab-nav mb-4" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-sunday-tab" data-toggle="pill" href="#pills-sunday" role="tab" aria-controls="pills-sunday" aria-selected="true">Promoted coins</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-sunday" role="tabpanel" aria-labelledby="pills-sunday-tab">
            <table id="promoted_coins" style="width: 100%; border-collapse: separate; border-spacing: 0px 2px;" class="hover"> </table>
          </div>
        </div>
      </div>


      <div class="container">

        <h2 class="text-white display-4 mb-5">Best coins</h2>

        <ul class="nav nav-pills tab-nav mb-4" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-sunday-tab" data-toggle="pill" href="#best-all" role="tab" aria-controls="pills-sunday" aria-selected="true">All time best</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-monday-tab" data-toggle="pill" href="#best-today" role="tab" aria-controls="pills-monday" aria-selected="true">Today's best</a>
          </li>
          @if(Auth::user())
          <li class="nav-item">
            <a class="nav-link" id="pills-monday-tab" data-toggle="pill" href="#your-best" role="tab" aria-controls="pills-yours" aria-selected="true">Yours coinst</a>
          </li>
          @endif
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="best-all" role="tabpanel" aria-labelledby="pills-sunday-tab">
             <table id="best_coins" style="width: 100%; border-collapse: separate; border-spacing: 0px 2px;" class="hover"> </table>
          </div>
          <div class="tab-pane fade" id="best-today" role="tabpanel" aria-labelledby="pills-monday-tab">
              <table id="today_coins" style="width: 100%; border-collapse: separate; border-spacing: 0px 2px;" class="hover"> </table>
          </div>
          <div class="tab-pane fade" id="your-best" role="tabpanel" aria-labelledby="pills-monday-tab">
              <table id="your_coins" style="width: 100%; border-collapse: separate; border-spacing: 0px 2px;" class="hover"> </table>
          </div>
        </div>
      </div>
    </div>
	@include('includes.footer')

  </div>
  @include('includes.js')
  </body>
  <script>
    var columns = [
          { "data": "name",
            "render": function ( data, type, full, meta ) {
                return '<a href="coin/' + full["id"] + '" class="text-dark">' +  data + "(" + full["symbol"] + ")</a>";
            }
          },
          { "data": "logo",
            "render": function ( data, type, full, meta ) {
                return '<a href="coin/' + full["id"] + '">' + "<img src=\""+full["logo"]+"\" style=\"width:60px;\"/></a>";

            }
          },
          {
            data: "market_cap",
            render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
          },
          { data: 'lauched_date', 
            "render": function ( data, type, full, meta ) {
                return '<a href="coin/' + full["id"] + '" class="text-dark">' + full["lauched_date"] + "</a>";

            }
          },
          { 
            data: "vote",
            render: function ( data, type, full, meta ) {
                if (full["voted"] == 0){
                  return '<a href="#" onclick="return vote(' + full["id"] + ');" class="btn btn-success pill px-4 mt-3 mt-md-0">' + data +'</a>';
                } else {
                  return '<a href="#" onclick="return vote(' + full["id"] + ');" class="btn btn-info pill px-4 mt-3 mt-md-0">' + data +'</a>';
                }
            }
          }
    ];

    $(document).ready(function() {
        @if(isset($willShow))
            $("#infoModal").modal('show');
        @endif
        $('#promoted_coins').dataTable( {
          ajax: 'api/promotedCoins',
          columns: columns,
          lengthChange: false,
          "order": [4, 'desc']
        } );

        $('#best_coins').dataTable( {
          ajax: 'api/bestCoins',
          columns: columns,
          lengthChange: false,
          "order": [4, 'desc']
        } );

        $('#today_coins').dataTable( {
          ajax: 'api/todayCoins',
          columns: columns,
          lengthChange: false,
          "order": [4, 'desc']
        } );
        @if(Auth::user())
        $('#your_coins').dataTable( {
          ajax: 'api/yourCoins',
          columns: columns,
          lengthChange: false,
          "order": [4, 'desc']
        } );
        @endif
    } );

    function vote(id) {
      $.ajax("api/updateVote", {
        data: {id : id},
        success: function(data) { 
            $('#promoted_coins').DataTable().clear();
            $('#promoted_coins').DataTable().ajax.reload();
            $('#best_coins').DataTable().clear();
            $('#best_coins').DataTable().ajax.reload();
            $('#today_coins').DataTable().clear();
            $('#today_coins').DataTable().ajax.reload();
            @if(Auth::user())
            $('#your_coins').DataTable().clear();
            $('#your_coins').DataTable().ajax.reload();
            @endif
          },
          error: function() {
          }
      });
      return false;
    }
  </script>
</html>
