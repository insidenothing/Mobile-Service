<div style="font-size:16px; background-color:#00FF00; width:593px; border:double #FF0000; padding:2px;"><b>Please confirm the following entries to make sure that all data entered is spelled correctly and all required fields are complete. All entries for all defendants are listed below. Click</b> <em>REQUEST PRINT APPROVAL</em><b> at the </b> <em>BOTTOM</em><b> of the page once confirmed.</b></div>


<?
if ($_COOKIE[psdata][level] == "Operations"){
mysql_select_db ('core');
$history_items = @mysql_query("select * from ps_history where packet_id='$packet' order by defendant_id") or die(mysql_error());
}else{
$history_items = @mysql_query("select * from ps_history where packet_id='$packet' and serverID='".$_COOKIE[psdata][user_id]."' order by defendant_id") or die(mysql_error());
}
while ($item=mysql_fetch_array($history_items, MYSQL_ASSOC)){
?>

<div style="border:solid 1px; width:600px;" id="history<?=$item[history_id]?>"><?=$item[history_id]?>)  <?=id2name($item[serverID])?> <?=$item[action_type]?> (<?=$item[wizard]?>)<hr /><?=$item[action_str]?><? if ($item[residentDesc]){ echo "<br>RESIDENT DESCRIPTION: ".$item[residentDesc];}?><hr /><?=$item[recordDate]?>
</div>
<? } ?>
<? if ($_COOKIE[psdata][level] == "Operations"){ ?>
Reopen Notes: <input name="reopenNotes" size="40" /><br />
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="close.3" /> CONFIRM AFFIDAVIT: APPROVE HISTORY ITEMS</div>
<!--<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="close.6" /> GRANT IN-STATE PRINT APPROVAL</div>-->
<? if ($ddr[process_status] != 'AWAITING MAIL CONFIRMATION'){ ?>
<!---<div class="nav2"><input onClick="submitLoader()" type="radio" name="i" value="close.4" /> FLAG FOR CORRECTION</div>--->
<!---<div class="nav2"><input onClick="window.open('setWatch.php','setWatch')" type="radio" /> SET WATCH</div>--->
<!-------------
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="close.5" /> READY TO MAIL</div>
------------------>
<? } ?>
<? }else{ ?>
<div class="nav3"><input onClick="submitLoader()" type="radio" name="i" value="close.2" /> REQUEST PRINT APPROVAL</div>
<? }?>
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="1" /> BACK</div>
<? if ($_POST[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_POST[mailDate]?>">
<? } ?>
<? if ($_GET[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_GET[mailDate]?>">
<? } ?>

<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
<input type="hidden" name="parts" value="<?=$_POST[parts]?>">

