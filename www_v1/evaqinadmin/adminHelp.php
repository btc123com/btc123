<?php
require("header.inc.php");
ChkAdminLogin();
$objC = new Conn();
$url = $_REQUEST['url'];
$hid = $_REQUEST['hid'];

$sql = "select `content` from ".DBPREFIX."admin_help where `url` = '".$url."' and `hid` = ".$hid;
$content = $objC->GetOne($sql);
if(CHARSET=='gbk')
$content = iconv("GBK","UTF-8",$content);
echo json_encode($content);
?>
