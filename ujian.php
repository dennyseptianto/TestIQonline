<?php
	include ('cek-login.php');
	if (isset($_POST['jawab'])||isset($_POST['soal']))
	{
		if($_POST['jawab']){
			$skor = 0;
			
			for($i=1; $i <= 15; $i++)
			{
				$soal = $_POST['kd_soal'.$i.''];
				$sql = 'SELECT * FROM soal where kd_soal=:kd_soal';
				$query = $db->prepare($sql);
				$query->execute(array(
					'kd_soal' => $soal
				));
				$kode = $query->fetch();
				if($kode['kunci'] == $_POST['pil'.$i.''])
				{
					$skor = $skor + $kode['skor'];
				}

			}
			$skor = ($skor * 3) + 70;
			try{
				$tanggal=date("Y-m-d");
				$sql = 'insert into ujian value 
						(:no_ujian, :id, :kd_kategori, :tanggal, :skor)';
				$ssql = $db->prepare($sql);
				$ssql->execute(array(':no_ujian' => "", ':id' => $_SESSION['username'], 
									':kd_kategori' => $_POST['kd_kategori'], ':tanggal' => $tanggal, ':skor' => $skor ));
			} catch (PDOException $e){
				echo '<script>alert("Maaf Submit Jawaban Gagal");
				<script language="JavaScript">document.location="index.php"</script>'.$e->getMessage(); 
			}
		}
	}
	else if(isset($_POST['timer']))
	{
		if($_POST['timer']){
			$skor = 0;
			for($i=1; $i <= 15; $i++)
			{
				$soal = $_POST['kd_soal'.$i.''];
				$sql = 'SELECT * FROM soal where kd_soal=:kd_soal';
				$query = $db->prepare($sql);
				$query->execute(array(
					'kd_soal' => $soal
				));
				$kode = $query->fetch();
				if($kode['kunci'] == $_POST['pil'.$i.''])
				{
					$skor = $skor + $kode['skor'];
				}
			}
			$skor = ($skor * 3) + 70;
			try{
				$tanggal=date("Y-m-d");
				$sql = 'insert into ujian value 
						(:no_ujian, :id, :kd_kategori, :tanggal, :skor)';
				$ssql = $db->prepare($sql);
				$ssql->execute(array(':no_ujian' => "", ':id' => $_SESSION['username'], 
									':kd_kategori' => $_POST['kd_kategori'], ':tanggal' => $tanggal, ':skor' => $skor ));
			} catch (PDOException $e){
				echo '<script>alert("Maaf Submit Jawaban Gagal");
				<script language="JavaScript">document.location="index.php"</script>'.$e->getMessage(); 
			}
		}
	}
	else
	{
		?> <script language="JavaScript">document.location='index.php'</script> <?php
	}
?>

<div class="header-banner">
					<!-- Top Navigation -->
					<section class="bgi banner5"><h2>Hasil Ujian</h2> </section>
					<!-- untuk judul halaman -->
		<div class="typrography">
	 <div class="container">
				<h2 class="isi">Terima Kasih Telah Mengikuti Tes</h2>
				<!-- untuk judul halaman -->
				<article class="isi">
				<?php
					echo '<h3 id="skor">Anda  dengan IQ : '.$skor.' atau ';
						if ($skor <= 89 && $skor >=70)
						{
							echo 'Rendah';
						}
						else if ($skor <= 101 && $skor >=90)
						{
							echo 'Rendah yang masih dalam kategori normal';
						}
						else if ($skor <= 114 && $skor >=102)
						{
							echo 'Normal';
						}
						else if ($skor <= 129 && $skor >=115)
						{
							echo 'Tinggi dalam kategori normal';
						}
						else if ($skor <= 139 && $skor >=130)
						{
							echo 'Superior';
						}
						else
						{
							echo 'Jenius';
						}
						echo '</h3>';
					?>
					Jika ingin mendownload sertifikat, bukalah pada menu history.<br />
					<table id="IQ">
						<thead>
							<tr>
								<th>Level</th>
								<th>IQ</td>
								<th>Deskripsi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Jenius</td>
								<td>140+</td>
								<td>Kamu mungkin memang Jenius.</td>
							</tr>
							<tr>
								<td class="warna">Superior</td>
								<td class="warna">130 - 139</td>
								<td class="warna">Kamu mempunyai tingkat imaginasi dan logika yang tinggi.</td>
							</tr>
							<tr>
								<td>Tinggi dalam kategori normal</td>
								<td>115 - 129</td>
								<td>Kamu mempunyai tingkat imaginasi dan logika yang bagus.</td>
							</tr>
							<tr>
								<td class="warna">Normal</td>
								<td class="warna">102 - 114</td>
								<td class="warna">Kamu mempunyai tingkat imaginasi dan logika yang rata-rata.</td>
							</tr>
							<tr>
								<td>Rendah yang masih dalam kategori normal</td>
								<td>90 - 101</td>
								<td>Kamu mempunyai tingkat imaginasi dan logika yang rata-rata.</td>
							</tr>
							<tr>
								<td class="warna">Rendah</td>
								<td class="warna">70 - 89</td>
								<td class="warna">Kamu mempunyai tingkat imaginasi dan logika yang dibawah rata-rata.</td>
							</tr>
						</tbody>
					</table>
					<p>Berikut adalah beberapa tips meningkatkan pemikiran dan memori</p>
					<p>Tes IQ yang digunakan oleh sejumlah perusahaan untuk membantu mengukur tingkat berfikir dan logika para pelamar pekerjaan dalam perusahaan. 
					<p>Untuk mendapatkan potensi yang maksimum, sangat penting untuk menjamin pasokan darah yang cukup oksigen dan nutrisi ke otak. Dengan
					latihan aerobik selama 20 menit, secara signifikan meningkatkan kemampuan berfikir dan memori. Ini merangsang produksi hormon pertumbuhan yang 
					diperlukan untuk memulihkan sel-sel saraf. Selain itu dapat merangsang pembentukan neurotransmitter untuk memori menjadi yang lebih baik , 
					dan juga dapat mengurangi stres.</p>
					<p>Selain itu ada juga cara yang lain, lebih mudah dan lebih cepat cara untuk merangsang efektifitas otak, dan dapat berlatih di mana saja. 
					Yaitu dengan latihan pernapasan. Secara perlahan-lahan tarik nafas sambil menghitung sampai 8, kemudian tahan nafas selama 12 hitungan dan 
					hembuskan nafas perlahan sambil menghitung sampai 10.</p>
					<p>Selalu pastikan bahwa punggung dalam posisi lurus, hal ini secara signifikan akan meningkatkan suplai darah ke otak. Juga , pastikan bahwa 
					tidak duduk dalam waktu lama, tetapi berdirilah untuk sementara waktu. Sudah terbukti secara ilmiah bahwa posisi berdiri meningkatkan kemampuan 
					untuk belajar dan berpikir hingga 30 %.</p>
					<p>Kemudian, pastikan bahwa makan makanan yang sehat dan bergizi. Saran ini sering sangat diremehkan, tetapi ada penelitian yang menunjukkan 
					bahwa hal itu dapat membantu meningkatkan IQ sebesar 10 poin atau bahkan lebih.</p>
				</article>
				<!-- isi penjelasan halaman -->
			</div>
		</div>
	</div>