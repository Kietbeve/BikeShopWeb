{{-- Day la phan file goc, moi file giao dien cua trang nguoi dung deu dung trang nay--}}
<!DOCTYPE html>
<html>
<head>
<title>@yield('title', 'BikeShopWeb')</title>
{{-- <link href="" rel='stylesheet' type='text/css' /> --}}
<link href="{{asset('userAsset/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="{{ asset('userAsset/js/jquery.min.js')}}"></script>
<!-- Custom Theme files -->
<link href="{{ asset('userAsset/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Bike-shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
<!--webfont-->
<!-- dropdown -->
<script src="{{ asset('userAsset/js/jquery.easydropdown.js')}}"></script>
<link href="{{ asset('userAsset/css/nav.css')}}" rel="stylesheet" type="text/css" media="all"/>
<script src="{{ asset('userAsset/js/scripts.js')}}" type="text/javascript"></script>
<!--js-->
<!---- start-smoth-scrolling---->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
		</script>
<!---- start-smoth-scrolling---->


</head>
<body>
{{-- Phan noi dung can chen se o day --}}
{{-- Header --}}
<header>
	@php
	((request()->is('/'))||(request()->is('home')))? $isPageHome=true : $isPageHome=false
	@endphp
	@include('userViews.partials.header',[$isPageHome])
</header>
	

{{-- content --}}
@yield('content')


{{-- Footer --}}
<footer>
	@include('userViews.partials.footer')
</footer>
</body>
</html>

