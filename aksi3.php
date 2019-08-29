<?php
include 'koneksi.php';

//Start Aksi center
$g=$_GET['sender'];
if($g=='tsmscenter')
{
    $sql="INSERT INTO sms_center (nama_sms_center,alamat)
        VALUES
        ('$_POST[nama_sms_center]',
         '$_POST[alamat]')";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("data baru dengan nama center :('.$_POST[id_sms_center].') Tersimpan")
            window.location.href="index.php?page=tsmscenter";
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
        mysqli_query($config,"UPDATE sms_center SET id_sms_center='$_POST[id_sms_center]',
            nama_sms_center='$_POST[nama_sms_center]',
                alamat='$_POST[alamat]' WHERE id_sms_center='$_POST[id_sms_center]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data dengan id :('.$_POST[id_sms_center].') Di Update")
            window.location.href="index.php?page=tsmscenter";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM sms_center where id_sms_center='$_GET[id_sms_center]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Anggota dengan Id :('.$_GET[id_sms_center].') Di Terhapus")
            window.location.href="index.php?page=tsmscenter";
            </script>';
    }
//End Aksi center
?>
