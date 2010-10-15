<?
include 'common.php';
include 'menu.php';
hardLog('SERVICE: '.$_SERVER["HTTP_USER_AGENT"],'mobile');
?>
<form action="details.php">
Enter Packet Number<br>
<input name="packet"><br>
<input type="submit" value="Load Packet">
</form>
<?
include 'footer.php';
?>