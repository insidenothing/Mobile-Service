1) Select Photograph to Upload<br />
<input size="50" name="upload" type="file" /><br />
2) Select Action / Address<br />
<? foreach(range('a','m') as $letter){ 
if (photoAddress($packet,$defendant,$letter) != ''){
?>
<div class="photo<?=$letter?>"><input onClick="submitLoader()" type="radio" name="photo" value="<?=$letter?>" /> <?=alpha2desc($letter);?> at <?=strtoupper(photoAddress($packet,$defendant,$letter))?></div>
<?
}
 } ?>
<div class="nav0"><input onClick="submitLoader()" Checked type="radio" name="i" value="photo.upload.2" /> AUTO-NEXT</div>
<div class="nav2"><input onClick="submitLoader()" type="radio" name="i" value="photo.review" /> BACK</div>
<input type="hidden" name="parts" value="<?=$_POST[parts]?>" />
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />

<small>DOT = Deed of Trust | LKA = Last Known Address | ALT = Alternate Service Address</small>