<?php
	// Bagian PHP ini dapat disalin ke bagian atas file yang memerlukan akses setelah login.
	 
	// Gunakan variabel session pada halaman ini
	//Fungsi ini harus diletakkan pada bagian atas halaman.
	session_start();
 
	// jika variabel session "admin" ada.
	if (isset($_SESSION['admin']))
	{
		if($_SESSION['admin'])
		{	
			header("Location: admin.php");
		}
	}
?>