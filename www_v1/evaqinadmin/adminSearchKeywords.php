<?php
require("header.inc.php");
ChkAdminLogin();
$objC = new Conn();
$sMasterAct = $_SESSION['sMaster']['masterAct'];
if(preg_match('["viewSite"]','"'.$sMasterAct.'"')){
	$viewSite = "true";
}
if(preg_match('["addSite"]','"'.$sMasterAct.'"')){
	$addSite = "true";
}
if(preg_match('["delSite"]','"'.$sMasterAct.'"')){
	$delSite = "true";
}
if(preg_match('["updateSite"]','"'.$sMasterAct.'"')){
	$updateSite = "true";
}
$objS -> assign("viewSite",$viewSite);
$objS -> assign("addSite",$addSite);
$objS -> assign("delSite",$delSite);
$objS -> assign("updateSite",$updateSite);

$classid = empty($_GET['classid']) ? '' : $_GET['classid'];
$sql = "SELECT `classid`,`classname` FROM `".DBPREFIX."search_class` ORDER BY `sort` ASC";
$rows = $objC->GetAll($sql);
if(empty($classid)){
	$classid = $rows[0]['classid'];
}
$options = array();
foreach ($rows as $row)
{
	$options[$row['classid']] = $row['classname'];
}
$objS->assign('classid',$classid);
$objS->assign('options',$options);

$sql="SELECT a.*,b.classname FROM `".DBPREFIX."search_keyword` as a LEFT JOIN `".DBPREFIX."search_class` as b ON a.class=b.classid WHERE 1=1 AND b.classid = $classid ORDER BY a.`sort` ASC";
$data = $objC->GetAll($sql);
$objS->assign('arrSite',$data);

require("footer.inc.php");
$objS -> display("admin/adminsearchKeywords.tpl");
?>
