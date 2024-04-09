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
    ?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-success">
								<div class = "text-center">Not a good request </div>
							</div>
						</div>
					</div>
				<?php
    
}
?>



<!DOCTYPE HTML>
<html>
	<head>
		<title>Metro car hire</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload" >
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" >
						<div class="inner">

							<!-- Logo -->
								<a href="index.html" class="logo">
									<span class="fa fa-car"></span> <span class="title" >Metro car hire</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu" > 
						<h2>Menu</h2>
						<ul>
							<li><a href="index.html" class="active">Home</a></li>

							<li><a href="cars.html">Cars</a></li>
							<li><a href="about.html">About Us</a></li>
							<li><a href="Authentication/regi.php">SignUp</a></li>
							<li><a href="Authentication/login.php">Login</a></li>

							
							<li><a href="contact.html">Contact Us</a></li>
						</ul>
					</nav>
                    
                    
                    
                    
                    
                    <div class="container">
                        <h2 class="text-center mb-4">Book a Car</h2>
                        <form method="POST">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your full name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" placeholder="Enter phone number">
                            </div>
                            <div class="form-group">
                                <label for="carType">Car Type</label>
                                <select class="form-control" id="carType">
                                    <option>Sedan</option>
                                    <option>SUV</option>
                                    <option>Truck</option>
                                    <option>Van</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pickupDate">Pickup Date</label>
                                <input type="date" class="form-control" id="pickupDate">
                            </div>
                            <div class="form-group">
                                <label for="returnDate">Return Date</label>
                                <input type="date" class="form-control" id="returnDate">
                            </div>
                            <button type="submit" class="btn btn-dark btn-block">Submit</button>
                        </form>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <script src="assets/js/jquery.min.js"></script>
                    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <script src="assets/js/jquery.scrolly.min.js"></script>
                    <script src="assets/js/jquery.scrollex.min.js"></script>
                    <script src="assets/js/main.js"></script>
        
            </body>
        </html>