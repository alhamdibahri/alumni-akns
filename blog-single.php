<?php
session_start();
include 'config/funct.php';
?>
<!doctype html>
<html lang="en">

<head>
  <title>AKNS &mdash; Akademi Komunitas Negeri Sumenep</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="img/imac-icon.png">
  <link rel="stylesheet" href="StyleUser/css/bootstrap.css">
  <link rel="stylesheet" href="StyleUser/css/animate.css">
  <link rel="stylesheet" href="StyleUser/css/owl.carousel.min.css">

  <link rel="stylesheet" href="StyleUser/fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="StyleUser/fonts/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="StyleUser/fonts/flaticon/font/flaticon.css">

  <!-- Theme Style -->
  <link rel="stylesheet" href="StyleUser/css/style.css">
</head>

<body>


  <?php include 'header.php'  ?>
  <!-- END header -->

  <section class="site-section py-lg">
    <div class="container">
      <?php
      //update baca comment
      if (isset($_SESSION['level'])) {
        if ($_GET['category'] && $_SESSION['level'] == 'Admin') {
          updatedata('comment', 'lihat="1"', 'kode_post="' . $_GET['category'] . '"');
        }
      }



      $sql = mysqli_query($connect, "SELECT * FROM post p , post_type t WHERE p.id_type=t.id_type AND p.kode_post='" . $_GET['category'] . "'");
      $data = mysqli_fetch_array($sql);
      $views = $data['views'] + 1;
      updatedata('post', 'views="' . $views . '"', 'kode_post="' . $data['kode_post'] . '"');
      $jum = hitungcount('comment', 'kode_post', 'kode_post="' . $data['kode_post'] . '"');
      ?>
      <div class="row blog-entries">
        <div class="col-md-12 col-lg-8 main-content">
          <h1 class="mb-4"><?php echo $data['judul'] ?></h1>
          <div class="post-meta">
            <span class="category"><?php echo $data['type_post'] ?></span>
            <span class="mr-2"><?php echo TanggalIndo($data['tanggal_post']) ?> </span> &bullet;
            <span class="ml-2"><span class="fa fa-comments"></span> <?php echo $jum ?></span>
          </div>
          <div class="post-content-body">
            <div class="row mb-5">
              <div class="col-md-12 mb-4 element-animate">
                <img src="pages/admin/upload/<?php echo $data['gambar'] ?>" alt="Image placeholder" class="img-fluid">
              </div>
            </div>
            <p style="text-align:justify;"><?php echo $data['deskripsi'] ?></p>
          </div>
          <div class="pt-5">
            <p>Categories: <?php echo $data['type_post'] ?></p>
          </div>
          <div class="pt-5">
            <h3 class="mb-5"><?php echo $jum ?> Comments</h3>
            <ul class="comment-list">
              <?php
              $queryCommentUser = mysqli_query($connect, "SELECT * FROM login l, comment c WHERE l.kodeuser=c.kodeuser AND c.kode_post='" . $_GET['category']  . "' ORDER BY c.id ASC");
              while ($data = mysqli_fetch_array($queryCommentUser)) {
                ?>
                <li class="comment">
                  <div class="vcard">
                    <img src="pages/admin/upload/<?php echo $data['gambar'] ?>" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3><?php echo $data['username'] ?></h3>
                    <div class="meta"><?php echo TanggalIndo($data['tanggal_comment'])  ?></div>
                    <p><?php echo $data['deskripsi_comment'] ?></p>
                    <?php if (isset($_SESSION['level'])) {
                      if ($_SESSION['level'] == 'Admin') { ?>
                        <p><a href="pages/admin/action-comment.php?id=<?php echo $data['id'] ?>&kode=<?php echo $data['kode_post']  ?>&action=dell" class="reply">Delete</a></p>
                      <?php }
                  } ?>
                  </div>
                </li>
              <?php } ?>
            </ul>
            <!-- END comment-list -->
            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Leave a comment</h3>
              <form action="pages/admin/action-comment.php" method="post" class="p-5 bg-light">
                <input type="hidden" name="kodepost" value="<?php echo $_GET['category'] ?>">
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="text" class="form-control" id="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : " " ?>" <?php echo isset($_SESSION['username']) ? "readonly" : ""  ?>>
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="pesan" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" value="Post Comment" class="btn btn-primary">
                </div>
              </form>
            </div>
          </div>

        </div>

        <!-- END main-content -->

        <?php include 'sidebar.php'; ?>
        <!-- END sidebar -->

      </div>
    </div>
  </section>

  <!-- END section -->

  <?php include 'footer.php'; ?>
  <!-- END footer -->

  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214" /></svg></div>

  <script src="StyleUser/js/jquery-3.2.1.min.js"></script>
  <script src="StyleUser/js/jquery-migrate-3.0.0.js"></script>
  <script src="StyleUser/js/popper.min.js"></script>
  <script src="StyleUser/js/bootstrap.min.js"></script>
  <script src="StyleUser/js/owl.carousel.min.js"></script>
  <script src="StyleUser/js/jquery.waypoints.min.js"></script>
  <script src="StyleUser/js/jquery.stellar.min.js"></script>


  <script src="StyleUser/js/main.js"></script>
</body>

</html>