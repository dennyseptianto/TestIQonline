<?php
	include ('cek-login.php');
	try{
		$sql = 'SELECT * FROM ujian where id = ?'; 
		$ssql = $db->prepare($sql);
		$user = ($_SESSION['username']);
		$ssql->execute(array($user));
		$res = $ssql->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?>
<script type="text/javascript">
	var chart;
	$(document).ready(function() {
	chart = new Highcharts.Chart({
	chart: {
		renderTo: 'history',
		plotBackgroundColor: null,
		plotBorderWidth: null,
		plotShadow: false
	},
	title: {
		text: 'Statistik Kecerdasan <?php echo ''.$_SESSION['username'].''; ?>'
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
				y: <?php $persen01=($jenius1!=0)?($jenius1/$total1) * 100:0; echo round($persen01, 2) ?>,
				sliced: true,
				selected: true
			},
			['Superior',    <?php $persen02=($superior1!=0)?($superior1/$total1) * 100:0; echo round($persen02, 2)?>],
			['Tinggi dalam kategori normal',       <?php $persen03=($tinggi1!=0)?($tinggi1/$total1) * 100:0; echo round($persen03, 2)?>],
			['Normal',   <?php $persen04=($normal1!=0)?($normal1/$total1) * 100:0; echo round($persen04, 2)?>],
			['Rendah dalam kategori normal',     <?php $persen05=($rendahnor1!=0)?($rendahnor1/$total1) * 100:0; echo round($persen05, 2)?>],
			['Rendah',   <?php $persen06=($rendah1!=0)?($rendah1/$total1) * 100:0; echo round($persen06, 2)?>]
		]
	}]
	});
	});
</script>

<div class="header-banner">
					<!-- Top Navigation -->
					<section class="bgi banner5"><h2>History Test</h2> </section>
					<!-- untuk judul halaman -->
		<div class="typrography">
	 <div class="container">
				<a href="?page=statistik"><button type="submit" class="btn btn-info" style="position:absolute">Back</button> </a>
				<br>
				<article class="isi">
					<h3 align="center">Hasil TestMu</h3>
					</br>
					<table align="center" id="IQ">
						<thead>
							<tr>
								<th width="5%">No</th>
								<th width="10%">Skor</td>
								<th width="30%">Deskripsi</th>
								<th width="20%">Kategori Tes</th>
								<th width="10%">Tanggal</th>
								<th width="5%"></th>
							</tr>
						</thead>
						<tbody>
						<?php
							$No = 1;
							foreach($res as $data){
							if($No % 2 == 1)
							{
								echo '<tr>
									<td>'.$No.'</td>
									<td>'.$data['skor'].'</td>';
									if ($data['skor'] <= 89 && $data['skor'] >=70)
									{
										echo '<td>Rendah</td>';
									}
									else if ($data['skor'] <= 101 && $data['skor'] >=90)
									{
										echo '<td>Rendah yang masih dalam kategori normal</td>';
									}
									else if ($data['skor'] <= 114 && $data['skor'] >=102)
									{
										echo '<td>Normal</td>';
									}
									else if ($data['skor'] <= 129 && $data['skor'] >=115)
									{
										echo '<td>Tinggi dalam kategori normal</td>';
									}
									else if ($data['skor'] <= 139 && $data['skor'] >=130)
									{
										echo '<td>Superior</td>';
									}
									else
									{
										echo '<td>Jenius</td>';
									}
									if($data['kd_kategori'] == 'k1')
									{
										echo '<td>Anak-anak</td>';
									}
									else if($data['kd_kategori'] == 'k2')
									{
										echo '<td>Remaja</td>';
									}
									else if($data['kd_kategori'] == 'k3')
									{
										echo '<td>Dewasa</td>';
									}
									echo '<td>'.$data['tanggal'].'</td>
									<td><a href="cetak.php?id='.$data['no_ujian'].'" target="_blank"><img src="pdficon.gif" tppabs="http://godif.org/e107_images/pdficon.gif" width="20" height="20" alt="pdf" /></a></td>
								</tr>';
							}	
							else
							{
								echo '<tr>
									<td class="warna">'.$No.'</td>
									<td class="warna">'.$data['skor'].'</td>';
									if ($data['skor'] <= 89 && $data['skor'] >=70)
									{
										echo '<td class="warna">Rendah</td>';
									}
									else if ($data['skor'] <= 101 && $data['skor'] >=90)
									{
										echo '<td class="warna">Rendah yang masih dalam kategori normal</td>';
									}
									else if ($data['skor'] <= 114 && $data['skor'] >=102)
									{
										echo '<td class="warna">Normal</td>';
									}
									else if ($data['skor'] <= 129 && $data['skor'] >=115)
									{
										echo '<td class="warna">Tinggi dalam kategori normal</td>';
									}
									else if ($data['skor'] <= 139 && $data['skor'] >=130)
									{
										echo '<td class="warna">Superior</td>';
									}
									else
									{
										echo '<td class="warna">Jenius</td>';
									}
									if($data['kd_kategori'] == 'k1')
									{
										echo '<td class="warna">Anak-anak</td>';
									}
									else if($data['kd_kategori'] == 'k2')
									{
										echo '<td class="warna">Remaja</td>';
									}
									else if($data['kd_kategori'] == 'k3')
									{
										echo '<td class="warna">Dewasa</td>';
									}
									echo '<td class="warna">'.$data['tanggal'].'</td>
									<td class="warna"><a href="cetak.php?id='.$data['no_ujian'].'" target="_blank"><img src="pdficon.gif" tppabs="http://godif.org/e107_images/pdficon.gif" width="20" height="20" alt="pdf" /></a></td>
								</tr>';
							}
							$No = $No + 1;
							}
							?>
						</tbody>
					</table>
					<div id="history" style="width: 600px; height: 300px; margin: 30px auto"></div>
				</article>
				<!-- isi penjelasan halaman -->
			</div>
		</div>
	</div>
