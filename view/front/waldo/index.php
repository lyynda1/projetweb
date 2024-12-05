<!DOCTYPE html>

<!--
   Template:   Waldo - Responsive HTML5 Portfolio Website Template
   Author:     Themetorium
   URL:        http://themetorium.net
   Notes:		You are free to use prepared helper classes to customize your website. Look into "helper.css" file for more info.  
-->

<html lang="en">
	
<!-- Mirrored from demo.themetorium.net/html/waldo/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Nov 2024 15:50:37 GMT -->
<head>

		<!-- Title -->
		<title>Home - Waldo</title>

		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Responsive One Page HTML5 Website Template">
		<meta name="keywords" content="HTML5, CSS3, Bootsrtrap, Responsive, Template, Theme, Website" />
		<meta name="author" content="themetorium.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Favicon (http://www.favicon-generator.org/) -->
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

		<!-- Google font (https://www.google.com/fonts) -->
		<link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono:400,400italic,700,700italic' rel='stylesheet' type='text/css'> <!-- Body font (Ubuntu Mono) -->

		<!-- Bootstrap CSS (http://getbootstrap.com) -->
		<link rel="stylesheet" type='text/css' href="assets/vendor/bootstrap/css/bootstrap.min.css"> <!-- bootstrap CSS (http://getbootstrap.com) -->

		<!-- Libs and Plugins CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery/css/jquery-ui.min.css"> <!-- jquery UI CSS (https://jquery.com) -->
		<link rel="stylesheet" href="assets/vendor/fontawesome/css/fontawesome-all.min.css"> <!-- Font Icons CSS (https://fontawesome.com) Free version! -->
		<link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.min.css"> <!-- Owl Carousel CSS (https://owlcarousel2.github.io/OwlCarousel2/) -->
		<link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.theme.default.min.css"> <!-- Owl Carousel default theme CSS (https://owlcarousel2.github.io/OwlCarousel2/) -->
		<link rel="stylesheet" href="assets/vendor/magnific-popup/css/magnific-popup.css"> <!-- Magnific Popup CSS (http://dimsemenov.com/plugins/magnific-popup/) -->
		<link rel="stylesheet" href="assets/vendor/ytplayer/css/jquery.mb.YTPlayer.min.css"> <!-- YTPlayer CSS (more info: https://github.com/pupunzi/jquery.mb.YTPlayer) -->

		<!-- Theme master CSS -->
		<link rel="stylesheet" type='text/css' href="assets/css/helper.css">
		<link rel="stylesheet" type='text/css' href="assets/css/theme.css">


	</head>

	<body>

		<!-- Begin global search (simple) 
		==================================
		* Use class "gl-search-dark" to enable global search dark style.
		-->
		<div id="global-search" class="gl-s">
			
			<!-- Begin global search close button -->
			<div class="global-search-close-wrap">
				<a href="#0" class="global-search-close" title="Close">
					<i class="fas fa-close"></i>
				</a>
			</div>
			<!-- End global search close button -->

			<!-- Begin global search form -->
			<form id="global-search-form" method="get" action="https://demo.themetorium.net/html/waldo/search-results-2.php">
				<input type="text" class="form-control" id="global-search-input" name="search" placeholder="Type your keywords...">
			</form>
			<!-- End global search form -->

		</div>
		<!-- End global search -->
	
		
		<!-- ===================
		///// Begin header /////
		==================== -->
		<div id="header">

			<!-- Begin logo
			================ -->
			<div id="logo">
				<a href="index.php"><img src="assets/img/logo-dark.png" title="Home" alt="logo"></a>
			</div>
			<!-- End logo -->

			<!-- =================
			///// Begin menu /////
			======================
			* Use class "slide-left", "slide-left-half", "slide-right", "slide-right-half", "slide-top", "slide-bottom" or "zoom-in" to change menu effect.
			-->
			<nav id="menu" class="menu slide-right-half bg-image" style="background-image: url(assets/img/misc/menu-bg-1.jpg); background-position: 50% 50%">

				<!-- Element cover -->
				<div class="cover bg-transparent-5-dark"></div>

				<!-- Begin menu inner -->
				<div id="menu-inner">

					<!-- Begin menu content -->
					<div id="menu-content">

						<!-- Begin menu nav -->
						<div class="menu-nav">
							<ul class="menu-list">
								<li class="has-children active">
									<a href="#0" class="sub-menu-trigger">Home</a> 
									<ul class="sub-menu">
										<li><a href="index.php">Home v.1</a></li>
										<li><a href="index-2.php">Home v.2</a></li>
									</ul>
								</li>
								<li class="has-children">
									<a href="#0" class="sub-menu-trigger">About</a> 
									<ul class="sub-menu">
										<li><a href="about-us.php">About Us</a></li>
										<li><a href="about-me.php">About Me</a></li>
										<li><a href="team.php">The Team</a></li>
									</ul>
								</li>
								<li class="has-children">
									<a href="#0" class="sub-menu-trigger">Portfolio</a> 
									<ul class="sub-menu">
										<li><a href="portfolio-list.php">Portfolio List v.1</a></li>
										<li><a href="portfolio-list-2.php">Portfolio List v.2</a></li>
										<li><a href="portfolio-single-1.php">Single Item v.1</a></li>
										<li><a href="portfolio-single-2.php">Single Item v.2</a></li>
										<li><a href="portfolio-single-3.php">Single Item v.3</a></li>
										<li><a href="portfolio-single-4.php">Single Item v.4</a></li>
										<li><a href="portfolio-single-5.php">Single Item v.5</a></li>
										<li><a href="portfolio-single-6.php">Single Item v.6</a></li>
									</ul>
								</li>
								<li class="has-children">
									<a href="#0" class="sub-menu-trigger">Articles</a> 
									<ul class="sub-menu">
										<li><a href="blog-list-1.php">Blog List v.1</a></li>
										<li><a href="blog-list-2.php">Blog List v.2</a></li>
										<li><a href="blog-single.php">Blog Post No Sidebar</a></li>
										<li><a href="blog-single-sidebar-left.php">Blog Post Sidebar Left</a></li>
										<li><a href="blog-single-sidebar-right.php">Blog Post Sidebar Right</a></li>
									</ul>
								</li>
								<li class="has-children">
									<a href="#0" class="sub-menu-trigger">Panier</a> 
									<ul class="sub-menu">
										<li><a href="gallery-single-2.php">Voir panier</a></li>
									</ul>
								</li>
								<li class="has-children">
									<a href="#0" class="sub-menu-trigger">Shop</a> 
									<ul class="sub-menu">
										<li><a href="shop.php">Shop List</a></li>
										<li><a href="shop-cart.php">Shoping Cart</a></li>
									</ul>
								</li>
								<li class="has-children">
									<a href="#0" class="sub-menu-trigger">Contact</a> 
									<ul class="sub-menu">
										<li><a href="contact.php">Contact</a></li>
										<li><a href="contact-simple.php">Contact Simple</a></li>
									</ul>
								</li>
								<li class="has-children">
									<a href="#0" class="sub-menu-trigger">Pages</a> 
									<ul class="sub-menu">
										<li><a href="page-dummy.php">Dummy Page v.1</a></li>
										<li><a href="page-dummy-2.php">Dummy Page v.2</a></li>
										<li><a href="search-results.php">Search Results v.1</a></li>
										<li><a href="search-results-2.php">Search Results v.2</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<!-- End menu nav -->

					</div>
					<!-- End menu inner -->

					<!-- Begin menu footer -->
					<div class="menu-footer">
						<div class="row">
							<div class="col-sm-6">
								
								<!-- Begin social buttons -->
								<div class="social-buttons">
									<ul>
										<li><a href="#" class="btn btn-primary btn-link" target="_blank" title="Follow us on facebook"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#" class="btn btn-primary btn-link" target="_blank" title="Follow us on twitter"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#" class="btn btn-primary btn-link" target="_blank" title="Follow us on dribbble"><i class="fab fa-dribbble"></i></a></li>
										<li><a href="#" class="btn btn-primary btn-link" target="_blank" title="Follow us on behance"><i class="fab fa-behance"></i></a></li>
										<li><a href="#" class="btn btn-primary btn-link" target="_blank" title="Follow us on linkedin"><i class="fab fa-linkedin-in"></i></a></li>
										<li><a href="#" class="btn btn-primary btn-link" target="_blank" title="Follow us on youtube"><i class="fab fa-youtube"></i></a></li>
									</ul>
								</div>
								<!-- End social buttons -->
								
							</div> <!-- /.col -->

							<div class="col-sm-6 text-right">
								<!-- made with love -->
								<div class="made-with-love hide-from-sm">
									<p>Made With <span class="text-yellow"><i class="far fa-heart"></i></span></p>
								</div>
							</div> <!-- /.col -->
						</div> <!-- /.row -->
					</div>
					<!-- End menu footer -->

				</div>
				<!-- End menu content -->

			</nav>
			<!-- End menu -->

			
			<!-- ==============================
			///// Begin header attriputes /////
			=============================== -->
			<div id="header-attriputes">
				<ul>
					<li>
						<!-- Begin menu trigger -->
						<div id="menu-trigger">
							<div class="mt-inner">
								<div class="menu-str">
									<span class="str-1"></span>
									<span class="str-2"></span>
									<span class="str-3"></span>
								</div>
							</div>
							<div class="mt-text">menu</div>
						</div>
						<!-- End menu trigger -->
					</li>

					<li>
						<!-- Begin global search trigger -->
						<div id="global-search-trigger">
							<a href="#0" class="gst-icon" title="Search...">
								<i class="fas fa-search"></i>
							</a>
						</div>
						<!-- End global search trigger -->
					</li>
				</ul> 
			</div>
			<!-- End header attriputes -->

		</div>
		<!-- End header -->


		<!-- *************************************
		*********** Begin body content *********** 
		************************************** -->
		<div id="body-content">

			<!-- Begin content container -->
			<div id="content-container">

				<!-- ==============================
				///// Begin intro (slideshow) /////
				=============================== -->
				<section id="intro" class="slideshow bg-dark">

					<!-- Begin content carousel (https://owlcarousel2.github.io/OwlCarousel2/)
					====================================================================
					* Use class "nav-outside" for outside nav.
					* Use class "nav-outside-top" for outside top nav.
					* Use class "nav-bottom-right" for bottom right nav.
					* Use class "nav-rounded" for rounded nav.
					* Use class "dots-outside" for outside dots.
					* Use class "dots-left" or "dots-right" to align dots.
					* Use class "dots-rounded" for rounded dots.
					* Use class "owl-mousewheel" to enable mousewheel support.
					* Available carousel data attributes:
							data-items="5".......................(items visible on desktop)
							data-tablet-landscape="4"............(items visible on mobiles)
							data-tablet-portrait="3".............(items visible on mobiles)
							data-mobile-landscape="2"............(items visible on tablets)
							data-mobile-portrait="1".............(items visible on tablets)
							data-loop="true".....................(true/false)
							data-margin="10".....................(space between items)
							data-center="true"...................(true/false)
							data-start-position="0"..............(item start position)
							data-animate-in="fadeIn".............(fade-in animation)
							data-animate-out="fadeOut"...........(fade-out animation)
							data-mouse-drag="false"..............(true/false)
							data-touch-drag="false"..............(true/false)
							data-autoheight="true"...............(true/false)
							data-autoplay="true".................(true/false)
							data-autoplay-timeout="5000".........(milliseconds)
							data-autoplay-hover-pause="true".....(true/false)
							data-autoplay-speed="800"............(milliseconds)
							data-drag-end-speed="800"............(milliseconds)
							data-nav="true"......................(true/false)
							data-nav-speed="800".................(milliseconds)
							data-dots="false"....................(true/false)
							data-dots-speed="800"................(milliseconds)
					-->
					<div class="owl-carousel cursor-grab fade-out-scroll-5 nav-bottom-right" data-items="1" data-dots="false" data-nav="true">

						<!-- Begin carousel item 
						========================= -->
						<div class="cc-item parallax bg-image" style="background-image: url(assets/img/intro/img1.jpg); background-position: 50% 50%;" data-percent-height="0.9">

							<!-- Begin caption -->
							<div class="cc-caption intro-caption bottom-left caption-animate">
								<h1 class="intro-title">Welcome We Are kanzi</h1>
								<div class="intro-sub-title-wrap max-width-400"> <!-- max width class is optional -->
									<h2 class="intro-sub-title">
										Explore the treasures of Tunisia, where every corner holds a hidden gem waiting for you. :)
									</h2>
								</div>
							</div>
							<!-- End caption -->

						</div>
						<!-- End carousel item -->

						<!-- Begin carousel item 
						========================= -->
						<div class="cc-item parallax bg-image" style="background-image: url(assets/img/intro/intro-bg-2.jpg); background-position: 50% 50%;" data-percent-height="0.9">
							
							<!-- Begin caption -->
							<div class="cc-caption intro-caption bottom-left caption-animate">
								<h1 class="intro-title">Discover<br>Tunisia</h1>
								<div class="intro-sub-title-wrap">
									<h2 class="intro-sub-title">
										where ancient history meets breathtaking beaches and golden dunes.
									</h2>
								</div>
							</div>
							<!-- End caption -->

						</div>
						<!-- End carousel item -->

						<!-- Begin carousel item 
						========================= -->
						<div class="cc-item parallax bg-image" style="background-image: url(assets/img/intro/intro-bg-3.jpg); background-position: 50% 55%;" data-percent-height="0.9">
							
							<!-- Begin caption -->
							<div class="cc-caption intro-caption bottom-left caption-animate">
								<h1 class="intro-title">Whether you seek adventure<br>relaxation or history</h1>
								<div class="intro-sub-title-wrap">
									<h2 class="intro-sub-title">
										Tunisia has it all waiting for you
									</h2>
								</div>
							</div>
							<!-- End caption -->

						</div>
						<!-- End carousel item -->

						<!-- Begin carousel item 
						========================= -->
						<!-- <div class="cc-item parallax" data-percent-height="0.9">
								
							<a class="owl-video" href="https://vimeo.com/99653121"></a>

							<div class="cc-caption bottom-left">
								<h1 class="intro-title">Print Designer<br>Michael Smith</h1>
							</div>

						</div> -->
						<!-- End carousel item -->

					</div>
					<!-- End content carousel -->

				</section>
				<!-- End intro -->


				<!-- ===================================
				///// Begin portfolio list section /////
				==================================== -->
				<section id="portfolio-list-section">
					<div class="isotope-wrap">
						
						<!-- Begin isotope
						===================
						* Use class "gutter-1", "gutter-2" or "gutter-3" to add more space between items.
						* Use class "col-1", "col-2", "col-3", "col-4", "col-5" or "col-6" for columns.
						-->
						<div class="isotope col-3">

							<!-- Begin isotope items wrap 
							==============================
							* Use class "iso-boxed" to enable boxed layout.
							* Use class "pli-caption-center" to enable caption center position.
							* Use class "pli-caption-alter" to enable caption alternative style.
							-->
							<div class="isotope-items-wrap pli-caption-alter">

								<!-- Grid sizer (do not remove!!!) -->
								<div class="grid-sizer"></div>


								<!-- ===================== 
								/// Begin isotope item ///
								========================== 
								* If you use background image on isotope-item child element, then you need to use class "iso-height-1" or "iso-height-2" to set the item height. If you use simple image tag, then don't use height classes.
								-->
								<div class="isotope-item iso-height-2">

									<!-- Begin portfolio list item -->
									<a href="portfolio-single-1.php" class="portfolio-list-item bg-image" style="background-image: url(assets/img/porfolio/portfolio-2.jpg); background-position: 50% 50%">
										<div class="pli-hover">
											<div class="pli-caption">
												<div><h2 class="pli-title">masrah el jem</h2></div>
												<div><span class="pli-category">Amphitheater</span></div>
											</div>
											<div class="pli-arrow"></div>
										</div>
									</a>
									<!-- End portfolio list item -->

								</div>
								<!-- End isotope item -->

								<!-- ===================== 
								/// Begin isotope item ///
								========================== 
								* If you use background image on isotope-item child element, then you need to use class "iso-height-1" or "iso-height-2" to set the item height. If you use simple image tag, then don't use height classes.
								-->
								<div class="isotope-item iso-height-1">

									<!-- Begin portfolio list item -->
									<a href="portfolio-single-2.php" class="portfolio-list-item bg-image" style="background-image: url(assets/img/porfolio/portfolio-1.jpg); background-position: 50% 50%">
										<div class="pli-hover">
											<div class="pli-caption">
												<div><h2 class="pli-title">Sushi Bar</h2></div>
												<div><span class="pli-category">Print, Motion</span></div>
											</div>
											<div class="pli-arrow"></div>
										</div>
									</a>
									<!-- End portfolio list item -->

								</div>
								<!-- End isotope item -->

								<!-- ===================== 
								/// Begin isotope item ///
								========================== 
								* If you use background image on isotope-item child element, then you need to use class "iso-height-1" or "iso-height-2" to set the item height. If you use simple image tag, then don't use height classes.
								-->
								<div class="isotope-item iso-height-1">

									<!-- Begin portfolio list item -->
									<a href="portfolio-single-3.php" class="portfolio-list-item bg-image" style="background-image: url(assets/img/porfolio/portfolio-3.jpg); background-position: 50% 50%">
										<div class="pli-hover">
											<div class="pli-caption">
												<div><h2 class="pli-title">Armenian Inventors</h2></div>
												<div><span class="pli-category">Print</span></div>
											</div>
											<div class="pli-arrow"></div>
										</div>
									</a>
									<!-- End portfolio list item -->

								</div>
								<!-- End isotope item -->

								<!-- ===================== 
								/// Begin isotope item ///
								========================== 
								* If you use background image on isotope-item child element, then you need to use class "iso-height-1" or "iso-height-2" to set the item height. If you use simple image tag, then don't use height classes.
								-->
								<div class="isotope-item iso-height-1">

									<!-- Begin portfolio list item -->
									<a href="portfolio-single-4.php" class="portfolio-list-item bg-image" style="background-image: url(assets/img/porfolio/portfolio-5.jpg); background-position: 50% 50%">
										<div class="pli-hover">
											<div class="pli-caption">
												<div><h2 class="pli-title">The 13th High Fest</h2></div>
												<div><span class="pli-category">Print</span></div>
											</div>
											<div class="pli-arrow"></div>
										</div>
									</a>
									<!-- End portfolio list item -->

								</div>
								<!-- End isotope item -->

								<!-- ===================== 
								/// Begin isotope item ///
								========================== 
								* If you use background image on isotope-item child element, then you need to use class "iso-height-1" or "iso-height-2" to set the item height. If you use simple image tag, then don't use height classes.
								-->
								<div class="isotope-item iso-height-2">

									<!-- Begin portfolio list item -->
									<a href="portfolio-single-5.php" class="portfolio-list-item bg-image" style="background-image: url(assets/img/porfolio/portfolio-4.jpg); background-position: 50% 50%">
										<div class="pli-hover">
											<div class="pli-caption">
												<div><h2 class="pli-title">Prometey Bank Annual Report 2011</h2></div>
												<div><span class="pli-category">Web Design, Motion</span></div>
											</div>
											<div class="pli-arrow"></div>
										</div>
									</a>
									<!-- End portfolio list item -->

								</div>
								<!-- End isotope item -->

								<!-- ===================== 
								/// Begin isotope item ///
								========================== 
								* If you use background image on isotope-item child element, then you need to use class "iso-height-1" or "iso-height-2" to set the item height. If you use simple image tag, then don't use height classes.
								-->
								<div class="isotope-item iso-height-2">

									<!-- Begin portfolio list item -->
									<a href="portfolio-single-2.php" class="portfolio-list-item bg-image" style="background-image: url(assets/img/porfolio/portfolio-8.jpg); background-position: 50% 50%">
										<div class="pli-hover">
											<div class="pli-caption">
												<div><h2 class="pli-title">Metarez Lasminar</h2></div>
												<div><span class="pli-category">Web Design</span></div>
											</div>
											<div class="pli-arrow"></div>
										</div>
									</a>
									<!-- End portfolio list item -->

								</div>
								<!-- End isotope item -->

								<!-- ===================== 
								/// Begin isotope item ///
								========================== 
								* If you use background image on isotope-item child element, then you need to use class "iso-height-1" or "iso-height-2" to set the item height. If you use simple image tag, then don't use height classes.
								-->
								<div class="isotope-item iso-height-1">

									<!-- Begin portfolio list item -->
									<a href="portfolio-single-6.php" class="portfolio-list-item bg-image" style="background-image: url(assets/img/porfolio/portfolio-7.jpg); background-position: 50% 50%">
										<div class="pli-hover">
											<div class="pli-caption">
												<div><h2 class="pli-title">Day &amp; Night</h2></div>
												<div><span class="pli-category">Photography</span></div>
											</div>
											<div class="pli-arrow"></div>
										</div>
									</a>
									<!-- End portfolio list item -->

								</div>
								<!-- End isotope item -->

								<!-- ===================== 
								/// Begin isotope item ///
								========================== 
								* If you use background image on isotope-item child element, then you need to use class "iso-height-1" or "iso-height-2" to set the item height. If you use simple image tag, then don't use height classes.
								-->
								<div class="isotope-item iso-height-1">

									<!-- Begin portfolio list item -->
									<a href="portfolio-single-3.php" class="portfolio-list-item bg-image" style="background-image: url(assets/img/porfolio/portfolio-9.jpg); background-position: 50% 50%">
										<div class="pli-hover">
											<div class="pli-caption">
												<div><h2 class="pli-title">Altimos Tereck</h2></div>
												<div><span class="pli-category">Photography</span></div>
											</div>
											<div class="pli-arrow"></div>
										</div>
									</a>
									<!-- End portfolio list item -->

								</div>
								<!-- End isotope item -->

								<!-- ===================== 
								/// Begin isotope item ///
								========================== 
								* If you use background image on isotope-item child element, then you need to use class "iso-height-1" or "iso-height-2" to set the item height. If you use simple image tag, then don't use height classes.
								-->
								<div class="isotope-item iso-height-1">

									<!-- Begin portfolio list item -->
									<a href="portfolio-single-4.php" class="portfolio-list-item bg-image" style="background-image: url(assets/img/porfolio/portfolio-10.jpg); background-position: 50% 50%">
										<div class="pli-hover">
											<div class="pli-caption">
												<div><h2 class="pli-title">Zuula Maiden</h2></div>
												<div><span class="pli-category">Photography, Motion</span></div>
											</div>
											<div class="pli-arrow"></div>
										</div>
									</a>
									<!-- End portfolio list item -->

								</div>
								<!-- End isotope item -->

							</div>
							<!-- End isotope items wrap -->

						</div>
						<!-- End isotope -->

					</div> <!-- /.isotope-wrap -->
				</section>
				<!-- End section -->

			</div>
			<!-- End content container -->


			<!-- ===================
			///// Begin footer /////
			========================
			* Use class "fixed-footer" to enable fixed footer (no effect on small devices).
			-->
			<footer id="footer" class="fixed-footer bg-dark text-gray-2">
				<div class="container">
					<div class="row">

						<div class="col-md-4">

							<!-- Begin footer text -->
							<div class="footer-text">
								<h4>- Information</h4>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat cum vitae fugit est, eaque ea, quod pariatur numquam!
							</div>
							<!-- End footer text -->

						</div> <!-- /.col -->

						<div class="col-md-4 text-center">

							<!-- Begin footer logo -->
							<div class="footer-logo margin-top-40 margin-bottom-40">
								<a href="index.php"><img src="assets/img/logo-light.png" title="Home" alt="logo"></a>
							</div>
							<!-- End footer logo -->

						</div> <!-- /.col -->

						<div class="col-md-4">

							<!-- Begin social buttons -->
							<div class="social-buttons margin-bottom-15">
								<ul>
									<li><a href="#" class="btn btn-primary btn-link" target="_blank" title="Follow us on facebook"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="#" class="btn btn-primary btn-link" target="_blank" title="Follow us on twitter"><i class="fab fa-twitter"></i></a></li>
									<li><a href="#" class="btn btn-primary btn-link" target="_blank" title="Follow us on dribbble"><i class="fab fa-dribbble"></i></a></li>
									<li><a href="#" class="btn btn-primary btn-link" target="_blank" title="Follow us on behance"><i class="fab fa-behance"></i></a></li>
									<li><a href="#" class="btn btn-primary btn-link" target="_blank" title="Follow us on linkedin"><i class="fab fa-linkedin-in"></i></a></li>
									<li><a href="#" class="btn btn-primary btn-link" target="_blank" title="Follow us on youtube"><i class="fab fa-youtube"></i></a></li>
								</ul>
							</div>
							<!-- End social buttons -->

							<!-- Begin subscribe form -->
							<form id="footer-subscribe-form" class="form-btn-inside">
								<div class="form-group">
									<input type="email" class="form-control no-bg" id="footer-subscribe" name="subscribe" placeholder="Subscribe. Enter your email address..." required="">
									<button class="bg-yellow" type="submit"><i class="fas fa-envelope"></i></button>
								</div>
							</form>
							<!-- End subscribe form -->

							<!-- Begin copyright -->
							<div class="copyright">
								Copyright 2016 / All rights reserved <br>
								Designed by <a target="_blank" href="http://themeforest.net/user/themetorium/portfolio">Themetorium</a>
							</div>
							<!-- End copyright -->

						</div> <!-- /.col -->

					</div> <!-- /.row -->
				</div> <!-- /.container -->

				<!-- Scroll to top button -->
				<a href="#body-content" class="scrolltotop sm-scroll"></a>

			</footer>
			<!-- End footer -->


		</div>
		<!-- End body content -->



        

		<!-- ====================
		///// Scripts below /////
		===================== -->

		<!-- Core JS -->
		<script src="assets/vendor/jquery/js/jquery.min.js"></script> <!-- jquery JS (https://jquery.com) -->
		<script src="assets/vendor/jquery/js/jquery-ui.min.js"></script> <!-- jquery UI JS (https://jquery.com) -->
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- bootstrap JS (http://getbootstrap.com) -->

		<!-- Libs and Plugins JS -->
		<script src="assets/vendor/pace.min.js"></script> <!-- Pace (page loader) JS (http://github.hubspot.com/pace/docs/welcome/) -->
		<script src="assets/vendor/jquery.easing.min.js"></script> <!-- Easing JS (http://gsgd.co.uk/sandbox/jquery/easing/) -->
		<script src="assets/vendor/isotope.pkgd.min.js"></script> <!-- Isotope JS (http://isotope.metafizzy.co) -->
		<script src="assets/vendor/imagesloaded.pkgd.min.js"></script> <!-- ImagesLoaded JS (https://github.com/desandro/imagesloaded) -->
		<script src="assets/vendor/jquery.mousewheel.min.js"></script> <!-- A jQuery plugin that adds cross browser mouse wheel support (https://github.com/jquery/jquery-mousewheel) -->
		<script src="assets/vendor/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel JS (https://owlcarousel2.github.io/OwlCarousel2/) -->
		<script src="assets/vendor/magnific-popup/js/jquery.magnific-popup.min.js"></script> <!-- Magnific Popup JS (http://dimsemenov.com/plugins/magnific-popup/) -->
		<script src="assets/vendor/ytplayer/js/jquery.mb.YTPlayer.min.js"></script> <!-- YTPlayer JS (more info: https://github.com/pupunzi/jquery.mb.YTPlayer) -->

		<!-- Theme master JS -->
		<script src="assets/js/theme.js"></script>



		<!--==============================
		///// Begin Google Analytics /////
		============================== -->

		<!-- Paste your Google Analytics code here. 
		Go to http://www.google.com/analytics/ for more information. -->

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-84668666-1', 'auto');
			ga('send', 'pageview');

		</script>

		<!--==============================
		///// End Google Analytics /////
		============================== -->



	</body>


<!-- Mirrored from demo.themetorium.net/html/waldo/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Nov 2024 15:50:37 GMT -->
</html>