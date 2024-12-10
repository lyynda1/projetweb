<?php
// submit_sub.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../../config.php';
require_once '../../model/Subscription.php';
require_once '../../controllers/SubscriptionC.php';

// Include PHPMailer
require '../../vendor/autoload.php'; // Adjust path based on your PHPMailer setup

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data exactly as in the modal and database
    $first_name = $_POST['first_name']; 
    $last_name = $_POST['last_name'];   
    $email = $_POST['email'];         
    $phone = $_POST['phone'];        
    $subscription_type = $_POST['subscription_type']; 
    $prix = $_POST['subprice'];
    $SubscriptionName = $_POST['subname'];
    $payment_method = $_POST['paymentmethod'];
    $PhoneNumber = "21656864499";  

    // Set the created_at and expiry_date fields
    $created_at = date('Y-m-d H:i:s'); // Current timestamp for created_at
    $expiry_date = date('Y-m-d H:i:s', strtotime('+1 month', strtotime($created_at))); // 1 month added to created_at

    // Insert the subscription into the database
    $subscription = new Subscription(null,$first_name, $last_name, $email, $phone,$SubscriptionName, $subscription_type,$prix,  $payment_method, $created_at, $expiry_date);
    $subscriptionC = new SubscriptionC();
    $result = $subscriptionC->addSubscription($subscription);

    if ($result['success']) {
        // Send confirmation email
        $mail = new PHPMailer(true);

        try {
            // Email server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'rayensassi1235@gmail.com';
            $mail->Password = 'cnmg iasc jjsr dpqe'; // Use an app password if required
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipient settings
            $mail->setFrom('your-email@gmail.com', 'Kanzi');
            $mail->addAddress($email, "$first_name $last_name");

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Subscription Confirmation';
            $mail->Body = "
                <h1>Subscription Confirmed</h1>
                <p>Dear $first_name $last_name,</p>
                <p>Your subscription to <strong>$SubscriptionName</strong> has been confirmed.</p>
                <p>Payment Method: $payment_method</p>
                <p>Start Date: $created_at</p>
                <p>Expiry Date: $expiry_date </p>
                <p>Thank you for choosing us!</p>
                <p>Best regards,<br>Kanzi</p>
            ";

            $mail->send();

        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Subscription saved, but email could not be sent. Error: ' . $mail->ErrorInfo]);
            exit;
        }

        // Send SMS notification
        $smsMessage = [
            "messages" => [
                [
                    "destinations" => [["to" => $PhoneNumber]],
                    "from" => "Kanzi",
                    "text" => "Hey Admin , We want to inform that  $first_name $last_name just subscribed to  $SubscriptionName."
                ]
            ]
        ];

        $smsHeaders = [
            "Authorization: App e2b8dd6c044e01297ab3f2331816f7e1-ee95f681-88cb-4aab-a2d8-85a52cc72ad6", // Replace with your API key
            "Content-Type: application/json",
            "Accept: application/json"
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://1g3x4n.api.infobip.com/sms/2/text/advanced");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($smsMessage));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $smsHeaders);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $smsResponse = curl_exec($ch);
        $smsError = curl_error($ch);
        curl_close($ch);

        if ($smsError) {
            echo json_encode(['success' => false, 'message' => 'Subscription saved, but SMS could not be sent. Error: ' . $smsError]);
        } else {
            echo json_encode(['success' => true]);
        }

    } else {
        echo json_encode(['success' => false, 'message' => 'Subscription failed: ' . $result['message']]);
    }
}
?>
