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

$pdf->Cell(190,7,'LAPORAN TOPUP PULSA ',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'ARIMA KOMUNIKA',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(30,6,'Kode Topup',1,0);
$pdf->Cell(40,6,'Nama',1,0);
$pdf->Cell(30,6,'Nomor Hp',1,0);
$pdf->Cell(30,6,'Jumlah Topup',1,0);
$pdf->Cell(20,6,'Total',1,1);

$pdf->SetFont('Arial','',10);

include 'koneksi.php';
$p = empty($_GET['p']) ? "" : $_GET['p'];
if ($p == "") {
	$arima = mysqli_query($config, "select * from topup");
$no = 1;

$getID = mysqli_fetch_assoc(mysqli_query($config, "select jml_topup from topup"));
$total = $getID['jml_topup'];
$totalakhir = 0;

$number =  mysqli_num_rows(mysqli_query($config, "select jml_topup from topup"));


while ($row = mysqli_fetch_array($arima)){
    $totalakhir = $totalakhir + (int)$row['jml_topup'];
    $pdf->Cell(10,6,$no,1,0);
    $pdf->Cell(30,6,$row['kd_topup'],1,0); 
 	   $idpl = $row['id_pelanggan'];
    $pls = mysqli_query($config,"select * from pelanggan where id_pelanggan = '$idpl'");
    $dpls = mysqli_fetch_array($pls);

    $pdf->Cell(40,6,$dpls['nm_pl'],1,0);
    $pdf->Cell(30,6,$row['no_hp'],1,0);
    $pdf->Cell(30,6,$row['jml_topup'],1,0);
    
    if($no==$number){
        $pdf->Cell(20,6,$totalakhir,1,1);
    }else{
        $pdf->Cell(20,6,'',1,1);
    }
    
$no++;
}

}elseif ($p == "today") {
	$t = $_GET['t'];
	$arima = mysqli_query($config, "select * from sms_transaksi where tanggal = '$t'");
$no = 1;

$getID = mysqli_fetch_assoc(mysqli_query($config, "select jml_topup from topup"));
$total = $getID['jml_topup'];
$totalakhir = 0;

$number =  mysqli_num_rows(mysqli_query($config, "select jml_topup from topup"));

while ($row = mysqli_fetch_array($arima)){
     $totalakhir = $totalakhir + (int)$row['jml_topup'];
    $pdf->Cell(10,6,$no,1,0);
    $pdf->Cell(30,6,$row['kd_topup'],1,0); 
       $idpl = $row['id_pelanggan'];
    $pls = mysqli_query($config,"select * from pelanggan where id_pelanggan = '$idpl'");
    $dpls = mysqli_fetch_array($pls);

    $pdf->Cell(40,6,$dpls['nm_pl'],1,0);
    $pdf->Cell(30,6,$row['no_hp'],1,0);
    $pdf->Cell(30,6,$row['jml_topup'],1,0);
    $pdf->Cell(20,6,$totalakhir,1,1);

    if($no==$number){
        $pdf->Cell(20,6,$totalakhir,1,1);
    }else{
        $pdf->Cell(20,6,'',1,1);
    }

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

$getID = mysqli_fetch_assoc(mysqli_query($config, "select jml_topup from topup"));
$total = $getID['jml_topup'];
$totalakhir = 0;

$number =  mysqli_num_rows(mysqli_query($config, "select jml_topup from topup"));

while ($row = mysqli_fetch_array($arima)){
     $totalakhir = $totalakhir + (int)$row['jml_topup'];
    $pdf->Cell(10,6,$no,1,0);
    $pdf->Cell(30,6,$row['kd_topup'],1,0); 
       $idpl = $row['id_pelanggan'];
    $pls = mysqli_query($config,"select * from pelanggan where id_pelanggan = '$idpl'");
    $dpls = mysqli_fetch_array($pls);

    $pdf->Cell(40,6,$dpls['nm_pl'],1,0);
    $pdf->Cell(30,6,$row['no_hp'],1,0);
    $pdf->Cell(30,6,$row['jml_topup'],1,0);
    $pdf->Cell(20,6,$totalakhir,1,1);

    if($no==$number){
        $pdf->Cell(20,6,$totalakhir,1,1);
    }else{
        $pdf->Cell(20,6,'',1,1);
    }
        
$no++;
}
}else{
	$pdf->Cell(160,6,'Tidak ada Transaksi',1,0,'C');
}


$pdf->Output();
?>
