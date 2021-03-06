<?php require_once('../Connections/koneksi.php'); ?>
<?php require_once('hak_akses.php'); ?>
<?php $page = "kelola_dana"; ?>
<?php $sub = "data"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<title>INPUT BELANJA DESA - Desa Tamban Jaya</title>
	<!-- Favicons -->
	<link href="../img/icon.png" rel="icon">
	<link href="../img/icon.png" rel="apple-touch-icon">
	<!-- Bootstrap core CSS -->
	<link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!--external css-->
	<link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="../lib/select2/select2.min.css" rel="stylesheet" />
	<!-- Custom styles for this template -->
	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/style-responsive.css" rel="stylesheet">
	<!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
	License: https://templatemag.com/license/
	======================================================= -->
</head>

<body>
	<section id="container">
		<!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
		<!--header start-->
		<?php require_once('header.php'); ?>
		<!--header end-->
		<!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
		<!--sidebar start-->
		<?php require_once('sidebar.php'); ?>
		<!--sidebar end-->
		<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
		<!--main content start-->
		<section id="main-content">
			<section class="wrapper site-min-height">
				<h3><b>INPUT DATA BELANJA DESA</b></h3>
				<div class="row mt">
					<div class="col-lg-12">
						<!-- START FORM -->
						<div class="row mt">
							<div class="col-lg-12">
								<div class="form-panel">
									<form class="form-horizontal style-form" action="../proses/simpan/belanja.php" name="formBelanja" id="formBelanja" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-sm-2 col-sm-2 control-label" for="nama_sub_rekening">Nama Belanja </label>
											<div class="col-sm-10">
												<select class="form-control cmbbox" name="sub_rekening" id="sub_rekening" required>
													<option value="">- Pilih Nama Belanja -</option>
													<?php
													mysql_select_db($database_koneksi, $koneksi);
													$tampil = "SELECT * FROM sub_rekening ORDER BY kd_sub_rekening ASC";
													$query = mysql_query($tampil, $koneksi) or die(mysql_error());
													$r = mysql_fetch_assoc($query);
													do { ?>
														<option value="<?= $r['kd_sub_rekening']; ?>"><?= $r['kd_sub_rekening'] . " - " . $r['nama_sub_rekening']; ?></option>
													<?php } while ($r = mysql_fetch_assoc($query)); ?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 col-sm-2 control-label" for="jenis_belanja">Jenis Belanja </label>
											<div class="col-sm-10">
												<select class="form-control cmbbox" name="jenis_belanja" id="jenis_belanja" required>
													<option value="">- Pilih Jenis Belanja -</option>
													<?php
													mysql_select_db($database_koneksi, $koneksi);
													$tampil = "SELECT * FROM belanja ORDER BY kd_belanja ASC";
													$query = mysql_query($tampil, $koneksi) or die(mysql_error());
													$r = mysql_fetch_assoc($query);
													do { ?>
														<option value="<?= $r['kd_belanja']; ?>"><?= $r['kd_belanja'] . " - " . $r['nama_belanja']; ?></option>
													<?php } while ($r = mysql_fetch_assoc($query)); ?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 col-sm-2 control-label">Besar Belanja</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" placeholder="Masukkan Nominal Belanja" name="besar_belanja" id="besar_belanja" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 col-sm-2 control-label" for="thn_anggaran">Tahun Belanja</label>
											<div class="col-sm-10">
												<select class="form-control cmbbox" name="thn_belanja" id="thn_belanja" required>
													<option value="">- Pilih Tahun Belanja -</option>
													<?php
													mysql_select_db($database_koneksi, $koneksi);
													$tampil = "SELECT * FROM tahun ORDER BY nama_tahun ASC";
													$query = mysql_query($tampil, $koneksi) or die(mysql_error());
													$r = mysql_fetch_assoc($query);
													do { ?>
														<option value="<?= $r['nama_tahun']; ?>"><?= $r['nama_tahun']; ?></option>
													<?php } while ($r = mysql_fetch_assoc($query)); ?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 col-sm-2 control-label">Sumber Belanja</label>
											<div class="col-sm-10">
												<?php
												mysql_select_db($database_koneksi, $koneksi);
												$tampil = "SELECT * FROM sumber ORDER BY kd_sumber ASC";
												$query = mysql_query($tampil, $koneksi) or die(mysql_error());
												$r = mysql_fetch_assoc($query);
												do { ?>
													<label>
														<input type="radio" name="kd_sumber" value="<?= $r['kd_sumber']; ?>"> <?= $r['nama_sumber']; ?>
													</label><br>
												<?php } while ($r = mysql_fetch_assoc($query)); ?>
											</div>
										</div>
										<button type="submit" class="btn btn-theme03"><i class="fa fa-save"></i> SIMPAN</button>
									</form>
								</div>
							</div>
						</div>
						<!-- END FORM -->
					</div>
				</div>
			</section>
			<!-- /wrapper -->
		</section>
		<!-- /MAIN CONTENT -->
		<!--main content end-->
		<!--footer start-->
		<?php require_once('../halaman/footer.php'); ?>
		<!--footer end-->
	</section>
	<!-- js placed at the end of the document so the pages load faster -->
	<script src="../lib/jquery/jquery.min.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="../lib/jquery-ui-1.9.2.custom.min.js"></script>
	<script src="../lib/jquery.ui.touch-punch.min.js"></script>
	<script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
	<script src="../lib/jquery.scrollTo.min.js"></script>
	<script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
	<!--common script for all pages-->
	<script src="../lib/common-scripts.js"></script>
	<!--custom checkbox & radio-->
	<script src="../lib/select2/select2.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.cmbbox').select2();
		});
	</script>
</body>

</html>