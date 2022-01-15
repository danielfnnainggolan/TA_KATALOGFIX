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
		.carousel-item
		{
			height: 600px;
			overflow: hidden;
			width: auto;
		}

		.carousel-item > img
		{
    	width: 100%;
    	height: 100%;
    	object-fit: cover;
		}

		.carousel carousel-indicators li
		{
  		width: 10px;
  		height: 10px;
  		border-radius: 100%;
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

							<!-- Content -->
								<section>
									
									<div id="carouselExampleIndicators" class="carousel slide carousel-dark" data-bs-ride="carousel" style="position: relative;">
  									<div class="carousel-indicators">
    									<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    									<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
  									</div>
  									<div class="carousel-inner">
    									<div class="carousel-item active">
      									<img src="<?php echo base_url('images/img2.webp');?>" class="d-block w-100 img-fluid" alt="...">
    									</div>
    									<div class="carousel-item">
      									<img src="<?php echo base_url('images/animasi_5.gif');?>" class="d-block w-100 img-fluid" alt="...">
    									</div>
  									</div>
  										<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    										<span class="visually-hidden">Previous</span>
  										</button>
  										<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    										<span class="carousel-control-next-icon" aria-hidden="true"></span>
    										<span class="visually-hidden">Next</span>
  										</button>
									</div>




								</section>

								<section>
									<header class="major">
										<h2>Our Services</h2>
									</header>
									<div class="features">
										<article>
											<span class="icon fa-gem"></span>
											<div class="content">
												<h3>Portitor ullamcorper</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon solid fa-paper-plane"></span>
											<div class="content">
												<h3>Sapien veroeros</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon solid fa-rocket"></span>
											<div class="content">
												<h3>Quam lorem ipsum</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon solid fa-signal"></span>
											<div class="content">
												<h3>Sed magna finibus</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
									</div>
								</section>

							<!-- Section -->
								

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
