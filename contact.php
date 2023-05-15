<?php 
//starting session with php before html
session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Email parameters
    $to = 'kamila.zdyb@gmail.com'; // Your email address here
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

    // Email body
    $body = "<p><strong>Name:</strong> $name</p>";
    $body .= "<p><strong>Email:</strong> $email</p>";
    $body .= "<p><strong>Subject:</strong> $subject</p>";
    $body .= "<p><strong>Message:</strong></p><p>$message</p>";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        header("Refresh:3; url=index.php");
        echo "<h4 class='text-center align-middle' style='color:red'>Dziękuję! Twoja wiadomość została wysłana.</h4>";
    } else {
        header("Refresh:3; url=index.php");
        echo "<h4 class='text-center align-middle' style='color:red'>Wystąpił błąd podczas wysyłania wiadomości. Spróbuj ponownie później.</h4>";
    }
}
?>