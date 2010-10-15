<? if (!$dname){ echo "<h1>NO DEFENDANT</h1>";} 
	if ($ddr[affidavit_status] != "IN PROGRESS" && $ddr[affidavit_status] != "NEED CORRECTION"){
		$instructions = "SELECT AN ACTION SUCH AS:<br>
		<ul><li>Mailing and Posting (to enter service attempts or document postings),</li>
		<li>Personal Delivery (to make entries for if the service documents were left with the defendant or a co-resident),</li>
		<li>an Invalid Address (if an address, to the best of your knowledge, does not exist),</li>
		<li>or the Photo Manager (to upload service photos).</li></ul>";
	}else{
				$instructions = "SELECT AN ACTION SUCH AS:<br>
		<ul><li>Printing the Affidavits (remember to print two copies per defendant),</li>
		<li>or the Photo Manager (to upload service photos).</li></ul>";
	}
	echo "<br>".$instructions;
	?>
<? if ($ddr[affidavit_status] != "IN PROGRESS" && $ddr[affidavit_status] != "NEED CORRECTION"){?>
<div class="nav3"><input onClick="window.open( 'liveAffidavit.php?packet=<?=$packet?>&def=<?=$defendant?>', 'Affidavit', 'status = 1, height = 900, width = 1000, scrollbars = 1, resizable = 1' )" type="radio" name="service_type" value="PRINT" /> PRINT AFFIDAVIT</div>
<? if($ddr[process_status] == 'AWAITING MAIL CONFIRMATION' && $_COOKIE[psdata][level] == "Operations"){?>
<div class="nav"><input onClick="submitLoader()" type="radio" name="i" value="close.1" /> REQUEST CLOSE</div>
<?
	}
 }else{?>
<div onClick="submitLoader()" class="nav"><input onClick="submitLoader()" type="radio" name="service_type" value="MAILING AND POSTING" /> MAILING AND POSTING</div>
<div onClick="submitLoader()" class="nav3"><input onClick="submitLoader()" type="radio" name="service_type" value="INVALID ADDRESS" /> INVALID ADDRESS <em>{NEW}</em></div>
<div onClick="submitLoader()" class="nav"><input onClick="submitLoader()" type="radio" name="service_type" value="PERSONAL DELIVERY" /> PERSONAL DELIVERY</div>
<div onClick="submitLoader()" class="nav3"><input onClick="submitLoader()" type="radio" name="service_type" value="MAKE CORRECTION" /> MAKE CORRECTIONS</div>
<div onClick="submitLoader()" class="nav3"><input onClick="submitLoader()" type="radio" name="service_type" value="CHANGE SIGNATORY" /> CHANGE SIGNATORY <em>{NEW}</em></div>
<div onClick="submitLoader()" class="nav"><input onClick="submitLoader()" type="radio" name="i" value="close.1" /> REQUEST CLOSE</div>
<? }?>
<div onClick="submitLoader()" class="nav0"><input onClick="submitLoader()" Checked type="radio" name="i" value="2" /> NEXT</div>
<div onClick="submitLoader()" class="nav4"><input onClick="submitLoader()" type="radio" name="i" value="photo.review" /> PHOTO MANAGER</div>
<div onClick="submitLoader()" class="nav2"><input onClick="submitLoader()" type="radio" name="i" value="a" /> NEW</div>
<input type="hidden" name="opServer" value="<?=$_POST[opServer]?>" />
<input type="hidden" name="parts" value="<?=$_POST[parts]?>">

<? if ($_POST[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_POST[mailDate]?>">
<? } ?>
<? if ($_GET[mailDate]){  ?>
<input type="hidden" name="mailDate" value="<?=$_GET[mailDate]?>">
<? } ?>