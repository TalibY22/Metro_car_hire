<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $carType = $_POST['carType'];
    $pickupDate = $_POST['pickupDate'];
    $returnDate = $_POST['returnDate'];


    $to = $email;
    $subject = "Booking Confirmation";
    $message = "Thank you for booking a $carType with Metro Car Hire!\n\n";
    $message .= "Booking Details:\n";
    $message .= "Full Name: $fullName\n";
    $message .= "Email: $email\n";
    $message .= "Phone Number: $phone\n";
    $message .= "Car Type: $carType\n";
    $message .= "Pickup Date: $pickupDate\n";
    $message .= "Return Date: $returnDate\n";

    
    $headers = "From: yakubtalib70@gmail.com";
    if (mail($to, $subject, $message, $headers)) {
        echo "Booking successful. Confirmation email has been sent.";
    } else {
        echo "Failed to send confirmation email. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
