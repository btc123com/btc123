<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../static/js/jquery.min.js"></script>
<script language="javascript">
$(function(){
	$.get('/admin/getNewVersion.php', function(data){
		$("#showNewVersion").html(data);
	})
})
</script>
</head>
<body>
<div id="box">
  <div class="header">
    <div class="logo"><img src="./images/logo.jpg" /></div>
    <div class="vision_s">V<?{$smarty.const.VERSION_5W}?></div>
    <div class="go_site"><?{if $getVersion!=''}?><a href="http://download.5w.com" target="_blank" title="最新版本下载">升级到<?{$getVersion}?>版本</a><?{else}?>已是最新版本!<?{/if}?></div>
    <div class="quit">欢迎你:<?{$smarty.session.sMaster.masterMail}?> | <a href="http://<?{$smarty.const.SITE_DOMAIN}?>" target="_blank">站点首页</a> | <a href="adminMasterPwd.php"  target="mainFrame">修改密码</a> | <a href="login.php?act=logout">退出</a></div>
  </div>
</div>
</body>
</html>
