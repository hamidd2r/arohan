<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['submit'])) {

    //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.zoho.in';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'vineet.kumar@d2rtech.com';                     //SMTP username
    $mail->Password   = 'Roshni12345@';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('vineet.kumar@d2rtech.com', 'Mailer');
    $mail->addAddress('vineet.patel907@gmail.com', 'vineet');
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact = $_POST['contact'];
    $message = $_POST['message'];

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Form submission';
    $mail->Body    = 'First Name:'.$first_name ."<br> Last Name:".$last_name."<br> Contact:".$contact ."<br> Email:".$email."<br>Message :".$message;

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send(); 
    echo '<script>alert("Mail Sent. Thank you ' .$first_name .', we will contact you shortly.");</script>';
    echo "<script> window.location.href='contact.html'; </script>";
} catch (Exception $e) {
    echo '<script>alert("Message could not be sent. Mailer Error:' .$mail->ErrorInfo.'");</script>';
    echo "<script> window.location.href='contact.html'; </script>";
}

}
?>
