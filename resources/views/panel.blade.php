<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gradient Able bootstrap admin template by codedthemes </title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4. The starter version of Gradient Able is completely free for personal project." />
      <meta name="keywords" content="free dashboard template, free admin, free bootstrap template, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes">
      <link rel="stylesheet" href="{{asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
      <!-- Favicon icon -->
      <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
      <!-- Google font-->
      <link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:400,600')}}" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/css/bootstrap.min.css')}}">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="{{asset('icon/themify-icons/themify-icons.css')}}">
	  <link rel="stylesheet" type="text/css" href="{{asset('icon/font-awesome/css/font-awesome.min.css')}}">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="{{asset('icon/icofont/css/icofont.css')}}">
      <!-- Style.css -->
     
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  
      <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.mCustomScrollbar.css')}}">
  </head>

  <body>
  <body>
	
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
               <div class="navbar-wrapper">
                   <div class="navbar-logo">
                       <a class="mobile-menu" id="mobile-collapse" href="#!">
                           <i class="ti-menu"></i>
                       </a>
                       <div class="mobile-search">
                           <div class="header-search">
                               <div class="main-search morphsearch-search">
                                   <div class="input-group">
                                       <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                       <input type="text" class="form-control" placeholder="Enter Keyword">
                                       <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <a href="index.html">
                           <img class="img-fluid" src="{{asset('images/20.svg')}}" alt="Theme-Logo" />
                       </a>
                       <a class="mobile-options">
                           <i class="ti-more"></i>
                       </a>
                   </div>

                   <div class="navbar-container container-fluid">
                       <ul class="nav-left">
                           <li>
                               <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                           </li>
                           <li class="header-search">
                               <div class="main-search morphsearch-search">
                                   <div class="input-group">
                                       <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                       <input type="text" class="form-control">
                                       <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                   </div>
                               </div>
                           </li>
                           <li>
                               <a href="#!" onclick="javascript:toggleFullScreen()">
                                   <i class="ti-fullscreen"></i>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav-right">
                           <li class="header-notification">
                               <a href="#!">
                                   <i class="ti-bell"></i>
                                   <span class="badge bg-c-pink"></span>
                               </a>
                               <ul class="show-notification">
                                   <li>
                                       <h6>Notifications</h6>
                                       <label class="label label-danger">New</label>
                                   </li>
                                   <li>
                                       <div class="media">
                                           <img class="d-flex align-self-center img-radius" src="assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                           <div class="media-body">
                                               <h5 class="notification-user">Cristian Antezana N.</h5>
                                               <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                               <span class="notification-time">30 minutes ago</span>
                                           </div>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="media">
                                           <img class="d-flex align-self-center img-radius" src="assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                           <div class="media-body">
                                               <h5 class="notification-user">Joseph William</h5>
                                               <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                               <span class="notification-time">30 minutes ago</span>
                                           </div>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="media">
                                           <img class="d-flex align-self-center img-radius" src="assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                           <div class="media-body">
                                               <h5 class="notification-user">Sara Soudein</h5>
                                               <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                               <span class="notification-time">30 minutes ago</span>
                                           </div>
                                       </div>
                                   </li>
                               </ul>
                           </li>
                           
                           <li class="user-profile header-notification">
                               <a href="#!">
                                   <img src="{{asset('images/avatar-4.jpg')}}" class="img-radius" alt="User-Profile-Image">
                                   <span>Cristian Antezana N</span>
                                   <i class="ti-angle-down"></i>
                               </a>
                               <ul class="show-notification profile-notification">
                                   <li>
                                       <a href="#!">
                                           <i class="ti-settings"></i> Settings
                                       </a>
                                   </li>
                                   <li>
                                       <a href="user-profile.html">
                                           <i class="ti-user"></i> Profile
                                       </a>
                                   </li>
                                   
                                   <li>
                                       <a href="auth-lock-screen.html">
                                           <i class="ti-lock"></i> Lock Screen
                                       </a>
                                   </li>
                                   <li>
                                       <a href="auth-normal-sign-in.html">
                                       <i class="ti-layout-sidebar-left"></i> Logout
                                   </a>
                                   </li>
                               </ul>
                           </li>
                       </ul>
                   </div>
               </div>
           </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="index.html">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">INICIO</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Gestiones</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="{{route('personas.index')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Personas</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{route('categorias.index')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Categorias</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{route('presentaciones.index')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Presentacion</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{route('medidas.index')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Medidas</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{route('productos.index')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Productos</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                      

                                    </ul>
                                </li>
                            </ul>
                            

                           

                            
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="pcoded-inner-content">
                                        @yield('contenido')
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

  
<script type="text/javascript" src="{{asset('js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('js/modernizr/modernizr.js')}}"></script>
<!-- am chart -->
<script src="{{asset('pages/widget/amchart/amcharts.min.js')}}"></script>
<script src="{{asset('pages/widget/amchart/serial.min.js')}}"></script>
<!-- Chart js -->
<script type="text/javascript" src="{{asset('js/chart.js/Chart.js')}}"></script>
<!-- Todo js -->
<script type="text/javascript " src="{{asset('pages/todo/todo.js')}} "></script>
<!-- Custom js -->
<script type="text/javascript" src="{{asset('pages/dashboard/custom-dashboard.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
<script type="text/javascript " src="{{asset('js/SmoothScroll.js')}}"></script>
<script src="{{asset('js/pcoded.min.js')}}"></script>
<script src="{{asset('js/vartical-demo.js')}}"></script>
<script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


@yield('script')
</body>

</html>
