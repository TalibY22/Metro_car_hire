




<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="REGI_LOGIN.css">
</head>



















<body>

<?php
// Database credentials
$host = '127.0.0.1'; 
$username = 'root';
$password='';
$database = 'WEB';

// Create connection
$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$stmt = $conn->prepare("INSERT INTO USERS (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $_POST['email'], $_POST['psw']);


$stmt->execute();

if($stmt->affected_rows > 0) {
    echo "New user added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
<form id="myForm2" class="form-registration" method="post">
  <h1 style="text-align: center;">Register</h1>

  <label for="email"><b>Email</b></label>
  <input type="email" placeholder="Enter Email" name="email" required>
  <label for="email"><b>Enter ur name</b></label>
  <input type="email" placeholder="Enter Email" name="email" required>


  <label for="psw"><b>Enter Password</b></label>
  <input type="password" placeholder="Enter Password" name="psw" required>
  <button type="submit" class="btn" >Register</button>
  <button type="button" class="btn cancel">Cancel</button>
</form>
</body>




</html>
