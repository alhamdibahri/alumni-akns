<?php session_start();

if (!$_SESSION['username']) {
  header('location:../../login.php');
} elseif ($_SESSION['level'] != 'Admin') {
  echo "<script>alert('Maaf Anda tidak Bisa mengakses halaman ini');
  document.location.href='../../index.php'</script>";
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>AKNS | Akademi Komunitas Negeri Sumenep</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="../../img/imac-icon.png">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="../../StyleAdmin/css/bootstrap.min.css">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="../../StyleAdmin/css/owl.carousel.css">
  <link rel="stylesheet" href="../../StyleAdmin/css/owl.theme.css">
  <link rel="stylesheet" href="../../StyleAdmin/css/owl.transitions.css">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="../../StyleAdmin/css/animate.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="../../StyleAdmin/css/normalize.css">
  <!-- meanmenu icon CSS
		============================================ -->
  <link rel="stylesheet" href="../../StyleAdmin/css/meanmenu.min.css">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="../../StyleAdmin/css/main.css">
  <!-- educate icon CSS
		============================================ -->
  <link rel="stylesheet" href="../../StyleAdmin/css/educate-custon-icon.css">
  <!-- morrisjs CSS
		============================================ -->
  <link rel="stylesheet" href="../../StyleAdmin/css/morrisjs/morris.css">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="../../StyleAdmin/css/scrollbar/jquery.mCustomScrollbar.min.css">
  <!-- metisMenu CSS
		============================================ -->
  <link rel="stylesheet" href="../../StyleAdmin/css/metisMenu/metisMenu.min.css">
  <link rel="stylesheet" href="../../StyleAdmin/css/metisMenu/metisMenu-vertical.css">
  <!-- calendar CSS
		============================================ -->
  <link rel="stylesheet" href="../../StyleAdmin/css/calendar/fullcalendar.min.css">
  <link rel="stylesheet" href="../../StyleAdmin/css/calendar/fullcalendar.print.min.css">
  <!-- x-editor CSS
		============================================ -->
  <link rel="stylesheet" href="../../StyleAdmin/css/editor/select2.css">
  <link rel="stylesheet" href="../../StyleAdmin/css/editor/datetimepicker.css">
  <link rel="stylesheet" href="../../StyleAdmin/css/editor/bootstrap-editable.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="../../StyleAdmin/css/data-table/bootstrap-table.css">
  <link rel="stylesheet" href="../../StyleAdmin/css/data-table/bootstrap-editable.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="../../style.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="../../StyleAdmin/css/responsive.css">
  <!-- modernizr JS
		============================================ -->
  <script src="../../StyleAdmin/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>
  <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
  <!-- Start Left menu area -->
  <?php include 'menu.php'; ?>
  <!-- End Left menu area -->
  <!-- Start Welcome area -->
  <div class="all-content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="logo-pro">
            <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
          </div>
        </div>
      </div>
    </div>
    <?php include 'header.php' ?>
    <?php include 'main-post.php'; ?>
    <?php include 'footer.php'; ?>
  </div>

  <!-- jquery
		============================================ -->
  <script src="../../Styleadmin/js/vendor/jquery-1.12.4.min.js"></script>
  <!-- bootstrap JS
		============================================ -->
  <script src="../../Styleadmin/js/bootstrap.min.js"></script>
  <!-- wow JS
		============================================ -->
  <script src="../../Styleadmin/js/wow.min.js"></script>
  <!-- price-slider JS
		============================================ -->
  <script src="../../Styleadmin/js/jquery-price-slider.js"></script>
  <!-- meanmenu JS
		============================================ -->
  <script src="../../Styleadmin/js/jquery.meanmenu.js"></script>
  <!-- owl.carousel JS
		============================================ -->
  <script src="../../Styleadmin/js/owl.carousel.min.js"></script>
  <!-- sticky JS
		============================================ -->
  <script src="../../Styleadmin/js/jquery.sticky.js"></script>
  <!-- scrollUp JS
		============================================ -->
  <script src="../../Styleadmin/js/jquery.scrollUp.min.js"></script>
  <!-- counterup JS
		============================================ -->
  <script src="../../Styleadmin/js/counterup/jquery.counterup.min.js"></script>
  <script src="../../Styleadmin/js/counterup/waypoints.min.js"></script>
  <script src="../../Styleadmin/js/counterup/counterup-active.js"></script>
  <!-- mCustomScrollbar JS
		============================================ -->
  <script src="../../Styleadmin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="../../Styleadmin/js/scrollbar/mCustomScrollbar-active.js"></script>
  <!-- data table JS
		============================================ -->
  <script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>
  <script src="../../Styleadmin/js/data-table/data-table-active.js"></script>
  <script src="../../Styleadmin/js/data-table/bootstrap-table-editable.js"></script>
  <script src="../../Styleadmin/js/data-table/bootstrap-editable.js"></script>
  <script src="../../Styleadmin/js/data-table/bootstrap-table-resizable.js"></script>
  <script src="../../Styleadmin/js/data-table/colResizable-1.5.source.js"></script>
  <script src="../../Styleadmin/js/data-table/bootstrap-table-export.js"></script>
  <!--  editable JS
		============================================ -->
  <script src="../../Styleadmin/js/editable/jquery.mockjax.js"></script>
  <script src="../../Styleadmin/js/editable/mock-active.js"></script>
  <script src="../../Styleadmin/js/editable/select2.js"></script>
  <script src="../../Styleadmin/js/editable/moment.min.js"></script>
  <script src="../../Styleadmin/js/editable/bootstrap-datetimepicker.js"></script>
  <script src="../../Styleadmin/js/editable/bootstrap-editable.js"></script>
  <script src="../../Styleadmin/js/editable/xediable-active.js"></script>

  <!-- metisMenu JS
		============================================ -->
  <script src="../../Styleadmin/js/metisMenu/metisMenu.min.js"></script>
  <script src="../../Styleadmin/js/metisMenu/metisMenu-active.js"></script>
  <!-- morrisjs JS
		============================================ -->
  <script src="../../Styleadmin/js/sparkline/jquery.sparkline.min.js"></script>
  <script src="../../Styleadmin/js/sparkline/jquery.charts-sparkline.js"></script>
  <script src="../../Styleadmin/js/sparkline/sparkline-active.js"></script>
  <!-- calendar JS
		============================================ -->
  <script src="../../Styleadmin/js/calendar/moment.min.js"></script>
  <script src="../../Styleadmin/js/calendar/fullcalendar.min.js"></script>
  <script src="../../Styleadmin/js/calendar/fullcalendar-active.js"></script>
  <!-- plugins JS
		============================================ -->
  <script src="../../Styleadmin/js/plugins.js"></script>
  <!-- main JS
		============================================ -->
  <script src="../../Styleadmin/js/main.js"></script>
</body>

</html>