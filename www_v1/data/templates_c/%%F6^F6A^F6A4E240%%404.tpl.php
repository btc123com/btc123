<?php /* Smarty version 2.6.18, created on 2012-06-20 15:49:36
         compiled from theme/default/404.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8;" />
<title>找不到您访问的页面_<?php echo @PAGE_INDEX_TITLE; ?>
</title>
<meta name="description" content="<?php echo @PAGE_INDEX_DESCRIPTION; ?>
" />
<meta name="keywords" content="<?php echo @PAGE_INDEX_KEYWORDS; ?>
" />
<meta http-equiv="refresh" content="3;url=http://<?php echo @SITE_DOMAIN; ?>
">
<link href="http://<?php echo @SITE_DOMAIN; ?>
/theme/<?php echo @THEME_PATH; ?>
css/detail.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/<?php echo @THEME_PATH; ?>
js/jquery.min.js"></script>
<script type="text/javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/<?php echo @THEME_PATH; ?>
js/index.js?20101101"></script>
</head>

<body >
<div id="header_detail">
<div id="logo"><a href="http://<?php echo @SITE_DOMAIN; ?>
/"><img src="http://<?php echo @SITE_DOMAIN; ?>
/<?php echo @SITE_LOGO; ?>
" /></a></div>
 <div id="search_s"> <form id="baidu_search" name="f" action="http://www.baidu.com/s" method="get" target="_blank">
        <p><a href="http://www.baidu.com/index.php?tn=leebootool_pg&ch=7" target="_blank"><img src="http://<?php echo @SITE_DOMAIN; ?>
/static/images/logo_web.gif" id="baidu_logo" border="0" /></a>
        <input type="text" size=42  class="input" autocomplete="off" name="word" id="kw" style="height:26"/>
        <input type="submit" value="百度一下" class="submit">
        <input type="hidden" name='ct' id='ct' value="">
	<input type="hidden" name='tn' id='tn' value="">
	<input type="hidden" id='i' value="">
	</p>
        <span><a style=""></a></span></form></div></div>
<div id="main">

<table width="84%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:25px;">
  <tr>
    <td width="51%"><div align="left"><img src="http://<?php echo @SITE_DOMAIN; ?>
/static/images/404.jpg" /></div></td>
    <td width="49%">
    <div class="error">
      <h3>Oh! 404!</h3>
      <h4>对不起实在找不到您要的页面。</h4>
    <span>产生这一问题的原因可能是你输入了一个错误的网址，或者您
    <br />
    访问的页面可能已经删除、更名或暂时不可用。</span>
    <a href="http://<?php echo @SITE_DOMAIN; ?>
/">立即返回首页</a></div>
    </td>
  </tr>
</table>


</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['footer_path']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>

