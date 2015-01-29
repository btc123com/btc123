<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?{$smarty.const.PAGE_INDEX_TITLE}?></title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="keywords" content="<?{$smarty.const.PAGE_INDEX_KEYWORDS}?>" />
<meta name="description" content="<?{$smarty.const.PAGE_INDEX_DESCRIPTION}?>" />
<link href="http://<?{$smarty.const.SITE_DOMAIN}?>/theme/<?{$smarty.const.THEME_PATH}?>css/base.css" rel="stylesheet" type="text/css" id="links"/>
<link href="http://<?{$smarty.const.SITE_DOMAIN}?>/theme/<?{$smarty.const.THEME_PATH}?>css/global.css" rel="stylesheet" type="text/css" id="links"/>
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
  <div class="tree"><a href="/">首页</a> > 关于<?{$smarty.const.SITE_NAME}?></div>
  <div class="sethome2"><a href="javascript:;" onclick="setHomePage(this, 'http://<?{$smarty.const.SITE_DOMAIN}?>');">把<?{$smarty.const.SITE_NAME}?>设为首页</a></div>
</div>
<div id="main_detail">
  <dl>
    <dt><label>关于<?{$smarty.const.SITE_NAME}?> </label></dt>
    <dd class="line_b"><?{$smarty.const.SITE_NAME}?>网址导航站是一家专业的网址导航网站,网址导航收录最新最齐全的网址站！<br /><br />
<?{$smarty.const.SITE_NAME}?>导航站整合了网址导航站,以快捷、实用、方便、特色、个性等优点，让您体验高速上网导航的乐趣！<br />
<br />
欢迎使用<?{$smarty.const.SITE_NAME}?><br /><br />

<h2>联系方式</h2>
如果有任何意见或建议，请致信：<a href="mailto:<?{$smarty.const.ADMIN_EMAIL}?>"><?{$smarty.const.ADMIN_EMAIL}?></a></dd>
  </dl>
  
</div>
<?{include file="$footer_path"}?>
</body>
</html>

