<?
// make links to affidavits
$file1 = "http://mdwestserve.com/ps/liveAffidavit.php?packet=$packet&def=1";
$file2 = "http://mdwestserve.com/ps/liveAffidavit.php?packet=$packet&def=2"; 
$file3 = "http://mdwestserve.com/ps/liveAffidavit.php?packet=$packet&def=3";
$file4 = "http://mdwestserve.com/ps/liveAffidavit.php?packet=$packet&def=4";
// generate all invoices
?>
<table>
<tr><td><iframe frameborder="0" src="../ps_write_invoice.php?id=<?=$packet?>" width="600" height="30"></iframe></td></tr>
<tr><td><iframe frameborder="0" src="../ps2_write_invoice.php?id=<?=$packet?>&popup=<?=$server?>" width="600" height="30"></iframe></td></tr>
<? if ($ddr[server_ida]){?><tr><td><iframe frameborder="0" src="../ps2a_write_invoice.php?id=<?=$packet?>&popup=<?=$server?>" width="600" height="30"></iframe></td></tr><? }?>
<? if ($ddr[server_idb]){?><tr><td><iframe frameborder="0" src="../ps2b_write_invoice.php?id=<?=$packet?>&popup=<?=$server?>" width="600" height="30"></iframe></td></tr><? }?>
<? if ($ddr[server_idc]){?><tr><td><iframe frameborder="0" src="../ps2c_write_invoice.php?id=<?=$packet?>&popup=<?=$server?>" width="600" height="30"></iframe></td></tr><? }?>
<? if ($ddr[server_idd]){?><tr><td><iframe frameborder="0" src="../ps2d_write_invoice.php?id=<?=$packet?>&popup=<?=$server?>" width="600" height="30"></iframe></td></tr><? }?>
<? if ($ddr[server_ide]){?><tr><td><iframe frameborder="0" src="../ps2e_write_invoice.php?id=<?=$packet?>&popup=<?=$server?>" width="600" height="30"></iframe></td></tr><? }?>
</table>


<?
// email client invoice
$to = "Service Updates <sysop@hwestauctions.com>";
$subject = "Service Completed for Packet $packet ($ddr[client_file])";
$headers  = "MIME-Version: 1.0 \n";
$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
$headers .= "From: $to \n";
$attR = @mysql_query("select ps_to from attorneys where attorneys_id = '$ddr[attorneys_id]'");
$attD = mysql_fetch_array($attR, MYSQL_BOTH);
$c=0;
$cc = explode(',',$attD[ps_to]);
$ccC = count($cc);
while ($c++ < $ccC){
$headers .= "Cc: Service Updates <".$cc[$c]."> \n";
}
if ($ddr["attorneys_id"] == 1 || $ddr["attorneys_id"] == 44){
$filename = $ddr["client_file"].'-'.$ddr[date_received]."-"."CLIENT.PDF";
}else{
$filename = $ddr["case_no"]."-"."CLIENT.PDF";
}
$fname = id2attorney($ddr["attorneys_id"]).'/'.$filename;
$body ="<strong>Thank you for selecting MDWestServe as Your Process Service Provider.</strong><br>
Service for packet $packet (<strong>$ddr[client_file]</strong>) is completed, closeout documents as follows:
<li><a href='http://mdwestserve.com/invoices/$fname'>Invoice</a></li>
<li><a href='$file1'>Affidavit for $ddr[name1]</a></li>";
if ($ddr[name2]){ $body .= "<li><a href='$file2'>Affidavit for ".strtoupper($ddr[name2])."</a></li>";}
if ($ddr[name3]){ $body .= "<li><a href='$file3'>Affidavit for ".strtoupper($ddr[name3])."</a></li>";}
if ($ddr[name4]){ $body .= "<li><a href='$file4'>Affidavit for ".strtoupper($ddr[name4])."</a></li>";}
$body .= "<br><br><br><br>Patrick McGuire<br>Zach Salwen<br>MDWestServe<br>Harvey West Auctioneers";
//mail($to,$subject,$body,$headers);
?>
Invoices Printed.<br />
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="a" /> NEXT FILE</div>
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
<input type="hidden" name="parts" value="<?=$_POST[parts]?>">


