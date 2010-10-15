<?
//first we need to generate all mailing entries if file is M&P.

if ($ddr[service_status] == "MAILING AND POSTING"){
	if ($_GET[mailDate]){
		$mailDate=$_GET[mailDate];
	}elseif($_POST[mailDate]){
		$mailDate=$_POST[mailDate];
	}else{
		$mailDate=$date=date('Y-m-d');
	}
	timeline($packet,$_COOKIE[psdata][name]." Confirmed Mail Sent");

	psActivity("mailSent");
	if ($_POST[opServer] != ''){
		$entryID=$_POST[opServer];
	}else{
		$entryID=$_COOKIE[psdata][user_id];
	}
	mysql_select_db ('core');
	@mysql_query("update ps_packets set closeOut = '$mailDate', gcStatus='MAILED', mail_status = 'Mailed First Class and Certified Return Receipt', process_status='READY TO MAIL', affidavit_status='SERVICE CONFIRMED' where packet_id = '".$packet."' ");
	mkAlert('SERVICE CONFIRMED',$entryID,'ALL',$packet);
	$_SESSION[querycount]++;
	
	$q="select * from ps_packets where packet_id = '".$packet."'";
	$r=@mysql_query($q) or die ("Query $q<br>".mysql_error());
	$d=mysql_fetch_array($r, MYSQL_ASSOC);
	$co=explode('-',$mailDate);
	$month=monthConvert($co[1]);
	$closeOut=$month.' '.$co[2].', '.$co[0];
	$date=$closeOut;
	if (!$date){
		$date=$mailDate;
	}
	if ($_POST[opServer] != ''){
		$name=id2name($_POST[opServer]);
	}else{
		$name=$_COOKIE[psdata][name];
	}
	mysql_select_db ('core');
	if ($d[name1]){
		if ($d[address1]){
			$action="<li>I, $name, Mailed Papers to $d[name1] at $d[address1], $d[city1], $d[state1] $d[zip1] \'Residential Property Subject to Mortgage or Deed of Trust\' by certified mail, return receipt requested, and by first class mail on $date.</li>";	
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '1', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address1a]){
			$action="<li>I, $name, Mailed Papers to $d[name1] at $d[address1a], $d[city1a], $d[state1a] $d[zip1a] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";	
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '1', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address1b]){
			$action="<li>I, $name, Mailed Papers to $d[name1] at $d[address1b], $d[city1b], $d[state1b] $d[zip1b] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '1', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address1c]){
			$action="<li>I, $name, Mailed Papers to $d[name1] at $d[address1c], $d[city1c], $d[state1c] $d[zip1c] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '1', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address1d]){
			$action="<li>I, $name, Mailed Papers to $d[name1] at $d[address1d], $d[city1d], $d[state1d] $d[zip1d] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '1', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address1e]){
			$action="<li>I, $name, Mailed Papers to $d[name1] at $d[address1e], $d[city1e], $d[state1e] $d[zip1e] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '1', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
				if ($d[pobox]){
					if((strpos(strtoupper($d['pobox']),'P.O. BOX') != 'false') || (strpos(strtoupper($d['pobox']),'PO BOX')) != 'false'){			
					$action="<li>I, $name, Mailed Papers to $d[name1] at $d[pobox], $d[pocity], $d[postate] $d[pozip] \'P.O. Box Address\' by first class mail on $date.</li>";		
			
					}else{
			$action="<li>I, $name, Mailed Papers to $d[name1] at $d[pobox], $d[pocity], $d[postate] $d[pozip] \'Mailing Only Address\' by certified mail, return receipt requested, and by first class mail on $date.</li>";

					}
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '1', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
	}	
	if ($d[name2]){ 
		if ($d[address2]){
			$action="<li>I, $name, Mailed Papers to $d[name2] at $d[address2], $d[city2], $d[state2] $d[zip2] \'Residential Property Subject to Mortgage or Deed of Trust\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '2', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address2a]){
			$action="<li>I, $name, Mailed Papers to $d[name2] at $d[address2a], $d[city2a], $d[state2a] $d[zip2a] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";	
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '2', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address2b]){
			$action="<li>I, $name, Mailed Papers to $d[name2] at $d[address2b], $d[city2b], $d[state2b] $d[zip2b] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";	
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '2', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address2c]){
			$action="<li>I, $name, Mailed Papers to $d[name2] at $d[address2c], $d[city2c], $d[state2c] $d[zip2c] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '2', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address2d]){
			$action="<li>I, $name, Mailed Papers to $d[name2] at $d[address2d], $d[city2d], $d[state2d] $d[zip2d] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '2', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address2e]){
			$action="<li>I, $name, Mailed Papers to $d[name2] at $d[address2e], $d[city2e], $d[state2e] $d[zip2e] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '2', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
				if ($d[pobox]){
					if((strpos(strtoupper($d['pobox']),'P.O. BOX') != 'false') || (strpos(strtoupper($d['pobox']),'PO BOX')) != 'false'){			$action="<li>I, $name, Mailed Papers to $d[name2] at $d[pobox], $d[pocity], $d[postate] $d[pozip] \'P.O. Box Address\' by first class mail on $date.</li>";					

					}else{
			$action="<li>I, $name, Mailed Papers to $d[name2] at $d[pobox], $d[pocity], $d[postate] $d[pozip] \'Mailing Only Address\' by certified mail, return receipt requested, and by first class mail on $date.</li>";

					}
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '2', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
	}	
	if ($d[name3]){ 
			if ($d[address3]){
			$action="<li>I, $name, Mailed Papers to $d[name3] at $d[address3], $d[city3], $d[state3] $d[zip3] \'Residential Property Subject to Mortgage or Deed of Trust\' by certified mail, return receipt requested, and by first class mail on $date.</li>";	
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '3', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address3a]){
			$action="<li>I, $name, Mailed Papers to $d[name3] at $d[address3a], $d[city3a], $d[state3a] $d[zip3a] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";	
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '3', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address3b]){
			$action="<li>I, $name, Mailed Papers to $d[name3] at $d[address3b], $d[city3b], $d[state3b] $d[zip3b] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '3', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address3c]){
			$action="<li>I, $name, Mailed Papers to $d[name3] at $d[address3c], $d[city3c], $d[state3c] $d[zip3c] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '3', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address3d]){
			$action="<li>I, $name, Mailed Papers to $d[name3] at $d[address3d], $d[city3d], $d[state3d] $d[zip3d] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '3', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address3e]){
			$action="<li>I, $name, Mailed Papers to $d[name3] at $d[address3e], $d[city3e], $d[state3e] $d[zip3e] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '3', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
				if ($d[pobox]){
					if((strpos(strtoupper($d['pobox']),'P.O. BOX') != 'false') || (strpos(strtoupper($d['pobox']),'PO BOX')) != 'false'){			$action="<li>I, $name, Mailed Papers to $d[name3] at $d[pobox], $d[pocity], $d[postate] $d[pozip] \'P.O. Box Address\' by first class mail on $date.</li>";		

					}else{
			$action="<li>I, $name, Mailed Papers to $d[name3] at $d[pobox], $d[pocity], $d[postate] $d[pozip] \'Mailing Only Address\' by certified mail, return receipt requested, and by first class mail on $date.</li>";

					}
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '3', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
	}	
	if ($d[name4]){ 
			if ($d[address4]){
			$action="<li>I, $name, Mailed Papers to $d[name4] at $d[address4], $d[city4], $d[state4] $d[zip4] \'Residential Property Subject to Mortgage or Deed of Trust\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '4', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address4a]){
			$action="<li>I, $name, Mailed Papers to $d[name4] at $d[address4a], $d[city4a], $d[state4a] $d[zip4a] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '4', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address4b]){
			$action="<li>I, $name, Mailed Papers to $d[name4] at $d[address4b], $d[city4b], $d[state4b] $d[zip4b] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";	
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '4', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address4c]){
			$action="<li>I, $name, Mailed Papers to $d[name4] at $d[address4c], $d[city4c], $d[state4c] $d[zip4c] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '4', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address4d]){
			$action="<li>I, $name, Mailed Papers to $d[name4] at $d[address4d], $d[city4d], $d[state4d] $d[zip4d] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '4', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address4e]){
			$action="<li>I, $name, Mailed Papers to $d[name4] at $d[address4e], $d[city4e], $d[state4e] $d[zip4e] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '4', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
				if ($d[pobox]){
					if((strpos(strtoupper($d['pobox']),'P.O. BOX') != 'false') || (strpos(strtoupper($d['pobox']),'PO BOX')) != 'false'){			$action="<li>I, $name, Mailed Papers to $d[name4] at $d[pobox], $d[pocity], $d[postate] $d[pozip] \'P.O. Box Address\' by first class mail on $date.</li>";				
	
					}else{
			$action="<li>I, $name, Mailed Papers to $d[name4] at $d[pobox], $d[pocity], $d[postate] $d[pozip] \'Mailing Only Address\' by certified mail, return receipt requested, and by first class mail on $date.</li>";

					}
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '4', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
	}	
	if ($d[name5]){ 
			if ($d[address5]){
			$action="<li>I, $name, Mailed Papers to $d[name5] at $d[address5], $d[city5], $d[state5] $d[zip5] \'Residential Property Subject to Mortgage or Deed of Trust\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '5', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address5a]){
			$action="<li>I, $name, Mailed Papers to $d[name5] at $d[address5a], $d[city5a], $d[state5a] $d[zip5a] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '5', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address5b]){
			$action="<li>I, $name, Mailed Papers to $d[name5] at $d[address5b], $d[city5b], $d[state5b] $d[zip5b] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";	
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '5', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address5c]){
			$action="<li>I, $name, Mailed Papers to $d[name5] at $d[address5c], $d[city5c], $d[state5c] $d[zip5c] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '5', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address5d]){
			$action="<li>I, $name, Mailed Papers to $d[name5] at $d[address5d], $d[city5d], $d[state5d] $d[zip5d] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '5', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address5e]){
			$action="<li>I, $name, Mailed Papers to $d[name5] at $d[address5e], $d[city5e], $d[state5e] $d[zip5e] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '5', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
				if ($d[pobox]){
					if((strpos(strtoupper($d['pobox']),'P.O. BOX') != 'false') || (strpos(strtoupper($d['pobox']),'PO BOX')) != 'false'){			$action="<li>I, $name, Mailed Papers to $d[name5] at $d[pobox], $d[pocity], $d[postate] $d[pozip] \'P.O. Box Address\' by first class mail on $date.</li>";					

					}else{
			$action="<li>I, $name, Mailed Papers to $d[name5] at $d[pobox], $d[pocity], $d[postate] $d[pozip] \'Mailing Only Address\' by certified mail, return receipt requested, and by first class mail on $date.</li>";

					}
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '5', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
	}
	if ($d[name6]){ 
			if ($d[address6]){
			$action="<li>I, $name, Mailed Papers to $d[name6] at $d[address6], $d[city6], $d[state6] $d[zip6] \'Residential Property Subject to Mortgage or Deed of Trust\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '6', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address6a]){
			$action="<li>I, $name, Mailed Papers to $d[name6] at $d[address6a], $d[city6a], $d[state6a] $d[zip6a] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '6', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address6b]){
			$action="<li>I, $name, Mailed Papers to $d[name6] at $d[address6b], $d[city6b], $d[state6b] $d[zip6b] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";	
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '6', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address6c]){
			$action="<li>I, $name, Mailed Papers to $d[name6] at $d[address6c], $d[city6c], $d[state6c] $d[zip6c] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '6', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address6d]){
			$action="<li>I, $name, Mailed Papers to $d[name6] at $d[address6d], $d[city6d], $d[state6d] $d[zip6d] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '6', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
		if ($d[address6e]){
			$action="<li>I, $name, Mailed Papers to $d[name6] at $d[address6e], $d[city6e], $d[state6e] $d[zip6e] \'Possible Place of Abode\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '6', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
				if ($d[pobox]){
					if((strpos(strtoupper($d['pobox']),'P.O. BOX') != 'false') || (strpos(strtoupper($d['pobox']),'PO BOX')) != 'false'){			$action="<li>I, $name, Mailed Papers to $d[name6] at $d[pobox], $d[pocity], $d[postate] $d[pozip] \'P.O. Box Address\' by first class mail on $date.</li>";				
	
					}else{
			$action="<li>I, $name, Mailed Papers to $d[name6] at $d[pobox], $d[pocity], $d[postate] $d[pozip] \'Mailing Only Address\' by certified mail, return receipt requested, and by first class mail on $date.</li>";
					}
			$action=strtoupper($action);
			@mysql_query("INSERT into ps_history (packet_id, defendant_id, action_type, action_str, serverID, recordDate, wizard )values('".$packet."', '6', 'First Class C.R.R. Mailing', '".addslashes($action)."', '".$entryID."', NOW(), 'MAILING DETAILS' )");$_SESSION[querycount]++; 
		}
	}
	$href="http://mdwestserve.com/ps/obAffidavit.php?packet=$packet&mail=1&autoPrint=1";
	echo "<script>window.open('".$href."', 'Mailing Affidavits')</script>";
}

// make links to affidavits
$file1 = "http://mdwestserve.com/ps/liveAffidavit.php?packet=$packet&def=1";
$file2 = "http://mdwestserve.com/ps/liveAffidavit.php?packet=$packet&def=2"; 
$file3 = "http://mdwestserve.com/ps/liveAffidavit.php?packet=$packet&def=3";
$file4 = "http://mdwestserve.com/ps/liveAffidavit.php?packet=$packet&def=4";
// generate all invoices
?>
<table>
<tr><td><iframe frameborder="0" src="http://mdwestserve.com/ps/ps_write_invoice.php?id=<?=$packet?>" width="600" height="30"></iframe></td></tr>
</table>
<?

// email client invoice
$to = "MDWestServe Archive <mdwestserve@gmail.com>";
$subject = "Service Completed for Packet $packet ($ddr[client_file])";
$headers  = "MIME-Version: 1.0 \n";
$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
$headers .= "From: Service Complete <service.complete@mdwestserve.com> \n";

mysql_select_db ('ccdb');
$attR = @mysql_query("select ps_to_alt from attorneys where attorneys_id = '$ddr[attorneys_id]'");
$attD = mysql_fetch_array($attR, MYSQL_BOTH);
mysql_select_db ('core');
$c=0;
$cc = explode(',',$attD[ps_to_alt]);
$ccC = count($cc);
while ($c < $ccC){
$headers .= "Cc: ".$cc[$c]."\n";
$c++;
}
$fname = id2attorney($ddr["attorneys_id"]).'/'.$filename;
if ($ddr[closeOut] != '0000-00-00'){
	$co=explode('-',$ddr[closeOut]);
	$month=monthConvert($co[1]);
	$closeOut=$month.' '.$co[2].', '.$co[0];
	$body ="<strong>Thank you for selecting MDWestServe as Your Process Service Provider.</strong><br>
Service for packet $packet (<strong>$ddr[client_file]</strong>) was completed on $closeOut.";
}else{
	$q10a="SELECT action_str, action_type from ps_history WHERE packet_id='$packet' AND (wizard='BORROWER' OR wizard='NOT BORROWER')";
	$r10a=@mysql_query($q10a) or die(mysql_error());
	//also Invalid Address entries
	$q10b="SELECT action_str, action_type from ps_history WHERE packet_id='$packet' AND (wizard='INVALID')";
	$r10b=@mysql_query($q10b) or die(mysql_error());
	
	$serviceDate='';
	$serviceDates='';
	while ($d10a=mysql_fetch_array($r10a, MYSQL_ASSOC)){
		$serviceDate=explode('DATE OF SERVICE',$d10a[action_str]);
		$serviceDates .= $d10a[action_type].' - '.$serviceDate[1];
	}
	while ($d10b=mysql_fetch_array($r10b, MYSQL_ASSOC)){
		$dateStr=explode('WITH NO RESULTS, ON ',$d10b[action_str]);
		$serviceDate=str_replace('.</LI>','',$dateStr[1]);
		if ($serviceDates == ''){
			$serviceDates = $d10b[action_type].' - '.$serviceDate;
		}else{
			$serviceDates .= '<br>'.$d10b[action_type].' - '.$serviceDate;
		}
	}
	if ($serviceDates != ''){
		$body ="<strong>Thank you for selecting MDWestServe as Your Process Service Provider.</strong><br>
Service for packet $packet (<strong>$ddr[client_file]</strong>) is complete.  
As this document predates our latest system of affidavit entry, there is no standardized method of telling on which date service was completed.  
To better facilitate the coordinating of auctions and post-service processing, we have included a list of all service actions and the dates on which they occurred:<br><br>$serviceDates";
	}else{
		$body ="<strong>Thank you for selecting MDWestServe as Your Process Service Provider.</strong><br>
Service for packet $packet (<strong>$ddr[client_file]</strong>) is complete.";
	}
}
$body .= "<br><br><br><br>".$_COOKIE[psdata][name]."<br>MDWestServe<br>Harvey West Auctioneers<br>".time()."<br>".md5(time());
$headers .= "Cc: MDWestServe Archive <mdwestserve@gmail.com> \n";
mail($to,$subject,$body,$headers);
psActivity("serviceConfirmed");
timeline($packet,$_COOKIE[psdata][name]." Confirmed Service");
mysql_select_db ('core');
if ($ddr[service_status] == "MAILING AND POSTING"){
	
}else{
		if ($_POST[opServer] != ''){
		$entryID=$_POST[opServer];
	}else{
		$entryID=$_COOKIE[psdata][user_id];
	}
	mysql_select_db ('core');
	mkAlert('SERVICE CONFIRMED',$entryID,'ALL',$packet);
	$q10="UPDATE ps_packets SET process_status='SERVICE COMPLETED', affidavit_status='SERVICE CONFIRMED' WHERE packet_id = '$packet'";
	$r10=@mysql_query($q10) or die ("Query: $q10<br>".mysql_error());
}
?>
Affidavit confirmed.<br />
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="a" /> NEXT FILE</div>
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
<input type="hidden" name="parts" value="<?=$_POST[parts]?>">
