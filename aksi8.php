<?php
include 'koneksi.php';

//Start Aksi sent
$g=$_GET['sender'];
if($g=='tsent')
{
    $sql="INSERT INTO sentitems (UpdatedInDB,InsertIntoDB,SendingDateTime,DestinationNumber,TextDecoded,Status,StatusError)
        VALUES
        ('$_POST[UpdatedInDB]',
         '$_POST[InsertIntoDB]',
         '$_POST[SendingDateTime]',
         '$_POST[DestinationNumber]',
         '$_POST[TextDecoded]',
         '$_POST[Status]',
         '$_POST[StatusError]')";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Data Telah :('.$_POST[UpdatedInDB].') Tersimpan")
            window.location.href="index.php?page=tsent";
            </script>'; 
    }
    else{
        echo "Error : ".$sql.". ".mysqli_error($config);
    }
     //header('location:http://localhost/');
}

else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM sentitems where ID='$_GET[ID]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data dengan Id :('.$_GET[ID].') Di Terhapus")
            window.location.href="index.php?page=tsent";
            </script>';
    }
//End Aksi sent
?>
