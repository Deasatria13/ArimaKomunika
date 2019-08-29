<?php 
include "koneksi.php";
include "fungsi_upload.php";

$aksi = $_GET['aksi'];
$tbl = $_GET['tbl'];

  $id = $_POST['id_pulsa'];
  $no_telp = $_POST['no_telp'];
  $nominal = $_POST['nominal'];

if($aksi == "input" && $tbl == "pelanggan"){
	$kd= htmlspecialchars($_POST['kd_pelanggan']);
	$a = htmlspecialchars($_POST['nm_pl']);
	$b = htmlspecialchars($_POST['jk']);
	$c = htmlspecialchars($_POST['alamat']);
	$d = htmlspecialchars($_POST['no_hp']);
	$e = htmlspecialchars($_POST['user']);
	$p1 = htmlspecialchars($_POST['pass']);
	$p2 = htmlspecialchars($_POST['pass2']);

	$kode = rand(3,9999);


	//AMBIL SMS CENTER
         $sql="SELECT  * FROM no_center as nc INNER JOIN sms_center as sc ON nc.id_sms_center=sc.id_sms_center where nc.utama='Y' LIMIT 1";
                        
        if (!$result=  mysqli_query($config, $sql)){
             die('Error:'.mysqli_error($config));
        }  else {
            if (mysqli_num_rows($result) > 0){
                while ($row=  mysqli_fetch_assoc($result)){
                    $center =  $row['no_telepon'];
                }
            }
        }

	$qdaftar = mysqli_query($config,"insert into pelanggan values('$kd','$a','$b','$c','$d','$e','$p2','0')");
	$qvalidasi = mysqli_query($config,"insert into validasi values('','$kd','$d','$kode','')");

	if($qdaftar){

		$message = "User baru membutuhkan konfirmasi pendaftaran, silahkan cek halaman admin untuk konfirmasi";
		exec('c:\xampp\htdocs\Arima_Komunika1\controlsms\gammu\bin\gammu-smsd-inject.exe -c c:\xampp\htdocs\Arima_Komunika1\controlsms\gammu\bin\mysmsdrc EMS '.$center.' -text "'.$message.'"');
		echo "<script>alert('Pendaftaran berhasil, silahkan tunggu SMS konfirmasi untuk dapat login');window.location='index.php?page=pelanggan';</script>";
	}else{
		echo "<script>alert('Pendaftaran gagal');</script>";
	}
	}

	


if ($aksi == "input" && $tbl == "topup") {
	$a = htmlspecialchars($_POST['kd_topup']);
	$b = htmlspecialchars($_POST['id_pelanggan']);
	$c = htmlspecialchars($_POST['jml_topup']);
	$d = htmlspecialchars($_POST['m_bayar']);
	$e = htmlspecialchars($_POST['tgl_topup']);
	$f = htmlspecialchars($_POST['tgl_tempo']);
	$g = htmlspecialchars($_POST['no_hp']);



	$itop = mysqli_query($config,"insert into topup values('$a','$b','$g','$c','D')");
	$itemp = mysqli_query($config,"insert into topup_tempo values('$a','$d','$e','$f')");
	$ilog = mysqli_query($config,"insert into log_pelanggan values('','$b','$a','Penambahan Saldo','$e')");

	if($itop && $itemp && $ilog){
		echo "<script>window.location='index.php?page=invois&kode=$a&id=$b';</script>";
	}else{
		echo"<script>alert('TOP-UP Gagal');window.location='index.php';</script>";
	}


}

if($aksi == "input" && $tbl == "bayar_topup"){
	$kd= htmlspecialchars($_POST['transaksi']);
	$a = htmlspecialchars($_POST['kd_topup']);
	$b = htmlspecialchars($_POST['nm_rek']);
	$c = htmlspecialchars($_POST['jml_bayar']);

	 $lokasi_file    = $_FILES['bukti_byr']['tmp_name'];
  $tipe_file      = $_FILES['bukti_byr']['type'];
  $nama_file      = $_FILES['bukti_byr']['name'];

  $dir			  = "bukti_pembayaran/";
  $acak           = rand(1,9999);
  $nama_file_unik = $acak.'_'.$nama_file;
  $path			  = $dir.$nama_file_unik;
  

   //AMBIL SMS CENTER
         $sql="SELECT  * FROM no_center as nc INNER JOIN sms_center as sc ON nc.id_sms_center=sc.id_sms_center where nc.utama='Y' LIMIT 1";
                        
        if (!$result=  mysqli_query($config, $sql)){
             die('Error:'.mysqli_error($config));
        }  else {
            if (mysqli_num_rows($result) > 0){
                while ($row=  mysqli_fetch_assoc($result)){
                    $center =  $row['no_telepon'];
                }
            }
        }
  
  if (!empty($lokasi_file)){
    UploadBukti($nama_file_unik);

	$qdaftar = mysqli_query($config,"insert into bayar_topup values('$kd','$a','$b','$c','$path')");
}

	if($qdaftar){
		 $message = "User sudah melakukan top-up dan melakukan pembayaran ke rekening a.n $_POST[nm_rek] mohon untuk dikonfirmasi"; 

            exec('c:\xampp\htdocs\Arima_Komunika1\controlsms\gammu\bin\gammu-smsd-inject.exe -c c:\xampp\htdocs\Arima_Komunika1\controlsms\gammu\bin\mysmsdrc EMS '.$center.' -text "'.$message.'"');

		echo "<script>alert('Top Up Berhasil, silahkan tunggu pesan konfirmasi dari admin');
		window.location='index.php?page=invois';</script>";


	}else{
		echo "<script>alert('Top Up gagal!');</script>";
	}
	}


 	if($aksi == "input" && $tbl == "auto_transaksi"){

 		 $no = $_POST['hpuser'];
 		 $idpr = $_POST['idprov'];
         $nom = $_POST['nom'];
         $saldouser = $_POST['sluser'];
         $iduser = $_POST['iduser'];
         $sandi = "1234";
         

         //AMBIL SMS CENTER
         $sql="SELECT  * FROM no_center as nc INNER JOIN sms_center as sc ON nc.id_sms_center=sc.id_sms_center where nc.utama='Y' LIMIT 1";
                        
        if (!$result=  mysqli_query($config, $sql)){
             die('Error:'.mysqli_error($config));
        }  else {
            if (mysqli_num_rows($result) > 0){
                while ($row=  mysqli_fetch_assoc($result)){
                    $center =  $row['no_telepon'];
                }
            }
        }
        
		$getID = mysqli_fetch_assoc(mysqli_query($config, "select kode_pulsa from pulsa where nominal = '$nom' and id_provider = '$idpr'"));
		$kdpls = $getID['kode_pulsa'];
		$var1 = str_replace(".", "", $nom);
        $saldoakhir = (int)$saldouser - (int)$var1;

        $var2 = str_replace(".", "", $nom);
        $var3 = (int)$var2 / 1000;
        if($saldoakhir >= 0){

	 		$sql="INSERT INTO transaksi_otomatis(id_trans,id_pulsa,no_hp,nom)
	        VALUES

	        ('',
	        '$kdpls',
	        '$no',
	        '$nom')";   
	        if (mysqli_query($config, $sql)){ 
	        $upsaldo = mysqli_query($config,"update saldo_pelanggan set saldo=$saldoakhir where id_pelanggan = '$_POST[iduser]'");


	        $message = "$var3.$no.$sandi"; 

            exec('c:\xampp\htdocs\Arima_Komunika1\controlsms\gammu\bin\gammu-smsd-inject.exe -c c:\xampp\htdocs\Arima_Komunika1\controlsms\gammu\bin\mysmsdrc EMS '.$center.' -text "'.$message.'"');


	        echo '<script LANGUAGE="JavaScript">
	            alert("Isi pulsa telah berhasil")
	            window.location.href="index.php";
	            </script>'; 
	        }else{
	        	echo "Error : ".$sql.". ".mysqli_error($config);
	        }
	    }else{
	    	echo '<script LANGUAGE="JavaScript">
	        alert("Saldo tidak mencukupi!")
	        window.location.href="index.php";
	        </script>'; 
    	}
	}

	if ($aksi == "editno" && $tbl == "editnmr") {
		$a = htmlspecialchars($_POST['nama']);
		$b = htmlspecialchars($_POST['nohp']);
		$c = htmlspecialchars($_POST['idusr']);
		


		$getID = mysqli_fetch_assoc(mysqli_query($config, "select id_pelanggan from pelanggan where user = '$c'"));
		$idplg = $getID['id_pelanggan'];
		
		$update = mysqli_query($config,"UPDATE pelanggan SET nm_pl = '$a', no_hp = '$b' where id_pelanggan = '$idplg'");
		
		if($update){
			echo '<script LANGUAGE="JavaScript">
		            alert("Data telah diupdate")
		            window.location.href="index.php?page=profile";
		            </script>'; 
		}else{
			echo"<script>alert('Data Gagal Diupdate');window.location='index.php?page=profile';</script>";
		}


	}

 ?>
