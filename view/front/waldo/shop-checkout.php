
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
	
<!-- Mirrored from demo.themetorium.net/html/waldo/shop-checkout.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Nov 2024 15:51:19 GMT -->
<head>

		<!-- Title -->
		<title>Checkout - Kanzi</title>

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
								
								<li class="has-children active">
									<a href="#0" class="sub-menu-trigger">Shop</a> 
									<ul class="sub-menu">
										<li><a href="shop-list.php">Shop List</a></li>
										<li><a href="next1.php">Jewerly and Accesories</a></li>
										
										<li><a href="shop-cart.php">Shoping Cart</a></li>
										<li><a href="shop-checkout.php">Checkout</a></li>
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
				<!-- ==================================
				///// Begin shop checkout section /////
				=================================== -->
				<section id="shop-checkout-section">
					<div class="container">
						<div class="row">
							<div class="col-md-12">

								<!-- Begin checkout wrap -->
								<div class="checkout-wrap">
									
									<!-- Begin accordion -->
									<div class="panel-group accordion-wrap" id="accordion-93785045" role="tablist" aria-multiselectable="true">
										<div class="panel panel-default no-border">
											<div class="panel-heading bg-main-3" role="tab" id="acc-93785045-head-1">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-93785045" href="#acc-93785045-collapse-1" aria-expanded="false" aria-controls="acc-93785045-collapse-1"><span class="acc-arrow"><i class="fas fa-chevron-up"></i></span>
														<strong>Returning customer?</strong> <span class="small">Click here to login</span>
													</a>
												</h4>
											</div>
											<div id="acc-93785045-collapse-1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="acc-93785045-head-1" aria-expanded="false">
												<div class="panel-body no-border">
													
													<!-- Begin login form -->
													<form method="post" class="login-form">
														<p class="text-gray margin-bottom-40">If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p>

														<div class="form-group">
															<label for="username">Username or email <span class="text-red">*</span></label> 
															<input type="text" class="form-control" name="username" id="username" required placeholder="Username">
														</div>
													
														<div class="form-group">
															<label for="password">Password <span class="text-red">*</span></label> 
															<input class="form-control" type="password" name="password" id="password" required placeholder="********">
														</div>

														<div class="form-group">
															<input type="submit" class="btn btn-dark margin-right-20" name="login" value="Login our shop"> 
															<label for="rememberme" class="inline">
																<input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember me 
															</label>
														</div>

														<p class="lost-password"> <a href="#">Lost your password?</a>
													</form>
													<!-- End login form -->

												</div>
											</div>
										</div>

										<div class="panel panel-default no-border">
											<div class="panel-heading bg-main-3" role="tab" id="acc-93785045-head-2">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-93785045" href="#acc-93785045-collapse-2" aria-expanded="false" aria-controls="acc-93785045-collapse-2"><span class="acc-arrow"><i class="fas fa-chevron-up"></i></span>
														<strong>Have a coupon?</strong> <span class="small">Click here to enter your code</span>
													</a>
												</h4>
											</div>
											<div id="acc-93785045-collapse-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="acc-93785045-head-2" aria-expanded="false" style="height: 0px;">
												<div class="panel-body no-border">

													<!-- Begin discount code -->
													<form>
														<div class="discount-code">
															<p class="text-gray">Enter your code if you have one.</p>
															<input type="text" name="coupon-code" class="form-control margin-bottom-10 inline-block width-auto" id="coupon-code" value="" placeholder="Coupon code"> 
															<input type="submit" class="btn btn-dark inline-block" name="apply_coupon" value="Apply Coupon">
														</div>
													</form>
													<!-- End discount code -->

												</div>
											</div>
										</div>

										<!-- Begin checkout form wrap 
								
										<div class="checkout-form-wrap">
    Begin checkout form -->
    <form action="shop.php"  method="POST" onsubmit="return control()">
        <h2>- Billing Details</h2>
        <p class="text-gray">Fields marked with "*" are required!</p>

        <!-- Begin billing details -->
        <div class="billing-details">
            <!-- Row 1: First Name and Last Name -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="billing-first-name">First Name <span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="billing-first-name" id="billing-first-name" placeholder="First Name">
                    </div>
                </div> <!-- /.col -->

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="billing-last-name">Last Name <span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="billing-last-name" id="billing-last-name" placeholder="Last Name">
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <!-- Row 2: Email and Phone -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="billing-email">Email Address <span class="text-red">*</span></label>
                        <input type="email" class="form-control" name="billing-email" id="billing-email" placeholder="example@example.com">
                    </div>
                </div> <!-- /.col -->

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="billing-phone">Phone <span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="billing-phone" id="billing-phone" placeholder="+xxx ---------------">
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <!-- Row 3: Country -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Country <span class="text-red">*</span></label>
                        <select id="country-select" name="country" class="form-control">
                            <option value="">Select a country</option>
                        </select>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <!-- Script for Country Dropdown -->
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    fetch('https://restcountries.com/v3.1/all')
                        .then(response => response.json())
                        .then(countries => {
                            const select = document.getElementById("country-select");

                            // Sort the countries alphabetically by name
                            countries.sort((a, b) => {
                                const nameA = a.name.common.toLowerCase();
                                const nameB = b.name.common.toLowerCase();
                                return nameA < nameB ? -1 : nameA > nameB ? 1 : 0;
                            });

                            // Add each country to the dropdown
                            countries.forEach(country => {
                                const option = document.createElement("option");
                                option.value = country.cca2;
                                option.textContent = country.name.common;
                                select.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Error fetching countries:', error));
                });
            </script>

            <!-- Address Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="billing-address-1">Address <span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="billing-address-1" id="billing-address-1" placeholder="Street address">
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <!-- City Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="billing-city">Town / City <span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="billing-city" id="billing-city">
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <!-- State Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="billing-state">State / County <span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="billing-state" id="billing-state">
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <!-- Postcode Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="billing-postcode">Postcode / ZIP <span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="billing-postcode" id="billing-postcode">
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <!-- Order Notes Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="billing-comments">Order Notes</label>
                        <textarea name="billing-comments" class="form-control" id="billing-comments" placeholder="Notes about your order, e.g. special notes for delivery (optional)." rows="3" cols="5"></textarea>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

        </div> <!-- /.billing-details -->

        <!-- Begin your order -->
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

									
								</div>
								<!-- End cart list -->

							</div> <!-- /.col -->
						</div> <!-- /.row -->


					</div> <!-- /.container -->

				</section>
				<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to update the subtotal for each item
    function updateSubtotal(itemId, price) {
        const quantity = document.getElementById(`quantity-${itemId}`).value;
        const subtotal = price * quantity;
        // Find the element where we display the subtotal for this item
        const subtotalElement = document.querySelector(`#quantity-${itemId}`).closest('tr').querySelector('.product-subtotal .amount');
        subtotalElement.textContent = `${subtotal.toFixed(2)} DT`;  // Update the subtotal display
        return subtotal;
    }

    // Update the overall subtotal and total
    function updateTotals() {
        let subtotal = 0;
        const items = document.querySelectorAll('.cart-table-item');
        
        // Loop through all cart items to update their subtotals
        items.forEach(item => {
            const priceElement = item.querySelector('.product-price .amount');
            const price = parseFloat(priceElement.textContent.replace(' DT', ''));
            const itemId = item.querySelector('.cart-plus-minus-box').id.split('-')[1];
            subtotal += updateSubtotal(itemId, price);
        });

        const total = subtotal;  // Assuming no extra charges like taxes or discounts for now
        document.getElementById('subtotal').textContent = `${subtotal.toFixed(2)} DT`;  // Update the cart subtotal
        document.getElementById('total').textContent = `${total.toFixed(2)} DT`;  // Update the cart total
    }

    // Event listeners for quantity buttons
    const qtyButtons = document.querySelectorAll('.qtybutton');
    qtyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-id');
            const price = parseFloat(this.getAttribute('data-price'));
            const quantityField = document.getElementById(`quantity-${itemId}`);
            let quantity = parseInt(quantityField.value);

            if (this.classList.contains('inc')) {
                quantity++;
            } else if (this.classList.contains('dec') && quantity > 1) {
                quantity--;
            }

            quantityField.value = quantity;

            updateSubtotal(itemId, price);  // Update the individual item's subtotal
            updateTotals();  // Update the overall total and subtotal
            updateCart(itemId, quantity);  // Update the cart on the server
        });
    });

    // Function to update the cart on the server
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

    // Initial total calculation on page load
    updateTotals();
});

</script>


<script>
	document.addEventListener('DOMContentLoaded', function() {
    // Function to update the subtotal for each item
    function updateSubtotal(itemId, price) {
        const quantity = document.getElementById(`quantity-${itemId}`).value;
        const subtotal = price * quantity;
        document.querySelector(`#quantity-${itemId}`).parentElement.querySelector('.product-subtotal-item').textContent = `${subtotal} DT`;

        return subtotal;
    }

    // Update the overall subtotal and total
    function updateTotals() {
        let subtotal = 0;
        const items = document.querySelectorAll('.cart-table-item');
        items.forEach(item => {
            const priceElement = item.querySelector('.product-price-item');
            const price = parseFloat(priceElement.getAttribute('data-price'));
            const itemId = item.querySelector('.cart-plus-minus-box').id.split('-')[1];
            subtotal += updateSubtotal(itemId, price);
        });

        const total = subtotal;  // Assuming no extra charges like taxes or discounts for now
        document.getElementById('subtotal').textContent = `${subtotal.toFixed(2)} DT`;
        document.getElementById('total').textContent = `${total.toFixed(2)} DT`;
    }

    // Event listeners for quantity buttons
    const qtyButtons = document.querySelectorAll('.qtybutton');
    qtyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-id');
            const price = parseFloat(this.getAttribute('data-price'));
            const quantityField = document.getElementById(`quantity-${itemId}`);
            let quantity = parseInt(quantityField.value);

            if (this.classList.contains('inc')) {
                quantity++;
            } else if (this.classList.contains('dec') && quantity > 1) {
                quantity--;
            }

            quantityField.value = quantity;

            updateSubtotal(itemId, price);
            updateTotals();
        });
    });

    // Initial total calculation on page load
    updateTotals();
});

</script>
    <!-- Cart Totals -->
    <div class="row" style="display: flex; justify-content: center; align-items: center;">
        <div class="col-md-6">
            <div class="cart-totals">
                <h2>Cart Totals</h2>

                <table class="table">
                    <tbody>
                        <tr class="cart-subtotal">
                            <th>Subtotal:</th>
                            <td><strong><span class="amount" id="subtotal">0.00DT</span></strong></td>
                        </tr>

                        <tr class="order-total">
                            <th>Cart Total:</th>
                            <td><h3 class="amount text-green" id="total">0.00DT</h3></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


        <!-- Begin payment methods -->
        <div class="payment-methods">
            <h3>- Payment Methods</h3>
            <br>
            <ul class="list-unstyled">
                <li>
                    <div class="radio-button-styled">
                        <label class="radio-inline">
                            <input type="radio" name="radio-93456936" id="radio-24431967" value="option1" checked="">
                            <span class="box"></span> Cash
                        </label>
                    </div>
                </li>
                <li>
                    <div class="radio-button-styled">
                        <label class="radio-inline">
                            <input type="radio" name="radio-93456936" id="radio-77654511" value="option2">
                            <span class="box"></span> Payment Card
                        </label>
						<div id="card-details" class="card-details" style="display:none;">
							<label for="card-type">Select Card Type:</label>
							<div class="card-select">
								<!-- Visa Option -->
								<div class="card-option" data-card="visa" id="visa">
									<input type="radio" name="card-type" id="visa-radio" value="visa">
									<img src="assets/img/shop/visa.jpg" height="20" width="30" alt="Visa" class="card-logo">
									<span>Visa</span>
								</div>
								<!-- MasterCard Option -->
								<div class="card-option" data-card="mastercard" id="mastercard">
									<input type="radio" name="card-type" id="mastercard-radio" value="mastercard">
									<img src="assets/img/shop/mastercard.png" height="20" width="30" alt="MasterCard" class="card-logo">
									<span>MasterCard</span>
								</div>
								<!-- D17 Option -->
								<div class="card-option" data-card="amex" id="amex">
									<input type="radio" name="card-type" id="amex-radio" value="amex">
									<img src="assets/img/shop/d17.png" height="20" width="30" alt="D17" class="card-logo">
									<span>D17</span>
								</div>
							</div>
							<!-- Visa Card Form -->
							<div id="visa-form" class="card-form" style="display:none;">
								<input type="text" class="form-control" name="visa-number" placeholder="Enter Visa Card Number">
								<input type="text" class="form-control" name="visa-expiry" placeholder="MM/YY">
								<input type="text" class="form-control" name="visa-cvv" placeholder="CVC">
							</div>
							<!-- MasterCard Form -->
							<div id="mastercard-form" class="card-form" style="display:none;">
								<input type="text" class="form-control" name="mastercard-number" placeholder="Enter MasterCard Number">
								<input type="text" class="form-control" name="mastercard-expiry" placeholder="MM/YY">
								<input type="text" class="form-control" name="mastercard-cvv" placeholder="CVC">
							</div>
							<!-- D17 Card Form -->
							<div id="D17-form" class="card-form" style="display:none;">
								<input type="text" class="form-control" name="D17-number" placeholder="Enter D17 Card Number">
								<input type="text" class="form-control" name="D17-expiry" placeholder="MM/YY">
								<input type="text" class="form-control" name="D17-cvv" placeholder="CVC">
							</div>
						</div>
						<!-- /.card-details -->
                    </div>
                </li>
            </ul>
        </div> <!-- /.payment-methods -->
		
        <!-- Submit Button -->
        <div class="row">
            <div class="col-md-12">
                <button type="submit" id="place-order" class="btn btn-primary">Place Order</button>
            </div>
        </div> <!-- /.row -->

   
</div> <!-- /.checkout-form-wrap -->
</form>
<!-- JavaScript for toggling card payment details -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const paymentCardRadio = document.querySelector('input[name="radio-93456936"][value="option2"]'); // Select "Payment Card" radio button
    const cashRadio = document.querySelector('input[name="radio-93456936"][value="option1"]'); // Select "Cash" radio button
    const cardDetailsSection = document.getElementById('card-details'); // Card details section
    const cardOptions = document.querySelectorAll('.card-option'); // All card type options
    const cardForms = document.querySelectorAll('.card-form'); // All card forms (Visa, MasterCard, Amex)

    // Initially hide the card details section
    cardDetailsSection.style.display = 'none';

    // Show card details when "Payment Card" option is selected
    paymentCardRadio.addEventListener('change', function () {
        cardDetailsSection.style.display = 'block';
    });

    // Hide card details when "Cash" option is selected
    cashRadio.addEventListener('change', function () {
        cardDetailsSection.style.display = 'none';
        cardForms.forEach(form => form.style.display = 'none'); // Hide all card forms
    });

    // Add click listeners to card options
    cardOptions.forEach(option => {
        option.addEventListener('click', function () {
            // Hide all card forms initially
            cardForms.forEach(form => form.style.display = 'none');

            // Get the associated card type
            const cardType = option.dataset.card;
            const cardForm = document.getElementById(`${cardType}-form`);

            // Show the corresponding card form
            if (cardForm) {
                cardForm.style.display = 'block';
            }
        });
    });
});


</script>

			


			<!-- ===================
			///// Begin footer /////
			========================
			* Use class "fixed-footer" to enable fixed footer (no effect on small devices).
			-->
			<footer id="footer" class=" bg-dark text-gray-2">
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

<script src="assets/js/shopt-cart.js"></script>
<script src="assets/js/billing.js"></script>
<script src="assets/js/cartphp.js"></script>
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


<!-- Mirrored from demo.themetorium.net/html/waldo/shop-checkout.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Nov 2024 15:51:20 GMT -->
</html>