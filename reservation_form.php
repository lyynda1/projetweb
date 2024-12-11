<?php

// require_once './PHPMailer.php';

// session_start();

// Include the necessary files
require_once '../../Controller/ReservationController.php';
require_once '../../Controller/EventController.php';
include_once '../../Controller/connect.php';

$eventController = new EventController();
$reservationController = new ReservationController();

// Fetch all events for the dropdown list
$events = $eventController->getEvents();

// If modifying a reservation, fetch its details
$reservation = null;
if (isset($_GET['id_reservation'])) {
	$reservation = $reservationController->getReservationById($_GET['id_reservation']);
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.themetorium.net/html/waldo/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Nov 2024 15:51:20 GMT -->

<head>

	<!-- Title -->
	<title>Contact - Kanzi</title>

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
	<div id="global-search" class="gl-s gls-simple">

		<!-- Begin global search close button -->
		<div class="global-search-close-wrap">
			<a href="#0" class="global-search-close" title="Close">
				<i class="fas fa-close"></i>
			</a>
		</div>
		<!-- End global search close button -->

		<!-- Begin global search form -->
		<form id="global-search-form" method="get" action="https://demo.themetorium.net/html/waldo/search-results-2.html">
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
			<a href="index.html"><img src="assets/img/logo-light.png" title="Home" alt="logo"></a>
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
							<li class="has-children">
								<a href="#0" class="sub-menu-trigger">Home</a>
								<ul class="sub-menu">
									<li><a href="index.html">Home v.1</a></li>
									<li><a href="index-2.html">Home v.2</a></li>
								</ul>
							</li>
							<li class="has-children">
								<a href="#0" class="sub-menu-trigger">About</a>
								<ul class="sub-menu">
									<li><a href="about-us.html">About Us</a></li>
									<li><a href="about-me.html">About Me</a></li>
									<li><a href="team.html">The Team</a></li>
								</ul>
							</li>
							<li class="has-children active">
								<a href="#0" class="sub-menu-trigger">events</a>
								<ul class="sub-menu">
									<li><a href="events.php">event</a></li>

								</ul>
							</li>
							<li class="has-children">
								<a href="#0" class="sub-menu-trigger">Articles</a>
								<ul class="sub-menu">
									<li><a href="blog-list-1.html">Blog List v.1</a></li>
									<li><a href="blog-list-2.html">Blog List v.2</a></li>
									<li><a href="blog-single.html">Blog Post No Sidebar</a></li>
									<li><a href="blog-single-sidebar-left.html">Blog Post Sidebar Left</a></li>
									<li><a href="blog-single-sidebar-right.html">Blog Post Sidebar Right</a></li>
								</ul>
							</li>
							<li class="has-children">
								<a href="#0" class="sub-menu-trigger">Gallery</a>
								<ul class="sub-menu">
									<li><a href="gallery-list.html">Gallery List v.1</a></li>
									<li><a href="gallery-list-2.html">Gallery List v.2</a></li>
									<li><a href="gallery-single.html">Gallery Single v.1</a></li>
									<li><a href="gallery-single-2.html">Gallery Single v.2</a></li>
								</ul>
							</li>
							<li class="has-children">
								<a href="#0" class="sub-menu-trigger">Shop</a>
								<ul class="sub-menu">
									<li><a href="shop-list.html">Shop List</a></li>
									<li><a href="shop-single.html">Single Product</a></li>
									<li><a href="shop-cart.html">Shoping Cart</a></li>
									<li><a href="shop-checkout.html">Checkout</a></li>
								</ul>
							</li>
							<li class="has-children ">
								<a href="#0" class="sub-menu-trigger">Contact</a>
								<ul class="sub-menu">
									<li><a href="contact.html">Contact</a></li>
									<li><a href="contact-simple.html">Contact Simple</a></li>
								</ul>
							</li>
							<li class="has-children">
								<a href="#0" class="sub-menu-trigger">Pages</a>
								<ul class="sub-menu">
									<li><a href="page-dummy.html">Dummy Page v.1</a></li>
									<li><a href="page-dummy-2.html">Dummy Page v.2</a></li>
									<li><a href="search-results.html">Search Results v.1</a></li>
									<li><a href="search-results-2.html">Search Results v.2</a></li>
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
						<div class="mt-text">Menu</div>
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

			<!-- ========================
				///// Begin page header /////
				========================= -->
			<section id="page-header" data-percent-height="0.9">

				<!-- Begin page header image -->
				<div class="page-header-image parallax fade-out-scroll-6 bg-image" style="background-image: url(assets/img/page-header/page-header-bg-12.jpg); background-position: 50% 50%;">

					<!-- Begin page header caption -->
					<div class="page-header-caption">
						<h1 class="page-header-title">Contact</h1>
					</div>
					<!-- End page header caption -->

					<!-- Begin scroll down button -->
					<a href="#contact-section" class="scroll-down sm-scroll hide-from-sm" title="Scroll down"></a>
					<!-- End scroll down button -->

				</div>
				<!-- End page header image -->

			</section>
			<!-- End page header -->


			<!-- ========================================
				///// Begin split box section (contact) /////
				based on: http://www.minimit.com/articles/solutions-tutorials/bootstrap-3-responsive-columns-of-same-height
				========================================= -->
			<section id="contact-section" class="split-box">
				<div class="container-fluid">
					<div class="row">
						<div class="row-md-height">

							<!-- Column -->
							<div class="col-md-6 col-md-height col-md-middle bg-dark bg-image" style="background-image: url(assets/img/world-map.png); background-position: 50% 50%;">

								<!-- Begin contact info -->
								<div class="contact-info-wrap">
									<div class="contact-info">
										<p><i class="fas fa-home"></i> address: 121 King Street, Melbourne, Australia</p>
										<p><i class="fas fa-phone"></i> phone: +123 456 789 000</p>
										<p><i class="fas fa-envelope"></i> email: <a href="mailto:company@email.com" target="_blank">company@email.com</a></p>
									</div>

									<!-- Begin social buttons -->
									<div class="social-buttons margin-top-20">
										<ul>
											<li><a href="#" class="btn btn-social-min btn-primary-bordered btn-rounded-full" target="_blank" title="Follow us on facebook"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="#" class="btn btn-social-min btn-primary-bordered btn-rounded-full" target="_blank" title="Follow us on twitter"><i class="fab fa-twitter"></i></a></li>
											<li><a href="#" class="btn btn-social-min btn-primary-bordered btn-rounded-full" target="_blank" title="Follow us on dribbble"><i class="fab fa-dribbble"></i></a></li>
											<li><a href="#" class="btn btn-social-min btn-primary-bordered btn-rounded-full" target="_blank" title="Follow us on behance"><i class="fab fa-behance"></i></a></li>
											<li><a href="#" class="btn btn-social-min btn-primary-bordered btn-rounded-full" target="_blank" title="Follow us on linkedin"><i class="fab fa-linkedin-in"></i></a></li>
											<li><a href="#" class="btn btn-social-min btn-primary-bordered btn-rounded-full" target="_blank" title="Follow us on youtube"><i class="fab fa-youtube"></i></a></li>
										</ul>
									</div>
									<!-- End social buttons -->

								</div>
								<!-- End contact info -->

							</div> <!-- /.col -->

							<!-- Column -->
							<div class="col-md-6 col-md-height">
								<div class="container">
									<h1>Reservation Form</h1>

									<form id="reservationForm" action="./PHPMailer.php" method="POST">
										<input type="hidden" name="action" value="<?= $reservation ? 'update_reservation' : 'add_reservation' ?>">
										<input type="hidden" name="id_reservation" value="<?= $reservation ? $reservation['id_reservation'] : '' ?>">

										<div class="mb-3">
											<label for="id_evenement" class="form-label">Event</label>
											<select id="id_evenement" name="id_evenement" class="form-select" required>
												<?php foreach ($events as $event): ?>
													<option value="<?= $event['id_evenement'] ?>" <?= ($reservation && $reservation['id_evenement'] == $event['id_evenement']) ? 'selected' : '' ?>>
														<?= htmlspecialchars($event['nom_evenement']) ?>
													</option>
												<?php endforeach; ?>
											</select>
										</div>

										<div class="mb-3">
											<label for="nom_client" class="form-label">Client Name</label>
											<input type="text" id="nom_client" name="nom_client" class="form-control"
												value="<?= $reservation ? htmlspecialchars($reservation['nom_client']) : '' ?>">
											<div id="nameError" class="text-danger"></div>
										</div>

										<div class="mb-3">
											<label for="email_client" class="form-label">Client Email</label>
											<input type="email" id="email_client" name="email_client" class="form-control"
												value="<?= $reservation ? htmlspecialchars($reservation['email_client']) : '' ?>">
											<div id="emailError" class="text-danger"></div>
										</div>

										<div class="mb-3">
											<label for="date_reservation" class="form-label">Reservation Date</label>
											<input type="date" id="date_reservation" name="date_reservation" class="form-control"
												value="<?= $reservation ? htmlspecialchars($reservation['date_reservation']) : '' ?>">
											<div id="dateError" class="text-danger"></div>
										</div>

										<button type="submit" name="submit_reservation" class="btn btn-primary"><?= $reservation ? 'Update Reservation' : 'Add Reservation' ?></button>
									</form>
								</div>
							</div> <!-- /.col -->
						</div> <!-- /.row-height -->
					</div> <!-- /.row -->

				</div> <!-- /.container -->
			</section>
			<!-- End split box section -->

			<!-- ============================
				///// Begin map section /////
				============================= -->
			<section id="map-section">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 no-padding">

							<!-- Begin custom Google Map 
								=============================
								* Tutorial: https://developers.google.com/maps/documentation/javascript/tutorial
								* Styles: https://snazzymaps.com/
								-->
							<div id="map"></div>
							<!-- End custom Google Map -->

						</div> <!-- /.col -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</section>
			<!-- End map section -->


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
							<a href="index.html"><img src="assets/img/logo-light.png" title="Home" alt="logo"></a>
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
	<script src="assets/js/theme.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const form = document.getElementById('reservationForm');

			form.addEventListener('submit', function(event) {
				let valid = true;

				// Clear previous errors
				document.getElementById('nameError').textContent = '';
				document.getElementById('emailError').textContent = '';
				document.getElementById('dateError').textContent = '';

				// Validate Client Name
				const nomClient = document.getElementById('nom_client').value.trim();
				const namePattern = /^[A-Za-zÀ-ÿ\s'-]+$/;
				if (!namePattern.test(nomClient) || nomClient === '') {
					document.getElementById('nameError').textContent = 'Invalid name. Only letters, spaces, hyphens are allowed.';
					valid = false;
				}

				// Validate Client Email
				const emailClient = document.getElementById('email_client').value.trim();
				if (!emailClient.includes('@') || !emailClient.includes('.')) {
					document.getElementById('emailError').textContent = 'Invalid email format.';
					valid = false;
				}

				// Validate Reservation Date
				const dateReservation = document.getElementById('date_reservation').value;
				const today = new Date().toISOString().split('T')[0];
				if (dateReservation < today) {
					document.getElementById('dateError').textContent = 'Reservation date cannot be in the past.';
					valid = false;
				}

				if (!valid) {
					event.preventDefault(); // Prevent form submission if validation fails
				}
			});
		});
	</script>
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

	<!-- Google maps JS (https://developers.google.com/maps/documentation/javascript/tutorial). Only for contact page!!! -->
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAo5b533IB2iuDcTn2razvfjyc_rpZdiRw&amp;callback=initMap"></script>
	<script src="assets/vendor/map.js"></script>

	<!-- Theme master JS -->

	<script>
		// JavaScript function to calculate total dynamically
		function calculateTotal() {
			const checkboxes = document.querySelectorAll("#supplementList input[type='checkbox']");
			let total = 0;

			checkboxes.forEach(checkbox => {
				if (checkbox.checked) {
					total += parseFloat(checkbox.getAttribute("data-price"));
				}
			});

			document.getElementById("total").textContent = total.toFixed(2);
		}
	</script>


	<!--==============================
		///// Begin Google Analytics /////
		============================== -->

	<!-- Paste your Google Analytics code here. 
		Go to http://www.google.com/analytics/ for more information. -->

	<script>
		(function(i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r;
			i[r] = i[r] || function() {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date();
			a = s.createElement(o),
				m = s.getElementsByTagName(o)[0];
			a.async = 1;
			a.src = g;
			m.parentNode.insertBefore(a, m)
		})(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');

		ga('create', 'UA-84668666-1', 'auto');
		ga('send', 'pageview');
	</script>

	<!--==============================
		///// End Google Analytics /////
		============================== -->
	<script>
		var messageText = "<?= $_SESSION['status'] ?? '';        ?>";
		if (messageText != '') {
			alert(messageText);
		}
		Swal.fire({
			title: 'Success!',
			text: messageText,
			icon: 'success',
			confirmButtonText: 'OK'
		});
		<?php
		unset($_SESSION['status']);
		?>
	</script>


</body>


<!-- Mirrored from demo.themetorium.net/html/waldo/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Nov 2024 15:51:20 GMT -->

</html>