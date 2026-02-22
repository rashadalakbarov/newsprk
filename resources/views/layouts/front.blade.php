<!doctype html>
<html lang="en">
    <head>
        <!--====== Required meta tags ======-->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--====== Title ======-->
        <title>Newspark - @yield('title', 'Son Xəbərlər, 24/7 Azərbaycan və Dünya xəbərləri')</title>

        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="{{asset('/')}}assets/images/fabicon.png" type="image/png">

        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="{{asset('/')}}assets/css/bootstrap.min.css">

        <!--====== Fontawesome css ======-->
        <link rel="stylesheet" href="{{asset('/')}}assets/css/font-awesome.min.css">

        <!--====== Magnific Popup css ======-->
        <link rel="stylesheet" href="{{asset('/')}}assets/css/magnific-popup.css">

        <!--====== nice select css ======-->
        <link rel="stylesheet" href="{{asset('/')}}assets/css/nice-select.css">

        <!--====== Slick css ======-->
        <link rel="stylesheet" href="{{asset('/')}}assets/css/slick.css">

        <!--====== stellarnav css ======-->
        <link rel="stylesheet" href="{{asset('/')}}assets/css/stellarnav.css">

        <!--====== Default css ======-->
        <link rel="stylesheet" href="{{asset('/')}}assets/css/default.css">

        <!--====== Style css ======-->
        <link rel="stylesheet" href="{{asset('/')}}assets/css/style.css">


    </head>

    <body class="home-1-bg">

        <!--====== PRELOADER PART START ======-->
        <div class="preloader">
            <div>
                <div class="nb-spinner"></div>
            </div>
        </div>
        <!--====== PRELOADER PART ENDS ======-->
        
        @include('components.header')

        
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>

        @include('components.footer')

        <!--====== GO TO TOP PART START ======-->

        <div class="go-top-area">
            <div class="go-top-wrap">
                <div class="go-top-btn-wrap">
                    <div class="go-top go-top-btn">
                        <i class="fa fa-angle-double-up"></i>
                        <i class="fa fa-angle-double-up"></i>
                    </div>
                </div>
            </div>
        </div>

        <!--====== GO TO TOP PART ENDS ======-->








        <!--====== PART START ======-->

        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-">

                    </div>
                </div>
            </div>
        </section>

        <!--====== PART ENDS ======-->


        <!--====== jquery js ======-->
        <script src="{{asset('/')}}assets/js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="{{asset('/')}}assets/js/vendor/jquery-1.12.4.min.js"></script>


        <!--====== Bootstrap js ======-->
        <script src="{{asset('/')}}assets/js/bootstrap.min.js"></script>
        <script src="{{asset('/')}}assets/js/popper.min.js"></script>

        <!--====== Slick js ======-->
        <script src="{{asset('/')}}assets/js/slick.min.js"></script>

        <!--====== nice select js ======-->
        <script src="{{asset('/')}}assets/js/jquery.nice-select.min.js"></script>

        <!--====== stellarnav js ======-->
        <script src="{{asset('/')}}assets/js/stellarnav.min.js"></script>

        <!--====== circle progress js ======-->
        <script src="{{asset('/')}}assets/js/circle-progress.min.js"></script>

        <!--====== Magnific Popup js ======-->
        <script src="{{asset('/')}}assets/js/jquery.magnific-popup.min.js"></script>

        <!--====== Main js ======-->
        <script src="{{asset('/')}}assets/js/main.js"></script>

    </body>

</html>
