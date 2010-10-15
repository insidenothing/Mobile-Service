<?
if ($_POST[reopenNotes] != ''){
	$notes=strtoupper($_POST[reopenNotes]);
}
timeline($packet,$_COOKIE[psdata][name]." Flagged for Correction");

$q10="UPDATE ps_packets SET affidavit_status='NEED CORRECTION', request_close='', request_closea='', request_closeb='', reopenNotes='$notes' WHERE packet_id = '$packet'";
$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
mkAlert('CORRECTIONS NEEDED',$entryID,'ALL',$packet);
?>
Affidavit status advanced to 'NEED CORRECTION'<br />
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="a" /> NEXT FILE</div>

<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
<input type="hidden" name="parts" value="<?=$_POST[parts]?>">


