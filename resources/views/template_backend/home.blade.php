<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	<!-- PAGE TITLE HERE -->
	<title>Admin Dashboard</title>
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{URL::asset('themeds/images/favicon.png')}}">
	<link href="{{URL::asset('themeds/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<link href="{{URL::asset('themeds/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{URL::asset('themeds/vendor/nouislider/nouislider.min.css')}}">
	<!-- Style css -->
	<link href="{{URL::asset('themeds/css/style.css')}}" rel="stylesheet"> </head>
</head>
<!-- sidebar-collapse -->
<body>

    

	<!--*******************
        Preloader start
    ********************-->
	<div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
	</div>
	<!--*******************
        Preloader end
    ********************-->
	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">

        @include('template_backend.navbar')

		@include('template_backend.sidebar')

        @yield('content')

		<!--**********************************
            Footer start
        ***********************************-->
		<div class="footer">
			<div class="copyright">
				<p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">Taff Development SISAKAD</a> 2021</p>
			</div>
		</div>
		<!--**********************************
            Footer end
        ***********************************-->
		<!--**********************************
           Support ticket button start
        ***********************************-->
		<!--**********************************
           Support ticket button end
        ***********************************-->
	</div>
	<!--**********************************
        Main wrapper end
    ***********************************-->
	<!--**********************************
        Scripts
    ***********************************-->
	<!-- Required vendors -->
	<script src="{{URL::asset('themeds/vendor/global/global.min.js')}}"></script>
	<script src="{{URL::asset('themeds/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{URL::asset('themeds/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
	<!-- Apex Chart -->
	<script src="{{URL::asset('themeds/vendor/apexchart/apexchart.js')}}"></script>
	<script src="{{URL::asset('themeds/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<!-- Chart piety plugin files -->
	<script src="{{URL::asset('themeds/vendor/peity/jquery.peity.min.js')}}"></script>
	<!-- Dashboard 1 -->
	<script src="{{URL::asset('themeds/js/dashboard/dashboard-1.js')}}"></script>
	<script src="{{URL::asset('themeds/vendor/owl-carousel/owl.carousel.js')}}"></script>
	<script src="{{URL::asset('themeds/js/custom.min.js')}}"></script>
	<script src="{{URL::asset('themeds/js/dlabnav-init.js')}}"></script>
	<script src="{{URL::asset('themeds/js/demo.js')}}"></script>
	<script src="{{URL::asset('themeds/js/styleSwitcher.js')}}"></script>
	<script>
	function cardsCenter() {
		/*  testimonial one function by = owl.carousel.js */
		jQuery('.card-slider').owlCarousel({
			loop: true,
			margin: 0,
			nav: true,
			//center:true,
			slideSpeed: 3000,
			paginationSpeed: 3000,
			dots: true,
			navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
			responsive: {
				0: {
					items: 1
				},
				576: {
					items: 1
				},
				800: {
					items: 1
				},
				991: {
					items: 1
				},
				1200: {
					items: 1
				},
				1600: {
					items: 1
				}
			}
		})
	}
	jQuery(window).on('load', function() {
		setTimeout(function() {
			cardsCenter();
		}, 1000);
	});
	</script>
    )
</body>
