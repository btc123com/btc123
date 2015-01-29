<?php
require_once('../header.inc.php');

$req = addSlash($_GET);
$act = isset($req['act']) ? $req['act'] : '';
$p = isset($req['p']) ? $req['p'] : '';
$module = isset($req['module']) ? $req['module'] : '';

$objS->assign('sets', $sets);

function AddAdminLog($actStr){
	global $objC;
	$sql = 'INSERT INTO '.DBPREFIX.'admin_log (cDate,masterMail,actStr,actIP,actPage) VALUES ("'.time().'","'.$_SESSION['sMaster']['masterMail'].'","'.$actStr.'","'.GetIP().'","'.$_SERVER['PHP_SELF'].'")';
	$objC -> RunQuery($sql);
}
$files = array(
'index.tpl' => '首页',
'index_kp.tpl' => '宽屏首页',
'sub.tpl' => '分类导航页',
'apply.tpl' => '申请收录',
'applyok.tpl' => '收录提交成功',
'about.tpl' => '关于我们',
'404.tpl' => '404页面',
'message.tpl' => '用户留言',
'footer.tpl' => '页脚',
'tianqi.tpl' => '天气预报',
);