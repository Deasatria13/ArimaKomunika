<?php
include 'koneksi.php';

//Start Aksi admin
$g=$_GET['sender'];
if($g=='tadmin')
{
    $sql="INSERT INTO admin (id_admin,nama_lengkap,nama_pengguna,kata_sandi,email)
        VALUES
        ('$_POST[id_admin]',
         '$_POST[nama_lengkap]',
         '$_POST[nama_pengguna]',
         '$_POST[kata_sandi]',
         '$_POST[email]')";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Data baru dengan ID :('.$_POST[id_admin].') Tersimpan")
            window.location.href="index.php?page=tadmin";
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
        mysqli_query($config,"UPDATE admin SET id_admin='$_POST[id_admin]', nama_lengkap='$_POST[nama_lengkap]',nama_pengguna='$_POST[nama_pengguna]',
            kata_sandi='$_POST[kata_sandi]', 
                email='$_POST[email]' WHERE  id_admin='$_POST[id_admin]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data telah('.$_POST[id_pulsa].') Di Update")
            window.location.href="index.php?page=tadmin";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM admin where id_admin='$_GET[id_admin]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data dengan Id Admin :('.$_GET[id_admin].')  Terhapus")
            window.location.href="index.php?page=tadmin";    
            </script>';
    }
//End Aksi admin
?>
