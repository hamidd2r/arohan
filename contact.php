<?php

if (isset($_POST['submit'])) {
    
    $to = $_POST['email']; // this is your Email address
    $from = 'ali.hamid161999@gmail.com'; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact = $_POST['contact'];

    $subject = 'Form submission';
    $subject2 = 'Copy of your form submission';
    $message =
        $first_name .
        ' ' .
        $last_name .
        ' wrote the following:' .
        "\n\n" .
        $contact .
        '\n\n ' .
        $_POST['message'];
    $message2 =
        'Here is a copy of your message ' .
        $first_name .
        "\n\n" .
        $_POST['message'];

    $headers = 'From:' . $from;
    $headers2 = 'From:' . $to;
    mail($to, $subject, $message, $headers);
    mail($from, $subject2, $message2, $headers2); // sends a copy of the message to the sender
    //echo 'Mail Sent. Thank you ' .$first_name .', we will contact you shortly.';
    echo '<script>alert("Mail Sent. Thank you ' .$first_name .', we will contact you shortly.")</script>';
    header('Location:contact.html'); 
}
?>
