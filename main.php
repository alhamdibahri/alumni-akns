<section class="site-section pt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="owl-carousel owl-theme home-slider">
          <div>
            <a href="#" class="a-block d-flex align-items-center height-lg" style="background-image: url('img/wisuda.png'); 
            -webkit-background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            -o-background-size: 100% 100%;
            background-size: 100% 100%">
            </a>
          </div>
          <div>
            <a href="#" class="a-block d-flex align-items-center height-lg" style="background-image: url('img/6anaradio.jpg'); 
            -webkit-background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            -o-background-size: 100% 100%;
            background-size: 100% 100%">
            </a>
          </div>
          <div>
            <a href="#" class="a-block d-flex align-items-center height-lg" style=" 
            background-image: url('img/1akns web 3 MPU.png');
            -webkit-background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            -o-background-size: 100% 100%;
            background-size: 100% 100%;
            ">
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
      $sql = mysqli_query($connect, "SELECT * FROM post p , post_type t WHERE p.id_type=t.id_type ORDER BY views DESC LIMIT 3");
      while ($data = mysqli_fetch_array($sql)) {
        $jum = hitungcount('comment', 'kode_post', 'kode_post="' . $data['kode_post'] . '"');
        ?>
        <div class="col-md-6 col-lg-4">
          <a href="blog-single.php?category=<?php echo $data['0']  ?>" class="a-block d-flex align-items-center height-md" style="background-image: url('pages/admin/upload/<?php echo $data['gambar'] ?>'); ">
            <div class="text">
              <div class="post-meta">
                <span class="category"><?php echo $data['type_post'] ?></span>
                <span class="mr-2"><?php echo TanggalIndo($data['tanggal_post']) ?></span> &bullet;
                <span class="ml-2"><span class="fa fa-comments"></span> <?php echo $jum ?></span>
              </div>
              <h3><?php echo $data['judul'] ?></h3>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>


</section>
<!-- END section -->
<?php
if (isset($_GET['category'])) {
  $sql = mysqli_query($connect, "SELECT * FROM post_type  WHERE id_type='" . $_GET['category'] . "'");
}
$data = mysqli_fetch_array($sql);
?>
<section class="site-section py-sm">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="mb-4">Semua Category <?php echo isset($_GET['category']) ?  $data['type_post'] : '';  ?></h2>
      </div>
    </div>
    <div class="row blog-entries">
      <div class="col-md-12 col-lg-8 main-content">
        <div class="row">
          <?php
          $halaman = 10;
          $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
          $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
          if (isset($_GET['category'])) {
            $result = mysqli_query($connect, "SELECT * FROM post p , post_type t WHERE p.id_type=t.id_type AND p.id_type='" . $_GET['category'] . "'");
            $total = mysqli_num_rows($result);
            $pages = ceil($total / $halaman);
            $query = mysqli_query($connect, "SELECT * FROM post p , post_type t WHERE p.id_type=t.id_type AND p.id_type='" . $_GET['category'] . "' LIMIT  $mulai , $halaman");
            $num = mysqli_num_rows($query);
          } else {
            $result = mysqli_query($connect, "SELECT * FROM post p , post_type t WHERE p.id_type=t.id_type");
            $total = mysqli_num_rows($result);
            $pages = ceil($total / $halaman);
            $query = mysqli_query($connect, "SELECT * FROM post p , post_type t WHERE p.id_type=t.id_type LIMIT  $mulai , $halaman");
            $num = mysqli_num_rows($query);
          }
          if ($num != 0) {
            while ($row = mysqli_fetch_array($query)) {
              $jum = hitungcount('comment', 'kode_post', 'kode_post="' . $row['kode_post'] . '"');
              ?>
              <div class="col-md-6">
                <a href="blog-single.php?category=<?php echo $row['0']  ?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                  <img src="pages/admin/upload/<?php echo $row['gambar'] ?>" height="350px" alt="Image placeholder">
                  <div class="blog-content-body">
                    <div class="post-meta">
                      <span class="category"><?php echo $row['type_post'] ?> </span>
                      <span class="mr-2"><?php echo TanggalIndo($row['tanggal_post']) ?> </span> &bullet;
                      <span class="ml-2"><span class="fa fa-comments"></span> <?php echo $jum ?></span>
                    </div>
                    <h2><?php echo $row['judul'] ?> </h2>
                  </div>
                </a>
              </div>
            <?php
          }
        } else {
          echo '<h1 style="margin-left:100px; margin-top:100px; color:red;">POST MASIH BELUM ADA !</h1>';
        } ?>
        </div>

        <div class="col-md-12 text-center">
          <div class="row">
            <nav aria-label="Page navigation" class="text-center">
              <ul class="pagination">
                <?php if (isset($_GET['category'])) {
                  for ($x = 1; $x <= $pages; $x++) {
                    ?>
                    <li class="page-item"><a class="page-link" href="index.php?category=<?php echo $_GET['category'] ?>&halaman=<?php echo $x ?>"><?php echo $x ?></a></li>
                  <?php } ?>
                <?php } else {
                for ($x = 1; $x <= $pages; $x++) { ?>
                    <li class="page-item"><a class="page-link" href="index.php?halaman=<?php echo $x ?>"><?php echo $x ?></a></li>
                  <?php } ?>
                <?php
              } ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>

      <!-- END main-content -->
      <?php include 'sidebar.php'; ?>
      <!-- END sidebar -->
    </div>
  </div>
</section>