@extends('layouts.site_includes.app')
@section('content')

    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Contact Us</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        <div class="map-section map">
        	<iframe src="https://www.google.com/maps/embed?pb=" height="350" allowfullscreen></iframe>
            <div class="container">
            	<div class="row">
                	<div class="map-section__overlay-wrapper">
                        <div class="map-section__overlay">
                            <h3 class="h4">Our store</h3>
                            <div class="rte-setting">
                                <p>123 Fake St.<br>Toronto, Canada</p>
                                <p>Mon - Fri, 10am - 9pm<br>Saturday, 11am - 9pm<br>Sunday, 11am - 5pm</p>
                            </div>
                            <p><a href="https://maps.google.com/?daddr=80%20Spadina%20Ave,%20Toronto" class="btn btn--secondary btn--small" target="_blank">Get directions</a></p>
                        </div>
                   	</div>
                </div>
            </div>
        </div>
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="index.html" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Contact Us</span>
            </div>
        </div>
        
        <div class="container">

        </div>
        
    </div>
    <!--End Body Content-->

@endsection