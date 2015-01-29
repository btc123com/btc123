<?php
require("header.inc.php");
ChkAdminLogin();

if (isset($_POST) && isset($_GET['act']) == 'update') {
	$usersite = $_POST['userSite'];
    $sql = "UPDATE ".DBPREFIX."site_setting SET `usersite`='".$usersite."' WHERE id = 1";
    if ($objC->RunQuery($sql)) {
        AlertMsg('修改自定义配置成功!', '-1');
    }
    else {
        AlertMsg('修改自定义配置失败!', '-1');
    }
    exit;
}

$sql = 'SELECT usersite FROM '.DBPREFIX.'site_setting';
$sets = $objC->GetOne($sql);
$objS->assign('sets', $sets);

require("footer.inc.php");
$objS->display("admin/adminUserSetting.tpl");