<?php /* Smarty version 2.6.18, created on 2013-05-27 17:27:19
         compiled from theme/default/xiaoshuo.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>5w导航小说网——收录最新最全的小说网址</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="http://<?php echo @SITE_DOMAIN; ?>
/theme/<?php echo @THEME_PATH; ?>
css/book.css?2011042515" rel="stylesheet" type="text/css" />
<style>
#suggest_box {
	position:absolute;
	display:none;
	z-index:1100;
	text-align:left;
}
#suggest_box table {
	border:1px #333 solid;
	background:#fff;
	text-align:right;
}
#suggest_box tr {
	line-height:17px;
}
#suggest_box .hover {
	background:#36c;
	color:#fff;
}
#suggest_box .hover .suggest_keyword, #suggest_box .hover .suggest_num {
	color:#fff;
}
.suggest_keyword {
	text-align:left;
	padding:0 1em 0 3px;
	font-size:13px;
	overflow:hidden;
	white-space:nowrap;
	color:#000;
}
.suggest_num {
	color:green;
	font-size:12px;
	overflow:hidden;
	padding:0 3px;
	text-align:right;
	white-space:nowrap;
}
</style>
<base target="_blank" />
</head>
<body>
<div class="auto_hidden" id="auto"></div>
<div id="header_detail">
  <div id="logo"><a href="http://www.5w.com/"><img src="http://<?php echo @SITE_DOMAIN; ?>
/static/images/logo.gif" /></a></div>
  <div class="logo_xs" title="5w网址导航小说网">5w网址导航小说网</div>
  <div id="sform_detail">
    <form name="f" action="<?php echo $this->_tpl_vars['defaultsearch']['action']; ?>
" method="get"  accept-charset="gbk" onsubmit="document.charset='gbk';">
      <a href="<?php echo $this->_tpl_vars['defaultsearch']['url']; ?>
"><img src="http://<?php echo @SITE_DOMAIN; ?>
/<?php echo $this->_tpl_vars['defaultsearch']['img_url']; ?>
" border="0" /></a>
      <input type="text" style=" width:262px" class="int" onkeyup="ac.start(event)" autocomplete="off" name="<?php echo $this->_tpl_vars['defaultsearch']['name']; ?>
" id="kw"/>
      <?php $_from = $this->_tpl_vars['params']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
      <input type="hidden" name="<?php echo $this->_tpl_vars['p'][0]; ?>
" value="<?php echo $this->_tpl_vars['p'][1]; ?>
"/>
      <?php endforeach; endif; unset($_from); ?>
      <input type="submit" value="<?php echo $this->_tpl_vars['defaultsearch']['btn']; ?>
" id="bdbutton" class="searchint">
    </form>
  </div>
  <div class="hotword"> <a href="http://www.soso.com/q?w=%B4%A9%D4%BD%D0%A1%CB%B5&unc=b400056&cid=union.s.wh&ie=gb2312">穿越小说</a> <a href="http://www.soso.com/q?w=%D0%A1%CB%B5%CF%C2%D4%D8&unc=b400056&cid=union.s.wh&ie=gb2312">小说下载</a> <a href="http://www.soso.com/q?w=%D0%A1%CB%B5%C5%C5%D0%D0%B0%F1&unc=b400056&cid=union.s.wh&ie=gb2312">小说排行榜</a> <a href="http://www.soso.com/q?w=%B6%B7%C6%C6%B2%D4%F1%B7&unc=b400056&cid=union.s.wh&ie=gb2312">斗破苍穹</a></div>
</div>
<div id="guide">
  <div class="fr"> <span>热门分类:</span> <a href="http://www.5w.com/caipiao.htm">彩票</a><a href="http://www.5w.com/stock.htm">股票</a><a href="http://www.5w.com/jijin.htm">基金</a><a href="http://www.5w.com/movie.htm">电影</a><a href="http://www.5w.com/wanmei.htm">视频</a><a href="http://www.5w.com/music.htm">音乐</a><a href="http://www.5w.com/book.htm">小说</a><a href="http://www.5w.com/game.htm">游戏</a><a href="http://www.5w.com/tu.htm">美图</a><a href="http://www.5w.com/nba.htm">NBA</a><a href="http://www.5w.com/newsweek.htm">新闻</a><a href="http://www.5w.com/liangxing.htm">两性</a><a href="http://www.5w.com/">更多 &raquo;</a> </div>
  <div class="fl"> <a href="http://www.5w.com/" target="_parent">5w导航首页</a> &raquo; <span>小说</span> </div>
</div>
<div id="xiaoshuo_content">
  <div id="lay-main">
    <h2 class="title">小说阅读</h2>
    <div  style="display:block; clear:both;">
      <table width="100%" border="0" cellpadding="0" cellspacing="1" id="tab_s">
        <tr>
          <?php $_from = $this->_tpl_vars['indexedSiteList'][0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tempsite']):
        $this->_foreach['list']['iteration']++;
?>
          <td<?php if (($this->_foreach['list']['iteration']-1) < 5): ?> width="20%"<?php endif; ?>><a <?php if ($this->_tpl_vars['tempsite']['siteColor'] != ''): ?>style="color:<?php echo $this->_tpl_vars['tempsite']['siteColor']; ?>
"<?php endif; ?> href="<?php echo $this->_tpl_vars['tempsite']['siteUrl']; ?>
" onmouseout="mmout()" onmouseover="mmover(this)">
            <?php echo $this->_tpl_vars['tempsite']['siteName']; ?>

            </a></td>
          <?php if (( ($this->_foreach['list']['iteration']-1)+1 ) % 5 == 0): ?>
          <?php if (($this->_foreach['list']['iteration'] == $this->_foreach['list']['total'])): ?>
        </tr>
        <?php else: ?>
        </tr>
        <tr>
          <?php endif; ?>
          <?php endif; ?>
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
?>
          <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
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
?>
        <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
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
?>
        <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
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
?>
        <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
        <?php endif; ?>
        <tr>
          <td colspan="5" class="book_hot">相关搜索：<a href="http://www.soso.com/q?w=%D0%FE%BB%C3%D0%A1%CB%B5&unc=b400056&cid=union.s.wh&ie=gb2312">玄幻小说</a> <a href="http://www.soso.com/q?w=%B4%A9%D4%BD&unc=b400056&cid=union.s.wh&ie=gb2312">穿越</a> <a href="http://www.soso.com/q?w=%D1%D4%C7%E9%D0%A1%CB%B5&unc=b400056&cid=union.s.wh&ie=gb2312">言情小说</a> <a href="http://www.soso.com/q?w=%CE%E4%CF%C0%D0%A1%CB%B5&unc=b400056&cid=union.s.wh&ie=gb2312">武侠小说</a> <a href="http://www.soso.com/q?w=%CD%F8%C2%E7%D0%A1%CB%B5&unc=b400056&cid=union.s.wh&ie=gb2312">网络小说</a> <a href="http://www.soso.com/q?w=%D0%A3%D4%B0%D0%A1%CB%B5&unc=b400056&cid=union.s.wh&ie=gb2312">校园小说</a></td>
        </tr>
      </table>
    </div>
    <h2 class="title">小说点击榜</h2>
    <div  style="display:block; clear:both;">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="cptz">
        <tr>
          <td width="20%"><dl class="tz">
              <dt><a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=2"><img src="http://<?php echo @SITE_DOMAIN; ?>
/static/images/book/1.jpg" width="70" height="86"></a></dt>
              <dd>
                <p><a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=2" title="斗破苍穹" >斗破苍穹</a></p>
              </dd>
              <dd>作者：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=2">天蚕土豆</a></dd>
              <dd>类别：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=2">玄幻魔法</a></dd>
            </dl></td>
          <td width="20%"><dl class="tz">
              <dt><a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=303"><img src="http://<?php echo @SITE_DOMAIN; ?>
/static/images/book/2.jpg" width="90" height="115" /></a></dt>
              <dd>
                <p><a title="爹地请你温柔一点" href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=303">爹地请你温柔一点</a></p>
              </dd>
              <dd>作者：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=303">北棠</a></dd>
              <dd>类别：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=303">都市言情</a></dd>
            </dl></td>
          <td width="20%"><dl class="tz">
              <dt><a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=1598"><img src="http://<?php echo @SITE_DOMAIN; ?>
/static/images/book/3.jpg" width="90" height="115" /></a></dt>
              <dd>
                <p><a title="亿万老婆买一送一" href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=1598">亿万老婆买一送一</a></p>
              </dd>
              <dd>作者：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=1598">安知晓</a></dd>
              <dd>类别：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=1598">都市言情</a></dd>
            </dl></td>
          <td width="20%"><dl class="tz">
              <dt><a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=14693"><img src="http://<?php echo @SITE_DOMAIN; ?>
/static/images/book/4.jpg" width="90" height="115" /></a></dt>
              <dd>
                <p><a title="金鳞化龙传" href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=14693">金鳞化龙传</a></p>
              </dd>
              <dd>作者：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=14693">小喇叭</a></dd>
              <dd>类别：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=14693">都市言情</a></dd>
            </dl></td>
          <td><dl class="tz">
              <dt><a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=6116"><img src="http://<?php echo @SITE_DOMAIN; ?>
/static/images/book/5.jpg" width="90" height="115"></a></dt>
              <dd>
                <p><a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=6116">斗神</a></p>
              </dd>
              <dd>作者：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=6116">失落叶</a></dd>
              <dd>类别：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=6116">玄幻魔法</a></dd>
            </dl></td>
        </tr>
        <tr>
          <td width="20%"><dl class="tz">
              <dt><a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=428"><img src="http://<?php echo @SITE_DOMAIN; ?>
/static/images/book/6.jpg" width="90" height="115"></a></dt>
              <dd>
                <p><a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=428">吞噬星空</a></p>
              </dd>
              <dd>作者：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=428">我吃西红柿</a></dd>
              <dd>类别：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=428">网游动漫</a></dd>
            </dl></td>
          <td width="20%"><dl class="tz">
              <dt><a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=555"><img src="http://<?php echo @SITE_DOMAIN; ?>
/static/images/book/7.jpg" width="90" height="115" /></a></dt>
              <dd>
                <p><a title="永生" href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=555">永生</a></p>
              </dd>
              <dd>作者：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=555" title="梦入神机">梦入神机</a></dd>
              <dd>类别：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=555">玄幻魔法</a></dd>
            </dl></td>
          <td width="20%"><dl class="tz">
              <dt><a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=495"><img src="http://<?php echo @SITE_DOMAIN; ?>
/static/images/book/8.jpg" width="90" height="115" /></a></dt>
              <dd>
                <p><a title="仙逆" href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=495">仙逆</a></p>
              </dd>
              <dd>作者：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=495">耳根</a></dd>
              <dd>类别：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=495">武侠修真</a></dd>
            </dl></td>
          <td width="20%"><dl class="tz">
              <dt><a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=67"><img src="http://<?php echo @SITE_DOMAIN; ?>
/static/images/book/9.jpg" width="90" height="115" /></a></dt>
              <dd>
                <p><a title="凡人修仙传" href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=67">凡人修仙传</a></p>
              </dd>
              <dd>作者：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=67">忘语</a></dd>
              <dd>类别：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=67">武侠修真</a></dd>
            </dl></td>
          <td><dl class="tz">
              <dt><a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=431"><img src="http://<?php echo @SITE_DOMAIN; ?>
/static/images/book/10.jpg" width="90" height="115"></a></dt>
              <dd>
                <p><a title="遮天" href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=431">遮天</a></p>
              </dd>
              <dd>作者：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=431">辰东</a></dd>
              <dd>类别：<a href="http://www.duxiaoshuo.com/modules/article/articleinfo.php?id=431">武侠修真</a></dd>
            </dl></td>
        </tr>
      </table>
    </div>
    <h2 class="title">电子书</h2>
    <div  style="display:block; clear:both;">
      <table width="100%" border="0" cellpadding="0" cellspacing="1" id="tab_s">
        <tr>
          <?php $_from = $this->_tpl_vars['indexedSiteList'][1]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tempsite']):
        $this->_foreach['list']['iteration']++;
?>
          <td<?php if (($this->_foreach['list']['iteration']-1) < 5): ?> width="20%"<?php endif; ?>><a <?php if ($this->_tpl_vars['tempsite']['siteColor'] != ''): ?>style="color:<?php echo $this->_tpl_vars['tempsite']['siteColor']; ?>
"<?php endif; ?> href="<?php echo $this->_tpl_vars['tempsite']['siteUrl']; ?>
" onmouseout="mmout()" onmouseover="mmover(this)">
            <?php echo $this->_tpl_vars['tempsite']['siteName']; ?>

            </a></td>
          <?php if (( ($this->_foreach['list']['iteration']-1)+1 ) % 5 == 0): ?>
          <?php if (($this->_foreach['list']['iteration'] == $this->_foreach['list']['total'])): ?>
        </tr>
        <?php else: ?>
        </tr>
        <tr>
          <?php endif; ?>
          <?php endif; ?>
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
?>
          <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
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
?>
        <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
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
?>
        <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
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
?>
        <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
        <?php endif; ?>
      </table>
    </div>
    <h2 class="title">文化文学</h2>
    <div style="display:block; clear:both;">
      <table width="100%" border="0" cellpadding="0" cellspacing="1" id="tab_s">
        <tr>
          <?php $_from = $this->_tpl_vars['indexedSiteList'][2]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tempsite']):
        $this->_foreach['list']['iteration']++;
?>
          <td<?php if (($this->_foreach['list']['iteration']-1) < 5): ?> width="20%"<?php endif; ?>><a <?php if ($this->_tpl_vars['tempsite']['siteColor'] != ''): ?>style="color:<?php echo $this->_tpl_vars['tempsite']['siteColor']; ?>
"<?php endif; ?> href="<?php echo $this->_tpl_vars['tempsite']['siteUrl']; ?>
" onmouseout="mmout()" onmouseover="mmover(this)">
            <?php echo $this->_tpl_vars['tempsite']['siteName']; ?>

            </a></td>
          <?php if (( ($this->_foreach['list']['iteration']-1)+1 ) % 5 == 0): ?>
          <?php if (($this->_foreach['list']['iteration'] == $this->_foreach['list']['total'])): ?>
        </tr>
        <?php else: ?>
        </tr>
        <tr>
          <?php endif; ?>
          <?php endif; ?>
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
?>
          <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
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
?>
        <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
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
?>
        <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
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
?>
        <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
        <?php endif; ?>
      </table>
    </div>
    <h2 class="title">电子书阅读器</h2>
    <div style="display:block; clear:both;">
      <table width="100%" border="0" cellpadding="0" cellspacing="1" id="tab_s">
        <tr>
          <?php $_from = $this->_tpl_vars['indexedSiteList'][3]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tempsite']):
        $this->_foreach['list']['iteration']++;
?>
          <td<?php if (($this->_foreach['list']['iteration']-1) < 5): ?> width="20%"<?php endif; ?>><a <?php if ($this->_tpl_vars['tempsite']['siteColor'] != ''): ?>style="color:<?php echo $this->_tpl_vars['tempsite']['siteColor']; ?>
"<?php endif; ?> href="<?php echo $this->_tpl_vars['tempsite']['siteUrl']; ?>
" onmouseout="mmout()" onmouseover="mmover(this)">
            <?php echo $this->_tpl_vars['tempsite']['siteName']; ?>

            </a></td>
          <?php if (( ($this->_foreach['list']['iteration']-1)+1 ) % 5 == 0): ?>
          <?php if (($this->_foreach['list']['iteration'] == $this->_foreach['list']['total'])): ?>
        </tr>
        <?php else: ?>
        </tr>
        <tr>
          <?php endif; ?>
          <?php endif; ?>
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
?>
          <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
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
?>
        <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
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
?>
        <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
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
?>
        <td>&nbsp;</td>
          <?php endfor; endif; ?>
        </tr>
        <?php endif; ?>
      </table>
    </div> <div class="con_sohu">
  <h2>热门搜索</h2>
 <iframe width="931" height="80" frameborder="0" scrolling="no" allowtransparency="no" src="http://www.5w.com/data/html/sohu.htm?120110425" style="margin-left:16px"></iframe>
</div>
  </div>
 
</div>
<div class="request"><a href="http://<?php echo @SITE_DOMAIN; ?>
/message.htm<?php if ($this->_tpl_vars['siteUlr']): ?>?from=<?php echo $this->_tpl_vars['siteUlr']; ?>
<?php endif; ?>">您觉得该栏目还有哪些不足</a>？</div>
<div class="home"><a href="http://<?php echo @SITE_DOMAIN; ?>
" class="back" target="_self">返回</a></div>
<a href="#" id="addmyfav" style="display:none;" title="添加到自定义导航"></a>
<script type="text/javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/5wsub.js"></script>
<?php echo @COUNT_CODE; ?>

</body>
</html>