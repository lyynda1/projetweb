<?php
// getEventData.php

require_once('../../config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the query to fetch the event details
    $db = config::getConnexion();
    $sql = "SELECT * FROM available_subscriptions WHERE id = :id";
    $query = $db->prepare($sql);

    try {
        $query->execute(['id' => $id]);
        $sub = $query->fetch();

        // Return the event data as JSON
        if ($sub) {
            echo json_encode(['success' => true, 'sub' => $sub]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Event not found']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
?>
