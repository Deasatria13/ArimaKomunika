<?php
include 'koneksi.php';

//Start Aksi transaksi
$g=$_GET['sender'];
if($g=='ttransaksi')
{


        
         $no = $_POST['no_telp'];
         $nom = $_POST['nominal'];
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

    $sql="INSERT INTO sms_transaksi(no_faktur,tanggal,id_pulsa,no_telp,nominal,id_admin)
        VALUES

        ('$_POST[no_faktur]',
        '$_POST[tanggal]',
        '$_POST[cmb_kode]',
         '$_POST[no_telp]',
         '$_POST[nominal]',
          '$_POST[cmb_id]')";   
        if (mysqli_query($config, $sql)){ 
            $message = "$nom.$no.$sandi";

            exec('c:\xampp\htdocs\Arima_Komunika1\controlsms\gammu\bin\gammu-smsd-inject.exe -c c:\xampp\htdocs\Arima_Komunika1\controlsms\gammu\bin\mysmsdrc EMS '.$center.' -text "'.$message.'"');

        echo '<script LANGUAGE="JavaScript">
            alert("data telah ('.$_POST[no_faktur].') Tersimpan")
            window.location.href="index.php?page=ttransaksi";
            </script>'; 
    }
    else{
        echo "Error : ".$sql.". ".mysqli_error($config);
    }
     //header('location:http://localhost/');
}

else 
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
    }
//End Aksi transaksi
?>
