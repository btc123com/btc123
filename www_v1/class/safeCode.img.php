<?php
session_start();
//session_register("sSafeCode");

header("Counter-type:image/png");

$str = "ABCDEFGHIJKLMNPQRSTUVWXYZ013456789";
$strSafeCode = "";
for($i=1;$i<=4;$i++){
	$strSafeCode .= substr($str,rand(1,33),1);
}

$_SESSION['sSafeCode'] = $strSafeCode;

$img = imagecreate(56,17);

$color = imagecolorallocate($img,255,255,255);

for($i=0;$i<strlen($strSafeCode);$i++){
	$fontcolor = imagecolorallocate($img,rand($i+50,$i+20),rand($i+50,$i+20),rand($i+50,$i+20));
	imagestring($img,5,10*$i+8,rand(1,3),substr($strSafeCode,$i,1),$fontcolor);
}

for ($i = 1;$i <= 100;$i++){
	$x = rand(1,60);
	$y = rand(1,60);
	imagesetpixel($img,$x,$y,1);
}

imagepng($img);

imagedestroy($img);
?>