<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>She Shine</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{asset('site')}}/assets/css/vendors/font-awesome.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{asset('site')}}/assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('site')}}/assets/css/vendors/slick-theme.css">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('site')}}/assets/css/vendors/animate.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('site')}}/assets/css/vendors/themify-icons.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('site')}}/assets/css/vendors/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{asset('site')}}/assets/css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        .carousel-indicators {
    text-align: center;
    margin-top: 10px;
}

.carousel-indicators li {
    display: inline-block;
    width: 10px;
    height: 10px;
    margin: 0 5px;
    border: 1px solid #999;
    background-color: #ccc;
    border-radius: 50%;
    cursor: pointer;
}

.carousel-indicators .active {
    background-color: #333;
}

.ajax-load{
  			background: #e1e1e1;
		    padding: 10px 0px;
		    width: 100%;
  		}

    </style>

</head>

<body class="theme-color-1">


   


    <!-- header start -->
    <header>
        <div class="mobile-fix-option"></div>
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                            <ul>
                                <li>Welcome to Our store She Shine</li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us To Order: {{$setting->phone}}</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="navbar">
                                <a href="javascript:void(0)" onclick="openNav()">
                                    <div class="bar-style"><i class="fa fa-bars sidebar-bar" aria-hidden="true"></i>
                                    </div>
                                </a>
                                <div id="mySidenav" class="sidenav">
                                    <a href="javascript:void(0)" class="sidebar-overlay" onclick="closeNav()"></a>
                                    <nav>
                                        <div onclick="closeNav()">
                                            <div class="sidebar-back text-start"><i class="fa fa-angle-left pe-2"
                                                    aria-hidden="true"></i> Back</div>
                                        </div>
                                        <ul id="sub-menu" class="sm pixelstrap sm-vertical">







                                            <li><a href="{{route('index')}}">Home</a></li>
                                            <li><a href="{{route('shop')}}">Shop</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="brand-logo">
                                <a href="{{route('index')}}"><img src="{{asset($setting->logo)}}"
                                        class="img-fluid blur-up lazyload" alt=""></a>
                            </div>
                        </div>
                        <div class="menu-right pull-right">
                            <div>
                                <nav id="main-nav">
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                                    aria-hidden="true"></i></div>
                                        </li>
                                        <li><a href="{{route('index')}}">Home</a></li>

                                        <li>
                                            <a href="{{route('shop')}}">shop</a>

                                        </li>



                                    </ul>
                                </nav>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
    @yield('body')

    <!-- footer -->
    <footer class="footer-light">
        <div class="light-layout">
            <div class="container">

            </div>
        </div>
        <section class="section-b-space light-layout">
            <div class="container">
                <div class="row footer-theme partition-f">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-title footer-mobile-title">
                            <h4>about</h4>
                        </div>
                        <div class="footer-contant">
                            <div class="footer-logo"><img src="{{asset($setting->logo)}}" alt=""></div>
                            <p>{{$setting->description}}</p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="{{$setting->facebook}}"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{$setting->youtube}}"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col offset-xl-1">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>my account</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="#">mens</a></li>
                                    <li><a href="#">womens</a></li>
                                    <li><a href="#">clothing</a></li>
                                    <li><a href="#">accessories</a></li>
                                    <li><a href="#">featured</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>why we choose</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="#">shipping & return</a></li>
                                    <li><a href="#">secure shopping</a></li>
                                    <li><a href="#">gallary</a></li>
                                    <li><a href="#">affiliates</a></li>
                                    <li><a href="#">contacts</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>store information</h4>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    <li><i class="fa fa-map-marker"></i>{{$setting->address}}</li>
                                    <li><i class="fa fa-phone"></i>Call Us: {{$setting->phone}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="footer-end">
                            <p><i class="fa fa-copyright" aria-hidden="true"></i> 2023 Website made by <a href="https://www.instagram.com/abdelrahmanbarakaat/">Barakat</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->











    <!-- cart start -->

    <!-- cart end -->


    <!-- theme setting -->
    <div class="theme-settings">
        <ul>


            <li>
                <div class="dark-btn">Dark</div>
            </li>


        </ul>
    </div>
    <div class="scroll-setting-box">
        <div id="setting_box" class="setting-box">
            <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
            <div class="setting_box_body">
                <div onclick="closeSetting()">
                    <div class="sidebar-back text-start"><i class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back
                    </div>
                </div>
                <div class="setting-body">


                </div>
            </div>
        </div>
    </div>
    <!-- theme setting -->



    <!-- Add to cart modal popup end-->





    <!-- tap to top -->
    <div class="tap-top top-cls">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top end -->


    <!-- latest jquery-->
    <script src="{{asset('site')}}/assets/js/jquery-3.3.1.min.js"></script>



    <!-- exitintent jquery-->
    <script src="{{asset('site')}}/assets/js/jquery.exitintent.js"></script>
    <script src="{{asset('site')}}/assets/js/exit.js"></script>

    <!-- slick js-->
    <script src="{{asset('site')}}/assets/js/slick.js"></script>

    <!-- menu js-->
    <script src="{{asset('site')}}/assets/js/menu.js"></script>

    <!-- lazyload js-->
    <script src="{{asset('site')}}/assets/js/lazysizes.min.js"></script>

    <!-- Bootstrap js-->
    <script src="{{asset('site')}}/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Notification js-->
    <script src="{{asset('site')}}/assets/js/bootstrap-notify.min.js"></script>



    <!-- Theme js-->
    <script src="{{asset('site')}}/assets/js/theme-setting.js"></script>
    <script src="{{asset('site')}}/assets/js/script.js"></script>
    <script src="{{asset('site')}}/assets/js/jquery.jscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



    <script>
        $(window).on('load', function () {
            setTimeout(function () {
                $('#exampleModal').modal('show');
            }, 2500);
        });

        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>

</body>

</html>
