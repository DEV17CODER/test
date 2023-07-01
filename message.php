<?php
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $website = isset($_POST['website']) ? htmlspecialchars($_POST['website']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    if (!empty($email) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $receiver = "17devrajparmar@gmail.com";
            $subject = "From: $name <$email>";
            $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\n\nMessage:\n$message\n\nRegards,\n$name";
            $sender = "From: $email";

            // Validate and sanitize sender
            $sender = filter_var($sender, FILTER_SANITIZE_STRING);

            // Validate and sanitize other fields if necessary

            // Validate and sanitize message for rendering
            $message = nl2br($message);

            if (mail($receiver, $subject, $body, $sender)) {
                echo "Your message has been sent.";
            } else {
                echo "Sorry, failed to send your message!";
            }
        } else {
            echo "Enter a valid email address!";
        }
    } else {
        echo "Email and message fields are required!";
    }
?>
