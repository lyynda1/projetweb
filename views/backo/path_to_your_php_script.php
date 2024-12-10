<?php
// path_to_your_php_script.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Include your classes (EvenementsC, Evenements)
    require_once $_SERVER['DOCUMENT_ROOT'] . '/subs_project/config.php';
    require_once('../../model/AvailableSubscription.php');
    require_once('../../controllers/AvailableSubscriptionC.php');

    // Handle image upload
    $image_path = null; // Default to null in case no image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "../../uploads/"; // Directory to save images (adjust path as needed)
        $image_path = uniqid() . "_" . basename($_FILES['image']['name']); // Unique file name
        $targetFilePath = $targetDir . $image_path;

        // Create the directory if it doesn't exist
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Move the uploaded file
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            echo json_encode(['success' => false, 'message' => 'Error uploading image.']);
            exit; // Stop further processing
        }
    }

    // Create an instance of Evenements and EvenementsC to save the data
    $AvailableSubscription = new AvailableSubscription(null, $name, $description, $price,$image_path);
    $controller = new AvailableSubscriptionC();
    $controller->addAvailableSubscription($AvailableSubscription);

    // Send a JSON response
    echo json_encode(['success' => true]);  // Send a success response
}
?>
