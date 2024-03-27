<?php
session_start(); 
	require_once('config.php');

	function loginUser($pdo){
		if(isset($_POST['loginform'])){
			$uname = $_POST['email'];
			$pass = $_POST['psw'];
		
			if(empty($uname)||empty($pass)){
					?>
						<div class="row">
							<div class="col-md-12">
								<div class="alert alert-danger">
									<div class = "text-center">Provide username and password to continue</div>
								</div>
							</div>
						</div>
					<?php
			}else{
				$encpass = hash('sha256', $pass);
				$params = array($uname, $encpass);
				$sql = "SELECT * FROM tbl_users WHERE username = ? AND password = ?";
				$stmt = $pdo -> prepare($sql);
				$stmt -> execute($params);
				$count = $stmt -> rowCount();
				if($count > 0){
					$row = $stmt -> fetch();
					$userid = $row['user_id'];
					$_SESSION['uid'] = $userid;
					?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-success">
								<div class = "text-center">Login successful, please wait...</div>
							</div>
						</div>
					</div>
				<?php
				header('Refresh:3; url=dashboard.php');
				}else{
				?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-danger">
								<div class = "text-center">Invalid username or password, try again</div>
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
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="REGI_LOGIN.css">
</head>
<body>
	
	
	<form id="loginform" class="form-registration" method="post" action="sign-in.php">
  <h1 style="text-align: center;">LOGIN</h1>

  <label for="email"><b>Email</b></label>
  <input type="text" placeholder="Enter Email" name="email" required>


  <label for="psw"><b>Enter Password</b></label>
  <input type="password" placeholder="Enter Password" name="psw" required>

  
  <button type="submit" class="btn" on>login</button>
  <button type="button" class="btn cancel" >Cancel</button>
</form>




</body>
<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/fontawesome/js/all.min.js"></script>
</html>


