<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个性导航站取回密码</title>
<link href="http://<?{$smarty.const.SITE_DOMAIN}?>/static/css/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/login.js"></script>
</head>

<body>
<div id="header">

  <div class="r03"></div>
  <div class="r02"><a href="http://<?{$smarty.const.SITE_DOMAIN}?>/i/?c=manage" class="orange">管理</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://<?{$smarty.const.SITE_DOMAIN}?>/i/?a=reg">注册</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://<?{$smarty.const.SITE_DOMAIN}?>">首页</a></div>
  <div class="r01"></div>
</div>
 <div id="logo"><a href="http://www.btc123.com" target="_blank"><img src="../static/images/logo_180_60.png" title="比特币导航网"/></a></div>


<div class="manage" style="margin-top:90px;_margin-top:40px">
  <div class="title">
  
   <span class="tab">取回密码</span><div class="more" style="color:#666666">我还未注册，现在去 <a href="http://<?{$smarty.const.SITE_DOMAIN}?>/i/?a=reg" style="color:#0066CC">创建首页</a> </div>  </div>
  <div class="main">
<form action="http://<?{$smarty.const.SITE_DOMAIN}?>/i/?c=getPWD&a=getpassword" method="POST">
<ul class="reg" style="width:620px">
<?{if $setpwd eq 'setpwd'}?>
<input type="hidden" value="<?{$u}?>" name="u">
<input type="hidden" value="<?{$t}?>" name="t">
<input type="hidden" value="<?{$m}?>" name="m">
<li><span>新密码：</span><input name="newpwd" type="password" class="input" /><label>输入你新的密码</label></li>
<li><span>&nbsp;</span><input class="set_btn" type="submit" name="submit" value="修改密码" />
<?{else}?>
   <?{if $mailsendsucc eq 'mailsendsucc'}?>
   <li><?{$info}?></li>
   <?{else}?>
    <li><span>用户名：</span><input name="username" type="text" class="input" value="<?{$username}?>"/><label>输入你注册的用户名</label></li>
<?{if $nomail}?>
<li><span>doudou账号：</span><input name="doudou" type="text" class="input" /><label>输入你绑定的doudouID</label></li>
<li><span>邮箱：</span><input name="email" type="text" class="input" /><label>输入你自己的邮箱，用来取回密码</label></li>
<?{/if}?>

    <li><span>&nbsp;</span><input class="set_btn" type="submit" name="submit" value="取回密码" />
    </li>
    <?{/if}?>
    <?{/if}?>
   </ul>
   
</form>

   </div>
 </div>
</body>
<iframe id="doudouAd" src="about:blank" width="0" height="0"></iframe>
<script language="javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/function.js"></script>
</html>
