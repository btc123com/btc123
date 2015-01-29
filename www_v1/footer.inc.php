<?php
$objS->assign("s",substr((GetMTime()-$s)/100,0,8));
//var_dump($_SERVER);

$pos = strripos($_SERVER['PHP_SELF'],'/');

if(file_exists($objS->template_dir.str_replace(".php",".tpl",substr($_SERVER['PHP_SELF'],$pos+1)))){
	$objS->display(str_replace(".php",".tpl",substr($_SERVER['PHP_SELF'],$pos+1)));
}

unset($objS,$objC);
?>