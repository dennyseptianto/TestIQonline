<?php
									if (isset($_SESSION['username']))
									{
										if($_SESSION['username'] || isset($_SESSION['username'])) {
											echo '<a href="index.php?page=tes"><button type="submit" class="btn btn-info mrgn-mulai">Mulai Test</button> </a>';
										}
									}
									else {	
										
										?>
											<div class="sign">Create Your Account</div>
											<div class="banner-forms">
												<form name="daftar" method="post" action="">
                                                	
													<input class="name" type="text" name="id" value="" placeholder="Username" required>
													<input class="mail2" type="text" name="nama" value="" placeholder="Nama Lengkap" required >
													<input class="mail2" type="password" name="password" value="" placeholder="Password" required >
													<input class="mail2" type="email" name="email" value="" placeholder="Email" required>
													<input class="mail2" type="text" id="datepicker" name="tgl_lahir" value="" placeholder="Tanggal Lahir" required >
													
														
														
													<button type="submit" name="Daftar" value="Daftar" class="btn btn-info mrgn-can">Sign Up</button>
                                                    <div class="emailservice">or Sign Up with :</div>
                                                    <button type="submit" class="btn btn-info mrgn-can2">+Google</button>
                                                    <button type="submit" class="btn btn-info mrgn-can3">Facebook</button>
												</form>
											</div><?php
									}
								?>
