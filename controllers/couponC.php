<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/subs_project/config.php';
require_once('../../model/Coupon.php');

class CouponC
{
    // Add a new coupon
    public function addCoupon($coupon)
{
    $sql = "INSERT INTO coupons (code, subscription_id, discount_percentage, expiry_date, created_at) 
            VALUES (:code, :subscription_id, :discount_percentage, :expiry_date, :created_at)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'code' => $coupon->getCode(),
            'subscription_id' => $coupon->getSubscriptionId(),
            'discount_percentage' => $coupon->getDiscountPercentage(),
            'expiry_date' => $coupon->getExpiryDate(),
            'created_at' => $coupon->getCreatedAt()
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    // Get all coupons
    public function getAllCoupons()
    {
        $sql = "SELECT * FROM coupons";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>
