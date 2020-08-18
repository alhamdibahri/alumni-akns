<div class="data-table-area mg-b-15" style="margin-top:80px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="sparkline13-list">
					<div class="sparkline13-hd">
						<div class="main-sparkline13-hd">
							<h1><i class="fa fa-database"></i> Data <span class="table-project-n">user</span></h1>
						</div>
					</div>
					<?php
					if (isset($_GET['error'])) {
						echo '<div class="alert alert-danger alert-mg-b">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
                                <strong>ops!</strong> Data tidak dapat dihapus karena berelasi dengan tabel lain
                            </div>';
					}
					?>
					<a href="page-form-user.php?req=add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
					<div class="sparkline13-graph">
						<div class="datatable-dashv1-list custom-datatable-overright">
							<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode User</th>
										<th>Username</th>
										<th>Level</th>
										<th>Email</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = mysqli_query($connect, "SELECT * FROM login");
									$no = 1;
									while ($data = mysqli_fetch_array($sql)) {
										?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $data['kodeuser'] ?></td>
											<td><?php echo $data['username'] ?></td>
											<td><?php echo $data['level'] ?></td>
											<td><?php echo $data['email'] ?></td>
											<td>
												<center>
													<a href="page-form-user.php?req=edit&kodeuser=<?php echo $data['kodeuser'] ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
													<a href="action-user.php?action=dell&kodeuser=<?php echo $data['kodeuser'] ?>" class="btn btn-default" onclick="return confirm('yakin ingin menghapus data?');"><i class="fa fa-trash"></i></a>
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