<?php
session_start();
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

if(isset($_SESSION['username']))
{	
	try{
		$sql = 'SELECT * FROM ujian where id = ?'; 
		$ssql = $db->prepare($sql);
		$user = ($_SESSION['username']);
		$ssql->execute(array($user));
		$res = $ssql->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	
	$jenius1 = 0;
	$superior1 = 0;
	$tinggi1 = 0;
	$normal1 = 0;
	$rendahnor1 = 0;
	$rendah1 = 0;
	$total1 = 0;
	foreach($res as $data){
		if($data['skor'] >= 140)
		{
			$jenius1=$jenius1+1;
		}
		else if(($data['skor'] >= 130) && ($data['skor'] <= 139))
		{
			$superior1=$superior1+1;
		}
		else if(($data['skor'] >= 115) && ($data['skor'] <= 129))
		{
			$tinggi1=$tinggi1+1;
		}
		else if(($data['skor'] >= 102) && ($data['skor'] <= 114))
		{
			$normal1=$normal1+1;
		}
		else if(($data['skor'] >= 90) && ($data['skor'] <= 101))
		{
			$rendahnor1=$rendahnor1+1;
		}
		else if(($data['skor'] >= 70) && ($data['skor'] <= 89))
		{
			$rendah1=$rendah1+1;
		}
		$total1=$total1+1;
	}
}

try{
    $sql = 'SELECT * FROM menu_atas';
    $atas = $db->query($sql);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (isset($_POST['commit']))
	{
		if($_POST['commit']){
			$username = $_POST['login'];
			$password = md5($_POST['password']);
			$sql = 'SELECT * FROM peserta where id=:username';
			$query = $db->prepare($sql);
			$query->execute(array(
				'username' => $username
			));
			$user = $query->fetch();
			if($user && $user['password'] == $password){
				$_SESSION['username'] = $username;?>
				<script language="JavaScript">alert('Login Sukses!!');
				document.location='index.php'</script><?php
			}else{
				echo '<script>alert("Username atau Password Salah");</script>';
			}
		}
	}
	
	if (isset($_POST['Daftar']))
	{
		if($_POST['Daftar']){
			try{
				$tgldaftar=date("Y-m-d");
				$tgllahir = date("Y-m-d", strtotime($_POST['tgl_lahir']));
				$sql = 'insert into peserta value 
						(:id, :password, :nama, :email, :tgl_lahir,	:tgl_daftar)';
				$ssql = $db->prepare($sql);
				$ssql->execute(array(':id' => $_POST['id'], ':password' => md5($_POST['password']), 
									':nama' => $_POST['nama'], ':email' => $_POST['email'], ':tgl_lahir' => $tgllahir, 
									':tgl_daftar' => $tgldaftar ));
					$_SESSION['username'] = $_POST['id'];?>
					<script language="JavaScript">alert('Daftar Sukses!!');
					document.location='index.php'</script> <?php
			} catch (PDOException $e){
				echo '<script>alert("Daftar Gagal");</script>'.$e->getMessage(); 
			}
		}
	}
}
?>