<?
///
/// added just for wizard
///
function initals($str){
	$str = explode(' ',$str);
	return strtoupper(substr($str[0],0,1).substr($str[1],0,1).substr($str[2],0,1).substr($str[3],0,1));
}
function id2attorney($id){
	$q="SELECT display_name FROM attorneys WHERE attorneys_id = '$id'";
	$r=@mysql_query($q);
	$d=mysql_fetch_array($r, MYSQL_ASSOC);
return $d[display_name];
}
function alpha2desc($alpha){
	if ($alpha == 'a'){ return "FIRST DOT ATTEMPT"; }
	if ($alpha == 'b'){ return "SECOND DOT ATTEMPT"; }
	if ($alpha == 'c'){ return "POSTED DOT PROPERTY"; }
	if ($alpha == 'd'){ return "FIRST LKA ATTEMPT"; }
	if ($alpha == 'e'){ return "SECOND LKA ATTEMPT"; }
	if ($alpha == 'f'){ return "FIRST ALT ATTEMPT"; }
	if ($alpha == 'g'){ return "SECOND ALT ATTEMPT"; }
	if ($alpha == 'h'){ return "FIRST ALT ATTEMPT"; }
	if ($alpha == 'i'){ return "SECOND ALT ATTEMPT"; }
	if ($alpha == 'j'){ return "FIRST ALT ATTEMPT"; }
	if ($alpha == 'k'){ return "SECOND ALT ATTEMPT"; }
	if ($alpha == 'l'){ return "FIRST ALT ATTEMPT"; }
	if ($alpha == 'm'){ return "SECOND ALT ATTEMPT"; }
}
function photoAddress($packet,$defendant,$alpha){
	$r=@mysql_query("SELECT * from ps_packets where packet_id = '$packet'");
	$d=mysql_fetch_array($r, MYSQL_ASSOC);
	if ($alpha == "a" || $alpha == "b"|| $alpha == "c"){
		if ($d["address$defendant"]){
			return $d["address$defendant"].", ".$d["state$defendant"];
		}
	}
	if ($alpha == "d" || $alpha == "e"){
		if ($d["address$defendant"."a"]){
			return $d["address$defendant"."a"].", ".$d["state$defendant"."a"];
		}
	}
	if ($alpha == "f" || $alpha == "g"){
		if ($d["address$defendant"."b"]){
			return $d["address$defendant"."b"].", ".$d["state$defendant"."b"];
		}
	}
	if ($alpha == "h" || $alpha == "i"){
		if ($d["address$defendant"."c"]){
			return $d["address$defendant"."c"].", ".$d["state$defendant"."c"];
		}
	}
	if ($alpha == "j" || $alpha == "k"){
		if ($d["address$defendant"."d"]){
			return $d["address$defendant"."d"].", ".$d["state$defendant"."d"];
		}
	}
	if ($alpha == "l" || $alpha == "m"){
		if ($d["address$defendant"."e"]){
			return $d["address$defendant"."e"].", ".$d["state$defendant"."e"];
		}
	}
}

function servers($current){
	$q= "select * from ps_users where level='Gold Member' OR level = 'Operations' order by level DESC, name ";
	$r=@mysql_query($q);
	if ($current){
	$option .= "<option value='$current'>*Operations Recording ".strtoupper(id2name($_COOKIE[psdata][user_id]))." as ".strtoupper(id2name($current))."</option>";
	}else{
	$option .= "<option value='$current'>+++ NO SERVER SELECTED FOR RECORDING +++</option>";
	}
	while ($d=mysql_fetch_array($r, MYSQL_ASSOC)) {
	   		$option .= "<option value='$d[id]' style='font-style:italic'>Switch to $d[name]</option>";
	} 
	return $option;
}

function mkmonth($keep){
	//if (!$keep){$keep = date('M');}
	$opt = "<option selected value='$keep'>$keep</option>";
	$opt .= "<option value='01'>1</option>";
	$opt .= "<option value='02'>2</option>";
	$opt .= "<option value='03'>3</option>";
	$opt .= "<option value='04'>4</option>";
	$opt .= "<option value='05'>5</option>";
	$opt .= "<option value='06'>6</option>";
	$opt .= "<option value='07'>7</option>";
	$opt .= "<option value='08'>8</option>";
	$opt .= "<option value='09'>9</option>";
	$opt .= "<option value='10'>10</option>";
	$opt .= "<option value='11'>11</option>";
	$opt .= "<option value='12'>12</option>";
	return $opt;
}
function mkday($keep){
	$opt = "<option selected value='$keep'>$keep</option>";
	$opt .= "<option value='01'>1</option>";
	$opt .= "<option value='02'>2</option>";
	$opt .= "<option value='03'>3</option>";
	$opt .= "<option value='04'>4</option>";
	$opt .= "<option value='05'>5</option>";
	$opt .= "<option value='06'>6</option>";
	$opt .= "<option value='07'>7</option>";
	$opt .= "<option value='08'>8</option>";
	$opt .= "<option value='09'>9</option>";
	$opt .= "<option value='10'>10</option>";
	$opt .= "<option value='11'>11</option>";
	$opt .= "<option value='12'>12</option>";
	$opt .= "<option value='13'>13</option>";
	$opt .= "<option value='14'>14</option>";
	$opt .= "<option value='15'>15</option>";
	$opt .= "<option value='16'>16</option>";
	$opt .= "<option value='17'>17</option>";
	$opt .= "<option value='18'>18</option>";
	$opt .= "<option value='19'>19</option>";
	$opt .= "<option value='20'>20</option>";
	$opt .= "<option value='21'>21</option>";
	$opt .= "<option value='22'>22</option>";
	$opt .= "<option value='23'>23</option>";
	$opt .= "<option value='24'>24</option>";
	$opt .= "<option value='25'>25</option>";
	$opt .= "<option value='26'>26</option>";
	$opt .= "<option value='27'>27</option>";
	$opt .= "<option value='28'>28</option>";
	$opt .= "<option value='29'>29</option>";
	$opt .= "<option value='30'>30</option>";
	$opt .= "<option value='31'>31</option>";
	return $opt;
}
function mkminute($keep){
	$opt = "<option selected value='$keep'>$keep</option>";
	$opt .= "<option value='00'>00</option>";
	$opt .= "<option value='01'>01</option>";
	$opt .= "<option value='02'>02</option>";
	$opt .= "<option value='03'>03</option>";
	$opt .= "<option value='04'>04</option>";
	$opt .= "<option value='05'>05</option>";
	$opt .= "<option value='06'>06</option>";
	$opt .= "<option value='07'>07</option>";
	$opt .= "<option value='08'>08</option>";
	$opt .= "<option value='09'>09</option>";
	$opt .= "<option value='10'>10</option>";
	$opt .= "<option value='11'>11</option>";
	$opt .= "<option value='12'>12</option>";
	$opt .= "<option value='13'>13</option>";
	$opt .= "<option value='14'>14</option>";
	$opt .= "<option value='15'>15</option>";
	$opt .= "<option value='16'>16</option>";
	$opt .= "<option value='17'>17</option>";
	$opt .= "<option value='18'>18</option>";
	$opt .= "<option value='19'>19</option>";
	$opt .= "<option value='20'>20</option>";
	$opt .= "<option value='21'>21</option>";
	$opt .= "<option value='22'>22</option>";
	$opt .= "<option value='23'>23</option>";
	$opt .= "<option value='24'>24</option>";
	$opt .= "<option value='25'>25</option>";
	$opt .= "<option value='26'>26</option>";
	$opt .= "<option value='27'>27</option>";
	$opt .= "<option value='28'>28</option>";
	$opt .= "<option value='29'>29</option>";
	$opt .= "<option value='30'>30</option>";
	$opt .= "<option value='31'>31</option>";
	$opt .= "<option value='32'>32</option>";
	$opt .= "<option value='33'>33</option>";
	$opt .= "<option value='34'>34</option>";
	$opt .= "<option value='35'>35</option>";
	$opt .= "<option value='36'>36</option>";
	$opt .= "<option value='37'>37</option>";
	$opt .= "<option value='38'>38</option>";
	$opt .= "<option value='39'>39</option>";
	$opt .= "<option value='40'>40</option>";
	$opt .= "<option value='41'>41</option>";
	$opt .= "<option value='42'>42</option>";
	$opt .= "<option value='43'>43</option>";
	$opt .= "<option value='44'>44</option>";
	$opt .= "<option value='45'>45</option>";
	$opt .= "<option value='46'>46</option>";
	$opt .= "<option value='47'>47</option>";
	$opt .= "<option value='48'>48</option>";
	$opt .= "<option value='49'>49</option>";
	$opt .= "<option value='50'>50</option>";
	$opt .= "<option value='51'>51</option>";
	$opt .= "<option value='52'>52</option>";
	$opt .= "<option value='53'>53</option>";
	$opt .= "<option value='54'>54</option>";
	$opt .= "<option value='55'>55</option>";
	$opt .= "<option value='56'>56</option>";
	$opt .= "<option value='57'>57</option>";
	$opt .= "<option value='58'>58</option>";
	$opt .= "<option value='59'>59</option>";
	return $opt;
}
function mkyear($keep){
	$opt = "<option selected value='$keep'>$keep</option>";
	$opt .= "<option value='2006'>2006</option>";
	$opt .= "<option value='2007'>2007</option>";
	$opt .= "<option value='2008'>2008</option>";
	$opt .= "<option value='2009'>2009</option>";
	$opt .= "<option value='2010'>2010</option>";
	$opt .= "<option value='2011'>2011</option>";
	return $opt;
}
function monthConvert($month){
	if ($month == '01'){ return 'January'; }
	if ($month == '02'){ return 'February'; }
	if ($month == '03'){ return 'March'; }
	if ($month == '04'){ return 'April'; }
	if ($month == '05'){ return 'May'; }
	if ($month == '06'){ return 'June'; }
	if ($month == '07'){ return 'July'; }
	if ($month == '08'){ return 'August'; }
	if ($month == '09'){ return 'September'; }
	if ($month == '10'){ return 'October'; }
	if ($month == '11'){ return 'November'; }
	if ($month == '12'){ return 'December'; }
}
function mkAlert($alertStr,$entryID,$serverID,$packetID){
	mysql_select_db('core');
	@mysql_query("INSERT INTO ps_alert (alertStr, entryID, entryTime, serverID, packetID) VALUES ('$alertStr', '$entryID', NOW(), '$serverID', '$packetID')");
}
function serverFiled($county, $server){
	if ($county == 'ALLEGANY'){
		return 1;
	}elseif ($county == 'CALVERT'){
		return 1;
	}elseif ($county == 'CAROLINE'){
		return 1;
	}elseif ($county == 'CHARLES'){
		return 1;
	}elseif ($county == 'DORCHESTER'){
		return 1;
	}elseif ($county == 'FREDERICK'){
		return 1;
	}elseif ($county == 'GARRETT'){
		return 1;
	}elseif ($county == 'ST MARYS'){
		return 1;
	}elseif ($county == 'SOMERSET'){
		return 1;
	}elseif ($county == 'TALBOT'){
		return 1;
	}elseif ($county == 'WASHINGTON'){
		return 1;
	}elseif ($county == 'PRINCE GEORGES' && $server == '267'){
		return 1;
	}
}

///
///
///
function hardLog($str,$type){
	if ($type == "mobile"){
		$log = "/logs/mobile.log";
	}
	if ($log && $_SERVER["REMOTE_ADDR"] != "68.25.25.70"){
		error_log('['.date('h:i:sA n/j/y')."] [".$_SERVER["REMOTE_ADDR"]."] [".$_COOKIE[psdata][name]."] [".trim($str)."] \n", 3, $log);
	}
	// this is important code 
}
function db_connect($host,$database,$user,$password){ 
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
function row_color($i,$bg1,$bg2){
    if ( $i%2 ) {
        return $bg1;
    } else {
        return $bg2;
    }
}
function washURI($uri){
$uri = str_replace('portal/','',$uri);
$uri = str_replace('/var/www/dataFiles/service/orders/','PS_PACKETS/',$uri);
$uri=str_replace('data/service/orders/','PS_PACKETS/',$uri);
return $uri;
}
?>