<?php
include_once("header.inc.php");
ChkAdminLogin();

if(isset($_POST['content'])){

	$content = stripslashes(htmlspecialchars_decode($_POST['content']));
	
	$theme = $_POST['theme'];
	$file = $_POST['file'];
	if(!array_key_exists($file,$files))die('不存在此模板文件');
	if(!preg_match("/^\w+\/$/",$theme))die('模板路径异常');
	$path = TEMPLATES.'theme/'.$theme.$file;
	if(is_file($path)){
		$rs = file_put_contents($path,$content);
		if($rs)
			flushHTML('模板修改成功！<br />');
		else
			flushHTML('模板<font style="color:red">修改失败！</font>，请将主题下各模板文件权限设置为0777再试。您也可以手动修改模板文件：'.$path.'<br />');
	}else{
		flushHTML('无此模板文件！<br />');
	}
	echo ' <meta http-equiv="refresh" content="3; url=themedetail.php?theme='.$_POST['theme'].'&file='.$_POST['file'].'" /> 操作完成，3秒后自动回到主题管理页面';
}else{
	if($_GET['theme']){
		$theme = $_GET['theme'];
	}else{
		$theme = THEME_PATH;
	}
	
	$path = TEMPLATES.'theme/'.$theme.$_GET['file'];
	if(is_file($path)){
		$content = htmlspecialchars(getContent($path));
		$objS -> assign("content",$content);
		$objS -> assign("theme",$theme);
		$objS -> assign("file",$_GET['file']);
		$objS -> display("admin/themedetail.tpl");
	}else{
		die(' 本主题无此文件 ');
	}
}
