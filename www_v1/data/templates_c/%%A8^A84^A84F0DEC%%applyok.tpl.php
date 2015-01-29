<?php /* Smarty version 2.6.18, created on 2013-06-29 21:25:24
         compiled from theme/default/applyok.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>提交网站_<?php echo @PAGE_INDEX_TITLE; ?>
</title>
<meta name="keywords" content="<?php echo @PAGE_INDEX_KEYWORDS; ?>
" />
<meta name="description" content="<?php echo @PAGE_INDEX_DESCRIPTION; ?>
" />
<title><?php echo @PAGE_INDEX_TITLE; ?>
</title>
<link href="http://<?php echo @SITE_DOMAIN; ?>
/theme/<?php echo @THEME_PATH; ?>
css/detail.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/jquery.min.js"></script>
<script type="text/javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/index.js?20101101"></script>
<script language="javascript">
function copyText(obj)
{
	var text = $('#'+obj).val();
	if(window.clipboardData) { 
		window.clipboardData.setData("Text",text);
		alert("复制成功!"); 
	}
	else {
		alert("该浏览器不支持,请自己复制代码!"); 
	}
}
</script>
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
  <div class="tree"><a href="/">首页</a> > 收录申请提交结果</div>
  <div class="sethome2"><a href="javascript:;" onclick="setHomePage(this, 'http://<?php echo @SITE_DOMAIN; ?>
');">把 btc123 设为首页</a></div>
</div>
<div id="main">
  <dl>
    <dt>
      <label>提交您的站点信息</label>
    </dt>
    <dd class="line_b" >
      <div class="tip">
        <h2>恭喜您！您的站点信息已经提交成功！</h2>
        <span>请在您的首页添加<?php echo @SITE_NAME; ?>
的友情链接，我们的工作人员将开始对您的网站进行审核，未添加<?php echo @SITE_NAME; ?>
友情链接的站点将无法通过审核。</span> </div>
      <ul class="link">
      <li><h2>友情链接示例:</h2></li>
        <li><span>网站说明：</span>
          <?php echo @SITE_NAME; ?>

          <label></label>
        </li>
        <li><span>首页地址：</span>
          <?php echo @SITE_DOMAIN; ?>

          <label></label>
        </li>
        <li><span>文字链接：</span>
          <input type="text" id="textLinkCode" value="&lt;a href=&quot;http://<?php echo @SITE_DOMAIN; ?>
&quot; target=&quot;_blank&quot;&gt;<?php echo @SITE_NAME; ?>
&lt;/a&gt;" />
          <label><a href="javascript:copyText('textLinkCode');">点击复制</a></label>
        </li>
        <li><span>图片链接：</span><img src="http://<?php echo @SITE_DOMAIN; ?>
/<?php echo @SITE_LOGO; ?>
" />
          <label></label>
        </li>
        <li><span>图片代码：</span>
         <textarea cols="" rows="" id="imgLinkCode"><a href="http://<?php echo @SITE_DOMAIN; ?>
/" target="_blank"><img alt="<?php echo @SITE_NAME; ?>
" src="http://<?php echo @SITE_DOMAIN; ?>
/<?php echo @SITE_LOGO; ?>
" width="214" height="60" border="0" /></a></textarea>
          <label><a href="javascript:copyText('imgLinkCode');">点击复制</a></label>
        </li>
      </ul>
    </dd>
  </dl>
  <div class="yaoqiu">
    <h1><?php echo @SITE_NAME; ?>
收录有以下要求：</h1>
    <ul>
      <li>Alexa排名20万以内，且经常更新的各类网站。</li>
      <li>网站内容健康，合法,无病毒及不良插件，已在信息产业部ICP/IP备案的网站。</li>
      <li>添加<?php echo @SITE_NAME; ?>
友情链接,未添加的将不予以收录。</li>
    </ul>
  </div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['footer_path']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>
