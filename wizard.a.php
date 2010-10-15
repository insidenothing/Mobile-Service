<?
// ok so here we will select the defendant 
if ($_COOKIE[psdata][level] == "Operations"){
$r1=@mysql_query("select * from ps_packets where date_received > '2009-03-01 00:00:00' ORDER BY packet_id DESC");
}else{
$r1=@mysql_query("select * from ps_packets where ((server_id = '$server') or (server_ida = '$server') or (server_idb = '$server') or (server_idc = '$server') or (server_idd = '$server') or (server_ide = '$server')) ORDER BY packet_id DESC");
}
$option = "<option>Select from 'In Progress' affidavits.</option>";
while ($d1=mysql_fetch_array($r1, MYSQL_ASSOC)){
					$option .= "<OPTGROUP LABEL='Packet $d1[packet_id] - $d1[address1]'>";
					$option .= "<option value='$d1[packet_id]-1'>$d1[name1]</option>";
if ($d1[name2]){	$option .= "<option value='$d1[packet_id]-2'>$d1[name2]</option>"; }
if ($d1[name3]){	$option .= "<option value='$d1[packet_id]-3'>$d1[name3]</option>"; }
if ($d1[name4]){	$option .= "<option value='$d1[packet_id]-4'>$d1[name4]</option>"; }
					$option .= "</OPTGROUP>";
}
?>
<input type="hidden" name="i" value="1" />
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
<select name="parts" onchange="submitLoader()"><?=$option?></select>
<? if ($_POST[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_POST[mailDate]?>">
<? } ?>
<? if ($_GET[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_GET[mailDate]?>">
<? } ?>