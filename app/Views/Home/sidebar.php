<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section  class="alt">

								<div>
									<a href="<?= base_url('Home');?>"> <img src="<?= base_url('images/sidebar.png');?>"></a>
										
								</div>
								<br>
								
	

								  
								<form method="GET" id="myform" action="<?= base_url('Home/Search');?>">
								<div class="input-group mb-3">
									<input type="text"  class="form-control" name="query" id="query" placeholder="Search" aria-describedby="basic-addon2">
									<a href="#" id="button-addon2" onclick="document.getElementById('myform').submit()" class="button-html icon solid fa-search"></a>
									
  									
								</div>

								
								</form>
									

								
								
								</section>

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="<?= base_url('Home');?>">Homepage</a></li>
										<?php foreach ($kategori as $row) {
											if(is_null($row->parent_kategori1) && is_null($row->id_kategori1)) { ?>
										   <li>
											<span class="opener"><?php echo $row->nama_kategori;?></span>
											<ul>
											<?php foreach ($kategori as $row1) { 
												if($row1->id_kategori1 == $row->id_kategori) { ?>
												<li><a href="<?= base_url('Home/Category/'.$row1->id_kategori);?>"><?php echo $row1->nama_kategori;	?></a></li>
												
											<?php }} ?>	
											</ul>
											
										</li>
										<?php }} ?>
										
									</ul>
								</nav>

							<!-- Section -->


							<!-- Section -->
							
								<section>
									<header class="major">
										<h2>Contact Us</h2>
									</header>
									<?php foreach ($kontak as $row) { ?>
									<p><b><?php echo $row->nama;?></b></p>
									<ul class="contact">
										<li class="icon solid fa-envelope"> <?= safe_mailto($row->email, $row->email);?></li>
										<li class="icon solid fa-phone"><?php echo $row->no_hp;?></li>
										<li class="icon solid fa-building"><?php echo $row->alamat;?></li>
									</ul>
									<?php } ?>
									</section>
								<!-- <section>
									<div style="width: 50%; float:left">
										<img src="https://milwaukeeinstruments.eu/media/b3/62/89/1640102151/logo-white.png">
									</div>

									<div style="width: 50%; float:right">
   										#right content in there
									</div>
								</section> -->

