<?php
	$admin = $_SESSION['admin'];
	$sql = 'SELECT * FROM admin where userid=:admin';
	$query = $db->prepare($sql);
	$query->execute(array(
		'admin' => $admin
	));
	$user = $query->fetch();
	$acces = $user['acces'];
	
	if(isset ($_POST['password']) && ($_POST['repeat']) && ($_POST['lama']))
	{
		try{
			$sql = 'SELECT * FROM admin where userid = ?'; 
			$ssql = $db->prepare($sql);
			$id = $_SESSION['admin'];
			$ssql->execute(array($id));
			$detail = $ssql->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		if((md5($_POST['lama']) == $detail[0]['passid']) && ($_POST['password'] == $_POST['repeat']))
		{
			try{
				$sql = 'update admin set indek = :indek,
						userid = :userid, passid = :passid, nama = :nama, acces = :acces
						where indek = :indek';
				$ssql = $db->prepare($sql);
				$ssql->execute(array(':indek' => $detail[0]['indek'], ':userid' => $detail[0]['userid'], ':passid' => md5($_POST['password']), ':nama' => $detail[0]['nama'],
									':acces' => $detail[0]['acces'] ));?>
				<script language="JavaScript">alert('Edit Sukses!!');
				document.location='?page=setting'</script> <?php
			} catch (PDOException $e){
				echo '<script>alert("Edit Gagal");</script>'.$e->getMessage();
			}
		}
	}
	
	if(isset ($_POST['nama']))
	{
		try{
			$sql = 'SELECT * FROM admin where userid = ?'; 
			$ssql = $db->prepare($sql);
			$id = $_SESSION['admin'];
			$ssql->execute(array($id));
			$detail = $ssql->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		try{
				$sql = 'update admin set indek = :indek,
						userid = :userid, passid = :passid, nama = :nama, acces = :acces
						where indek = :indek';
				$ssql = $db->prepare($sql);
				$ssql->execute(array(':indek' => $detail[0]['indek'], ':userid' => $detail[0]['userid'], ':passid' => $detail[0]['passid'], 
									':nama' => $_POST['nama'], ':acces' => $detail[0]['acces'] ));?>
				<script language="JavaScript">alert('Edit Sukses!!');
				document.location='?page=setting'</script> <?php
			} catch (PDOException $e){
				echo '<script>alert("Edit Gagal");</script>'.$e->getMessage();
			}
	}
?>

		<div class="container_12">
        

            <div class="grid_12">
                <div class="module">
                     <h2><span>Setting</span></h2>
					
                    <div class="grid_6">
					<br />
                    <div class="module">
					
                     <h2><span>Setting Nama</span></h2>
                        
                     <div class="module-body">
					
                        <form name="ganti" action="" method="post">
                            <p>
                                <label>Nama</label>
                                <textarea name="nama" rows="7" cols="90" class="input-long"><?php echo ''.$user['nama'].''; ?></textarea>
                            </p>
                            <fieldset>
                                <input class="submit-green" type="submit" name="updet" value="Submit" /> 
                            </fieldset>
                        </form>
                        
                     </div> <!-- End .module-body -->
					<div style="clear:both;"></div>
                </div> <!-- End .module -->
				</div>
				
				<div class="grid_6">
					<br />
                    <div class="module">
					
                     <h2><span>Ganti Password</span></h2>
                        
                     <div class="module-body">
					 <?php
						if(isset ($_POST['password']) && ($_POST['repeat']))
						{
							if($_POST['password'] != $_POST['repeat'])
							{
								echo '<span class="notification n-attention">Password tidak sama.</span>';
							}
						}
					?>
                        <form name="ganti" action="" method="post">
							<p>
                                <label>Masukkan Password Lama</label>
                                <input type="password" class="input-long" name="lama" required />
                            </p>
                            <p>
                                <label>Masukkan Password Baru</label>
                                <input class="input-long password" type="password" name="password" required />
                            </p>
                            <p>
                                <label>Ulangi password</label>
                                <input type="password" class="input-long" name="repeat" required />
                            </p>
                            <fieldset>
                                <input class="submit-green" type="submit" name="ganti" value="Submit" />
                            </fieldset>
                        </form>
                        
                     </div> <!-- End .module-body -->
					<div style="clear:both;"></div>
                </div> <!-- End .module -->
				</div>
				</div>
				
				
            </div> <!-- End .grid_6 -->
            
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->