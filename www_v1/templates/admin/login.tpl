<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Login</title>
<link href="./style/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/function.js"></script>
</head>

<body>
<div id="header">
  <div class="vision"><a href="http://<?{$smarty.const.SITE_DOMAIN}?>">←<?{$smarty.const.SITE_NAME}?></a></div>
</div>
<div id="login">
  <div class="title"><img src="images/logintitle.gif" /></div>
  <div class="login_top"></div>
<form method="post" action="?act=login">
  <div class="login_main">
    <ul>
      <li><label>Username</label><input name="tbMasterMail" id="tbMasterMail" type="text" /></li>
      <li><label>Password</label><input name="tbMasterPwd" id="tbMasterPwd" type="password" /></li>

      <li><div class="bt"><INPUT type="image" border=0 src="images/bt_login.jpg" name="Submit"/></div>
      </li>
    </ul>
  </div>
  <div class="login_bt"></div>
</form>
</div>
<div id="footer">Powered by btc123.com</div>
</body>
</html>
