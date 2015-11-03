<?php
	include ('cek-login.php');
	try{
		$user = $_SESSION['username'];
		$sql = 'SELECT * FROM peserta where id = ?'; 
		$ssql = $db->prepare($sql);
		$ssql->execute(array($user));
		$detail = $ssql->fetchAll(PDO::FETCH_ASSOC);
		$tgllahir = date("d/m/Y", strtotime($detail[0]['tgl_lahir']));
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	
	if(isset($_POST['Edit'])){
		if(md5($_POST['konfirm'])==$detail[0]['password']){
			try{
				$tgllahir = date("Y-m-d", strtotime($_POST['tgl_lahir']));
				$sql = 'update peserta set nama = :nama, 
						password = :password, email = :email, 
						tgl_lahir = :tgl_lahir
						where id = :id';
				$ssql = $db->prepare($sql);
				$ssql->execute(array(':id' => $user, ':nama' => $_POST['nama'], ':password' => $detail[0]['password'], 
									':email' => $_POST['email'], ':tgl_lahir' => $tgllahir)); ?>
				<script language="JavaScript">alert('Edit Sukses!!');
				document.location='index.php'</script> <?php
			} catch (PDOException $e){
				echo '<script>alert("Daftar Gagal");</script>'.$e->getMessage();
			}
			}
		else {
			echo '<script>alert("Konfirmasi Password Salah");</script>';
		
		}
	}
?>

<div class="header-banner" align="center">
					<!-- Top Navigation -->
					<section class="bgi banner5"><h2>Edit Akun</h2> </section>
					<!-- untuk judul halaman -->
		<div class="typrography">
	 <div class="container">
				<article class="isi">
					<div class="register">
						<form name="daftar" method="post" action="">
							<table>
							<td>Nama Lengkap <td>: <?php echo '<input id="nama" type="text" name="nama" value="'.$detail[0]['nama'].'" required> '; ?><tr>
							<td>Email <td>: <?php echo '<input id="email" type="email" name="email" value="'.$detail[0]['email'].'" required>';?> <tr> 
							<td>Tanggal Lahir <td>: <?php echo '<input type="text" id="datepicker" name="tgl_lahir" value="'.$tgllahir.'" required ' ?> /><tr>
							<td>Konfirmasi Password <td>: <input id="komfirm" type="password" name="konfirm" value="" placeholder="Konfirmasi Password" required><tr>
							<td><p class="submit"><input type="submit" name="Edit" value="Update Data"></p><tr>
							</table>
						</form>
					</div>
				</article>
				<!-- isi penjelasan halaman -->
			</div>
		</div>
	</div>