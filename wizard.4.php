<? if (!$dname){ echo "<h1>NO DEFENDANT</h1>";} ?>

<?
// this is where we build the actual history item for the affidavit
if ($_POST[served] == "FIRST EFFORT"){ 
	if($_POST[address_source] == '1a'){
		$source='Possible Place of Abode';
		$address=$_POST[address1a];
	}elseif($_POST[address_source] == '1b'){
		$source='Possible Place of Abode';
		$address=$_POST[address1b];
	}elseif($_POST[address_source] == '1c'){
		$source='Possible Place of Abode';
		$address=$_POST[address1c];
	}elseif($_POST[address_source] == '1d'){
		$source='Possible Place of Abode';
		$address=$_POST[address1d];
	}elseif($_POST[address_source] == '1e'){
		$source='Possible Place of Abode';
		$address=$_POST[address1e];
	}elseif ($_POST[address_source] == '1'){
		$source='Residential Property Subject to Mortgage or Deed of Trust';
		$address=$_POST[address1];
	}
	$month=monthConvert($_POST[month]);
	$history="<li>First Effort: $source</li>
	$month $_POST[day], $_POST[year] at $_POST[hour]:$_POST[minute] $_POST[ampm]<br>
	$address<br>
	$_POST[defendant_detail]";
} 
if ($_POST[served] == "SECOND EFFORT"){
	if($_POST[address_source] == '1a'){
		$source='Possible Place of Abode';
		$address=$_POST[address1a];
	}elseif($_POST[address_source] == '1b'){
		$source='Possible Place of Abode';
		$address=$_POST[address1b];
	}elseif($_POST[address_source] == '1c'){
		$source='Possible Place of Abode';
		$address=$_POST[address1c];
	}elseif($_POST[address_source] == '1d'){
		$source='Possible Place of Abode';
		$address=$_POST[address1d];
	}elseif($_POST[address_source] == '1e'){
		$source='Possible Place of Abode';
		$address=$_POST[address1e];
	}elseif ($_POST[address_source] == '1'){
		$source='Residential Property Subject to Mortgage or Deed of Trust';
		$address=$_POST[address1];
	} 
	$month=monthConvert($_POST[month]);
	$history="<li>Second Effort: $source</li>
	$month $_POST[day], $_POST[year] at $_POST[hour]:$_POST[minute] $_POST[ampm]<br>
	$address<br>
	$_POST[defendant_detail]";
} 
if ($_POST[served] == "POSTING DETAILS"){ 
	if($_POST[address_source] == '1a'){
		$source='Possible Place of Abode';
		$address=$_POST[address1a];
	}elseif($_POST[address_source] == '1b'){
		$source='Possible Place of Abode';
		$address=$_POST[address1b];
	}elseif($_POST[address_source] == '1c'){
		$source='Possible Place of Abode';
		$address=$_POST[address1c];
	}elseif($_POST[address_source] == '1d'){
		$source='Possible Place of Abode';
		$address=$_POST[address1d];
	}elseif($_POST[address_source] == '1e'){
		$source='Possible Place of Abode';
		$address=$_POST[address1e];
	}elseif ($_POST[address_source] == '1'){
		$source='Residential Property Subject to Mortgage or Deed of Trust';
		$address=$_POST[address1];
	}
	$month=monthConvert($_POST[month]);
	$history="<li>Posting the Property:</li>
	$month $_POST[day], $_POST[year] $_POST[hour]:$_POST[minute] $_POST[ampm]<br>
	$address<br>
	$_POST[property_detail]";
} 
if ($_POST[served] == "MAILING DETAILS"){ 
	if($_POST[address_source] == '1a'){
		$source='Possible Place of Abode';
		$address=$_POST[address1a];
	}elseif($_POST[address_source] == '1b'){
		$source='Possible Place of Abode';
		$address=$_POST[address1b];
	}elseif($_POST[address_source] == '1c'){
		$source='Possible Place of Abode';
		$address=$_POST[address1c];
	}elseif($_POST[address_source] == '1d'){
		$source='Possible Place of Abode';
		$address=$_POST[address1d];
	}elseif($_POST[address_source] == '1e'){
		$source='Possible Place of Abode';
		$address=$_POST[address1e];
	}elseif($_POST[address_source] == 'pobox'){
		$source='P.O. Box Address';
		$address=$_POST[pobox];
}elseif($_POST[address_source] == 'pobox2'){
		$source='P.O. Box Address';
		$address=$_POST[pobox2];
	}elseif ($_POST[address_source] == '1'){
		$source='Residential Property Subject to Mortgage or Deed of Trust';
		$address=$_POST[address1];
	}
	$month=monthConvert($_POST[month]);
	if ($_POST[opServer] != ''){
		$name=id2name($_POST[opServer]);
	}else{
		$name=$_COOKIE[psdata][name];
	}
	$history="<li>I, $name, Mailed Papers to $_POST[name] at $address '$source' by first class and certified mail, return receipt requested, on $month $_POST[day], $_POST[year].</li>";
} 

if ($_POST[served] == "INVALID"){ 
	if($_POST[address_source] == '1a'){
		$source='Possible Place of Abode';
		$address=$_POST[address1a];
	}elseif($_POST[address_source] == '1b'){
		$source='Possible Place of Abode';
		$address=$_POST[address1b];
	}elseif($_POST[address_source] == '1c'){
		$source='Possible Place of Abode';
		$address=$_POST[address1c];
	}elseif($_POST[address_source] == '1d'){
		$source='Possible Place of Abode';
		$address=$_POST[address1d];
	}elseif($_POST[address_source] == '1e'){
		$source='Possible Place of Abode';
		$address=$_POST[address1e];
	}elseif ($_POST[address_source] == '1'){
		$source='Residential Property Subject to Mortgage or Deed of Trust';
		$address=$_POST[address1];
	}
	$month=monthConvert($_POST[month]);
	if ($_POST[opServer] != ''){
		$name=id2name($_POST[opServer]);
	}else{
		$name=$_COOKIE[psdata][name];
	}
	$history="<li>I, $name, SEARCHED THE UNITED STATES POSTAL SERVICE DATABASE AND THE DEPARTMENT OF ASSESSMENTS AND TAXATION DATABASE FOR $address '$source' WITH NO RESULTS, ON $month $_POST[day], $_POST[year].</li>";
	$to="System Operations <sysop@hwestauctions.com>";
	$client=$_POST[client_file];
	$subject="Invalid Address For File $client (Packet $packet)";
	$msg="$name searched for $address '$source' within the united states postal service database and the department of assessments and taxation database, with no results.";
} 
if ($_POST[served] == "LEGACY MAILING"){ 
	if($_POST[address_source] == '1a'){
		$source='Possible Place of Abode';
		$address=$_POST[address1a];
	}elseif($_POST[address_source] == '1b'){
		$source='Possible Place of Abode';
		$address=$_POST[address1b];
	}elseif($_POST[address_source] == '1c'){
		$source='Possible Place of Abode';
		$address=$_POST[address1c];
	}elseif($_POST[address_source] == '1d'){
		$source='Possible Place of Abode';
		$address=$_POST[address1d];
	}elseif($_POST[address_source] == '1e'){
		$source='Possible Place of Abode';
		$address=$_POST[address1e];
	}elseif ($_POST[address_source] == '1'){
		$source='Residential Property Subject to Mortgage or Deed of Trust';
		$address=$_POST[address1];
	}
	if ($_POST[opServer] != ''){
		$name=id2name($_POST[opServer]);
	}else{
		$name=$_COOKIE[psdata][name];
	}
	$history="<li>I, $name, Mailed Papers to $_POST[name] at $address '$source' by first class mail.</li>";
} 
if ($_POST[served] == "ADDITIONAL AFFIDAVIT"){
	if($_POST[address_source] == '1a'){
		$source='Possible Place of Abode';
		$address=$_POST[address1a];
	}elseif($_POST[address_source] == '1b'){
		$source='Possible Place of Abode';
		$address=$_POST[address1b];
	}elseif($_POST[address_source] == '1c'){
		$source='Possible Place of Abode';
		$address=$_POST[address1c];
	}elseif($_POST[address_source] == '1d'){
		$source='Possible Place of Abode';
		$address=$_POST[address1d];
	}elseif($_POST[address_source] == '1e'){
		$source='Possible Place of Abode';
		$address=$_POST[address1e];
	}elseif ($_POST[address_source] == '1'){
		$source='Residential Property Subject to Mortgage or Deed of Trust';
		$address=$_POST[address1];
	}
	$month=monthConvert($_POST[month]);
	$history="<i style='font-weight:300;'><li>Second Effort: $source</li>
	$month $_POST[day], $_POST[year] at $_POST[hour]:$_POST[minute] $_POST[ampm]<br>
	$address<br>
	Service Performed by $_POST[server_name], <b>see additional affidavit</b></i>";
}
if ($_POST[served] == "BORROWER"){ 
	if($_POST[address_source] == '1a'){
		$source='Usual Place of Abode';
		$address=$_POST[address1a];
	}elseif($_POST[address_source] == '1b'){
		$source='Usual Place of Abode';
		$address=$_POST[address1b];
	}elseif($_POST[address_source] == '1c'){
		$source='Usual Place of Abode';
		$address=$_POST[address1c];
	}elseif($_POST[address_source] == '1d'){
		$source='Usual Place of Abode';
		$address=$_POST[address1d];
	}elseif($_POST[address_source] == '1e'){
		$source='Usual Place of Abode';
		$address=$_POST[address1e];
	}elseif ($_POST[address_source] == '1'){
		$source='Residential Property Subject to Mortgage or Deed of Trust';
		$address=$_POST[address1];
	}
	$month=monthConvert($_POST[month]);
	if ($_POST[mult_def]){
		$history="$dname, a BORROWER<br>
		$source<br>
		$address<br>
		DATE OF SERVICE: $month $_POST[day], $_POST[year] at $_POST[hour]:$_POST[minute] $_POST[ampm]<br>";		
	}else{
		$history="$dname, BORROWER<br>
		$source<br>
		$address<br>
		DATE OF SERVICE: $month $_POST[day], $_POST[year] at $_POST[hour]:$_POST[minute] $_POST[ampm]<br>";
	}
} 
if ($_POST[served] == "NOT BORROWER"){
	if($_POST[address_source] == '1a'){
		$source='Usual Place of Abode';
		$address=$_POST[address1a];
	}elseif($_POST[address_source] == '1b'){
		$source='Usual Place of Abode';
		$address=$_POST[address1b];
	}elseif($_POST[address_source] == '1c'){
		$source='Usual Place of Abode';
		$address=$_POST[address1c];
	}elseif($_POST[address_source] == '1d'){
		$source='Usual Place of Abode';
		$address=$_POST[address1d];
	}elseif($_POST[address_source] == '1e'){
		$source='Usual Place of Abode';
		$address=$_POST[address1e];
	}elseif ($_POST[address_source] == '1'){
		$source='Residential Property Subject to Mortgage or Deed of Trust';
		$address=$_POST[address1];
	}
	$month=monthConvert($_POST[month]);
	if ($_POST[mult_def]){
		$history="SERVED RESIDENT $_POST[name], $_POST[age], FOR ".strtoupper($dname).", A BORROWER<br>
		$source<br>
		$address<br>
		DATE OF SERVICE: $month $_POST[day], $_POST[year] at $_POST[hour]:$_POST[minute] $_POST[ampm]";		
	}else{
		$history="SERVED RESIDENT $_POST[name], $_POST[age], FOR ".strtoupper($dname).", BORROWER<br>
		$source<br>
		$address<br>
		DATE OF SERVICE: $month $_POST[day], $_POST[year] at $_POST[hour]:$_POST[minute] $_POST[ampm]";
	}
} 
?>
<strong>AFFIDAVIT ENTRY FOR <?=$_POST[service_type];?> <?=$_POST[served];?></strong><br />
<div style="background-color:#FFFF00;"><?=stripslashes(strtoupper($history))?><? if ($_POST[defendant_detail] != ''){echo "<br />RESIDENT DESCRIPTION: ".strtoupper($_POST[defendant_detail]);}?></div>

<? $closeOut=$_POST[year].'-'.$_POST[month].'-'.$_POST[day]; ?>
<input type="hidden" name="closeOut" value="<?=$closeOut?>">
<input type="hidden" name="address_source" value="<?=$_POST[address_source]?>">
<input type="hidden" name="date" value="<?=$_POST['date']?>">
<input type="hidden" name="time" value="<?=$_POST['time']?>">
<input type="hidden" name="address" value="<?=$_POST[address]?>">
<input type="hidden" name="city" value="<?=$_POST[city]?>">
<input type="hidden" name="state" value="<?=$_POST[state]?>">
<input type="hidden" name="zip" value="<?=$_POST[zip]?>">
<input type="hidden" name="serve_address" value="<?=$address?>" />
<input type="hidden" name="defendant_detail" value="<?=$_POST[defendant_detail]?>">
<input type="hidden" name="name" value="<?=$_POST[name]?>">
<input type="hidden" name="age" value="<?=$_POST[age]?>">
<input type="hidden" name="property_detail" value="<?=$_POST[property_detail]?>" />
<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
<input type="hidden" name="history" value="<?=$history?>" />
<input type="hidden" name="service_type" value="<?=$_POST[service_type]?>" />
<input type="hidden" name="served" value="<?=$_POST[served]?>" />
<? if ($_POST[served] == 'INVALID'){?>
<input type="hidden" name="to" value="<?=$to?>" />
<input type="hidden" name="subject" value="<?=strtoupper($subject)?>" />
<input type="hidden" name="msg" value="<?=strtoupper($msg)?>" />
<? } ?>
<hr />
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="3" /> EDIT</div>
<div class="nav3"><input onClick="submitLoader()" type="radio" name="i" value="5" /> SAVE</div>
<div class="nav2"><input onClick="submitLoader()" type="radio" name="i" value="1" /> RESTART</div>
<? if ($_POST[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_POST[mailDate]?>">
<? } ?>
<? if ($_GET[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_GET[mailDate]?>">
<? } ?>
