<?php 
include "koneksi.php";

$tbl= $_GET['tbl'];
$aksi = $_GET['aksi'];

if($aksi == "input" && $tbl== "pelanggan"){
	$kd = $_POST['kd_pl'];
	$a = htmlspecialchars($_POST['nm_pelanggan']);
	$b = htmlspecialchars($_POST['jk']);
	$c = htmlspecialchars($_POST['alamat']);
	$d = htmlspecialchars($_POST['tlp']);
	$e = htmlspecialchars($_POST['user']);
	$f = htmlspecialchars($_POST['pass']);

	$qdaftar = mysqli_query($config,"insert into pelanggan values('$kd','$a','$b','$c','$d','$e','$f','0')");
	if($qdaftar){
		echo "<script>alert('Data Berasil ditambahkan');window.location='index.php?page=pelanggan';</script>";
	}else{
		echo "<script>alert('Data Gagal ditambahkan');</script>";
	}
}else 
   if($aksi=="edit" && $tbl=="pelanggan")
    {
        mysqli_query($config,"UPDATE pelanggan SET id_pelanggan='$_POST[id_pelanggan]', nm_pl='$_POST[nm_pl]',jk='$_POST[jk]',alamat='$_POST[alamat]',no_hp='$_POST[no_hp]',user='$_POST[user]', 
                pass='$_POST[pass]' WHERE  id_pelanggan='$_POST[id_pelanggan]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data telah('.$_POST[id_pelanggan].') Di Update")
            window.location.href="index.php?page=pelanggan";
            </script>';
    } 

    if($aksi=="hapus" && $tbl=="pelanggan")
    {
    	$id=$_GET['id'];
        $pdelet = mysqli_query($config,"delete from pelanggan where id_pelanggan='$id'");
        $pdelet2 = mysqli_query($config,"delete from saldo_pelanggan where id_pelanggan='$id'");
        $pdelet3 = mysqli_query($config,"delete from log_pelanggan where id_pelanggan='$id'");
        $pdelet4 = mysqli_query($config,"delete from topup where id_pelanggan='$id'");
        
        if($pdelet && $pdelet2 && $pdelet3 && $pdelet4){
         echo '<script LANGUAGE="JavaScript">
            alert("Anggota dengan Id :('.$id.') Di Terhapus")
            window.location.href="index.php?page=pelanggan";
            </script>';
        }else{
        	echo '<script LANGUAGE="JavaScript">
            alert("Anggota dengan Id :('.$id.') Gagal Di Terhapus")
            window.location.href="index.php?page=pelanggan";
            </script>';
        }
    } 

    if($aksi == "input" && $tbl== "topup"){
	$kd = $_POST['kd_topup'];
	$a = htmlspecialchars($_POST['id_pelanggan']);
    $hp = htmlspecialchars($_POST['no_hp']);
	$b = htmlspecialchars($_POST['jml_topup']);
	$c = htmlspecialchars($_POST['tgl_topup']);
	$d = htmlspecialchars($_POST['tgl_tempo']);
	$e = htmlspecialchars($_POST['status']);


	$qdaftar = mysqli_query($config,"insert into topup values('$kd','$a','$hp','$b','$c','$d','$e')");
	if($qdaftar){
		echo "<script>alert('Data Berasil ditambahkan');window.location='index.php?page=topup';</script>";
	}else{
		echo "<script>alert('Data Gagal ditambahkan');</script>";
	}

	 if($aksi=="edit" && $tbl=="topup")
    {
        mysqli_query($config,"UPDATE topup SET kd_topup='$_POST[kd_topup]', id_pelanggan='$_POST[id_pelanggan]',jml_topup='$_POST[jml_topup]',tgl_pesan='$_POST[tgl_pesan]',tgl_tempo='$_POST[tgl_tempo]', 
                status='$_POST[status]' WHERE  kd_topup='$_POST[kd_topup]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data telah('.$_POST[kd_topup].') Di Update")
            window.location.href="index.php?page=topup";
            </script>';
    } 

    

		}



    
    if($aksi == "proses" && $tbl== "topup"){
        $kd = $_POST['kd_topup'];
        $nohp = $_POST['no_hp'];
        $jmltopup = $_POST['jml_topup'];
        $status = $_POST['status'];


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

        if($_POST['status'] == "B"){
            $updatetopup = mysqli_query($config,"UPDATE topup SET status='$status' WHERE  kd_topup='$kd'");
            if($updatetopup){

                $message = "Isi top up sebesar $jmltopup telah berhasil dilakukan";

                exec('c:\xampp\htdocs\Arima_Komunika1\controlsms\gammu\bin\gammu-smsd-inject.exe -c c:\xampp\htdocs\Arima_Komunika1\controlsms\gammu\bin\mysmsdrc EMS '.$nohp.' -text "'.$message.'"');

                echo '<script LANGUAGE="JavaScript">
                alert("status telah  Di Update")
                window.location.href="index.php?page=topup";
                </script>';
            }    
        }else{
           echo '<script LANGUAGE="JavaScript">
            alert("status top up dibatalkan")
            window.location.href="index.php?page=topup";
            </script>'; 
        }
        
         

    }



 ?>
