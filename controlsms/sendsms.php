
<?php
$noTujuan = "+6281220575182";
$message = "50.082119305063.1234";
 
exec('c:\xampp\htdocs\Arima_Komunika1\controlsms\gammu\bin\gammu-smsd-inject.exe -c c:\xampp\htdocs\Arima_Komunika1\controlsms\gammu\bin\smsdrc EMS '.$noTujuan.' -text "'.$message.'"');
 
?>