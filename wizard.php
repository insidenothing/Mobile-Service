<?
function timeline($id,$note){
	mysql_select_db ('core');
	hardLog("$note for packet $id",'user');

	$q1 = "SELECT timeline FROM ps_packets WHERE packet_id = '$id'";		
	$r1 = @mysql_query ($q1) or die(mysql_error());
	$d1 = mysql_fetch_array($r1, MYSQL_ASSOC);
	$access=date('m/d/y g:i A');
	if ($d1[timeline] != ''){
		$notes = $d1[timeline]."<br>$access: ".$note;
	}else{
		$notes = $access.': '.$note;
	}
	$notes = addslashes($notes);
	$q1 = "UPDATE ps_packets set timeline='$notes' WHERE packet_id = '$id'";		
	$r1 = @mysql_query ($q1) or die(mysql_error());
	//@mysql_query("insert into syslog (logTime, event) values (NOW(), 'Packet $id: $note')");
}
if (!$_POST['i']){
$i='a';
}else{
$i=$_POST['i'];
}

$server = $_COOKIE[psdata][user_id];
$part = explode('-',$_POST[parts]);
$packet = $part[0];
$defendant = $part[1];
$defName = $parts;
if (!$defName){
$lock=1; // unlocked
}else{	
$lock=2; // locked 
}

if ($_GET[jump]){
}
include 'common.php';
if ($_GET[jump]){
	include 'wizard.jump.php';
	die();
}
include 'menu.php';
mysql_connect();
mysql_select_db ('core');
if ($_COOKIE[psdata][level] == 'Operations'){
	$qqr = @mysql_query("SELECT * from ps_packets where packet_id = '$packet'");
}else{
	$id=$_COOKIE[psdata][user_id];
	$qqr = @mysql_query("SELECT * from ps_packets where packet_id = '$packet' AND (server_id='$id' OR server_ida='$id' OR server_idb='$id' OR server_idc='$id' OR server_idd='$id' OR server_ide='$id')");
}
$ddr = mysql_fetch_array($qqr, MYSQL_ASSOC);
$dname = $ddr["name$defendant"];
$daddy = $ddr["address$defendant"].', '.$ddr["city$defendant"].', '.$ddr["state$defendant"].' '.$ddr["zip$defendant"].' - <b>'.initals(id2name($ddr[server_id])).'</b>';
$vera=$defendant.'a';
$verb=$defendant.'b';
$verc=$defendant.'c';
$verd=$defendant.'d';
$vere=$defendant.'e';
if ($ddr["address$vera"]){
	$addressa=strtoupper($ddr["address$vera"].', '.$ddr["city$vera"].', '.$ddr["state$vera"].' '.$ddr["zip$vera"]).' - <b>'.initals(id2name($ddr[server_ida])).'</b>';
	$daddya="<br><small>$addressa</small>";
}
if ($ddr["address$verb"]){
	$addressb=strtoupper($ddr["address$verb"].', '.$ddr["city$verb"].', '.$ddr["state$verb"].' '.$ddr["zip$verb"]).' - <b>'.initals(id2name($ddr[server_idb])).'</b>';
	$daddyb="<br><small>$addressb</small>";
}
if ($ddr["address$verc"]){
	$addressc=strtoupper($ddr["address$verc"].', '.$ddr["city$verc"].', '.$ddr["state$verc"].' '.$ddr["zip$verc"]).' - <b>'.initals(id2name($ddr[server_idc])).'</b>';
	$daddyc="<br><small>$addressc</small>";
}
if ($ddr["address$verd"]){
	$addressd=strtoupper($ddr["address$verd"].', '.$ddr["city$verd"].', '.$ddr["state$verd"].' '.$ddr["zip$verd"]).' - <b>'.initals(id2name($ddr[server_idd])).'</b>';
	$daddyd="<br><small>$addressd</small>";
}
if ($ddr["address$vere"]){
	$addresse=strtoupper($ddr["address$vere"].', '.$ddr["city$vere"].', '.$ddr["state$vere"].' '.$ddr["zip$vere"]).' - <b>'.initals(id2name($ddr[server_ide])).'</b>';
	$daddye="<br><small>$addresse</small>";
}
if ($ddr["pobox"]){
	$addresspo=strtoupper($ddr["pobox"].', '.$ddr["pocity"].', '.$ddr["postate"].' '.$ddr["pozip"]);
	$daddypo="<br><small>$addresspo</small>";
}
$info = "<div>Packet: $packet</div>";
$info .= "<div>Defendant: $dname</div>";
$info .= "<div>Address: $daddy</div>";
if ($_POST[opServer]){
$info .= "<div>Updated By: ".id2name($server)." for ".id2name($_POST[opServer])."</div>";
}else{
$info .= "<div>Entered By: ".id2name($server)."</div>";
}
?>
<SCRIPT language="JavaScript">
function submitLoader(){
	document.wizard.submit();
}
function submitLoaderRestart(){
	document.restart.submit();
}
</script>
<body bgcolor="#CCFFFF">
<? 
if ($_GET[mailDate]){
	$mailDate=$_GET[mailDate];
}elseif($_POST[mailDate]){
	$mailDate=$_POST[mailDate];
}
if ($_COOKIE[psdata][level] != "Operations"){
	hardLog(' mobile access wizard ['.$i.'] for '.$_POST[served].' by '.$_POST[service_type].' ('.$_POST[parts].')','mobile'); 
}else{
	hardLog(' mobile access wizard ['.$i.'] for '.$_POST[served].' by '.$_POST[service_type].' ('.$_POST[parts].')','mobile'); 
}
?>
<title>Affidavit Wizard <?=$_POST[service_type]?> &gt; <?=$_POST[served]?> &gt; <?=$_POST[parts]?></title>
<table align="center"><tr><td><form enctype="multipart/form-data" id="wizard" name="wizard" onSubmit="hideshow(document.getElementById('loading'))" method="post"><fieldset style="background-color:#FFFFFF;"><legend style=" background-color:#FFFFCC; border:double 1px #999999; padding:5px;"><? if($_COOKIE[psdata][level]=="Operations"){ echo id2name($_POST[opServer])."*<br>"; }?>DEFENDANT: <a href="wizard.php?jump=<?=$packet?>-1<? if ($mailDate){ echo "&mailDate=".$mailDate;} ?>">1</a><? if ($ddr[name2]){?> <a href="wizard.php?jump=<?=$packet?>-2<? if ($mailDate){ echo "&mailDate=".$mailDate;} ?>">2</a> <? } if ($ddr[name3]){?> <a href="wizard.php?jump=<?=$packet?>-3<? if ($mailDate){ echo "&mailDate=".$mailDate;} ?>">3</a> <? } if ($ddr[name4]){?> <a href="wizard.php?jump=<?=$packet?>-4<? if ($mailDate){ echo "&mailDate=".$mailDate;} ?>">4</a><? } ?> <? if ($ddr[name5]){?> <a href="wizard.php?jump=<?=$packet?>-5<? if ($mailDate){ echo "&mailDate=".$mailDate;} ?>">5</a><? } ?> <? if ($ddr[name6]){?> <a href="wizard.php?jump=<?=$packet?>-6<? if ($mailDate){ echo "&mailDate=".$mailDate;} ?>">6</a><? } ?> <? if ($_COOKIE[psdata][level] == 'Operations'){ ?> <a href="order.php?packet=<?=$ddr[packet_id]?>" target="_blank">(<?=id2attorney($ddr[attorneys_id]);?>)</a> - <a href="ps_instructions.<? if ($ddr[attorneys_id] == 1){ echo 'burson.';}elseif($ddr[attorneys_id] == 56){ echo 'brennan.';}?>php?packet=<?=$ddr[packet_id]?>" target="_blank">INSTRUCTIONS</a> - <a href="serviceSheet.php?packet=<?=$packet?>&autoPrint=1" target="_blank">CHECKLIST</a> - <a href="historyModify.php?packet=<?=$packet?>" target="_blank">MODIFY</a><? } if($_GET[mailDate]){echo "<br>Updating Mailing Affidavits for the date: ".$_GET[mailDate];} ?><? if($_POST[mailDate]){echo "<br>Updating Mailing Affidavits for the date: ".$_POST[mailDate];} ?><br><?=strtoupper($dname)?><br /><small><?=strtoupper($daddy)?></small><?=$daddya?><?=$daddyb?><?=$daddyc?><?=$daddyd?><?=$daddye?><? if ($_COOKIE["psdata"]["level"] == "Operations"){echo $daddypo;}?><br /><? if($i=='a'){ ?>SELECT DEFENDANT<? }elseif($i==1){ ?><strong><?=strtoupper($ddr[process_status])?> : <?=strtoupper($ddr[service_status])?> : <?=strtoupper($ddr[affidavit_status])?></strong><? }elseif($i==4){ ?>ARE ALL DETAILS CORRECT?<? }else{ ?><? if ($i != 2 && $i!= 'a'){ echo "<strong>ENTER ".$_POST[served]." DETAILS</strong>";}?><? }?><? if ($ddr[reopenNotes] != ''){?><br>"<?=$ddr[reopenNotes]?>"<? }?></legend>
<?
//Display Server Instructions (if they exist):

 ?>
<div id="navSystem" style="display:block"><? mysql_select_db ('core'); include "wizard.$i.php"; ?></div></fieldset><input type="hidden" name="MAX_FILE_SIZE" value="100000000" /><? if ($_POST[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_POST[mailDate]?>">
<? } ?>
<? if ($_GET[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_GET[mailDate]?>">
<? } ?>
</form></td></tr>
<? if($_COOKIE[psdata][level]=="Operations"){ ?>
<tr><td align="center"><form method="post" id="restart" name="restart"><select onChange='submitLoaderRestart()' name='opServer'><?=servers($_POST[opServer])?></select><input type="hidden" name="i" value="a"><? if ($_POST[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_POST[mailDate]?>">
<? } ?>
<? if ($_GET[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_GET[mailDate]?>">
<? } ?></form></td></tr>
<? } ?>
<tr><td>
<? if ($ddr[timeline]){ ?>
<fieldset><legend>Service Log</legend>
<?=$ddr[timeline]?></fieldset>
<? }
if ($packet){
opLog($_COOKIE[psdata][name]." Wizard-$i #$packet");
}else{
opLog($_COOKIE[psdata][name]." Wizard-Jump #$_GET[jump]");
}
 include 'footer.php';?>
