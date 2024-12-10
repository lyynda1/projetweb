<?php
require_once('../../config.php');
require_once('../../controllers/AvailableSubscriptionC.php');
require_once('../../controllers/subscriptionC.php');
require_once('../../controllers/CouponC.php');
$subscriptionC = new SubscriptionC();
$subscription = $subscriptionC->getAllSubscriptions();
  // Replace with the actual method to fetch all coupons
  $error = "";
  $coupon= null;
  $couponC = new CouponC();
if (
    isset($_POST["code"]) &&$_POST["subscription_id"] && $_POST["discount_percentage"]&& $_POST["expiry_date"]
) {
    if (!empty($_POST["code"])  &&!empty($_POST["subscription_id"])  && !empty($_POST["discount_percentage"])&& !empty($_POST["expiry_date"])
        ) {
            $Coupon = new Coupon(
                null,
                $_POST['code'],
                $_POST['subscription_id'],
                $_POST['discount_percentage'],
                $_POST['expiry_date'],
                
            );
            //
                
            $CouponC->addCoupon($Coupon);

    
           
        } else
            $error = "Missing information";
    }



  
$coupons = $couponC->getAllCoupons();


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="subscriptionindex.php" class="nav-item nav-link active"><i class="fa fa-tags me-2"></i>subscriptions</a>
                    <a href="coupongestionindex.php" class="nav-item nav-link active"><i class="fa fa-tags me-2"></i>Coupons</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Coupon Management Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-8">
                        <h3 class="mb-4">Create New Coupon</h3>
                        <form action="submit_coupon.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="code">Coupon Code (Auto Generated)</label>
                                <input type="text" id="code" name="code" class="form-control" value="<?php echo strtoupper(substr(md5(rand()), 0, 4)); ?>" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="subscription_id">Subscriber</label>
                                <select name="subscription_id" id="subscription_id" class="form-control" required>
                                    <option value="">Select Subscriber</option>
                                    <?php foreach ($subscription as $sub) { ?>
                                        <option value="<?php echo $sub['id']; ?>"><?php echo $sub['first_name'] . ' ' . $sub['last_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="discount_percentage">Discount Percentage</label>
                                <input type="number" id="discount_percentage" name="discount_percentage" class="form-control" required min="1" max="100">
                            </div>

                            <div class="form-group mb-3">
                                <label for="expiry_date">Expiry Date</label>
                                <input type="date" id="expiry_date" name="expiry_date" class="form-control" required>
                            </div>

                            <input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">

                            <button type="submit" class="btn btn-primary">Create Coupon</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Coupon Management End -->

         <!-- Existing Coupons Table -->
<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col">
            <h3>Existing Coupons</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Subscriber ID</th>
                        <th>Discount (%)</th>
                        <th>Expiry Date</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($coupons as $coupon) { ?>
                        <tr>
                            <td><?php echo $coupon['id']; ?></td>
                            <td><?php echo $coupon['code']; ?></td>
                            <td><?php echo $coupon['subscription_id']; ?></td>
                            <td><?php echo $coupon['discount_percentage']; ?>%</td>
                            <td><?php echo $coupon['expiry_date']; ?></td>
                            <td><?php echo $coupon['created_at']; ?></td>
                            <td>
                                <!-- Edit Button to Open Modal -->
                                <button class="btn btn-warning" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editCouponModal" 
                                        onclick="populateModal(<?php echo htmlspecialchars(json_encode($coupon)); ?>)">
                                    Edit
                                </button>
                                <!-- Delete Button -->
    <button class="btn btn-danger" onclick="deleteCoupon(<?php echo $coupon['id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Coupon Modal -->
<div class="modal fade" id="editCouponModal" tabindex="-1" aria-labelledby="editCouponModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCouponModalLabel">Edit Coupon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCouponForm">
                    <input type="hidden" id="editCouponId">
                    <div class="mb-3">
                        <label for="editDiscountPercentage" class="form-label">Discount Percentage</label>
                        <input type="number" class="form-control" id="editDiscountPercentage" min="1" max="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="editExpiryDate" class="form-label">Expiry Date</label>
                        <input type="date" class="form-control" id="editExpiryDate" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" onclick="saveCouponChanges()">Save Changes</button>
            </div>
        </div>
    </div>
</div>
<script>
function deleteCoupon(couponId) {
    if (confirm("Are you sure you want to delete this coupon?")) {
        // Make an AJAX request to delete-coupon.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete-coupon.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    // Remove the coupon row from the table
                    document.getElementById("coupon-row-" + couponId).remove();
                    alert(response.message);
                    header("Location: coupongestion.php");
                } else {
                    alert("Error: " + response.message);
                }
            }
        };
        xhr.send("id=" + couponId);
    }
}
</script>

<script>
function populateModal(coupon) {
    // Populate the modal fields with the selected coupon's data
    document.getElementById('editCouponId').value = coupon.id;
    document.getElementById('editDiscountPercentage').value = coupon.discount_percentage;
    document.getElementById('editExpiryDate').value = coupon.expiry_date;
}

function saveCouponChanges() {
    // Get values from the modal
    const couponId = document.getElementById('editCouponId').value;
    const discountPercentage = document.getElementById('editDiscountPercentage').value;
    const expiryDate = document.getElementById('editExpiryDate').value;

    // Make an AJAX request to update the coupon
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "update-coupon.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle success
            location.reload(); // Reload the page to reflect changes
        }
    };
    xhr.send(
        "id=" + couponId + 
        "&discount_percentage=" + discountPercentage + 
        "&expiry_date=" + expiryDate
    );
}
</script>

<!-- Existing Coupons Table End -->

            <!-- Existing Coupons Table End -->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
    </div>
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
