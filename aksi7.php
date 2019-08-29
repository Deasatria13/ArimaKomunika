<?php
include 'koneksi.php';

//Start Aksi inbox
$g=$_GET['sender'];
if($g=='tinbox')
{
    $sql="INSERT INTO inbox (UpdatedInDB,ReceivingDateTime,SenderNumber,Class,TextDecoded,Processed)
        VALUES
        ('$_POST[UpdatedInDB]',
         '$_POST[ReceivingDateTime]',
         '$_POST[SenderNumber]',
         '$_POST[TextDecoded]',
         '$_POST[Processed]')";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Data Telah :('.$_POST[UpdatedInDB].') Tersimpan")
            window.location.href="index.php?page=tinbox";
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
        mysqli_query($config,"UPDATE inbox SET ID='$_POST[ID]',
            UpdatedInDB='$_POST[UpdatedInDB]', ReceivingDateTime='$_POST[ReceivingDateTime]',  SenderNumber='$_POST[SenderNumber]',
             TextDecoded='$_POST[TextDecoded]',
                Processed='$_POST[Processed]' WHERE  ID='$_POST[ID]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data dengan id :('.$_POST[ID].') Di Update")
            window.location.href="index.php?page=tinbox";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM inbox where ID='$_GET[ID]'");
         echo '<script LANGUAGE="JavaScript">
            alert("data dengan Id :('.$_GET[ID].') Di Terhapus")
            window.location.href="index.php?page=tinbox";
            </script>';
    }
//End Aksi inbox
?>
