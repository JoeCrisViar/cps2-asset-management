<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
      <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/core/jquery.min.js')}}" defer></script>
    <script src="{{ asset('js/core/popper.min.js') }}" defer></script>
    <!-- <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}"></script> -->
    <script src="https://unpkg.com/default-passive-events" defer></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins/bootstrap-notify.js') }}" defer></script>
    <script src="{{ asset('js/material-dashboard.js') }}" defer></script>
    @yield('specified_js')
   
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @yield('specified_css')
</head>
<body>
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="black" data-image="{{ asset('img/sidebar-2.jpg') }}">
          <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

            Tip 2: you can also add an image using data-image tag
        -->
          <div class="logo">

            <a href="{{ route('home') }}" class="simple-text logo-normal">
              <i class="fas fa-cart-arrow-down mr-3" style="font-size: 25pt;"></i> PC-Art
            </a>
          </div>
          <div class="sidebar-wrapper">
            <ul class="nav">
              <li class="nav-item {{ request()->is('home') ? 'active' : ''  }}">
                  <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">home</i>
                    <p>Home</p>
                  </a>
              </li>
              
              @guest

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('catalog.index', 0) }}">
                    <i class="material-icons">category</i>
                    <p>Catalog</p>
                  </a>
                </li>
              @else
                @if(Auth::user()->role_id == 3)
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('catalog.index', 0) }}">
                    <i class="material-icons">category</i>
                    <p>Catalog</p>
                  </a>
                </li>
                @endif
              @endguest
            </ul>
          </div>
        </div>
        <div class="main-panel">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
            <div class="container-fluid">
              <div class="navbar-wrapper">
                <!-- <a class="navbar-brand" href="#">Dashboard</a > -->
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end">
               <!--  <form class="navbar-form">
                  <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-default btn-round btn-just-icon">
                      <i class="material-icons">search</i>
                      <div class="ripple-container"></div>
                    </button>
                  </div>
                </form> -->
                <ul class="navbar-nav">

                @guest
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('cart.index') }}">
                        <i class="material-icons">shopping_cart</i>
                        <span class="notification">{{ collect(Session::get('cart'))->sum() }}</span>
                        <p class="d-lg-none d-md-block">
                          Stats
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                  @if(Auth::user()->role_id == 3)
                      <!-- Buyers Nav here -->
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                          <i class="material-icons">shopping_cart</i>
                          <span class="notification">{{ collect(Session::get('cart'))->sum() }}</span>
                          <p class="d-lg-none d-md-block">
                            Stats
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('mytransaction') }}">My Orders</a>  
                      </li>
                  @endif
                  @if(Auth::user()->role_id == 2)
                  <!-- Seller's Nav here -->
                  <li class="nav-item">
                      <a class="nav-link" href="#">
                        <i class="material-icons">notifications</i>
                        <span class="notification">{{ collect(Session::get('seller_notif'))->sum() }}</span>
                        <p class="d-lg-none d-md-block">
                          Stats
                        </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('seller_transaction') }}">Transactions</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('item.index') }}">My Items</a>
                  </li>
                  @endif
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->username }}
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                      
                        <a href="{{ route('myaccount')}}" class="dropdown-item">My Account</a>
                   
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      
                    </div>
                  </li>
                @endguest
                
                </ul>
              </div>
            </div>
          </nav>
          <!-- End Navbar -->



          <div class="content">
            <div class="container-fluid">
                <div id="app">


                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
                
                  <footer class="footer">
                    <div class="container-fluid">
                      <nav class="float-left">
                       <!--  <ul>
                          <li>
                            <a href="https://www.creative-tim.com/license">
                              Licenses
                            </a>
                          </li>
                        </ul> -->
                      </nav>
                      <div class="copyright text-center" id="date">
                        , made with <i class="material-icons">favorite</i> by
                        <a href="#" target="_blank">JSJ</a> Just Serve Joyful.
                      </div>
                    </div>
                  </footer>
                  

              </div>
            </div>

        </div>
    </div>
   
    <script>
          const x = new Date().getFullYear();
          let date = document.getElementById('date');
          date.innerHTML = '&copy; ' + x + date.innerHTML;
    </script>
    <script>
    $(document).ready(function() {
          $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
            if ($(this).hasClass('switch-trigger')) {
                if (event.stopPropagation) {
                  event.stopPropagation();
                } else if (window.event) {
                      window.event.cancelBubble = true;
                }
            }
            });

            $('.fixed-plugin .active-color span').click(function() {
              $full_page_background = $('.full-page-background');

              $(this).siblings().removeClass('active');
              $(this).addClass('active');

              var new_color = $(this).data('color');

              if ($sidebar.length != 0) {
                $sidebar.attr('data-color', new_color);
            }

            if ($full_page.length != 0) {
                $full_page.attr('filter-color', new_color);
            }

            if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.attr('data-color', new_color);
            }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
              $(this).siblings().removeClass('active');
              $(this).addClass('active');

              var new_color = $(this).data('background-color');

              if ($sidebar.length != 0) {
                $sidebar.attr('data-background-color', new_color);
            }
            });

            $('.fixed-plugin .img-holder').click(function() {
              $full_page_background = $('.full-page-background');

              $(this).parent('li').siblings().removeClass('active');
              $(this).parent('li').addClass('active');


              var new_image = $(this).find("img").attr('src');

              if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                $sidebar_img_container.fadeOut('fast', function() {
                  $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                  $sidebar_img_container.fadeIn('fast');
                });
            }

            if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                $full_page_background.fadeOut('fast', function() {
                  $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                  $full_page_background.fadeIn('fast');
              });
            }

            if ($('.switch-sidebar-image input:checked').length == 0) {
                var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            }

            if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
            }
        });

            $('.switch-sidebar-image input').change(function() {
              $full_page_background = $('.full-page-background');

              $input = $(this);

              if ($input.is(':checked')) {
                if ($sidebar_img_container.length != 0) {
                  $sidebar_img_container.fadeIn('fast');
                  $sidebar.attr('data-image', '#');
              }

              if ($full_page_background.length != 0) {
                  $full_page_background.fadeIn('fast');
                  $full_page.attr('data-image', '#');
              }

              background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
          }

          if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
          }

          background_image = false;
      }
  });

            $('.switch-sidebar-mini input').change(function() {
              $body = $('body');

              $input = $(this);

              if (md.misc.sidebar_mini_active == true) {
                $('body').removeClass('sidebar-mini');
                md.misc.sidebar_mini_active = false;

                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

            } else {

                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                setTimeout(function() {
                  $('body').addClass('sidebar-mini');

                  md.misc.sidebar_mini_active = true;
              }, 300);
            }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
        }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
        }, 1000);

      });
        });
});
</script>

</body>
</html>
