<div class="site-navbar-wrap bg-white">
      <div class="site-navbar-top">
        <div class="container py-2">
          <div class="row align-items-center">
            <div class="col-6">
            </div>
            <div class="col-6">
              <div class="d-flex ml-auto">
                <a href="#" class="d-flex align-items-center ml-auto mr-4">
                  <span class="icon-envelope mr-2"></span>
                  <span class="d-none d-md-inline-block">info@mooncoins.com</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-navbar-wrap bg-white">
      
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="index.php">Moon<strong>Coins</strong>  </a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                      <li class="{{ (request()->is('/')) ? 'active' : '' }}">
                        <a href="{{url('/')}}">Homepage</a>
                      </li>
                      <li><a href="{{url('addCoin')}}">Add coin</a></li>
                      <li class="{{ (request()->is('promote')) ? 'active' : '' }}"><a href="{{url('promote')}}">Promote</a></li>
                      <li class="{{ (request()->is('newsletter')) ? 'active' : '' }}"><a href="{{url('newsletter')}}">Newsletter</a></li>
                      @guest   
                        <li><a href="{{url('login')}}">Login</a></li>
                      @else
                      <li class="has-children">
                        <a href="classes.php">{{ Auth::user()->name }}</a>
                        <ul class="dropdown arrow-top">
                            <li>
                              <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                        </ul>
                      </li>
                      @endguest
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>