<?php 
	include ('db.php');
	if (isset($_GET['page']))
	{
		switch ($_GET['page']) {
		case 'statistik':
			include ('head2.php');
			break;
		case 'history':
			include ('head2.php');
			break;
		default:
			include ('head.php');
			break;
		}
	}
	else
	{
		include ('head.php');
	}
?>
<?php
	include "headhtml.php";
?>
	<script src="java.js"></script>
	<body>
		<div class="header" id="home">
		<?php
				include "header.php";
			?>
	
			

<?php

	if (isset($_GET['page']))
	{
		switch ($_GET['page']) {
		case 'home':
			include('home.php');
			break;
		case 'register':
			include('register.php');
			break;
		case 'contact':
			include('contact.php');
			break;
		case 'edit':
			include('edit.php');
			break;
		case 'ubah':
			include('ubah.php');
			break;
		case 'tes':
			include('tes.php');
			break;
		case 'login':
			include('login.php');
			break;
		case 'hasil':
			include('ujian.php');
			break;
		case 'statistik':
			include('statistik.php');
			break;
		case 'history':
			include('history.php');
			break;
		case 'setting':
			include('setting.php');
			break;
		case 'description':
			include('description.php');
			break;
		case 'kontak':
			include('kontak.php');
			break;
		default:
			include('home.php');
			break;
		}
	}
	else
	{
		include('home.php');
	}

			


	include ('footer.php');
?>
