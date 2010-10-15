<?php
include 'functions.php';
$pdf=str_replace('http://mdwestserve.com/portal/PS_PACKETS/','/data/service/orders/',$_GET["pdf"]);
hardLog('DOWNLOAD: '.$pdf,'mobile');
readfile($pdf);
header('Content-type: application/pdf'); 
header('Content-disposition: Attachment; filename=' . $pdf); 
?>
