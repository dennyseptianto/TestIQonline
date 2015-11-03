<?php 
	include ('db.php');
	include ('head.php');
?>
	<script src="java.js"></script>
	<body>
		<div id="content">
			<img id="banner" src="banner.jpg" />
			<!-- gambar banner -->
			<nav id="nav">	
				<ul>		
				<?php
					if($_SESSION['username'] || isset($_SESSION['username'])) {
						foreach($atas as $data)
						{
							if($data['kategori']==0 || $data['kategori']==1){
								echo '<li>
									<a href='.$data['link'].'>
									<span>'.$data['nama'].'</span></a>
									</li>';
								}
						}
					}
					else {	
						foreach($atas as $data)
						{
							if($data['kategori']==0 || $data['kategori']==2){
								echo '<li>
									<a href='.$data['link'].'>
									<span>'.$data['nama'].'</span></a>
									</li>';
								}
						}
					}
				?>
				</ul>
			</nav> 

<?php
	include ('login.php');
?>