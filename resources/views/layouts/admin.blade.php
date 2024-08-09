<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>foresight</title>
  <link rel="apple-touch-icon" href="{{asset("app-assets/images/ico/apple-icon-120.png")}}")}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset("app-assets/images/ico/favicon.ico")}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/vendors.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/weather-icons/climacons.min.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app-assets/fonts/meteocons/style.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/charts/morris.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/charts/chartist.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/charts/chartist-plugin-tooltip.css")}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/app.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/custom-rtl.css")}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/core/menu/menu-types/vertical-content-menu.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/core/colors/palette-gradient.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app-assets/fonts/simple-line-icons/style.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/core/colors/palette-gradient.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/pages/timeline.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/pages/dashboard-ecommerce.css")}}">

<style>
@import url('https://fonts.googleapis.com/css2?family=Changa:wght@200..800&display=swap');

  html, body {

    font-family: "Changa", sans-serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
}
    span.menu-title {
        font-family: "Changa", sans-serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
}
a.menu-item {
    font-family: "Changa", sans-serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
}
h3.menu-title {
    font-family: "Changa", sans-serif;
    font-optical-sizing: auto;
    font-weight: 500;
    font-style: normal;
    text-align: center;
    padding: 8px;
}

@media (max-width: 1000px) {
    .drawing {
        display: none;
    }
}


</style>
  <link rel="stylesheet" type="text/css"href="{{asset("assets/css/style-rtl.css")}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
  @livewireStyles
</head>
<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-hide-on-scroll navbar-border navbar-shadow navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="{{route('main_home')}}">
              <img class="brand-logo" alt="Foresight Egypt" src="{{asset("photos/logo.jpg")}}">
              <h3 class="brand-text">Foresight Egypt    </h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>


          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                @auth
                <span class="mr-1">مرحبا,
                  <span class="user-name text-bold-700">{{ Auth::user()->name }}</span>
                </span>
                @endauth
                @guest
                <span class="mr-1">مرحبا, <span class="user-name text-bold-700">Guest</span></span>
                @endguest

                <span class="avatar avatar-online">
                  <img src="{{asset("app-assets/images/portrait/small/avatar-s-19.png")}}" alt="avatar"><i></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                {{-- <a class="dropdown-item" href="#">
                <i class="ft-user"></i> Edit Profile</a>
                <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a> --}}
                <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="{{ route("logout") }}"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ft-power"></i> خروج</a>

                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="main-menu menu-static menu-light menu-accordion menu-shadow" data-scroll-to-active="true">


        <div class="main-menu-content">

            <h3 class="menu-title" data-i18n="nav.dash.main">      لوحه التحكم<h3/>
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ Route::currentRouteName() == 'main_home' ? 'active' : '' }}">

                <a class="menu-item" href="{{ route('main_home') }}" data-i18n="nav.dash.ecommerce">  <i class="las la-border-all"></i> لوحه التحكم</a>
            </li>

              </ul>
            </li>


          </ul>



            <h3 class="menu-title" data-i18n="nav.dash.main">الموظفين <h1/>
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item"><a href="#"><i class="la la-home"></i>
                <span class="menu-title" data-i18n="nav.dash.main">الموظفين</span>
              </a>



                    @if(Auth::user()->can_read==1)

                    <li class="{{ Route::currentRouteName() == 'show_sales' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('show_sales') }}" data-i18n="nav.dash.ecommerce"> الموظفين</a>
                    </li>
                    @endif

                    @if(Auth::user()->can_create==1)
                    <li class="{{ Route::currentRouteName() == 'add_sales' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('add_sales') }}" data-i18n="nav.dash.crypto"> اضف موظف  </a>
                    </li>
                    @endif
                </ul>

            </li>



              </ul>
            </li>


          </ul>


            <h3 class="menu-title" data-i18n="nav.dash.main">المبيعات <h1/>
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item"><a href="#"><i class="la la-home"></i>
                <span class="menu-title" data-i18n="nav.dash.main">الشركات</span>
              </a>


                <ul class="menu-content">
                    @if(Auth::user()->can_read==1)

                    <li class="{{ Route::currentRouteName() == 'show_company' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('show_company') }}" data-i18n="nav.dash.ecommerce">شركات</a>
                    </li>
                    @endif

                    @if(Auth::user()->can_create==1)

                    <li class="{{ Route::currentRouteName() == 'add_company' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('add_company') }}" data-i18n="nav.dash.crypto">اضف شركة</a>
                    </li>
                    @endif
                    {{-- <li class="{{ Route::currentRouteName() == 'dashboard_sales' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('dashboard_sales') }}" data-i18n="nav.dash.sales">Sales</a>
                    </li> --}}
                </ul>

            </li>

            <li class=" nav-item"><a href="#">
                <i class="las la-chart-line"></i>
                <span class="menu-title" data-i18n="nav.dash.main">الانشطه</span>
                </a>

                <ul class="menu-content">
                    @if(Auth::user()->can_read==1)

                    <li class="{{ Route::currentRouteName() == 'show_activity' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('show_activity') }}" data-i18n="nav.dash.ecommerce">الانشطه</a>
                    </li>
                        @endif
                    @if(Auth::user()->can_create==1)

                    <li class="{{ Route::currentRouteName() == 'add_activity' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('add_activity') }}" data-i18n="nav.dash.crypto">اضف نشاط شركة</a>
                    </li>
                    @endif
                    {{-- <li class="{{ Route::currentRouteName() == 'dashboard_sales' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('dashboard_sales') }}" data-i18n="nav.dash.sales">Sales</a>
                    </li> --}}
                </ul>

            </li>
            <li class=" nav-item"><a href="#">
                <i class="las la-users"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">الاشخاص</span>
                </a>
                <ul class="menu-content">
                    @if(Auth::user()->can_read==1)

                    <li class="{{ Route::currentRouteName() == 'show_contacts' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('show_contacts') }}" data-i18n="nav.dash.ecommerce">اشخاص تابعين لشركات</a>
                    </li>
                    @endif
                    @if(Auth::user()->can_create==1)

                    <li class="{{ Route::currentRouteName() == 'add_contact' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('add_contact') }}" data-i18n="nav.dash.crypto">اضف شخص </a>
                    </li>
                    @endif
                </ul>

            </li>

            <li class=" nav-item"><a href="#">
                <i class="las la-users"></i>
                                <span class="menu-title" data-i18n="nav.dash.main"> المتابعه </span>
                </a>
                <ul class="menu-content">
                    @if(Auth::user()->can_read==1)

                    <li class="{{ Route::currentRouteName() == 'show_following' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('show_following') }}" data-i18n="nav.dash.crypto">المتباعات</a>
                    </li>
                    @endif
                    @if(Auth::user()->can_create==1)

                  <li class="{{ Route::currentRouteName() == 'add_following' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('add_following') }}" data-i18n="nav.dash.crypto">اضف متابعه </a>
                    </li>
                    @endif


                </ul>
            </li>

            <li class=" nav-item"><a href="#">
                <i class="lab la-squarespace"></i>
                <span class="menu-title" data-i18n="nav.dash.main">الرد </span>
                </a>
                <ul class="menu-content">
                    @if(Auth::user()->can_read==1)

                 <li class="{{ Route::currentRouteName() == 'show_responses' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('show_responses') }}" data-i18n="nav.dash.ecommerce">الردود </a>
                    </li>
                    @endif
                    @if(Auth::user()->can_create==1)

                    <li class="{{ Route::currentRouteName() == 'add_client_response' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('add_client_response') }}" data-i18n="nav.dash.crypto">اضف رد </a>
                    </li>
                    @endif
                </ul>
            </li>


              </ul>
            </li>


          </ul>



            <h3 class="menu-title" data-i18n="nav.dash.main">استلام & تسليم <h3/>
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="#">
                <i class="las la-tools"></i>
                <span class="menu-title" data-i18n="nav.dash.main">اذن استلام</span>
                </a>
                <ul class="menu-content">
                    @if(Auth::user()->can_read==1)

                 <li class="{{ Route::currentRouteName() == 'show-receive-equipment' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('show-receive-equipment') }}" data-i18n="nav.dash.ecommerce">الاوردرات </a>
                    </li>
                    @endif
                    @if(Auth::user()->can_create==1)

                    <li class="{{ Route::currentRouteName() == 'add-receive-equipment' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('add-receive-equipment') }}" data-i18n="nav.dash.crypto">اضف اوردر</a>
                    </li>
                    @endif
                </ul>
            </li>
            <li class=" nav-item"><a href="#">
                <i class="las la-tools"></i>
                <span class="menu-title" data-i18n="nav.dash.main">البيان </span>
                </a>
                <ul class="menu-content">
                    @if(Auth::user()->can_read==1)

                    <li class="{{ Route::currentRouteName() == 'show-Indicator' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('show-Indicator') }}" data-i18n="nav.dash.ecommerce">البيان</a>
                    </li>
                    @endif
                    @if(Auth::user()->can_create==1)

                    <li class="{{ Route::currentRouteName() == 'add-Indicator' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('add-Indicator') }}" data-i18n="nav.dash.ecommerce">اضف بيان </a>
                    </li>

                    @endif
                </ul>
            </li>
            <li class=" nav-item"><a href="#">
                <i class="las la-tools"></i>
                <span class="menu-title" data-i18n="nav.dash.main">النوع </span>
                </a>
                <ul class="menu-content">
                    @if(Auth::user()->can_read==1)

                    <li class="{{ Route::currentRouteName() == 'show-Type-equipment' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('show-Type-equipment') }}" data-i18n="nav.dash.ecommerce">الانواع</a>
                    </li>
                    @endif
                    @if(Auth::user()->can_create==1)

                    <li class="{{ Route::currentRouteName() == 'add-Type-equipment' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('add-Type-equipment') }}" data-i18n="nav.dash.ecommerce">اضف نوع </a>
                    </li>
                    @endif
                </ul>
            </li>
            <li class=" nav-item"><a href="#">
                <i class="las la-tools"></i>
                <span class="menu-title" data-i18n="nav.dash.main">الماركة </span>
                </a>
                <ul class="menu-content">

                    @if(Auth::user()->can_read==1)

                    <li class="{{ Route::currentRouteName() == 'show-brands' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('show-brands') }}" data-i18n="nav.dash.ecommerce">الماركات</a>
                    </li>
                    @endif

                    @if(Auth::user()->can_create==1)

                    <li class="{{ Route::currentRouteName() == 'add-brands' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('add-brands') }}" data-i18n="nav.dash.ecommerce">اضف ماركة </a>
                    </li>
                    @endif

                </ul>
            </li>


            <li class=" nav-item"><a href="#">
                <i class="las la-tools"></i>
                <span class="menu-title" data-i18n="nav.dash.main">المعدات </span>
                </a>
                <ul class="menu-content">
                    @if(Auth::user()->can_read==1)

                 <li class="{{ Route::currentRouteName() == 'show-equipment' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('show-equipment') }}" data-i18n="nav.dash.ecommerce">المعدات </a>
                    </li>
                    @endif

                    @if(Auth::user()->can_create==1)

                    <li class="{{ Route::currentRouteName() == 'add-equipment' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('add-equipment') }}" data-i18n="nav.dash.ecommerce">اضف معده </a>
                    </li>
                    @endif
                </ul>
            </li>




              </ul>
            </li>


          </ul>




            <h3 class="menu-title" data-i18n="nav.dash.main">      الشكاوي  <h3/>


          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @if(Auth::user()->can_read==1)
            <li class="{{ Route::currentRouteName() == 'show_complains' ? 'active' : '' }}">
                <a class="menu-item" href="{{ route('show_complains') }}" data-i18n="nav.dash.ecommerce"> <i class="las la-users-cog"></i>الشكاوي </a>
            </li>
            @endif

            @if(Auth::user()->can_create==1)

            <li class="{{ Route::currentRouteName() == 'add_complains' ? 'active' : '' }}">
                <a class="menu-item" href="{{ route('add_complains') }}" data-i18n="nav.dash.ecommerce"> <i class="las la-users-cog"></i>اضف شكوي </a>
            </li>
            @endif

              </ul>
            </li>


          </ul>
        </div>

        {{-- <div class="main-menu-content">

            <h3 class="menu-title" data-i18n="nav.dash.main">      التقارير  <h3/>


          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @if(Auth::user()->can_read==1)
            <li class="{{ Route::currentRouteName() == 'reports' ? 'active' : '' }}">
                <a class="menu-item" href="{{ route('reports') }}" data-i18n="nav.dash.ecommerce"> <i class="las la-users-cog"></i>التقارير </a>
            </li>
            @endif


              </ul>
            </li>


          </ul>
        </div> --}}



      </div>
      <div class="content-body">
            {{$slot}}
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2025 <a class="text-bold-800 grey darken-2"
        target="_blank">Eng/George Samy Pernamgk - 01554923541 </a>, All rights reserved. </span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="{{asset("app-assets/vendors/js/vendors.min.js")}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset("app-assets/vendors/js/ui/headroom.min.js")}}" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script src="{{asset("app-assets/vendors/js/charts/raphael-min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app-assets/vendors/js/charts/morris.min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app-assets/vendors/js/timeline/horizontal-timeline.js")}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{asset("app-assets/js/core/app-menu.js")}}" type="text/javascript"></script>
  <script src="{{asset("app-assets/js/core/app.js")}}" type="text/javascript"></script>
  <script src="{{asset("app-assets/js/scripts/customizer.js")}}" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{asset("app-assets/js/scripts/pages/dashboard-ecommerce.js")}}" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to check body class and toggle the visibility of all h3 elements with class menu-title
        function checkBodyClass() {
            var body = document.body;
            var menuTitles = document.querySelectorAll('h3.menu-title');

            menuTitles.forEach(function(title) {
                if (body.classList.contains('menu-collapsed')) {
                    title.style.display = 'none';
                } else {
                    title.style.display = 'block';
                }
            });
        }

        // Initial check
        checkBodyClass();

        // Monitor class changes on the body element
        var observer = new MutationObserver(checkBodyClass);
        observer.observe(document.body, { attributes: true, attributeFilter: ['class'] });
    });
</script>



  @livewireScripts
  @stack('js')

</body>
</html>
