<?php
	if (isset($_POST['filter']))
	{
		if ($_POST['filter'] == "")
		{
			try{
			$sql = "SELECT * FROM soal";
			$res = $db->query($sql); } 
			catch (PDOException $e) { echo $e->getMessage(); 
			}
		}
		else {
			try{
				$sql = 'SELECT * FROM soal where kd_kategori = ?'; 
				$ssql = $db->prepare($sql);
				$soal = ($_POST['filter']);
				$ssql->execute(array($soal));
				$res = $ssql->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}
	else
	{
		try{
		$sql = "SELECT * FROM soal";
		$res = $db->query($sql); } 
		catch (PDOException $e) { echo $e->getMessage(); 
		}
	}	
	
	try{
	$sql = "SELECT * FROM test_kategori";
	$kat = $db->query($sql); } 
	catch (PDOException $e) { echo $e->getMessage(); 
	}
?>
        
		<div class="container_12">
        
            <div style="clear:both;"></div>
            
            <div class="grid_12">
                
                <div class="bottom-spacing">
                
                    <!-- Button -->
                    <div class="float-right">
                        <a href="?page=input" class="button">
                        	<span>Input Soal <img src="plus-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/plus-small.gif" width="12" height="9" alt="New article" /></span>
                        </a>
                    </div>
                    
                    <!-- Table records filtering -->
                     
					<form name="filter" method="post" action="">
					Filter:
                    <select class="input-short" name="filter">
                    	<?php	
						if (isset($_POST['filter']))
							{
								echo '<option value="">Tampilkan Semua</option>';
								foreach($kat as $data){
								if($_POST['filter'] == $data['kd_kategori'])
								{
									echo '<option selected value="' .$data['kd_kategori']. '">'.$data['nm_kategori']. '</option>';
								}
								else{
									echo '<option value="' .$data['kd_kategori']. '">'.$data['nm_kategori']. '</option>';
								}
							}
						}
						else{
							echo '<option value="">Select Filter</option>';
							foreach($kat as $data){
								echo '<option value="' .$data['kd_kategori']. '">'.$data['nm_kategori']. '</option>';
								}
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
                                    <th style="width:4%">No</th>
                                    <th style="width:6%">Kategori</th>
                                    <th style="width:20%">Soal</th>
                                    <th style="width:10%">Pilihan A</th>
                                    <th style="width:10%">Pilihan B</th>
                                    <th style="width:10%">Pilihan C</th>
									<th style="width:10%">Pilihan D</th>
                                    <th style="width:2%">Kunci</th>
									<th style="width:2%">Skor</th>
									<th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                
								<?php
								$no = 1;
								foreach($res as $data){
									echo '<tr>
									<td class="align-center">'.$no.'</td>
									<td>';
										if ($data['kd_kategori'] == "k1")
										{
											echo 'Anak-anak';
										}
										else if($data['kd_kategori'] == "k2")
										{
											echo 'Remaja';
										}
										else
										{
											echo 'Dewasa';
										}
									echo '</td>
									<td>'; echo str_replace("<img", "<img height='200' width='280'", str_replace("administrator/", "", substr($data['soal'],0,80)));"</td>"; 
									echo '<td>'; echo str_replace("<img", "<img height='90' width='125'", str_replace("administrator/", "", substr($data['pil_a'],0,80)));"</td>";
									echo '<td>'; echo str_replace("<img", "<img height='90' width='125'", str_replace("administrator/", "", substr($data['pil_b'],0,80)));"</td>";
									echo '<td>'; echo str_replace("<img", "<img height='90' width='125'", str_replace("administrator/", "", substr($data['pil_c'],0,80)));"</td>";
									echo '<td>'; echo str_replace("<img", "<img height='90' width='125'", str_replace("administrator/", "", substr($data['pil_d'],0,80)));"</td>";
									echo '<td>'.$data['kunci'].'</td>
									<td>'.$data['skor'].'</td>
									<td>';
										if($data['status'] == "publish")
										{
											echo '<a href="?module=soal&act=unpublish&kd_soal='.$data['kd_soal'].'"><img src="tick-circle.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/tick-circle.gif" width="16" height="16" alt="published" /></a>';
										}
										else{
											echo '<a href="?module=soal&act=publish&kd_soal='.$data['kd_soal'].'"><img src="minus-circle.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/tick-circle.gif" width="16" height="16" alt="unpublished" /></a>';
										}
										echo '
                                        <a href="?module=soal&act=edit&kd_soal='.$data['kd_soal'].'"><img src="pencil.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                        <a href="?module=soal&act=hapus&kd_soal='.$data['kd_soal'].'" onclick="return checkMe()"><img src="bin.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="delete" /></a>
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