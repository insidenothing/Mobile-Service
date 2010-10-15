<? $defCount=1;
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
//only allow mailing if all defendants have entries.
if (($defs == $defCount && $ddr[caseVerify] != '') || $_POST[overRide] > 0){
	if ($_POST[overRide] == 2){
		mysql_select_db ('core');
		$q10="UPDATE ps_packets SET process_status='READY TO MAIL', affidavit_status='SERVICE CONFIRMED' WHERE packet_id = '$packet'";
		$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
		psActivity("mailPrep");
		timeline($packet,$_COOKIE[psdata][name]." Ready to Mail");		?>
		Process status advanced to 'READY TO MAIL', after override.<br />
		<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="a" /> NEXT FILE</div>

		<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
		<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
	<?	}elseif ($_POST[overRide] == 1){
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
				mysql_select_db ('core');
				$q10="UPDATE ps_packets SET process_status='READY TO MAIL', affidavit_status='SERVICE CONFIRMED' WHERE packet_id = '$packet'";
				$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
				psActivity("mailPrep");
				timeline($packet,$_COOKIE[psdata][name]." Ready to Mail");	?>
				Process status advanced to 'READY TO MAIL'<br />
				<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="a" /> NEXT FILE</div>

				<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
				<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
		<?  }else{//run overRide2, describe issue
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

					<input type="hidden" name="overRideType" value="MandP2" />
					<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
					<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
			<?	}
		}else{//If another attorney, things get slightly trickier
			if ($addCount > 3){//if more than 3 addresses, we need one attempt per address per defendant
				if (($attempts >= ($defCount*$addCount)) && ($posting >= $defCount)){//break the entries down accordingly.
					//if it has the correct number of entries, then confirm.
					mysql_select_db ('core');
					$q10="UPDATE ps_packets SET process_status='READY TO MAIL', affidavit_status='SERVICE CONFIRMED' WHERE packet_id = '$packet'";
					$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
					psActivity("mailPrep");
					timeline($packet,$_COOKIE[psdata][name]." Ready to Mail");		?>
					Process status advanced to 'READY TO MAIL'<br />
					<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="a" /> NEXT FILE</div>

					<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
					<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
			<?	}else{//run overRide2, describe issue
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

					<input type="hidden" name="overRideType" value="MandP2" />
					<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
					<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
			<?	}
			}else{//if only 3 addresses, we only need two attempts per defendant
				if (($attempts >= ($defCount*2)) && ($posting >= $defCount)){//break the entries down accordingly.
					//if it has the correct number of entries, then confirm.
					mysql_select_db ('core');
					$q10="UPDATE ps_packets SET process_status='READY TO MAIL', affidavit_status='SERVICE CONFIRMED' WHERE packet_id = '$packet'";
					$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
					psActivity("mailPrep");
					timeline($packet,$_COOKIE[psdata][name]." Ready to Mail");		?>
					Process status advanced to 'READY TO MAIL'<br />
					<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="a" /> NEXT FILE</div>

					<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
					<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
					<?
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

					<input type="hidden" name="overRideType" value="MandP2" />
					<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
					<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
			<?	}
			}
		}
	}else{
		mysql_select_db ('core');
		$q10="UPDATE ps_packets SET process_status='READY TO MAIL', affidavit_status='SERVICE CONFIRMED' WHERE packet_id = '$packet'";
		$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
		psActivity("mailPrep");
		timeline($packet,$_COOKIE[psdata][name]." Ready to Mail");		?>
		Process status advanced to 'READY TO MAIL'<br />
		<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="a" /> NEXT FILE</div>

		<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
		<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
<?	}
}elseif($defs < $defCount && $ddr[caseVerify] != '' && $_POST[overRide] < 1){?>
		Packet <?=$packet?> does not have entries for all defendants.<br />
		<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="overRide" /> OVERRIDE</div>
		<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="close.1" /> RETURN TO APPROVAL LIST</div>

		<input type="hidden" name="overRideType" value="MandP" />
		<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
		<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
<?	}elseif($defs == $defCount && $ddr[caseVerify] == '' && $_POST[overRide] < 1){ ?>
		Packet <?=$packet?> does not have a verified case number.<br />
		<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="overRide" /> OVERRIDE</div>
		<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="close.1" /> RETURN TO APPROVAL LIST</div>

		<input type="hidden" name="overRideType" value="MandP" />
		<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
		<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
<? }else{ ?>
		Packet <?=$packet?> does not have entries for all defendants, and does not have a verified case number.<br />
		<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="overRide" /> OVERRIDE</div>
		<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="close.1" /> RETURN TO APPROVAL LIST</div>

		<input type="hidden" name="overRideType" value="MandP" />
		<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
		<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
<?	} ?>