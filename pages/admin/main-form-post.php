<?php
if (isset($_GET['req']) && $_GET['req'] == 'edit') {
    $urutpost = $_GET['kodepost'];
    $namaform = '<i class="fa fa-edit"></i> Update';
    $query = mysqli_query($connect, "SELECT * FROM post WHERE kode_post='" . $urutpost . "'");
    $data = mysqli_fetch_array($query);
    $tgl = explode('-', $data['tanggal_post']);
    $tgl_post = $tgl[2] . "/" . $tgl[1] . "/" . $tgl[0];
    $judul = $data['judul'];
    $deskripsi = $data['deskripsi'];
    $id_type = $data['id_type'];
    $gambar = $data['gambar'];
} elseif (isset($_GET['req']) && $_GET['req'] == 'add') {
    $namaform = '<i class="fa fa-plus"></i> New';
    $urutpost = penomoranOtomatis("post", "kode_post", "PST-");
    $tgl_post = date("d/m/Y");;
    $judul = '';
    $deskripsi = '';
    $id_type = '';
    $gambar = '';
    $_SESSION['kodepost'] = $urutpost;
}
?>
<div class="mailbox-compose-area mg-b-15" style="margin-top:70px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                <div class="hpanel email-compose">
                    <div class="panel-heading hbuilt">
                        <div class="p-xs h4">
                            <?php echo $namaform ?> Post
                        </div>
                    </div>
                    <div id="pesan"></div>
                    <form id="formku" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="req" value="<?php echo $_GET['req'] ?>" />
                        <div class="panel-heading hbuilt">
                            <div class="p-xs">
                                <div class="form-group">
                                    <label class="col-lg-1 control-label text-left">Kode:</label>
                                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                        <input value="<?php echo $urutpost ?>" name="kodepost" type="text" class="form-control input-sm" placeholder="Kode Post" readonly="readonly">
                                        <span class="help-block small" style="color:#F00;" id="error_kodepost"></span>
                                    </div>
                                </div>
                                <div class="form-group data-custon-pick" id="data_2">
                                    <label class="col-lg-1 control-label text-left"><b>Tanggal:</b></label>
                                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                        <div class="input-group date" data-date-format="yyyy-mm-dd">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" name="tgl_post" class="form-control" value="<?php echo $tgl_post ?>">
                                        </div>
                                        <span class="help-block small" style="color:#F00;" id="error_tglpost"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-1 control-label text-left">Tipe:</label>
                                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                        <select class="form-control custom-select-value" name="type_post">
                                            <option selected="selected" value="">Pilih tipe post!!!</option>
                                            <?php
                                            $query = mysqli_query($connect, "SELECT * FROM post_type");
                                            while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                <option value="<?php echo $data['id_type'] ?>" <?php if ($data['id_type'] == $id_type) {
                                                                                                    echo 'selected="selected"';
                                                                                                } ?>><?php echo $data['type_post'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="help-block small" style="color:#F00;" id="error_typepost"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-1 control-label text-left">Judul:</label>
                                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                        <input name="judul" value="<?php echo $judul ?>" type="text" class="form-control input-sm" placeholder="Judul Post" autocomplete="off">
                                        <span class="help-block small" style="color:#F00;" id="error_judulpost"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-1 control-label text-left">Deskripsi:</label>
                                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="deskripsi" type="text" class="form-control input-sm" placeholder="Deskripsi Post"><?php echo $deskripsi ?></textarea>
                                        <span class="help-block small" style="color:#F00;" id="error_deskripsi"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-1 control-label text-left">File:</label>
                                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                        <div class="file-upload-inner file-upload-inner-right ts-forms">
                                            <div class="input append-small-btn">
                                                <div class="file-button">
                                                    Browse <input type="file" onchange="document.getElementById('append-small-btn').value = this.value;" name="file"></div>
                                                <input readonly="readonly" value="<?php echo $gambar ?>" type="text" id="append-small-btn" placeholder="no file selected" name="txtfile">
                                            </div>
                                        </div>
                                        <span class="help-block small" style="color:#F00;" id="error_file"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button id="tombolsimpan" class="btn btn-sm btn-primary login-submit-cs">Save post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>