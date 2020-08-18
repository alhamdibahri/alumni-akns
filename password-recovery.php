<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Password Recevery | AKNS - Akademi Komunitas Negeri Sumenep</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
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
  <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
  <div class="error-pagewrap">
    <div class="error-page-int">
      <div class="text-center ps-recovered">
        <h3>PASSWORD RECOVERY</h3>
        <p>Please fill the form to recover your password</p>
      </div>
      <div class="content-error">
        <div class="hpanel">
          <div class="panel-body poss-recover">
            <?php
            if (isset($_GET['error'])) {
              echo '<div class="alert alert-danger alert-mg-b alert-st-four" role="alert">
									  <p class="message-mg-rt message-success-none"><strong>Ops! </strong>User Record Not Found For this email.. !</p>
								  </div>';
            }
            ?>
            <form action="action-recovery.php" method="post" id="loginForm">
              <div class="form-group">
                <label class="control-label" for="username">Email</label>
                <input type="text" placeholder="example@gmail.com" title="Please enter you email adress" required="" value="" name="email" id="username" class="form-control">
              </div>

              <input type="submit" class="btn btn-success btn-block" value="Kirim">
              <a class="btn btn-warning btn-block" href="login.php">Kembali</a>
            </form>
          </div>
        </div>
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