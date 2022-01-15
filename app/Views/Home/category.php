<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>

		<style>

		img {
    		max-width: 100%;
    		max-height: 100%;
			}

		.centerit {
    		width: 100px;
    		height: 100px;
    		
    		position: absolute;
    		
    		left: 0;
    		right: 0;
   			margin: auto;
}


	

</style>
		<title>CV. Karya Graha Agung</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>" />


	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
							<header id="header">
									
									<p>Showing <strong><?= $begin;?> - <?= $end;?></strong> out Of <strong><?= $count?></strong> results for <strong>"<?php foreach ($query as $row) {echo $row->nama_kategori;}?>"</strong></p>
									
								</header>
							<!-- Content -->
							<section>
							<?php 
							foreach ($product_category as $row) { ?>
								<a style="color:inherit" href=<?= base_url('Home/Products/'.$row->id_katalog);?>>
								<h3><?php echo $row->nama_barang;?></h3>
								<p><?php echo $row->deskripsi;?></p>
								</a>
								<hr>
							<?php } ?>
							</section>
							<div class="centerit">
							<?= $pager; ?>


							</div>
							
								

						</div>
					</div>

				<!-- Sidebar -->
				<?= $this->include('Home/sidebar') ?>
							<section>
									
									
									</section>
							<!-- Footer -->
							

						</div>
					</div>

			</div>

		<!-- Scripts -->
		<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.bundle.js');?>"></script>
			<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>


			<script src="<?php echo base_url('assets/js/browser.min.js');?>"></script>
			<script src="<?php echo base_url('assets/js/breakpoints.min.js');?>"></script>
			<script src="<?php echo base_url('assets/js/util.js');?>"></script>
			<script src="<?php echo base_url('assets/js/main.js');?>"></script>

	</body>
</html>
