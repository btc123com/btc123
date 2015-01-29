<?php
session_cache_limiter('private,must-revalidate');
require("header.inc.php");
include_once('../controllers/abstractController.php');
ChkAdminLogin();

$sMasterAct = $_SESSION['sMaster']['masterAct'];
if(preg_match('["doCache"]','"'.$sMasterAct.'"')){
	$doCache = "true";
}
$objS->assign('doCache',$doCache);
$sql = 'SELECT htmlpath FROM '.DBPREFIX.'site_setting';
$htmlpath = $objC->GetOne($sql);
$ctype = isset($_GET['ctype'])?$_GET['ctype']:'';
$begin = explode(" ", microtime());
if($ctype){
$msg = <<<BOT
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="style/css.css" type="text/css" rel="stylesheet" />
</head><div id="box">
<div class="right">
<table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
  <tr>
    <td class="title_edit">
     <h1>静态生成结果 </h1>
   </td>
  </tr>
  <tr>
    <td class="edit_main"><table width="100%" border="0" cellspacing="1" cellpadding="1">
    	<tr><td><a href="./adminCache.php">返回生成静态管理页</a></td></tr>
      <tr><td height="26">
BOT;
flushHTML($msg);
}

if ($ctype == 'index') {								//----------------------------------fengguanxing 重新生成首页
	include_once('../controllers/htmlController.php');
	$index = new htmlController();
	flushHTML('<br />正在生成首页： <br /><br />');
	$rs = $index->indexAction($h='index','');
	if($rs)
		flushHTML('默认首页 index.htm 生成成功！<br />');
	else
		flushHTML('默认首页 index.htm <font style="color:red">生成失败！</font><br />');
	$rs = $index->indexAction($h='kp',$psize='kp');
	if($rs)
		flushHTML('宽屏首页 kp.htm 生成成功！<br />');
	else
		flushHTML('宽屏首页 kp.htm <font style="color:red">生成失败！</font><br />');
}
elseif ($ctype == 'all') {				//----------------------------------fengguanxing 重新生成所有页
	set_time_limit(300);
	$str = "<br />正在生成分类静态页面：<font color=blue>'".$htmlpath."'&nbsp;目录权限必须为777</font><br /><br />";
    flushHTML($str);
	include_once('../controllers/htmlController.php');
	$channel = new htmlController();
	$channel->allChannelAction();
}elseif ($ctype == 'help') {            //----------------------------------------fengguanxing  重新生成帮助页
	$str = "<br />正在生成其他静态页面： <br /><br />";
  flushHTML($str);
  include_once('../controllers/htmlController.php');
  $index = new htmlController();
  $rs = $index->aboutAction();
  if($rs)
		flushHTML('关于我们 about.htm 生成成功！<br />');
	else
		flushHTML('关于我们 about.htm <font style="color:red">生成失败！</font><br />');
  $rs = $index->errorAction();
  if($rs)
		flushHTML('404页面 404.htm 生成成功！<br />');
	else
		flushHTML('404页面 404.htm <font style="color:red">生成失败！</font><br />');


}elseif ($ctype == 'forall') {				//----------------------------------fengguanxing 重新生成所有页
	set_time_limit(300);
	include_once('../controllers/htmlController.php');
	$index = new htmlController();
	flushHTML('<br />正在生成首页： <br /><br />');
	$rs = $index->indexAction($h='index','');
	if($rs)
		flushHTML('默认首页 index.htm 生成成功！<br />');
	else
		flushHTML('默认首页 index.htm <font style="color:red">生成失败！</font><br />');
	$rs = $index->indexAction($h='kp',$psize='kp');
	if($rs)
		flushHTML('宽屏首页 kp.htm 生成成功！<br />');
	else
		flushHTML('宽屏首页 kp.htm <font style="color:red">生成失败！</font><br />');

	$str = "<br />正在生成其他静态页面： <br /><br />";
    flushHTML($str);

  $rs = $index->aboutAction();
  if($rs)
		flushHTML('关于我们 about.htm 生成成功！<br />');
	else
		flushHTML('关于我们 about.htm <font style="color:red">生成失败！</font><br />');
  $rs = $index->errorAction();
  if($rs)
		flushHTML('404页面 404.htm 生成成功！<br />');
	else
		flushHTML('404页面 404.htm <font style="color:red">生成失败！</font><br />');

	$str = "<br />正在生成分类静态页面：<font color=blue>'".$htmlpath."'&nbsp;目录权限必须为777</font><br /><br />";
  flushHTML($str);

	$index->allChannelAction();
}elseif ($ctype == 'hc_self') {
	$str = "<br />正在删除缓存文件：<br /><br />";
  	flushHTML($str);
	$cachedir = CACHE_PATH;
	if($handle = opendir($cachedir)){
		while (false !== ($file=readdir($handle))){
			if (is_dir($cachedir.$file) && preg_match("/^\d+$/i", $file) && $file != '.' && $file !='..'){
				if($handle = opendir($cachedir.$file."/")){
					while (false!==($files = readdir($handle))){
						if($files != '.' && $files !='..'){
							$rs = unlink($cachedir.$file."/".$files);
							if($rs){
								flushHTML('删除缓存文件'.$files.'成功！<br />');
								$return = 1;
							}else
								flushHTML('删除缓存文件<font style="color:red">'.$files.'失败！</font><br />');
						}
					}
				}
			}
		}
	}
	$cachedir = CACHE_PATH."data/";
	if($handle = opendir($cachedir)){
		while(false !== ($file=readdir($handle))){
			if((preg_match("/^0\.data$/i",$file)||preg_match("/^default\.data$/i",$file)||preg_match("/^ad\d+\.data$/i", $file)) && $file != '.' && $file != '..'){
				$rs = unlink($cachedir.$file);
				if($rs){
					flushHTML('删除缓存文件'.$file.'成功！<br />');
					$return = 1;
				}else
					flushHTML('删除缓存文件<font style="color:red">'.$file.'失败！</font><br />');
			}
		}
	}
	$str = isset($return)?"清除完成":"没有对应缓存";
	flushHTML($str);
}elseif ($ctype == 'hc_weather') {
	$str = "<br />正在删除缓存文件：<br /><br />";
  	flushHTML($str);
	$cachedir = CACHE_PATH."data/newdata/";
	if($handle = opendir($cachedir)){
//		while (false !== ($file=readdir($handle))){
//			if (is_dir($cachedir.$file) && preg_match("/^t\d+$/i", $file) && $file != '.' && $file !='..'){
//				if($handle = opendir($cachedir.$file."/")){
					while (false!==($files = readdir($handle))){
						if($files != '.' && $files !='..'){
							$rs = unlink($cachedir."/".$files);
							if($rs){
								flushHTML('删除缓存文件'.$files.'成功！<br />');
							$return = 1;
							}else
								flushHTML('删除缓存文件<font style="color:red">'.$files.'失败！</font><br />');
						}
					}
				//}
			//}
		//}
	}
	$str = isset($return)?"清除完成":"没有对应缓存";
	flushHTML($str);
}elseif ($ctype == 'hc_sosuo') {
	$str = "<br />正在删除缓存文件：<br /><br />";
  	flushHTML($str);
	$cachedir = CACHE_PATH."data/";
	if($handle = opendir($cachedir)){
		while(false !== ($file=readdir($handle))){
			if((preg_match("/^\d+s\.data$/i",$file)||preg_match("/^\d+c\.data$/i", $file)||preg_match("/^\d+ns\.data$/i", $file)) && $file != '.' && $file != '..'){
				$rs = unlink($cachedir.$file);
				if($rs){
					flushHTML('删除缓存文件'.$file.'成功！<br />');
					$return = 1;
				}else
					flushHTML('删除缓存文件<font style="color:red">'.$file.'失败！</font><br />');
			}
		}
	}
	$str = isset($return)?"清除完成":"没有对应缓存";
	flushHTML($str);
}elseif($ctype == 'cq_zdyad'){
	$str = "<br />正在删除缓存文件：<br /><br />";
  	flushHTML($str);
	$cachedir = CACHE_PATH."data/";
	if($handle = opendir($cachedir)){
		while(false !== ($file=readdir($handle))){
			if(preg_match("/^\d+m\.data$/i",$file) && $file != '.' && $file != '..'){
				$rs = unlink($cachedir.$file);
				if($rs){
					flushHTML('删除缓存文件'.$file.'成功！<br />');
					$return = 1;
				}else
					flushHTML('删除缓存文件<font style="color:red">'.$file.'失败！</font><br />');
			}
		}
	}
	$str = isset($return)?"清除完成":"没有对应缓存";
	flushHTML($str);
}else{
	require("footer.inc.php");
	$firsttime = is_file("../index.htm");
	$objS -> assign("ft",$firsttime);
	$objS->display("admin/adminCache.tpl");
}

if($ctype){
	$end = explode(" ", microtime());
	flushHTML('<br />本次操作总用时：'.round(($end[1]+$end[0]-$begin[0]-$begin[1]),3).' 秒');
	if(isset($_GET['callor']) && $_GET['callor']=='theme'){
		flushHTML('<br /><meta http-equiv="refresh" content="3; url=theme.php" />应用主题成功，3秒后返回主题管理');
	}
	flushHTML('</td></tr></table></td></tr></table> ');

}