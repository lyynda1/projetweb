<?php
// Check if a search query has been submitted
if (isset($_GET['search'])) {
    $search_query = htmlspecialchars($_GET['search']); // Sanitize the search input to prevent XSS
} else {
    $search_query = '';
}

// Example: You could use SQL to query the database for matching products or posts
// Replace this with your actual database connection and query logic

// Example MySQL query to search products (if using MySQL)
// Establish your database connection (replace with your actual DB credentials)
$host = 'localhost';
$db = 'lynda';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Search query to search the database for matching products or posts
    $stmt = $pdo->prepare("SELECT * FROM produit WHERE nomProduit LIKE :search_query OR description LIKE :search_query");
    $stmt->execute(['search_query' => "%$search_query%"]);
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
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
<body>
  
    <?php if (!empty($results)): ?>
        <section id="shop-list-section">
            <div class="isotope-wrap">
                <div class="isotope col-3">
                    <div class="isotope-items-wrap sli-meta-center">
                        <div class="grid-sizer"></div>
                        <?php foreach ($results as $produit): ?>
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
    <?php else: ?>
        <p>No results found for your query.</p>
    <?php endif; ?>
	<style>
		
	</style>
</body>
</html>
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
		<!-- Theme master JS -->
		<script src="assets/js/theme.js"></script>
		