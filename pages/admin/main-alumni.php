<div class="data-table-area mg-b-15" style="margin-top:80px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="sparkline13-list">
					<div class="sparkline13-hd">
						<div class="main-sparkline13-hd">
							<h1><i class="fa fa-database"></i> Data <span class="table-project-n">Alumni Tahun <?php echo $_GET['tahun'] ?></span></h1>
						</div>
					</div>
					<?php
					$sql = mysqli_query($connect, "SELECT * FROM data_alumni WHERE tahun_angkatan='" . $_GET['tahun'] . "'");
					if (isset($_GET['error'])) {
						echo '<div class="alert alert-danger alert-mg-b">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
                                <strong>ops!</strong> Data tidak dapat dihapus karena berelasi dengan tabel lain
                            </div>';
					}
					?>
					<div class="sparkline13-graph">
						<div class="datatable-dashv1-list custom-datatable-overright">
							<table id="table" data-toggle="table" data-pagination="true" data-search="true">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Lengkap</th>
										<th>Jenis Kelamin</th>
										<th>Alamat</th>
										<th>Tahun Angkatan</th>
										<th>Tahun Lulus</th>
										<th>Jurusan</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									while ($data = mysqli_fetch_array($sql)) {
										?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $data['nama_lengkap'] ?></td>
											<td><?php echo jk($data['jenis_kelamin']) ?></td>
											<td><?php echo $data['alamat'] ?></td>
											<td><?php echo $data['tahun_angkatan'] ?></td>
											<td><?php echo TanggalIndo($data['tahun_lulusan']) ?></td>
											<td><?php echo $data['jurusan'] ?></td>
											<td>
												<center>
													<a href="page-form-alumni.php?req=edit&kode_alumni=<?php echo $data['kode_alumni'] ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
													<a href="action-alumni.php?req=dell&kode_alumni=<?php echo $data['kode_alumni'] ?>&tahun=<?php echo $_GET['tahun'] ?>" class="btn btn-default" onclick="return confirm('yakin ingin menghapus data?');"><i class="fa fa-trash"></i></a>
												</center>
											</td>
										</tr>
										<?php $no++;
									} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>