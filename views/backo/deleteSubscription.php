<?php
// deleteSubscription.php

require_once('../../config.php');

// Check if the subscription id is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the DELETE query
    $db = config::getConnexion();
    $sql = "DELETE FROM subscriptions WHERE id = :id";
    $query = $db->prepare($sql);

    // Execute the query
    try {
        $query->execute(['id' => $id]);

        // If the query executes successfully, return a success message
        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'ID not provided']);
}
?>
