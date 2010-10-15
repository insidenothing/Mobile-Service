<? 
include 'functions.php';
if (($_POST[email] && $_POST[password]) || ($_GET[email] && $_GET[password]) ){
mysql_connect();
mysql_select_db('core');
		if ($_POST[email]){ $email = $_POST[email]; }else{ $email = $_GET[email];}
		if ($_POST[password]){ $pass = $_POST[password];}else{$pass = $_GET[password]; }
		$q1 = "SELECT * FROM ps_users WHERE email = '$email' AND password = '$pass' AND level <> 'DELETED'";		
		$r1 = @mysql_query ($q1) or die(mysql_error());
		if ($data = mysql_fetch_array($r1, MYSQL_ASSOC)){
			$ip = getenv(REMOTE_ADDR);
			$inTwoHours = 60 * 60 * 24 * 60 + time(); // really two months
			setcookie ("psdata[user_id]", $data[id], $inTwoHours, "/", "mobile.mdwestserve.com");
			setcookie ("psdata[effects]", $data[effects], $inTwoHours, "/", "mobile.mdwestserve.com");
			setcookie ("psdata[name]", $data[name], $inTwoHours, "/", "mobile.mdwestserve.com");
			setcookie ("psdata[tos_date]", $data[tos_date], $inTwoHours, "/", "mobile.mdwestserve.com");
			setcookie ("psdata[email]", $data[email], $inTwoHours, "/", "mobile.mdwestserve.com");
			setcookie ("psdata[level]", $data[level], $inTwoHours, "/", "mobile.mdwestserve.com");
			hardLog("Login: $email by $data[name]",'mobile');
			header('Location: home.php');
		}else{
			hardLog("Login Failed: $email using $pass",'mobile');
		}
} else {
	if ($_COOKIE[psdata][name]){
		header('Location: home.php');
	}else{
		hardLog('Mobile Website Home Page','mobile');
	}
}
?>
<body bgcolor="#CCFFFF">

<pre>
Welcome To MDWestServe Mobile
This site is for official use
by active contractors only.
Cookies are required.
Javascript is required.
</pre>
<table align="left" cellpadding="10"><form method="post" onSubmit="return submitForm(this.submit)">
<? if ($error){ ?>
	<tr>
		<td bgcolor="#FF0000" colspan="2" align="center"><strong><?=$error?></strong></td>
	</tr>
    <? } ?>
<? if ($_GET[message]){ ?>
	<tr>
		<td bgcolor="#FFFF00" colspan="2" align="center"><?=$_GET[message]?></td>
	</tr>
    <? } ?>
	<tr>
		<td colspan="2" align="center">Please enter your email and password to log in.</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="Log In" /></td>
	</tr>
	<tr>
		<td>E-Mail</td>
		<td><input name="email" type="text" value="<?=$_GET[email]?>" /></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input name="password" type="password" value="<?=$_GET[password]?>" /></td>
	</tr>
</form>
</table>
