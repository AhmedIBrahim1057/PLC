<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!-- Basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">	

        <title>Personal Learning Coach</title>	

        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7COpen+Sans:400,700,800" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{ asset('FrontendFiles/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('FrontendFiles/vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('FrontendFiles/vendor/animate/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('FrontendFiles/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('FrontendFiles/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('FrontendFiles/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('FrontendFiles/vendor/magnific-popup/magnific-popup.min.css') }}">

        <!-- Current Page CSS -->
		<link rel="stylesheet" href="{{ asset('FrontendFiles/vendor/rs-plugin/css/settings.css') }}">
		<link rel="stylesheet" href="{{ asset('FrontendFiles/vendor/rs-plugin/css/layers.css') }}">
		<link rel="stylesheet" href="{{ asset('FrontendFiles/vendor/rs-plugin/css/navigation.css') }}">
        

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('FrontendFiles/css/theme.css') }}">
        <link rel="stylesheet" href="{{ asset('FrontendFiles/css/theme-elements.css') }}">
        <link rel="stylesheet" href="{{ asset('FrontendFiles/css/theme-blog.css') }}">
        <link rel="stylesheet" href="{{ asset('FrontendFiles/css/theme-shop.css') }}">
        
        <!-- Demo CSS -->
        <link rel="stylesheet" href="{{ asset('FrontendFiles/css/demos/demo-landing.css') }}">

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{ asset('FrontendFiles/css/skins/skin-landing.css') }}"> 
        <link rel="stylesheet" href="{{ asset('FrontendFiles/css/skins/skin-corporate-4.css') }}"> 

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ asset('FrontendFiles/css/custom.css') }}">

        <!-- Head Libs -->
        <script src="{{ asset('FrontendFiles/vendor/modernizr/modernizr.min.js') }}"></script>

		<link rel="stylesheet" href="{{ secure_asset('css/AdminLTE.min.css') }}">

    </head>
    <body class="alternative-font-4 loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 100}">
        <div class="loading-overlay">
            <div class="bounce-loader">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        
        <div class="body">
            <header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
				<div class="header-body border-top-0">
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="/" class="d-flex align-items-center h6" style="text-decoration: none">
											<img alt="PLC" width="48" height="48" data-sticky-width="40" data-sticky-height="40"  src="{{ asset('FrontendFiles/img/custom/LOGO-TINY-headonly.png') }}">
											<div style="width: 230px;" class="ml-2 mt-4 text-center">
												<span>Personal Learning Coach</span>
                                                <p class="small">Powered by The Let Me Learn Process®</p>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border order-2 order-lg-1">
										<div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li class="dropdown">
														<a class="dropdown-item " href="#slider-section">
															Home
														</a>
													</li>
													<li class="nav-item nav-item-anim-icon d-md-block">
                                                        <a class="dropdown-item" href="#about">
                                                             About Us
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
														<a class="dropdown-item " href="#pricing">
															Pricing
														</a>
													</li>
                                                    <li class="nav-item nav-item-anim-icon d-md-block">
                                                        <a class="dropdown-item" href="#contact">
                                                            Contact Us
                                                        </a>
                                                    </li>

													<li class="dropdown">
														<a class="dropdown-item " href="/">
																sign in
														</a>
													</li>
                                                    
                                                    <li class="nav-item dropdown nav-item-left-border d-sm-block  ">
                                                        <a class="nav-link" href="#" role="button" id="dropdownLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <img src="{{asset('FrontendFiles/img/blank.gif')}}" class="flag flag-us mr-1" alt="English"> English
                                                            <i class="fas fa-angle-down"></i>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownLanguage" style="">
                                                            <a class="dropdown-item" href="#"><img src="{{asset('FrontendFiles/img/blank.gif')}}" class="flag flag-us" alt="English"> English</a>
                                                            <a class="dropdown-item" href="#"><img src="{{asset('FrontendFiles/img/blank.gif')}}" class="flag flag-es" alt="English"> Español</a>
                                                            <a class="dropdown-item" href="#"><img src="{{asset('FrontendFiles/img/blank.gif')}}" class="flag flag-fr" alt="English"> Française</a>
                                                        </div>
                                                    </li>
                                                        
												</ul>
											</nav>
										</div>
										<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button>
									</div>
									
										
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

            <div role="main" class="main">
                @yield('content')
                
            </div>
            <footer id="footer" class="bg-color-dark-scale-2 border border-right-0 border-left-0 border-bottom-0 border-color-light-3 mt-0">
                {{-- <div class="container text-center my-3 py-5">
                    <a href="#" class="goto-top">
                        <img src="{{ asset('FrontendFiles/img/lazy.png') }}" data-plugin-lazyload data-plugin-options="{'threshold': 500}" data-original="img/landing/logo.png" width="102" height="45" class="mb-4 appear-animation" alt="PLC" data-appear-animation="fadeIn" data-appear-animation-delay="300">
                    </a>
                    <p class="text-4 mb-4">PLC is exclusively available on themeforest.net by <a href="https://themeforest.net/user/okler/" class="text-color-light" target="_blank">Okler.</a></p>
                    <ul class="social-icons social-icons-big social-icons-dark-2">
                        <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div> --}}
                <div class="copyright bg-dark py-4">
                    <div class="container text-center py-2 d-flex justify-content-center ">
                        <a href="https://www.letmelearn.org/" target="_blank">
                            <img src="{{ asset('FrontendFiles/img/custom/footer.png')}}" alt="" style="width: auto" class="mx-5">
                        </a>
                        <p class="mb-0 text-2">Copyright &copy; 2021 - PLC - All Rights Reserved</p>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Vendor -->
        <script src="{{ asset('FrontendFiles/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/popper/umd/popper.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/common/common.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/isotope/jquery.isotope.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/vide/jquery.vide.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/vivus/vivus.min.js') }}"></script>
        
        
        <!-- Theme Base, Components and Settings -->
        <script src="{{ asset('FrontendFiles/js/theme.js') }}"></script>
        
        <!-- Current Page Vendor and Views -->
        <script src="{{ asset('FrontendFiles/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('FrontendFiles/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
        

        <!-- Theme Custom -->
        <script src="{{ asset('FrontendFiles/js/custom.js') }}"></script>
        
        <!-- Theme Initialization Files -->
        <script src="{{ asset('FrontendFiles/js/theme.init.js') }}"></script>

        {{-- recaptcha --}}
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <!-- Examples -->
        @yield('js')

        <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
            ga('create', 'UA-12345678-1', 'auto');
            ga('send', 'pageview');
        </script>
            -->

    </body>
</html>

{{-- @if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
@endif --}}