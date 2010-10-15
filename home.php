<?
include 'common.php';
include 'menu.php';
hardLog('HOME: '.$_SERVER["HTTP_USER_AGENT"],'mobile');
?>
<body bgcolor="#CCFFFF">
Welcome <?=$_COOKIE["psdata"]["name"];?>,<br>
<script type="text/javascript">
document.write('Your Phone Supports Javascript!');
</script><br>
For your active files click on <a href="active.php">ACTIVE</a><br>
To search for older files click on <a href="search.php">SEARCH</a><hr>
You can now; upload photographs, update your files, request close on files, check service instructions, and so much more!<hr>
We are working on the pdf download to media card / phone for usb printing at a remote loacation.
<? include "footer.php";?>