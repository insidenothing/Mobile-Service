<? 
$field = "photo".$defendant.$_POST['photo'];
$file = $ddr["photo".$defendant.$_POST['photo']];
		$history = "Removed $file from $field<br><img src='$file' />";
		$to = "System Operators <sysop@hwestauctions.com>";
		$from = "System <sysop@hwestauctions.com>";
		$subject = "WIZARD: PHOTO REMOVED";
		$headers  = "MIME-Version: 1.0 \n";
		$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
		$headers .= "From: $from \n";
//		mail($to,$subject,$info.$history,$headers);
@mysql_query("UPDATE ps_packets set $field = '' ");
$user = $_COOKIE[psdata][user_id];
mkAlert('REMOVED PHOTO',$user,$user,$packet);
 ?>
Photo Removed...<br>
<div class="nav2"><input onClick="submitLoader()" type="radio" name="i" value="photo.review" /> NEXT</div>
<input type="hidden" name="parts" value="<?=$_POST[parts]?>" />
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />