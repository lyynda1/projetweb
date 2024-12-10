<?php
include '../../../controller/ProduitC.php';
include '../../../controller/CategorieC.php';

$ProduitC = new ProduitC();
$CategorieC = new CategorieC();

$produit = $ProduitC->RecupererProduit($_GET['idProduit']);

$categorie = $CategorieC->RecupererCategorie($produit['categorie']);
$nomCategorie = $categorie['nomC'];
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
	
<!-- Mirrored from demo.themetorium.net/html/waldo/shop-single.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Nov 2024 15:51:17 GMT -->
<head>

		<!-- Title -->
		<title>Detail - Kanzi  </title>

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
						<div id="modal-38875649" class="modal modal-center fade" tabindex="-1" role="dialog" aria-hidden="false">
							<div class="modal-dialog max-width-500">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
										<h4 class="modal-title">2 items in your cart</h4>
									</div>
									<div class="modal-body">

										<!-- Begin shopping cart content -->
										<div class="cart-content">
											<ul class="cart-product-list">
												<li>
													<!-- Begin shopping cart product -->
													<div class="cart-product">
														<a href="shop-single.php" class="cart-pr-thumb bg-image" style="background-image: url(assets/img/shop/shop-7.jpg); background-position: 50% 50%;"></a>
														<div class="cart-pr-info">
															<a href="shop-single.php" class="cart-pr-title">Armchair "Yh"</a>
															<div class="cart-pr-price">Price: <span>$920.00</span></div>
															<div class="cart-pr-quantity">Cuantity: <span>1</span></div>
														</div>
														<a href="#0" class="cart-pr-remove" title="Remove from cart">×</a>
													</div>
													<!-- End shopping cart product -->
												</li>

												<li>
													<!-- Begin shopping cart product -->
													<div class="cart-product">
														<a href="shop-single.php" class="cart-pr-thumb bg-image" style="background-image: url(assets/img/shop/shop-2.jpg); background-position: 50% 50%;"></a>
														<div class="cart-pr-info">
															<a href="shop-single.php" class="cart-pr-title">Exocet Chair</a>
															<div class="cart-pr-price">Price: <span>$390.00</span></div>
															<div class="cart-pr-quantity">Cuantity: <span>1</span></div>
														</div>
														<a href="#0" class="cart-pr-remove" title="Remove from cart">×</a>
													</div>
													<!-- End shopping cart product -->
												</li>
											</ul>
										</div>
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
				<section >

					<!-- Begin page header image -->
					<div  >
					

						<!-- Begin page header caption -->
						<div class="page-header-caption">
							<h1 class="page-header-title"><?php echo $produit['nomProduit']; ?></h1>
							<div class="page-header-sub-title-wrap">
								<h2 class="page-header-sub-title font-bold">
								<?php echo $produit['description']; ?>
								</h2>
							</div>
						</div>
						<!-- End page header caption -->

						<!-- Begin scroll down button -->
						<a href="#shop-single-section" class="scroll-down sm-scroll hide-from-sm" title="Scroll down"></a>
						<!-- End scroll down button -->

					</div>
					<!-- End page header image -->

				</section>
				<!-- End page header -->


				<!-- ================================
				///// Begin shop single section /////
				================================= -->
				<section id="shop-single-section">

					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6 no-padding">

								<!-- Begin shop single product image 
								===================================== -->
								<div class="shop-single-image popup-gallery">

									<!-- Begin shop single product big image -->
									<a href="assets/img/shop/shop-single/shop-single-1.jpg" class="ss-big-image-wrap popup-trigger" data-title="by: Stephan Leathead">
										<img class="ss-big-image" src="../../back/darkpan-1.0.0/img/<?php echo htmlspecialchars($produit['image']); ?>" alt="image">
									
										<!-- <div class="ssi-view-more align-center"><i class="fas fa-search"></i></div> -->
									</a>
									<!-- End shop single product big image -->

									<!-- Begin shop single product image thumbnails -->
									<div class="shop-single-image-thumbs">
									</div>
									<!-- End shop single product image thumbnails -->

								</div>
								<!-- End shop single product image -->

							</div> <!-- /.col -->

							<div class="col-md-6 no-padding">

								<!-- Begin shop single summary 
								=============================== -->
								<div class="shop-single-summary">

									<!-- <h1 class="single-product-title">Exocet Chair</h1> -->

									<div class="row">
										<div class="col-sm-6">

											<!-- Begin single product price -->
											<div class="single-product-price">
												<!-- $149.00 -->
												<span class="single-product-price-new"><?php echo $produit['prix']; ?>DT</span>
											</div>
											<!-- End single product price -->

											<!-- Begin product availability -->
											<div class="product-availability">
												<span class="in-stock">In stock</span>
												<!-- <span class="out-of-stock">Out of stock</span> -->
											</div>
											<!-- End product availability -->

										</div> <!-- /.col -->

										<div class="col-sm-6">

											<!-- Begin product ratting review -->
											<div class="product-ratting-review">
												<div class="product-ratting">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star-half"></i>
													<i class="far fa-star"></i>
												</div>
												<a class="review-count" href="#0" title="View/Add reviews">3 Reviews</a> 
											</div>
											<!-- End product ratting review -->

										</div> <!-- /.col -->
									</div> <!-- /.row -->

									<!-- Begin product short description -->
									<div class="product-short-description">
										<h3><?php echo $produit['nomProduit']; ?></h3>
									<?php echo $produit['description']; ?>
								</div>
									<!-- End product short description -->

									<!-- Begin product add to cart -->
									<div class="product-add-to-cart">
										<form class="atc-form">



											<!-- Begin product buttons -->
											<div class="product-buttons">
												
												<a href="add_to_cart.php?idProduit=<?php echo $produit['idProduit']; ?>" 
                                       class="btn btn-dark">
                                        <i class="fas fa-shopping-bag"></i> Add To Cart
                                    </a>
												<a href="#" class="btn btn-primary" title="Add to wishlist"><i class="fas fa-heart"></i></a>
												<a href="#" class="btn btn-primary" title="Add to compare"><i class="fas fa-retweet"></i></a>
											</div>
											<!-- End product buttons -->

										</form>
									</div>
									<!-- End product add to cart -->

									<!-- Begin product meta -->
									<div class="product-meta">
										<div class="product-category"><strong>Category:</strong> <a href="#"><?php echo $nomCategorie; ?></a></div>
									</div>
									<!-- End product meta -->

									<!-- Begin social buttons -->
									<div class="social-buttons margin-top-40">
										<ul>
											<li><strong>Share: </strong></li>
											<li><a href="#0" class="btn btn-social-min btn-default btn-rounded-full" title="Share on facebook"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="#0" class="btn btn-social-min btn-default btn-rounded-full" title="Share on twitter"><i class="fab fa-twitter"></i></a></li>
											<li><a href="#0" class="btn btn-social-min btn-default btn-rounded-full" title="Share on google+"><i class="fab fa-google-plus-g"></i></a></li>
											<li><a href="#0" class="btn btn-social-min btn-default btn-rounded-full" title="Share on linkedin"><i class="fab fa-linkedin-in"></i></a></li>
											<li><a href="#0" class="btn btn-social-min btn-default btn-rounded-full" title="Email to a friend"><i class="fas fa-envelope"></i></a></li>
										</ul>
									</div>
									<!-- End social buttons -->

								</div>
								<!-- End shop single summary -->

							</div> <!-- /.col -->
						</div> <!-- /.row -->
					</div> <!-- /.container -->


					<div class="container">
						<div class="row">
							<div class="col-md-12">

								<!-- Begin tabs wrap 
								===================== -->
								<div class="tabs-wrap product-tabs">

									<!-- Begin nav tabs 
									====================
									* Use class "nav-pills" or "nav-tabs" to style tabs.
									* Use class "text-center" or "text-right" to aling tabs.
									* Use class "nav-justified" to enable equal widths tabs.
									-->
									<ul class="nav nav-pills nav-justified" role="tablist">
										<li role="presentation" class="active"><a href="#39876221" aria-controls="39876221" role="tab" data-toggle="tab">Product Description</a></li>
										<li role="presentation"><a href="#39075564" aria-controls="39075564" role="tab" data-toggle="tab">Additional Information</a></li>
										<li role="presentation"><a href="#37009132" aria-controls="37009132" role="tab" data-toggle="tab">Reviews (3)</a></li>
									</ul>
									<!-- End nav tabs -->

									<!-- Begin tabs contents -->
									<div class="tab-content">

										<!-- Begin tab pane -->
										<div role="tabpanel" class="fade tab-pane active in" id="39876221">

											<p>First piece of furniture created by Stéphane Leathead, designer and creative director of Designarium. The design is patent pending. A distinguished look of unparalleled elegance, this fabulous chair is available in a limited edition. Available in various veneers, such as White Oak, Cherry, Walnut, Maple and Mozambique.</p>

											<p>Vestibulum et dignissim arcu. Pellentesque molestie malesuada diam vitae tempor. Praesent mollis posuere dui non imperdiet. Sed enim quam, lacinia et vehicula vitae, mollis non erat. Praesent nec consectetur lorem, congue pretium sem. Nunc sit amet nisl dictum, bibendum nulla ac, dignissim orci. Aenean laoreet turpis vel diam malesuada, a mollis nisi congue. Etiam varius fringilla est, sit amet laoreet leo luctus vitae. Aliquam feugiat mattis velit, sed tristique metus pellentesque et.</p>

											<p><strong>Designer:</strong> Stéphane Leathead - <a href="http://designarium.ca/" target="_blank">http://designarium.ca</a></p>

										</div>
										<!-- End tab pane -->

										<!-- Begin tab pane -->
										<div role="tabpanel" class="fade tab-pane" id="39075564">

											<!-- Begin table 
											=================
											* Available table classes: "table" (required), "table-striped", "table-bordered", "table-hover", "table-condensed". 
											-->
											<table class="table table-striped table-bordered">
												<tbody>
													<tr>
														<th>Weight:</th>
														<td>26.7 kg</td>
													</tr>

													<tr>
														<th>Dimensions:</th>
														<td>208 x 80 x 60 cm</td>
													</tr>

													<tr>
														<th>Materials:</th>
														<td>Pine, Maple, Cherry, Walnut, White Oak</td>
													</tr>

													<tr>
														<th>Size:</th>
														<td>XL, L, M, S</td>
													</tr>

													<tr>
														<th>Other Info:</th>
														<td>Nunc sit amet nisl dictum, bibendum nulla ac, dignissim orci. Aenean laoreet turpis vel diam malesuada, a mollis nisi congue. Etiam varius fringilla est, sit amet laoreet leo luctus vitae. Aliquam feugiat mattis velit, sed tristique metus pellentesque et.</td>
													</tr>
												</tbody>
											</table>
											<!-- End table -->

										</div>
										<!-- End tab pane -->

										<!-- Begin tab pane -->
										<div role="tabpanel" class="fade tab-pane" id="37009132">

											<!-- Begin product review wrap -->
											<div class="product-review-wrap">

												<!-- Begin product reviews 
												=========================== -->
												<div class="product-reviews">
													<h2 class="product-reviews-heading">3 reviews for <span>"Exocet Chair"</span>:</h2>

													<!-- Begin product single review -->
													<div class="product-single-review">

														<!-- Begin product single review meta -->
														<div class="psr-meta">
															
															<!-- Begin product single review author -->
															<div class="psr-author">
																<strong>Anna Vernik</strong> – <span>May 12, 2016</span>
															</div>
															<!-- End product single review author -->

															<!-- Begin product single review ratting -->
															<div class="product-ratting">
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
															</div>
															<!-- End product single review ratting -->

														</div>
														<!-- End product single review meta -->

														<div class="psr-text">
															In imperdiet tempor velit ac congue. Vestibulum feugiat erat in mi egestas dignissim. Donec ac scelerisque massa, quis mollis magna. Nunc ullamcorper odio vel blandit commodo. In gravida neque sit amet venenatis interdum. Aenean viverra efficitur urna, in pretium erat volutpat at. Nullam et mattis leo. Proin auctor at lorem non tempor. Sed tincidunt urna quis rhoncus cursus. Duis quis ultricies libero, non tincidunt enim. Aenean eget volutpat nisi.
														</div>

													</div>
													<!-- End product single review -->
													
													<!-- Begin product single review -->
													<div class="product-single-review">

														<!-- Begin product single review meta -->
														<div class="psr-meta">
															
															<!-- Begin product single review author -->
															<div class="psr-author">
																<strong>John Doe</strong> – <span>May 13, 2016</span>
															</div>
															<!-- End product single review author -->

															<!-- Begin product single review ratting -->
															<div class="product-ratting">
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="far fa-star"></i>
															</div>
															<!-- End product single review ratting -->

														</div>
														<!-- End product single review meta -->

														<div class="psr-text">
															Fusce fermentum magna purus, ut aliquet nibh congue a. Fusce justo arcu, faucibus id diam ut, faucibus tristique sapien. Praesent placerat interdum tincidunt. Vivamus sagittis sapien non urna suscipit, ac viverra velit luctus. Sed elementum magna a mauris pulvinar faucibus.
														</div>

													</div>
													<!-- End product single review -->

													<!-- Begin product single review -->
													<div class="product-single-review">

														<!-- Begin product single review meta -->
														<div class="psr-meta">
															
															<!-- Begin product single review author -->
															<div class="psr-author">
																<strong>Jack Manner</strong> – <span>May 14, 2016</span>
															</div>
															<!-- End product single review author -->

															<!-- Begin product single review ratting -->
															<div class="product-ratting">
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
															</div>
															<!-- End product single review ratting -->

														</div>
														<!-- End product single review meta -->

														<div class="psr-text">
															Nam consectetur nibh porttitor est dapibus maximus. Proin pellentesque, leo eget pretium lobortis, nibh ligula ullamcorper magna, id tincidunt nunc felis sit amet dui. Suspendisse pretium ipsum a urna malesuada suscipit. Etiam ut faucibus urna. Proin vehicula luctus sapien in mattis.
														</div>

													</div>
													<!-- End product single review -->

												</div>
												<!-- End product reviews -->

												
												<!-- Begin product review form 
												=============================== -->
												<form id="product-review-form">
													<h3>Add a review:</h3>
													<div class="small text-gray margin-bottom-20"><em>* Your email address will not be published.<br>
													* All fields are required!</em></div>

													<!-- Begin product add rating -->
													<div class="product-add-ratting">
														<select class="form-control" required>
															<option value="" disabled selected>-- Please rate this product --</option>
															<option value="1">Perfect</option>
															<option value="2">Good</option>
															<option value="3">Average</option>
															<option value="4">Not that bad</option>
															<option value="5">Very Poor</option>
														</select>
													</div>
													<!-- End product add rating -->

													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<input type="text" class="form-control" name="name" placeholder="Your Name" required>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="form-group">
																<input type="email" class="form-control" name="email" placeholder="Your Email" required>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-12">
															<div class="form-group">
																<textarea class="form-control" name="message" rows="6" placeholder="Your Review" required></textarea>
															</div>
														</div>
													</div>

													<button type="submit" class="btn btn-primary btn-lg">Submit Review</button>
												</form>
												<!-- End product review form -->

											</div>
											<!-- End product review wrap -->
											
										</div>
										<!-- End tab pane -->

									</div>
									<!-- End tabs contents -->

								</div>
								<!-- End tabs wrap -->

							</div> <!-- /.col -->
						</div> <!-- /.row -->
					</div> <!-- /.container -->

				</section>

			</div>
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


<!-- Mirrored from demo.themetorium.net/html/waldo/shop-single.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Nov 2024 15:51:19 GMT -->
</html>