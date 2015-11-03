<?php
	session_start();

	unset($_SESSION['admin']);
	?>
		<script language="JavaScript">alert('Logout Sukses!!');
		document.location='index.php'</script><?php
?>