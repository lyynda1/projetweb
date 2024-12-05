<?php
include '../../../controller/ProduitC.php';
include '../../../controller/CategorieC.php';

$ProduitC = new ProduitC();
$CategorieC = new CategorieC();

if(isset($_GET['cat']))
{
	$listProduits = $ProduitC->RechercheCat($_GET['cat']);
}else 
{
	$listProduits = $ProduitC->AfficherProduits();

}

$listCategories = $CategorieC->AfficherCategorie();

?>

</body>
</html>


<!DOCTYPE html>

<!--
   Template:   Waldo - Responsive HTML5 Portfolio Website Template
   Author:     Themetorium
   URL:        http://themetorium.net
   Notes:		You are free to use prepared helper classes to customize your website. Look into "helper.css" file for more info.  
-->

<html lang="en">
	
<!-- Mirrored from demo.themetorium.net/html/waldo/shop-list.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Nov 2024 15:51:15 GMT -->
<head>

		<!-- Title -->
		<title>Shop - Waldo</title>

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
			<nav id="menu" class="menu slide-right-half bg-image" style="background-image: url(assets/img/misc/menu-bg-1.jpg); background-position: 30% 30%">

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
						<!-- Begin shop filter trigger -->
						<div id="shop-filter-trigger">
							<a href="#0" class="sft-icon" title="Product Filter" data-toggle="modal" data-target="#modal-66511298">
								<i class="fas fa-search"></i>
							</a>
						</div>
						<!-- End shop filter trigger -->
					</li>
				</ul> 

			
			</div>
			<!-- End header attriputes -->

		</div>
		<!-- End header -->


		<!-- =========================
		///// Begin shop filter  /////
		========================== -->
		<div id="shop-filter" class="s-filter">

			<!-- Begin shop filter header -->
			<div class="shop-filter-header">
				<a href="#" class="shop-filter-close">×</a>
				<h4 class="shop-filter-title">Product Filter</h4>
			</div>
			<!-- End shop filter header -->

			<!-- Begin shop filter inner -->
			<div class="shop-filter-inner">
				<div class="shop-filter-box">
					
					<!-- Begin product search form -->
					<form id="product-search-form" method="get" action="https://demo.themetorium.net/html/waldo/search-results-2.php">
						<div class="form-group form-btn-inside">
							<input type="text" class="form-control" id="product-search-input" name="search" placeholder="Search...">
							<button type="submit"><i class="fas fa-search"></i></button>
						</div>
					</form>
					<!-- End product search form -->
					
				</div> <!-- /.shop-filter-box -->

				<div class="shop-filter-box">
					<h4 class="sfb-heading">Categories</h4>

					<!-- Begin product categories -->
					<ul class="product-categories">
						<li class="active"><a href="#" class="sm-scroll">Cuffs <span>26</span></a></li>
						<li><a href="#" class="sm-scroll">Rings <span>17</span></a></li>
						<li><a href="#" class="sm-scroll">Necklaces <span>31</span></a></li>
						<li><a href="#" class="sm-scroll">Clothes <span>69</span></a></li>
						<li><a href="#" class="sm-scroll">Earrings <span>89</span></a></li>
						<li><a href="#" class="sm-scroll">Bags <span>89</span></a></li>
						<li><a href="#" class="sm-scroll">Totebags<span>89</span></a></li>
					</ul>
					<!-- End product categories -->
					
				</div> <!-- /.shop-filter-box -->

				<!-- Begin shop filter form -->
				<form id="shop-filter-form">

					<div class="shop-filter-box">
						

					

						<!-- Begin product show on page -->
					
						
					</div> <!-- /.shop-filter-box -->

					<div class="shop-filter-box">
    <h4 class="sfb-heading">Filter By Price Range</h4>

    <!-- Begin price range slider -->
    <div class="price-range-slider-wrap">
        <div id="price-range-slider"></div>
        <div class="price-range">
            <label for="amount">Price:</label>
            <input type="text" id="amount" readonly>
            <button type="submit" id="price-filter-btn" class="btn btn-primary btn-xs">Filter</button>
        </div>
    </div>
    <!-- End price range slider -->
</div> <!-- /.shop-filter-box -->

<div class="shop-filter-box">
    <h4 class="sfb-heading">Filter By Price</h4>

    <!-- Begin filter by price -->
    <div class="radio-button-styled">
        <label>
            <input type="radio" name="price-range" id="price-0-20" value="0-20">
            <span class="box"></span> $0 - $20
        </label>
        <label>
            <input type="radio" name="price-range" id="price-20-60" value="20-60">
            <span class="box"></span> $20 - $60
        </label>
        <label>
            <input type="radio" name="price-range" id="price-60-100" value="60-100">
            <span class="box"></span> $60 - $100
        </label>
    </div>
    <!-- End filter by price -->
</div> <!-- /.shop-filter-box -->

<div class="shop-filter-box">
    <h4 class="sfb-heading">Filter By Color</h4>

    <!-- Begin filter by color -->
    <div class="checkbox-styled">
        <label>
            <input type="checkbox" name="color" id="color-red" value="red">
            <span class="box"></span> Red <span class="filter-count"></span>
        </label>
        <label>
            <input type="checkbox" name="color" id="color-blue" value="blue">
            <span class="box"></span> Blue <span class="filter-count"></span>
        </label>
        <label>
            <input type="checkbox" name="color" id="color-green" value="green">
            <span class="box"></span> Green <span class="filter-count"></span>
        </label>
        <label>
            <input type="checkbox" name="color" id="color-black" value="black">
            <span class="box"></span> Black <span class="filter-count"></span>
        </label>
        <label>
            <input type="checkbox" name="color" id="color-gold" value="gold">
            <span class="box"></span> Gold <span class="filter-count"></span>
        </label>
    </div>
    <!-- End filter by color -->
</div> <!-- /.shop-filter-box -->

<div class="shop-filter-buttons">
    <button type="submit" id="shop-filter-submit" class="btn btn-primary btn-block btn-sm margin-top-10">Apply Filters</button>
</div>
		
					</div> <!-- /.shop-filter-box -->

					
						<!-- End filter by tags -->
						
					</div> <!-- /.shop-filter-box -->

					<!-- Begin shop filter buttons -->
					
					<!-- End shop filter buttons -->

				</form>
				<!-- End shop filter form -->

			</div>
			<!-- End shop filter inner -->

		</div>
		<!-- End shop filter -->


		<!-- *************************************
		*********** Begin body content *********** 
		************************************** -->
		<div id="body-content">

			<!-- Begin content container -->
			<div id="content-container">

				<!-- ========================
				///// Begin page header /////
				========================= -->
				<section id="page-header" >

					<!-- Begin page header image -->
					<div class="page-header-image parallax fade-out-scroll-6 bg-image" style="background-image: url(assets/img/page-header/page-header-bg-19.jpg); background-position: <20% 20%;">

						<!-- Begin page header caption -->
						<div class="page-header-caption">
							<h1 class="page-header-title">Welcome To<br>Our Shop</h1>
							<div class="page-header-sub-title-wrap">
								<div class="margin-top-20">
									<h2 class="page-header-sub-title bg-red text-white font-size-22 font-normal"> <!-- Custom helper classes are optional -->
										Free delivery worldwide!
									</h2>
								</div>
							</div>
						</div>
						<!-- End page header caption -->

						<!-- Begin scroll down button -->
						<a href="#shop-list-section" class="scroll-down sm-scroll hide-from-sm" title="Scroll down"></a>
						<!-- End scroll down button -->

					</div>
					<!-- End page header image -->

				</section>
				<!-- End page header -->


				<!-- ============================== -->
				
				<?php
require_once '../../../config.php'; // Include the database connection

$pdo = config::getConnexion();

// Pagination settings
$productsPerPage = 3; // Number of products per page
$totalProducts = (int)$pdo->query('SELECT COUNT(idProduit) FROM produit')->fetchColumn(); // Total product count
$totalPages = ceil($totalProducts / $productsPerPage); // Total number of pages
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
if ($currentPage < 1) $currentPage = 1;
if ($currentPage > $totalPages) $currentPage = $totalPages;

$offset = ($currentPage - 1) * $productsPerPage;

// Fetch products for the current page
$query = $pdo->prepare('SELECT * FROM produit LIMIT :offset, :limit');
$query->bindValue(':offset', $offset, PDO::PARAM_INT);
$query->bindValue(':limit', $productsPerPage, PDO::PARAM_INT);
$query->execute();
$products = $query->fetchAll(PDO::FETCH_ASSOC);


?>

<section id="shop-list-section">
    <div class="isotope-wrap">
        <div class="isotope col-3">
            <div class="isotope-items-wrap sli-meta-center">
                <div class="grid-sizer"></div>
                <?php foreach ($products as $produit): ?>
                    <div class="isotope-item iso-height-2 print">
                        <div class="shop-list-item bg-image" 
                             style="background-image: url('../../back/darkpan-1.0.0/img/<?php echo htmlspecialchars($produit['image']); ?>'); background-position: 50% 50%">
                            <div class="sli-hover">
                                <div class="sli-meta">
                                    <a href="detail.php?idProduit=<?php echo $produit['idProduit']; ?>" class="sli-link">
                                        <h2 class="sli-title"><?php echo htmlspecialchars($produit['nomProduit']); ?></h2>
                                        <p class="sli-category"><?php echo htmlspecialchars($produit['description']); ?></p>
                                        <div class="sli-price"><?php echo htmlspecialchars($produit['prix']); ?>€</div>
                                    </a>
                                </div>
                                <div class="sli-buttons">
                                    <a href="detail.php?idProduit=<?php echo $produit['idProduit']; ?>" class="sli-btn sli-btn-details">View Details</a>
                                    <a href="add_to_cart.php?idProduit=<?php echo $produit['idProduit']; ?>" 
                                       class="sli-btn sli-btn-cart">
                                        <i class="fas fa-shopping-bag"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Begin pagination -->
<nav class="pagination-wrap bg-main">
    <ul class="pagination">
        <!-- First Page Link -->
        <?php if ($currentPage > 1): ?>
            <li class="first">
                <a href="?page=1" aria-label="First">First</a>
            </li>
        <?php endif; ?>

        <!-- Previous Page Link -->
        <?php if ($currentPage > 1): ?>
            <li class="prev">
                <a href="?page=<?= $currentPage - 1 ?>">Prev</a>
            </li>
        <?php endif; ?>

        <!-- Page Numbers -->
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="<?= $i === $currentPage ? 'active' : '' ?>">
                <a href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <!-- Next Page Link -->
        <?php if ($currentPage < $totalPages): ?>
            <li class="next">
                <a href="?page=<?= $currentPage + 1 ?>">Next</a>
            </li>
        <?php endif; ?>

        <!-- Last Page Link -->
        <?php if ($currentPage < $totalPages): ?>
            <li class="last">
                <a href="?page=<?= $totalPages ?>" aria-label="Last">Last</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<!-- End pagination -->

</body>
</html>

			<!-- ===================
			///// Begin footer /////
			========================
			* Use class "fixed-footer" to enable fixed footer (no effect on small devices).
			-->
			<footer id="footer" class="bg-dark text-gray-2">
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


<!-- Mirrored from demo.themetorium.net/html/waldo/shop-list.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Nov 2024 15:51:17 GMT -->
</html>