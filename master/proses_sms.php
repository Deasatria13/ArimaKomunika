<?php
include "../koneksi.php";
$g=$_GET['sender'];
if ($g == 'cek_terkirim')
{
	$ID = $_GET['ID'];
	$rs = mysqli_query ($config,"select * from sentitems where ID > '$ID' LIMIT 1");
	while ($r = mysqli_fetch_array($rs))
	{
	    echo '{"status": "0", "status_SMS": "'. $r[Status] .'", "id_baru": "'. $r[ID] .'"}';
	}
}
elseif($g=='cek_inbox')
{
	$ID = $_GET['ID'];
	$rs = mysqli_query ($config,"select * from inbox where ID > '$ID'  LIMIT 1");
		if($rs){
	while ($r = mysqli_fetch_array($rs))
	{
	    echo '{"status": "0", "id_baru": "'. $r[ID] .'"}';
	}
		}else{
				echo '{"status": "1", "id_baru": "'. $r[ID] .'"}';
		}
}
?>