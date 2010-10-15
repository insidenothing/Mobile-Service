<? 
include ('liveAffidavit.php');
?>
<style>
body{background-color:#FFFFFF;}
#notice {
   /* the filter attribute is recognized in
   Internet Explorer and should be a percentage */
   filter: Alpha(opacity=15);
   /* the -moz-opacity attribute is recognized by 
   Gecko browsers and should be a decimal */
   -moz-opacity: .15;
   /* opacity is the proposed CSS3 method, supported
   in recent Gecko browsers */
   opacity: .15;
}
</style>
<div id="notice" style="position:absolute; z-index:1; top:0px; left:0px; height:100%; width:100%;font-size:30px; text-align:center;">
<? $i=0; while($i++ < 3){?>
PREVIEW ONLY<br />DO NOT PRINT HERE<br />CURRENT AFFIDAVIT STATUS<br /><?=$d1[affidavit_status]?><BR /><BR /><BR /><BR /><BR /><BR /><BR /><BR />
<? }?>
</div>
