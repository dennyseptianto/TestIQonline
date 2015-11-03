<div class="container_12">
            <!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="?page=input" class="dashboard-module">
                	<img src="Crystal_Clear_write.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_write.gif" width="64" height="64" alt="edit" />
                	<span>Tambah Soal</span>
                </a>
                              
                <a href="?page=soal" class="dashboard-module">
                	<img src="Crystal_Clear_files.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_files.gif" width="64" height="64" alt="edit" />
                	<span>Manajemen Soal</span>
                </a>
				
				<a href="?page=user" class="dashboard-module">
                	<img src="user-group.png" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_files.gif" width="64" height="64" alt="edit" />
                	<span>Manajemen User</span>
                </a>
				
				<?php
					if($acces == 0)
					{
						echo '<a href="?page=admin" class="dashboard-module">
							<img src="administrator.png" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_files.gif" width="64" height="64" alt="edit" />
							<span>Manajemen Admin</span>
						</a>';
					}
				?>
                
				<a href="?page=ujian" class="dashboard-module">
                	<img src="Forms.jpg" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_stats.gif" width="64" height="64" alt="edit" />
                	<span>Data Tes</span>
                </a>
				
                <a href="?page=statistik" class="dashboard-module">
                	<img src="Crystal_Clear_stats.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_stats.gif" width="64" height="64" alt="edit" />
                	<span>Stats</span>
                </a>
                
                <a href="?page=setting" class="dashboard-module">
                	<img src="Crystal_Clear_settings.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_settings.gif" width="64" height="64" alt="edit" />
                	<span>Settings</span>
                </a>
                <div style="clear: both"></div>
            </div> <!-- End .grid_7 -->
            
            <!-- Account overview -->
            <div class="grid_5">
                <div class="module">
                        <h2><span>Member overview</span></h2>
                        
                        <div class="module-body">
                        
                        	<p>
                                <?php echo '<strong>User: </strong>'.$_SESSION['admin'].'<br />';
								if($acces == 0)
									{
										echo '<strong>Pangkat: </strong>Super Admin<br />';
									}
								else if($acces == 1)
									{
										echo '<strong>Pangkat: </strong>Admin<br />';
									}
                            echo '</p>';
							
							$persen1=($jenius!=0)?($jenius/$total) * 100:0;
							
                            echo ' <div>
                                 <div class="indicator">
                                     <div style="width: '.$persen1.'%;"></div>
                                 </div>
                                 <p>Kategori Jenius</p>
                             </div>';
							
							$persen2=($superior!=0)?($superior/$total) * 100:0;
							
                            echo ' <div>
                                 <div class="indicator">
                                     <div style="width: '.$persen2.'%;"></div>
                                 </div>
                                 <p>Kategori Superior</p>
                             </div>';
							
							$persen3=($tinggi!=0)?($tinggi/$total) * 100:0;
							
                            echo ' <div>
                                 <div class="indicator">
                                     <div style="width: '.$persen3.'%;"></div>
                                 </div>
                                 <p>Kategori Tinggi yang masih kategori normal</p>
                             </div>';
							
							$persen4=($normal!=0)?($normal/$total) * 100:0;
							
                            echo ' <div>
                                 <div class="indicator">
                                     <div style="width: '.$persen4.'%;"></div>
                                 </div>
                                 <p>Kategori Normal</p>
                             </div>';
							
							$persen5=($rendahnor!=0)?($rendahnor/$total) * 100:0;
							
                            echo ' <div>
                                 <div class="indicator">
                                     <div style="width: '.$persen5.'%;"></div>
                                 </div>
                                 <p>Kategori Rendah yang masih dalam kategori normal</p>
                             </div>';
							
							$persen6=($rendah!=0)?($rendah/$total) * 100:0;
							
                            echo ' <div>
                                 <div class="indicator">
                                     <div style="width: '.$persen6.'%;"></div>
                                 </div>
                                 <p>Kategori Rendah</p>
                             </div>';
							 ?>

                        </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End .grid_5 -->
            
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->