<?php
include "../koneksi.php";
$g=$_GET['sender'];
if ($g == 'pulsa')
{
	$kode = $_POST['kode'];
	$rs = mysqli_query ($config,"select * from pulsa where id_provider='$kode'");
	echo '<option value="">--Pilih Kode Pulsa--</option>';
	while ($r = mysqli_fetch_array($rs))
	{
	    echo "<option value='$r[id_pulsa]'>$r[kode_pulsa]</option>";
	}
}
elseif($g=='nominal')
{
	$kode = $_POST['kode'];
	$rs = mysqli_query ($config,"select * from pulsa where id_pulsa='$kode'");
	while ($r = mysqli_fetch_array($rs))
	{
	    echo '{"nominal": "'. $r[nominal] .'"}';
	}
}
?>