<?php
include 'koneksi.php';

//Start Aksi Anggota
$g=$_GET['sender'];
if($g=='tprovider')
{
    $sql="INSERT INTO provider (nama_provider)
        VALUES
        ('$_POST[nama_provider]')";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Data baru dengan ID :('.$_POST[id_provider].') Tersimpan")
            window.location.href="index.php?page=tprovider";
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
        mysqli_query($config,"UPDATE provider SET 
                nama_provider='$_POST[nama_provider]' WHERE  id_provider='$_POST[id_provider]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data dengan kode provider :('.$_POST[id_provider].') Di Update")
            window.location.href="index.php?page=tprovider";
            </script>';


            
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM provider where id_provider='$_GET[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data dengan Id provider :('.$_GET[id].') Di Terhapus")
            window.location.href="index.php?page=tprovider";    
            </script>';
    }
//End Aksi Anggota
?>
