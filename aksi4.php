<?php
include 'koneksi.php';

//Start Aksi Anggota
$g=$_GET['sender'];
if($g=='tnocenter')
{
    $sql="INSERT INTO no_center (id_sms_center,no_telepon,utama)
        VALUES
        ('$_POST[cmb_sms_center]',
         '$_POST[nomor_telepon]',
         '$_POST[cmb_utama]')";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("data  baru dengan id no :('.$_POST[id_no].') Tersimpan")
            window.location.href="index.php?page=tnocenter";
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
        mysqli_query($config,"UPDATE no_center SET id_no='$_POST[id_no]',
            id_sms_center='$_POST[cmb_sms_center]',
                no_telepon='$_POST[no_telepon]', utama='$_POST[cmb_utama]' WHERE id_no='$_POST[id_no]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data dengan no id :('.$_POST[id_no].') Di Update")
            window.location.href="index.php?page=tnocenter";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM no_center where id_no='$_GET[id_no]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data dengan kode ID :('.$_GET[id_no].') Di Terhapus")
            window.location.href="index.php?page=tnocenter";
            </script>';
    }
//End Aksi Anggota
?>
