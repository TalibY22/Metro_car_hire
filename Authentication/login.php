<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <script src="script.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="REGI_LOGIN.css">
    

</head>






<body>
<?php


function tfa($email){

  $code = mt_rand(100000, 999999);


  $_SESSION['tfa_code'] = $code;
  
  
  
  $subject = 'Two-Factor Authentication Code';
  $message = "Your authentication code is: {$code}";
  $headers = 'From: your-email@example.com' . "\r\n";
  
  if (mail($email, $subject, $message, $headers)) {
      echo "Authentication code sent to your email.";
  } else {
      echo "Failed to send authentication code.";
  }


}


//Need a way to implement 
function verify_tfa(){

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["tfa_code"])) {
        $user_entered_code = $_POST["tfa_code"];
        $stored_code = $_SESSION['tfa_code'];

        if ($user_entered_code == $stored_code) {
            
            echo "TFA code verification successful.";
            
        } else {
            
            echo "TFA code verification failed. Please try again.";
            
        }
    } else {
        echo "TFA code not entered.";
    }
}

}





include '/wdd/index.php';
$host = '127.0.0.1'; 
$username = 'root';
$password='';
$database = 'WEB';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
  echo "hy";
}
// prepare and bind
$stmt = $conn->prepare("SELECT * FROM USERS WHERE EMAIL=? AND PASSWORD=?");
$stmt->bind_param("ss", $_POST['email'], $_POST['psw']);

// Execute statement
$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // Successful login, redirect to index.php
    header("Location:WDD_DAVID/index.html");
    //echo "login succesfull";
    //$email = $_POST["email"];
    //tfa($email);
   // Make sure no other output is sent after this
} else {
    // Login failed
    echo "Login failed. Please check your credentials.";
}

$stmt->close();
$conn->close();
?>

<!-- The form -->
<form id="loginform" class="form-registration" method="post">
  <h1 style="text-align: center;">LOGIN</h1>

  <label for="email"><b>Email</b></label>
  <input type="text" placeholder="Enter Email" name="email" required>


  <label for="psw"><b>Enter Password</b></label>
  <input type="password" placeholder="Enter Password" name="psw" required>

  
  <button type="submit" class="btn" on>login</button>
  <button type="button" class="btn cancel" >Cancel</button>
</form>
</body>

</div>

</body>
</html>
