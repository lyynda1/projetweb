<?php
include '../../controllers/SubscriptionC.php';
include '../../controllers/AvailableSubscriptionC.php';
$AvailableSubscriptionC = new AvailableSubscriptionC();
$subs = $AvailableSubscriptionC->getAllAvailableSubscriptions();

$error = "";

$subscription = null;
$subscriptionC = new SubscriptionC();  // Use the SubscriptionC controller

// Check if subscription form data is set
if (
    isset($_POST["first_name"]) && $_POST["last_name"] && $_POST["email"] && $_POST["phone"] && $_POST["subscription_type"] && $_POST["subname"] && $_POST["subprice"] && $_POST["paymentmethod"] 
) {
    // Check if all the form fields are not empty
    if (
        !empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["email"]) && !empty($_POST["phone"]) && !empty($_POST["subscription_type"]) && !empty($_POST["subname"])  && !empty($_POST["subprice"]) && !empty($_POST["paymentmethod"])
    ) {
        // Create a new Subscription object with the form data
        $subscription = new Subscription(
            null,  // Assuming ID is auto-incremented
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['subname'],  // Subscription name
			$_POST['subprice'],
            $_POST['subscription_type'],  // Subscription type
            $_POST['paymentmethod'],  // Payment method
        );

        // Call the addSubscription method to insert the subscription into the database
        $subscriptionC->addSubscription($subscription);
    } else {
        $error = "Missing information";  // If any required fields are missing
    }
}

// Get all subscriptions (if needed)
$subscriptions = $subscriptionC->getAllSubscriptions();

// Assuming you have the SubscriptionModel class with the getSubscriptionCounts method
$subscriptionCounts = $subscriptionC->getSubscriptionCounts();
$totalSubscriptions = array_sum(array_column($subscriptionCounts, 'subscription_count')); // Get the total number of subscriptions

// Calculate the percentage for each subscription type
$subscriptionsWithPercentage = [];
foreach ($subscriptionCounts as $subscription) {
    $percentage = ($subscription['subscription_count'] / $totalSubscriptions) * 100;
    $subscriptionsWithPercentage[] = [
        'SubscriptionName' => $subscription['SubscriptionName'],
        'subscription_count' => $subscription['subscription_count'],
        'percentage' => round($percentage, 2),  // Rounded to 2 decimal places
    ];
}

// Pass this data to the frontend (HTML)
?>





<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from demo.themetorium.net/html/waldo/shop-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Nov 2024 15:51:19 GMT -->
<head>

		<!-- Title -->
		<title>about subscriptions</title>

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
		<link rel="stylesheet" href="modal.css"/>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    <style>
      /* Cards Container */
.cards-container {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
  margin-top: 50px;
}

/* Card Styling */
.card {
  background-color: #fff;
  width: 300px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  text-align: center;
}

/* Card Background */
.card-bg {
  height: 200px;
  background-size: cover;
  background-position: center;
}

/* Card Text */
.card-text {
  font-size: 24px;
  font-weight: bold;
  padding: 20px 10px;
}

/* Button Styling */
button, .card-buttons a {
  font-size: 1rem;
}

button.subscribe {
  padding: 10px 20px;
}

button.learn-more {
  font-size: 1rem;
  margin-top: 10px;
}

.btn-small {
  font-size: 1rem;
  padding: 8px 15px;
}

.learn-more-btn {
  font-size: 0.9rem;
  font-weight: bold;
  color: #007bff;
  text-decoration: none;
  display: inline-block;
  margin-top: 10px;
}

.learn-more-btn:hover {
  text-decoration: underline;
}

.card-buttons a,
.card-buttons input[type="submit"] {
  font-size: 1.5rem;
  font-weight: bold;
  padding: 15px 30px;
  border-radius: 10px;
  text-transform: uppercase;
}

.card-buttons a {
  font-size: 1.6rem;
  color: #007bff;
  text-decoration: none;
  display: inline-block;
  margin-top: 10px;
}

.card-buttons input[type="submit"] {
  background-color: #FFE800;
  color: rgb(7, 6, 6);
  border: none;
  cursor: pointer;
}

.card-buttons a:hover,
.card-buttons input[type="submit"]:hover {
  background-color: #ddcb03;
  color: #fffcfc;
}

/* Modal Styles */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Fixed position to prevent scrolling behind the modal */
  z-index: 999; /* Ensure it stays above other elements */
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Background overlay */
  overflow: hidden; /* Prevent scrolling */
}

/* Modal Content */
.modal-content {
  background-color: #fff;
  color: black;
  margin: auto;
  padding: 40px;
  border: 1px solid #888;
  width: 80%;
  max-width: 500px;
  border-radius: 10px;
  box-sizing: border-box;
  position: relative; /* Relative positioning for the close button */
  z-index: 1000; /* Ensures content stays above overlay */
}

/* Close Button */
.close-btn {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close-btn:hover,
.close-btn:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

/* Form Styles */
.form-group {
  margin-bottom: 20px; /* Increased margin between form fields */
}

.form-group label {
  font-size: 16px;
  display: block;
  margin-bottom: 5px; /* Added margin between label and input */
}

.form-group input {
  width: 100%;
  padding: 12px;
  margin-top: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 16px;
  box-sizing: border-box;
}

button.btn {
  padding: 12px 20px;
  background-color: #c8ad7e;
  color: white;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

button.btn:hover {
  background-color: #c7b28d;
}

/* Error Messages */
.error-message {
  color: red;
  font-size: 14px;
  margin-top: 5px;
}

/* Prevent clicking behind the modal */
body.modal-open {
  overflow: hidden; /* Prevent scrolling of the main content */
}

/* Adjusted styles for focus and accessibility */
.modal:focus {
  outline: none;
}
/* Custom SweetAlert2 size */
.swal-large .swal2-popup {
    width: 600px !important;  /* Adjust the width as needed */
    height: auto !important;  /* Adjust the height if necessary */
    padding: 30px !important; /* Adjust padding */
}

.swal-large .swal2-title {
    font-size: 24px; /* Increase title font size */
}

.swal-large .swal2-text {
    font-size: 18px; /* Increase text font size */
}

.swal-large .swal2-confirm {
    font-size: 18px; /* Increase button font size */
    padding: 15px 30px; /* Increase button padding */
}


    </style>


	</head>

<body>
  <!-- Begin global search (simple) 
		==================================
		* Use class "gl-search-dark" to enable global search dark style.
		-->
		

		

		
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
							
								
								
								</li>
								<li class="has-children active">
									<a href="#0" class="sub-menu-trigger">Shop</a> 
									<ul class="sub-menu">
										<li><a href="shop-list.html">Shop List</a></li>
										<li><a href="shop-single.html">Single Product</a></li>
										<li><a href="shop-cart.html">Shoping Cart</a></li>
										<li><a href="shop-checkout.html">Checkout</a></li>
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
							<h1 class="page-header-title">about subscriptions</h1>
						</div>
						<!-- End page header caption -->

						<!-- Begin scroll down button -->
						<a href="#shop-checkout-section" class="scroll-down sm-scroll hide-from-sm" title="Scroll down"></a>
						<!-- End scroll down button -->

					</div>
					<!-- End page header image -->

				</section>
				<!-- End page header -->


				<!-- ==================================
				///// Begin subscription payement  section /////
				=================================== -->
				<section id="shop-checkout-section">
					<div class="container">
						<div class="row">
							<div class="col-md-12">

								<!-- Begin checkout wrap -->
								<div class="checkout-wrap">
									
									
													
														
												</div>
											</div>
										</div>

  <!-- Section with a central title -->
<!-- Currency Selector Dropdown -->
<select id="currency-selector">
    <option value="EUR">EUR</option>
    <option value="GBP">GBP</option>
    <option value="INR">INR</option>
    <option value="TND">TND</option>  <!-- Added TND here -->
    <option value="USD" selected>USD</option> <!-- Default is USD -->
</select>
<?php 
echo '<h1>Get the Best Offers Now!</h1>';

if (!empty($subs)) {
    echo '<section class="subscriptions">
            <div class="cards-container">';

    foreach ($subs as $sub) {
        // Determine the image path (default image if subscription image is empty)
        $image_path = !empty($sub['image_path']) ? '../../uploads/' . htmlspecialchars($sub['image_path']) : 'img/default-sub.jpg';
        
        // Loop through each sub and create an HTML card
        echo '
            <div class="card">
                <div class="card-bg" style="background-image: url(' . $image_path . ');"></div>
                <p class="card-text">' . htmlspecialchars($sub['name']) . '</p>
                <p class="h6">Price: <span class="price" data-price="' . htmlspecialchars($sub['price']) . '">' . htmlspecialchars($sub['price']) . '</span></p>
                <p class="mb-4">' . htmlspecialchars($sub['description']) . '</p>
                <div class="card-buttons">
                    <button class="btn-reserve-now btn btn-primary rounded-pill py-2 px-4" 
                    data-sub-name="' . htmlspecialchars($sub['name']) . '"
                    data-sub-price="' . htmlspecialchars($sub['price']) . '"
                    data-sub-id="' . htmlspecialchars($sub['id']) . '">Buy Now</button>
                </div>
            </div>';
    }

    echo '</div></section>';
} else {
    echo "<p>No subs available at the moment.</p>";
}
?>


<h1>Subscription Statistics</h1>
<canvas id="subscriptionChart"></canvas>
<style>
    #subscriptionChart {
        width: 200px;   /* Set the width */
        height: 200px;  /* Set the height */
    }
</style>

<div id="buyModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Subscribe</h2>
        <form id="buyform"  method="POST" action="submit_sub.php">
        <input type="hidden" name="subscription_type" id="subscription_type">
            <div class="form-group">
                <label for="first_name">Name:</label>
                <input type="text" id="first_name" name="first_name" class="form-control">
                <span class="error-message" id="first_name-error"></span> <!-- Error message for Nom -->
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" class="form-control">
                <span class="error-message" id="last_name-error"></span> <!-- Error message for Prénom -->
            </div>
            <div class="form-group">
                <label for="phone">Phone :</label>
                <input type="text" id="phone" name="phone" class="form-control">
                <span class="error-message" id="phone-error"></span> 
            </div>
            <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" class="form-control" >
    <span class="error-message" id="email-error"></span> <!-- Error message for Email -->
</div>
            <div class="form-group">
                <label for="subname">Subscription Name :</label>
                <input type="text" id="subname" name="subname" readonly>
            </div>
            <div class="form-group">
                <label for="subprice">Price of Subscription :</label>
                <input type="text" id="subprice" name="subprice" readonly>
            </div>
			<div class="form-group">
				<label for="paymentmethod">Payment Method :</label>
				<select name="paymentmethod" id="paymentmethod">
					<option value="visa">visa</option>
					<option value="masetercard">mastercard</option>
					<option value="edinar">edinar</option>
				</select>
			</div>

            <button type="submit" class="btn">Buy Now </button>
        </form>
    </div>
</div>
<script>
// Modal and Button Elements
const buyModal = document.getElementById("buyModal");
const btns = document.querySelectorAll(".btn-reserve-now");
const closeBtn = document.querySelector(".close-btn");

// Open Modal and Set Details
btns.forEach(function (btn) {
    btn.addEventListener("click", function () {
        const subname = this.getAttribute("data-sub-name");
        const subprice = this.getAttribute("data-sub-price");
        const subid = this.getAttribute("data-sub-id");

        // Set the subscription details in the modal
        document.getElementById("subname").value = subname;
        document.getElementById("subprice").value = subprice;
        document.getElementById("subscription_type").value = subid;

        // Show the modal
        buyModal.style.display = "block";
        document.body.classList.add("modal-open"); // Prevent background scrolling
    });
});

// Close Modal
closeBtn.addEventListener("click", closeModal);

window.addEventListener("click", function (event) {
    if (event.target === buyModal) {
        closeModal();
    }
});

// Form Validation and Submission
document.getElementById("buyform").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default form submission

    // Clear previous error messages
    const errorMessages = document.querySelectorAll(".error-message");
    errorMessages.forEach((error) => {
        error.textContent = "";
    });

    let isValid = true;

    // Form fields
    const first_name = document.getElementById("first_name").value.trim();
    const last_name = document.getElementById("last_name").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const email = document.getElementById("email").value.trim();
    const paymentmethod = document.getElementById("paymentmethod").value;

    // Validation Regex
    const nameRegex = /^[A-Za-zÀ-ÿ\s]+$/;
    const phoneRegex = /^[0-9]+$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Validate First Name
    if (!first_name || first_name.length < 1 || first_name.length > 50 || !nameRegex.test(first_name)) {
        document.getElementById("first_name-error").textContent = "First name should be 1-50 characters and contain no special characters.";
        isValid = false;
    }

    // Validate Last Name
    if (!last_name || last_name.length < 1 || last_name.length > 50 || !nameRegex.test(last_name)) {
        document.getElementById("last_name-error").textContent = "Last name should be 1-50 characters and contain no special characters.";
        isValid = false;
    }

    // Validate Phone
    if (!phone || !phoneRegex.test(phone)) {
        document.getElementById("phone-error").textContent = "Phone should contain only numeric values.";
        isValid = false;
    }

    // Validate Email
    if (!email || !emailRegex.test(email)) {
        document.getElementById("email-error").textContent = "Please enter a valid email address.";
        isValid = false;
    }

      // Handle Form Submission
      if (isValid) {
        const formData = new FormData(document.getElementById("buyform"));

        fetch("submit_sub.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    // SweetAlert2 Success Notification with custom size
                    Swal.fire({
                        icon: "success",
                        title: "Subscription Successful",
                        text: "Thank you for your purchase! Your subscription has been confirmed. We've sent you an email ,Please check your inbox .",
                        confirmButtonText: "OK",
                        customClass: {
                            popup: 'swal-large', // Custom class to make it larger
                        },
                        willClose: () => {
                            closeModal(); // Close the modal
                            location.reload(); // Optionally reload the page or redirect
                        }
                    });
                } else {
                    // SweetAlert2 Error Notification with custom size
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: data.message || "An error occurred while processing your subscription.",
                        customClass: {
                            popup: 'swal-large', // Custom class to make it larger
                        }
                    });
                }
            })
            .catch((error) => {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "An error occurred while processing your request. Please try again later.",
                    customClass: {
                        popup: 'swal-large', // Custom class to make it larger
                    }
                });
            });
    }
});

// Close Modal Function
function closeModal() {
    buyModal.style.display = "none";
    document.body.classList.remove("modal-open"); // Re-enable background scrolling
}

// Chart.js Integration
const subscriptionsWithPercentage = <?php echo json_encode($subscriptionsWithPercentage); ?>;

// Extract data
const SubscriptionName = subscriptionsWithPercentage.map((sub) => sub.SubscriptionName);
const subscriptionPercentages = subscriptionsWithPercentage.map((sub) => sub.percentage);

// Create Chart
const ctx = document.getElementById("subscriptionChart").getContext("2d");
const subscriptionChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: SubscriptionName,
        datasets: [
            {
                label: "Subscription Type Percentage",
                data: subscriptionPercentages,
                backgroundColor: ["#c7b771", "#88c771", "#718fc7", "#8b54ab", "#ab546e"],
            },
        ],
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: "top",
            },
            tooltip: {
                callbacks: {
                    label: function (tooltipItem) {
                        return tooltipItem.label + ": " + tooltipItem.raw.toFixed(2) + "%";
                    },
                },
            },
        },
    },
});

// Currency Conversion
document.addEventListener("DOMContentLoaded", function () {
    const currencySelector = document.getElementById("currency-selector");
    const priceElements = document.querySelectorAll(".price");

    currencySelector.addEventListener("change", function () {
        const selectedCurrency = currencySelector.value;

        fetch(`fetch_conversion_rates.php?currency=${selectedCurrency}`)
            .then((response) => response.json())
            .then((data) => {
                if (data.rate) {
                    updatePrices(data.rate, priceElements);
                } else {
                    console.error("Currency conversion error");
                }
            })
            .catch((error) => console.error("Error fetching currency rate:", error));
    });

    function updatePrices(rate, elements) {
        elements.forEach((el) => {
            const originalPrice = parseFloat(el.dataset.price);
            const convertedPrice = (originalPrice * rate).toFixed(2);
            el.textContent = `${convertedPrice} ${currencySelector.value}`;
        });
    }
});
</script>
</body>
</html>