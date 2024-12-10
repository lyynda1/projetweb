<?php
// updateEvent.php

require_once('../../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $ids = $_POST['editsubId'];
    $name = $_POST['editSubname'];
    $description = $_POST['editSubdescription'];
    $price = $_POST['editSubprice'];
    // Prepare the UPDATE query
    $db = config::getConnexion();
    $sql = "UPDATE available_subscriptions SET name = :name, description = :description, price = :price  WHERE id = :ids";
    $query = $db->prepare($sql);

    try {
        $query->execute([
            'ids' => $ids,
            'name' => $name,
            'description' => $description,
            'price' => $price,
        ]);

        // Return a success message
        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
?>
