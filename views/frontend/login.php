<?php
// session_start();
// error_reporting(0);
// include_once("includes/config.php");
// if($_SESSION['userlogin']>0){
// 	header('location:index.php');
// }elseif(isset($_POST['login'])){
// 	$_SESSION['userlogin'] = $_POST['username'];
// 	$username = htmlspecialchars($_POST['username']);
// 	$password = htmlspecialchars($_POST['password']);
// 	$sql = "SELECT user_name,password from user where user_name=:username";
// 	$query = $dbh->prepare($sql);
// 	$query->bindParam(':username',$username,PDO::PARAM_STR);
// 	$query-> execute();
// 	$results=$query->fetchAll(PDO::FETCH_OBJ);
// 	if($query->rowCount() > 0){
// 		foreach ($results as $row) {
// 			$hashpass=$row->Password;
// 		}//verifying Password
// 		if (password_verify($password, $hashpass)) {
// 			$_SESSION['userlogin']=$_POST['username'];
// 			echo "<script>window.location.href= 'index.php'; </script>";
// 		}
// 		else {
// 			$wrongpassword='
// 			<div class="alert alert-danger alert-dismissible fade show" role="alert">
// 			<strong>Oh Snapp!😕</strong> Alert <b class="alert-link">Password: </b>You entered wrong password.
// 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
// 				<span aria-hidden="true">&times;</span>
// 			</button>
// 			</div>';
// 		}
// 	}
// 	//if username or email not found in database
// 	else{
// 		$wrongusername='
// 		<div class="alert alert-danger alert-dismissible fade show" role="alert">
// 			<strong>Oh Snapp!🙃</strong> Alert <b class="alert-link">UserName: </b> You entered a wrong UserName.
// 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
// 				<span aria-hidden="true">&times;</span>
// 			</button>
// 		</div>';
// 	}
// }
// print_r($_POST);
session_start();
include "./includes/config.php";
if (isset($_POST['login']) == true) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	// if (empty($username)) {
	// 	array_push($errors, "Username is required");
	// }
	// if (empty($password)) {
	// 	array_push($errors, "Password is required");
	// }

	// echo "<p> $username $password</p>";
	$sql = "SELECT * FROM user where user_name ='$username' and password ='$password'";
	$query = mysqli_query($conn, $sql);
	$num_row = mysqli_num_rows($query);


	if ($num_row != 0) {
		$user = $query->fetch_array();
		$_SESSION['user_name'] = $user['user_name'];
		// $_SESSION['id']=$user['id'];
		// print_r($user);
		header("location:index.php?option=home.php");
		exit();
	} else {
		header("location:index.php");
		echo "Tài khoản hoặc mật khẩu không đúng";
		exit();
	}
	// $stmt ->execute([$username, $password]);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Login</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style1.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></scri>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="account-page">

	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<div class="account-content">
			<div class="container">
				<!-- Account Logo -->
				<div class="account-logo">
					<a href="index.php"><img src="assets/img/logo2.png" alt="Company Logo"></a>
				</div>
				<!-- /Account Logo -->

				<div class="account-box">
					<div class="account-wrapper">
						<h3 class="account-title">Đăng nhập</h3>
						<!-- Account Form -->
						<form method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label>Tên đăng nhập</label>
								<input class="form-control" name="username" required type="text">
							</div>
							<?php
							// if ($wrongusername) {
							// 	echo $wrongusername;
							// }
							?>
							<div class="form-group">
								<div class="row">
									<div class="col">
										<label>Mật khẩu</label>
									</div>
								</div>
								<input class="form-control" name="password" required type="password">
							</div>
							<?php
							// if ($wrongpassword) {
							// 	echo $wrongpassword;
							// }
							?>

							<div class="form-group text-center">
								<a href="index.php?option=home">
									<button class="btn btn-primary account-btn" name="login" type="submit">
										<!-- <a href="index.php?option=home.php"> -->
										Đăng nhập
										<!-- </a> -->
									</button>
								</a>
								<div class="col-auto pt-2">
									<a class="text-muted float-right" href="forgot-password.php">
										Quên mật khẩu?
									</a>
								</div>
							</div>


						</form>
						<!-- /Account Form -->

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>

</body>

</html>