<?php /* Smarty version 2.6.18, created on 2013-08-11 23:36:49
         compiled from theme/default/about.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>关于我们 - <?php echo @PAGE_INDEX_TITLE; ?>
</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="keywords" content="<?php echo @PAGE_INDEX_KEYWORDS; ?>
" />
<meta name="description" content="<?php echo @PAGE_INDEX_DESCRIPTION; ?>
" />
<link href="http://<?php echo @SITE_DOMAIN; ?>
/theme/<?php echo @THEME_PATH; ?>
css/detail.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/jquery.min.js"></script>
<script type="text/javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/index.js?20101101"></script>
</head>
<body>
<div id="header_detail">
  <div id="logo"><a href="/"><img src="http://<?php echo @SITE_DOMAIN; ?>
/<?php echo @SITE_LOGO; ?>
" /></a></div>
  <div id="search_s"><form id="baidu_search" name="f" action="http://www.baidu.com/s" method="get" target="_blank">
        <p><a href="http://www.baidu.com/index.php?tn=leebootool_pg&ch=7" target="_blank"><img src="http://<?php echo @SITE_DOMAIN; ?>
/static/images/logo_web.gif" id="baidu_logo" border="0" /></a>
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
  <div class="tree"><a href="/">首页</a> > 关于<?php echo @SITE_NAME; ?>
</div>
  <div class="sethome2"><a href="javascript:;" onclick="setHomePage(this, 'http://<?php echo @SITE_DOMAIN; ?>
');">把 btc123 设为首页</a></div>
</div>
<div id="main">
  <dl>
    <dt><label>关于<?php echo @SITE_NAME; ?>
 </label></dt>
    <dd class="line_b"><b><?php echo @SITE_NAME; ?>
</b>，收录所有关于比特币的网站，提供比特币资讯，信息。<br />
方便比特币爱好者扩大关于比特币的了解和知晓关于比特币的最新讯息。<br />
欢迎使用&nbsp;<?php echo @SITE_NAME; ?>
！<br /><br />

<h2>联系方式</h2>
如果有任何意见或建议，请致信：<a href="mailto:<?php echo @ADMIN_EMAIL; ?>
"><?php echo @ADMIN_EMAIL; ?>
</a></dd>
  </dl>
  
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['footer_path']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>
