<?
/*
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); 


function resizejpeg($max_height,$max_width,$destination_pic,$source_pic){
	$src = imagecreatefromjpeg($source_pic);
	list($width,$height)=getimagesize($source_pic);
	$x_ratio = $max_width / $width;
	$y_ratio = $max_height / $height;
	if( ($width <= $max_width) && ($height <= $max_height) ){
		$tn_width = $width;
		$tn_height = $height;
		}elseif (($x_ratio * $height) < $max_height){
			$tn_height = ceil($x_ratio * $height);
			$tn_width = $max_width;
		}else{
			$tn_width = ceil($y_ratio * $width);
			$tn_height = $max_height;
	}
	$thumb = imagecreatetruecolor($tn_width, $tn_height);
	imagecopyresampled($thumb, $src, 0, 0, 0, 0, $tn_width, $tn_height, $width, $height);
	imagejpeg( $thumb, $destination_pic );	
}
function watermarkjpeg($add,$add2,$water_img,$location_height,$location_width,$address){
	$img_ar=GetImageSize ($add); // reading source image size
	$img_wt_ar=GetImageSize ($water_img); // reading water image size
	$im=ImageCreateFromJpeg($add); // for main image
	$water_img1=ImageCreateFromgif($water_img); // for water image
	$newimage=imagecreatetruecolor($img_ar[0],$img_ar[1]);//
	$white = ImageColorAllocate($im, 255, 255, 255);
	// Top Label
	$r_width = 450;
	$r_height = 15;
	$r_x = 0;
	$r_y = 30;
	ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $white);
	imagestring($im, 5, 5, 30, $address, $black);
	
	
	imageCopyResized($newimage,$im,0,0,0,0,$img_ar[0],$img_ar[1],
	$img_ar[0],$img_ar[1]);
	$t=ImageCopy($newimage,$water_img1,$location_width,$location_height,
	0,0,$img_wt_ar[0],$img_wt_ar[1]);
	ImageJpeg($newimage,$add2,100);
	chmod("$add2",0666);
}



function rotateJpeg($sourceFile,$destImageName,$degreeOfRotation)
{
  //function to rotate an image in PHP
  //developed by Roshan Bhattara (http://roshanbh.com.np)

  //get the detail of the image
  $imageinfo=getimagesize($sourceFile);
  switch($imageinfo['mime'])
  {
   //create the image according to the content type
   case "image/jpg":
   case "image/jpeg":
   case "image/pjpeg": //for IE
        $src_img=imagecreatefromjpeg("$sourceFile");
                break;
    case "image/gif":
        $src_img = imagecreatefromgif("$sourceFile");
                break;
    case "image/png":
        case "image/x-png": //for IE
        $src_img = imagecreatefrompng("$sourceFile");
                break;
  }
  //rotate the image according to the spcified degree
  $src_img = imagerotate($src_img, $degreeOfRotation, 0);
  //output the image to a file
  imagejpeg ($src_img,$destImageName);
}

$file = explode('http://mdwestserve.com/ps/photographs//',$link);


$passthrough = $file[1];

echo "<li>Processing $passthrough</li>";
if (file_exists('photographs/mark.'.$passthrough)){
	unlink('photographs/mark.'.$passthrough);
}
if (file_exists('photographs/small.'.$passthrough)){
	unlink('photographs/small.'.$passthrough);
}
if (file_exists('photographs/thumb.'.$passthrough)){
	unlink('photographs/thumb.'.$passthrough);
}

//include 'ps/functions.php';


// start settings 
function process($file_name,$address){
$water_img = "gfx/watermark.gif"; 			// Water mark Image file (.gif transparent)
$water_img_height = 0; 							// Location of water mark
$water_img_width = 0; 							// Location of water mark
$source = "photographs/$file_name";			// file to process
// large display for as-core
$output = "photographs/thumb.$file_name";		// file to output
$final = "photographs/mark.$file_name";			// file to as-core
$small = "photographs/small.$file_name";		// file to ps-core
$max_width  = 450;								// max resize width
$max_height = 900;	
if (!file_exists($final)){							// max resize height
resizejpeg($max_height,$max_width,$output,$source); 
watermarkjpeg($output,$final,$water_img,$water_img_height,$water_img_width,$address);
}
if (!file_exists($small)){							// max resize height
$max_width  = 150;								// max resize width
$max_height = 150;								// max resize height
resizejpeg($max_height,$max_width,$small,$final); 
}
if (file_exists($output)){							
	unlink($output);				// delete extra file used during watermark process
} 
return $final;
}

	// modify photo address to include packet, defendant and address code

$img = process($passthrough,photoAddress($packet,$defendant,$_POST[photo]));
?>
<img src="<?=$img?>" />

*/
