<?
$uri = $ddr["photo".$defendant.$_POST['old']];
$newField = "photo".$defendant.$_POST['new'];
$oldField = "photo".$defendant.$_POST['old'];
@mysql_query("UPDATE ps_packets set $newField = '$uri' where packet_id = '$packet'");
@mysql_query("UPDATE ps_packets set $oldField = '' where packet_id = '$packet' ");
?>
Move Completed...<br>
<div class="nav2"><input onClick="submitLoader()" type="radio" name="i" value="photo.review" /> NEXT</div>

<input type="hidden" name="parts" value="<?=$_POST[parts]?>" />
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />





