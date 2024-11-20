<?php

require 'connexion.php'; // Path to your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo '<pre>';
print_r($_POST);
echo '</pre>';

    // Retrieve and sanitize billing details from the form
    $firstname = isset($_POST['billing-first-name']) ? trim($_POST['billing-first-name']) : null;
    $lastname = isset($_POST['billing-last-name']) ? trim($_POST['billing-last-name']) : null;
    $email = isset($_POST['billing-email']) ? trim($_POST['billing-email']) : null;
    $phone = isset($_POST['billing-phone']) ? trim($_POST['billing-phone']) : null;
    $country = isset($_POST['country']) ? trim($_POST['country']) : null;
    $address = isset($_POST['billing-address-1']) ? trim($_POST['billing-address-1']) : null;
    $town = isset($_POST['billing-city']) ? trim($_POST['billing-city']) : null;
    $state = isset($_POST['billing-state']) ? trim($_POST['billing-state']) : null;
    $postcode = isset($_POST['billing-postcode']) ? trim($_POST['billing-postcode']) : null;
    $ordernotes = isset($_POST['billing-comments']) ? trim($_POST['billing-comments']) : null;

    // Optional fields (card details)
    $cardtype = isset($_POST['card-type']) ? $_POST['card-type'] : null;
    $cardnumber = isset($_POST[$cardtype . '-number']) ? $_POST[$cardtype . '-number'] : null;
    $expirydate = isset($_POST[$cardtype . '-expiry']) ? $_POST[$cardtype . '-expiry'] : null;
    $cvv = isset($_POST[$cardtype . '-cvv']) ? $_POST[$cardtype . '-cvv'] : null;

    try {
        // Check if the user already exists based on unique fields (e.g., email or phone)
        $checkSql = "SELECT id FROM `billing` WHERE email = :email OR phone = :phone";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bindParam(':email', $email);
        $checkStmt->bindParam(':phone', $phone);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            echo " <center> <h1 >User <span  style = color:red; >$firstname $lastname</span>  already exists in the database.</h1> <center >";
        } else {
            // Insert query
            $sql = "INSERT INTO `billing` (`firstname`, `lastname`, `email`, `phone`, `country`, `address`, `town`, `state`, `postcode`, `ordernotes`, `cardtype`, `cardnumber`, `cardexpiry`, `cvv`)
                    VALUES (:firstname, :lastname, :email, :phone, :country, :address, :town, :state, :postcode, :ordernotes, :cardtype, :cardnumber, :expirydate, :cvv)";

            // Prepare the statement
            $stmt = $conn->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':town', $town);
            $stmt->bindParam(':state', $state);
            $stmt->bindParam(':postcode', $postcode);
            $stmt->bindParam(':ordernotes', $ordernotes);

            // Bind optional card details
            $stmt->bindParam(':cardtype', $cardtype);
            $stmt->bindParam(':cardnumber', $cardnumber);
            $stmt->bindParam(':expirydate', $expirydate);
            $stmt->bindParam(':cvv', $cvv);

            // Execute the statement and check for success
            if ($stmt->execute()) {
                echo " <h1>Order placed successfully!</h1> ";
                // Optionally redirect
                // header('Location: success.php');
                // exit;
            } else {
                echo "Error: " . $stmt->errorInfo()[2]; // Debug error
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Debug PDO exception
    }

    // Close the database connection (optional)
    $conn = null;
}
?>
