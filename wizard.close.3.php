<?
mysql_select_db ('core');
$defCount=1;
if ($ddr[name2]){ $defCount++;}
if ($ddr[name3]){ $defCount++;}
if ($ddr[name4]){ $defCount++;}
if ($ddr[name5]){ $defCount++;}
if ($ddr[name6]){ $defCount++;}
$addCount=1;
if ($ddr[address1a]){ $addCount++;}
if ($ddr[address1b]){ $addCount++;}
if ($ddr[address1c]){ $addCount++;}
if ($ddr[address1d]){ $addCount++;}
if ($ddr[address1e]){ $addCount++;}
if ($ddr[pobox]){ $addCount++;}
$q10="SELECT DISTINCT defendant_id FROM ps_history WHERE packet_id='$packet'";
$r10=mysql_query($q10) or die("Query: $q10<br>".mysql_error());
$defs=mysql_num_rows($r10);
//only allow confirmation if all defendants have entries.
if (($defs >= $defCount) || $_POST[overRide] > 0){
	if($_POST[overRide] == 2){//if overRide is set to 2, then run update query, send email, etc.
		include 'wizard.close.3a.php';
	}elseif($_POST[overRide] == 1){
		//time to break down the affidavits for the appropriate entries.
		if ($ddr[service_status] == 'PERSONAL DELIVERY'){
			$q10="SELECT DISTINCT history_id FROM ps_history WHERE packet_id='$packet' AND (action_type='Served Resident' OR action_type='Served Defendant'";
			$r10=mysql_query($q10) or die("Query: $q10<br>".mysql_error());
			$pd=mysql_num_rows($r10);
			include 'wizard.close.3a.php';//run the update, send the email, etc.
		}elseif ($ddr[service_status] == 'MAILING AND POSTING'){
			$postingServer=$ddr[server_id];
			$q10="SELECT DISTINCT history_id FROM ps_history WHERE packet_id='$packet' AND action_type='Attempted Service'";
			$r10=mysql_query($q10) or die("Query: $q10<br>".mysql_error());
			$attempts=mysql_num_rows($r10);
			$q11="SELECT DISTINCT history_id FROM ps_history WHERE packet_id='$packet' AND action_type='Posted Papers' AND serverID='$postingServer'";
			$r11=mysql_query($q11) or die("Query: $q11<br>".mysql_error());
			$posting=mysql_num_rows($r11);
			if ($ddr[attorneys_id] == 1){
				if (($attempts >= ($addCount*$defCount*2)) && ($posting >= $defCount)){//break the entries down accordingly.
					//if it has the correct number of entries, then confirm.
					include 'wizard.close.3a.php';
				}else{//run overRide2, describe issue
					if ($attempts < ($addCount*$defCount*2)){
						$error="HAS FEWER ATTEMPTS THAN REQUIRED.";
					}
					if ($posting < $defCount){
						$error="HAS FEWER POSTING ENTRIES THAN REQUIRED.";
					}
				?>
					Packet <?=$packet?> <?=$error?>.<br />
					<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="overRide" /> OVERRIDE</div>
					<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="close.1" /> RETURN TO APPROVAL LIST</div>

					<input type="hidden" name="overRideType" value="final2" />
					<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
					<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
			<?	}
			}else{//If another attorney, things get slightly trickier
				if ($addCount > 3){//if more than 3 addresses, we need one attempt per address per defendant
					if (($attempts >= ($defCount*$addCount)) && ($posting >= $defCount)){//break the entries down accordingly.
						//if it has the correct number of entries, then confirm.
						include 'wizard.close.3a.php';
					}else{//run overRide2, describe issue
						if ($attempts < ($defCount*$addCount)){
							$error="HAS FEWER ATTEMPTS THAN REQUIRED.";
						}
						if ($posting < $defCount){
							$error="HAS FEWER POSTING ENTRIES THAN REQUIRED.";
						}
					?>
						Packet <?=$packet?> <?=$error?>.<br />
						<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="overRide" /> OVERRIDE</div>
						<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="close.1" /> RETURN TO APPROVAL LIST</div>

						<input type="hidden" name="overRideType" value="final2" />
						<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
						<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
				<?	}
				}else{//if only 3 addresses, we only need two attempts per defendant
					if (($attempts >= ($defCount*2)) && ($posting >= $defCount)){//break the entries down accordingly.
						//if it has the correct number of entries, then confirm.
						include 'wizard.close.3a.php';
					}else{//run overRide2, describe issue
						if ($attempts < ($defCount*2)){
							$error="HAS FEWER ATTEMPTS THAN REQUIRED.";
						}
						if ($posting < $defCount){
							$error="HAS FEWER POSTING ENTRIES THAN REQUIRED.";
						}
					?>
						Packet <?=$packet?> <?=$error?>.<br />
						<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="overRide" /> OVERRIDE</div>
						<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="close.1" /> RETURN TO APPROVAL LIST</div>

						<input type="hidden" name="overRideType" value="final2" />
						<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
						<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
				<?	}
				}
			}
		}else{//Echo Service Status, then redirect to wizard.overRide to set $_POST[overRide]=2
			$error="Has a Service Status of $ddr[service_status]";
		?>
			Packet <?=$packet?> <?=$error?>.<br />
			<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="overRide" /> OVERRIDE</div>
			<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="close.1" /> RETURN TO APPROVAL LIST</div>

			<input type="hidden" name="overRideType" value="final2" />
			<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
			<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
	<?	}
	}else{
		include 'wizard.close.3a.php';
	}
}elseif($defs < $defCount && $_POST[overRide] < 1){ ?>
Packet <?=$packet?> does not have entries for all defendants.<br />
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="overRide" /> OVERRIDE</div>
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="close.1" /> RETURN TO APPROVAL LIST</div>

<input type="hidden" name="overRideType" value="final" />
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
<? }
if ($_POST[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_POST[mailDate]?>">
<? } ?>
<? if ($_GET[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_GET[mailDate]?>">
<? } ?>