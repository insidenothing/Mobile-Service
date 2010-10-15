<? 
$hold=0;
if ($_POST[remove]){
foreach ($_POST[remove] as $key => $value){ 
if($hold==0){
$hold++;
$r=@mysql_query("select * from ps_history where history_id = '$key'");
$d=mysql_fetch_array($r, MYSQL_ASSOC);
?>
Reformat affidavit item #<?=$key?> Wizard Status: <?=$d[wizard];?>
<div style='border:solid 1px'><?=$d[action_str];?></div>
<?

if ($d[wizard]){
	$_POST[served] = $d[wizard];
	include 'wizard.3.php';
}
if (!$d[wizard] && $_POST[served]){
	include 'wizard.3.php';
}
if (!$d[wizard] && !$_POST[served]){
	echo "<select onChange='submitLoader()' name='served'><option>No Wizard Type Found </option>
	<option>FIRST EFFORT</option>
	<option>SECOND EFFORT</option>
	<option>POSTING DETAILS</option>
	<option>MAILING DETAILS</option>
	<option>MORTGAGOR - GRANTOR</option>
	<option>NOT MORTGAGOR - GRANTOR</option>
	</select>";
}
}}}else{
$r=@mysql_query("select * from ps_history where history_id = '$_POST[hid]'");
$d=mysql_fetch_array($r, MYSQL_ASSOC);
?>
Reformat affidavit item #<?=$_POST[hid]?> Wizard Status: <?=$d[wizard];?>
<div style='border:solid 1px'><?=$d[action_str];?></div>
<?

if ($d[wizard]){
	$_POST[served] = $d[wizard];
	echo "Reformat as";
	include 'wizard.3.php';
}
if ($_POST[served]){
	echo "Reformat as";
	include 'wizard.3.php';
}
if (!$d[wizard] && !$_POST[served]){
	echo "<select onChange='submitLoader()' name='served'><option>No Wizard Type Found </option><option>FIRST EFFORT</option><option>SECOND EFFORT</option></select><input type='hidden' name='i' value='reformat' /><input type='hidden' name='hid' value='$d[history_id] />";
}
}

?>


