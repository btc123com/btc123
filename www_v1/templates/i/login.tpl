<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>个性导航站登录</title>
<link href="http://<?{$smarty.const.SITE_DOMAIN}?>/static/css/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/login.js"></script>
</head>

<body>
<div id="header">
  <div class="r03"></div>
  <div class="r02"><a href="http://<?{$smarty.const.SITE_DOMAIN}?>/i/index.php?a=reg">注册i首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://<?{$smarty.const.SITE_DOMAIN}?>">首页</a></div>
  <div class="r01"></div>
</div>
 <div id="logo" style=" width:990px"><a href="http://www.btc123.com" target="_blank"><img src="../static/images/logo_180_60.png" title="比特币导航网"/></a></div>


 <div id="login"><div class="m_reg">
  <div class="title">
   <span class="tab">用户登录</span><div class="more" style="color:#666666">我还未注册，现在去 <a href="http://<?{$smarty.const.SITE_DOMAIN}?>/i/?a=reg" style="color:#0066CC">创建首页</a> </div>  </div>
  <div class="main">
  

<div id="login1" style="display:block">
<form id="loginForm" name="loginForm" onsubmit="return toLoginCheck()" action="http://<?{$smarty.const.SITE_DOMAIN}?>/i/?c=login&act=login" method="post">
   <ul class="reg" style="margin:45px;">
    <li><span>用户名：</span><input class="input" name="tbUserName" type="text" value="<?{$userName}?>" id="tbUserName"/></li>
     <li><span>密码：</span><input name="tbUserPwd" type="password" id="tbUserPwd" class="input"  /></li>
     <li><span>&nbsp;</span><input name="scookie" type="checkbox" value="1" checked="checked"/>&nbsp;记住我</li>
    <li><span>&nbsp;</span><input class="set_btn"  type="submit" name="loginsubmit" value="登 录" /><a href="http://<?{$smarty.const.SITE_DOMAIN}?>/i/?a=getpwd" style="color:#06c">忘记密码？</a>
    <input type="hidden" name="re" id="re" value="http://<?{$smarty.const.SITE_DOMAIN}?>/i/?c=manage" /></li>
   </ul></form></div>
  </div>
 </div>
 <div class="reg_des">
  <div class="title">
   <span class="tab">什么是&nbsp;<font color="orange">btc123.com</font>&nbsp;个性导航？</span> </div>
  <div class="main">
  <ul>
   <li>
    <h2>个性化的上网导航，您上网的最佳首页！</h2>
    
    <span>您可以自由修改您的导航首页的页面风格和内容，真正实现最
快捷上网。</span>
   </li>
   <li>
    <h2>速度快、管理快捷、永不丢失！</h2>
    
    <span>访问快速稳定，管理简单快捷，让您收藏的网站实现永远不丢
失，用三分钟，节省3000分钟！</span>
   </li>
   <li>
    <h2>独立展示的二级域名！</h2>
    
    <span>拥有专属于您的个性化二级域名。</span>
   </li>
  </ul>
  </div>
 </div>
 </div>
</body>
</html>