<?
include 'common.php';
hardLog('LOGOUT: '.$_SERVER["HTTP_USER_AGENT"],'mobile');
setcookie ("psdata[user_id]");
setcookie ("psdata[name]");
setcookie ("psdata[email]");
setcookie ("psdata[level]");
header ('Location: http://mobile.mdwestserve.com');
?>