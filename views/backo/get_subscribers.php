<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/subs_project/config.php';

header('Content-Type: application/json');

// Fetch subscribers from database
try {
    $db = config::getConnexion();
    $sql = "SELECT id, first_name, last_name FROM subscriptions";
    $query = $db->prepare($sql);
    $query->execute();
    
    $subscribers = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['success' => true, 'subscribers' => $subscribers]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
