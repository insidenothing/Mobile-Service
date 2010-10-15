<?
ob_start();
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

function id2name($id){
	$q="SELECT name FROM ps_users WHERE id = '$id'";
	$r=@mysql_query($q);
	$d=mysql_fetch_array($r, MYSQL_ASSOC);
return $d[name];
}
db_connect();
$user = $_COOKIE[psdata][user_id];
$packet = $_GET[packet];
$level = $_COOKIE[psdata][level];
$userName = $_COOKIE[psdata][name];
hardLog("$page: $userName viewing $packet",'mobile');
$query="SELECT name1, name2, name3, name4, name5, name6, address1, address1a, address1b, address1c, address1d, address1e, city1, city1a, city1b, city1c, city1d, city1e, state1, state1a, state1b, state1c, state1d, state1e, zip1, zip1a, zip1b, zip1c, zip1d, zip1e, date_received, server_id, server_ida, server_idb, server_idc, server_idd, server_ide FROM ps_packets WHERE packet_id = '$packet'";
$result=@mysql_query($query);
$data=mysql_fetch_array($result,MYSQL_ASSOC);
$deadline=strtotime($data[date_received]);
$received=date('m/d/Y',$deadline);
$deadline=$deadline+432000;
$deadline=date('m/d/Y',$deadline);
?>
<style>body { margin:0px; padding:0px;}</style>
<table border="0"  style="font-size:12px;">
	<tr>
    	<td>Service Type 'B' For Packet <?=$_GET[packet]?></td>
    </tr>
	<tr>
		<td>Received: <?=$received?> || Deadline: <?=$deadline?></td>
	</tr>
<?
$header = ob_get_clean();
ob_start();
$i=0;
if ($data["address1e"]){
	$add1ex=$data["address1e"].', '.$data["city1e"].', '.$data["state1e"].' '.$data["zip1e"];
}
if ($data["address1d"]){
	$add1dx=$data["address1d"].', '.$data["city1d"].', '.$data["state1d"].' '.$data["zip1d"];
}
if ($data["address1c"]){
	$add1cx=$data["address1c"].', '.$data["city1c"].', '.$data["state1c"].' '.$data["zip1c"];
}
if ($data["address1b"]){
	$add1bx=$data["address1b"].', '.$data["city1b"].', '.$data["state1b"].' '.$data["zip1b"];
}
if ($data["address1a"]){
	$add1ax=$data["address1a"].', '.$data["city1a"].', '.$data["state1a"].' '.$data["zip1a"];
}
$add1x = $data["address1"].', '.$data["city1"].', '.$data["state1"].' '.$data["zip1"];
while ($i < 6){$i++;
	if ($data["name$i"]){
		$name=ucwords($data["name$i"]);
		$s=id2name($data[server_id]);
		if ($data[server_ida] && $data[address1a]){
			$sa=id2name($data[server_ida]);
		}else{
			$sa=id2name($data[server_id]);
		}
		if ($data[server_idb] && $data[address1b]){
			$sb=id2name($data[server_idb]);
		}else{
			$sb=id2name($data[server_id]);
		}
		if ($data[server_idc] && $data[address1c]){
			$sc=id2name($data[server_idc]);
		}else{
			$sc=id2name($data[server_id]);
		}
		if ($data[server_idd] && $data[address1d]){
			$sd=id2name($data[server_idd]);
		}else{
			$sd=id2name($data[server_id]);
		}
		if ($data[server_ide] && $data[address1e]){
			$se=id2name($data[server_ide]);
		}else{
			$se=id2name($data[server_id]);
		}
	?>
	<tr>
		<td>
		<strong><?=$name?>:</strong><br>
	<ol><li> <b><?=$s?></b>: service attempt at <?=$add1x?>.</li><br>
	<li> <b><?=$s?></b>: service attempt at <?=$add1x?>.</li><br>
	<?
		$secI["$i"]=ob_get_clean();
		ob_start();
		if ($data[address1a]){?>
			<div style="font-weight: bold;">Before any subsequent attempts are made, ensure that two service attempts have been made at <?=$add1x?> by <?=$s?>.<br></div>
			<? $secIa["$i"]=ob_get_clean();
				ob_start(); ?>
			<li> <b><?=$sa?></b>: service attempt at <?=$add1ax?>.</li><br>
			<li> <b><?=$sa?></b>: service attempt at <?=$add1ax?>.</li><br>
			<? $secA["$i"]=ob_get_clean();
				ob_start(); 
				if ($data[address1b]){ ?>
				<li> <b><?=$sb?></b>: service attempt at <?=$add1bx?>.</li><br>
				<li> <b><?=$sb?></b>: service attempt at <?=$add1bx?>.</li><br>
				<? $secB["$i"]=ob_get_clean();
					ob_start(); 
				if ($data[address1c]){ ?>
					<li> <b><?=$sc?></b>: service attempt at <?=$add1cx?>.</li><br>
					<li> <b><?=$sc?></b>: service attempt at <?=$add1cx?>.</li><br>
					<? $secC["$i"]=ob_get_clean();
						ob_start(); 
						if ($data[address1d]){ ?>
						<li> <b><?=$sd?></b>: service attempt at <?=$add1dx?>.</li><br>
						<li> <b><?=$sd?></b>: service attempt at <?=$add1dx?>.</li><br>
						<? $secD["$i"]=ob_get_clean();
							ob_start(); 
							if ($data[address1e]){ ?>
							<li> <b><?=$se?></b>: service attempt at <?=$add1ex?>.</li><br>
							<li> <b><?=$se?></b>: service attempt at <?=$add1ex?>.</li><br>
							<? $secE["$i"]=ob_get_clean();
								ob_start(); 
							} ?>
					<? } ?>
				<? } ?>
			<? } ?>
		<? } ?>
		<li> After all other attempts have proven unsuccessful, <b><?=$s?></b> is to post <?=$add1x?>.</li><br>
		<li> <b>MDWestServe</b> is to mail.</li></ol><br>
		</td></tr>
<? 		$secII["$i"]=ob_get_clean();
		ob_start();
	}
} 
?>
		<tr>
			<td><?=strtoupper($data[server_notes]);?></td>
		</tr>
</table>
<?
 $footer=ob_get_clean();
 $i=0;
echo $header;
while ($i < 6){$i++;
	if($secI["$i"]){//&& ($user == $data[server_id] || $level == 'Operations')){
		echo $secI["$i"];
	}
	if($secIa["$i"]){//&& ($user == $data[server_id] || $user == $data[server_ida] || $user == $data[server_idb] || $user == $data[server_idc] || $user == $data[server_idd] || $user == $data[server_ide] || $level == 'Operations')){
		echo $secIa["$i"];
	}
	if($secA["$i"]){//&& ($user == $data[server_ida] || $level == 'Operations')){
		echo $secA["$i"];
	}
	if($secB["$i"]){//&& ($user == $data[server_idb] || $level == 'Operations')){
		echo $secB["$i"];
	}
	if($secC["$i"]){//&& ($user == $data[server_idc] || $level == 'Operations')){
		echo $secC["$i"];
	}
	if($secD["$i"]){//&& ($user == $data[server_idd] || $level == 'Operations')){
		echo $secD["$i"];
	}
	if($secE["$i"]){//&& ($user == $data[server_ide] || $level == 'Operations')){
		echo $secE["$i"];
	}
/*	if (($user != $data[server_id]) && ($user != $data[server_ida]) && ($user != $data[server_idb]) && ($user != $data[server_idc]) && ($user != $data[server_idd]) && ($user != $data[server_ide]) && ($level != 'Operations')){
		echo "YOU ARE NOT ASSIGNED TO THIS FILE";
	}*/
	if($secII["$i"]){ //&& ($user == $data[server_id] || $user == $data[server_ida] || $user == $data[server_idb] || $user == $data[server_idc] || $user == $data[server_idd] || $user == $data[server_ide] || $level == 'Operations')){
		echo $secII["$i"];
	}
	if($footer["$i"]){
		echo $footer["$i"];
	}
}
include 'footer.php';
?>