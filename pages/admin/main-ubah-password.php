<?php
session_start();
$sql = "SELECT * FROM login WHERE username='" . $_SESSION['username'] . "'";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($query);
?>
<div class="mailbox-compose-area mg-b-15" style="margin-top:50px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                <div class="hpanel email-compose">
                    <div class="panel-heading hbuilt">
                        <div class="p-xs h4">
                            <i class="fas fa-key"></i> Ubah Password
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['submit'])) {
                        if ($_POST['lama'] != $data['password']) {
                            echo '<div class="alert alert-danger alert-mg-b">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
													<strong>Ops!</strong> password lama anda salah
											   </div>';
                        } elseif ($_POST['baru'] == '') {
                            echo '<div class="alert alert-danger alert-mg-b">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
													<strong>Ops!</strong> password baru anda kosong
											   </div>';
                        } else {
                            updatedata('login', 'password="' . $_POST['baru'] . '"', 'username="' . $_SESSION['username'] . '"');
                            echo '<div class="alert alert-success alert-mg-b">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
													<strong>wow!</strong> password berhasil di ubah
											   </div>';
                        }
                    }
                    ?>

                    <form method="post" action="page-ubah-password.php" class="form-horizontal">
                        <div class="panel-heading hbuilt">
                            <div class="p-xs">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label text-left">Username:</label>
                                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                                        <input readonly autocomplate="off" name="username" type="text" class="form-control input-sm" placeholder="Username" value="<?php echo $_SESSION['username'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label text-left">Password lama:</label>
                                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                                        <input autocomplate="off" name="lama" type="password" class="form-control input-sm" placeholder="*******" value="<?php echo isset($_POST['lama']) ? $_POST['lama'] : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label text-left">Password baru:</label>
                                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                                        <input autocomplate="off" name="baru" type="password" class="form-control input-sm" placeholder="*******" value="<?php echo isset($_POST['baru']) ? $_POST['baru'] : '' ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" class="btn btn-primary ft-compse" name="submit" value="Ubah password">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>