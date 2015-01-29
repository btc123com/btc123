<?php
include_once("header.inc.php");
ChkAdminLogin();


$objS -> assign("files",$files);
$objS -> assign("theme",$_GET['theme']);
$objS -> display("admin/themeedit.tpl");
?>