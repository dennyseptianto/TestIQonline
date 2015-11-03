<script type="text/javascript">
				
					var chart;
					$(document).ready(function() {
						chart = new Highcharts.Chart({
							chart: {
								renderTo: 'graf',
								plotBackgroundColor: null,
								plotBorderWidth: null,
								plotShadow: false
							},
							title: {
								text: 'Statistik IQ'
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
						renderTo: 'graph'
					},
					title: {
						text: 'Statistik IQ'
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
							html: 'Test IQ',
							style: {
								left: '300px',
								top: '0px',
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
						center: [360, 50],
						size: 70,
						showInLegend: false,
						dataLabels: {
							enabled: false
						}
					}]
				});
				
				
			});
				</script>

<div class="header-banner">
					<!-- Top Navigation -->
					<section class="bgi banner5"><h2>Statistik</h2> </section>
					<!-- untuk judul halaman -->
		<div class="typrography">
	 <div class="container">
				<a href="?page=history"><button type="submit" class="btn btn-info" style="position:absolute">Lihat Juga Histori Test</button> </a>
				<article class="isi">	
						<div id="graf" style="width: 600px; height: 300px; margin: 30px auto"></div>
						<div id="graph" style="width: 600px; height: 300px; margin: 30px auto"></div>
				</article>
				<!-- isi penjelasan halaman -->
		</div>
	</div>
</div>