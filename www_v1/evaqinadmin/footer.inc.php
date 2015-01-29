<?php
include_once("header.inc.php");
$queryNum='';
if($objC->queryNum!=NULL){
	try{
		$objC -> Close();
	}
	catch(Exception $e){
	}
	$queryNum = $objC->queryNum;
}
$version = VERSION_5W;
$objS -> assign("version",$version);
$objS -> assign("act",$act);
$objS -> assign("module",$module);
$objS -> assign("p",$p);
$objS -> assign("queryNum",$queryNum);
$objS -> assign("s",substr((GetMTime()-$s)/100,0,8));
?>