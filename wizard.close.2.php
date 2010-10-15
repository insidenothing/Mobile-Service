<?
$user = $_COOKIE[psdata][user_id];
$q11="SELECT needSignatory from ps_users where id='$user'";
$r11=@mysql_query($q11) or die ("Query: $q11<br>".mysql_error());
$d11=mysql_fetch_array($r11, MYSQL_ASSOC);
if ($d11[needSignatory] == "checked"){
	$q10="SELECT * FROM ps_signatory WHERE packetID='$packet' and serverID='$user'";
	$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
	if ($d10=mysql_fetch_array($r10, MYSQL_ASSOC)){
		mkAlert('REQUESTING CLOSE',$user,$user,$packet);
		psActivity("serviceCompleted");

		$user = $_COOKIE[psdata][user_id];
		timeline($packet,$_COOKIE[psdata][name]." Completing Service");

			//update status
		echo "Checking server slot 1...<br>";
		if ($user == $ddr[server_id]){
			$q10="UPDATE ps_packets SET request_close='YES' WHERE packet_id = '$packet'";
			$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
			echo "Found!, Print Approval Request Sent...<br>";
		} elseif ($user != $ddr[server_ida] || $user != $ddr[server_idb]) {
		echo "You are not in server slot 1 for this file.<br>";
		}
		echo "Checking server slot 2...<br>";
		if($user == $ddr[server_ida]){
			$q10="UPDATE ps_packets SET request_closea='YES' WHERE packet_id = '$packet'";
			$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
			echo "Found!, Print Approval Request Sent...<br>";
		} elseif ($user != $ddr[server_id] || $user != $ddr[server_idb]) {
		echo "You are not in server slot 2 for this file.<br>";
		}
		echo "Checking server slot 3...<br>";
		if($user == $ddr[server_idb]){
			$q10="UPDATE ps_packets SET request_closeb='YES' WHERE packet_id = '$packet'";
			$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
			echo "Found!, Print Approval Request Sent...<br>";
		} elseif ($user != $ddr[server_id] || $user != $ddr[server_ida]) {
		echo "You are not in server slot 3 for this file.<br>";
		}
		echo "Checking server slot 4...<br>";
		if($user == $ddr[server_idc]){
			$q10="UPDATE ps_packets SET request_closec='YES' WHERE packet_id = '$packet'";
			$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
			echo "Found!, Print Approval Request Sent...<br>";
		} else{
		echo "You are not in server slot 4 for this file.<br>";
		}
		echo "Checking server slot 5...<br>";
		if($user == $ddr[server_idd]){
			$q10="UPDATE ps_packets SET request_closed='YES' WHERE packet_id = '$packet'";
			$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
			echo "Found!, Print Approval Request Sent...<br>";
		} else{
		echo "You are not in server slot 5 for this file.<br>";
		}
		echo "Checking server slot 6...<br>";
		if($user == $ddr[server_ide]){
			$q10="UPDATE ps_packets SET request_closee='YES' WHERE packet_id = '$packet'";
			$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
			echo "Found!, Print Approval Request Sent...<br>";
		} else{
		echo "You are not in server slot 6 for this file.<br>";
		}
		?>
	<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="a" /> NEXT FILE</div>

	<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
	<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
	<?
	}else{
		echo "You must enter a different signatory before you can request service print approval for this file.";
			?>
	<div class="nav"><input onClick="submitLoader()" type="radio" name="service_type" value="CHANGE SIGNATORY" /> CHANGE SIGNATORY</div>

	<input type="hidden" name="i" value="2">
	<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
	<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
	<?
	}

}else{
psActivity("serviceCompleted");

	$user = $_COOKIE[psdata][user_id];
	timeline($packet,$_COOKIE[psdata][name]." Completing Service");

		//update status
	echo "Checking server slot 1...<br>";
	if ($user == $ddr[server_id]){
		$q10="UPDATE ps_packets SET request_close='YES' WHERE packet_id = '$packet'";
		$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
		echo "Found!, Print Approval Request Sent...<br>";
	} elseif ($user != $ddr[server_ida] || $user != $ddr[server_idb]) {
	echo "You are not in server slot 1 for this file.<br>";
	}
	echo "Checking server slot 2...<br>";
	if($user == $ddr[server_ida]){
		$q10="UPDATE ps_packets SET request_closea='YES' WHERE packet_id = '$packet'";
		$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
		echo "Found!, Print Approval Request Sent...<br>";
	} elseif ($user != $ddr[server_id] || $user != $ddr[server_idb]) {
	echo "You are not in server slot 2 for this file.<br>";
	}
	echo "Checking server slot 3...<br>";
	if($user == $ddr[server_idb]){
		$q10="UPDATE ps_packets SET request_closeb='YES' WHERE packet_id = '$packet'";
		$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
		echo "Found!, Print Approval Request Sent...<br>";
	} elseif ($user != $ddr[server_id] || $user != $ddr[server_ida]) {
	echo "You are not in server slot 3 for this file.<br>";
	}
	echo "Checking server slot 4...<br>";
	if($user == $ddr[server_idc]){
		$q10="UPDATE ps_packets SET request_closec='YES' WHERE packet_id = '$packet'";
		$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
		echo "Found!, Print Approval Request Sent...<br>";
	} else{
	echo "You are not in server slot 4 for this file.<br>";
	}
	echo "Checking server slot 5...<br>";
	if($user == $ddr[server_idd]){
		$q10="UPDATE ps_packets SET request_closed='YES' WHERE packet_id = '$packet'";
		$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
		echo "Found!, Print Approval Request Sent...<br>";
	} else{
	echo "You are not in server slot 5 for this file.<br>";
	}
	echo "Checking server slot 6...<br>";
	if($user == $ddr[server_ide]){
		$q10="UPDATE ps_packets SET request_closee='YES' WHERE packet_id = '$packet'";
		$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
		echo "Found!, Print Approval Request Sent...<br>";
	} else{
	echo "You are not in server slot 6 for this file.<br>";
	}
?>
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="a" /> NEXT FILE</div>

<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
<? } ?>
<? if ($_POST[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_POST[mailDate]?>">
<? } ?>
<? if ($_GET[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_GET[mailDate]?>">
<? } ?>