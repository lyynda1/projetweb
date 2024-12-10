<?php
include '../../../controller/ProduitC.php';
include '../../../controller/PanierC.php';
include '../../../controller/CategorieC.php';
$PanierC = new PanierC();
$ProduitC = new ProduitC();
$CategorieC = new CategorieC();
$idUser = 1; // Static user ID for demonstration
$cartItems = $PanierC->AfficherPanier();
if(isset($_GET['cat']))
{
	$listProduits = $ProduitC->RechercheCat($_GET['cat']);
}else 
{
	$listProduits = $ProduitC->AfficherProduits();

}

$listCategories = $CategorieC->AfficherCategorie();

?>
<!DOCTYPE html>

<!--
   Template:   Waldo - Responsive HTML5 Portfolio Website Template
   Author:     Themetorium
   URL:        http://themetorium.net
   Notes:		You are free to use prepared helper classes to customize your website. Look into "helper.css" file for more info.  
-->

<html lang="en">
	
<!-- Mirrored from demo.themetorium.net/html/waldo/shop-cart.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Nov 2024 15:51:19 GMT -->
<head>

		<!-- Title -->
		<title>Cart - Waldo</title>

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
    <form id="global-search-form" method="get" action="search-results-2.php">
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
				<a href="index.php"><img src="assets/img/logo-light.png" title="Home" alt="logo"></a>
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
									<a href="#0" class="sub-menu-trigger">Gallery</a> 
									<ul class="sub-menu">
										<li><a href="gallery-list.php">Gallery List v.1</a></li>
										<li><a href="gallery-list-2.php">Gallery List v.2</a></li>
										<li><a href="gallery-single.php">Gallery Single v.1</a></li>
										<li><a href="gallery-single-2.php">Gallery Single v.2</a></li>
									</ul>
								</li>
								<li class="has-children">
									<a href="#0" class="sub-menu-trigger">Panier</a> 
									<ul class="sub-menu">
										<li><a href="panier.php">Voir panier</a></li>
									</ul>
								</li>
								<li class="has-children">
									<a href="#0" class="sub-menu-trigger">Shop</a> 
									<ul class="sub-menu">
										<li><a href="shop.php">Shop List</a></li>
										<?php foreach($listCategories as $categorie){
 										?>
										<li><a href="shop.php?cat=<?php echo $categorie['idC'];?>"><?php echo $categorie['nomC']; ?></a></li>
										<?php }
										?>
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

				<ul>
					<li>
						<!-- Begin shopping cart trigger  -->
						<div id="shopping-cart-trigger">
							<a href="#0" class="cart-icon" title="Shopping Cart" data-toggle="modal" data-target="#modal-38875649">
								<i class="fas fa-shopping-bag"></i>
								<span class="cart-num">2</span>
							</a>
						</div>
						<!-- End shopping cart trigger -->

						<!-- Begin modal (for shopping cart) -->
						<div id="modal-38875649" class="modal modal-left fade" tabindex="-1" role="dialog" aria-hidden="false">
							<div class="modal-dialog max-width-500">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
										<h4 class="modal-title">2 items in your cart</h4>
									</div>
									<div class="modal-body">

										<!-- Begin shopping cart content -->
										
										<!-- End shopping cart content -->

									</div>
									<div class="modal-footer padding-vertical-0">
										<div class="cart-total">
											<strong>Subtotal:</strong> <span>$1,310.00</span>
										</div>
										<div class="row">
											<div class="col-xs-6 no-padding">
												<a href="shop-cart.php" class="btn btn-dark btn-block btn-lg no-margin">View Cart</a>
											</div> <!-- /.col -->

											<div class="col-xs-6 no-padding">
												<a href="shop-checkout.php" class="btn btn-primary btn-block btn-lg no-margin">Checkout</a>
											</div> <!-- /.col -->
										</div> <!-- /.row -->
									</div>
								</div> <!-- /.modal-content -->
							</div> <!-- /.modal-dialog -->
						</div>
						<!-- End modal -->
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
				<section id="page-header" data-percent-height="0.7">

					<!-- Begin page header image -->
					<div class="page-header-image parallax fade-out-scroll-6 bg-image" style="background-image: url(assets/img/page-header/page-header-bg-20.jpg); background-position: 50% 60%;">

						<!-- Begin page header caption -->
						<div class="page-header-caption">
							<h1 class="page-header-title">Shopping Cart</h1>
							<div class="page-header-sub-title-wrap">
								<h2 class="page-header-sub-title">
									Manage your purchases.
								</h2>
							</div>
						</div>
						<!-- End page header caption -->

						<!-- Begin scroll down button -->
						<a href="#shop-cart-section" class="scroll-down sm-scroll hide-from-sm" title="Scroll down"></a>
						<!-- End scroll down button -->

					</div>
					<!-- End page header image -->

				</section>
				<!-- End page header -->


				<!-- ==============================
				///// Begin shop cart section /////
				=============================== -->
				<section id="shop-cart-section">
					<div class="container">
						<div class="row">
							<div class="col-md-12">

								<!-- Begin cart list -->
								<div class="cart-list">
									<form>

										<!-- Begin table 
										=================
										* Available table classes: "table" (required), "table-striped", "table-bordered", "table-hover", "table-condensed". 
										-->
										<table class="table cart-table table-striped">
											<thead class="bg-main-3">
												<tr>
													<th class="product-thumbnail hide-from-sm">
														&nbsp;
													</th>
													<th class="product-name">
														Product
													</th>
													<th class="product-price">
														Price
													</th>
													<th class="product-quantity hide-from-sm">
														Quantity
													</th>
													<th class="product-subtotal">
														Total
													</th>
													<th class="product-remove">
														&nbsp;
													</th>
												</tr>
											</thead>
											<tbody>
												<?php if (!empty($cartItems)) {
													foreach ($cartItems as $item) {
														$idProduit = $ProduitC->RecupererProduit($item['idProduit']);
														$nomProduit = $idProduit['nomProduit'];
														$image = $idProduit['image']
														?>
														<tr class="cart-table-item">
															<td class="product-thumbnail hide-from-sm">
																<a  class="bg-image"
																	style="background-image: url('../../back/darkpan-1.0.0/img/<?php echo $image; ?>');">
																</a>
															</td>
															<td class="product-name">
																<a>
																	<strong><?php echo $nomProduit; ?></strong>
																</a>
															</td>
															<td class="product-price">
																<span class="amount"><?php echo $item['prix']; ?> DT</span>
															</td>
															<td class="product-quantity hide-from-sm">
																<div title="Quantity">
																	<div class="dec qtybutton" data-id="<?php echo $item['idProduit']; ?>" data-price="<?php echo $item['prix']; ?>">-</div>
																	<input type="text" value="<?php echo $item['quantite']; ?>" class="cart-plus-minus-box" 
																		id="quantity-<?php echo $item['idProduit']; ?>" readonly>
																	<div class="inc qtybutton" data-id="<?php echo $item['idProduit']; ?>" data-price="<?php echo $item['prix']; ?>">+</div>
																</div>
															</td>

															<td class="product-subtotal">
																<span class="amount"><strong><?php echo $item['prixTotal']; ?> DT</strong></span>
															</td>
															<td class="product-remove">
																<a title="Remove this item" class="remove"
																	href="remove_from_cart.php?idProduit=<?php echo $item['idProduit']; ?>">
																	<i class="fas fa-times"></i>
																</a>
															</td>

														</tr>
													<?php } ?>
												<?php } else { ?>
													<tr>
														<td colspan="6" class="text-center">Your cart is empty!</td>
													</tr>
												<?php } ?>
												<tr>
													<td class="padding-top-30" colspan="6">
														<a href="shop.php" class="btn btn-default hide-from-sm">Continue Shopping</a>
													</td>
												</tr>
											</tbody>
										</table>
										<!-- End table -->

									</form>
								</div>
								<!-- End cart list -->

							</div> <!-- /.col -->
						</div> <!-- /.row -->


					</div> <!-- /.container -->

				</section>
				<!-- End section -->

			</div>

			<script>
    document.querySelectorAll('.qtybutton').forEach(button => {
        button.addEventListener('click', function () {
            const idProduit = this.getAttribute('data-id');
            const price = parseFloat(this.getAttribute('data-price'));
            const quantityInput = document.getElementById('quantity-' + idProduit);
            const subtotalElement = this.closest('tr').querySelector('.product-subtotal .amount');
            
            let currentQuantity = parseInt(quantityInput.value);
            if (this.classList.contains('inc')) {
                currentQuantity += 1;
            } else if (this.classList.contains('dec') && currentQuantity > 1) {
                currentQuantity -= 1;
            }

            quantityInput.value = currentQuantity;
            const newTotal = (currentQuantity * price).toFixed(2);
            subtotalElement.textContent = `${newTotal} €`;

            // Update quantity and total on the server
            updateCart(idProduit, currentQuantity);
        });
    });

    function updateCart(idProduit, quantity) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_cart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText); // Debug: log server response
            }
        };
        xhr.send(`idProduit=${idProduit}&quantity=${quantity}`);
    }
</script>

			<!-- End content container -->


			<!-- ===================
			///// Begin footer /////
			========================
			* Use class "fixed-footer" to enable fixed footer (no effect on small devices).
			-->
			<footer id="footer" class="fixed-footer bg-dark text-gray-2">
				<div class="container-fluid max-width-1200">
					<div class="row">

						<div class="col-md-2">

							<!-- Begin footer list -->
							<div class="footer-list">
								<h4>- Information</h4>
								<ul class="list-unstyled">
									<li><a href="blog-list-2.php">Articles</a></li>
									<li><a href="page-dummy.php">About Our Shop</a></li>
									<li><a href="page-dummy.php">Secure Shopping</a></li>
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</div>
							<!-- End footer list -->

						</div> <!-- /.col -->

						<div class="col-md-2">

							<!-- Begin footer list -->
							<div class="footer-list">
								<h4>- Our Services</h4>
								<ul class="list-unstyled">
									<li><a href="page-dummy.php">Shipping &amp; Returns</a></li>
									<li><a href="page-dummy.php">International Shipping</a></li>
									<li><a href="page-dummy.php">Terms &amp; Conditions</a></li>
									<li><a href="page-dummy.php">Privacy Policy</a></li>
								</ul>
							</div>
							<!-- End footer list -->

						</div> <!-- /.col -->

						<div class="col-md-4 text-center">

							<!-- Begin footer logo -->
							<div class="footer-logo">
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


<!-- Mirrored from demo.themetorium.net/html/waldo/shop-cart.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Nov 2024 15:51:19 GMT -->
</html>