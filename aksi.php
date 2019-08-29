<?php
include 'koneksi.php';

//Start Aksi pulsa
$g=$_GET['sender'];


    if($g=='tpulsa')
{
    $sql="INSERT INTO pulsa (id_provider,kode_pulsa,nominal,hrg_beli,hrg_jual)
        VALUES
        ( '$_POST[cmb_provider]',
         '$_POST[kode_pulsa]',
         '$_POST[nominal]',
         '$_POST[hrg_beli]',
         '$_POST[hrg_jual]')";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("data telah ('.$_POST[id_pulsa].') Tersimpan")
            window.location.href="index.php?page=tpulsa";
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
        mysqli_query($config,"UPDATE pulsa SET id_pulsa='$_POST[id_pulsa]',id_provider='$_POST[cmb_provider]',
            kode_pulsa='$_POST[kode_pulsa]', nominal='$_POST[nominal]', hrg_beli='$_POST[hrg_beli]',
                hrg_jual='$_POST[hrg_jual]' WHERE  id_pulsa='$_POST[id_pulsa]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data telah('.$_POST[id_pulsa].') Di Update")
            window.location.href="index.php?page=tpulsa";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM pulsa where id_pulsa='$_GET[id_pulsa]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data telah('.$_GET[id_pulsa].') Di Terhapus")
            window.location.href="index.php?page=tpulsa";
            </script>';
    }
//End Aksi pulsa
?>
