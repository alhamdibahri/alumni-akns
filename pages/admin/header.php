<?php
include '../../config/funct.php';
$queryUser = mysqli_query($connect, "SELECT * FROM login WHERE username='" .  $_SESSION['username'] . "'");
$dataUser = mysqli_fetch_array($queryUser);
?>
<div class="header-advance-area">
	<div class="header-top-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="header-top-wraper">
						<div class="row">
							<div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
								<div class="menu-switcher-pro">
									<button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
										<i class="educate-icon educate-nav"></i>
									</button>
								</div>
							</div>
							<div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
								<div class="header-top-menu tabl-d-n">
									<ul class="nav navbar-nav mai-top-nav">
										<li class="nav-item">
											<a>Selamat Datang <?php echo $_SESSION['username'] ?>
												<i class="fas fa-smile"></i></a>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
								<div class="header-right-info">
									<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span class="indicator-nt"></span></a>
									<ul class="nav navbar-nav mai-top-nav header-right-menu">
										<li class="nav-item dropdown">
											<?php $queryComment = mysqli_query($connect, "SELECT * FROM login l , comment c WHERE l.kodeuser=c.kodeuser AND c.lihat='0'");
											$num = mysqli_num_rows($queryComment);
											?>
											<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-comment" aria-hidden="true"></i><span class="badge bg-important"><?php echo $num; ?></span></a>
											<div role="menu" class="author-message-top dropdown-menu animated zoomIn">
												<div class="message-single-top">
													<h1>Message</h1>
												</div>
												<ul class="message-menu">
													<?php
													while ($dataComment = mysqli_fetch_array($queryComment)) {
														?>
														<li>
															<a href="../../blog-single.php?category=<?php echo $dataComment['kode_post'] ?>">
																<div class="message-img">
																	<img src="upload/<?php echo $dataComment['gambar'] ?>" alt="">
																</div>
																<div class="message-content">
																	<span class="message-date"><?php echo TanggalIndo($dataComment['tanggal_comment']) ?></span>
																	<h2><?php echo $dataComment['username'] ?></h2>
																	<p><?php echo $dataComment['deskripsi_comment'] ?></p>
																</div>
															</a>
														</li>
													<?php } ?>
												</ul>
											</div>
										</li>
										<li class="nav-item">
											<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
												<img src="upload/<?php echo $dataUser['gambar'] ?>" alt="" />
												<span class="admin-name"><?php echo $dataUser['username'] ?></span>
												<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
											</a>
											<ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
												<li>
													<a href="../../logout.php"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Mobile Menu start -->
	<!-- Mobile Menu end -->
</div>