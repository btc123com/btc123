<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?{$smarty.const.PAGE_INDEX_TITLE}?></title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="keywords" content="<?{$smarty.const.PAGE_INDEX_KEYWORDS}?>" />
<meta name="description" content="<?{$smarty.const.PAGE_INDEX_DESCRIPTION}?>" />
<link href="http://<?{$smarty.const.SITE_DOMAIN}?>/theme/<?{$smarty.const.THEME_PATH}?>css/detail.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/jquery.min.js"></script>
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/index.js?20101101"></script>
</head>
<body>
<div id="header_detail">
  <div id="logo"><a href="/"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/<?{$smarty.const.SITE_LOGO}?>" /></a></div>
  <div id="search_s"><form id="baidu_search" name="f" action="http://www.baidu.com/s" method="get" target="_blank">
        <p><a href="http://www.baidu.com/index.php?tn=leebootool_pg&ch=7" target="_blank"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/logo_web.gif" id="baidu_logo" border="0" /></a>
        <input type="text" size=42  class="input" autocomplete="off" name="word" id="kw" style="height:26"/>
        <input type="submit" value="百度一下" class="submit">
        <input type="hidden" name='ct' id='ct' value="">
	<input type="hidden" name='tn' id='tn' value="">
	<input type="hidden" id='i' value="">
	</p>
        <span><a style=""></a></span></form>
  </div>
</div>
<div class="bar_nav">
  <div class="tree"><a href="/">首页</a> > 主页修复</div>
  <div class="sethome2"><a href="javascript:;" onclick="setHomePage(this, 'http://<?{$smarty.const.SITE_DOMAIN}?>');">把<?{$smarty.const.SITE_DOMAIN}?>设为首页</a></div>
</div>
<div id="main">
  <dl>
    <dt><label><b><?{$smarty.const.SITE_NAME}?></b>主页被恶意篡改，我该怎么办？ </label></dt>
    <dd>方法一：使用首页修复工具软件<br />

      360安全卫士锁定主页&nbsp;&nbsp;&nbsp;<a href="360suoding.htm" target="_blank">使用说明>></a><br />

      方法二：使用桌面快捷方式<br />

    如何设置<font color="orange"><?{$smarty.const.SITE_DOMAIN}?></font>桌面快捷方式&nbsp;&nbsp;&nbsp;<a href="ies.htm" target="_blank">图示说明>></a></dd>
  </dl>
  <dl>
    <dt><label>在常用浏览器里，如何将<font color="orange"><?{$smarty.const.SITE_DOMAIN}?></font>设为主页？</label></dt>
    <dd>1.如何在ie里将<font color="orange"><?{$smarty.const.SITE_DOMAIN}?></font>设为主页？&nbsp;&nbsp;&nbsp;<a href="sheshouye.htm" target="_blank">点击查看详细步骤>></a> <br />
 
      2.<a href="sheshouyef.htm" target="_blank">如何在360浏览器、傲游、搜狗浏览器中设<font color="orange"><?{$smarty.const.SITE_DOMAIN}?></font>为主页？</a></dd>
  </dl>
  <dl>
    <dt><label><b><?{$smarty.const.SITE_NAME}?></b>主页打不开、显示不全，我该怎么办？ </label></dt>
    <dd class="line_b">方法一： 按<span class="red"> F5 或 Ctrl+F5 </span>重新加载主页<br />

      方法二：点击浏览器的刷新按钮，刷新页面<br />

      方法三：清除浏览器缓存&nbsp;&nbsp;&nbsp;<a href="huancun.htm" target="_blank">清缓存操作步骤>></a> </dd>
  </dl>
  <p style="text-align:center; padding:12px 0 0 0; clear:both">如果您身边的朋友也遇到同样的困扰，请您把本页地址告诉您的朋友！ </p>
</div>
<?{include file="$footer_path"}?>
</body>
</html>

