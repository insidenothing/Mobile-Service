<?
if ($_FILES['upload']['tmp_name']){

// log all attempts
@mysql_query("insert into ps_file_array (name, type, size, tmp_name, error, uploadDate, user) values ('".$_FILES['upload']['name']."','".$_FILES['upload']['type']."','".$_FILES['upload']['size']."','".$_FILES['upload']['tmp_name']."','".$_FILES['upload']['error']."', NOW(), '$name' )");
// ok first we need to go get the files
$path = "/data/service/photos/";
$file_path = $path.'/'.$packet;
if (!file_exists($file_path)){
	mkdir ($file_path,0777);
}
$target_path = $file_path."/".$defendant.".".$_POST[photo].".".time().".jpg";  
if (move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)){"file <b>NOT</b> saved...($target_path)<br>"; }else{ echo "file saved...($target_path)<br>"; }

$link = "http://mdwestserve.com/ps/photographs/".$packet."/".$defendant.".".$_POST[photo].".".time().".jpg";
$query = "UPDATE ps_packets SET photo".$defendant.$_POST[photo]." ='$link' where packet_id = '$packet'";
@mysql_query($query);
// do all watermarking here!
include 'wizard.photo.watermark.php';
// send html with img tags....
$headers  = "MIME-Version: 1.0 \n";
$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
$headers .= "From: SYSTEM <sysop@hwestauctions.com> \n";
$subject = "WIZARD: PHOTO UPLOAD";
$ps = $info.id2name($_COOKIE[psdata][user_id]).' '.$link;
$ps .= "<br><img src='http://mdwestserve.com/ps/$img'>";
$to = "SYSTEM OPERATORS <sysop@hwestauctions.com>";
//mail($to,$subject,$ps,$headers);
$user = $_COOKIE[psdata][user_id];
mkAlert('UPLOADED PHOTO',$user,$user,$packet);
?>
<div class="nav2"><input onClick="submitLoader()" type="radio" name="i" value="photo.review" /> NEXT</div>
<? } else {?>
NO PHOTO SELECTED
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="photo.upload.1" /> BACK</div>

<? }?>
<input type="hidden" name="parts" value="<?=$_POST[parts]?>" />
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
