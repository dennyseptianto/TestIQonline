			<nav class="navbar navbar-default">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><h1>Test IQ Online</h1><br /><span>Intelligence Quotient Test</span></a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right margin-top cl-effect-2">
								<?php
									if (isset($_SESSION['username']))
									{
										if($_SESSION['username'] || isset($_SESSION['username'])) {
											foreach($atas as $data)
											{
												
												if($data['kategori']==1){
													
													if($data['index']==5){
														echo '<li role="presentation" class="dropdown">
																<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents" aria-expanded="false"><span data-hover='.$data['nama'].'>'.$data['nama'].'</span></a>
																<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
																	<li><a href="?page=edit" tabindex="-1" role="tab" id="dropdown1-tab"  aria-controls="dropdown1">Edit Akun</a></li>
																	<li><a href="?page=ubah" tabindex="-1" role="tab" id="dropdown2-tab"  aria-controls="dropdown2">Ubah Kata Sandi</a></li>
																</ul>
															</li>';
													}
													
													else{
														echo '<li>
														<a href='.$data['link'].'>
															<span data-hover='.$data['nama'].'>'.$data['nama'].'</span>
														</a>
														</li>';
													}
												}
											}
										}
									}
									else {	
										foreach($atas as $data)
										{
											if($data['kategori']==0 || $data['kategori']==2){
												echo '<li>
													<a href='.$data['link'].'>
													<span data-hover='.$data['nama'].'>'.$data['nama'].'</span></a>
													</li>';
												}
											if($data['index']==4)
											{echo '<li>
													<a href='.$data['link'].'>
													<span data-hover='.$data['nama'].'>'.$data['nama'].'</span></a>
													</li>';
												}
										}
									}
								?>
								
							</ul>
							<div class="clearfix"></div>
						</div><!-- /.navbar-collapse -->
						<div class="clearfix"></div>
				</div><!-- /container-fluid -->
			</nav>
			
		