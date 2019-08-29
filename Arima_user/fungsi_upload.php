<?php
error_reporting(0);
//membuat fungsi ekstensi file
 function get_ext($key) { 
	$key=strtolower(substr(strrchr($key, "."), 1));
	$key=str_replace("jpeg","jpg",$key);
	return $key;
}

//gallery
function UploadBukti($fupload_name){
$vdir_upload 	= "bukti_pembayaran/";
$vfile_upload 	= $vdir_upload . $fupload_name;
$tipe_file   	= $_FILES['bukti_byr']['type'];
move_uploaded_file($_FILES["bukti_byr"]["tmp_name"], $vfile_upload);
}
?>