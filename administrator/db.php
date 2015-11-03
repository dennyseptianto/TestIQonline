<?php
$db = null;
	try{
		$db = new PDO("mysql:host=mysql.idhostinger.com;dbname=u624168925_denny", "u624168925_denny", "Denny007");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
		echo $e->getMessage();
	}
	
	try{
	$sql = "SELECT * FROM ujian";
	$res = $db->query($sql); } 
	catch (PDOException $e) { echo $e->getMessage(); 
	}
	
	$jenius = 0;
	$jeniusk1 = 0;
	$jeniusk2 = 0;
	$jeniusk3 = 0;
	$superior = 0;
	$superiork1 = 0;
	$superiork2 = 0;
	$superiork3 = 0;
	$tinggi = 0;
	$tinggik1 = 0;
	$tinggik2 = 0;
	$tinggik3 = 0;
	$normal = 0;
	$normalk1 = 0;
	$normalk2 = 0;
	$normalk3 = 0;
	$rendahnor = 0;
	$rendahnork1 = 0;
	$rendahnork2 = 0;
	$rendahnork3 = 0;
	$rendah = 0;
	$rendahk1 = 0;
	$rendahk2 = 0;
	$rendahk3 = 0;
	$k1=0;
	$k2=0;
	$k3=0;
	$total = 0;
	foreach($res as $data){
		if($data['skor'] >= 140)
		{
			if($data['kd_kategori'] == 'k1')
			{
				$jeniusk1=$jeniusk1+1;
			}
			else if($data['kd_kategori'] == 'k2')
			{
				$jeniusk2=$jeniusk2+1;
			}
			else if($data['kd_kategori'] == 'k3')
			{
				$jeniusk3=$jeniusk3+1;
			}
			$jenius=$jenius+1;
		}
		else if(($data['skor'] >= 130) && ($data['skor'] <= 139))
		{
			if($data['kd_kategori'] == 'k1')
			{
				$superiork1=$superiork1+1;
			}
			else if($data['kd_kategori'] == 'k2')
			{
				$superiork2=$superiork2+1;
			}
			else if($data['kd_kategori'] == 'k3')
			{
				$superiork3=$superiork3+1;
			}
			$superior=$superior+1;
		}
		else if(($data['skor'] >= 115) && ($data['skor'] <= 129))
		{
			if($data['kd_kategori'] == 'k1')
			{
				$tinggik1=$tinggik1+1;
			}
			else if($data['kd_kategori'] == 'k2')
			{
				$tinggik2=$tinggik2+1;
			}
			else if($data['kd_kategori'] == 'k3')
			{
				$tinggik3=$tinggik3+1;
			}
			$tinggi=$tinggi+1;
		}
		else if(($data['skor'] >= 102) && ($data['skor'] <= 114))
		{
			if($data['kd_kategori'] == 'k1')
			{
				$normalk1=$normalk1+1;
			}
			else if($data['kd_kategori'] == 'k2')
			{
				$normalk2=$normalk2+1;
			}
			else if($data['kd_kategori'] == 'k3')
			{
				$normalk3=$normalk3+1;
			}
			$normal=$normal+1;
		}
		else if(($data['skor'] >= 90) && ($data['skor'] <= 101))
		{
			if($data['kd_kategori'] == 'k1')
			{
				$rendahnork1=$rendahnork1+1;
			}
			else if($data['kd_kategori'] == 'k2')
			{
				$rendahnork2=$rendahnork2+1;
			}
			else if($data['kd_kategori'] == 'k3')
			{
				$rendahnork3=$rendahnork3+1;
			}
			$rendahnor=$rendahnor+1;
		}
		else if(($data['skor'] >= 70) && ($data['skor'] <= 89))
		{
			if($data['kd_kategori'] == 'k1')
			{
				$rendahk1=$rendahk1+1;
			}
			else if($data['kd_kategori'] == 'k2')
			{
				$rendahk2=$rendahk2+1;
			}
			else if($data['kd_kategori'] == 'k3')
			{
				$rendahk3=$rendahk3+1;
			}
			$rendah=$rendah+1;
		}
		$total=$total+1;
		$k1=($jeniusk1+$superiork1+$tinggik1+$normalk1+$rendahnork1+$rendahk1) / 6;
		$k2=($jeniusk2+$superiork2+$tinggik2+$normalk2+$rendahnork2+$rendahk2) / 6;
		$k3=($jeniusk3+$superiork3+$tinggik3+$normalk3+$rendahnork3+$rendahk3) / 6;
	}
	
	if(isset($_POST['uplod']))
	{
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/png"))
		&& ($_FILES["file"]["size"] < 2000000)
		&& in_array($extension, $allowedExts))
		  {
		  if ($_FILES["file"]["error"] > 0)
			{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			}
		  else
			{
			echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			echo "Type: " . $_FILES["file"]["type"] . "<br>";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

			if (file_exists("upload/" . $_FILES["file"]["name"]))
			  {
			  echo $_FILES["file"]["name"] . " already exists. ";
			  }
			else
			  {
			  move_uploaded_file($_FILES["file"]["tmp_name"],
			  "upload/" . $_FILES["file"]["name"]);
			  echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
			  }
			  ?>
					<script language="JavaScript">alert('Upload Sukses!!');</script> <?php
			}
		  }
		else
		  {
		  echo "Invalid file";
		  }
	}
	
	if(isset($_SESSION['admin']))
	{
		$admin = $_SESSION['admin'];
		$sql = 'SELECT * FROM admin where userid=:admin';
		$query = $db->prepare($sql);
		$query->execute(array(
			'admin' => $admin
		));
		$user = $query->fetch();
		$acces = $user['acces'];
	}
	
	if (isset($_POST['input']))
	{
		if($_POST['input'])
		{
			try{
				$sql = 'insert into soal value 
						(:kd_kategori, :kd_soal, :soal, :pil_a, :pil_b, :pil_c, :pil_d, :kunci, :skor, :status)';
				$ssql = $db->prepare($sql);
				$ssql->execute(array(':kd_kategori' => $_POST['kategori'], ':kd_soal' => "", ':soal' => $_POST['soal'], 
									':pil_a' => $_POST['pil_a'], ':pil_b' => $_POST['pil_b'], ':pil_c' => $_POST['pil_c'], 
									':pil_d' => $_POST['pil_d'], ':kunci' => $_POST['kunci'], ':skor' => $_POST['skor'], ':status' => "publish" ));?>
					<script language="JavaScript">alert('Input Soal Sukses!!');
					document.location='admin.php?page=soal'</script> <?php
			} catch (PDOException $e){
				echo '<script>alert("Daftar Gagal");</script>'.$e->getMessage(); 
			}
		}
	}
	
	if (isset($_POST['tambah']))
	{
		if($_POST['tambah'])
		{
			try{
				$sql = 'insert into admin value 
						(:index, :userid, :passid, :nama, :acces)';
				$ssql = $db->prepare($sql);
				$ssql->execute(array(':index' => "", ':userid' => $_POST['idadmin'], ':passid' => md5("default"), ':nama' => $_POST['nama'], 
									':acces' => $_POST['akses'] ));?>
					<script language="JavaScript">alert('Admin Telah di Tambahkan!!');
					document.location='admin.php?page=admin'</script> <?php
			} catch (PDOException $e){
				echo '<script>alert("Tambah Admin Gagal");</script>'.$e->getMessage(); 
			}
		}
	}
	
	if (isset($_GET['module']))
	{
		if($_GET['act']=='hapus' && $_GET['module'] == 'soal')
		{
			  $sql = "DELETE FROM soal WHERE kd_soal = :kode";
			  $ssql = $db->prepare($sql);
			  $ssql->bindParam(':kode', $kode);
			  $kode = ($_GET['kd_soal']);
			  $ssql->execute();
			  ?>
			<script language="JavaScript">alert('Hapus Soal Sukses');
					document.location='admin.php?page=soal'</script> <?php
		}
		else if($_GET['act']=='publish' && $_GET['module'] == 'soal')
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
			try{
				$sql = 'update soal set kd_kategori = :kd_kategori, 
						kd_soal = :kd_soal, soal = :soal, pil_a = :pil_a,
						pil_b = :pil_b, pil_c = :pil_c, pil_d = :pil_d, kunci = :kunci, skor = :skor, status = :status
						where kd_soal = :kd_soal';
				$ssql = $db->prepare($sql);
				$ssql->execute(array(':kd_kategori' => $detail[0]['kd_kategori'], ':kd_soal' => $detail[0]['kd_soal'], ':soal' => $detail[0]['soal'], 
									':pil_a' => $detail[0]['pil_a'], ':pil_b' => $detail[0]['pil_b'], ':pil_c' => $detail[0]['pil_c'], 
									':pil_d' => $detail[0]['pil_d'], ':kunci' => $detail[0]['kunci'], ':skor' => $detail[0]['skor'], ':status' => "publish" ));?>
				<script language="JavaScript">alert('Soal di Publish');
				document.location='?page=soal'</script> <?php
			} catch (PDOException $e){
				echo '<script>alert("Edit Gagal");</script>'.$e->getMessage();
			}
		}
		else if($_GET['act']=='unpublish' && $_GET['module'] == 'soal')
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
			try{
				$sql = 'update soal set kd_kategori = :kd_kategori, 
						kd_soal = :kd_soal, soal = :soal, pil_a = :pil_a,
						pil_b = :pil_b, pil_c = :pil_c, pil_d = :pil_d, kunci = :kunci, status = :status
						where kd_soal = :kd_soal';
				$ssql = $db->prepare($sql);
				$ssql->execute(array(':kd_kategori' => $detail[0]['kd_kategori'], ':kd_soal' => $detail[0]['kd_soal'], ':soal' => $detail[0]['soal'], 
									':pil_a' => $detail[0]['pil_a'], ':pil_b' => $detail[0]['pil_b'], ':pil_c' => $detail[0]['pil_c'], 
									':pil_d' => $detail[0]['pil_d'], ':kunci' => $detail[0]['kunci'], ':status' => "unpublish" ));?>
				<script language="JavaScript">alert('Soal telah di Unpublish');
				document.location='?page=soal'</script> <?php
			} catch (PDOException $e){
				echo '<script>alert("Edit Gagal");</script>'.$e->getMessage();
			}
		}
		else if($_GET['act']=='hapus' && $_GET['module'] == 'user')
		{
			  $sql = "DELETE FROM peserta WHERE id = :id";
			  $ssql = $db->prepare($sql);
			  $ssql->bindParam(':id', $id);
			  $id = ($_GET['id']);
			  $ssql->execute();
			  ?>
			<script language="JavaScript">alert('Hapus User Sukses');
					document.location='admin.php?page=user'</script> <?php
		}
		else if($_GET['act']=='reset' && $_GET['module'] == 'user')
		{
			try{
				$sql = 'SELECT * FROM peserta where id = ?'; 
				$ssql = $db->prepare($sql);
				$id = ($_GET['id']);
				$ssql->execute(array($id));
				$detail = $ssql->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
			try{
				$sql = 'update peserta set password = :password, 
						nama = :nama, email = :email, tgl_lahir = :tgl_lahir,
						tgl_daftar = :tgl_daftar
						where id = :id';
				$ssql = $db->prepare($sql);
				$ssql->execute(array(':password' => md5('default'), ':nama' => $detail[0]['nama'], ':email' => $detail[0]['email'], 
									':tgl_lahir' => $detail[0]['tgl_lahir'], ':tgl_daftar' => $detail[0]['tgl_daftar'], ':id' => $detail[0]['id'] ));?>
				<script language="JavaScript">alert('Password Berhasil di Reset');
				document.location='?page=user'</script> <?php
			} catch (PDOException $e){
				echo '<script>alert("Reset Password Gagal");</script>'.$e->getMessage();
			}
		}
		else if($_GET['act']=='hapus' && $_GET['module'] == 'admin')
		{
			  $sql = "DELETE FROM admin WHERE userid = :id";
			  $ssql = $db->prepare($sql);
			  $ssql->bindParam(':id', $id);
			  $id = ($_GET['admin']);
			  $ssql->execute();
			  ?>
			<script language="JavaScript">alert('Hapus Admin Sukses');
					document.location='admin.php?page=admin'</script> <?php
		}
		else if($_GET['act']=='hapus' && $_GET['module'] == 'ujian')
		{
			  $sql = "DELETE FROM ujian WHERE no_ujian = :no";
			  $ssql = $db->prepare($sql);
			  $ssql->bindParam(':no', $no);
			  $no = ($_GET['no_ujian']);
			  $ssql->execute();
			  ?>
			<script language="JavaScript">alert('Hapus Hasil Ujian Sukses');
					document.location='admin.php?page=ujian'</script> <?php
		}
		else if($_GET['act']=='reset' && $_GET['module'] == 'admin')
		{
			try{
				$sql = 'SELECT * FROM admin where userid = ?'; 
				$ssql = $db->prepare($sql);
				$id = ($_GET['admin']);
				$ssql->execute(array($id));
				$detail = $ssql->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
			 try{
				$sql = 'update admin set passid = :password, 
						acces = :akses, index = :index, nama = :nama
						where userid = :id';
				$ssql = $db->prepare($sql);
				$ssql->execute(array(':password' => md5('default'), ':akses' => $detail[0]['acces'], ':index' => $detail[0]['index'], 
									':nama' => $detail[0]['nama'], 'id' => $detail[0]['userid'] ));?>
				<script language="JavaScript">alert('Password Berhasil di Reset');
				document.location='page=admin'</script> <?php
			} catch (PDOException $e){
				echo '<script>alert("Reset Password Gagal");</script>'.$e->getMessage();
			}
		}
	}
	
	if (isset($_POST['edit']))
	{
		if($_POST['edit']){
				try{
				$sql = 'update soal set kd_kategori = :kd_kategori, 
						kd_soal = :kd_soal, soal = :soal, pil_a = :pil_a,
						pil_b = :pil_b, pil_c = :pil_c, pil_d = :pil_d, kunci = :kunci, skor = :skor, status = :status
						where kd_soal = :kd_soal';
				$ssql = $db->prepare($sql);
				$ssql->execute(array(':kd_kategori' => $_POST['kategori'], ':kd_soal' => $_POST['kd_soal'], ':soal' => $_POST['soal'], 
									':pil_a' => $_POST['pil_a'], ':pil_b' => $_POST['pil_b'], ':pil_c' => $_POST['pil_c'], 
									':pil_d' => $_POST['pil_d'], ':kunci' => $_POST['kunci'], ':skor' => $_POST['skor'], ':status' => "publish" ));?>
				<script language="JavaScript">alert('Edit Sukses!!');
				document.location='admin.php?page=soal'</script> <?php
			} catch (PDOException $e){
				echo '<script>alert("Edit Gagal");</script>'.$e->getMessage();
			}
		}
	}
?>