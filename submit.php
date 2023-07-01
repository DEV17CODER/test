<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Here, you can perform any necessary processing or validation with the form data
    // For this example, we'll just send a simple email
    $to = "17devrajparmar@gmail.com";
    $subject = "New Contact Form Submission";
    $emailContent = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $emailContent, $headers)) {
        echo "Thank you for your message! We'll get back to you soon.";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>
