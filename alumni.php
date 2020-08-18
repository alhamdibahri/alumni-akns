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
    <link rel="stylesheet" type="text/css" href="StyleUser/SimplePagination/simplePagination.css" />
    <script type="text/javascript" src="StyleUser/SimplePagination/jquery.simplePagination.js"></script>
    <script type="text/javascript" src="StyleUser/DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="StyleUser/css/bootstrap.css">
    <link rel="stylesheet" href="StyleUser/css/animate.css">
    <link rel="stylesheet" href="StyleUser/css/owl.carousel.min.css">

    <link rel="stylesheet" href="StyleUser/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="StyleUser/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="StyleUser/fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="StyleUser/css/style.css">
    <script>
        $(document).ready(function() {
            $('#grid').dataTable({
                "scrollY": "200px",
                "scrollCollapse": true,
                "paging": true
            });
        });
    </script>
</head>

<body>


    <?php include 'header.php'  ?>
    <!-- END header -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1>DATA ALUMNI TAHUN <?php echo $_GET['tahun'] ?></h1>
            </div>
            <div class="col-md-8">
                <form class="form-inline" method="post" action="alumni.php?tahun=<?php echo $_GET['tahun'] ?>" style="float:right;">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-search"></i></div>
                            <input type="text" name="cari" class="form-control" id="exampleInputAmount" placeholder="Cari Alumni">
                        </div>
                    </div>
                    <button style="margin-left:10px;" type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>
        <hr>
        <table width="100%" cellspacing="0" cellpadding="0" id="target-content">
            <tr>
                <?php
                $limit = 12;
                if (isset($_GET["page"])) {
                    $page  = $_GET["page"];
                } else {
                    $page = 1;
                };
                $start_from = ($page - 1) * $limit;

                $sql = "SELECT * FROM login l , data_alumni a WHERE l.kodeuser=a.kodeuser AND a.tahun_angkatan='" . $_GET['tahun'] . "' ORDER BY a.nama_lengkap ASC LIMIT $start_from, $limit";
                $rs_result = mysqli_query($connect, $sql);
                $no = 0;
                if (isset($_POST['cari'])) {
                    $sql = "SELECT * FROM login l , data_alumni a WHERE l.kodeuser=a.kodeuser AND a.tahun_angkatan='" . $_GET['tahun'] . "' AND a.nama_lengkap LIKE '%" . $_POST['cari'] . "%' ORDER BY a.nama_lengkap LIMIT $start_from, $limit";
                    $rs_result = mysqli_query($connect, $sql);
                }
                while ($dataAlumni = mysqli_fetch_array($rs_result)) {
                    ?>
                    <th>
                        <img src="pages/admin/upload/<?php echo $dataAlumni['gambar'] ?>" alt="..." width="350" height="300">
                        <div class="caption">
                            <h3><?php echo $dataAlumni['nama_lengkap'] ?></h3>
                            <small><?php echo $dataAlumni['jurusan'] ?></small><br>
                            <small>Tanggal Lulus : <?php echo TanggalIndo($dataAlumni['tahun_lulusan']) ?></small>
                            <p><a href="#" class=" btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $dataAlumni['kode_alumni'] ?>">
                                    Lihat Alumni
                                </a>
                        </div>
                        <?php include 'detail-alumni.php'; ?>
                    </th>

                    <?php
                    ++$no;
                    if ($no % 3 == 0) {
                        echo '<tr></tr>';
                    }
                } ?>
            </tr>
        </table>
        <nav>
            <ul class="pagination">
                <?php
                $sql = "SELECT COUNT(kode_alumni) FROM data_alumni WHERE tahun_angkatan='" . $_GET['tahun'] . "'";
                $rs_result = mysqli_query($connect, $sql);
                if (isset($_POST['cari'])) {
                    $sql = "SELECT COUNT(kode_alumni) FROM data_alumni WHERE tahun_angkatan='" . $_GET['tahun'] . "' AND nama_lengkap LIKE '%" . $_POST['cari'] . "%'";
                    $rs_result = mysqli_query($connect, $sql);
                }
                $row = mysqli_fetch_row($rs_result);
                $total_records = $row[0];
                $total_pages = ceil($total_records / $limit);
                if (!empty($total_pages)) : for ($i = 1; $i <= $total_pages; $i++) :
                        if ($i == 1) : ?>
                            <li id="<?php echo $i; ?>"><a href='alumni.php?tahun=<?php echo $_GET['tahun'] ?>&page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
                        <?php else : ?>
                            <li id="<?php echo $i; ?>"><a href='alumni.php?tahun=<?php echo $_GET['tahun'] ?>&page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
                        <?php endif; ?>
                    <?php endfor;
            endif; ?>
            </ul>
        </nav>
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

    <script src="StyleUser/js/jquery-migrate-3.0.0.js"></script>
    <script src="StyleUser/js/popper.min.js"></script>
    <script src="StyleUser/js/owl.carousel.min.js"></script>
    <script src="StyleUser/js/jquery.waypoints.min.js"></script>
    <script src="StyleUser/js/jquery.stellar.min.js"></script>


    <script src="StyleUser/js/main.js"></script>

</body>

</html>