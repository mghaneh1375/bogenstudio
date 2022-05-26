<!doctype html>
<html class="no-js" lang="en">

<head>

    @section('header')
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>پنل ادمین</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicon
            ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('img/logo.png')}}">
        <!-- Google Fonts
            ============================================ -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">

        <!-- Bootstrap CSS
            ============================================ -->
        <link rel="stylesheet" href="{{URL::asset('panel/css/bootstrap.min.css?v=2.1')}}">

        <link rel="stylesheet" href="{{URL::asset('assets/css/font.css?v=2.1')}}">

        <!-- Bootstrap CSS
            ============================================ -->
        <link rel="stylesheet" href="{{URL::asset('panel/css/font-awesome.min.css?v=2.1')}}">

        <!-- adminpro icon CSS
            ============================================ -->
        <link rel="stylesheet" href="{{URL::asset('panel/css/adminpro-custon-icon.css?v=2.1')}}">

        <!-- meanmenu icon CSS
            ============================================ -->
        <link rel="stylesheet" href="{{URL::asset('panel/css/meanmenu.min.css?v=2.1')}}">

        <!-- mCustomScrollbar CSS
            ============================================ -->
        <link rel="stylesheet" href="{{URL::asset('panel/css/jquery.mCustomScrollbar.min.css?v=2.1')}}">

        <!-- animate CSS
            ============================================ -->
        <link rel="stylesheet" href="{{URL::asset('panel/css/animate.css?v=2.1')}}">

        <!-- jvectormap CSS
            ============================================ -->
        {{--        <link rel="stylesheet" href="{{URL::asset('panel/css/jvectormap/jquery-jvectormap-2.0.3.css?v=2.1')}}">--}}

    <!-- normalize CSS
            ============================================ -->
        <link rel="stylesheet" href="{{URL::asset('panel/css/data-table/bootstrap-table.css?v=2.1')}}">
        <link rel="stylesheet" href="{{URL::asset('panel/css/data-table/bootstrap-editable.css?v=2.1')}}">

        <!-- normalize CSS
            ============================================ -->
        <link rel="stylesheet" href="{{URL::asset('panel/css/normalize.css?v=2.1')}}">
        <!-- charts CSS
            ============================================ -->
        <link rel="stylesheet" href="{{URL::asset('panel/css/c3.min.css?v=2.1')}}">
        <!-- style CSS
            ============================================ -->
        <link rel="stylesheet" href="{{URL::asset('panel/css/style.css?v=2.1')}}">
        <!-- responsive CSS
            ============================================ -->
        <link rel="stylesheet" href="{{URL::asset('panel/css/responsive.css?v=2.1')}}">
        <link rel="stylesheet" href="{{URL::asset('panel/css/commonCSS.css?v=2.1')}}">

        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- modernizr JS
            ============================================ -->
        <script src="{{URL::asset('panel/js/vendor/modernizr-2.8.3.min.js?v=2.1')}}"></script>

        <script src="{{URL::asset('panel/js/jquery.min.js?v=2.1')}}"></script>

        <style>

            .alarm1 {
                margin: 6px;
                padding: 5px;
                font-size: 0.6em;
                border-radius: 100%;
                border: 1px solid red;
                background-color: red;
                color: white;
            }

            .messages-scrollbar {
                height: auto !important;
            }

            .alarm2 {
                margin: 6px;
                padding: 5px;
                font-size: 0.6em;
                border-radius: 100%;
                border: 1px solid #ff7c3e;
                background-color: #ff7c3e;
                color: white;
            }

            .dropdown-item {
                text-align: right;
            }

            .main-sparkline8-hd {
                direction: rtl;
            }

            .hidden {
                display: none !important;
            }

            .nav-item {
                margin: 10px;
            }

            .calendar > table {
                width: 100%;
            }

            .nav-link {
                height: 28px;
            }

            .fixed-table-body {
                direction: ltr !important;
            }


            .col-md-7, .col-md-5, .col-md-6, .col-md-4, .col-lg-2, .col-lg-10, .col-xs-4, .col-xs-8, .col-xs-6, .col-md-3, .col-lg-4, .col-xs-3 {
                float: right !important;
            }

            div, center {
                direction: rtl;
            }
        </style>

        <script>
            function validateNumber(evt) {
                var theEvent = evt || window.event;

                // Handle paste
                if (theEvent.type === 'paste') {
                    key = event.clipboardData.getData('text/plain');
                } else {
                    // Handle key press
                    var key = theEvent.keyCode || theEvent.which;
                    key = String.fromCharCode(key);
                }
                var regex = /[0-9]|\./;
                if( !regex.test(key) ) {
                    theEvent.returnValue = false;
                    if(theEvent.preventDefault) theEvent.preventDefault();
                }
            }
        </script>

    @show

</head>

<body class="materialdesign">

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Header top area start-->
<div class="wrapper-pro">
    <div class="left-sidebar-pro">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>پنل ادمین</h3>
            </div>
            <div class="left-custom-menu-adp-wrap">
                <ul class="nav navbar-nav left-sidebar-menu-pro">

                    <li class="nav-item"><a data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i></i> <span class="mini-dn">تنظیمات سیستمی</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                        <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                            <a href="{{route('admin.models')}}" class="dropdown-item">مدیریت obj فایل اسلایدبار</a>
                            <a href="{{route('admin.news')}}" class="dropdown-item">مدیریت اخبار</a>
                            <a href="{{route('admin.products')}}" class="dropdown-item">مدیریت محصولات</a>
                            <a href="{{route('admin.videos')}}" class="dropdown-item">مدیریت ویدیوها</a>
                            <a href="{{route('admin.solutions')}}" class="dropdown-item">مدیریت راه حل ها</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.contacts')}}" aria-expanded="false"><i></i> <span class="mini-dn">تماس ها</span> <span id="unseen"></span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                    </li>

                    <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i></i> <span class="mini-dn">پروفایل من</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                        <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                            <a href="{{route('changePass')}}" class="dropdown-item">تغییر رمزعبور</a>
                            <a href="{{route('logout')}}" class="dropdown-item">خروج</a>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
    </div>

    <div class="content-inner-all-fa">
        @yield('content')
    </div>


@section('reminder')
    <!-- jquery
        ============================================ -->
        <script src="{{URL::asset('panel/js/vendor/jquery-1.11.3.min.js?v=2.1')}}"></script>
        <!-- bootstrap JS
            ============================================ -->
        <script src="{{URL::asset('panel/js/bootstrap.min.js?v=2.1')}}"></script>
        <!-- meanmenu JS
            ============================================ -->
        <script src="{{URL::asset('panel/js/jquery.meanmenu.js?v=2.1')}}"></script>
        <!-- mCustomScrollbar JS
            ============================================ -->
        <script src="{{URL::asset('panel/js/jquery.mCustomScrollbar.concat.min.js?v=2.1')}}"></script>
        <!-- sticky JS
            ============================================ -->
        <script src="{{URL::asset('panel/js/jquery.sticky.js?v=2.1')}}"></script>
        <!-- scrollUp JS
            ============================================ -->
        <script src="{{URL::asset('panel/js/jquery.scrollUp.min.js?v=2.1')}}"></script>
        <!-- scrollUp JS
            ============================================ -->
        <script src="{{URL::asset('panel/js/wow/wow.min.js?v=2.1')}}"></script>
        <!-- counterup JS
            ============================================ -->
        <script src="{{URL::asset('panel/js/counterup/jquery.counterup.min.js?v=2.1')}}"></script>
        <script src="{{URL::asset('panel/js/counterup/waypoints.min.js?v=2.1')}}"></script>
        <script src="{{URL::asset('panel/js/counterup/counterup-active.js?v=2.1')}}"></script>
        <!-- jvectormap JS
            ============================================ -->

    <!-- peity JS
                ============================================ -->
        <script src="{{URL::asset('panel/js/peity/jquery.peity.min.js?v=2.1')}}"></script>
        <script src="{{URL::asset('panel/js/peity/peity-active.js?v=2.1')}}"></script>
        <!-- sparkline JS
            ============================================ -->
        <script src="{{URL::asset('panel/js/sparkline/jquery.sparkline.min.js?v=2.1')}}"></script>
        <script src="{{URL::asset('panel/js/sparkline/sparkline-active.js?v=2.1')}}"></script>
        <!-- flot JS
            ============================================ -->
        <script src="{{URL::asset('panel/js/flot/Chart.min.js?v=2.1')}}"></script>
        <script src="{{URL::asset('panel/js/flot/dashtwo-flot-active.js?v=2.1')}}"></script>
        <!-- data table JS
            ============================================ -->
        <script src="{{URL::asset('panel/js/data-table/bootstrap-table.js?v=2.1')}}"></script>
        <script src="{{URL::asset('panel/js/data-table/tableExport.js?v=2.1')}}"></script>
        <script src="{{URL::asset('panel/js/data-table/data-table-active.js?v=2.1')}}"></script>
        <script src="{{URL::asset('panel/js/data-table/bootstrap-table-editable.js?v=2.1')}}"></script>
        <script src="{{URL::asset('panel/js/data-table/bootstrap-editable.js?v=2.1')}}"></script>
        <script src="{{URL::asset('panel/js/data-table/bootstrap-table-resizable.js?v=2.1')}}"></script>
        <script src="{{URL::asset('panel/js/data-table/colResizable-1.5.source.js?v=2.1')}}"></script>
        <script src="{{URL::asset('panel/js/data-table/bootstrap-table-export.js?v=2.1')}}"></script>

        <script src="{{URL::asset('panel/js/dropzone.js?v=2.1')}}"></script>
        <script src="{{URL::asset('panel/js/multiple-email-active.js?v=2.1')}}"></script>
        <script src="{{URL::asset('panel/js/summernote.min.js?v=2.1')}}"></script>
        <script src="{{URL::asset('panel/js/summernote-active.js?v=2.1')}}"></script>

        <!-- main JS
            ============================================ -->
        <script src="{{URL::asset('panel/js/main.js?v=2.1')}}"></script>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function isNumber(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }

            $(document).ready(function() {

                var token = localStorage.getItem('token');
                if(token == null) {
                    window.location.href = '{{url('/login')}}';
                    return;
                }

                $.ajax({
                    type: 'get',
                    url: '{{route('contact.unseen')}}',
                    headers: {
                        'Authorization': "Bearer " + token,
                        'accept': 'application/json'
                    },
                    success: function(res) {

                        if(res.status === "ok" && parseInt(res.unseen) > 0)
                            $("#unseen").append(res.unseen + " تماس دیده نشده ");
                    }
                });
            });

        </script>
    @show
</div>
</body>
