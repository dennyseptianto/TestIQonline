<?php
	include ('cek-admin.php');
	include ('db.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Administrator  |  Test IQ Online</title>
		<?php
			if (isset($_GET['page']))
			{
				switch ($_GET['page']) {
				case 'input':
					echo '<!-- markItUp! skin -->
					<link rel="stylesheet" type="text/css" href="markitup/skins/markitup/style.css">
					<!--  markItUp! toolbar skin -->
					<link rel="stylesheet" type="text/css" href="markitup/sets/default/style.css">
					<!-- jQuery -->
					<script type="text/javascript" src="markitup/jquery1.8.0.mis.js"></script>
					<!-- markItUp! -->
					<script type="text/javascript" src="markitup/jquery.markitup.js"></script>
					<!-- markItUp! toolbar settings -->
					<script type="text/javascript" src="markitup/sets/default/set.js"></script>
					
					<script> 
						$(document).ready(function(){
						  $("#flip").click(function(){
							$("#panel").slideToggle("slow");
						  });
						});
					</script>';
					?>
					<script type="text/javascript">
						$(function() {
							// Add markItUp! to your textarea in one line
							// $('textarea').markItUp( { Settings }, { OptionalExtraSettings } );
							$('.markItUp').markItUp(mySettings);
						});
					</script><?php
					break;
				default:
					echo '<!-- JQuery engine script-->
					<script type="text/javascript" src="jquery-1.3.2.min.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery-1.3.2.min.js"></script>';
					break;
				}
			}
			if (isset($_GET['act']))
			{
				switch ($_GET['act']) {
				case 'edit':
					echo '<!-- markItUp! skin -->
					<link rel="stylesheet" type="text/css" href="markitup/skins/markitup/style.css">
					<!--  markItUp! toolbar skin -->
					<link rel="stylesheet" type="text/css" href="markitup/sets/default/style.css">
					<!-- jQuery -->
					<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
					<!-- markItUp! -->
					<script type="text/javascript" src="markitup/jquery.markitup.js"></script>
					<!-- markItUp! toolbar settings -->
					<script type="text/javascript" src="markitup/sets/default/set.js"></script>
					
					<script> 
						$(document).ready(function(){
						  $("#flip").click(function(){
							$("#panel").slideToggle("slow");
						  });
						});
					</script>';
					?>
					<script type="text/javascript">
						$(function() {
							// Add markItUp! to your textarea in one line
							// $('textarea').markItUp( { Settings }, { OptionalExtraSettings } );
							$('.markItUp').markItUp(mySettings);
						});
					</script><?php
					break;
				default:
					echo '<!-- JQuery engine script-->
					<script type="text/javascript" src="jquery-1.3.2.min.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery-1.3.2.min.js"></script>';
					break;
				}
				
			}
		?>
       
	<?php
		if (isset($_GET['page']))
		{
			if ($_GET['page'] == 'statistik')
			{ ?>
				<!-- 1. Add these JavaScript inclusions in the head of your page -->
				<script type="text/javascript" src="../js/jquery.js"></script>
				<script type="text/javascript" src="../js/highcharts.js"></script>
				
				<!-- 1a) Optional: add a theme file -->
					<script type="text/javascript" src="../js/themes/grid.js"></script>
				
				<!-- 1b) Optional: the exporting module -->
				<script type="text/javascript" src="../js/modules/exporting.js"></script>
				
				
				<!-- 2. Add the JavaScript to initialize the chart on document ready -->
				<script type="text/javascript">
				
					var chart;
					$(document).ready(function() {
						chart = new Highcharts.Chart({
							chart: {
								renderTo: 'container',
								plotBackgroundColor: null,
								plotBorderWidth: null,
								plotShadow: false
							},
							title: {
								text: 'Statistik Kecerdasan'
							},
							tooltip: {
								formatter: function() {
									return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
								}
							},
							plotOptions: {
								pie: {
									allowPointSelect: true,
									cursor: 'pointer',
									dataLabels: {
										enabled: false
									},
									showInLegend: true
								}
							},
							series: [{
								type: 'pie',
								name: 'Browser share',
								data: [
									{
										name: 'Jenius',    
										y: <?php $persen1=($jenius!=0)?($jenius/$total) * 100:0; echo round($persen1, 2) ?>,
										sliced: true,
										selected: true
									},
									['Superior',    <?php $persen2=($superior!=0)?($superior/$total) * 100:0; echo round($persen2, 2)?>],
									['Tinggi dalam kategori normal',       <?php $persen3=($tinggi!=0)?($tinggi/$total) * 100:0; echo round($persen3, 2)?>],
									['Normal',   <?php $persen4=($normal!=0)?($normal/$total) * 100:0; echo round($persen4, 2)?>],
									['Rendah dalam kategori normal',     <?php $persen5=($rendahnor!=0)?($rendahnor/$total) * 100:0; echo round($persen5, 2)?>],
									['Rendah',   <?php $persen6=($rendah!=0)?($rendah/$total) * 100:0; echo round($persen6, 2)?>]
								]
							}]
						});
					});
					
					var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'content'
					},
					title: {
						text: 'Statistik Kecerdasan'
					},
					xAxis: {
						categories: ['Anak-anak', 'Remaja', 'Dewasa']
					},
					tooltip: {
						formatter: function() {
							var s;
							if (this.point.name) { // the pie chart
								s = ''+
									this.point.name +': '+ this.y +' orang';
							} else {
								s = ''+
									this.x  +': '+ this.y;
							}
							return s;
						}
					},
					labels: {
						items: [{
							html: 'Pengukur Kecerdasan',
							style: {
								left: '705px',
								top: '10px',
								color: 'black'				
							}
						}]
					},
					series: [{
						type: 'column',
						name: 'Jenius',
						data: [<?php echo ''.$jeniusk1.', '.$jeniusk2.', '.$jeniusk3.''; ?>]
					}, {
						type: 'column',
						name: 'Superior',
						data: [<?php echo ''.$superiork1.', '.$superiork2.', '.$superiork3.''; ?>]
					}, {
						type: 'column',
						name: 'Tinggi dalam kategori normal',
						data: [<?php echo ''.$tinggik1.', '.$tinggik2.', '.$tinggik3.''; ?>]
					}, {
						type: 'column',
						name: 'Normal',
						data: [<?php echo ''.$normalk1.', '.$normalk2.', '.$normalk3.''; ?>]
					}, {
						type: 'column',
						name: 'Rendah dalam kategori normal',
						data: [<?php echo ''.$rendahnork1.', '.$rendahnork2.', '.$rendahnork3.''; ?>]
					}, {
						type: 'column',
						name: 'Rendah',
						data: [<?php echo ''.$rendahk1.', '.$rendahk2.', '.$rendahk3.''; ?>]
					}, {
						type: 'spline',
						name: 'Rata-rata',
						data: [<?php echo round($k1, 2); echo ','; echo round($k2, 2); echo ','; echo round($k3, 2); ?>]
					}, {
						type: 'pie',
						name: 'Total consumption',
						data: [{
							name: 'Jenius',
							y: <?php echo ''.$jenius.''; ?>,
							color: '#008ab9' // Jane's color
						}, {
							name: 'Superior',
							y: <?php echo ''.$superior.''; ?>,
							color: '#4bbd2a' // John's color
						}, {
							name: 'Tinggi dalam kategori normal',
							y: <?php echo ''.$tinggi.''; ?>,
							color: '#ed541b' // John's color
						}, {
							name: 'Normal',
							y: <?php echo ''.$normal.''; ?>,
							color: '#d8e011' // John's color
						}, {
							name: 'Rendah dalam kategori normal',
							y: <?php echo ''.$rendahnor.''; ?>,
							color: '#35c1e4' // John's color
						}, {
							name: 'Rendah',
							y: <?php echo ''.$rendah.''; ?>,
							color: '#62e074' // Joe's color
						}],
						center: [770, 80],
						size: 100,
						showInLegend: false,
						dataLabels: {
							enabled: false
						}
					}]
				});
				
				
			});
				</script>
		<?php
			}
		}
	?>
		
		<script>
			function checkMe() {
				if (confirm("Apakah Anda Seius")) {
					return true;
				} else {
					return false;
				}
			}
		</script>
		
		<link rel="stylesheet" type="text/css" href="jquery.pageslide.css" />
		
		<script>
			/* Default pageslide, moves to the right */
			$(".first").pageslide();
			
			/* Slide to the left, and make it model (you'll have to call $.pageslide.close() to close) */
			$(".second").pageslide({ direction: "left", modal: true });
		</script>
       
        <!-- CSS Reset -->
		<link rel="stylesheet" type="text/css" href="reset.css" tppabs="http://www.xooom.pl/work/magicadmin/css/reset.css" media="screen" />
       
        <!-- Fluid 960 Grid System - CSS framework -->
		<link rel="stylesheet" type="text/css" href="grid.css" tppabs="http://www.xooom.pl/work/magicadmin/css/grid.css" media="screen" />
		
        <!-- IE Hacks for the Fluid 960 Grid System -->
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="ie6.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="ie.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie.css" media="screen" /><![endif]-->
        
        <!-- Main stylesheet -->
        <link rel="stylesheet" type="text/css" href="styles.css" tppabs="http://www.xooom.pl/work/magicadmin/css/styles.css" media="screen" />
        
        <!-- WYSIWYG editor stylesheet -->
        <link rel="stylesheet" type="text/css" href="jquery.wysiwyg.css" tppabs="http://www.xooom.pl/work/magicadmin/css/jquery.wysiwyg.css" media="screen" />
        
        <!-- Table sorter stylesheet -->
        <link rel="stylesheet" type="text/css" href="tablesorter.css" tppabs="http://www.xooom.pl/work/magicadmin/css/tablesorter.css" media="screen" />
        
        <!-- Thickbox stylesheet -->
        <link rel="stylesheet" type="text/css" href="thickbox.css" tppabs="http://www.xooom.pl/work/magicadmin/css/thickbox.css" media="screen" />
        
        <!-- Themes. Below are several color themes. Uncomment the line of your choice to switch to different color. All styles commented out means blue theme. -->
        <link rel="stylesheet" type="text/css" href="theme-blue.css" tppabs="http://www.xooom.pl/work/magicadmin/css/theme-blue.css" media="screen" />
        <!--<link rel="stylesheet" type="text/css" href="css/theme-red.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-yellow.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-green.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-graphite.css" media="screen" />-->
        
		
        
		<!-- JQuery WYSIWYG plugin script -->
		<script type="text/javascript" src="jquery.wysiwyg.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.wysiwyg.js"></script>
        
        <!-- JQuery tablesorter plugin script-->
		<script type="text/javascript" src="jquery.tablesorter.min.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.min.js"></script>
        
		<!-- JQuery pager plugin script for tablesorter tables -->
		<script type="text/javascript" src="jquery.tablesorter.pager.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.pager.js"></script>
        
		<!-- JQuery password strength plugin script -->
		<script type="text/javascript" src="jquery.pstrength-min.1.2.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.pstrength-min.1.2.js"></script>
        
		<!-- JQuery thickbox plugin script -->
		<script type="text/javascript" src="thickbox.js" tppabs="http://www.xooom.pl/work/magicadmin/js/thickbox.js"></script>
        
        <!-- Initiate WYIWYG text area -->
		<script type="text/javascript">
			$(function()
			{
			$('#wysiwyg').wysiwyg(
			{
			controls : {
			separator01 : { visible : true },
			separator03 : { visible : true },
			separator04 : { visible : true },
			separator00 : { visible : true },
			separator07 : { visible : false },
			separator02 : { visible : false },
			separator08 : { visible : false },
			insertOrderedList : { visible : true },
			insertUnorderedList : { visible : true },
			undo: { visible : true },
			redo: { visible : true },
			justifyLeft: { visible : true },
			justifyCenter: { visible : true },
			justifyRight: { visible : true },
			justifyFull: { visible : true },
			subscript: { visible : true },
			superscript: { visible : true },
			underline: { visible : true },
            increaseFontSize : { visible : false },
            decreaseFontSize : { visible : false }
			}
			} );
			});
        </script>
        
        <!-- Initiate tablesorter script -->
        <script type="text/javascript">
			$(document).ready(function() { 
				$("#myTable") 
				.tablesorter({
					// zebra coloring
					widgets: ['zebra'],
					// pass the headers argument and assing a object 
					headers: { 
						// assign the sixth column (we start counting zero) 
						6: { 
							// disable it by setting the property sorter to false 
							sorter: false 
						} 
					}
				}) 
			.tablesorterPager({container: $("#pager")}); 
		}); 
		</script>
        
        <!-- Initiate password strength script -->
		<script type="text/javascript">
			$(function() {
			$('.password').pstrength();
			});
        </script>
	</head>
	<body>
    	<!-- Header -->
        <div id="header">
            <!-- Header. Status part -->
            <div id="header-status">
                <div class="container_12">
                    <div class="grid_8">
					&nbsp;
                    </div>
                    <div class="grid_4">
                        <a href="logout.php" id="logout">
                        Logout
                        </a>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End #header-status -->
            
            <!-- Header. Main part -->
            <div id="header-main">
                <div class="container_12">
                    <div class="grid_12">
                        <div id="logo">
                            <ul id="nav">
								<?php

								if (isset($_GET['page']))
								{
									switch ($_GET['page']) {
									case 'home':
										echo '<li id="current"><a href="?page=home">Dashboard</a></li>
											<li><a href="?page=soal">Soal</a></li>
											<li><a href="?page=user">User</a></li>';
												if($acces == 0)
												{
													echo '<li><a href="?page=admin">Admin</a></li>';
												}
										echo '<li><a href="?page=ujian">Data Tes</a></li>
											<li><a href="?page=statistik">Statistik</a></li>
											<li><a href="?page=setting">Settings</a></li>';
										break;
									case 'soal':
										echo '<li><a href="?page=home">Dashboard</a></li>
											<li id="current"><a href="?page=soal">Soal</a></li>
											<li><a href="?page=user">User</a></li>';
												if($acces == 0)
												{
													echo '<li><a href="?page=admin">Admin</a></li>';
												}
										echo '<li><a href="?page=ujian">Data Tes</a></li>
											<li><a href="?page=statistik">Statistik</a></li>
											<li><a href="?page=setting">Settings</a></li>';
										break;
									case 'input':
										echo '<li><a href="?page=home">Dashboard</a></li>
											<li id="current"><a href="?page=soal">Soal</a></li>
											<li><a href="?page=user">User</a></li>';
												if($acces == 0)
												{
													echo '<li><a href="?page=admin">Admin</a></li>';
												}
										echo '<li><a href="?page=ujian">Data Tes</a></li>
											<li><a href="?page=statistik">Statistik</a></li>
											<li><a href="?page=setting">Settings</a></li>';
										break;
									case 'admin':
										echo '<li><a href="?page=home">Dashboard</a></li>
											<li><a href="?page=soal">Soal</a></li>
											<li><a href="?page=user">User</a></li>';
												if($acces == 0)
												{
													echo '<li id="current"><a href="?page=admin">Admin</a></li>';
												}
										echo '<li><a href="?page=ujian">Data Tes</a></li>
											<li><a href="?page=statistik">Statistik</a></li>
											<li><a href="?page=setting">Settings</a></li>';
										break;
									case 'plus':
										echo '<li><a href="?page=home">Dashboard</a></li>
											<li><a href="?page=soal">Soal</a></li>
											<li><a href="?page=user">User</a></li>';
												if($acces == 0)
												{
													echo '<li id="current"><a href="?page=admin">Admin</a></li>';
												}
										echo '<li><a href="?page=ujian">Data Tes</a></li>
											<li><a href="?page=statistik">Statistik</a></li>
											<li><a href="?page=setting">Settings</a></li>';
										break;
									case 'user':
										echo '<li><a href="?page=home">Dashboard</a></li>
											<li><a href="?page=soal">Soal</a></li>
											<li id="current"><a href="?page=user">User</a></li>';
												if($acces == 0)
												{
													echo '<li><a href="?page=admin">Admin</a></li>';
												}
										echo '<li><a href="?page=ujian">Data Tes</a></li>
											<li><a href="?page=statistik">Statistik</a></li>
											<li><a href="?page=setting">Settings</a></li>';
										break;
									case 'setting':
										echo '<li><a href="?page=home">Dashboard</a></li>
											<li><a href="?page=soal">Soal</a></li>
											<li><a href="?page=user">User</a></li>';
												if($acces == 0)
												{
													echo '<li><a href="?page=admin">Admin</a></li>';
												}
										echo '<li><a href="?page=ujian">Data Tes</a></li>
											<li><a href="?page=statistik">Statistik</a></li>
											<li id="current"><a href="?page=setting">Settings</a></li>';
										break;
									case 'ujian':
										echo '<li><a href="?page=home">Dashboard</a></li>
											<li><a href="?page=soal">Soal</a></li>
											<li><a href="?page=user">User</a></li>';
												if($acces == 0)
												{
													echo '<li><a href="?page=admin">Admin</a></li>';
												}
										echo '<li id="current"><a href="?page=ujian">Data Tes</a></li>
											<li><a href="?page=statistik">Statistik</a></li>
											<li><a href="?page=setting">Settings</a></li>';
										break;
									case 'statistik':
										echo '<li><a href="?page=home">Dashboard</a></li>
											<li><a href="?page=soal">Soal</a></li>
											<li><a href="?page=user">User</a></li>';
												if($acces == 0)
												{
													echo '<li><a href="?page=admin">Admin</a></li>';
												}
										echo '<li><a href="?page=ujian">Data Tes</a></li>
											<li id="current"><a href="?page=statistik">Statistik</a></li>
											<li><a href="?page=setting">Settings</a></li>';
										break;
									default:
										echo '<li id="current"><a href="?page=home">Dashboard</a></li>
											<li><a href="?page=soal">Soal</a></li>
											<li><a href="?page=user">User</a></li>';
												if($acces == 0)
												{
													echo '<li><a href="?page=admin">Admin</a></li>';
												}
										echo '<li><a href="?page=ujian">Data Tes</a></li>
											<li><a href="?page=statistik">Statistik</a></li>
											<li><a href="?page=setting">Settings</a></li>';
										break;
									}
								}
								else if (isset($_GET['module']))
								{
									switch ($_GET['module']) {
									case 'soal':
										echo '<li><a href="?page=home">Dashboard</a></li>
											<li id="current"><a href="?page=soal">Soal</a></li>
											<li><a href="?page=user">User</a></li>';
												if($acces == 0)
												{
													echo '<li><a href="?page=admin">Admin</a></li>';
												}
										echo '<li><a href="?page=ujian">Data Tes</a></li>
											<li><a href="?page=statistik">Statistik</a></li>
											<li><a href="?page=setting">Settings</a></li>';
										break;
									case 'admin':
										echo '<li><a href="?page=home">Dashboard</a></li>
											<li><a href="?page=soal">Soal</a></li>
											<li><a href="?page=user">User</a></li>';
												if($acces == 0)
												{
													echo '<li id="current"><a href="?page=admin">Admin</a></li>';
												}
										echo '<li><a href="?page=ujian">Data Tes</a></li>
											<li><a href="?page=statistik">Statistik</a></li>
											<li><a href="?page=setting">Settings</a></li>';
										break;
									default:
										echo '<li id="current"><a href="?page=home">Dashboard</a></li>
										<li><a href="?page=soal">Soal</a></li>
										<li><a href="?page=user">User</a></li>';
											if($acces == 0)
											{
												echo '<li><a href="?page=admin">Admin</a></li>';
											}
									echo '<li><a href="?page=ujian">Data Tes</a></li>
										<li><a href="?page=statistik">Statistik</a></li>
										<li><a href="?page=setting">Settings</a></li>';
									}
								}
								else
								{
									echo '<li id="current"><a href="?page=home">Dashboard</a></li>
										<li><a href="?page=soal">Soal</a></li>
										<li><a href="?page=user">User</a></li>';
											if($acces == 0)
											{
												echo '<li><a href="?page=admin">Admin</a></li>';
											}
									echo '<li><a href="?page=ujian">Data Tes</a></li>
										<li><a href="?page=statistik">Statistik</a></li>
										<li><a href="?page=setting">Settings</a></li>';
								}
								?>
                            </ul>
                        </div><!-- End. #Logo -->
                    </div><!-- End. .grid_12-->
                    <div style="clear: both;"></div>
                </div><!-- End. .container_12 -->
            </div> <!-- End #header-main -->
            <div style="clear: both;"></div>
            <!-- Sub navigation -->
            <div id="subnav">
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
        </div> <!-- End #header -->
        
		<?php

		if (isset($_GET['page']))
		{
			switch ($_GET['page']) {
			case 'home':
				include('dashboard.php');
				break;
			case 'soal':
				include('soal.php');
				break;
			case 'input':
				include('input.php');
				break;
			case 'admin':
				include('man_admin.php');
				break;
			case 'plus':
				include('plus_admin.php');
				break;
			case 'user':
				include('user.php');
				break;
			case 'ujian':
				include('ujian.php');
				break;
			case 'setting':
				include('setting.php');
				break;
			case 'statistik':
				include('statistik.php');
				break;	
			default:
				include('dashboard.php');
				break;
			}
		}
		else if (isset($_GET['module']))
		{
			switch ($_GET['module']) {
			case 'soal':
				include('edit.php');
				break;
			case 'admin':
				include('edit_admin.php');
				break;
			default:
				include('dashboard.php');
				break;
			}
		}
		else
		{
			include('dashboard.php');
		}
		?>
           
        <!-- Footer -->
        <div id="footer">
        	<div class="container_12">
            	<div class="grid_12">
                	<!-- You can change the copyright line for your own -->
                	<p>&copy; 2010. <a href="http://www.templatescreme" title="Visit For More Free Website Templates">Free Website Templates</a></p>
        		</div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->
	</body>
</html>