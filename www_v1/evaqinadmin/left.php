<?php
include_once("header.inc.php");
ChkAdminLogin();
$cRow = array();
$moduleFid = addSlash($_GET['moduleFID']);
$objC = new Conn();
$psql = "SELECT moduleID,moduleName FROM ".DBPREFIX."admin_module WHERE moduleFID=0 AND moduleState = 1 ORDER BY moduleIndex ASC";
$pRow = $objC->GetAll($psql);
foreach($pRow as $row){
	$moduleFid = $row['moduleID'];
	$cRow[$moduleFid]['moduleName'] = $row['moduleName'];
	$cRow[$moduleFid]['moduleID'] = $row['moduleID'];
	$sql = 'SELECT m.moduleID,m.moduleName,m.moduleLink FROM '.DBPREFIX.'admin_module m WHERE m.moduleState = 1 AND m.moduleFID = "'.$moduleFid.'" ORDER BY moduleIndex ASC';
	$arrRow = $objC -> GetAll($sql);
	$cRow[$moduleFid]['crow'] = $arrRow;
}
$objS -> assign("cRow",$cRow);
$firsttime = is_file("../index.htm");
$objS -> assign("ft",$firsttime);
require("footer.inc.php");
$objS -> display("admin/left.tpl");
?>