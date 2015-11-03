<?php
	// Bagian PHP ini dapat disalin ke bagian atas file yang memerlukan akses setelah login.
	 
	// Gunakan variabel session pada halaman ini
	//Fungsi ini harus diletakkan pada bagian atas halaman.
 
	// jika variabel session "username" tidak ada.
	if(!$_SESSION['username'] || !isset($_SESSION['username']))
	{	
		echo '<script>document.location="index.php"</script>';
	}
?>