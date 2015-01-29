<?php
require("header.inc.php");
ChkAdminLogin();
if (isset($_POST) && isset($_GET['act']) && $_GET['act'] == 'update') {
    $arr = array();
    foreach ($_POST as $key=>$value) {
    	if($key == 'countCode')
        $arr[] = $key." = '".addslashes($value)."' ";
      else
      	$arr[] = $key." = '".addSlash($value)."' ";
    }

    $str = implode(',', $arr);
    $sql = "UPDATE ".DBPREFIX."site_setting SET $str WHERE id = 1";
    if ($objC->RunQuery($sql)) {
        AlertMsg('修改站点配置成功!\r\n\r\n注意：请到 [生成静态] 栏目下重新生成静态页面之后才能查看效果!', '-1');
    }
    else {
        AlertMsg('修改站点配置失败!', '-1');
    }
    exit;
}elseif (isset($_POST) && isset($_GET['act']) && $_GET['act'] == 'clear') {
	$cachedir = CACHE_PATH."data/";
	if($handle = opendir($cachedir)){
		while(false !== ($file=readdir($handle))){
			if((preg_match("/^0\.data$/i",$file)||preg_match("/^ad\d+\.data$/i", $file)) && $file != '.' && $file != '..'){
				$rs = unlink($cachedir.$file);
			}
		}
	}
	AlertMsg('清除缓存成功!', '-1');exit;
}

$sql = 'SELECT * FROM '.DBPREFIX.'site_setting';
$sets = $objC->GetRow($sql);
$sets['countCode'] = stripslashes($sets['countCode']);
$objS->assign('sets', $sets);

require("footer.inc.php");
if(isset($_GET) && isset($_GET['p']) && $_GET['p']=='mail')
	$objS->display("admin/adminMailSetting.tpl");
else if(isset($_GET) && isset($_GET['p']) && $_GET['p']=='cache')
	$objS->display("admin/adminUserCacheSetting.tpl");
else
	$objS->display("admin/adminSiteSetting.tpl");