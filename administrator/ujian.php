<?php
	if (isset($_POST['filter']))
	{
		if ($_POST['filter'] == 'k1') 
		{
			try{
				$sql = 'SELECT * FROM ujian where kd_kategori = ?'; 
				$ssql = $db->prepare($sql);
				$acces = $_POST['filter'];
				$ssql->execute(array($acces));
				$res = $ssql->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		else if ($_POST['filter'] == 'k2') 
		{
			try{
				$sql = 'SELECT * FROM ujian where kd_kategori = ?'; 
				$ssql = $db->prepare($sql);
				$acces = $_POST['filter'];
				$ssql->execute(array($acces));
				$res = $ssql->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		else if ($_POST['filter'] == 'k3') 
		{
			try{
				$sql = 'SELECT * FROM ujian where kd_kategori = ?'; 
				$ssql = $db->prepare($sql);
				$acces = $_POST['filter'];
				$ssql->execute(array($acces));
				$res = $ssql->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		else
		{
			try{
			$sql = "SELECT * FROM ujian";
			$res = $db->query($sql); } 
			catch (PDOException $e) { echo $e->getMessage(); 
			}
		}
	}
	else
	{
		try{
			$sql = "SELECT * FROM ujian";
			$res = $db->query($sql); } 
			catch (PDOException $e) { echo $e->getMessage(); 
		}
	}
?>

		<div class="container_12">

            <div style="clear:both;"></div>
            
            
            
            <div class="grid_12">
                
                
                <div class="bottom-spacing">
                
                    
                    <!-- Table records filtering -->
                     
					<form name="filter" method="POST" action="">
					Filter:
                    <select class="input-short" name="filter">
                    	<?php	
						if (isset($_POST['filter']))
							{
								if($_POST['filter'] == 'k1')
								{
									echo '<option value="">Tampilkan Semua</option>';
									echo '<option selected value="k1">Anak-anak</option>';
									echo '<option value="k2">Remaja</option>';
									echo '<option value="k3">Dewasa</option>';
								}
								else if($_POST['filter'] == 'k2')
								{
									echo '<option value="">Tampilkan Semua</option>';
									echo '<option value="k1">Anak-anak</option>';
									echo '<option selected value="k2">Remaja</option>';
									echo '<option value="k3">Dewasa</option>';
								}
								else if($_POST['filter'] == 'k3')
								{
									echo '<option value="">Tampilkan Semua</option>';
									echo '<option value="k1">Anak-anak</option>';
									echo '<option value="k2">Remaja</option>';
									echo '<option selected value="k3">Dewasa</option>';
								}
								else
								{
									echo '<option selected value="">Tampilkan Semua</option>';
									echo '<option value="k1">Anak-anak</option>';
									echo '<option value="k2">Remaja</option>';
									echo '<option value="k3">Dewasa</option>';
								}
							}
						else{
							echo '<option selected value="">Tampilkan Semua</option>';
							echo '<option value="k1">Anak-anak</option>';
							echo '<option value="k2">Remaja</option>';
							echo '<option value="k3">Dewasa</option>';
						}
						?>
                    </select>
						<input class="submit-green" type="submit" value="Filter" />
					</form>
                </div>
                
                
                <!-- Example table -->
                <div class="module">
                	<h2><span>Tabel Soal</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
									<th style="width:5%">No</th>
                                    <th style="width:15%">ID</th>
                                    <th style="width:15%">Kategori</th>
									<th style="width:15%">Tanggal</th>
									<th style="width:10%">Skor</th>
									<th style="width:20%">Tingkat Kecerdasan</th>
									<th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                
								<?php
								$no = 1;
								foreach($res as $data){
									echo '<tr>
									<td>'.$no.'</td>
									<td>'.$data['id'].'</td>
									<td>';
										if($data['kd_kategori'] == 'k1')
										{
											echo 'Anak-anak';
										}
										else if($data['kd_kategori'] == 'k2')
										{
											echo 'Remaja';
										}
										else
										{
											echo 'Dewasa';
										}
									echo '</td>
									<td>'.$data['tanggal'].'</td>
									<td>'.$data['skor'].'</td>
									<td>';
										if ($data['skor'] <= 89 && $data['skor'] >=70)
										{
											echo 'Rendah';
										}
										else if ($data['skor'] <= 101 && $data['skor'] >=90)
										{
											echo 'Rendah yang masih dalam kategori normal';
										}
										else if ($data['skor'] <= 114 && $data['skor'] >=102)
										{
											echo 'Normal';
										}
										else if ($data['skor'] <= 129 && $data['skor'] >=115)
										{
											echo 'Tinggi dalam kategori normal';
										}
										else if ($data['skor'] <= 139 && $data['skor'] >=130)
										{
											echo 'Superior';
										}
										else
										{
											echo 'Jenius';
										}
									echo '</td>
									<td>
										<a href="?module=ujian&act=hapus&no_ujian='.$data['no_ujian'].'" onclick="return checkMe()"><img src="bin.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="delete" /></a>
                                    </td>
									</tr>';
									$no = $no+1;}
								?>

                                
                            </tbody>
                        </table>
                        </form>
                        <div class="pager" id="pager">
                            <form action="">
                                <div>
                                <img class="first" src="arrow-stop-180.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-180.gif" alt="first"/>
                                <img class="prev" src="arrow-180.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-180.gif" alt="prev"/> 
                                <input type="text" class="pagedisplay input-short align-center"/>
                                <img class="next" src="arrow.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow.gif" alt="next"/>
                                <img class="last" src="arrow-stop.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop.gif" alt="last"/> 
                                <select class="pagesize input-short align-center">
                                    <option value="10" selected="selected">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                </select>
                                </div>
                            </form>
                        </div>
                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
                
			</div> <!-- End .grid_12 -->
 
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
        