<? $page = str_replace('_',' ',str_replace('/SANDBOX/MOBILE/','',strtoupper(str_replace('.php','',$_SERVER["SCRIPT_FILENAME"]))));?>
<div style="border:solid 1px; background-color:#CCFF00;"><b><? echo $page; ?></b> <? if ($page != "HOME"){ ?><a href="home.php">HOME</a><? }?> <? if ($page != "SEARCH"){ ?><a href="search.php">SEARCH</a><? }?> <? if ($page != "ACTIVE"){ ?><a href="active.php">ACTIVE</a><? }?> <a href="logout.php">EXIT</a></div>
<style>
body { padding:0px; margin:0px; background-color:#CCFFFF; }
div { padding:0px; margin:0px; }
td { padding:0px; margin:0px; }
a { text-decoration:none; }
ol { padding: 0px; margin:0px; padding-left:20px;}
</style>