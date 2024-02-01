<div class="header-wrap classicHeader animated d-flex">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!--Desktop Logo-->
            <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                <a href="/">
                    {{-- <img src="site/assets/images/logo.svg" alt="HuntBrand" title="Huntbrand" /> --}}
                    <img src="{{ asset('site/assets/images/logo1.png') }}" alt="HuntBrand" title="Huntbrand" class="Main-Logo">

                </a>
            </div>
            <!--End Desktop Logo-->
            <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                <div class="d-block d-lg-none">
                    <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                        <i class="icon anm anm-times-l"></i>
                        <i class="anm anm-bars-r"></i>
                    </button>
                </div>
                <!--Desktop Menu-->
                <nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
                    <ul id="siteNav" class="site-nav medium center hidearrow">
                        <li class="lvl1 parent megamenu"><a href="{{route('site.welcome')}}">Home <i class="anm anm-angle-down-l"></i></a></li>
                        <li class="lvl1 parent megamenu"><a href="{{route('shop')}}">Shop <i class="anm anm-angle-down-l"></i></a></li>
                        <li><a href="about-us.html" class="site-nav">About Us </a></li>
                        <li><a href="contact-us.html" class="site-nav">Contact Us</a></li>
                        <li class="lvl1 parent megamenu"><a href="{{route('blogs')}}">Blogs <i class="anm anm-angle-down-l"></i></a></li>

                    </ul>
                </nav>
                <!--End Desktop Menu-->
            </div>
            <!--Mobile Logo-->
            <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                <div class="logo">
                    <a href="index.html">
                        <img src="assets/images/logo.svg" alt="Belle Multipurpose Html Template" title="Belle Multipurpose Html Template" />
                    </a>
                </div>
            </div>
            <!--Mobile Logo-->
            
        </div>
    </div>
</div>
