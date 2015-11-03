<?php
	include ('cek-login.php');
	try{
		$user = $_SESSION['username'];
		$sql = 'SELECT * FROM peserta where id = ?'; 
		$ssql = $db->prepare($sql);
		$ssql->execute(array($user));
		$detail = $ssql->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	
	if(isset($_POST['ganti'])){
		if(md5($_POST['konfirm'])==$detail[0]['password']){
			if($_POST['password'] == $_POST['konfirmasi']){
				try{
					$sql = 'update peserta set nama = :nama, 
							password = :password, email = :email, 
							tgl_lahir = :tgl_lahir
							where id = :id';
					$ssql = $db->prepare($sql);
					$ssql->execute(array(':id' => $user, ':nama' => $detail[0]['nama'], ':password' => md5($_POST['password']), 
										':email' => $detail[0]['email'], ':tgl_lahir' => $detail[0]['tgl_lahir'])); ?>
					<script language="JavaScript">alert('Edit Password Sukses!!');
					document.location='index.php'</script> <?php
				} catch (PDOException $e){
					echo '<script>alert("Ganti Password Gagal");</script>'.$e->getMessage();
				}
				}
			else
			{
				echo '<script>alert("Konfirmasi Password Tidak Sama");</script>';
			}
		}	
		else {
			echo '<script>alert("Password Lama Salah");</script>';
		}
	}
?>

<div class="header-banner" align="center">
					<!-- Top Navigation -->
					<section class="bgi banner5"><h2>Ubah Kata Sandi</h2> </section>
					<!-- untuk judul halaman -->
		<div class="typrography">
	 <div class="container">
				
				<article class="isi">
					<div class="register">
						<form name="gantu" method="post" action="">
							<table>
							<td>Password Lama <td>: <input id="komfirm" type="password" name="konfirm" value="" placeholder="Konfirmasi Password" required><tr>
							<td>Password Baru <td>: <input id="komfirm" type="password" name="password" value="" placeholder="Konfirmasi Password" required><tr>
							<td>Ketik Ulang Password <td>: <input id="komfirm" type="password" name="konfirmasi" value="" placeholder="Konfirmasi Password" required><tr>
							<td><p class="submit"><input type="submit" name="ganti" value="Ganti Password"></p><tr>
							</table>
						</form>
					</div>
				</article>
				<!-- isi penjelasan halaman -->
			</div>
		</div>
	</div>
	<iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>		