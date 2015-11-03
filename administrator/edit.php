<?php
	try{
	$sql = "SELECT * FROM test_kategori";
	$res = $db->query($sql); } 
	catch (PDOException $e) { echo $e->getMessage(); 
	}
	
	if (isset($_GET['module']))
	{
		if($_GET['act']=='edit')
		{
			try{
				$sql = 'SELECT * FROM soal where kd_soal = ?'; 
				$ssql = $db->prepare($sql);
				$soal = ($_GET['kd_soal']);
				$ssql->execute(array($soal));
				$detail = $ssql->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}
	else
	{
		?>
		<script language="JavaScript">
		document.location='?page=soal'</script> <?php
	}
?>
        
		<div class="container_12">
        

            
            
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2><span>Input Soal</span></h2>
                        
                     <div class="module-body">
                        <form name="edit" method="post" action="">
                            
                            <p>
                                <label>Kategori Soal</label>
                                <select class="input-short" name="kategori">
								<?php
									foreach($res as $data){
										if($data['kd_kategori'] == $detail[0]['kd_kategori'])
										{
											echo '<option selected value="' .$data['kd_kategori']. '">'.$data['nm_kategori']. '</option>';
										}
										else{
											echo '<option value="' .$data['kd_kategori']. '">'.$data['nm_kategori']. '</option>';
										}
								}?>
                                </select>
                            </p>
                            <fieldset>
								<?php
									echo '<input id="kd_soal" name="kd_soal" type="hidden" value="'.$detail[0]['kd_soal'].'" />'; ?>
							</fieldset>
							
							<fieldset>
                                <label>Soal</label> 
								<textarea class="markItUp" name="soal" cols="80" rows="20" required><?php echo ''.$detail[0]['soal'].' '; ?></textarea>
                            </fieldset>
							
							<fieldset>
                                <label>Jawaban A</label>
								<textarea class="markItUp" name="pil_a" cols="80" rows="20" required><?php echo ''.$detail[0]['pil_a'].' '; ?></textarea>
                                </script> 
                            </fieldset>
							
							<fieldset>
                                <label>Jawaban B</label>
								<textarea class="markItUp" name="pil_b" cols="80" rows="20" required><?php echo ''.$detail[0]['pil_b'].' '; ?></textarea>
                            </fieldset>
							
							<fieldset>
                                <label>Jawaban C</label>
								<textarea class="markItUp" name="pil_c" cols="80" rows="20" required><?php echo ''.$detail[0]['pil_c'].' '; ?></textarea>
                                </script>
                            </fieldset>
							
							<fieldset>
                                <label>Jawaban D</label>
								<textarea class="markItUp" name="pil_d" cols="80" rows="20" required><?php echo ''.$detail[0]['pil_d'].' '; ?></textarea>
                                </script>
                            </fieldset>
							
							<p>
                                <label>Kunci</label>
                                <select class="input-short" name="kunci">
									<?php
										$sql = 'SHOW COLUMNS FROM soal WHERE field="kunci"';
										$row = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
										foreach(explode("','",substr($row['Type'],6,-2)) as $option) {
											if($detail[0]['kunci'] == $option)
											{
												print("<option value=$option selected>$option</option>");
											}
											else{
												print("<option value=$option>$option</option>");}
										}
									?>
                                </select>
                            </p>
							
							<p>
								<label>Skor Soal</label>
                                <select class="input-short" name="skor">
								<?php
									if($detail[0]['skor'] == 1)
									{ echo '<option value=1 selected>1</option>';
									}
									else{ echo '<option value=1>1</option>';
									}
									if($detail[0]['skor'] == 2)
									{ echo '<option value=2 selected>2</option>';
									}
									else{ echo '<option value=2>2</option>';
									}
									if($detail[0]['skor'] == 3)
									{ echo '<option value=3 selected>3</option>';
									}
									else{ echo '<option value=3>3</option>';
									}
								?>
                                </select>
							</p>
                            
                            <fieldset>
                                <input class="submit-green" type="submit" name="edit" value="Submit" /> 
                                <input class="submit-gray" type="submit" value="Cancel" />
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->

            
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->