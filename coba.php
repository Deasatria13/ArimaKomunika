
<?php
date_default_timezone_set('Asia/Jakarta');
$date = date_create();
date_add($date, date_interval_create_from_date_string('11 hours'));
$waktu = date_format($date, 'd-m-Y G:i:s');

echo $waktu ;
?>