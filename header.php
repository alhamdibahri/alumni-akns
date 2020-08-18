<header role="banner">
  <div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-3 social search-top">
          <form action="#" class="search-top-form">
            <span class="icon fa fa-search"></span>
            <input type="text" id="s" placeholder="Cari Alumni...">
          </form>
        </div>
        <div class="col-9 search-top">
          <?php if (isset($_SESSION['kodeuser'])) { ?>
            <a href="logout.php" style="margin-left:800px;">Logout</a>
          <?php } else { ?>
            <a href="login.php" style="margin-left:800px;">Login</a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container logo-wrap">
    <div class="row pt-5">
      <div class="col-12 text-center">
        <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
        <h1 class="site-logo"><a href="index.php">A K N S</a></h1>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-md  navbar-light bg-light">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="category.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Alumni</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="alumni.php?tahun=2012">2012</a>
              <a class="dropdown-item" href="alumni.php?tahun=2013">2013</a>
              <a class="dropdown-item" href="alumni.php?tahun=2014">2014</a>
              <a class="dropdown-item" href="alumni.php?tahun=2015">2015</a>
              <a class="dropdown-item" href="alumni.php?tahun=2016">2016</a>
              <a class="dropdown-item" href="alumni.php?tahun=2017">2017</a>
              <a class="dropdown-item" href="alumni.php?tahun=2018">2018</a>
            </div>

          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
            <div class="dropdown-menu" aria-labelledby="dropdown05">
              <?php
              $query = mysqli_query($connect, "SELECT * FROM post_type");
              while ($data = mysqli_fetch_array($query)) {
                ?>
                <a class="dropdown-item" href="index.php?category=<?php echo $data[0] ?>"><?php echo $data['type_post'] ?></a>
              <?php } ?>
            </div>
          </li>
          <?php if (isset($_SESSION['username'])) {
            if ($_SESSION['level'] == 'User') {  ?>
              <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
              </li>
            <?php }
        } ?>
        </ul>

      </div>
    </div>
  </nav>
</header>