@php
    $objUser = \Illuminate\Support\Facades\Auth::user();
@endphp
    <!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Themezhub" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kumo- Fashion eCommerce HTML Template</title>

    <!-- Custom CSS -->
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    <style>
        #button{
            width: 150px;
            background: white;
            font-size: 15px;
        }
        .dropdown-menu{
            width: 150px;
            border: 1px solid red;
            font-size: 15px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader"></div>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <div class="py-2 bg-dark">
        <div class="container">
            <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 hide-ipad">
                    <div class="top_first"><a href="callto:(+84)0123456789" class="medium text-light">(+84) 0123 456 789</a></div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 hide-ipad">
                    <div class="top_second text-center"><p class="medium text-light m-0 p-0">Get Free delivery from $2000 <a href="#" class="medium text-light text-underline">Shop Now</a></p></div>
                </div>

                <!-- Right Menu -->
                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12">

                    <div class="currency-selector dropdown js-dropdown float-right">
                        <a href="javascript:void(0);" data-toggle="dropdown" class="popup-title"  title="Currency" aria-label="Currency dropdown">
                            <span class="hidden-xl-down medium text-light">Currency:</span>
                            <span class="iso_code medium text-light">$USD</span>
                            <i class="fa fa-angle-down medium text-light"></i>
                        </a>
                        <ul class="popup-content dropdown-menu">
                            <li><a title="Euro" href="#" class="dropdown-item medium text-medium">EUR €</a></li>
                            <li class="current"><a title="US Dollar" href="#" class="dropdown-item medium text-medium">USD $</a></li>
                        </ul>
                    </div>

                    <!-- Choose Language -->

                    <div class="language-selector-wrapper dropdown js-dropdown float-right mr-3">
                        <a class="popup-title" href="javascript:void(0)" data-toggle="dropdown" title="Language" aria-label="Language dropdown">
                            <span class="hidden-xl-down medium text-light">Language:</span>
                            <span class="iso_code medium text-light">English</span>
                            <i class="fa fa-angle-down medium text-light"></i>
                        </a>
                        <ul class="dropdown-menu popup-content link">
                        </ul>
                    </div>

                    <div class="currency-selector dropdown js-dropdown float-right mr-3">
                        <a href="javascript:void(0);" class="text-light medium">Wishlist</a>
                    </div>

                    <div class="currency-selector dropdown js-dropdown float-right mr-3">
                        <a href="javascript:void(0);" class="text-light medium">My Account</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Start Navigation -->
    <header>
        @include('templates.nav')
    </header>
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ======================= Shop Style 1 ======================== -->
    <main>
        <div class="content">
        @yield('content')
        </div>
    </main>
    <footer>
        @include('templates.footer')
    </footer>
    <!-- ============================ Footer End ================================== -->


@yield('js');
<script src="{{asset('assets/js/jquery.min')}}"></script>
<script src="{{asset('assets/js/popper.min')}}"></script>
<script src="{{asset('assets/js/bootstrap.min')}}"></script>
<script src="{{asset('assets/js/ion.rangeSlider.min')}}"></script>
<script src="{{asset('assets/js/slick')}}"></script>
<script src="{{asset('assets/js/slider-bg')}}"></script>
<script src="{{asset('assets/js/lightbox')}}"></script>
<script src="{{asset('assets/js/smoothproducts')}}"></script>
<script src="{{asset('assets/js/snackbar.min')}}"></script>
<script src="{{asset('assets/js/jQuery.style.switcher')}}"></script>
<script src="{{asset('assets/js/custom')}}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    function openCart() {
        document.getElementById("Cart").style.display = "block";
    }
    function closeCart() {
        document.getElementById("Cart").style.display = "none";
    }
</script>

<script>
    function openSearch() {
        document.getElementById("Search").style.display = "block";
    }
    function closeSearch() {
        document.getElementById("Search").style.display = "none";
    }
</script>

</body>

<!-- Mirrored from themezhub.net/kumo-demo-2/kumo/shop-style-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Aug 2022 02:03:22 GMT -->
</html>

