<?php
	include ('cek-login.php');
	if (!isset($_POST['kategori']))
	{
		try{
		$sql = "SELECT * FROM test_kategori";
		$res = $db->query($sql); } 
		catch (PDOException $e) { echo $e->getMessage(); 
		}
	}
	else if (isset($_POST['kategori']))
	{
		try{
		$user = $_SESSION['username'];
		$sql = 'SELECT * FROM soal where kd_kategori = ?  and status = "publish" ORDER BY RAND() LIMIT 15'; 
		$ssql = $db->prepare($sql);
		$kode = $_POST['kode'];
		$ssql->execute(array($kode));
		$soal = $ssql->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
?> 
<div class="header-banner" align="center">
					<!-- Top Navigation -->
					<section class="bgi banner5"><h2>Test</h2> </section>
					<!-- untuk judul halaman -->
		<div class="typrography">
	 <div class="container">
				<?php
				if (!isset($_POST['kategori'])){ echo '
					<article class="isi">
						<div class="register">
							<form style="text-align:center" name="kategori" method="post" action="">
								<p>
									<label><h3>Kategori Soal :</h3></label>
									<select name="kode" class="form-kategori" >';
										foreach($res as $data){
											echo '<option value="' .$data['kd_kategori']. '">'.$data['nm_kategori'].'</option>';
									}
									echo '</select>
								</p>
								</br>
								<p class="submit"><input class="btn btn-info mrgn-can" type="submit" name="kategori" value="Mulai Tes"></p>
								
							</form>
						</div>
					</article>';
				}
				else if (isset($_POST['kategori'])) { echo '
				<center><script type="application/javascript">
					function countdownComplete(){
						document.getElementById("soal").submit();
					}
					var myCountdown2 = new Countdown({
						time: 600, 
						width:200, 
						height:80, 
						rangeHi:"minute",	// <- no comma on last item!
						onComplete	: countdownComplete
					});
				</script></center>
					<table>
					<tbody >
					<form id="soal" name="soal" method="post" action="index.php?page=hasil">';
						$no = 1;
						foreach($soal as $data){
							$next=$no+1;
							$back=$no-1;
							if($no==1)
							{
							echo 
								'<tr id="hidethis'.$no.'">
									<td style="width:30px">
											<h2><b>'.$no.'.</b><h2>
									</td>
									<td><h4><p class="breadcrumb">'.$data['soal'].'</p></h4></td>
								</tr>
									<input name="kd_soal'.$no.'" type="hidden" value="'.$data['kd_soal'].'" />
									<tr id="hide'.$no.'"><td></td><td><input type="radio" name="pil'.$no.'" value="A"> A. '.$data['pil_a'].'<br />
									<input type="radio" name="pil'.$no.'" value="B" > B. '.$data['pil_b'].'<br />
									<input type="radio" name="pil'.$no.'" value="C"> C. '.$data['pil_c'].'<br />
									<input type="radio" name="pil'.$no.'" value="D"> D. '.$data['pil_d'].'<br />
									<input type="radio" name="pil'.$no.'" value="E"  checked style="display:none"></td></tr>
									
									<tr id="hilang'.$no.'">
										<td></td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<button type="button" onClick="toggle('.$next.');">Next</button></td>
									</tr>';
							}
							else
							{
							echo '<tr id="hidethis'.$no.'" style="display:none;"><td style="width:30px"><h2><b>'.$no.'.</b><h2></td><td><h4><p class="breadcrumb">'.$data['soal'].'</p></h4></td></tr>
									<input name="kd_soal'.$no.'" type="hidden" value="'.$data['kd_soal'].'" />
									<tr id="hide'.$no.'" style="display:none;"><td></td><td>
									<input type="radio" name="pil'.$no.'" value="A"> A. '.$data['pil_a'].'<br />
									<input type="radio" name="pil'.$no.'" value="B" > B. '.$data['pil_b'].'<br />
									<input type="radio" name="pil'.$no.'" value="C"> C. '.$data['pil_c'].'<br />
									<input type="radio" name="pil'.$no.'" value="D"> D. '.$data['pil_d'].'<br />
									<input type="radio" name="pil'.$no.'" value="E"  checked style="display:none"></td></tr>
									
									<tr id="hilang'.$no.'" style="display:none;">
										<td></td>';
										if($no!=15)
										{
											echo '<td>&nbsp;&nbsp;<button type="button" onClick="toggle('.$back.');">Back</button>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											
											<button type="button" onClick="toggle('.$next.');">Next</button></td>';
										}
										else
										{
											echo '<td>&nbsp;&nbsp;<button  type="button" onClick="toggle('.$back.');">Back</button>';
										}
									echo '</tr>';
							}
						$no = $no + 1;
						} echo ' <input name="kd_kategori" type="hidden" value="'.$_POST['kode'].'" />
					</tbody>
					</table>'; 
						echo '<nav><ul class="pagination">';
						
						for($nomor=1;$nomor<=15;$nomor++)
						{
							if($nomor==1)
							{
								echo '<li onClick="toggle('.$nomor.');"><span style="font-weight:bold;" id="nomor'.$nomor.'" >'.$nomor.'</span></li>';
							}
							else
							{
								echo '<li onClick="toggle('.$nomor.');"><span id="nomor'.$nomor.'" >'.$nomor.'</span></li>';
							}
						}
						echo '</ul></nav>';
					echo '<input type="hidden" name="timer" value="timer">
					<p class="submit"><input class="btn btn-info mrgn-can" type="submit" name="jawab" value="Submit"></p>
					</form>';
				}
				?>
				
				<!-- isi penjelasan halaman -->
		</div>
	</div>
</div>
