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
$level= $_COOKIE[psdata][level];
$userName = $_COOKIE[psdata][name];
hardLog("$page: $userName viewing $packet",'mobile');
$query="SELECT name1, name2, name3, name4, name5, name6, address1, address1a, address1b, address1c, address1d, address1e, city1, city1a, city1b, city1c, city1d, city1e, state1, state1a, state1b, state1c, state1d, state1e, zip1, zip1a, zip1b, zip1c, zip1d, zip1e, date_received, server_id, server_ida, server_idb, server_idc, server_idd, server_ide FROM ps_packets WHERE packet_id = '$packet'";
$result=@mysql_query($query) or die("$query<br>".mysql_error());
$data=mysql_fetch_array($result,MYSQL_ASSOC);
$deadline=strtotime($data[date_received]);
$received=date('m/d/Y',$deadline);
$deadline=$deadline+432000;
$deadline=date('m/d/Y',$deadline);
?>
<style>body { margin:0px; padding:0px;}</style>
<table border="0" style="font-size:12px;">
	<tr>
    	<td>Service Type 'C' For Packet <?=$_GET[packet]?></td>
    </tr>
	<tr>
		<td>Received: <?=$received?> || Deadline: <?=$deadline?></td>
	</tr>
<?
$header=ob_get_clean();
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
$add1x = $data["address1"].' '.$data["city1"].', '.$data["state1"].' '.$data["zip1"];
while ($i < 6){$i++;
	if ($data["name$i"]){
$name=ucwords($data["name$i"]);
?>
<tr>
<td>
<strong><?=$name?>:</strong>
	<ul><li><b>PERFORM ALL ATTEMPTS ON SEPARATE DAYS.</b></li></ul>
	<? if ($data[address1a]){ 
		$add1ax=$data["address1a"].' '.$data["city1a"].', '.$data["state1a"].' '.$data["zip1a"];
	?>
        <? if ($data[address1b]){ 
			$add1bx=$data["address1b"].' '.$data["city1b"].', '.$data["state1b"].' '.$data["zip1b"];
		?>
				<ol><li>
				<? if ($data[address1e]){ 
					$add1ex=$data["address1e"].' '.$data["city1e"].', '.$data["state1e"].' '.$data["zip1e"];
				?>
					<?=id2name($data[server_ide])?> is to make 1 service attempt on <?=$name?> at <?=$add1ex?>.</li><li>
				<? 
					$secE["$i"] = ob_get_clean();
					ob_start();
				} ?>
				<? if ($data[address1d]){ 
					$add1dx=$data["address1d"].' '.$data["city1d"].', '.$data["state1d"].' '.$data["zip1d"];
				?>
					<?=id2name($data[server_idd])?> is to make 1 service attempt on <?=$name?> at <?=$add1dx?>.</li><li>
				<? 
					$secD["$i"] = ob_get_clean();
					ob_start();
				} ?>
				<? if ($data[address1c]){ 
					$add1cx=$data["address1c"].' '.$data["city1c"].', '.$data["state1c"].' '.$data["zip1c"];
				?>
					<?=id2name($data[server_idc])?> is to make 1 service attempt on <?=$name?> at <?=$add1cx?>.</li><li>
				<? 
					$secC["$i"] = ob_get_clean();
					ob_start();
				} ?>
				<?=id2name($data[server_idb])?> is to make 1 service attempt on <?=$name?> at <?=$add1bx?>.</li><li>
				<?  $secB["$i"] = ob_get_clean();
					ob_start(); ?>
				<?=id2name($data[server_ida])?> is to make 1 service attempt on <?=$name?> at <?=$add1ax?>.</li><li>
				<?	$secA["$i"] = ob_get_clean();
					ob_start(); ?>
				After all other attempts have proven unsuccessful, <b>and on a separate day from any other attempts,</b><br>
				If <?=id2name($data[server_ida])?> or <?=id2name($data[server_idb])?> is unable to serve <?=$name?>:<br />
				<?=id2name($data[server_id])?> is to post <?=$add1x?>.</li>
				<? $secI["$i"] = ob_get_clean();
					ob_start(); 
			}else{?>
				<ol><li><?=id2name($data[server_ida])?> is to make 2 service attempts on <?=$name?> at <?=$add1ax?> on different days.</li><li> 
				<?
					$secA["$i"] = ob_get_clean();
					ob_start();
				?>
				After all other attempts have proven unsuccessful, <b>and on a separate day from any other attempts,</b><br>
				If <?=id2name($data[server_ida])?> is unable to serve <?=$name?>:<br />
				<?=id2name($data[server_id])?> is to post <?=$add1x?>.</li>
				<?	$secI["$i"] = ob_get_clean();
					ob_start();
						}
	 }else{?>
    <ol><li><?=id2name($data[server_id])?> is to make 2 service attempts on <?=$name?> at <?=$add1x?> on different days.</li><li>
    After all other attempts have proven unsuccessful, <b>and on a separate day from any other attempts,</b><br>
	If <?=id2name($data[server_id])?> is unable to serve <?=$name?>:<br />
    <?=id2name($data[server_id])?> is to post <?=$add1x?>.</li></ol>
    <? 
		$secI["$i"] = ob_get_clean();
		ob_start();
		}?>
</ol></ol></td></tr>
<?
	}
}
?>
		<tr>
			<td><?=strtoupper($data[server_notes]);?></td>
		</tr>
</table>
<?
$footer["$i"] = ob_get_clean();
$i=0;
echo $header;
while ($i < 6){$i++;
	if($secE["$i"]){ //&& ($user == $data[server_ide] || $level == 'Operations')){
		echo $secE["$i"];
	}
	if($secD["$i"]){ //&& ($user == $data[server_idd] || $level == 'Operations')){
		echo $secD["$i"];
	}
	if($secC["$i"]){ //&& ($user == $data[server_idc] || $level == 'Operations')){
		echo $secC["$i"];
	}
	if($secB["$i"]){ //&& ($user == $data[server_idb] || $level == 'Operations')){
		echo $secB["$i"];
	}
	if($secA["$i"]){ //&& ($user == $data[server_ida] || $level == 'Operations')){
		echo $secA["$i"];
	}
	if($secI["$i"]){ //&& ($user == $data[server_id] || $level == 'Operations')){
		echo $secI["$i"];
	}
	/*if (($user != $data[server_id]) && ($user != $data[server_ida]) && ($user != $data[server_idb]) && ($user != $data[server_idc]) && ($user != $data[server_idd]) && ($user != $data[server_ide]) && ($level != 'Operations')){
		echo "YOU ARE NOT ASSIGNED TO THIS FILE";
	}*/
	if($footer["$i"]){
		echo $footer["$i"];
	}
}
include 'footer.php';
?>