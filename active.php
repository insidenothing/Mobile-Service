<?
include 'security.php';
include 'menu.php';
function db_connect(){
	@mysql_connect();
	mysql_select_db ('core');
	return mysql_error();
}
function hardLog($str,$type){
	if ($type == "mobile"){
		$log = "/logs/mobile.log";
	}
	if ($log){
		error_log('['.date('h:i:sA n/j/y')."] [".$_SERVER["REMOTE_ADDR"]."] [".$_COOKIE[psdata][name]."] [".trim($str)."] \n", 3, $log);
	}
	// this is important code 
}
db_connect();
$name=$_COOKIE[psdata][name];
$level=$_COOKIE[psdata][level];
hardLog("Mobile Worksheet: $name - $level",'mobile');
//hardLog('Server Active Files','mobile');
//hardLog($_SERVER["HTTP_USER_AGENT"],'mobile');
if ($_COOKIE[psdata][level] == 'Operations'){
	$q="SELECT packet_id FROM ps_packets WHERE process_status='ASSIGNED'";
}else{
	$id=$_COOKIE[psdata][user_id];
	$q="SELECT packet_id FROM ps_packets WHERE process_status='ASSIGNED' AND (server_id='$id' OR server_ida='$id' OR server_idb='$id' OR server_idc='$id' OR server_idd='$id' OR server_ide='$id')";
}
$r=@mysql_query($q) or die("Query: $q<br>".mysql_error());
while ($d=mysql_fetch_array($r,MYSQL_ASSOC)){
	echo "<a href='details.php?packet=$d[packet_id]'>$d[packet_id]</a><br>";
}
include 'footer.php';
?>