<?php
if (isset($_GET['req']) && $_GET['req'] == 'edit') {
    $namaform = '<i class="fa fa-edit"></i> Edit';
    $id_type = $_GET['id_type'];
    $query = mysqli_query($connect, "SELECT * FROM post_type WHERE id_type='" . $id_type . "'");
    $data = mysqli_fetch_array($query);
    $nama_category = $data['type_post'];
} elseif (isset($_GET['req']) && $_GET['req'] == 'add') {
    $namaform = '<i class="fa fa-plus"></i> Tambah';
    $id_type = penomoranOtomatis("post_type", "id_type", "TYP-");
    $nama_category = '';
    $_SESSION['id_type'] = $id_type;
}
?>
<div class="basic-form-area mg-b-15" style="margin-top:40px;">
    <div class="container-fluid">
        <div class="row" style="margin-top:30px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline12-list">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1><?php echo $namaform; ?> Category</h1>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['id'])) {
                        echo '<div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>ID Category tidak boleh di ubah!!</strong>
                            </div>';
                    } elseif (isset($_GET['nama'])) {
                        echo '<div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Nama Category kosong!!</strong>
                            </div>';
                    }
                    ?>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div id="pesan"></div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="all-form-element-inner">
                                        <form id="formku" action="action-category.php" method="post">
                                            <input type="hidden" name="req" value="<?php echo $_GET['req'] ?>">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">ID Category</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <input value="<?php echo $id_type ?>" placeholder="ID Category" type="text" class="form-control" name="id_category" readonly="readonly">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Nama Category</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <input autocomplete="off" type="text" value="<?php echo $nama_category ?>" placeholder="Nama Category" class="form-control" name="nama_category">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="col-lg-9">
                                                            <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                                <input type="reset" class="btn btn-white" value="Cancel">
                                                                <button id="tombolsimpan" class="btn btn-sm btn-primary login-submit-cs">Save Change</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>