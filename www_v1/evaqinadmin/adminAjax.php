<?php
header('Content-Type: text/html;charset=utf-8');
session_cache_limiter('private,must-revalidate');
require("header.inc.php");
ChkAdminLogin();

$objC = new Conn();
$req = addSlash($_REQUEST);
$spid = $req['stpParentID'];
$sql = "set names utf8";
$objC->RunQuery($sql);
if(isset($req['act']) && $req['act']=='save'){
	$result = 0;
	$id=$req['id'];
	$tid=$req['tid'];
	if(empty($tid)){$tid=0;}
	if($id){
		$sql = "update `".DBPREFIX."type_site` set stpParentID = $tid where stpID=".$id;
		$rs = $objC->RunQuery($sql);
		if($rs)$result = 1;
	}
	echo $result;
	exit;
}
$sql = "SELECT `stpID`,`stpName` FROM `".DBPREFIX."type_site` WHERE stpStatus=1 and stpParentID = " . $spid;
$subtype_site = $objC ->GetAll($sql);
echo json_encode($subtype_site);
exit;
?>