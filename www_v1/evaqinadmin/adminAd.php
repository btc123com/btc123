<?php
session_cache_limiter('private,must-revalidate');
require("header.inc.php");
ChkAdminLogin();
$objC = new Conn();
$id = $_GET['cid'];
$sql = "select content from ".DBPREFIX."admin_ad where autoID = $id";
$content = $objC->GetOne($sql);
echo "<style>img{border:0px}</style><center>".stripslashes($content)."</center>";