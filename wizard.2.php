<? if (!$dname){ echo "<h1>NO DEFENDANT</h1>";} ?>
<? if ($_POST[service_type] == "MAILING AND POSTING"){ 
	$instructions = "SELECT A MAILING AND POSTING AFFIDAVIT ENTRY SUCH AS:<br>
		<ul><li>FIRST EFFORT (for the first time a property has been visited where no defendants or co-residents can be contacted.),</li>
		<li>SECOND EFFORT (for the <i>second</i> time a property has been visited where no one serveable can be contacted.).</li>
		<li>or POSTING DETAILS (to describe the time and place when the service documents were posted on the property).</li></ul>";
	echo "<br>".$instructions;
?>
<input name="service_type" value="<?=$_POST[service_type]?>" type="hidden" />
<div class="nav"><input onClick="submitLoader()" type="radio" name="served" value="FIRST EFFORT" /> FIRST EFFORT</div>
<div class="nav"><input onClick="submitLoader()" type="radio" name="served" value="SECOND EFFORT" /> SECOND EFFORT</div>
<div class="nav"><input onClick="submitLoader()" type="radio" name="served" value="POSTING DETAILS" /> POSTING DETAILS</div>
<? if ($_COOKIE[psdata][level] == "Operations"){?>
<div class="nav"><input onClick="submitLoader()" type="radio" name="served" value="MAILING DETAILS" /> MAILING DETAILS</div>
<div class="nav"><input onClick="submitLoader()" type="radio" name="served" value="LEGACY MAILING" /> LEGACY MAILING</div>
<div class="nav"><input onClick="submitLoader()" type="radio" name="served" value="ADDITIONAL AFFIDAVIT" /> ADDITIONAL AFFIDAVIT</div>
<? } ?>
<input type="hidden" name="i" value="3">
<? }elseif ($_POST[service_type] == "PERSONAL DELIVERY"){ 
	$instructions = "SELECT A PERSONAL DELIVERY AFFIDAVIT ENTRY SUCH AS:<br>
		<ul><li>BORROWER (for when the documents have been delivered directly to the defendant).</li>
		<li>or NON-BORROWER (for delivery to a CO-RESIDENT of the defendant).<br>
		The recipient of the document<br>
		<b>MUST BE A CO-RESIDENT OF THE DEFENDANT.</b>).</li></ul>";
	echo "<br>".$instructions;
?>
<input name="service_type" value="<?=$_POST[service_type]?>" type="hidden" />
<div class="nav"><input onClick="submitLoader()" type="radio" name="served" value="BORROWER" /> BORROWER</div>
<div class="nav"><input onClick="submitLoader()" type="radio" name="served" value="NOT BORROWER" /> NOT BORROWER</div>
<input type="hidden" name="i" value="3">
<? }elseif($_POST[service_type] == "CHANGE SIGNATORY"){
	$instructions = "THIS PAGE ALLOWS FOR A SERVER TO CHANGE INFORMATION BELOW THE SIGNATORY LINE ON THE AFFIDAVIT.
	<BR>ALL INFORMATION MUST BE PROVIDED.";
	echo "<br>".$instructions;
?>
<table><tr><td>1) Enter Server's Full Name</td><td><input name="server_name" /></td></tr>
<tr><td>2) Server's Phone #</td><td><input name="server_phone" /></td></tr>
<tr><td>3) Enter Address</td><td><input name="server_add" /></td></tr>
<tr><td>4) Enter City</td><td><input name="server_city" /></td></tr>
<tr><td>5) Enter State</td><td><input name="server_state"  size="2"/></td></tr>
<tr><td>6) Enter Zip</td><td><input name="server_zip" size="5" /></td></tr></table>
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="5" /> PREVIEW</div>
<input type="hidden" name="serverID" value="<?=$_COOKIE[psdata][user_id]?>" />
<input type="hidden" name="served" value="CHANGE SIGNATORY" />
<? }elseif ($_POST[service_type] == "INVALID ADDRESS"){
	$instructions = "THIS PAGE ALLOWS FOR A SERVER TO MAKE AN ENTRY FOR AN ADDRESS THAT, TO THE BEST OF THEIR <I>AND</I> THE OFFICE'S KNOWLEDGE, DOES NOT EXIST.<BR>
	DATE AND SPECIFIC ADDRESS MUST BE PROVIDED.";
	echo "<br>".$instructions;
 ?>
<div>
I, [SERVER NAME], SEARCHED THE UNITED STATES POSTAL SERVICE DATABASE AND THE DEPARTMENT OF ASSESSMENTS AND TAXATION DATABASE FOR [ADDRESS BELOW] WITH NO RESULTS.
</div>
<table><tr><td colspan=2>1) Select Address
<select name="address_source">
<? if ($_POST[address_source]){?>
    <option><?=$_POST[address_source]?></option>
<? } ?>
    <? if ($ddr[address1a]){?>
	<option value="1a"><?=$ddr[address1a]?>, <?=$ddr[city1a]?>, <?=$ddr[state1a]?> <?=$ddr[zip1a]?></option>
    <? }
	if ($ddr[address1b]){?>
	<option value="1b"><?=$ddr[address1b]?>, <?=$ddr[city1b]?>, <?=$ddr[state1b]?> <?=$ddr[zip1b]?></option>
    <? }
	if ($ddr[address1c]){?>
	<option value="1c"><?=$ddr[address1c]?>, <?=$ddr[city1c]?>, <?=$ddr[state1c]?> <?=$ddr[zip1c]?></option>
    <? } 
	if ($ddr[address1d]){?>
	<option value="1d"><?=$ddr[address1d]?>, <?=$ddr[city1d]?>, <?=$ddr[state1d]?> <?=$ddr[zip1d]?></option>
    <? } 
	if ($ddr[address1e]){?>
	<option value="1e"><?=$ddr[address1e]?>, <?=$ddr[city1e]?>, <?=$ddr[state1e]?> <?=$ddr[zip1e]?></option>
    <? } ?>
</select>
</td></tr>
<tr><td colspan=2>2) Month, Day, Year <select name="month"><?=mkmonth($_POST['month'])?></select> <select name="day"><?=mkday($_POST['day'])?></select> <select name="year"><?=mkyear($_POST['year'])?></select></td></tr>
</table>
<input type="hidden" name="address1" value="<?=$ddr[address1]?>, <?=$ddr[city1]?>, <?=$ddr[state1]?> <?=$ddr[zip1]?>" />
<input type="hidden" name="address1a" value="<?=$ddr[address1a]?>, <?=$ddr[city1a]?>, <?=$ddr[state1a]?> <?=$ddr[zip1a]?>" />
<input type="hidden" name="address1b" value="<?=$ddr[address1b]?>, <?=$ddr[city1b]?>, <?=$ddr[state1b]?> <?=$ddr[zip1b]?>" />
<input type="hidden" name="address1c" value="<?=$ddr[address1c]?>, <?=$ddr[city1c]?>, <?=$ddr[state1c]?> <?=$ddr[zip1c]?>" />
<input type="hidden" name="address1d" value="<?=$ddr[address1d]?>, <?=$ddr[city1d]?>, <?=$ddr[state1d]?> <?=$ddr[zip1d]?>" />
<input type="hidden" name="address1e" value="<?=$ddr[address1e]?>, <?=$ddr[city1e]?>, <?=$ddr[state1e]?> <?=$ddr[zip1e]?>" />
<input type="hidden" name="service_type" value="INVALID ADDRESS" />
<input type="hidden" name="client_file" value="<?=$ddr[client_file]?>"
<input type="hidden" name="served" value="INVALID" />
<input type="hidden" name="served" value="INVALID" />
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="4" /> PREVIEW</div>
<? if ($_POST[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_POST[mailDate]?>">
<? } ?>
<? if ($_GET[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_GET[mailDate]?>">
<? } ?>



<? }else{
	$instructions = "THIS PAGE ALLOWS A SERVER TO REMOVE ANY AFFIDAVIT ENTRIES THAT ARE CHECKED:<br>";
	echo "<br>".$instructions;
if ($_COOKIE[psdata][level] == "Operations"){
$history_items = @mysql_query("select * from ps_history where packet_id='$packet' and defendant_id='$defendant'") or die(mysql_error());
}else{
$history_items = @mysql_query("select * from ps_history where packet_id='$packet' and defendant_id='$defendant' and serverID='".$_COOKIE[psdata][user_id]."'") or die(mysql_error());
}
while ($item=mysql_fetch_array($history_items, MYSQL_ASSOC)){
?>

<div <? if ($item[action_type] == 'UNLINKED'){?> style="background-color:#FFCCCC"<? }else{?>onclick="this.style.backgroundColor='yellow';"<? } ?> style="border:solid 1px; width:600px;" id="history<?=$item[history_id]?>"><input onclick="highlight('item<?=$item[history_id]?>');" type="checkbox" name="remove[<?=$item[history_id]?>]" />
<?=$item[history_id]?>)  <?=id2name($item[serverID])?> <?=$item[action_type]?> (<?=$item[wizard]?>)<hr /><?=$item[action_str]?><br /><? if ($item[residentDesc]){ echo "RESIDENT DESCRIPTION: ".$item[residentDesc];}?><hr /><?=$item[recordDate]?>
</div>
<? } ?>
<div class="nav3"><input onClick="submitLoader()" type="radio" name="i" value="remove" /> REMOVE</div>
<? if ($_COOKIE[psdata][level] == "Operations"){?>
<div class="nav3"><input onClick="submitLoader()" type="radio" name="i" value="unlink" /> UNLINK</div>
<? } ?>
<? }
 ?>
<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
<div class="nav2"><input onClick="submitLoader()" type="radio" name="i" value="1" /> RESTART</div>
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
