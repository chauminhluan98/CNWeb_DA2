<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1, maximum-scale=1" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="shortcut icon" href="{{ asset('public/images/premium.png') }}" />
	<link rel="dns-prefetch" href="//fonts.gstatic.com" />
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />
	<link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('public/css/fontawesome.css') }}" rel="stylesheet" />
	@yield('css')
	<link href="{{ asset('public/css/aos.css') }}" rel="stylesheet" />
	<link href="{{ asset('public/css/swiper.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('public/css/style.css') }}" rel="stylesheet" />
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	
	
	@yield('content')
		
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<ul class="sci">
						<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li><a href="#"><i class="fab fa-instagram"></i></a></li>
					</ul>
					<p class="cpryt">
						Copyright &copy; {{ date('Y') }} by <a href="#">{{ config('app.name', 'Laravel') }}</a>
					</p>
				</div>
			</div>
		</div>
	</footer>
	<script src="{{ asset('public/js/jquery-3.3.1.slim.min.js') }}"></script>
	<script src="{{ asset('public/js/popper.min.js') }}"></script>
	<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/js/aos.js') }}"></script>
	<script src="{{ asset('public/js/swiper.min.js') }}"></script>
	<script>
		AOS.init();
	</script>
	<script>
		var swiper = new Swiper('.swiper-container', {
			effect: 'coverflow',
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: 'auto',
			coverflowEffect: {
				rotate: 30,
				stretch: 0,
				depth: 100,
				modifier: 1,
				slideShadows : true,
			},
			pagination: {
				el: '.swiper-pagination',
			},
		});
	</script>
	<script type="text/javascript">
		$(document).scroll(function(){
			$('.navbar').toggleClass('scrolled', $(this).scrollTop() > $('.navbar').height());
		});
	</script>
	@yield('javascript')
</body>
</html>