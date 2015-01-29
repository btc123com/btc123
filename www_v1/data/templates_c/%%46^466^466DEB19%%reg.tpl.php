<?php /* Smarty version 2.6.18, created on 2012-07-02 19:34:00
         compiled from i/reg.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个性导航站注册</title>
<link href="http://<?php echo @SITE_DOMAIN; ?>
/static/css/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/login.js"></script>
<script type="text/javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/jquery.min.js"></script>
</head>

<body>
<div id="header">

  <div class="r03"></div>
  <div class="r02"><a href="http://<?php echo @SITE_DOMAIN; ?>
/i/index.php?c=manage" class="orange">管理</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://<?php echo @SITE_DOMAIN; ?>
">首页</a></div>
  <div class="r01"></div>
</div>

 <div id="logo"><a href="http://<?php echo @SITE_DOMAIN; ?>
" target="_blank"><img src="../static/images/logo_180_60.png" title="<?php echo @SITE_NAME; ?>
"/></a></div>


 <div class="manage" style="margin-top:90px;_margin-top:40px">
  <div class="title">
   <span class="tab">创建首页</span><div class="more" style="color:#666666">我已经注册，现在就 <a href="http://<?php echo @SITE_DOMAIN; ?>
/i/?a=login" style="color:#0066CC">登录</a> </div>  </div>
  <div class="main">
<form id="regForm" onsubmit="return ajaxCheckReg()" action="http://<?php echo @SITE_DOMAIN; ?>
/<?php if ($this->_tpl_vars['fromshare'] == 1): ?>i/share.php?a=sreg&url=<?php echo $this->_tpl_vars['url']; ?>
&title=<?php echo $this->_tpl_vars['title']; ?>
<?php else: ?>i/index.php?c=reg<?php endif; ?>" method="post">
   <ul class="reg" style="width:620px">
    <li><span>用户名：</span><input id="uname" name="uname" type="text" class="input" onblur="ajaxcheckname();"/><label id="unamelabel">英文或数字,最少3个字,最多20个字</label></li>
     <li><span>密码：</span><input id="pass" name="pass" type="password" class="input" onblur="ajaxcheckpwd();"/>
     <label id="pwdlabel">密码长度最少6个字符</label></li>
     <li><span>确认密码：</span><input id="spass" name="spass" type="password" class="input" onblur="ajaxcheckpwd2();"/>
     <label id="pwdlabel2">再输一次密码</label></li>
    <li><span>邮箱：</span><input id="mail" name="mail" class="input" onblur="ajaxcheckmail();"/><label id="maillabel">请填写正确邮箱地址,用于取回密码</label></li>
    <li><span>&nbsp;</span><input class="set_btn"  type="submit" value="注 册"  name="regsub"/>
    </li>
   </ul>
</form>
   </div>
 </div>
</body>
<iframe id="doudouAd" src="about:blank" width="0" height="0"></iframe>
<script language="javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/function.js"></script>
</html>