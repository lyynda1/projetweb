<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/PHPMailer/src/Exception.php';
require '/PHPMailer/src/PHPMailer.php';
require '/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$nom_client = $_POST['nom_client']; 
$email_client = $_POST['email_client'];
$date_reservation = $_POST['date_reservation'];

if(isset($_POST['submit_reservation'])){
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();    
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication


    //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->Username   = 'zanetinidhal@gmail.com';                     //SMTP username
    $mail->Password   = 'xxxxxxxxxxxx';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption ---ENCRYPTION_SMTPS
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('zanetinidhal@gmail.com', 'projet evenemet');
    $mail->addAddress('zanetinidhal@gmail.com', 'project reservation');     //Add a recipient



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'new requiery of web reservation form';
    $mail->Body    = '<h3>hello you got a new requiry</h3>
    <h4>nom_client:'.$nom_client.'</h4>
    <h4>email_client:'.$email_client.'</h4>
    <h4>date_reservation:'.$date_reservation.'</h4>    
    ';
    if($mail->send()){
        $_SESSION['status'] = "Reservation added successfully";
        header("location:{$_SERVER['HTTP_REFERER']}");
        exit(0);
    }
    else{
        $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header("location:{$_SERVER['HTTP_REFERER']}");
        exit(0);
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
else{
    header('location: reservation_form.php');
    exit(0);
}
?>