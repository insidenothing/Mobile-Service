<? if (!$dname){ echo "<h1>NO DEFENDANT</h1>";}
$q="SELECT * from ps_packets where packet_id='$packet'";
$r=@mysql_query($q) or die("Query: $q<br>".mysql_error());
$d=mysql_fetch_array($r, MYSQL_ASSOC);
?>

<? if ($_POST[served] == "FIRST EFFORT"){
	/*
	$instructions = "FIRST EFFORT:<br>
		<ul><li>THIS OPTION FOR A DETAILED AFFIDAVIT ENTRY DESCRIBING AN UNSUCCESSFUL ATTEMPT TO CONTACT THE DEFENDANT AT THEIR PLACE OF RESIDENCE.</li></ul>";
	echo "<br>".$instructions; */
?>
<table width="20%"><tr><td colspan=2>1) Select Address 
<select name="address_source">
<? if ($_POST[address_source]){?>
    <option><?=$_POST[address_source]?></option>
<? } ?>
	<option value="1"><?=$d[address1]?>, <?=$d[city1]?>, <?=$d[state1]?> <?=$d[zip1]?></option>
    <? if ($d[address1a]){?>
	<option value="1a"><?=$d[address1a]?>, <?=$d[city1a]?>, <?=$d[state1a]?> <?=$d[zip1a]?></option>
    <? }
	if ($d[address1b]){?>
	<option value="1b"><?=$d[address1b]?>, <?=$d[city1b]?>, <?=$d[state1b]?> <?=$d[zip1b]?></option>
    <? }
	if ($d[address1c]){?>
	<option value="1c"><?=$d[address1c]?>, <?=$d[city1c]?>, <?=$d[state1c]?> <?=$d[zip1c]?></option>
    <? } 
	if ($d[address1d]){?>
	<option value="1d"><?=$d[address1d]?>, <?=$d[city1d]?>, <?=$d[state1d]?> <?=$d[zip1d]?></option>
    <? } 
	if ($d[address1e]){?>
	<option value="1e"><?=$d[address1e]?>, <?=$d[city1e]?>, <?=$d[state1e]?> <?=$d[zip1e]?></option>
    <? } ?>
</select>
</td></tr>
<tr><td colspan=2>2) Month, Day, Year <select name="month"><?=mkmonth($_POST['month'])?></select> <select name="day"><?=mkday($_POST['day'])?></select> <select name="year"><?=mkyear($_POST['year'])?></select></td></tr>
<tr><td colspan=2>3) Hour, Minute, AM/PM <select name="hour"><?=mkmonth($_POST['hour'])?></select> <select name="minute"><?=mkminute($_POST['minute'])?></select>
 <select name="ampm"><option value="<?=$_POST['ampm']?>"><?=$_POST['ampm']?></option><option value="AM">AM</option><option value="PM">PM</option></select></td></tr>
<tr><td colspan="2">4) Detail effort to rouse defendant: </td></tr>
<tr><td colspan="2"><input name="defendant_detail" value="<?=$_POST['defendant_detail'];?>" size="60"></td></tr></table>
<? } ?>
<? if ($_POST[served] == "SECOND EFFORT"){ ?>
<table width="20%"><tr><td colspan=2>1) Select Address 
<select name="address_source">
<? if ($_POST[address_source]){?>
    <option><?=$_POST[address_source]?></option>
<? } ?>
	<option value="1"><?=$d[address1]?>, <?=$d[city1]?>, <?=$d[state1]?> <?=$d[zip1]?></option>
    <? if ($d[address1a]){?>
	<option value="1a"><?=$d[address1a]?>, <?=$d[city1a]?>, <?=$d[state1a]?> <?=$d[zip1a]?></option>
    <? }
	if ($d[address1b]){?>
	<option value="1b"><?=$d[address1b]?>, <?=$d[city1b]?>, <?=$d[state1b]?> <?=$d[zip1b]?></option>
    <? }
	if ($d[address1c]){?>
	<option value="1c"><?=$d[address1c]?>, <?=$d[city1c]?>, <?=$d[state1c]?> <?=$d[zip1c]?></option>
    <? } 
	if ($d[address1d]){?>
	<option value="1d"><?=$d[address1d]?>, <?=$d[city1d]?>, <?=$d[state1d]?> <?=$d[zip1d]?></option>
    <? } 
	if ($d[address1e]){?>
	<option value="1e"><?=$d[address1e]?>, <?=$d[city1e]?>, <?=$d[state1e]?> <?=$d[zip1e]?></option>
    <? } ?>
</select>
</td></tr>
<tr><td colspan=2>2) Month, Day, Year <select name="month"><?=mkmonth($_POST['month'])?></select> <select name="day"><?=mkday($_POST['day'])?></select> <select name="year"><?=mkyear($_POST['year'])?></select></td></tr>
<tr><td colspan=2>3) Hour, Minute, AM/PM <select name="hour"><?=mkmonth($_POST['hour'])?></select> <select name="minute"><?=mkminute($_POST['minute'])?></select>
 <select name="ampm"><option value="<?=$_POST['ampm']?>"><?=$_POST['ampm']?></option><option value="AM">AM</option><option value="PM">PM</option></select></td></tr>
<tr><td colspan="2">4) Detail effort to rouse defendant: </td></tr>
<tr><td colspan="2"><input name="defendant_detail" value="<?=$_POST['defendant_detail'];?>" size="60"></td></tr></table>
<? } ?>
<? if ($_POST[served] == "POSTING DETAILS"){ ?>
<table width="20%"><tr><td colspan=2>1) Select Address 
<select name="address_source">
<? if ($_POST[address_source]){?>
    <option><?=$_POST[address_source]?></option>
<? } ?>
	<option value="1"><?=$d[address1]?>, <?=$d[city1]?>, <?=$d[state1]?> <?=$d[zip1]?></option>
    <? if ($d[address1a]){?>
	<option value="1a"><?=$d[address1a]?>, <?=$d[city1a]?>, <?=$d[state1a]?> <?=$d[zip1a]?></option>
    <? }
	if ($d[address1b]){?>
	<option value="1b"><?=$d[address1b]?>, <?=$d[city1b]?>, <?=$d[state1b]?> <?=$d[zip1b]?></option>
    <? }
	if ($d[address1c]){?>
	<option value="1c"><?=$d[address1c]?>, <?=$d[city1c]?>, <?=$d[state1c]?> <?=$d[zip1c]?></option>
    <? } 
	if ($d[address1d]){?>
	<option value="1d"><?=$d[address1d]?>, <?=$d[city1d]?>, <?=$d[state1d]?> <?=$d[zip1d]?></option>
    <? } 
	if ($d[address1e]){?>
	<option value="1e"><?=$d[address1e]?>, <?=$d[city1e]?>, <?=$d[state1e]?> <?=$d[zip1e]?></option>
    <? } ?>
</select>
</td></tr>
<tr><td colspan=2>2) Month, Day, Year <select name="month"><?=mkmonth($_POST['month'])?></select> <select name="day"><?=mkday($_POST['day'])?></select> <select name="year"><?=mkyear($_POST['year'])?></select></td></tr>
<tr><td colspan=2>3) Hour, Minute, AM/PM <select name="hour"><?=mkmonth($_POST['hour'])?></select> <select name="minute"><?=mkminute($_POST['minute'])?></select>
 <select name="ampm"><option value="<?=$_POST['ampm']?>"><?=$_POST['ampm']?></option><option value="AM">AM</option><option value="PM">PM</option></select></td></tr>
<tr><td colspan="2">4) Detail the place of posting</td></tr>
<tr><td colspan="2"><input name="property_detail" value="<?=$_POST['property_detail'];?>" size="60"></td></tr></table>
<? } ?>
<? if ($_POST[served] == "MAILING DETAILS"){ ?>
<table width="20%"><tr><td colspan=2>1) Select Address 
<select name="address_source">
<? if ($_POST[address_source]){?>
    <option><?=$_POST[address_source]?></option>
<? } ?>
	<option value="1"><?=$d[address1]?>, <?=$d[city1]?>, <?=$d[state1]?> <?=$d[zip1]?></option>
    <? if ($d[address1a]){?>
	<option value="1a"><?=$d[address1a]?>, <?=$d[city1a]?>, <?=$d[state1a]?> <?=$d[zip1a]?></option>
    <? }
	if ($d[address1b]){?>
	<option value="1b"><?=$d[address1b]?>, <?=$d[city1b]?>, <?=$d[state1b]?> <?=$d[zip1b]?></option>
    <? }
	if ($d[address1c]){?>
	<option value="1c"><?=$d[address1c]?>, <?=$d[city1c]?>, <?=$d[state1c]?> <?=$d[zip1c]?></option>
    <? } 
	if ($d[address1d]){?>
	<option value="1d"><?=$d[address1d]?>, <?=$d[city1d]?>, <?=$d[state1d]?> <?=$d[zip1d]?></option>
    <? } 
	if ($d[address1e]){?>
	<option value="1e"><?=$d[address1e]?>, <?=$d[city1e]?>, <?=$d[state1e]?> <?=$d[zip1e]?></option>
    <? }
	if ($d[pobox]){?>
	<option value="pobox"><?=$d[pobox]?>, <?=$d[pocity]?>, <?=$d[postate]?> <?=$d[pozip]?></option>
    <? }
	if ($d[pobox2]){?>
	<option value="pobox2"><?=$d[pobox2]?>, <?=$d[pocity2]?>, <?=$d[postate2]?> <?=$d[pozip2]?></option>
    <? } ?>
</select>
<input type="hidden" name="name" value="<?=$dname;?>" size="8" value="">
</td></tr>
<tr><td colspan=2>2) Month, Day, Year <select name="month"><?=mkmonth($_POST['month'])?></select> <select name="day"><?=mkday($_POST['day'])?></select> <select name="year"><?=mkyear($_POST['year'])?></select></td></tr>
<? } ?>
<? if ($_POST[served] == "LEGACY MAILING"){ ?>
<table width="20%"><tr><td colspan=2>1) Select Address 
<select name="address_source">
<? if ($_POST[address_source]){?>
    <option><?=$_POST[address_source]?></option>
<? } ?>
	<option value="1"><?=$d[address1]?>, <?=$d[city1]?>, <?=$d[state1]?> <?=$d[zip1]?></option>
    <? if ($d[address1a]){?>
	<option value="1a"><?=$d[address1a]?>, <?=$d[city1a]?>, <?=$d[state1a]?> <?=$d[zip1a]?></option>
    <? }
	if ($d[address1b]){?>
	<option value="1b"><?=$d[address1b]?>, <?=$d[city1b]?>, <?=$d[state1b]?> <?=$d[zip1b]?></option>
    <? }
	if ($d[address1c]){?>
	<option value="1c"><?=$d[address1c]?>, <?=$d[city1c]?>, <?=$d[state1c]?> <?=$d[zip1c]?></option>
    <? } 
	if ($d[address1d]){?>
	<option value="1d"><?=$d[address1d]?>, <?=$d[city1d]?>, <?=$d[state1d]?> <?=$d[zip1d]?></option>
    <? } 
	if ($d[address1e]){?>
	<option value="1e"><?=$d[address1e]?>, <?=$d[city1e]?>, <?=$d[state1e]?> <?=$d[zip1e]?></option>
    <? } ?>
</select>
<input type="hidden" name="name" value="<?=$dname;?>" size="8" value=""></td></tr></table>
<? } ?>
<? if ($_POST[served] == "ADDITIONAL AFFIDAVIT"){ ?>
<table width="20%"><tr><td colspan=2>1) Select Address 
<select name="address_source">
<? if ($_POST[address_source]){?>
    <option><?=$_POST[address_source]?></option>
<? } ?>
	<option value="1"><?=$d[address1]?>, <?=$d[city1]?>, <?=$d[state1]?> <?=$d[zip1]?></option>
    <? if ($d[address1a]){?>
	<option value="1a"><?=$d[address1a]?>, <?=$d[city1a]?>, <?=$d[state1a]?> <?=$d[zip1a]?></option>
    <? }
	if ($d[address1b]){?>
	<option value="1b"><?=$d[address1b]?>, <?=$d[city1b]?>, <?=$d[state1b]?> <?=$d[zip1b]?></option>
    <? }
	if ($d[address1c]){?>
	<option value="1c"><?=$d[address1c]?>, <?=$d[city1c]?>, <?=$d[state1c]?> <?=$d[zip1c]?></option>
    <? } 
	if ($d[address1d]){?>
	<option value="1d"><?=$d[address1d]?>, <?=$d[city1d]?>, <?=$d[state1d]?> <?=$d[zip1d]?></option>
    <? } 
	if ($d[address1e]){?>
	<option value="1e"><?=$d[address1e]?>, <?=$d[city1e]?>, <?=$d[state1e]?> <?=$d[zip1e]?></option>
    <? } ?>
</select>
</td></tr>
<tr><td colspan=2>2) Month, Day, Year <select name="month"><?=mkmonth($_POST['month'])?></select> <select name="day"><?=mkday($_POST['day'])?></select> <select name="year"><?=mkyear($_POST['year'])?></select></td></tr>
<tr><td colspan=2>3) Hour, Minute, AM/PM <select name="hour"><?=mkmonth($_POST['hour'])?></select> <select name="minute"><?=mkminute($_POST['minute'])?></select>
 <select name="ampm"><option value="<?=$_POST['ampm']?>"><?=$_POST['ampm']?></option><option value="AM">AM</option><option value="PM">PM</option></select></td></tr>
<tr><td colspan="2">4) Server Name: </td></tr>
<tr><td colspan="2"><input name="server_name" value="<?=$_POST['server_name'];?>" size="20"></td></tr></table>
<? } ?>
<? if ($_POST[served] == "BORROWER"){ ?>
<table width="20%"><tr><td colspan=2>1) Select Address 
<select name="address_source">
<? if ($_POST[address_source]){?>
    <option><?=$_POST[address_source]?></option>
<? } ?>
	<option value="1"><?=$d[address1]?>, <?=$d[city1]?>, <?=$d[state1]?> <?=$d[zip1]?></option>
    <? if ($d[address1a]){?>
	<option value="1a"><?=$d[address1a]?>, <?=$d[city1a]?>, <?=$d[state1a]?> <?=$d[zip1a]?></option>
    <? }
	if ($d[address1b]){?>
	<option value="1b"><?=$d[address1b]?>, <?=$d[city1b]?>, <?=$d[state1b]?> <?=$d[zip1b]?></option>
    <? }
	if ($d[address1c]){?>
	<option value="1c"><?=$d[address1c]?>, <?=$d[city1c]?>, <?=$d[state1c]?> <?=$d[zip1c]?></option>
    <? } 
	if ($d[address1d]){?>
	<option value="1d"><?=$d[address1d]?>, <?=$d[city1d]?>, <?=$d[state1d]?> <?=$d[zip1d]?></option>
    <? } 
	if ($d[address1e]){?>
	<option value="1e"><?=$d[address1e]?>, <?=$d[city1e]?>, <?=$d[state1e]?> <?=$d[zip1e]?></option>
    <? } ?>
</select>
</td></tr>
<tr><td colspan=2>2)Month, Day, Year <select name="month"><?=mkmonth($_POST['month'])?></select> <select name="day"><?=mkday($_POST['day'])?></select> </select> <select name="year"><?=mkyear($_POST['year'])?></select></td></tr>
<tr><td colspan=2>3) Hour, Minute, AM/PM <select name="hour"><?=mkmonth($_POST['hour'])?></select> <select name="minute"><?=mkminute($_POST['minute'])?></select>
 <select name="ampm"><option value="<?=$_POST['ampm']?>"><?=$_POST['ampm']?></option><option value="AM">AM</option><option value="PM">PM</option></select></td></tr>
 <tr><td>6) Description of individual served</td><td><input name="defendant_detail" value="<?=$_POST['defendant_detail'];?>" size="60"></td></tr></table>
 <? } ?>
<? if ($_POST[served] == "NOT BORROWER"){ ?>
<table width="20%"><tr><td colspan=2>1) Select Address 
<select name="address_source">
<? if ($_POST[address_source]){?>
    <option><?=$_POST[address_source]?></option>
<? } ?>
	<option value="1"><?=$d[address1]?>, <?=$d[city1]?>, <?=$d[state1]?> <?=$d[zip1]?></option>
    <? if ($d[address1a]){?>
	<option value="1a"><?=$d[address1a]?>, <?=$d[city1a]?>, <?=$d[state1a]?> <?=$d[zip1a]?></option>
    <? }
	if ($d[address1b]){?>
	<option value="1b"><?=$d[address1b]?>, <?=$d[city1b]?>, <?=$d[state1b]?> <?=$d[zip1b]?></option>
    <? }
	if ($d[address1c]){?>
	<option value="1c"><?=$d[address1c]?>, <?=$d[city1c]?>, <?=$d[state1c]?> <?=$d[zip1c]?></option>
    <? } 
	if ($d[address1d]){?>
	<option value="1d"><?=$d[address1d]?>, <?=$d[city1d]?>, <?=$d[state1d]?> <?=$d[zip1d]?></option>
    <? } 
	if ($d[address1e]){?>
	<option value="1e"><?=$d[address1e]?>, <?=$d[city1e]?>, <?=$d[state1e]?> <?=$d[zip1e]?></option>
    <? } ?>
</select>
</td></tr>
<tr><td>2) Name</td><td><input name="name" value="<?=$_POST['name'];?>" size="20"></td></tr>
<tr><td>3) Age</td><td><input name="age" value="<?=$_POST['age'];?>" size="8"></td></tr>
<tr><td colspan=2>4) Month, Day, Year <select name="month"><?=mkmonth($_POST['month'])?></select> <select name="day"><?=mkday($_POST['day'])?></select> <select name="year"><?=mkyear($_POST['year'])?></select></td></tr>
<tr><td colspan=2>5) Hour, Minute, AM/PM <select name="hour"><?=mkmonth($_POST['hour'])?></select> <select name="minute"><?=mkminute($_POST['minute'])?></select>
 <select name="ampm"><option value="<?=$_POST['ampm']?>"><?=$_POST['ampm']?></option><option value="AM">AM</option><option value="PM">PM</option></select></td></tr>
<tr><td>6) Description of individual served</td><td><input name="defendant_detail" value="<?=$_POST['defendant_detail'];?>" size="60"></td></tr></table>
<? } ?>
<hr />
<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
<input type="hidden" name="service_type" value="<?=$_POST[service_type]?>" />
<input type="hidden" name="served" value="<?=$_POST[served]?>" />
<input type="hidden" name="i" value="4" />
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
<input type="hidden" name="address1" value="<?=$d[address1]?>, <?=$d[city1]?>, <?=$d[state1]?> <?=$d[zip1]?>" />
<input type="hidden" name="address1a" value="<?=$d[address1a]?>, <?=$d[city1a]?>, <?=$d[state1a]?> <?=$d[zip1a]?>" />
<input type="hidden" name="address1b" value="<?=$d[address1b]?>, <?=$d[city1b]?>, <?=$d[state1b]?> <?=$d[zip1b]?>" />
<input type="hidden" name="address1c" value="<?=$d[address1c]?>, <?=$d[city1c]?>, <?=$d[state1c]?> <?=$d[zip1c]?>" />
<input type="hidden" name="address1d" value="<?=$d[address1d]?>, <?=$d[city1d]?>, <?=$d[state1d]?> <?=$d[zip1d]?>" />
<input type="hidden" name="address1e" value="<?=$d[address1e]?>, <?=$d[city1e]?>, <?=$d[state1e]?> <?=$d[zip1e]?>" />
<input type="hidden" name="pobox" value="<?=$d[pobox]?>, <?=$d[pocity]?>, <?=$d[postate]?> <?=$d[pozip]?>" />
<input type="hidden" name="pobox2" value="<?=$d[pobox2]?>, <?=$d[pocity2]?>, <?=$d[postate2]?> <?=$d[pozip2]?>" />

<input type="hidden" name="client_file" value="<?=$ddr[client_file]?>" />
<? if ($_POST[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_POST[mailDate]?>">
<? } ?>
<? if ($_GET[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_GET[mailDate]?>">
<? } ?>
<? if ($d[name2]){?>
<input type="hidden" name="mult_def" value="1" />
<? } ?>
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="4" /> PREVIEW</div>
<div class="nav3"><input onClick="submitLoader()" type="radio" name="i" value="2" /> BACK</div>
<div class="nav2"><input onClick="submitLoader()" type="radio" name="i" value="1" /> RESTART</div>
