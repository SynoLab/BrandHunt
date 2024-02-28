<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/index.html   11 Nov 2019 12:16:10 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Hunt Brand</title>
<meta name="description" content="description">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('site/assets/images/logo1.ico') }}" />
<!-- Plugins CSS -->
<link rel="stylesheet" href="{{ asset('site/assets/css/plugins.css') }}">
<!-- Bootstap CSS -->
<link rel="stylesheet" href="{{ asset('site/assets/css/bootstrap.min.css') }}">


<!-- Main Style CSS -->
<link rel="stylesheet" href="{{ asset('site/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('site/assets/css/responsive.css ') }}">
</head>
<body class="template-index belle template-index-belle">
<div id="pre-loader">
    <img src="{{ asset('site/assets/images/loader.gif') }}" alt="Loading..." />
</div>


<div class="pageWrapper">
	<!--Search Form Drawer-->
	<div class="search">
        <div class="search__form">
            <form class="search-bar__form" action="#">
                <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
            </form>
            <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
        </div>
    </div>
    <!--End Search Form Drawer-->
    <!--Top Header-->
    @include('layouts.site_includes.top_header')
    <!--End Top Header-->
    <!--Header-->
    @include('layouts.site_includes.header')
    <!--End Header-->
    <!--Mobile Menu-->
    @include('layouts.site_includes.mobile_menu')
	<!--End Mobile Menu-->

    <!--Body Content-->
    @yield('content')
    <!--End Body Content-->

    <!--Footer-->
    @include('layouts.site_includes.footer')
    <!--End Footer-->
    <!--Scoll Top-->
    @include('layouts.site_includes.scrolltotop')
    <!--End Scoll Top-->

    <!--Quick View popup-->
    @include('layouts.site_includes.quickviewpopup')
    <!--End Quick View popup-->

    <!-- Newsletter Popup -->
	@include('layouts.site_includes.newsletter')
	<!-- End Newsletter Popup -->

     <!-- Including Jquery -->
     <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
     <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="assets/js/vendor/jquery.cookie.js"></script>
     <script src="assets/js/vendor/wow.min.js"></script>
     <!-- Including Javascript -->
     <script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/plugins.js"></script>
     <script src="assets/js/popper.min.js"></script>
     <script src="assets/js/lazysizes.js"></script>
     <script src="assets/js/main.js"></script>
     <!--For Newsletter Popup-->
     <script>
		jQuery(document).ready(function(){
		  jQuery('.closepopup').on('click', function () {
			  jQuery('#popup-container').fadeOut();
			  jQuery('#modalOverly').fadeOut();
		  });

		  var visits = jQuery.cookie('visits') || 0;
		  visits++;
		  jQuery.cookie('visits', visits, { expires: 1, path: '/' });
		  console.debug(jQuery.cookie('visits'));
		  if ( jQuery.cookie('visits') > 1 ) {
			jQuery('#modalOverly').hide();
			jQuery('#popup-container').hide();
		  } else {
			  var pageHeight = jQuery(document).height();
			  jQuery('<div id="modalOverly"></div>').insertBefore('body');
			  jQuery('#modalOverly').css("height", pageHeight);
			  jQuery('#popup-container').show();
		  }
		  if (jQuery.cookie('noShowWelcome')) { jQuery('#popup-container').hide(); jQuery('#active-popup').hide(); }
		});

		jQuery(document).mouseup(function(e){
		  var container = jQuery('#popup-container');
		  if( !container.is(e.target)&& container.has(e.target).length === 0)
		  {
			container.fadeOut();
			jQuery('#modalOverly').fadeIn(200);
			jQuery('#modalOverly').hide();
		  }
		});
	</script>
    <!--End For Newsletter Popup-->
</div>
      <script src="{{ asset('site/assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
      <script src="{{ asset('site/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
      <script src="{{ asset('site/assets/js/vendor/jquery.cookie.js') }}"></script>
      <script src="{{ asset('site/assets/js/vendor/wow.min.js') }}"></script>
      <!-- Including Javascript -->
      <script src="{{ asset('site/assets/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('site/assets/js/plugins.js') }}"></script>
      <script src="{{ asset('site/assets/js/popper.min.js') }}"></script>
      <script src="{{ asset('site/assets/js/lazysizes.js') }}"></script>
      <script src="{{ asset('site/assets/js/main.js') }}"></script>
    </body>

    <!-- belle/index.html   11 Nov 2019 12:20:55 GMT -->
    </html>
