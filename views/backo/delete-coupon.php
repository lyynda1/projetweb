<?php
require_once '../../config.php'; // Ensure the correct path to Config.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if ($id) {
        try {
            // Get database connection
            $pdo = Config::getConnexion();

            // Prepare the DELETE query
            $sql = "DELETE FROM coupons WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Execute the query
            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Coupon deleted successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to delete coupon']);
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid coupon ID']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
