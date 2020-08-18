<?php
if (isset($_GET['req']) && $_GET['req'] == 'edit') {
    $namaform = '<i class="fa fa-edit"></i> Edit';
    $kode_alumni = $_GET['kode_alumni'];
    $query = mysqli_query($connect, "SELECT * FROM data_alumni WHERE kode_alumni='" . $kode_alumni . "'");
    $data = mysqli_fetch_array($query);
    $nama_lengkap = $data['nama_lengkap'];
    $lahir = explode('-', $data['tanggal_lahir']);
    $tgl_lahir = $lahir[2] . "/" . $lahir[1] . "/" . $lahir[0];
    $tmp_lahir = $data['tempat_lahir'];
    $jk = $data['jenis_kelamin'];
    $no_hp = $data['no_hp'];
    $alamat = $data['alamat'];
    $thn_angkatan = $data['tahun_angkatan'];
    $lulus = explode('-', $data['tahun_lulusan']);
    $thn_lulus = $lulus[2] . "/" . $lulus[1] . "/" . $lulus[0];
    $jurusan = $data['jurusan'];
}
?>
<div class="mailbox-compose-area mg-b-15" style="margin-top:70px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                <div class="hpanel email-compose">
                    <div class="panel-heading hbuilt">
                        <div class="p-xs h4">
                            <?php echo $namaform ?> Alumni
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['nama'])) {
                        echo '<div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Nama Lengkap tidak boleh kosong!!</strong>
                            </div>';
                    } elseif (isset($_GET['tmplahir'])) {
                        echo '<div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Tempat lahir tidak boleh kosong!!</strong>
                            </div>';
                    } elseif (isset($_GET['jk'])) {
                        echo '<div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Pilih jenis kelamin!!</strong>
                            </div>';
                    } elseif (isset($_GET['hp'])) {
                        echo '<div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>No Handphone tidak boleh kosong!!</strong>
                            </div>';
                    } elseif (isset($_GET['alamat'])) {
                        echo '<div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Alamat tidak boleh kosong!!</strong>
                            </div>';
                    } elseif (isset($_GET['thn'])) {
                        echo '<div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Tahun angkatan tidak boleh kosong!!</strong>
                            </div>';
                    } elseif (isset($_GET['jurusan'])) {
                        echo '<div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Jurusan tidak boleh kosong!!</strong>
                            </div>';
                    }
                    ?>
                    <form method="post" action="action-alumni.php" class="form-horizontal">
                        <input type="hidden" name="req" value="<?php echo $_GET['req'] ?>">
                        <div class="panel-heading hbuilt">
                            <div class="p-xs">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label text-left">Kode Alumni:</label>
                                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                                        <input readonly autocomplate="off" name="kodealumni" type="text" class="form-control input-sm" placeholder="Kode Alumni" value="<?php echo $kode_alumni ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label text-left">Nama Lengkap:</label>
                                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                                        <input autocomplate="off" name="nama" type="text" class="form-control input-sm" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap ?>">
                                    </div>
                                </div>
                                <div class="form-group data-custon-pick" id="data_2">
                                    <label class="col-lg-2 control-label text-left"><b>Tanggal Lahir:</b></label>
                                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" name="tgl_lahir" class="form-control" value="<?php echo $tgl_lahir ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label text-left">Tempat Lahir:</label>
                                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                                        <input autocomplate="off" name="tmp_lahir" type="text" class="form-control input-sm" placeholder="Nama Lengkap" value="<?php echo $tmp_lahir ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label text-left">Jenis Kelamin:</label>
                                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                                        <div class="bt-df-checkbox i-checks">
                                            <input class="pull-left radio-checked " type="radio" value="<?php echo $jk ?>" id="optionsRadios1" name="jk" <?php if ($jk == 'L') {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>> Laki - Laki&nbsp;
                                            <input class="pull-left" type="radio" value="<?php echo $jk ?>" id="optionsRadios2" name="jk" <?php if ($jk == 'P') {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>> Perempuan
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label text-left">Handphone:</label>
                                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                                        <input autocomplate="off" name="hp" type="number" class="form-control input-sm" placeholder="Handphone" value="<?php echo $no_hp ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label text-left">Alamat:</label>
                                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="alamat" class="form-control input-sm" placeholder="Alamat"><?php echo $alamat ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label text-left">Tahun Angkatan:</label>
                                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                                        <input autocomplate="off" name="thn_angkatan" type="number" class="form-control input-sm" placeholder="Tahun Angkatan" value="<?php echo $thn_angkatan ?>">
                                    </div>
                                </div>
                                <div class="form-group data-custon-pick" id="data_2">
                                    <label class="col-lg-2 control-label text-left"><b>Tahun Lulus:</b></label>
                                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" name="tgl_lulus" class="form-control" value="<?php echo $thn_lulus ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label text-left">Jurusan:</label>
                                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-select-list">
                                            <select class="form-control custom-select-value" name="jurusan" id="level">
                                                <option value="" selected="selected">Pilih Jurusan !!</option>
                                                <option value="Teknik Informatika" <?php if ($jurusan == 'Teknik Informatika') echo 'selected="selected"'; ?>>Teknik Informatika</option>
                                                <option value="Multimedia" <?php if ($jurusan == 'Multimedia') echo 'selected="selected"'; ?>>Multimedia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" class="btn btn-primary ft-compse" name="submit" value="Ubah data">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>