<?php
include_once("header.inc.php");
ChkAdminLogin();
if($_GET && $_GET['theme'] && !empty($_GET['theme'])){
	$newTheme = $_GET['theme'];
	$dir = ROOT.'theme/'.$newTheme;
	$tpldir = TEMPLATES.'theme/'.$newTheme;
	if(!is_dir($dir)){
		$msg = '该主题不存在。<br />';
	}
	if(!is_dir($tpldir)){
		$msg .= '该主题没有模板文件。';
	}
	if($msg == ''){
		$objC->RunQuery("UPDATE ".DBPREFIX."site_setting SET theme='{$newTheme}'");
		header('location:adminCache.php?ctype=forall&callor=theme');
		exit;
		/*
		set_time_limit(300);
		include_once('../controllers/abstractController.php');
		include_once('../controllers/htmlController.php');
		$index = new htmlController();
		flushHTML('应用主题成功，正在重新生成静态页面：<br />');
		
		$rs1 = $index->indexAction($h='index','');
		if($rs1)
			flushHTML('默认首页 index.htm 生成成功！<br />');
		else
			flushHTML('默认首页 index.htm <font style="color:red">生成失败！</font><br />');
		$rs2 = $index->indexAction($h='kp',$psize='kp');
		if($rs2)
			flushHTML('宽屏首页 kp.htm 生成成功！<br />');
		else
			flushHTML('宽屏首页 kp.htm <font style="color:red">生成失败！</font><br />');
		$rs3 = $index->aboutAction();
		if($rs3)
			flushHTML('关于我们 about.htm 生成成功！<br />');
		else
			flushHTML('关于我们 about.htm <font style="color:red">生成失败！</font><br />');
		$rs4 = $index->errorAction();
		if($rs4)
			flushHTML('404页面 404.htm 生成成功！<br />');
		else
			flushHTML('404页面 404.htm <font style="color:red">生成失败！</font><br />');
		$rs5 = $index->allChannelAction();
		*/
	}
}
if($_GET && $_GET['delete'] && !empty($_GET['delete'])){
	if($_GET['delete'] == 'default/'){
		flushHTML('默认主题不能删除！<br />');
		exit;
	}
	$newTheme = $_GET['delete'];
	$dir = ROOT.'theme/'.$newTheme;
	$tpldir = TEMPLATES.'theme/'.$newTheme;
	
	if(is_dir($dir)){
		$rs = DeleteDir($dir);
		if($rs)
			flushHTML('主题样式目录删除成功！<br />');
		else
			flushHTML('主题样式目录<font style="color:red">删除失败！</font>请到'.$dir.'目录手动删除相关文件和文件夹<br />');
	}
	if(is_dir($tpldir)){
		$rs = DeleteDir($tpldir);
		if($rs)
			flushHTML('主题模板目录删除成功！<br />');
		else
			flushHTML('主题模板目录<font style="color:red">删除失败！</font>请到'.$dir.'目录手动删除相关文件和文件夹<br />');
	}
}
if(!isset($_GET) || count($_GET) == 0){
	$path = ROOT.'theme/';
	$themearr = array();
	if(is_dir($path)){
		if($handle = opendir($path)){
			while (false !== ($file=readdir($handle))){
				if (is_dir($path.$file) && $file != '.' && $file !='..' && $file != '.svn'){
					$xml =$path.$file.'/about.xml';
					if(is_file($xml)){
						$content = simplexml_load_file($xml);
						$themearr[] = array(
							'dir' => $file.'/',
							'name' => $content->name,
							'author' => $content->author,
							'pubDate' => $content->pubDate,
							'url' => $content->url,
							'mail' => $content->mail
						);
					}
				}
			}		
		}
		/*$dirinfo = scandir($path);
		foreach($dirinfo as $dirs){
			print_r($dirs);
			if($dirs != '.' && $dirs != '..' && $dirs != '.svn'){
				$xml = ROOT.'theme/'.$dirs.'/about.xml';
				if(is_file($xml)){
					$content = simplexml_load_file($xml);
					print_r($content);
					$themearr[] = array(
						'dir' => $dirs.'/',
						'name' => $content->name,
						'author' => $content->author,
						'pubDate' => $content->pubDate,
						'url' => $content->url,
						'mail' => $content->mail
					);
				}
			}
		}
		*/
	}
	if(CHARSET == 'gbk'){
		$themearr = array_utf8_to_gbk($themearr);
	}
	$objS -> assign("themes",$themearr);
	$msg = '';
	
	$objS -> assign("msg",$msg);
	$objS -> display("admin/theme.tpl");
}else{
	echo ' <meta http-equiv="refresh" content="3; url=theme.php" /> 操作完成，3秒后自动回到主题管理页面';
}

?>