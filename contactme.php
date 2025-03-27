<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // ✅ Receiver email address (replace with your actual email)
    $to = "your-email@example.com";
    
    // ✅ Email subject
    $subject = "New Contact Form Submission from $name";

    // ✅ Email body
    $body = "
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong><br>$message</p>
    ";

    // ✅ Headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    // ✅ Send Email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>
                alert('✅ Message sent successfully!');
                window.location.href = './index.html';
              </script>";
    } else {
        echo "<script>
                alert('❌ Error sending message. Please try again!');
                window.location.href = './index.html';
              </script>";
    }
}
