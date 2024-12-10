<?php
// GetSubscriptionData.php

require_once('../../config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id']; // Get the subscription ID value from the query string

    // Prepare and execute the query to fetch the subscription details
    $db = config::getConnexion();
    $sql = "SELECT * FROM subscriptions WHERE id = :id";
    $query = $db->prepare($sql);

    try {
        $query->execute(['id' => $id]);
        $subscription = $query->fetch();

        // Return the subscription data as JSON
        if ($subscription) {
            echo json_encode(['success' => true, 'subscription' => $subscription]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Subscription not found']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
?>
