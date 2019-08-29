<?php
include 'koneksi.php';

//Start Aksi transaksi
$g=$_GET['tbl'];
if($g=='pelanggan')
{


         $id = $_POST['id_pelanggan'];
         $no = $_POST['no_hp'];
         $nm = $_POST['nm_pl'];

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

    if($_POST['konf'] == "1"){
        $qstaus = mysqli_query($config,"update pelanggan set status='1' where id_pelanggan = '$_POST[plg]'");
        $sql=mysqli_query($config,"INSERT INTO validasi(id_validasi,kd_pelanggan,nm_pelanggan_plg,no_hp_plg)
            VALUES

            ('',
            '$_POST[plg]',
             '$_POST[nm_pl]',
             '$_POST[no_telp]')");  
            if ($qstaus){ 

                $message = "Selamat $_POST[nm_pl] akun anda telah diverifikasi dengan id $_POST[plg]";

                exec('c:\xampp\htdocs\Arima_Komunika1\controlsms\gammu\bin\gammu-smsd-inject.exe -c c:\xampp\htdocs\Arima_Komunika1\controlsms\gammu\bin\mysmsdrc EMS '.$_POST[no_telp].' -text "'.$message.'"');

            echo '<script LANGUAGE="JavaScript">
                alert("data ('.$_POST[plg].') telah Diverifikasi")
                window.location.href="index.php?page=pelanggan";
                </script>'; 
        }
        else{
            echo "Error : ".$sql.". ".mysqli_error($config);
        }
    }else{
        echo '<script LANGUAGE="JavaScript">
        alert("Verifikasi ditolak")
        window.location.href="index.php?page=pelanggan";
        </script>'; 
     //header('location:http://localhost/');  
    }
}

/*else 
    if($g=='edit')
    {
        mysqli_query($config,"UPDATE sms_transaksi SET no_faktur='$_POST[no_faktur]',
            tanggal='$_POST[tanggal]', id_pulsa='$_POST[id_pulsa]',no_telp='$_POST[no_telp]',
             nominal='$_POST[nominal]',id_admin='$_POST[id_admin]' WHERE no_faktur='$_POST[no_faktur]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data telah('.$_POST[id_transaksi].') Di Update")
            window.location.href="index.php?page=ttransaksi";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM sms_transaksi where no_faktur='$_GET[no_faktur]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data telah('.$_GET[no_faktur].') Terhapus")
            window.location.href="index.php?page=ttransaksi";
            </script>';
    }*/
//End Aksi transaksi
?>
