<?php
require_once('header.inc.php');
ChkAdminLogin();

$content = getContent('http://www.5w.com/index.php?c=index&a=getVersionNews');
if ($content != 'no') {
	$objS->assign('versionList', unserialize($content));
}
require("footer.inc.php");
$objS->display('admin/adminVersionNews.tpl');