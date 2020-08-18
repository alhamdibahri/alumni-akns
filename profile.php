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
    <link rel="shortcut icon" type="image/x-icon" href="img/imac-icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <?php
    $queryUser = mysqli_query($connect, "SELECT * FROM login l, data_alumni a WHERE l.kodeuser=a.kodeuser AND l.kodeuser='" . $_SESSION['kodeuser'] . "'");
    $dataUser = mysqli_fetch_array($queryUser);
    ?>
    <div class="container bootstrap snippet">
        <div class="alert alert-warning" role="alert">
            Harap Lengkapi Data Akun Anda dan Akun Pribadi Anda !
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
                <div class="text-center">
                    <img src="pages/admin/Upload/<?php echo $dataUser['gambar'] ?>" class="avatar img-circle img-thumbnail" alt="avatar" width="300" height="300">
                    <h6>Upload a different photo...</h6>
                    <form class="form" action="action-profile.php" method="post" id="registrationForm" enctype="multipart/form-data">
                        <input type="file" name="file" class="text-center center-block file-upload">
                </div>
                </hr><br>
            </div>
            <!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Data Akun</a></li>
                    <li><a data-toggle="tab" href="#messages">Data Pribadi</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>KodeUser</h4>
                                </label>
                                <input type="text" value="<?php echo $dataUser['kodeuser'] ?>" class="form-control" name="kodeuser" id="first_name" placeholder="kode user" title="enter your kode user if any." readonly>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Username</h4>
                                </label>
                                <input value="<?php echo $dataUser['username'] ?>" type="text" class="form-control" name="username" id="username" placeholder="Username" title="enter your username if any.">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>Password</h4>
                                </label>
                                <input type="password" value="<?php echo $dataUser['password'] ?>" class="form-control" name="password" id="password" placeholder="password" title="enter your password if any.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile">
                                    <h4>Email</h4>
                                </label>
                                <input type="text" value="<?php echo $dataUser['email'];  ?>" class="form-control" name="email" id="email" placeholder="enter email" title="enter your email if any.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <input class="btn btn-lg btn-success" type="submit" value="Save" name="submitAkun">
                            </div>
                        </div>
                        </form>
                        <hr>
                    </div>
                    <!--/tab-pane-->
                    <div class="tab-pane" id="messages">

                        <h2></h2>

                        <hr>
                        <form class="form" action="action-profile.php" method="post" id="registrationForm">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="first_name">
                                        <h4>Nama Lengkap</h4>
                                    </label>
                                    <input type="text" value="<?php echo $dataUser['nama_lengkap'] ?>" class="form-control" name="nama" id="first_name" placeholder="nama lengkap" title="enter your nama lengkap if any.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name">
                                        <h4>Tanggal Lahir</h4>
                                    </label>
                                    <input value="<?php echo $dataUser['tanggal_lahir'] ?>" type="date" class="form-control" name="tgl_lahir" id="username" placeholder="Tanggal Lahir" title="enter tanggal lahir if any.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name">
                                        <h4>Tempat Lahir</h4>
                                    </label>
                                    <input value="<?php echo $dataUser['tempat_lahir'] ?>" type="text" class="form-control" name="tmp_lahir" id="username" placeholder="Tempat Lahir" title="enter your Tempat Lahir if any.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name">
                                        <h4>Jenis Kelamin</h4>
                                    </label>
                                    <select class="form-control" style="height:35px; font-size:10px;" name="jk">
                                        <option value="L" <?php if ($dataUser['jenis_kelamin'] == 'L') {
                                                                echo "selected='selected'";
                                                            }  ?>>Laki-Laki</option>
                                        <option value="P" <?php if ($dataUser['jenis_kelamin'] == 'P') {
                                                                echo "selected='selected'";
                                                            }  ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name">
                                        <h4>No Handphone</h4>
                                    </label>
                                    <input value="<?php echo $dataUser['no_hp'] ?>" type="text" class="form-control" name="hp" id="username" placeholder="Handphone" title="enter your Handphone if any.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name">
                                        <h4>Tahun Angkatan</h4>
                                    </label>
                                    <input value="<?php echo $dataUser['tahun_angkatan'] ?>" type="text" class="form-control" name="thn_angkatan" id="username" placeholder="Tahun Angkatan" title="enter your Tahun Angkatan if any.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name">
                                        <h4>Tanggal Lulus</h4>
                                    </label>
                                    <input value="<?php echo $dataUser['tahun_lulusan'] ?>" type="date" class="form-control" name="tgl_lulus" id="username" placeholder="Tanggal Lulus" title="enter Tanggal Lulus if any.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name">
                                        <h4>Jurusan</h4>
                                    </label>
                                    <select class="form-control" style="height:35px; font-size:10px;" name="jurusan">
                                        <option value="Teknik Informatika" <?php if ($dataUser['jurusan'] == 'Teknik Informatika') {
                                                                                echo "selected='selected'";
                                                                            }  ?>>Teknik Informatika</option>
                                        <option value="Multimedia" <?php if ($dataUser['jurusan'] == 'Multimedia') {
                                                                        echo "selected='selected'";
                                                                    }  ?>>Multimedia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-12">
                                    <label for="last_name">
                                        <h4>Alamat</h4>
                                    </label>
                                    <textarea rows="5" class="form-control" name="alamat" id="username" placeholder="Alamat" title="enter your username if any."><?php echo $dataUser['alamat'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <input class="btn btn-lg btn-success" type="submit" name="submitData" value="Save">
                                </div>
                            </div>
                        </form>

                    </div>
                    <!--/tab-pane-->
                </div>
                <!--/tab-pane-->
            </div>
            <!--/tab-content-->

        </div>
        <!--/col-9-->
    </div>
    <!--/row-->
    <br>

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
    <script src="StyleUser/js/owl.carousel.min.js"></script>
    <script src="StyleUser/js/jquery.waypoints.min.js"></script>
    <script src="StyleUser/js/jquery.stellar.min.js"></script>


    <script src="StyleUser/js/main.js"></script>
</body>

</html>