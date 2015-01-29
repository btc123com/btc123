<?php /* Smarty version 2.6.18, created on 2013-08-12 00:47:51
         compiled from theme/default/sub.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'theme/default/sub.tpl', 59, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if ($this->_tpl_vars['c_name']['title'] != ''): ?><?php echo $this->_tpl_vars['c_name']['title']; ?>
<?php else: ?><?php echo $this->_tpl_vars['notag_c_name']; ?>
<?php echo @PAGE_INDEX_TITLE; ?>
<?php endif; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta  name="keywords" content="<?php if ($this->_tpl_vars['c_name']['keywords'] != ''): ?><?php echo $this->_tpl_vars['c_name']['keywords']; ?>
<?php else: ?><?php echo @PAGE_INDEX_KEYWORDS; ?>
<?php endif; ?>"  />
<meta  name="description" content="<?php if ($this->_tpl_vars['c_name']['description'] != ''): ?><?php echo $this->_tpl_vars['c_name']['description']; ?>
<?php else: ?><?php echo @PAGE_INDEX_DESCRIPTION; ?>
<?php endif; ?>"  />
<link href="http://<?php echo @SITE_DOMAIN; ?>
/theme/<?php echo @THEME_PATH; ?>
css/style_default.css" rel="stylesheet" type="text/css" id="links"/>

<script type="text/javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/jquery.min.js"></script>
<script  type="text/javascript" charset="utf-8" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/taobao.js"></script>
<script type="text/javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/index.js?20101101"></script>
<base target="_blank" />
</head>
<body>
<script language="javascript">

	var pCss = getCookie('pcss');
	var css='';
	if(pCss == 'green'){
		css ='http://<?php echo @SITE_DOMAIN; ?>
/theme/<?php echo @THEME_PATH; ?>
css/style_green.css?20101101';
	}else if(pCss == 'pink'){
		css ='http://<?php echo @SITE_DOMAIN; ?>
/theme/<?php echo @THEME_PATH; ?>
css/style_pink.css?20101101';
	}
	if(css != '')
		document.getElementById('links').href = css;
</script>
<div id="header_detail">
<div id="logo"><a href="http://<?php echo @SITE_DOMAIN; ?>
/"><img alt="BTC123_LOGO" src="http://<?php echo @SITE_DOMAIN; ?>
/<?php echo @SITE_LOGO; ?>
" /></a></div>
<style>
#suggest_box{position:absolute;display:none;z-index:1100;text-align:left;}#suggest_box table{border:1px #333 solid;background:#fff;text-align:right;}#suggest_box tr{line-height:17px;}#suggest_box .hover{background:#36c;color:#fff;}
#suggest_box .hover .suggest_keyword,#suggest_box .hover .suggest_num{color:#fff;}
.suggest_keyword{text-align:left;padding:0 1em 0 3px;font-size:13px;overflow:hidden;white-space:nowrap;color:#000;}.suggest_num{color:green;font-size:12px;overflow:hidden;padding:0 3px;text-align:right;white-space:nowrap;}
</style>
<div id="search_s">
<ul id="s_ul_detail">
<li id="so_14" onclick="neichange(14)"><a>购物</a></li>
<li id="so_2" class="cur" onclick="neichange(2)"><a>网页</a></li>
<li id="so_9" onclick="neichange(9)"><a>MP3</a></li>
<li id="so_8" onclick="neichange(8)"><a>新闻</a></li>
<li id="so_10" onclick="neichange(10)"><a>视频</a></li>
<li id="so_11" onclick="neichange(11)"><a>图片</a></li>
<li id="so_12" onclick="neichange(12)"><a>地图</a></li>
<li id="so_13" onclick="neichange(13)"><a>问答</a></li>
</ul>
<div id="sform_detail">
<form name="f" action="<?php echo $this->_tpl_vars['defaultsearch']['action']; ?>
" method="get" accept-charset="gbk" onsubmit="document.charset='gbk';">
<p><a href="<?php echo $this->_tpl_vars['defaultsearch']['url']; ?>
"><img alt="search_engine" src="../<?php echo $this->_tpl_vars['defaultsearch']['img_url']; ?>
" border="0"></a>
<input type="text" style=" width:262px" class="int" autocomplete="off" name="<?php echo $this->_tpl_vars['defaultsearch']['name']; ?>
" name="w" id="kw"/>
<?php $_from = $this->_tpl_vars['params']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
<input type="hidden" name="<?php echo $this->_tpl_vars['p'][0]; ?>
" value="<?php echo $this->_tpl_vars['p'][1]; ?>
"/>
<?php endforeach; endif; unset($_from); ?>
<input type="submit" value="<?php echo $this->_tpl_vars['defaultsearch']['btn']; ?>
" id="bdbutton" class="searchint">
</p></form></div>
</div>
 <?php $_from = $this->_tpl_vars['adneiye']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adneiye']):
?>
 <div class="alima">
<?php echo ((is_array($_tmp=$this->_tpl_vars['adneiye']['content'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

 </div>
 <?php endforeach; endif; unset($_from); ?></div>
<div class="bar_nav">
<div class="bar_left"></div>
<div class="tree"><a href="http://<?php echo @SITE_DOMAIN; ?>
/" target="_top">btc123导航首页</a> >> <a href="http://<?php echo @SITE_DOMAIN; ?>
/<?php echo @HTML_PATH; ?>
<?php echo $this->_tpl_vars['c_name']['stpHtmlName']; ?>
"><?php echo $this->_tpl_vars['c_name']['stpName']; ?>
</a></div>
<div class="bar_right"></div><div class="sethome2"><a href="javascript:;" onclick="setHomePage(this, 'http://<?php echo @SITE_DOMAIN; ?>
');">把<?php echo @SITE_NAME; ?>
设为首页</a></div>
</div>
<?php if ($this->_tpl_vars['dirsite'] || $this->_tpl_vars['coolSiteList']): ?>
<div class="con">
<?php if ($this->_tpl_vars['dirsite']): ?>
<h2><a name="a"><?php echo $this->_tpl_vars['c_name']['stpName']; ?>
</a></h2>
<table width="100%" border="0" cellpadding="0" cellspacing="1" id="tab_s">
<tr>
<?php $_from = $this->_tpl_vars['dirsite']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list1']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['dirsites']):
        $this->_foreach['list1']['iteration']++;
?>
<td<?php if (($this->_foreach['list1']['iteration']-1) < 5): ?> width="20%"<?php endif; ?>><a style="<?php if ($this->_tpl_vars['dirsites']['siteColor'] != ''): ?>color:<?php echo $this->_tpl_vars['dirsites']['sitecolor']; ?>
<?php endif; ?>" href="<?php echo $this->_tpl_vars['dirsites']['siteUrl']; ?>
"><?php echo $this->_tpl_vars['dirsites']['siteName']; ?>
</a></td>
<?php if (( ($this->_foreach['list1']['iteration']-1)+1 ) % 5 == 0): ?></tr><tr><?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_foreach['list1']['total'] % 5 == 1): ?>
<?php unset($this->_sections['addition']);
$this->_sections['addition']['name'] = 'addition';
$this->_sections['addition']['loop'] = is_array($_loop=$this->_tpl_vars['nullfor']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['addition']['start'] = (int)0;
$this->_sections['addition']['max'] = (int)4;
$this->_sections['addition']['show'] = true;
if ($this->_sections['addition']['max'] < 0)
    $this->_sections['addition']['max'] = $this->_sections['addition']['loop'];
$this->_sections['addition']['step'] = 1;
if ($this->_sections['addition']['start'] < 0)
    $this->_sections['addition']['start'] = max($this->_sections['addition']['step'] > 0 ? 0 : -1, $this->_sections['addition']['loop'] + $this->_sections['addition']['start']);
else
    $this->_sections['addition']['start'] = min($this->_sections['addition']['start'], $this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] : $this->_sections['addition']['loop']-1);
if ($this->_sections['addition']['show']) {
    $this->_sections['addition']['total'] = min(ceil(($this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] - $this->_sections['addition']['start'] : $this->_sections['addition']['start']+1)/abs($this->_sections['addition']['step'])), $this->_sections['addition']['max']);
    if ($this->_sections['addition']['total'] == 0)
        $this->_sections['addition']['show'] = false;
} else
    $this->_sections['addition']['total'] = 0;
if ($this->_sections['addition']['show']):

            for ($this->_sections['addition']['index'] = $this->_sections['addition']['start'], $this->_sections['addition']['iteration'] = 1;
                 $this->_sections['addition']['iteration'] <= $this->_sections['addition']['total'];
                 $this->_sections['addition']['index'] += $this->_sections['addition']['step'], $this->_sections['addition']['iteration']++):
$this->_sections['addition']['rownum'] = $this->_sections['addition']['iteration'];
$this->_sections['addition']['index_prev'] = $this->_sections['addition']['index'] - $this->_sections['addition']['step'];
$this->_sections['addition']['index_next'] = $this->_sections['addition']['index'] + $this->_sections['addition']['step'];
$this->_sections['addition']['first']      = ($this->_sections['addition']['iteration'] == 1);
$this->_sections['addition']['last']       = ($this->_sections['addition']['iteration'] == $this->_sections['addition']['total']);
?><td>&nbsp;</td><?php endfor; endif; ?>
<?php endif; ?>
<?php if ($this->_foreach['list1']['total'] % 5 == 2): ?>
<?php unset($this->_sections['addition']);
$this->_sections['addition']['name'] = 'addition';
$this->_sections['addition']['loop'] = is_array($_loop=$this->_tpl_vars['nullfor']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['addition']['start'] = (int)0;
$this->_sections['addition']['max'] = (int)3;
$this->_sections['addition']['show'] = true;
if ($this->_sections['addition']['max'] < 0)
    $this->_sections['addition']['max'] = $this->_sections['addition']['loop'];
$this->_sections['addition']['step'] = 1;
if ($this->_sections['addition']['start'] < 0)
    $this->_sections['addition']['start'] = max($this->_sections['addition']['step'] > 0 ? 0 : -1, $this->_sections['addition']['loop'] + $this->_sections['addition']['start']);
else
    $this->_sections['addition']['start'] = min($this->_sections['addition']['start'], $this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] : $this->_sections['addition']['loop']-1);
if ($this->_sections['addition']['show']) {
    $this->_sections['addition']['total'] = min(ceil(($this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] - $this->_sections['addition']['start'] : $this->_sections['addition']['start']+1)/abs($this->_sections['addition']['step'])), $this->_sections['addition']['max']);
    if ($this->_sections['addition']['total'] == 0)
        $this->_sections['addition']['show'] = false;
} else
    $this->_sections['addition']['total'] = 0;
if ($this->_sections['addition']['show']):

            for ($this->_sections['addition']['index'] = $this->_sections['addition']['start'], $this->_sections['addition']['iteration'] = 1;
                 $this->_sections['addition']['iteration'] <= $this->_sections['addition']['total'];
                 $this->_sections['addition']['index'] += $this->_sections['addition']['step'], $this->_sections['addition']['iteration']++):
$this->_sections['addition']['rownum'] = $this->_sections['addition']['iteration'];
$this->_sections['addition']['index_prev'] = $this->_sections['addition']['index'] - $this->_sections['addition']['step'];
$this->_sections['addition']['index_next'] = $this->_sections['addition']['index'] + $this->_sections['addition']['step'];
$this->_sections['addition']['first']      = ($this->_sections['addition']['iteration'] == 1);
$this->_sections['addition']['last']       = ($this->_sections['addition']['iteration'] == $this->_sections['addition']['total']);
?><td>&nbsp;</td><?php endfor; endif; ?>
<?php endif; ?>
<?php if ($this->_foreach['list1']['total'] % 5 == 3): ?>
<?php unset($this->_sections['addition']);
$this->_sections['addition']['name'] = 'addition';
$this->_sections['addition']['loop'] = is_array($_loop=$this->_tpl_vars['nullfor']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['addition']['start'] = (int)0;
$this->_sections['addition']['max'] = (int)2;
$this->_sections['addition']['show'] = true;
if ($this->_sections['addition']['max'] < 0)
    $this->_sections['addition']['max'] = $this->_sections['addition']['loop'];
$this->_sections['addition']['step'] = 1;
if ($this->_sections['addition']['start'] < 0)
    $this->_sections['addition']['start'] = max($this->_sections['addition']['step'] > 0 ? 0 : -1, $this->_sections['addition']['loop'] + $this->_sections['addition']['start']);
else
    $this->_sections['addition']['start'] = min($this->_sections['addition']['start'], $this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] : $this->_sections['addition']['loop']-1);
if ($this->_sections['addition']['show']) {
    $this->_sections['addition']['total'] = min(ceil(($this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] - $this->_sections['addition']['start'] : $this->_sections['addition']['start']+1)/abs($this->_sections['addition']['step'])), $this->_sections['addition']['max']);
    if ($this->_sections['addition']['total'] == 0)
        $this->_sections['addition']['show'] = false;
} else
    $this->_sections['addition']['total'] = 0;
if ($this->_sections['addition']['show']):

            for ($this->_sections['addition']['index'] = $this->_sections['addition']['start'], $this->_sections['addition']['iteration'] = 1;
                 $this->_sections['addition']['iteration'] <= $this->_sections['addition']['total'];
                 $this->_sections['addition']['index'] += $this->_sections['addition']['step'], $this->_sections['addition']['iteration']++):
$this->_sections['addition']['rownum'] = $this->_sections['addition']['iteration'];
$this->_sections['addition']['index_prev'] = $this->_sections['addition']['index'] - $this->_sections['addition']['step'];
$this->_sections['addition']['index_next'] = $this->_sections['addition']['index'] + $this->_sections['addition']['step'];
$this->_sections['addition']['first']      = ($this->_sections['addition']['iteration'] == 1);
$this->_sections['addition']['last']       = ($this->_sections['addition']['iteration'] == $this->_sections['addition']['total']);
?><td>&nbsp;</td><?php endfor; endif; ?>
<?php endif; ?>
<?php if ($this->_foreach['list1']['total'] % 5 == 4): ?>
<?php unset($this->_sections['addition']);
$this->_sections['addition']['name'] = 'addition';
$this->_sections['addition']['loop'] = is_array($_loop=$this->_tpl_vars['nullfor']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['addition']['start'] = (int)0;
$this->_sections['addition']['max'] = (int)1;
$this->_sections['addition']['show'] = true;
if ($this->_sections['addition']['max'] < 0)
    $this->_sections['addition']['max'] = $this->_sections['addition']['loop'];
$this->_sections['addition']['step'] = 1;
if ($this->_sections['addition']['start'] < 0)
    $this->_sections['addition']['start'] = max($this->_sections['addition']['step'] > 0 ? 0 : -1, $this->_sections['addition']['loop'] + $this->_sections['addition']['start']);
else
    $this->_sections['addition']['start'] = min($this->_sections['addition']['start'], $this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] : $this->_sections['addition']['loop']-1);
if ($this->_sections['addition']['show']) {
    $this->_sections['addition']['total'] = min(ceil(($this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] - $this->_sections['addition']['start'] : $this->_sections['addition']['start']+1)/abs($this->_sections['addition']['step'])), $this->_sections['addition']['max']);
    if ($this->_sections['addition']['total'] == 0)
        $this->_sections['addition']['show'] = false;
} else
    $this->_sections['addition']['total'] = 0;
if ($this->_sections['addition']['show']):

            for ($this->_sections['addition']['index'] = $this->_sections['addition']['start'], $this->_sections['addition']['iteration'] = 1;
                 $this->_sections['addition']['iteration'] <= $this->_sections['addition']['total'];
                 $this->_sections['addition']['index'] += $this->_sections['addition']['step'], $this->_sections['addition']['iteration']++):
$this->_sections['addition']['rownum'] = $this->_sections['addition']['iteration'];
$this->_sections['addition']['index_prev'] = $this->_sections['addition']['index'] - $this->_sections['addition']['step'];
$this->_sections['addition']['index_next'] = $this->_sections['addition']['index'] + $this->_sections['addition']['step'];
$this->_sections['addition']['first']      = ($this->_sections['addition']['iteration'] == 1);
$this->_sections['addition']['last']       = ($this->_sections['addition']['iteration'] == $this->_sections['addition']['total']);
?><td>&nbsp;</td><?php endfor; endif; ?>
<?php endif; ?>
</tr>
</table>
<?php endif; ?>
<?php if ($this->_tpl_vars['coolSiteList']): ?>
<?php $_from = $this->_tpl_vars['coolSiteList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['num'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['num']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['coolSite'] => $this->_tpl_vars['list']):
        $this->_foreach['num']['iteration']++;
?>
<h2><a name="a<?php echo ($this->_foreach['num']['iteration']-1); ?>
"><?php echo $this->_tpl_vars['coolSite']; ?>
</a></h2>
<table width="100%" border="0" cellpadding="0" cellspacing="1" id="tab_s">
<tr>
<?php $_from = $this->_tpl_vars['list'][1]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tempsite']):
        $this->_foreach['list']['iteration']++;
?>
<td<?php if (($this->_foreach['list']['iteration']-1) < 5): ?> width="20%"<?php endif; ?>><a <?php if ($this->_tpl_vars['tempsite']['siteColor'] != ''): ?>style="color:<?php echo $this->_tpl_vars['tempsite']['siteColor']; ?>
"<?php endif; ?> href="<?php echo $this->_tpl_vars['tempsite']['siteUrl']; ?>
"><?php echo $this->_tpl_vars['tempsite']['siteName']; ?>
</a></td>
<?php if (( ($this->_foreach['list']['iteration']-1)+1 ) % 5 == 0): ?></tr><tr><?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_foreach['list']['total'] % 5 == 1): ?>
<?php unset($this->_sections['addition']);
$this->_sections['addition']['name'] = 'addition';
$this->_sections['addition']['loop'] = is_array($_loop=$this->_tpl_vars['nullfor']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['addition']['start'] = (int)0;
$this->_sections['addition']['max'] = (int)4;
$this->_sections['addition']['show'] = true;
if ($this->_sections['addition']['max'] < 0)
    $this->_sections['addition']['max'] = $this->_sections['addition']['loop'];
$this->_sections['addition']['step'] = 1;
if ($this->_sections['addition']['start'] < 0)
    $this->_sections['addition']['start'] = max($this->_sections['addition']['step'] > 0 ? 0 : -1, $this->_sections['addition']['loop'] + $this->_sections['addition']['start']);
else
    $this->_sections['addition']['start'] = min($this->_sections['addition']['start'], $this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] : $this->_sections['addition']['loop']-1);
if ($this->_sections['addition']['show']) {
    $this->_sections['addition']['total'] = min(ceil(($this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] - $this->_sections['addition']['start'] : $this->_sections['addition']['start']+1)/abs($this->_sections['addition']['step'])), $this->_sections['addition']['max']);
    if ($this->_sections['addition']['total'] == 0)
        $this->_sections['addition']['show'] = false;
} else
    $this->_sections['addition']['total'] = 0;
if ($this->_sections['addition']['show']):

            for ($this->_sections['addition']['index'] = $this->_sections['addition']['start'], $this->_sections['addition']['iteration'] = 1;
                 $this->_sections['addition']['iteration'] <= $this->_sections['addition']['total'];
                 $this->_sections['addition']['index'] += $this->_sections['addition']['step'], $this->_sections['addition']['iteration']++):
$this->_sections['addition']['rownum'] = $this->_sections['addition']['iteration'];
$this->_sections['addition']['index_prev'] = $this->_sections['addition']['index'] - $this->_sections['addition']['step'];
$this->_sections['addition']['index_next'] = $this->_sections['addition']['index'] + $this->_sections['addition']['step'];
$this->_sections['addition']['first']      = ($this->_sections['addition']['iteration'] == 1);
$this->_sections['addition']['last']       = ($this->_sections['addition']['iteration'] == $this->_sections['addition']['total']);
?><td>&nbsp;</td><?php endfor; endif; ?>
<?php endif; ?>
<?php if ($this->_foreach['list']['total'] % 5 == 2): ?>
<?php unset($this->_sections['addition']);
$this->_sections['addition']['name'] = 'addition';
$this->_sections['addition']['loop'] = is_array($_loop=$this->_tpl_vars['nullfor']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['addition']['start'] = (int)0;
$this->_sections['addition']['max'] = (int)3;
$this->_sections['addition']['show'] = true;
if ($this->_sections['addition']['max'] < 0)
    $this->_sections['addition']['max'] = $this->_sections['addition']['loop'];
$this->_sections['addition']['step'] = 1;
if ($this->_sections['addition']['start'] < 0)
    $this->_sections['addition']['start'] = max($this->_sections['addition']['step'] > 0 ? 0 : -1, $this->_sections['addition']['loop'] + $this->_sections['addition']['start']);
else
    $this->_sections['addition']['start'] = min($this->_sections['addition']['start'], $this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] : $this->_sections['addition']['loop']-1);
if ($this->_sections['addition']['show']) {
    $this->_sections['addition']['total'] = min(ceil(($this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] - $this->_sections['addition']['start'] : $this->_sections['addition']['start']+1)/abs($this->_sections['addition']['step'])), $this->_sections['addition']['max']);
    if ($this->_sections['addition']['total'] == 0)
        $this->_sections['addition']['show'] = false;
} else
    $this->_sections['addition']['total'] = 0;
if ($this->_sections['addition']['show']):

            for ($this->_sections['addition']['index'] = $this->_sections['addition']['start'], $this->_sections['addition']['iteration'] = 1;
                 $this->_sections['addition']['iteration'] <= $this->_sections['addition']['total'];
                 $this->_sections['addition']['index'] += $this->_sections['addition']['step'], $this->_sections['addition']['iteration']++):
$this->_sections['addition']['rownum'] = $this->_sections['addition']['iteration'];
$this->_sections['addition']['index_prev'] = $this->_sections['addition']['index'] - $this->_sections['addition']['step'];
$this->_sections['addition']['index_next'] = $this->_sections['addition']['index'] + $this->_sections['addition']['step'];
$this->_sections['addition']['first']      = ($this->_sections['addition']['iteration'] == 1);
$this->_sections['addition']['last']       = ($this->_sections['addition']['iteration'] == $this->_sections['addition']['total']);
?><td>&nbsp;</td><?php endfor; endif; ?>
<?php endif; ?>
<?php if ($this->_foreach['list']['total'] % 5 == 3): ?>
<?php unset($this->_sections['addition']);
$this->_sections['addition']['name'] = 'addition';
$this->_sections['addition']['loop'] = is_array($_loop=$this->_tpl_vars['nullfor']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['addition']['start'] = (int)0;
$this->_sections['addition']['max'] = (int)2;
$this->_sections['addition']['show'] = true;
if ($this->_sections['addition']['max'] < 0)
    $this->_sections['addition']['max'] = $this->_sections['addition']['loop'];
$this->_sections['addition']['step'] = 1;
if ($this->_sections['addition']['start'] < 0)
    $this->_sections['addition']['start'] = max($this->_sections['addition']['step'] > 0 ? 0 : -1, $this->_sections['addition']['loop'] + $this->_sections['addition']['start']);
else
    $this->_sections['addition']['start'] = min($this->_sections['addition']['start'], $this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] : $this->_sections['addition']['loop']-1);
if ($this->_sections['addition']['show']) {
    $this->_sections['addition']['total'] = min(ceil(($this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] - $this->_sections['addition']['start'] : $this->_sections['addition']['start']+1)/abs($this->_sections['addition']['step'])), $this->_sections['addition']['max']);
    if ($this->_sections['addition']['total'] == 0)
        $this->_sections['addition']['show'] = false;
} else
    $this->_sections['addition']['total'] = 0;
if ($this->_sections['addition']['show']):

            for ($this->_sections['addition']['index'] = $this->_sections['addition']['start'], $this->_sections['addition']['iteration'] = 1;
                 $this->_sections['addition']['iteration'] <= $this->_sections['addition']['total'];
                 $this->_sections['addition']['index'] += $this->_sections['addition']['step'], $this->_sections['addition']['iteration']++):
$this->_sections['addition']['rownum'] = $this->_sections['addition']['iteration'];
$this->_sections['addition']['index_prev'] = $this->_sections['addition']['index'] - $this->_sections['addition']['step'];
$this->_sections['addition']['index_next'] = $this->_sections['addition']['index'] + $this->_sections['addition']['step'];
$this->_sections['addition']['first']      = ($this->_sections['addition']['iteration'] == 1);
$this->_sections['addition']['last']       = ($this->_sections['addition']['iteration'] == $this->_sections['addition']['total']);
?><td>&nbsp;</td><?php endfor; endif; ?>
<?php endif; ?>
<?php if ($this->_foreach['list']['total'] % 5 == 4): ?>
<?php unset($this->_sections['addition']);
$this->_sections['addition']['name'] = 'addition';
$this->_sections['addition']['loop'] = is_array($_loop=$this->_tpl_vars['nullfor']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['addition']['start'] = (int)0;
$this->_sections['addition']['max'] = (int)1;
$this->_sections['addition']['show'] = true;
if ($this->_sections['addition']['max'] < 0)
    $this->_sections['addition']['max'] = $this->_sections['addition']['loop'];
$this->_sections['addition']['step'] = 1;
if ($this->_sections['addition']['start'] < 0)
    $this->_sections['addition']['start'] = max($this->_sections['addition']['step'] > 0 ? 0 : -1, $this->_sections['addition']['loop'] + $this->_sections['addition']['start']);
else
    $this->_sections['addition']['start'] = min($this->_sections['addition']['start'], $this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] : $this->_sections['addition']['loop']-1);
if ($this->_sections['addition']['show']) {
    $this->_sections['addition']['total'] = min(ceil(($this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] - $this->_sections['addition']['start'] : $this->_sections['addition']['start']+1)/abs($this->_sections['addition']['step'])), $this->_sections['addition']['max']);
    if ($this->_sections['addition']['total'] == 0)
        $this->_sections['addition']['show'] = false;
} else
    $this->_sections['addition']['total'] = 0;
if ($this->_sections['addition']['show']):

            for ($this->_sections['addition']['index'] = $this->_sections['addition']['start'], $this->_sections['addition']['iteration'] = 1;
                 $this->_sections['addition']['iteration'] <= $this->_sections['addition']['total'];
                 $this->_sections['addition']['index'] += $this->_sections['addition']['step'], $this->_sections['addition']['iteration']++):
$this->_sections['addition']['rownum'] = $this->_sections['addition']['iteration'];
$this->_sections['addition']['index_prev'] = $this->_sections['addition']['index'] - $this->_sections['addition']['step'];
$this->_sections['addition']['index_next'] = $this->_sections['addition']['index'] + $this->_sections['addition']['step'];
$this->_sections['addition']['first']      = ($this->_sections['addition']['iteration'] == 1);
$this->_sections['addition']['last']       = ($this->_sections['addition']['iteration'] == $this->_sections['addition']['total']);
?><td>&nbsp;</td><?php endfor; endif; ?>
<?php endif; ?>
</tr>
</table>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['dirs']): ?>
<div class="con" <?php if ($this->_tpl_vars['dirsite'] && $this->_tpl_vars['coolSiteList']): ?>style="margin-top:10px;"<?php endif; ?>>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="100px"><h2 style="border:none; font-size:14px;"><?php echo $this->_tpl_vars['c_name']['stpName']; ?>
</h2></td>
      <td>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" id="tab_s2">
        <tr>
        <?php $_from = $this->_tpl_vars['dirs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['dir']):
        $this->_foreach['list2']['iteration']++;
?>
<td<?php if (($this->_foreach['list2']['iteration']-1) < 5): ?> width="20%"<?php endif; ?>><a style="" href="<?php echo $this->_tpl_vars['dir']['stpHtmlName']; ?>
"><?php echo $this->_tpl_vars['dir']['stpName']; ?>
</a></td>
<?php if (( ($this->_foreach['list2']['iteration']-1)+1 ) % 5 == 0): ?></tr><tr><?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_foreach['list2']['total'] % 5 == 1): ?>
<?php unset($this->_sections['addition']);
$this->_sections['addition']['name'] = 'addition';
$this->_sections['addition']['loop'] = is_array($_loop=$this->_tpl_vars['nullfor']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['addition']['start'] = (int)0;
$this->_sections['addition']['max'] = (int)4;
$this->_sections['addition']['show'] = true;
if ($this->_sections['addition']['max'] < 0)
    $this->_sections['addition']['max'] = $this->_sections['addition']['loop'];
$this->_sections['addition']['step'] = 1;
if ($this->_sections['addition']['start'] < 0)
    $this->_sections['addition']['start'] = max($this->_sections['addition']['step'] > 0 ? 0 : -1, $this->_sections['addition']['loop'] + $this->_sections['addition']['start']);
else
    $this->_sections['addition']['start'] = min($this->_sections['addition']['start'], $this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] : $this->_sections['addition']['loop']-1);
if ($this->_sections['addition']['show']) {
    $this->_sections['addition']['total'] = min(ceil(($this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] - $this->_sections['addition']['start'] : $this->_sections['addition']['start']+1)/abs($this->_sections['addition']['step'])), $this->_sections['addition']['max']);
    if ($this->_sections['addition']['total'] == 0)
        $this->_sections['addition']['show'] = false;
} else
    $this->_sections['addition']['total'] = 0;
if ($this->_sections['addition']['show']):

            for ($this->_sections['addition']['index'] = $this->_sections['addition']['start'], $this->_sections['addition']['iteration'] = 1;
                 $this->_sections['addition']['iteration'] <= $this->_sections['addition']['total'];
                 $this->_sections['addition']['index'] += $this->_sections['addition']['step'], $this->_sections['addition']['iteration']++):
$this->_sections['addition']['rownum'] = $this->_sections['addition']['iteration'];
$this->_sections['addition']['index_prev'] = $this->_sections['addition']['index'] - $this->_sections['addition']['step'];
$this->_sections['addition']['index_next'] = $this->_sections['addition']['index'] + $this->_sections['addition']['step'];
$this->_sections['addition']['first']      = ($this->_sections['addition']['iteration'] == 1);
$this->_sections['addition']['last']       = ($this->_sections['addition']['iteration'] == $this->_sections['addition']['total']);
?><td>&nbsp;</td><?php endfor; endif; ?>
<?php endif; ?>
<?php if ($this->_foreach['list2']['total'] % 5 == 2): ?>
<?php unset($this->_sections['addition']);
$this->_sections['addition']['name'] = 'addition';
$this->_sections['addition']['loop'] = is_array($_loop=$this->_tpl_vars['nullfor']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['addition']['start'] = (int)0;
$this->_sections['addition']['max'] = (int)3;
$this->_sections['addition']['show'] = true;
if ($this->_sections['addition']['max'] < 0)
    $this->_sections['addition']['max'] = $this->_sections['addition']['loop'];
$this->_sections['addition']['step'] = 1;
if ($this->_sections['addition']['start'] < 0)
    $this->_sections['addition']['start'] = max($this->_sections['addition']['step'] > 0 ? 0 : -1, $this->_sections['addition']['loop'] + $this->_sections['addition']['start']);
else
    $this->_sections['addition']['start'] = min($this->_sections['addition']['start'], $this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] : $this->_sections['addition']['loop']-1);
if ($this->_sections['addition']['show']) {
    $this->_sections['addition']['total'] = min(ceil(($this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] - $this->_sections['addition']['start'] : $this->_sections['addition']['start']+1)/abs($this->_sections['addition']['step'])), $this->_sections['addition']['max']);
    if ($this->_sections['addition']['total'] == 0)
        $this->_sections['addition']['show'] = false;
} else
    $this->_sections['addition']['total'] = 0;
if ($this->_sections['addition']['show']):

            for ($this->_sections['addition']['index'] = $this->_sections['addition']['start'], $this->_sections['addition']['iteration'] = 1;
                 $this->_sections['addition']['iteration'] <= $this->_sections['addition']['total'];
                 $this->_sections['addition']['index'] += $this->_sections['addition']['step'], $this->_sections['addition']['iteration']++):
$this->_sections['addition']['rownum'] = $this->_sections['addition']['iteration'];
$this->_sections['addition']['index_prev'] = $this->_sections['addition']['index'] - $this->_sections['addition']['step'];
$this->_sections['addition']['index_next'] = $this->_sections['addition']['index'] + $this->_sections['addition']['step'];
$this->_sections['addition']['first']      = ($this->_sections['addition']['iteration'] == 1);
$this->_sections['addition']['last']       = ($this->_sections['addition']['iteration'] == $this->_sections['addition']['total']);
?><td>&nbsp;</td><?php endfor; endif; ?>
<?php endif; ?>
<?php if ($this->_foreach['list2']['total'] % 5 == 3): ?>
<?php unset($this->_sections['addition']);
$this->_sections['addition']['name'] = 'addition';
$this->_sections['addition']['loop'] = is_array($_loop=$this->_tpl_vars['nullfor']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['addition']['start'] = (int)0;
$this->_sections['addition']['max'] = (int)2;
$this->_sections['addition']['show'] = true;
if ($this->_sections['addition']['max'] < 0)
    $this->_sections['addition']['max'] = $this->_sections['addition']['loop'];
$this->_sections['addition']['step'] = 1;
if ($this->_sections['addition']['start'] < 0)
    $this->_sections['addition']['start'] = max($this->_sections['addition']['step'] > 0 ? 0 : -1, $this->_sections['addition']['loop'] + $this->_sections['addition']['start']);
else
    $this->_sections['addition']['start'] = min($this->_sections['addition']['start'], $this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] : $this->_sections['addition']['loop']-1);
if ($this->_sections['addition']['show']) {
    $this->_sections['addition']['total'] = min(ceil(($this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] - $this->_sections['addition']['start'] : $this->_sections['addition']['start']+1)/abs($this->_sections['addition']['step'])), $this->_sections['addition']['max']);
    if ($this->_sections['addition']['total'] == 0)
        $this->_sections['addition']['show'] = false;
} else
    $this->_sections['addition']['total'] = 0;
if ($this->_sections['addition']['show']):

            for ($this->_sections['addition']['index'] = $this->_sections['addition']['start'], $this->_sections['addition']['iteration'] = 1;
                 $this->_sections['addition']['iteration'] <= $this->_sections['addition']['total'];
                 $this->_sections['addition']['index'] += $this->_sections['addition']['step'], $this->_sections['addition']['iteration']++):
$this->_sections['addition']['rownum'] = $this->_sections['addition']['iteration'];
$this->_sections['addition']['index_prev'] = $this->_sections['addition']['index'] - $this->_sections['addition']['step'];
$this->_sections['addition']['index_next'] = $this->_sections['addition']['index'] + $this->_sections['addition']['step'];
$this->_sections['addition']['first']      = ($this->_sections['addition']['iteration'] == 1);
$this->_sections['addition']['last']       = ($this->_sections['addition']['iteration'] == $this->_sections['addition']['total']);
?><td>&nbsp;</td><?php endfor; endif; ?>
<?php endif; ?>
<?php if ($this->_foreach['list2']['total'] % 5 == 4): ?>
<?php unset($this->_sections['addition']);
$this->_sections['addition']['name'] = 'addition';
$this->_sections['addition']['loop'] = is_array($_loop=$this->_tpl_vars['nullfor']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['addition']['start'] = (int)0;
$this->_sections['addition']['max'] = (int)1;
$this->_sections['addition']['show'] = true;
if ($this->_sections['addition']['max'] < 0)
    $this->_sections['addition']['max'] = $this->_sections['addition']['loop'];
$this->_sections['addition']['step'] = 1;
if ($this->_sections['addition']['start'] < 0)
    $this->_sections['addition']['start'] = max($this->_sections['addition']['step'] > 0 ? 0 : -1, $this->_sections['addition']['loop'] + $this->_sections['addition']['start']);
else
    $this->_sections['addition']['start'] = min($this->_sections['addition']['start'], $this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] : $this->_sections['addition']['loop']-1);
if ($this->_sections['addition']['show']) {
    $this->_sections['addition']['total'] = min(ceil(($this->_sections['addition']['step'] > 0 ? $this->_sections['addition']['loop'] - $this->_sections['addition']['start'] : $this->_sections['addition']['start']+1)/abs($this->_sections['addition']['step'])), $this->_sections['addition']['max']);
    if ($this->_sections['addition']['total'] == 0)
        $this->_sections['addition']['show'] = false;
} else
    $this->_sections['addition']['total'] = 0;
if ($this->_sections['addition']['show']):

            for ($this->_sections['addition']['index'] = $this->_sections['addition']['start'], $this->_sections['addition']['iteration'] = 1;
                 $this->_sections['addition']['iteration'] <= $this->_sections['addition']['total'];
                 $this->_sections['addition']['index'] += $this->_sections['addition']['step'], $this->_sections['addition']['iteration']++):
$this->_sections['addition']['rownum'] = $this->_sections['addition']['iteration'];
$this->_sections['addition']['index_prev'] = $this->_sections['addition']['index'] - $this->_sections['addition']['step'];
$this->_sections['addition']['index_next'] = $this->_sections['addition']['index'] + $this->_sections['addition']['step'];
$this->_sections['addition']['first']      = ($this->_sections['addition']['iteration'] == 1);
$this->_sections['addition']['last']       = ($this->_sections['addition']['iteration'] == $this->_sections['addition']['total']);
?><td>&nbsp;</td><?php endfor; endif; ?>
<?php endif; ?>
        </tr>
      </table></td>
    </tr>
  </table>
</div>
<?php endif; ?>

  <div class="request"><a href="http://<?php echo @SITE_DOMAIN; ?>
/message.php<?php if ($this->_tpl_vars['siteUlr']): ?>?from=<?php echo $this->_tpl_vars['siteUlr']; ?>
<?php endif; ?>">您觉得该栏目还有哪些不足</a>？</div>
  <div class="home"><a href="http://<?php echo @SITE_DOMAIN; ?>
" class="back">返回BTC123首页</a>&nbsp;|&nbsp;<?php echo @COUNT_CODE; ?>
</div>
<!--  <a href="#" id="addmyfav" style="display:none;" title="添加到自定义导航"></a> -->
</body>
</html>