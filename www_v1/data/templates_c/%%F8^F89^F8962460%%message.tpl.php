<?php /* Smarty version 2.6.18, created on 2014-04-09 01:51:53
         compiled from theme/default/message.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'theme/default/message.tpl', 104, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>意见留言_<?php echo @PAGE_INDEX_TITLE; ?>
</title>
<link href="http://<?php echo @SITE_DOMAIN; ?>
/theme/<?php echo @THEME_PATH; ?>
css/detail.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/jquery.min.js"></script>
<script type="text/javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/index.js?20101101"></script>
<script language="javascript">
function checkMessage()
{
	var title   = $("#title").val();
	var content = $("#content").val();
	var contact = $("#contact").val();
	var yzm     = $("#yzm").val();
	var type    = $("#type").val();

	if (type == '') {
		alert('请选择板块!');
		return false;
	}

	if (title == '') {
		alert('请填写称呼!');
		return false;
	}

	if (content == '') {
		alert('请填写建议!');
		return false;
	}

	if (contact == '') {
		alert('请填写您的联系方式,如手机、QQ、电话号码!');
		return false;
	}

	if (yzm == '') {
		alert('请填写验证码!');
		return false;
	}
	else {
		if (!yzm.match(/^[0-9a-zA-Z]{4}$/)) {
			alert("对不起，验证码格式错误!");
			return false;
		}
	}
	return true;
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
  <div class="tree"><a href="/">首页</a> > 意见留言</div>
  <div class="sethome2"><a href="javascript:;" onclick="setHomePage(this, 'http://<?php echo @SITE_DOMAIN; ?>
');">把 btc123 设为首页</a></div>
</div>
<div id="main">
  <dl>
    <dt>
      <label>意见留言</label>
    </dt>
    <dd class="line_b" >
    <form action="message.php?a=add" method="post" onsubmit="return checkMessage();">
    <input type="hidden" name="urlfrom" value="<?php echo $this->_tpl_vars['urlfrom']; ?>
">
    <input type="hidden" name="type" id="type" value="1">
      <ul class="url">
        <li><span><em class="red">*</em>您的称呼：</span>
        <input type="text" name="title" id="title" value="<?php echo @SITE_NAME; ?>
用户" onclick="if(this.value=='<?php echo @SITE_NAME; ?>
用户'){select();}"/>
        </li>
        <li><span>您的建议：</span>
          <textarea name="content" id="content"></textarea>
        </li>
        <li><span>您的邮箱或QQ：</span>
          <input type="text" name="contact" id="contact" value=""/>
        </li>
        <li><span>验证码：</span>
        <input type="text" name="yzm" id="yzm" style="width:60px"/>
          <label><img src="class/safeCode.img.php" onclick="this.src = this.src+'?'+Math.random()"  /> </label>
          <input type="submit" value="提交" class="submit" />
        </li>
      </ul>
     </form>
    </dd>
  </dl>

<div class="qa">
	<?php $_from = $this->_tpl_vars['arrMessage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['arrMessage'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['arrMessage']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['arrMessage']['iteration']++;
?>
    <div class="mesItem">
      <div class="qa_title"><span class="number"><?php echo $this->_tpl_vars['list']['mid']; ?>
</span><span class="user_name"><?php echo $this->_tpl_vars['list']['title']; ?>
</span><span class="time"><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['createDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</span></div>
      <div class="qustion"><?php echo $this->_tpl_vars['list']['content']; ?>
</div>
     <div class="answer">
       <B>btc123.com管理员：</B>
       <p><?php echo $this->_tpl_vars['list']['reply']; ?>
</p>
      </div>
    </div>
  <?php endforeach; endif; unset($_from); ?>
  <div class="page"><?php echo $this->_tpl_vars['pager']; ?>
</div>
  </div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['footer_path']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>