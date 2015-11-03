<?php
	include ('cek-akses.php');
	if (isset($_POST['filter']))
	{
		if ($_POST['filter'] == 1) 
		{
			try{
				$sql = 'SELECT * FROM admin where acces = ?'; 
				$ssql = $db->prepare($sql);
				$acces = $_POST['filter'];
				$ssql->execute(array($acces));
				$res = $ssql->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		else if ($_POST['filter'] == 0) 
		{
			try{
				$sql = 'SELECT * FROM admin where acces = ?'; 
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
			$sql = "SELECT * FROM admin";
			$res = $db->query($sql); } 
			catch (PDOException $e) { echo $e->getMessage(); 
			}
		}
	}
	else
	{
		try{
		$sql = "SELECT * FROM admin";
		$res = $db->query($sql); } 
		catch (PDOException $e) { echo $e->getMessage(); 
		}
	}
?>

		<div class="container_12">

            <div style="clear:both;"></div>
            
            
            
            <div class="grid_12">
                
                
                <div class="bottom-spacing">
                
                    <!-- Button -->
                    <div class="float-right">
                        <a href="?page=plus" class="button">
                        	<span>Tambah Admin <img src="plus-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/plus-small.gif" width="12" height="9" alt="New article" /></span>
                        </a>
                    </div>
                    
                    <!-- Table records filtering -->
                     
					<form name="filter" method="POST" action="">
					Filter:
                    <select class="input-short" name="filter">
                    	<?php	
						if (isset($_POST['filter']))
							{
								if($_POST['filter'] == 0)
								{
									echo '<option value="">Tampilkan Semua</option>';
									echo '<option selected value=0>Super Admin</option>';
									echo '<option value=1>Admin</option>';
								}
								else if($_POST['filter'] == 1)
								{
									echo '<option value="">Tampilkan Semua</option>';
									echo '<option value=0>Super Admin</option>';
									echo '<option selected value="1">Admin</option>';
								}
								else
								{
									echo '<option value="">Tampilkan Semua</option>';
									echo '<option value=0>Super Admin</option>';
									echo '<option value=1>Admin</option>';
								}
							}
						else{
							echo '<option value="">Select Filter</option>';
							echo '<option value=0>Super Admin</option>';
							echo '<option value=1>Admin</option>';
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
                                    <th style="width:20%">ID Admin</th>
                                    <th style="width:40%">Nama Admin</th>
									<th style="width:10%">Kode Akses</th>
									<th style="width:20%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                
								<?php
								$no = 1;
								foreach($res as $data){
									echo '<tr>
									<td>'.$no.'</td>
									<td>'.$data['userid'].'</td>
									<td>'.$data['nama'].'</td>
									<td>'.$data['acces'].'</td>
									<td>
										<a href="?module=admin&act=reset&admin='.$data['userid'].'" onclick="return checkMe()"><img src="reset.png" tppabs="http://www.xooom.pl/work/magicadmin/images/tick-circle.gif" width="16" height="16" alt="reset" /></a>
										<a href="?module=admin&act=edit&admin='.$data['userid'].'"><img src="pencil.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                        <a href="?module=admin&act=hapus&admin='.$data['userid'].'" onclick="return checkMe()"><img src="bin.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="delete" /></a>
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
		
        