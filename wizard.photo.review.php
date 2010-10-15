<?
?>
<table border="1"><tr>
<?
foreach(range('a','m') as $letter){
if ($ddr["photo".$defendant.$letter]){
$newPic = str_replace('ps/','',$ddr['photo'.$defendant.$letter]);
echo "<td><input type='radio' name='photo' value='$letter'></td><td>".alpha2desc($letter)."<br>".strtoupper(photoAddress($packet,$defendant,$letter))."<br><a href='$newPic' target='_Blank'><img width='200' height='125' src='$newPic' /></a></td>";
}
}
?>
</tr></table>
<div class="nav3"><input onClick="submitLoader()" type="radio" name="i" value="photo.move.1" /> CHANGE ADDRESS FOR SELECTED</div>
<div class="nav3"><input onClick="submitLoader()" type="radio" name="i" value="photo.remove" /> REMOVE SELECTED PHOTOGRAPH</div>
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="photo.upload.1" /> UPLOAD MORE PHOTOGRAPHS</div>
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="1" /> BACK</div>
<input type="hidden" name="parts" value="<?=$_POST[parts]?>" />
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />

<small>DOT = Deed of Trust | LKA = Last Known Address | ALT = Alternate Service Address</small>
