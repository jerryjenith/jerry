<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "jerryjenithj@gmail.com"; // change to your email
    $subject = "New Contact Form Submission";

    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
} else {
    // Prevent direct access
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
