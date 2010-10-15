<?
if (isset($_POST[overRideType]) && ($_POST[overRideType] == 'final')){?>
	<input type="hidden" name="i" value="close.3">
	<input type="hidden" name="overRide" value="1" />
<? }elseif(isset($_POST[overRideType]) && ($_POST[overRideType] == 'final2')){//for secondary override ?>
	<input type="hidden" name="i" value="close.3">
	<input type="hidden" name="overRide" value="2" />
<? }elseif(isset($_POST[overRideType]) && ($_POST[overRideType] == 'MandP')){ ?>
	<input type="hidden" name="i" value="close.5">
	<input type="hidden" name="overRide" value="1" />
<? }elseif(isset($_POST[overRideType]) && ($_POST[overRideType] == 'MandP2')){ ?>
	<input type="hidden" name="i" value="close.5">
	<input type="hidden" name="overRide" value="2" />
<? }else{ ?>
	NO OVERRIDETYPE
<? } ?>
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
<?
echo "<script>submitLoader()</script>";
?>