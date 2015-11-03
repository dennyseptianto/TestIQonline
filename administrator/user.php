<?php
	try{
	$sql = "SELECT * FROM peserta";
	$res = $db->query($sql); } 
	catch (PDOException $e) { echo $e->getMessage(); 
	}
?>
        
		<div class="container_12">
            
            <div style="clear:both;"></div>
            
            <div class="grid_12">
                
                <!-- Example table -->
                <div class="module">
                	<h2><span>Tabel Soal</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
									<th style="width:3%">No</th>
                                    <th style="width:10%">id</th>
                                    <th style="width:20%">Nama</th>
                                    <th style="width:15%">Email</th>
                                    <th style="width:7%">Tanggal Lahir</th>
                                    <th style="width:7%">Tanggal Daftar</th>
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
									<td>'.$data['nama'].'</td>
									<td>'.$data['email'].'</td>
									<td>'.$data['tgl_lahir'].'</td>
									<td>'.$data['tgl_daftar'].'</td>
									<td>
										<a href="?module=user&act=reset&id='.$data['id'].'" onclick="return checkMe()"><img src="reset.png" tppabs="http://www.xooom.pl/work/magicadmin/images/tick-circle.gif" width="16" height="16" alt="reset" /></a>
										<a href="?module=user&act=hapus&id='.$data['id'].'" onclick="return checkMe()"><img src="bin.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/pencil.gif" width="16" height="16" alt="hapus" /></a>
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