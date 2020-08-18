<?php
?>
<footer class="site-footer">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-4">
        <h3>Link Terkait</h3>
        <p><a href="http://ristekdikti.go.id">Ristek Dikti</a></p>
        <p><a href="http://pens.ac.id">Politeknik Elektronika Negeri Surabaya</a></p>
        <p><a href="http://sumenepkab.go.id">Kabupaten Sumenep</a></p>
        <p><a href="http://akademikomunitas.id">Akademi Komunitas Indonesia</a></p>
        <p><a href="#">Bem Akademi Komunitas Negeri Sumenep</a></p>
        <p><a href="/index.php/akademik/prodi-teknik-informatika">Teknik Informatika AKNS</a></p>
        <p><a href="/index.php/akademik/prodi-teknologi-multimedia-broadcasting">Teknologi Multimedia Broadcasting AKNS</a></p>
      </div>
      <div class="col-md-6 ml-auto">
        <div class="row">
          <div class="col-md-7">
            <h3>Latest Post</h3>
            <div class="post-entry-sidebar">
              <ul>
                <?php
                $sql = mysqli_query($connect, "SELECT * FROM post ORDER BY kode_post DESC LIMIT 3");
                while ($data = mysqli_fetch_array($sql)) {
                  $jum = hitungcount('comment', 'kode_post', 'kode_post="' . $data['kode_post'] . '"');
                  ?>
                  <li>
                    <a href="">
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
          <div class="col-md-1"></div>

          <div class="col-md-4">
            <div class="mb-5">
              <h3>Social</h3>
              <ul class="list-unstyled footer-social">
                <li><a href="#"><span class="fa fa-twitter"></span> Twitter</a></li>
                <li><a href="#"><span class="fa fa-facebook"></span> Facebook</a></li>
                <li><a href="#"><span class="fa fa-instagram"></span> Instagram</a></li>
                <li><a href="#"><span class="fa fa-vimeo"></span> Vimeo</a></li>
                <li><a href="#"><span class="fa fa-youtube-play"></span> Youtube</a></li>
                <li><a href="#"><span class="fa fa-snapchat"></span> Snapshot</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>
          document.write(new Date().getFullYear());
        </script> AlhamdiBahri
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </div>
    </div>
  </div>
</footer>