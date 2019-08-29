<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
$pdf->Image('logoimg.png',30,8);
// $pdf->Image('img.png',10,12);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);

// mencetak string 

$pdf->Cell(190,7,'LAPORAN TRANSAKSI PULSA ',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'ARIMA KOMUNIKA',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(20,6,'Tanggal',1,0);
$pdf->Cell(27,6,'Provider',1,0);
$pdf->Cell(27,6,'Nomor',1,0);
$pdf->Cell(27,6,'Nominal',1,0);
$pdf->Cell(27,6,'Harga Beli',1,0);
$pdf->Cell(27,6,'Harga Jual',1,1);

$pdf->SetFont('Arial','',10);

include 'koneksi.php';
$p = empty($_GET['p']) ? "" : $_GET['p'];
if ($p == "") {
	$arima = mysqli_query($config, "select * from sms_transaksi");
$no = 1;
while ($row = mysqli_fetch_array($arima)){
    $pdf->Cell(10,6,$no,1,0);
    $pdf->Cell(20,6,$row['tanggal'],1,0); 
 	   $idpls = $row['id_pulsa'];
    $pls = mysqli_query($config,"select pulsa.*, provider.* from pulsa, provider where pulsa.id_provider = provider.id_provider and pulsa.id_pulsa = '$idpls'");
    $dpls = mysqli_fetch_array($pls);

    $pdf->Cell(27,6,$dpls['nama_provider'],1,0);
    $pdf->Cell(27,6,$row['no_telp'],1,0);
    $pdf->Cell(27,6,$row['nominal'],1,0);
    $pdf->Cell(27,6,$dpls['hrg_beli'],1,0);
    $pdf->Cell(27,6,$dpls['hrg_jual'],1,1);

    
$no++;
}
}elseif ($p == "today") {
	$t = $_GET['t'];
	$arima = mysqli_query($config, "select * from sms_transaksi where tanggal = '$t'");
$no = 1;
while ($row = mysqli_fetch_array($arima)){
    $pdf->Cell(10,6,$no,1,0);
    $pdf->Cell(20,6,$row['tanggal'],1,0); 
 	   $idpls = $row['id_pulsa'];
    $pls = mysqli_query($config,"select pulsa.*, provider.* from pulsa, provider where pulsa.id_provider = provider.id_provider and pulsa.id_pulsa = '$idpls'");
    $dpls = mysqli_fetch_array($pls);

    $pdf->Cell(27,6,$dpls['nama_provider'],1,0);
    $pdf->Cell(27,6,$row['no_telp'],1,0);
    $pdf->Cell(27,6,$row['nominal'],1,0);
    $pdf->Cell(27,6,$dpls['hrg_beli'],1,0);
    $pdf->Cell(27,6,$dpls['hrg_jual'],1,1);

    
$no++;
}
}elseif ($p == "pilih") {

	$d1 = $_POST['d1'];
	$m1 = $_POST['m1'];
	$t1 = $_POST['t1'];
	$day1 = $t1."-".$m1."-".$d1 ;
	$d2 = $_POST['d2'];
	$m2 = $_POST['m2'];
	$t2 = $_POST['t2'];
	$day2 = $t2."-".$m2."-".$d2 ;


	$arima = mysqli_query($config, "select * from sms_transaksi where tanggal between '$day1' and '$day2' ");
$no = 1;
while ($row = mysqli_fetch_array($arima)){
    $pdf->Cell(10,6,$no,1,0);
    $pdf->Cell(20,6,$row['tanggal'],1,0); 
 	   $idpls = $row['id_pulsa'];
    $pls = mysqli_query($config,"select pulsa.*, provider.* from pulsa, provider where pulsa.id_provider = provider.id_provider and pulsa.id_pulsa = '$idpls'");
    $dpls = mysqli_fetch_array($pls);

    $pdf->Cell(27,6,$dpls['nama_provider'],1,0);
    $pdf->Cell(27,6,$row['no_telp'],1,0);
    $pdf->Cell(27,6,$row['nominal'],1,0);
    $pdf->Cell(27,6,$dpls['hrg_beli'],1,0);
    $pdf->Cell(27,6,$dpls['hrg_jual'],1,1);

    
$no++;
}
}else{
	$pdf->Cell(165,6,'Tidak ada Transaksi',1,0,'C');
}


$pdf->Output();
?>
