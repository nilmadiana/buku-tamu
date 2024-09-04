<?php
$status = $this->session->userdata("status");
if (isset($status) == "login") {
	redirect('beranda');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>SIBUK</title>
	<link href="<?= base_url() ?>assets/dist/img/balaikotamalang.jpg" rel="icon">
	<link href="<?= base_url() ?>assets/dist/img/balaikotamalang.jpg" rel="apple-touch-icon">
	<link href="<?= base_url() ?>assets/dist/css/login.css" rel="stylesheet">
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework" />

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- vector map CSS -->
	<link href="./assets/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css" />



	<!-- Custom CSS -->
	<link href="./assets/dist/css/login.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="bg-box" style="width: 100%;
	height: 100%;
	background: url(./assets/dist/img/balaikotamalang.jpg) center fixed;
	background-size: cover;
	position: fixed;
	z-index: -1;
	opacity: .3;"></div>
	<div class="wrapper fadeInDown">
		<div id="formContent">
			<!-- Tabs Titles -->

			<!-- Icon -->
			<div class="fadeIn first py-3">
				<img src="./assets/dist/img/logo_sibuk5.png" id="icon" alt="User Icon" style="width: 10%;" />
			</div>
			<div class="fadeIn first">
				<h2>Masuk ke SIBUK</h2>
			</div>
			<div class="fadeIn first text-center py-2 px-2">
				<span>masukkan username dan password anda</span>
			</div>

			<!-- Login Form -->
			<form action="login/aksi_login" method="post">
				<input type="text" id="username" class="fadeIn second" name="username" placeholder="login">
				<input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
				<button type="submit" name="submit" class="btn btn-primary btn-rounded">Masuk</button>
			</form>

			<!-- Remind Passowrd -->
			<div id="formFooter">
				<a class="underlineHover" href="#">Forgot Password?</a>
			</div>

		</div>
	</div>
	<!--  Footer -->
	<footer id="footer">
		<div class="text-center">
			<div class="containerr py-2">
				<div class="justify-content-center">
					<h6>&copy; 2021 Copyright <strong>Pemerintahan Kota Malang</strong>. All Rights
						Reserved</h6>

				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer -->



	<!-- /Row -->

	</div>
	<!-- /Main Content -->



	</div>
	<!-- /#wrapper -->

	<!-- JavaScript -->

	<!-- jQuery -->
	<script src="./assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="./assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="./assets/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

	<!-- Slimscroll JavaScript -->
	<script src="./assets/dist/js/jquery.slimscroll.js"></script>

	<!-- Init JavaScript -->
	<script src="./assets/dist/js/init.js"></script>
</body>

</html>