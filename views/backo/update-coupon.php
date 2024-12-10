<?php
require_once('../../config.php');// Ensure the correct path to Config.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data
    $id = $_POST['id'] ?? null;
    $discountPercentage = $_POST['discount_percentage'] ?? null;
    $expiryDate = $_POST['expiry_date'] ?? null;

    // Validate input
    if ($id && $discountPercentage && $expiryDate) {
        try {
            // Get database connection
            $pdo = Config::getConnexion();

            // Prepare the SQL query
            $sql = "UPDATE coupons SET discount_percentage = :discountPercentage, expiry_date = :expiryDate WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':discountPercentage', $discountPercentage, PDO::PARAM_INT);
            $stmt->bindParam(':expiryDate', $expiryDate);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Execute the query
            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Coupon updated successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to update coupon']);
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
