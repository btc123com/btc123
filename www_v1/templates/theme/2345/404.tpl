<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8;" />
<title>找不到您访问的页面_<?{$smarty.const.PAGE_INDEX_TITLE}?></title>
<meta name="description" content="<?{$smarty.const.PAGE_INDEX_DESCRIPTION}?>" />
<meta name="keywords" content="<?{$smarty.const.PAGE_INDEX_KEYWORDS}?>" />
<link href="http://<?{$smarty.const.SITE_DOMAIN}?>/theme/<?{$smarty.const.THEME_PATH}?>css/base.css" rel="stylesheet" type="text/css" id="links"/>
<link href="http://<?{$smarty.const.SITE_DOMAIN}?>/theme/<?{$smarty.const.THEME_PATH}?>css/global.css" rel="stylesheet" type="text/css" id="links"/>
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/<?{$smarty.const.THEME_PATH}?>js/jquery.min.js"></script>
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/<?{$smarty.const.THEME_PATH}?>js/index.js?20101101"></script>
</head>

<body >
<div id="header_detail">
<div id="logo"><a href="http://<?{$smarty.const.SITE_DOMAIN}?>/"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/<?{$smarty.const.SITE_LOGO}?>" /></a></div>
 <div id="search_s"> <form id="baidu_search" name="f" action="http://www.baidu.com/s" method="get" target="_blank">
        <p><a href="http://www.baidu.com/index.php?tn=leebootool_pg&ch=7" target="_blank"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/logo_web.gif" id="baidu_logo" border="0" /></a>
        <input type="text" size=42  class="input" autocomplete="off" name="word" id="kw" style="height:26"/>
        <input type="submit" value="百度一下" class="submit">
        <input type="hidden" name='ct' id='ct' value="">
	<input type="hidden" name='tn' id='tn' value="">
	<input type="hidden" id='i' value="">
	</p>
        <span><a style=""></a></span></form></div></div>
<div id="main_detail">

<table width="84%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:25px;">
  <tr>
    <td width="51%"><div align="left"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/404.jpg" /></div></td>
    <td width="49%">
    <div class="error">
      <h3>Oh! 404!</h3>
      <h4>对不起实在找不到您要的页面。</h4>
    <span>产生这一问题的原因可能是你输入了一个错误的网址，或者您
    <br />
    访问的页面可能已经删除、更名或暂时不可用。</span>
    <a href="http://<?{$smarty.const.SITE_DOMAIN}?>/">立即返回首页</a></div>
    </td>
  </tr>
</table>


</div>
<?{include file="$footer_path"}?>
</body>
</html>
