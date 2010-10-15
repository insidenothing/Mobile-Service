<?
$pic = explode('http://mdwestserve.com/ps/photographs//',$ddr['photo'.$defendant.$_POST['photo']]);
echo alpha2desc($_POST['photo']).", ".strtoupper(photoAddress($packet,$defendant,$_POST[photo]))."<br><iframe frameborder='0' scrolling='no' width='150' height='120' src='watermark.php?pic=$pic[1]'></iframe>";
?>
<br />Change Photo Label To:

<? foreach(range('a','g') as $letter){ 
if (photoAddress($packet,$defendant,$letter)){
?>
<div class="photo<?=$letter?>"><input onClick="submitLoader()" type="radio" name="new" value="<?=$letter?>" /> <?=alpha2desc($letter);?> at <?=strtoupper(photoAddress($packet,$defendant,$letter))?></div>
<? } } ?>
<input type="hidden" name="old" value="<?=$_POST[photo]?>" />
<input type="hidden" name="i" value="photo.move.2" />
<input type="hidden" name="parts" value="<?=$_POST[parts]?>" />
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />

<small>DOT = Deed of Trust | LKA = Last Known Address | ALT = Alternate Service Address</small>
