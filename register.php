<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Register | AKNS - Akademi Komunitas Negeri Sumenep</title>
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
  <link rel="stylesheet" href="StyleAdmin/css/bootstrap.min.css">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="StyleAdmin/css/font-awesome.min.css">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="StyleAdmin/css/owl.carousel.css">
  <link rel="stylesheet" href="StyleAdmin/css/owl.theme.css">
  <link rel="stylesheet" href="StyleAdmin/css/owl.transitions.css">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="StyleAdmin/css/animate.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="StyleAdmin/css/normalize.css">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="StyleAdmin/css/main.css">
  <!-- morrisjs CSS
		============================================ -->
  <link rel="stylesheet" href="StyleAdmin/css/morrisjs/morris.css">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="StyleAdmin/css/scrollbar/jquery.mCustomScrollbar.min.css">
  <!-- metisMenu CSS
		============================================ -->
  <link rel="stylesheet" href="StyleAdmin/css/metisMenu/metisMenu.min.css">
  <link rel="stylesheet" href="StyleAdmin/css/metisMenu/metisMenu-vertical.css">
  <!-- calendar CSS
		============================================ -->
  <link rel="stylesheet" href="StyleAdmin/css/calendar/fullcalendar.min.css">
  <link rel="stylesheet" href="StyleAdmin/css/calendar/fullcalendar.print.min.css">
  <!-- forms CSS
		============================================ -->
  <link rel="stylesheet" href="StyleAdmin/css/form/all-type-forms.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="style.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="StyleAdmin/css/responsive.css">
  <!-- modernizr JS
		============================================ -->
  <script src="StyleAdmin/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
  <?php include 'action-register.php'; ?>
  <div class="error-pagewrap">
    <div class="error-page-int">
      <div class="text-center custom-login">
        <h3>Daftar Jadi Alumni</h3>
        <p><a href="index.php">Akademi Komunitas Negeri Sumenep!</a></p>
      </div>
      <div class="content-error">
        <div class="hpanel">
          <div class="panel-body">
            <form action="register.php" method="post" id="loginForm">
              <?php
              if (isset($error['salah'])) {
                echo '<div class="alert alert-danger alert-mg-b alert-st-four" role="alert">
										<p class="message-mg-rt message-alert-none"><strong>Ops!</strong> ' . $error['salah'] . '</p>
									</div>';
              } elseif (isset($error['lengthPassword'])) {
                echo '<div class="alert alert-danger alert-mg-b alert-st-four" role="alert">
										<p class="message-mg-rt message-alert-none"><strong>Ops!</strong> ' . $error['lengthPassword'] . '</p>
									</div>';
              } elseif (isset($error['numUsername'])) {
                echo '<div class="alert alert-danger alert-mg-b alert-st-four" role="alert">
										<p class="message-mg-rt message-alert-none"><strong>Ops!</strong> ' . $error['numUsername'] . '</p>
									</div>';
              } elseif (isset($error['numEmail'])) {
                echo '<div class="alert alert-danger alert-mg-b alert-st-four" role="alert">
										<p class="message-mg-rt message-alert-none"><strong>Ops!</strong> ' . $error['numEmail'] . '</p>
									</div>';
              }

              ?>
              <div class="row">
                <div class="form-group col-lg-12">
                  <label>Nama Lengkap</label>
                  <input autocomplete="off" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : '' ?>" type="text">
                  <span class="help-block small" style="color:#F00;"><?php echo isset($error['nama']) ? $error['nama'] : ''; ?></span>
                </div>
                <div class="form-group col-lg-12">
                  <label>Username</label>
                  <input autocomplete="off" class="form-control" placeholder="Username" name="username" type="text" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>">
                  <span class="help-block small" style="color:#F00;"><?php echo isset($error['username']) ? $error['username'] : ''; ?></span>
                </div>
                <div class="form-group col-lg-6">
                  <label>Password</label>
                  <input type="password" placeholder="******" name="password" class="form-control" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                  <span class="help-block small" style="color:#F00;"><?php echo isset($error['password']) ? $error['password'] : ''; ?></span>
                </div>
                <div class="form-group col-lg-6">
                  <label>Ulangi Password</label>
                  <input type="password" name="conPassword" placeholder="******" class="form-control" value="<?php echo isset($_POST['conPassword']) ? $_POST['conPassword'] : ''; ?>">
                  <span class="help-block small" style="color:#F00;"><?php echo isset($error['conPassword']) ? $error['conPassword'] : ''; ?></span>
                </div>
                <div class="form-group col-lg-12">
                  <label>Email Address</label>
                  <input autocomplete="off" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" class="form-control" name="email" type="email">
                  <span class="help-block small" style="color:#F00;"><?php echo isset($error['email']) ? $error['email'] : ''; ?></span>
                </div>
              </div>
              <div class="text-center">
                <input class="btn btn-primary loginbtn" name="submit" type="submit" value="Daftar">
                <input class="btn btn-default" type="reset" value="Cancel"><br>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div>
        <a href="login.php">Sudah punya akun ? Silahkan login</a>
      </div>
      <div class="text-center login-footer">
        <p>Copyright © 2019. Alhamdi Ferdiawan Bahri</p>
      </div>
    </div>
  </div>
  <!-- jquery
		============================================ -->
  <script src="StyleAdmin/js/vendor/jquery-1.12.4.min.js"></script>
  <!-- bootstrap JS
		============================================ -->
  <script src="StyleAdmin/js/bootstrap.min.js"></script>
  <!-- wow JS
		============================================ -->
  <script src="StyleAdmin/js/wow.min.js"></script>
  <!-- price-slider JS
		============================================ -->
  <script src="StyleAdmin/js/jquery-price-slider.js"></script>
  <!-- meanmenu JS
		============================================ -->
  <script src="StyleAdmin/js/jquery.meanmenu.js"></script>
  <!-- owl.carousel JS
		============================================ -->
  <script src="StyleAdmin/js/owl.carousel.min.js"></script>
  <!-- sticky JS
		============================================ -->
  <script src="StyleAdmin/js/jquery.sticky.js"></script>
  <!-- scrollUp JS
		============================================ -->
  <script src="StyleAdmin/js/jquery.scrollUp.min.js"></script>
  <!-- mCustomScrollbar JS
		============================================ -->
  <script src="StyleAdmin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="StyleAdmin/js/scrollbar/mCustomScrollbar-active.js"></script>
  <!-- metisMenu JS
		============================================ -->
  <script src="StyleAdmin/js/metisMenu/metisMenu.min.js"></script>
  <script src="StyleAdmin/js/metisMenu/metisMenu-active.js"></script>
  <!-- tab JS
		============================================ -->
  <script src="StyleAdmin/js/tab.js"></script>
  <!-- icheck JS
		============================================ -->
  <script src="StyleAdmin/js/icheck/icheck.min.js"></script>
  <script src="StyleAdmin/js/icheck/icheck-active.js"></script>
  <!-- plugins JS
		============================================ -->
  <script src="StyleAdmin/js/plugins.js"></script>
  <!-- main JS
		============================================ -->
  <script src="StyleAdmin/js/main.js"></script>
</body>

</html>