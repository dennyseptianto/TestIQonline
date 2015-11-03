<?php
	include "db.php";
	include "fpdf/fpdf.php";
	try{
		$sql = 'SELECT * FROM ujian where no_ujian = ?'; 
		$ssql = $db->prepare($sql);
		$nomor = ($_GET['id']);
		$ssql->execute(array($nomor));
		$res = $ssql->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	try{
		$sql = 'SELECT * FROM peserta where id = ?'; 
		$ssql = $db->prepare($sql);
		$user = ($_SESSION['username']);
		$ssql->execute(array($user));
		$peserta = $ssql->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	$nama = ''.$peserta[0]['nama'].'';
	$nama = strtoupper($nama);
	$tgl = date("dmY", strtotime($res[0]['tanggal']));
	if($res[0]['kd_kategori'] == 'k1')
	{
		$kategori = 'Anak-anak';
	}
	else if($res[0]['kd_kategori'] == 'k2')
	{
		$kategori = 'Remaja';
	}
	else if($res[0]['kd_kategori'] == 'k3')
	{
		$kategori = 'Dewasa';
	}
	if ($res[0]['skor'] <= 89 && $res[0]['skor'] >=70)
	{
		$tingkat = 'Rendah';
	}
	else if ($res[0]['skor'] <= 101 && $res[0]['skor'] >=90)
	{
		$tingkat = 'Rendah yang masih dalam kategori normal';
	}
	else if ($res[0]['skor'] <= 114 && $res[0]['skor'] >=102)
	{
		$tingkat = 'Normal';
	}
	else if ($res[0]['skor'] <= 129 && $res[0]['skor'] >=115)
	{
		$tingkat = 'Tinggi dalam kategori normal';
	}
	else if ($res[0]['skor'] <= 139 && $res[0]['skor'] >=130)
	{
		$tingkat = 'Superior';
	}
	else
	{
		$tingkat = 'Jenius';
	}
	if($res[0]['id'] != $user)
	{
		echo '<script>document.location="index.php"</script>';
	}
	$pdf = new FPDF('L','cm','A4');
	$pdf->Open();
	$pdf->addPage();
	$pdf->setAutoPageBreak(false);
	$pdf->setFont('Times','',17);

	$pdf->Image('sertifikatku.jpg',0,0,29.7,21);

	$pdf->Text(20.5, 5.84, ''.$kategori.'');
	$pdf->setFont('Times','B',20);
	$pdf->text(14.2,12,''.$res[0]['skor'].'','C');
	$pdf->Cell(0, 25.5, ''.$tingkat.'', 0, 0, 'C', 0, 0);

	$pdf->setFont('Times','B',36);
	$pdf->Cell(-28, 15.4, ''.$nama.'', 0, 0, 'C', 0, 0);

	$pdf->setFont('Times','B',14);
	$pdf->text(7.58,2.818,''.$tgl.'/'.$nomor.'','C');

	$pdf->output();
?>