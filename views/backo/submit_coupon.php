<?php
// Include necessary files
require_once '../../config.php';  // Database connection
require_once '../../controllers/couponC.php';  // Controller for handling coupon logic
require_once '../../model/coupon.php';  // Model for Coupon

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $subscription_id = $_POST['subscription_id'];  // Subscription ID selected
    $discount_percentage = $_POST['discount_percentage'];
    $expiry_date = $_POST['expiry_date'];
    $created_at = date('Y-m-d H:i:s');  // Get current timestamp

    // Validate inputs (example validation, you can customize it)
    if (empty($subscription_id) || empty($discount_percentage) || empty($expiry_date)) {
        echo "Please fill in all fields.";
        exit();
    }

    // Create an instance of Coupon model (code is generated automatically)
    $coupon = new Coupon(null, $subscription_id, $discount_percentage, $expiry_date, $created_at);

    // Create an instance of CouponC controller
    $couponC = new CouponC();
    
    // Call addCoupon method to insert the coupon into the database
    $couponC->addCoupon($coupon);

    // Redirect to another page (e.g., coupons list or confirmation page)
    header("Location: coupongestionindex.php?success=1");
    exit();
}
?>
