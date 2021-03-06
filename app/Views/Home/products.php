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

		.img-fit{
			max-width: 600px;
    		max-height: 400px;
		}
		
		

		.centerit {
			width: 100px;
    		height: 100px;
    		position: absolute;
    		top:0;
    		bottom: 0;
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
									<h2><?php foreach ($product as $row) { echo $row->nama_barang;}?></h2>
									
								</header>
							<!-- Content -->
							<section>
							
							<?php foreach ($product as $row) { ?>
							
							<span class="image fit left"><img class="img-fit" src="<?= base_url('uploads/'.$row->image);?>" alt=""  style="border: 5px solid #555";/></span>
							<p style="text-align: justify; text-justify: inter-word;"><?= $row->deskripsi;?></p><br>

							
							<p style="font-size: 150%;font-family: helvetica;">	
							
							<strong>Category : </strong><?= $row->nama_kategori;?><br>
							<strong>Price : </strong><?="IDR ".number_format($row->harga,0,',','.'); ?><br>
							<strong>Brand : </strong><?= $row->nama_merek;?><br>
							<strong>Stock : </strong><?= $row->stok;?></p>
							
							</p>		
							<?php } ?>		
									
							</section>
							
								

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
