<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login | AKNS - Akademi Komunitas Negeri Sumenep</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- favicon
		============================================ -->
	<link rel="shortcut icon" type="image/x-icon" href="img/imac-icon.png">
	<!-- Google Fonts
		============================================ -->
	<link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
	<!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="Styleadmin/css/bootstrap.min.css">
	<!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="Styleadmin/css/font-awesome.min.css">
	<!-- owl.carousel CSS
		============================================ -->
	<link rel="stylesheet" href="Styleadmin/css/owl.carousel.css">
	<link rel="stylesheet" href="Styleadmin/css/owl.theme.css">
	<link rel="stylesheet" href="Styleadmin/css/owl.transitions.css">
	<!-- animate CSS
		============================================ -->
	<link rel="stylesheet" href="Styleadmin/css/animate.css">
	<!-- normalize CSS
		============================================ -->
	<link rel="stylesheet" href="Styleadmin/css/normalize.css">
	<!-- main CSS
		============================================ -->
	<link rel="stylesheet" href="Styleadmin/css/main.css">
	<!-- morrisjs CSS
		============================================ -->
	<link rel="stylesheet" href="Styleadmin/css/morrisjs/morris.css">
	<!-- mCustomScrollbar CSS
		============================================ -->
	<link rel="stylesheet" href="Styleadmin/css/scrollbar/jquery.mCustomScrollbar.min.css">
	<!-- metisMenu CSS
		============================================ -->
	<link rel="stylesheet" href="Styleadmin/css/metisMenu/metisMenu.min.css">
	<link rel="stylesheet" href="Styleadmin/css/metisMenu/metisMenu-vertical.css">
	<!-- calendar CSS
		============================================ -->
	<link rel="stylesheet" href="Styleadmin/css/calendar/fullcalendar.min.css">
	<link rel="stylesheet" href="Styleadmin/css/calendar/fullcalendar.print.min.css">
	<!-- forms CSS
		============================================ -->
	<link rel="stylesheet" href="Styleadmin/css/form/all-type-forms.css">
	<!-- style CSS
		============================================ -->
	<link rel="stylesheet" href="style.css">
	<!-- responsive CSS
		============================================ -->
	<link rel="stylesheet" href="Styleadmin/css/responsive.css">
	<!-- modernizr JS
		============================================ -->
	<script src="Styleadmin/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
	<?php include 'config/connection.php'; ?>
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>SELAMAT DATANG DI WEB ALUMNI A K N S</h3>
				<p>Silahkan login!</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
					<div class="panel-body">
						<form action="login.php" method="post" id="loginForm">
							<?php session_start();
							include 'config/funct.php';
							if (isset($_GET['daftar'])) {
								echo '<div class="alert alert-warning alert-mg-b alert-st-four" role="alert">
										<p class="message-mg-rt message-success-none"><strong>Wow!</strong> Daftar berhasil Silahkan Cek Email anda untuk mengaktifkan!</p>
									</div>';
							}
							if (isset($_GET['token'])) {
								echo '<div class="alert alert-success alert-mg-b alert-st-four" role="alert">
										<p class="message-mg-rt message-success-none"><strong>Wow!</strong> Email sudah diaktifkan Silahkan login!</p>
									</div>';
								updatedata("login", "isaktif='1'", "token='" . $_GET['token'] . "'");
							}
							if (isset($_GET['success'])) {
								echo '<div class="alert alert-success alert-mg-b alert-st-four" role="alert">
										<p class="message-mg-rt message-success-none">Recovery password sudah dikirim ke email , cek email anda dan login kembali</p>
									</div>';
							}

							if (isset($_POST['submit'])) {
								$username = $_POST['username'];
								$password = $_POST['password'];
								$sql = "SELECT * FROM login WHERE username='" . $username . "' AND password='" . $password . "' OR email='" . $username . "'";
								$query = mysqli_query($connect, $sql);
								$num = mysqli_num_rows($query);
								$data = mysqli_fetch_array($query);
								$error = array();
								if ($num > 0) {
									if ($data['level'] == 'Admin') {
										if ($data['isaktif'] == 0) {
											echo '<div class="alert alert-danger alert-mg-b alert-st-four" role="alert">
												<p class="message-mg-rt message-alert-none"><strong>Ops!</strong> Email anda belum aktif</p>
											</div>';
										} else {
											$_SESSION['kodeuser'] = $data['kodeuser'];
											$_SESSION['username'] = $data['username'];
											$_SESSION['level'] = $data['level'];
											$_SESSION['email'] = $data['email'];
											header('location:pages/admin/');
										}
									} else {
										if ($data['isaktif'] == 0) {
											echo '<div class="alert alert-danger alert-mg-b alert-st-four" role="alert">
												<p class="message-mg-rt message-alert-none"><strong>Ops!</strong> Email anda belum aktif</p>
											</div>';
										} else {
											$_SESSION['kodeuser'] = $data['kodeuser'];
											$_SESSION['username'] = $data['username'];
											$_SESSION['level'] = $data['level'];
											$_SESSION['email'] = $data['email'];
											header('location:profile.php');
										}
									}
								} elseif ($username == '') {
									$error['username'] = "* username tidak boleh kosong!";
								} elseif ($password == '') {
									$error['password'] = "* password tidak boleh kosong!";
								} else {
									echo '<div class="alert alert-danger alert-mg-b alert-st-four" role="alert">
										<p class="message-mg-rt message-alert-none"><strong>Ops!</strong> Username dan password salah!</p>
									</div>';
								}
							}
							?>
							<div class="form-group">
								<label class="control-label" for="username">Username</label>
								<input type="text" autocomplete="off" placeholder="Username / Email" title="Please enter you username" name="username" id="username" class="form-control">
								<span class="help-block small" style="color:#F00;"><?php echo isset($error['username']) ? $error['username'] : ''; ?></span>
							</div>
							<div class="form-group">
								<label class="control-label" for="password">Password</label>
								<input type="password" title="Please enter your password" placeholder="******" name="password" id="password" class="form-control form-password">
								<span class="help-block small" style="color:#F00;"><?php echo isset($error['password']) ? $error['password'] : ''; ?></span>
							</div>
							<input type="submit" name="submit" value="Log in" class="btn btn-success btn-block loginbtn">
							<a class="btn btn-warning btn-block" href="register.php">Belum punya akun ? Daftar Sekarang</a>
						</form>
					</div>
				</div>
			</div>
			<a href="password-recovery.php">Lupa password? klik disini</a>
			<div class="text-center login-footer">
				<p>Copyright © 2019. Alhamdi Ferdiawan Bahri</p>
			</div>
		</div>
	</div>
	<!-- bootstrap JS
		============================================ -->
	<script src="Styleadmin/js/bootstrap.min.js"></script>
	<!-- wow JS
		============================================ -->
	<script src="Styleadmin/js/wow.min.js"></script>
	<!-- price-slider JS
		============================================ -->
	<script src="Styleadmin/js/jquery-price-slider.js"></script>
	<!-- meanmenu JS
		============================================ -->
	<script src="Styleadmin/js/jquery.meanmenu.js"></script>
	<!-- owl.carousel JS
		============================================ -->
	<script src="Styleadmin/js/owl.carousel.min.js"></script>
	<!-- sticky JS
		============================================ -->
	<script src="Styleadmin/js/jquery.sticky.js"></script>
	<!-- scrollUp JS
		============================================ -->
	<script src="Styleadmin/js/jquery.scrollUp.min.js"></script>
	<!-- mCustomScrollbar JS
		============================================ -->
	<script src="Styleadmin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="Styleadmin/js/scrollbar/mCustomScrollbar-active.js"></script>
	<!-- metisMenu JS
		============================================ -->
	<script src="Styleadmin/js/metisMenu/metisMenu.min.js"></script>
	<script src="Styleadmin/js/metisMenu/metisMenu-active.js"></script>
	<!-- tab JS
		============================================ -->
	<script src="Styleadmin/js/tab.js"></script>
	<!-- icheck JS
		============================================ -->
	<script src="Styleadmin/js/icheck/icheck.min.js"></script>
	<script src="Styleadmin/js/icheck/icheck-active.js"></script>
	<!-- plugins JS
		============================================ -->
	<script src="Styleadmin/js/plugins.js"></script>
	<!-- main JS
		============================================ -->
	<script src="Styleadmin/js/main.js"></script>
</body>

</html>