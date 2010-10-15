Results:<br>
<? 
foreach ($_POST[remove] as $key => $value){ 
echo "Removing affidavit item #$key<br>";
		
		$history = "<div>Removing affidavit item #$key</div>";
		$r=@mysql_query("select * from ps_history where history_id = '$key'");		
		$d=mysql_fetch_array($r, MYSQL_ASSOC);
		$history .= "<div>Action Type $d[action_type]</div>";
		$history .= "<div>Wizard Type $d[wizard]</div>";
		$history .= "<div>$d[action_str]</div>";
		$to = "System Operators <sysop@hwestauctions.com>";
		$from = "System <system@hwestauctions.com>";
		$subject = "WIZARD: REMOVED";
		$headers  = "MIME-Version: 1.0 \n";
		$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
		$headers .= "From: $from \n";
		//mail($to,$subject,$info.$history,$headers);
		@mysql_query("delete from ps_history where history_id = '$key'"); 
}
?>
Done!<br />
<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
<input type="hidden" name="service_type" value="<?=$_POST[service_type]?>" />
<input type="hidden" name="served" value="<?=$_POST[served]?>" />

<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="1" /> NEXT</div>
