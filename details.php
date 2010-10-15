<?
include 'security.php';
include 'menu.php';
function hardLog($str,$type){
	if ($type == "mobile"){
		$log = "/logs/mobile.log";
	}
	if ($log){
		error_log('['.date('h:i:sA n/j/y')."] [".$_SERVER["REMOTE_ADDR"]."] [".$_COOKIE[psdata][name]."] [".trim($str)."] \n", 3, $log);
	}
	// this is important code 
}
function db_connect(){ 
	@mysql_connect();
	mysql_select_db ('core');
	return mysql_error();
}
function washURI($uri){
$uri = str_replace('portal/','',$uri);
$uri = str_replace('/var/www/dataFiles/service/orders/','PS_PACKETS/',$uri);
$uri=str_replace('data/service/orders/','PS_PACKETS/',$uri);
return $uri;
}
db_connect();
$name=$_COOKIE[psdata][name];
$packet=$_GET[packet];
hardLog("Details: $name viewing $packet",'mobile');
$r=@mysql_query("SELECT date_received, otd, attorneys_id FROM ps_packets WHERE packet_id='$_GET[packet]'");
$d=mysql_fetch_array($r,MYSQL_ASSOC);
$received=strtotime($d[date_received]);
$deadline=$received+432000;
$deadline=date('F jS Y',$deadline);
if ($d[attorneys_id] == '1'){
	$client="b";
}elseif($d[attorneys_id] == '56'){
	$client="c";
}else{
	$client='a';
}
echo "Details for Packet $_GET[packet]";
echo "<br>DEADLINE: $deadline";
echo "<br><a href='download.php?pdf=".$d[otd]."&packet=".$_GET[packet]."'>DOWNLOAD PDF</a>";
echo "<br><a href='order_".$client.".php?packet=".$_GET[packet]."'>INSTRUCTIONS</a>";
echo "<br><a href='wizard.php?jump=".$_GET[packet]."-1'>WIZARD</a>";
include 'footer.php';
?>