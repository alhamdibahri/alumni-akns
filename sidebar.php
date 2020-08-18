<div class="col-md-12 col-lg-4 sidebar">
  <div class="sidebar-box search-form-wrap" style="margin-top:50px;">

  </div>
  <!-- END sidebar-box -->
  <div class="sidebar-box">
    <div class="bio text-center">
      <img src="StyleUser/images/me.jpg" alt="Image Placeholder" class="img-fluid">
      <div class="bio-body">
        <h2>Alhamdi Ferdiawan Bahri</h2>
        <p>What You See Is What You Get.</p>
        <p><a href="#" class="btn btn-primary btn-sm">Read my bio</a></p>
        <p class="social">
          <a href="https://www.facebook.com/pepenk0" target="blank" class="p-2"><span class="fa fa-facebook"></span></a>
          <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
          <a href="https://www.instagram.com/alhamdibahri" class="p-2"><span class="fa fa-instagram"></span></a>
          <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
        </p>
      </div>
    </div>
  </div>
  <!-- END sidebar-box -->
  <div class="sidebar-box">
    <h3 class="heading">Popular Posts</h3>
    <div class="post-entry-sidebar">
      <ul>
        <?php
        $query = mysqli_query($connect, "SELECT * FROM post ORDER BY views DESC LIMIT 3");
        while ($data = mysqli_fetch_array($query)) {
          $jum = hitungcount('comment', 'kode_post', 'kode_post="' . $data['kode_post'] . '"');
          ?>
          <li>
            <a href="blog-single.php?category=<?php echo $data['kode_post'] ?>">
              <img src="pages/admin/upload/<?php echo $data['gambar'] ?>" alt="Image placeholder" class="mr-4">
              <div class="text">
                <h4><?php echo $data['judul'] ?></h4>
                <div class="post-meta">
                  <span class="mr-2"><?php echo TanggalIndo($data['tanggal_post']) ?> </span> &bullet;
                  <span class="ml-2"><span class="fa fa-comments"></span> <?php echo $jum ?></span>
                </div>
              </div>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <!-- END sidebar-box -->

  <div class="sidebar-box">
    <h3 class="heading">Kategori</h3>
    <ul class="categories">
      <?php $sql = mysqli_query($connect, "SELECT * FROM post_type");
      while ($data = mysqli_fetch_array($sql)) {
        $jum = hitungcount('post', 'id_type', 'id_type="' . $data[0] . '"');
        ?>

        <li><a href="index.php?category=<?php echo $data[0] ?>"><?php echo $data[1];  ?> <span><?php echo $jum ?></span></a></li>
      <?php } ?>
    </ul>
  </div>
  <!-- END sidebar-box -->
</div>