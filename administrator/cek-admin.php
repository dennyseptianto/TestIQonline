<?php
	// Bagian PHP ini dapat disalin ke bagian atas file yang memerlukan akses setelah login.
	 
	// Gunakan variabel session pada halaman ini
	//Fungsi ini harus diletakkan pada bagian atas halaman.
	session_start();
 
	// jika variabel session "admin" tidak ada.
	if(!$_SESSION['admin'] || !isset($_SESSION['admin']))
	{	
		?> <script language="JavaScript">
			document.location='index.php'</script> <?php
	}
?>