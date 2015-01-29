<?php
require("header.inc.php");
ChkAdminLogin();
$objC = new Conn();

$sql = "SELECT * FROM `".DBPREFIX."search_class` order by `sort` ASC";
$searchArr = $objC->GetAll($sql);
$objS->assign('searchArr',$searchArr);

require("footer.inc.php");
$objS -> display("admin/adminsearchType.tpl");
?>
