<?php
	include ('cek-login.php');
	include ('db.php');
	
	if (isset($_POST['login']))
	{
		if($_POST['login']){
			$admin = $_POST['admin'];
			$password = md5($_POST['password']);
			$sql = 'SELECT * FROM admin where userid=:admin';
			$query = $db->prepare($sql);
			$query->execute(array(
				'admin' => $admin
			));
			$user = $query->fetch();
			if($user && $user['passid'] == $password){
				
				$_SESSION['admin'] = $admin;?>
				<script language="JavaScript">alert('Login Sukses!!');
				document.location='admin.php'</script><?php
			}else{
				echo '<span class="notification n-error"><img src="notification-slash.gif" />  Username or Password salah</span>';
			}
		}
	}
?>

<!DOCTYPE html>

<html>
<head>

	<!-- Basics -->
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Login</title>

	<!-- CSS -->
	
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/styles.css">
	
</head>

	<!-- Main HTML -->
	
<body>
	
	<!-- Begin Page Content -->
	
	<div id="container">
		
		<form name="administrator" method="post">
		
			<label for="name">Username:</label>
			
			<input type="name" name="admin">
			
			<label for="username">Password:</label>
			
			<input type="password" name="password">
			
			<div id="lower">
			
			<label class="judul">Test IQ Online</label>
		
			<input type="submit" value="Login" name="login">
		
		</div>
		
		</form>
		
	</div>
	
	
	<!-- End Page Content -->
	
</body>

</html>