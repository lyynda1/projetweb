<?php
// updateSubscription.php

require_once('../../config.php');

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id']) && isset($data['expiry_date'])) {
    $id = $data['id'];
    $expiry_date = $data['expiry_date'];

    // Prepare the UPDATE query
    $db = config::getConnexion();
    $sql = "UPDATE subscriptions SET expiry_date = :expiry_date WHERE id = :id";
    $query = $db->prepare($sql);

    // Execute the query
    try {
        $query->execute(['id' => $id, 'expiry_date' => $expiry_date]);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Missing parameters']);
}
?>
