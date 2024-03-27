<?php 
	require_once('config.php');
	function insertUser($pdo, $uname, $encpass){
		$sql = "INSERT INTO tbl_users (username, password) VALUES (?,?)";
		$stmt = $pdo -> prepare($sql);
		$stmt ->execute([$uname, $encpass]);
	}
	function getUserID($pdo){
		$uid = 0;
		$sql = "SELECT MAX(user_id) AS uid FROM tbl_users";
		$stmt = $pdo -> prepare($sql);
		$stmt -> execute();
		$row = $stmt -> fetch();
		$uid = $row['uid'];

		return $uid;
	}
	function registerUser($pdo){
		if(isset($_POST['signup'])){
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$dob = $_POST['dob'];
			$gender = $_POST['gender'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$town = $_POST['town'];
			$uname = $_POST['uname'];
			$pass = $_POST['pass'];
			$cpass = $_POST['cpass'];
			$regdate = date('d/m/Y H:m:i');
			$status = "Active";

			if(empty($fname)||empty($lname)||empty($dob)||empty($gender)||empty($phone)|| $email == ""||$town ==""||$uname ==""||$pass ==""||$cpass ==""){
					?>
						<div class="row">
							<div class="col-md-12">
								<div class="alert alert-danger">
									<div class = "text-center">Fill all blank fields</div>
								</div>
							</div>
						</div>
					<?php
			}else if($pass != $cpass){
				?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-danger">
								<div class = "text-center">Passwords do not match</div>
							</div>
						</div>
					</div>
				<?php
			}else{
				$encpass = hash('sha256', $pass);
				insertUser($pdo, $uname, $encpass);
				$userid = getUserID($pdo);
				$params = array($userid, $fname, $lname, $dob, $gender, $phone, $email, $town, $status, $regdate);
				$sql = "INSERT INTO tbl_customer (user_id, fname, lname, dob, gender, phone, email, town, status, regdate) VALUES(?,?,?,?,?,?,?,?,?,?)";
				$stmt = $pdo -> prepare($sql);
				$stmt -> execute($params);
				if($stmt){
					?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-success">
								<div class = "text-center">Your account has been created successfully</div>
							</div>
						</div>
					</div>
				<?php
				}else{
				?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-danger">
								<div class = "text-center">There was a problem creating your account. Please try again later</div>
							</div>
						</div>
					</div>
				<?php
				}
			}

		}
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up : : Mash Poa Bus Booking System</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="REGI_LOGIN.css">
</head>
<body>
	
	
	
	<form id="myForm2" class="form-registration" method="post">
  <h1 style="text-align: center;">Register</h1>
   
  <label>First Name:</label>
 <input class="form-control" type="text" name="fname">
<label>Last Name:</label>
					<input class="form-control" type="text" name="lname">
					<label>Date of Birth:</label>
					<input class="form-control" type="date" name="dob">
					<label>Gender:</label>
					<select class="form-control" name="gender">
						<option>Select Gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
					<label>Phone Number:</label>
					<input class="form-control" type="text" name="phone">
					<label>Email:</label>
					<input class="form-control" type="email" name="email">
					<label>Town/City:</label>
					<input class="form-control" type="text" name="town">

  <label for="email"><b>Email</b></label>
  <input type="email" placeholder="Enter Email" name="email" required>


  <label for="psw"><b>Enter Password</b></label>
  <input type="password" placeholder="Enter Password" name="psw" required>
  <button type="submit" class="btn" >Register</button>
  <button type="button" class="btn cancel">Cancel</button>
</form>





</body>
<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/fontawesome/js/all.min.js"></script>
</html>


