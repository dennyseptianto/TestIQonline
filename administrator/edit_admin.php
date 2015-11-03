<?php
	include ('cek-akses.php');
	
	if (isset($_GET['module']))
	{
		if($_GET['act']=='edit')
		{
			try{
				$sql = 'SELECT * FROM admin where userid = ?'; 
				$ssql = $db->prepare($sql);
				$admin = ($_GET['admin']);
				$ssql->execute(array($admin));
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
		document.location='?page=admin'</script> <?php
	}
	
	if (isset($_POST['ganti']))
	{
		if($_POST['ganti'])
		{
			try{
			$sql = 'update admin set indek = :indek,
					userid = :userid, passid = :passid, nama = :nama, acces = :acces
					where indek = :indek';
			$ssql = $db->prepare($sql);
			$ssql->execute(array(':indek' => $_POST['index'], ':userid' => $_POST['idadmin'], ':passid' => $_POST['password'], ':nama' => $_POST['nama'],
								':acces' => $_POST['akses'] ));?>
			<script language="JavaScript">alert('Edit Sukses!!');
			document.location='man_admin.php'</script> <?php
			} catch (PDOException $e){
				echo '<script>alert("Edit Gagal");</script>'.$e->getMessage();
			}
		}
	}
?>
        
		<div class="container_12">
            
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2><span>Edit Admin</span></h2>
                        
                     <div class="module-body">
                        <form name="ganti" method="post" action="">
								<?php
									echo '<input name="index" type="hidden" value='.$detail[0]['indek'].' />'; ?>
							
                            <p>
                                <label>ID Admin</label>
                                <textarea name="idadmin" rows="7" cols="90" class="input-short"><?php echo ''.$detail[0]['userid'].''; ?></textarea>
                            </p>
							
							<p>
                                <label>Nama</label>
                                <textarea name="nama" rows="7" cols="90" class="input-medium"><?php echo ''.$detail[0]['nama'].''; ?></textarea>
                            </p>
							
							<fieldset>
								<?php
									echo '<input name="password" type="hidden" value="'.$detail[0]['passid'].'" />'; ?>
							</fieldset>
							
							<p>
                                <label>Hak Akses</label>
                                <select class="input-medium" name="akses">
								<?php if($detail[0]['acces'] == 0)
								{	echo '
									<option selected value=0>Super Admin</option>
                                    <option value=1>Admin</option>';
								}
								else
								{	echo '
									<option value=0>Super Admin</option>
                                    <option selected value=1>Admin</option>';
								}
								?>
                                </select>
                            </p>
                            
                            <fieldset>
                                <input class="submit-green" type="submit" name="ganti" value="Submit" /> 
                                <input class="submit-gray" type="submit" value="Cancel" />
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->

            
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->