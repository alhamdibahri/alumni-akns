<?php
if (isset($_GET['req']) && $_GET['req'] == 'edit') {
	$namaform = '<i class="fa fa-edit"></i> Edit';
	$kodeuser = $_GET['kodeuser'];
	$query = mysqli_query($connect, "SELECT * FROM login WHERE kodeuser='" . $kodeuser . "'");
	$data = mysqli_fetch_array($query);
	$username = $data['username'];
	$password = $data['password'];
	$level = $data['level'];
	$email = $data['email'];
	$gambar = $data['gambar'];
} elseif (isset($_GET['req']) && $_GET['req'] == 'add') {
	$namaform = '<i class="fa fa-plus"></i> Tambah';
	$kodeuser = penomoranOtomatis("login", "kodeuser", "USR-");
	$username = '';
	$password = '';
	$level = '';
	$email = '';
	$_SESSION['kode'] = $kodeuser;
}
?>
<div class="basic-form-area mg-b-15" style="margin-top:40px;">
	<div class="container-fluid">
		<div class="row" style="margin-top:30px;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="sparkline12-list">
					<div class="sparkline12-hd">
						<div class="main-sparkline12-hd">
							<h1><?php echo $namaform; ?> User</h1>
						</div>
					</div>
					<div class="sparkline12-graph">
						<div class="basic-login-form-ad">
							<div id="pesan"></div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="all-form-element-inner">
										<form id="formku" enctype="multipart/form-data">
											<input type="hidden" name="req" value="<?php echo $_GET['req'] ?>">
											<div class="form-group-inner">
												<div class="row">
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
														<label class="login2 pull-right pull-right-pro">Kode User</label>
													</div>
													<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
														<input value="<?php echo $kodeuser ?>" placeholder="Kode User" type="text" class="form-control" id="kodeuser" name="kodeuser" readonly="readonly">
														<span class="help-block small" style="color:#F00;" id="error_kodeuser"></span>
													</div>
												</div>
											</div>
											<div class="form-group-inner">
												<div class="row">
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
														<label class="login2 pull-right pull-right-pro">Username</label>
													</div>
													<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
														<input autocomplete="off" type="text" value="<?php echo $username ?>" placeholder="Username" class="form-control" name="username" id="username">
														<span class="help-block small" style="color:#F00;" id="error_username"></span>
													</div>
												</div>
											</div>
											<div class="form-group-inner">
												<div class="row">
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
														<label class="login2 pull-right pull-right-pro">Password</label>
													</div>
													<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
														<input placeholder="**********" type="password" value="<?php echo $password ?>" class="form-control" name="password" id="password">
														<span class="help-block small" style="color:#F00;" id="error_password"></span>
													</div>
												</div>
											</div>
											<div class="form-group-inner">
												<div class="row">
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
														<label class="login2 pull-right pull-right-pro">Level</label>
													</div>
													<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
														<div class="form-select-list">
															<select class="form-control custom-select-value" name="level" id="level">
																<option value="" selected="selected">Pilih Level !!</option>
																<option value="Admin" <?php if ($level == 'Admin') {
																							echo 'selected="selected"';
																						} ?>>Admin</option>
																<option value="User" <?php if ($level == 'User') {
																							echo 'selected="selected"';
																						} ?>>User</option>
															</select>
															<span class="help-block small" style="color:#F00;" id="error_level"></span>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group-inner">
												<div class="row">
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
														<label class="login2 pull-right pull-right-pro">Email</label>
													</div>
													<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
														<input autocomplete="off" value="<?php echo $email ?>" placeholder="Email" type="email" class="form-control" name="email" id="email">
														<span class="help-block small" style="color:#F00;" id="error_email"></span>
													</div>
												</div>
											</div>
											<?php if (isset($_GET['req']) && $_GET['req'] == 'edit') { ?>
												<div class="form-group-inner">
													<div class="row">
														<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
															<label class="login2 pull-right pull-right-pro"></label>
														</div>
														<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
															<img src="upload/<?php echo $gambar ?>" alt="" width="200" height="200">
														</div>
													</div>
												</div>
											<?php } ?>
											<div class="form-group-inner">
												<div class="row">
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
														<label class="login2 pull-right pull-right-pro">Foto</label>
													</div>
													<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
														<div class="file-upload-inner ts-forms">
															<div class="input prepend-big-btn">
																<label class="icon-right" for="prepend-big-btn">
																	<i class="fa fa-download"></i>
																</label>
																<div class="file-button">
																	Browse
																	<input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;" name="file">
																</div>
																<input readonly type="text" id="prepend-big-btn" placeholder="no file selected">
															</div>
														</div>
														<span class="help-block small" style="color:#F00;" id="error_file"></span>
													</div>
												</div>
											</div>
											<div class="form-group-inner">
												<div class="login-btn-inner">
													<div class="row">
														<div class="col-lg-3"></div>
														<div class="col-lg-9">
															<div class="login-horizental cancel-wp pull-left form-bc-ele">
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