<link rel="stylesheet" href="jquery-ui.css" />
<script src="jquery-ui.js"></script>
				<div class="header-banner">
					<!-- Top Navigation -->
					<div class="container page-seperator">
					<section class="color bgi">
						<div class="container"> 
						<div class="banneer-text">
						<h3>Ukur IQmu via Online</h3>
						<h4>Daftar Sekarang Juga ! >></h4>
							
						<a href="index.php?page=description"><button type="button" class="btn btn-warning but1" href="index.php?page=description">Apa itu Test IQ?</button></a>
						<p>Didalam web kami juga menyediakan fasilitas rata-rata tingkat kecerdasan orang yang pernah mengikuti tes kecerdasan berdasarkan kelompok umur. Hal ini bertujuan agar pengunjung dapat mengetahui apakah sudah berada diatas tingkat kecerdasan rata-rata atau tidak.</p>
						
						</div>
						
						
							<?php
									if (isset($_SESSION['username']))
									{
										if($_SESSION['username'] || isset($_SESSION['username'])) {
											echo "";
										}
									}
									else {	
										
										?>
											<div class="sign">Create Your Account</div>
											<div class="banner-forms">
												<form name="daftar" method="post" action="">
                                                	
													<input class="name" type="text" name="id" value="" placeholder="Username" required onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your name';}">
													<input class="mail2" type="text" name="nama" value="" placeholder="Nama Lengkap" required onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail';}">
													<input class="mail2" type="password" name="password" value="" placeholder="Password" required onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
													<input class="mail2" type="email" name="email" value="" placeholder="Email" required onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tanggal Lahir';}">
													<input class="mail2" type="text" id="datepicker" name="tgl_lahir" value="" placeholder="Tanggal Lahir" required onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tanggal Lahir';}">
													
														
														
													<button type="submit" name="Daftar" value="Daftar" class="btn btn-info mrgn-can">Sign Up</button>
                                                    <div class="emailservice">or Sign Up with :</div>
                                                    <button type="submit" class="btn btn-info mrgn-can2">Google</button>
                                                    <button type="submit" class="btn btn-info mrgn-can3">Facebook</button>
												</form>
											</div><?php
									}
								?>
						
						
						<div class="clearfix"> </div>
					</section>
					
					</div>
					</div>
				</div>