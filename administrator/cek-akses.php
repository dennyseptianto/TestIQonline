<?php
	if(!$_SESSION['admin'] || !isset($_SESSION['admin']))
	{	
		?> <script language="JavaScript">
			document.location='index.php'</script> <?php
	}
	
	if($acces != 0)
	{
		?> <script language="JavaScript">
			document.location='admin.php'</script> <?php
	}
?>