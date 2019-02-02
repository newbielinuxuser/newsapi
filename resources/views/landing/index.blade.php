<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- The above 5 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- Title -->
	<title>The News Paper - News &amp; MachX Pte Ltd</title>

	<!-- Favicon -->
	<link rel="icon" href="img/core-img/favicon.ico">

	<!-- Core Stylesheet -->
	<link rel="stylesheet" href="{{ mix('/css/all.css') }}">
	<link rel="stylesheet" href="{{ mix('/css/custom-style.css') }}">

</head>

<body>
	<!-- ##### Header Area Start ##### -->
	<header class="header-area">

		<!-- Top Header Area -->
		<div class="top-header-area">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="top-header-content d-flex align-items-center justify-content-between">
							<!-- Logo -->
							<div class="logo">
								<a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
							</div>

							<!-- Login Search Area -->
							<div class="login-search-area d-flex align-items-center">
								<!-- Login -->
								<div class="login d-flex">
									<a href="#">Login</a>
									<a href="#">Register</a>
								</div>
								<!-- Search Form -->
								<div class="search-form">
									<form action="#" method="post">
										<input type="search" name="search" class="form-control" placeholder="Search">
										<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Navbar Area -->
		<div class="newspaper-main-menu" id="stickyMenu">
			<div class="classy-nav-container breakpoint-off">
				<div class="container">
					<!-- Menu -->
					<nav class="classy-navbar justify-content-between" id="newspaperNav">

						<!-- Logo -->
						<div class="logo">
							<a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
						</div>

						<!-- Navbar Toggler -->
						<div class="classy-navbar-toggler">
							<span class="navbarToggler"><span></span><span></span><span></span></span>
						</div>

						<!-- Menu -->
						<div class="classy-menu">

							<!-- close btn -->
							<div class="classycloseIcon">
								<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
							</div>

							<!-- Nav Start -->
							<div class="classynav">
								<ul>
									<li class="active"><a href="{{ route('home') }}">Home</a></li>
<!-- 									<li><a href="#">Politics</a></li>
									<li><a href="#">Breaking News</a></li>
									<li><a href="#">Business</a></li>
									<li><a href="#">Technology</a></li>
									<li><a href="#">Health</a></li>
									<li><a href="#">Travel</a></li>
									<li><a href="#">Sports</a></li>
									<li><a href="contact.html">Contact</a></li> -->
								</ul>
							</div>
							<!-- Nav End -->
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- ##### Header Area End ##### -->

	<!-- ##### Hero Area Start ##### -->
	<div class="hero-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12 col-lg-8">
					<div class="breaking-news-area d-flex align-items-center">
						<div class="news-title">
							<p>Breaking News</p>
						</div>
						<div id="breakingNewsTicker" class="ticker">
							<ul>
								<li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
								<li><a href="#">Welcome to Colorlib Family.</a></li>
								<li><a href="#">Nam eu metus sitsit amet, consec!</a></li>
							</ul>
						</div>
					</div>

					<div class="breaking-news-area d-flex align-items-center mt-15">
						<div class="news-title title2">
							<p>International</p>
						</div>
						<div id="internationalTicker" class="ticker">
							<ul>
								<li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
								<li><a href="#">Welcome to Colorlib Family.</a></li>
								<li><a href="#">Nam eu metus sitsit amet, consec!</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-12 col-lg-4">
					<div class="hero-add">
						<a href="#"><img src="img/bg-img/hero-add.gif" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ##### Hero Area End ##### -->

	<!-- ##### Blog Area Start ##### -->
	<div class="blog-area section-padding-0-80">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8">
					<div class="blog-posts-area">
					<!-- Append here -->
					</div>

					<!-- Holds your page information!! -->
					<input type="hidden" id="page" value="0" />
					<input type="hidden" id="max_page" value="<?php echo $intTotalPage ?>" />

					<!-- Your End of page message. Hidden by default -->
					<div id="end_of_page" class="center">
						<hr/>
						<span>You've reached the end of the feed.</span>
					</div>
					<nav aria-label="Page navigation example">
<!-- 						<ul class="pagination mt-50">
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">4</a></li>
							<li class="page-item"><a class="page-link" href="#">5</a></li>
							<li class="page-item"><a class="page-link" href="#">...</a></li>
							<li class="page-item"><a class="page-link" href="#">10</a></li>
						</ul> -->
					</nav>
				</div>

				<div class="col-12 col-lg-4">
					<div class="blog-sidebar-area">

						<!-- Latest Posts Widget -->
						<div class="latest-posts-widget mb-50">

							<!-- Single Featured Post -->
							@foreach($objArticle as $value)
							<div class="single-blog-post small-featured-post d-flex">
								<div class="post-thumb">
									<a href="{{ $value->url }}" target="_blank"><img src="{{ $value->urlToImage }}" alt=""></a>
								</div>
								<div class="post-data">
									<a href="{{ $value->url }}" class="post-catagory" target="_blank">{{ $value->category }}</a>
									<div class="post-meta">
										<a href="{{ $value->url }}" class="post-title" target="_blank">
											<h6>{{ $value->title }}</h6>
										</a>
										<p class="post-date"><span>{{ $value->publisedAt }}</span></p>
									</div>
								</div>
							</div>
							@endforeach

						<!-- Popular News Widget -->
						<div class="popular-news-widget mb-50">
							<h3>4 Most Popular News</h3>

							<!-- Single Popular Blog -->
							<div class="single-popular-post">
								<a href="#">
									<h6><span>1.</span> Amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales.</h6>
								</a>
								<p>April 14, 2018</p>
							</div>

							<!-- Single Popular Blog -->
							<div class="single-popular-post">
								<a href="#">
									<h6><span>2.</span> Consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer.</h6>
								</a>
								<p>April 14, 2018</p>
							</div>

							<!-- Single Popular Blog -->
							<div class="single-popular-post">
								<a href="#">
									<h6><span>3.</span> Adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo.</h6>
								</a>
								<p>April 14, 2018</p>
							</div>

							<!-- Single Popular Blog -->
							<div class="single-popular-post">
								<a href="#">
									<h6><span>4.</span> Eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
								</a>
								<p>April 14, 2018</p>
							</div>
						</div>

						<!-- Newsletter Widget -->
						<div class="newsletter-widget mb-50">
							<h4>Newsletter</h4>
							<p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<form action="#" method="post">
								<input type="text" name="text" placeholder="Name">
								<input type="email" name="email" placeholder="Email">
								<button type="submit" class="btn w-100">Subscribe</button>
							</form>
						</div>

						<!-- Latest Comments Widget -->
						<div class="latest-comments-widget">
							<h3>Latest Comments</h3>

							<!-- Single Comments -->
							<div class="single-comments d-flex">
								<div class="comments-thumbnail mr-15">
									<img src="img/bg-img/29.jpg" alt="">
								</div>
								<div class="comments-text">
									<a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
									<p>06:34 am, April 14, 2018</p>
								</div>
							</div>

							<!-- Single Comments -->
							<div class="single-comments d-flex">
								<div class="comments-thumbnail mr-15">
									<img src="img/bg-img/30.jpg" alt="">
								</div>
								<div class="comments-text">
									<a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
									<p>06:34 am, April 14, 2018</p>
								</div>
							</div>

							<!-- Single Comments -->
							<div class="single-comments d-flex">
								<div class="comments-thumbnail mr-15">
									<img src="img/bg-img/31.jpg" alt="">
								</div>
								<div class="comments-text">
									<a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
									<p>06:34 am, April 14, 2018</p>
								</div>
							</div>

							<!-- Single Comments -->
							<div class="single-comments d-flex">
								<div class="comments-thumbnail mr-15">
									<img src="img/bg-img/32.jpg" alt="">
								</div>
								<div class="comments-text">
									<a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
									<p>06:34 am, April 14, 2018</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ##### Blog Area End ##### -->

	<!-- ##### Footer Area Start ##### -->
	<footer class="footer-area">

		<!-- Main Footer Area -->
		<div class="main-footer-area">
			<div class="container">
				<div class="row">

					<!-- Footer Widget Area -->
					<div class="col-12 col-sm-6 col-lg-4">
						<div class="footer-widget-area mt-80">
							<!-- Footer Logo -->
							<div class="footer-logo">
								<a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
							</div>
							<!-- List -->
							<ul class="list">
								<li><a href="mailto:contact@youremail.com">contact@youremail.com</a></li>
								<li><a href="tel:+4352782883884">+43 5278 2883 884</a></li>
								<li><a href="http://yoursitename.com">www.yoursitename.com</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Widget Area -->
					<div class="col-12 col-sm-6 col-lg-2">
						<div class="footer-widget-area mt-80">
							<!-- Title -->
							<h4 class="widget-title">Politics</h4>
							<!-- List -->
							<ul class="list">
								<li><a href="#">Business</a></li>
								<li><a href="#">Markets</a></li>
								<li><a href="#">Tech</a></li>
								<li><a href="#">Luxury</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Widget Area -->
					<div class="col-12 col-sm-4 col-lg-2">
						<div class="footer-widget-area mt-80">
							<!-- Title -->
							<h4 class="widget-title">Featured</h4>
							<!-- List -->
							<ul class="list">
								<li><a href="#">Football</a></li>
								<li><a href="#">Golf</a></li>
								<li><a href="#">Tennis</a></li>
								<li><a href="#">Motorsport</a></li>
								<li><a href="#">Horseracing</a></li>
								<li><a href="#">Equestrian</a></li>
								<li><a href="#">Sailing</a></li>
								<li><a href="#">Skiing</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Widget Area -->
					<div class="col-12 col-sm-4 col-lg-2">
						<div class="footer-widget-area mt-80">
							<!-- Title -->
							<h4 class="widget-title">FAQ</h4>
							<!-- List -->
							<ul class="list">
								<li><a href="#">Aviation</a></li>
								<li><a href="#">Business</a></li>
								<li><a href="#">Traveller</a></li>
								<li><a href="#">Destinations</a></li>
								<li><a href="#">Features</a></li>
								<li><a href="#">Food/Drink</a></li>
								<li><a href="#">Hotels</a></li>
								<li><a href="#">Partner Hotels</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Widget Area -->
					<div class="col-12 col-sm-4 col-lg-2">
						<div class="footer-widget-area mt-80">
							<!-- Title -->
							<h4 class="widget-title">+More</h4>
							<!-- List -->
							<ul class="list">
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Design</a></li>
								<li><a href="#">Architecture</a></li>
								<li><a href="#">Arts</a></li>
								<li><a href="#">Autos</a></li>
								<li><a href="#">Luxury</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Bottom Footer Area -->
		<div class="bottom-footer-area">
			<div class="container h-100">
				<div class="row h-100 align-items-center">
					<div class="col-12">
						<!-- Copywrite -->
						<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- ##### Footer Area Start ##### -->

	<!-- ##### All Javascript Files ##### -->
	<script src="{{ mix('/js/all.js') }}"></script>
	<script src="{{ mix('/js/echo.js') }}"></script>
	<script type="text/javascript">
	var page = parseInt($('#page').val());
	var max_page = parseInt($('#max_page').val());
	var outerPane = $('.blog-posts-area'),
	didScroll = false;
	getPost();
	$(window).scroll(function() { //watches scroll of the window
		didScroll = true;
	});

	//Sets an interval so your window.scroll event doesn't fire constantly. This waits for the user to stop scrolling for not even a second and then fires the pageCountUpdate function (and then the getPost function)
	setInterval(function() {
		if (didScroll) {
			didScroll = false;
			if(($(document).height()-$(window).height())-$(window).scrollTop() < 400) {
				if(page < max_page) {
					console.log();
					getPost();
					$('#end_of_page').hide();
				} else {
					$('#end_of_page').fadeIn();
				}
			}
		}
	}, 250);

	function getPost()
	{
		$('#page').val(page+1);
		page = parseInt($('#page').val())
		$.ajax({
			type: "post",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "{{ route('getPost') }}", // whatever your URL is
			data: { page: page },
			beforeSend: function(){ //This is your loading message ADD AN ID
				$('.blog-posts-area').append("<div id='loading' class='center'><img src='{{ url('img/core-img/loading.gif') }}'/></div>");
			},
			complete: function(){ //remove the loading message
				$('#loading').remove();
			},
			success: function(html) { // success! YAY!! Add HTML to content container
				$('.blog-posts-area').append(html);
			}
		 });
	}

	function addPost(html)
	{
		$('.blog-posts-area').prepend(html);
	}

	</script>
	<script type="text/javascript">
		window.Echo.channel('test-event')
		.listen('ArticleEvent', (e) => {
			console.log(e);
			if(e.action == 'refresh') {
				addPost(e.data);
			}
		});
	</script>
</body>

</html>