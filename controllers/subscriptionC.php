<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/subs_project/config.php';
require_once "../../model/Subscription.php";

class SubscriptionC
{
    public function addSubscription(Subscription $subscription): array
{
    $sql = "INSERT INTO subscriptions (first_name, last_name, email, phone, SubscriptionName, subscription_type, prix, payment_method, created_at, expiry_date) 
            VALUES (:first_name, :last_name, :email, :phone, :SubscriptionName, :subscription_type, :prix , :payment_method, :created_at, :expiry_date)";
    
    $db = Config::getConnexion(); // Get the database connection

    try {
        // Prepare the SQL query
        $query = $db->prepare($sql);
        
        // Execute the query with the subscription object values
        $query->execute([
            'first_name' => $subscription->getFirstName(),
            'last_name' => $subscription->getLastName(),
            'email' => $subscription->getEmail(),
            'phone' => $subscription->getPhone(),
            'SubscriptionName' => $subscription->getSubscriptionName(),
            'subscription_type' => $subscription->getSubscriptionType(),
            'prix' => $subscription->getPrix(),
            'payment_method' => $subscription->getPaymentMethod(),
            'created_at' => $subscription->getCreatedAt(),
            'expiry_date' => $subscription->getExpiryDate(),
        ]);

        // Return success if the subscription is inserted successfully
        return ['success' => true];
    } catch (Exception $e) {
        // Return failure and the error message if there's an exception
        return ['success' => false, 'message' => $e->getMessage()];
    }
}

    public function getAllSubscriptions() {
    $sql = "SELECT * FROM subscriptions";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll();  // Fetch all subscriptions and return them
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return [];  // Return an empty array in case of an error
    }
}
    public function getSubscriptionById($id)
{
    $sql = "SELECT * FROM available_subscriptions WHERE id = :id";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;  // Return subscription type if found
        }
        return false;  // Return false if not found
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
public function getTotalRevenue() {
    $sql = "SELECT SUM(prix) AS total_revenue FROM subscriptions";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        return $result['total_revenue']; // Return the sum of subscription prices
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return 0;  // Return 0 if there's an error
    }
}
public function getSubscriptionCounts() {
    $sql = "SELECT SubscriptionName, COUNT(*) AS subscription_count
            FROM subscriptions
            GROUP BY SubscriptionName";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll(); // Returns all subscription counts by type
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return [];  // Return an empty array in case of an error
    }
}


}
?>
