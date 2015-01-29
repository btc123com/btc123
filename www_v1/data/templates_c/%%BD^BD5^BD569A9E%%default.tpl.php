<?php /* Smarty version 2.6.18, created on 2013-06-22 20:00:01
         compiled from i/default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'i/default.tpl', 8, false),array('modifier', 'stripslashes', 'i/default.tpl', 42, false),array('modifier', 'htmlspecialchars_decode', 'i/default.tpl', 212, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META http-equiv="Pragma" content="no-cache">
<META http-equiv="Cache-Control" content="no-cache">
<META http-equiv="Expires" content="0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ((is_array($_tmp=@$this->_tpl_vars['title'])) ? $this->_run_mod_handler('default', true, $_tmp, "btc123 自定义导航页面") : smarty_modifier_default($_tmp, "btc123 自定义导航页面")); ?>
</title>
<link href="http://<?php echo @SITE_DOMAIN; ?>
/static/css/css.css" rel="stylesheet" type="text/css" />
<base target="_blank" />
</head>

<body onload="<?php if (! $this->_tpl_vars['google']): ?>document.getElementById('kw').focus();<?php endif; ?>">
<div id="header">
<div id="weather">
<iframe width="540" height="22" frameborder="0" scrolling="no" allowtransparency="true" src="http://<?php echo @SITE_DOMAIN; ?>
/data/html/tianqi.htm"></iframe>
</div>
  <div class="r03"></div>
  <div class="r02"><?php if ($this->_tpl_vars['userID'] == 0 || $this->_tpl_vars['userID'] == ''): ?><a href="http://<?php echo @SITE_DOMAIN; ?>
/i/?c=index&a=login" class="orange" target="_self">登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://<?php echo @SITE_DOMAIN; ?>
/i/?a=reg">注册</a><?php else: ?><a href="http://<?php echo @SITE_DOMAIN; ?>
/i/index.php?c=manage" class="orange" target="_self">管理</a><?php endif; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="setHomePage(this, 'http://<?php echo @SITE_DOMAIN; ?>
/<?php if ($this->_tpl_vars['domain']): ?>i/?<?php echo $this->_tpl_vars['domain']; ?>
<?php endif; ?>');" href="javascript:;" target="_self">设为首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://<?php echo @SITE_DOMAIN; ?>
/message.php?type=1">意见留言</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.btc123.com/">返回btc123首页</a></div>
  <div class="r01"></div>
</div>
<style>
#suggest_box{position:absolute;display:none;z-index:1100;text-align:left;}#suggest_box table{border:1px #333 solid;background:#fff;text-align:right;}#suggest_box tr{line-height:17px;}#suggest_box .hover{background:#36c;color:#fff;}
#suggest_box .hover .suggest_keyword,#suggest_box .hover .suggest_num{color:#fff;}
.suggest_keyword{text-align:left;padding:0 1em 0 3px;font-size:13px;overflow:hidden;white-space:nowrap;color:#000;}.suggest_num{color:green;font-size:12px;overflow:hidden;padding:0 3px;text-align:right;white-space:nowrap;}
.loginon{float:left;width:72px;height:25px;text-align:center;line-height:25px;cursor:pointer;color:#06C;background:url(http://<?php echo @SITE_DOMAIN; ?>
/static/images/dialog2_bg_on.jpg) no-repeat center;}
.loginoff{float:left;width:72px;height:25px;text-align:center;line-height:25px;cursor:pointer;color:#FFF;background:url(http://<?php echo @SITE_DOMAIN; ?>
/static/images/dialog2_bg_off.jpg) no-repeat center;}
</style>

<?php if ($this->_tpl_vars['sogou']): ?>
<div class="search" style="margin-top:60px;">
  <div class="search_logo" style="padding:0;padding-left:60px;width:110px"><a href="http://www.sogou.com/index.php?pid=sogou-site-8725fb777f25776f"><img src="../static/images/s/sogou.gif" id="baidu_logo"/></a><input type="hidden" value="s" name="type" id="search_type"></div>
  <div class="wrap" style="width:525px;">
         <form name="f" action="http://www.sogou.com/sogou" method="get" onsubmit="return gotosearch();">
	     <p><input type="text" size="42" class="ss_box" autocomplete="off" name="query" id="kw"/><input type="hidden" name="pid" value="sogou-site-8725fb777f25776f"/>
	     <input type="submit" value="搜狗搜索" id="bdbutton" class="ss_btn"></p>
	     </form>
    </div>
     <div class="hot">
  <font color="#FF0000" style="font-size:13px;">淘宝热卖：</font>
	<?php $_from = $this->_tpl_vars['taobaohotSites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['taobaohotSites'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['taobaohotSites']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['taobaohotSites']['iteration']++;
?>
	<?php echo ((is_array($_tmp=$this->_tpl_vars['list']['content'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

	<?php endforeach; endif; unset($_from); ?>
  </div>
  </div>
<?php endif; ?>
<?php if ($this->_tpl_vars['soso'] || ( ! $this->_tpl_vars['taobao'] && ! sogou && ! $this->_tpl_vars['google'] && ! $this->_tpl_vars['baidu'] )): ?>
<div class="search" style="margin-top:60px;">
  <div class="search_logo" style="padding:0;padding-left:60px;width:110px"><a href="http://www.soso.com/?unc=b400056&amp;cid=union.s.wh"><img src="../static/images/s/soso.gif" id="baidu_logo"/></a><input type="hidden" value="s" name="type" id="search_type"></div>
  <div class="wrap" style="width:525px;">
<form onsubmit="return gotosearch();" method="get" action="http://www.soso.com/q" name="f">
<p><input type="text" id="kw" name="w" autocomplete="off" class="ss_box" size="42"><input type="hidden" value="b400056" name="unc">
<input type="hidden" value="union.s.wh" name="cid"><input type="hidden" value="gb2312" name="ie"><input type="submit" class="ss_btn" id="bdbutton" value=" 搜  索 "></p>
</form>
    </div>
     <div class="hot">
  <font color="#FF0000" style="font-size:13px;">淘宝热卖：</font>
	<?php $_from = $this->_tpl_vars['taobaohotSites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['taobaohotSites'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['taobaohotSites']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['taobaohotSites']['iteration']++;
?>
	<?php echo ((is_array($_tmp=$this->_tpl_vars['list']['content'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

	<?php endforeach; endif; unset($_from); ?>
  </div>
  </div>
<?php endif; ?>
<?php if ($this->_tpl_vars['taobao']): ?>
<form action="http://search8.taobao.com/browse/search_auction.htm" name="taobaoSearchForm" id="J_searchForm" method="get" style="margin:0px; padding:0px;">
<div class="search">
  <div class="search_logo"><a href="http://www.taobao.com/go/chn/tbk_channel/onsale.php?pid=mm_26473568_2374124_9161457&eventid=101586"><img src="../static/images/taobao_big.gif" /></a></div>
  <div class="wrap">
     <div class="ss_nav">
      <ul>
        <li><a class="ss_active" id="tsb1" style="cursor:pointer" onclick="taobaoSearch(1);">宝贝</a></li>
        <li><a class="" id="tsb2" style="cursor:pointer" onclick="taobaoSearch(2);">店铺</a></li>

      </ul>
    </div>
<input type="text" class="ss_box" autocomplete="off" name="q" id="kw" value=""/>&nbsp;
<input class="ss_btn"  type="submit" value="搜&nbsp;索" />
	<input name="pid" value="mm_26473568_2374124_9161457" type="hidden">
	<input name="st" id="taobaost" value="0" type="hidden">
<input type="hidden" value="all" name="commend"/> 
<input type="hidden" value="auction" name="search_type"/>
<input type="hidden" value="initiative" name="user_action"/>
<input type="hidden" value="D9_5_1" name="f"/>
<input type="hidden" value="1" name="at_topsearch"/>
<input type="hidden" value="" name="sort"/>
<input type="hidden" value="66" name="mode" />
<input type="hidden" value="0" name="spercent"/>

    </div>
 </form>
     <div class="hot">
  <font color="#FF0000" style="font-size:13px;">淘宝热卖:</font>
	<?php $_from = $this->_tpl_vars['taobaohotSites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['taobaohotSites'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['taobaohotSites']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['taobaohotSites']['iteration']++;
?>
	<?php echo ((is_array($_tmp=$this->_tpl_vars['list']['content'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

	<?php endforeach; endif; unset($_from); ?>
  </div>
  </div>
<?php endif; ?>
<?php if ($this->_tpl_vars['youdao']): ?>
<div class="search" style="margin-top:60px;"><div class="search_logo" style="padding:0;width:110px">
<form name="f" action="http://www.youdao.com/search" method="get">
<a href="http://www.youdao.com/search?ue=gbk&amp;keyfrom=dh.5w_0001&amp;vendor=dh.5w_0001&amp;q="><img src="../static/images/s/youdao.gif" border="0"></a></div>
<input type="text" size="42" class="ss_box" autocomplete="off" name="q" id="kw">
<input type="hidden" name="ue" value="gbk">
<input type="hidden" name="keyfrom" value="dh.5w_0001">
<input type="hidden" name="vendor" value="dh.5w_0001">
<input type="submit" value="搜 索" id="bdbutton" class="ss_btn">
</form>
     <div class="hot">
  <font color="#FF0000" style="font-size:13px;">淘宝热卖:</font>
	<?php $_from = $this->_tpl_vars['taobaohotSites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['taobaohotSites'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['taobaohotSites']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['taobaohotSites']['iteration']++;
?>
	<?php echo ((is_array($_tmp=$this->_tpl_vars['list']['content'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

	<?php endforeach; endif; unset($_from); ?>
  </div>
  </div>
<?php endif; ?>
<?php if ($this->_tpl_vars['baidu']): ?>
<div class="search">
  <div class="search_logo"><img src="../static/images/logo_baidu.gif" id="baidu_logo"/><input type="hidden" value="s" name="type" id="search_type"></div>
  <div class="wrap">
     <div class="ss_nav">
	<ul id="nv">
		<li id="btype5"class="" onclick="readyQuery(5)"><a style="cursor:pointer">新闻</a></li>
		<li id="btype0" class="ss_active" onclick="readyQuery(0)"><a style="cursor:pointer">网页</a></li>
		<li id="btype1" class="" onclick="readyQuery(1)" style=" font-family:'Times New Roman', Times, serif"><a style="cursor:pointer">MP3</a></li>
		<li id="btype2" class="" onclick="readyQuery(2)"><a style="cursor:pointer">视频</a></li>
		<li id="btype3" class="" onclick="readyQuery(3)"><a style="cursor:pointer">图片</a></li>
		<li id="btype4" class="" onclick="readyQuery(4)"><a style="cursor:pointer">知道</a></li>
		<li id="btype6" class="" onclick="readyQuery(6)"><a style="cursor:pointer">地图</a></li>
		<li><a href="http://www.baidu.com/more">更多</a></li>
	</ul>
    </div>
		<form  name="f" action="http://www.baidu.com/s" method="get" id="baidu_search" onsubmit="return checkMap()">
			<input type="hidden" name='ct' id='ct' value="">
			<input type="hidden" name='tn' id='tn' value="">
			<input type="hidden" id='i' value="">
			<input class="ss_box" type="text" name="word" id="kw" autocomplete="off">&nbsp;
			<input type="submit"  class="ss_btn" value="搜&nbsp;索"></form>
    </div>
     <div class="hot">
  <font color="#FF0000" style="font-size:13px;">淘宝热卖：</font>
	<?php $_from = $this->_tpl_vars['taobaohotSites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['taobaohotSites'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['taobaohotSites']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['taobaohotSites']['iteration']++;
?>
	<?php echo ((is_array($_tmp=$this->_tpl_vars['list']['content'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

	<?php endforeach; endif; unset($_from); ?>
  </div>
  </div>
<?php endif; ?>
<?php if ($this->_tpl_vars['google']): ?>
<div class="search">
  <div class="search_logo"><img src="../static/images/google_big.gif" /></div>
  <div class="wrap">
     <div class="ss_nav">
        <ul>
          <li><a id="gsb1" class="ss_active" style="cursor:pointer" onclick="googleSearch(1);">网页</a></li>
          <li><a id="gsb2" class="" style="cursor:pointer" onclick="googleSearch(2);">资讯</a></li>
          <li><a id="gsb3" class="" style="cursor:pointer" onclick="googleSearch(3);">视频</a></li>
          <li><a id="gsb4" class="" style="cursor:pointer" onclick="googleSearch(4);">图片</a></li>
          <li><a id="gsb5" class="" style="cursor:pointer" onclick="googleSearch(5);" style=" font-family:'Times New Roman', Times, serif">MP3</a></li>
          <li><a id="gsb6" class="" style="cursor:pointer" onclick="googleSearch(6);">地图</a></li>
          <li><a id="gsb7" class="" style="cursor:pointer" onclick="googleSearch(7);">购物</a></li>
          <li><a id="gsb8" class="" style="cursor:pointer" onclick="googleSearch(8);">问答</a></li>
          <li><a id="gsb9" class="" style="cursor:pointer" onclick="googleSearch(9);">财经</a></li>
        </ul>
    </div>
<div><div id="google_others" style="display:None">
	<form action="http://www.google.com.hk/cse" id="cse-search-box" name="googleSearchForm" method="get" style="margin:0px; padding:0px;">
	<input type="hidden" name="cx" value="partner-pub-9491289701756083:4hs1qt-4p3m" />
	<input type="hidden" name="ie" value="gbk" />
	<input type="hidden" name="oe" value="UTF-8" />
	<input type="hidden" name="hl" value="zh-CN" />
	<input type="hidden" name="source" value="hp" />
	<input type="hidden" name="btnG" value="Google+%E6%90%9C%E7%B4%A2" />
	<input type="hidden" name="aq" value="f" />
	<input type="hidden" name="aqi" value="" />
	<input type="hidden" name="aql" value="" />
	<input type="hidden" name="oq" value="" />
	<input type="hidden" name="gs_rfai" value="" />
	<input type="hidden" id="tbo" name="tbo" value="d">
	<input type="text" class="ss_box" name="q" value="" id="kw"/>&nbsp;<input type="submit" class="ss_btn" name="sa" value="搜 索"/>
	</form></div>
<div id="google_web">
<script type="text/javascript" >
<!--
google_ad_client = "pub-9491289701756083";
google_ad_format = "js_sdo";
google_color_link = "000000";
google_searchbox_width = 382;
google_searchbox_height = 28;
google_link_target = 20;
google_ad_height = 30;
google_ad_width = 488;
//-->
</script>
<script type="text/javascript"
src=" http://pagead2.googlesyndication.com/pagead/show_sdo.js">
</script></div></div></div>
     <div class="hot">
  <font color="#FF0000" style="font-size:13px;">淘宝热卖：</font>
	<?php $_from = $this->_tpl_vars['taobaohotSites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['taobaohotSites'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['taobaohotSites']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['taobaohotSites']['iteration']++;
?>
	<?php echo ((is_array($_tmp=$this->_tpl_vars['list']['content'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

	<?php endforeach; endif; unset($_from); ?>
  </div>
  </div>
<?php endif; ?>

 <div class="cool_site">    
      
<?php $_from = $this->_tpl_vars['siteUrlList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['siteUrlList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['siteUrlList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['siteName'] => $this->_tpl_vars['list']):
        $this->_foreach['siteUrlList']['iteration']++;
?>
<div class="cool_site_top">
<dl><dt><img src="../static/images/<?php echo $this->_tpl_vars['list']['tg']; ?>
"></img><span><?php echo $this->_tpl_vars['list']['te']; ?>
</span></dt><dd>
<?php $_from = $this->_tpl_vars['list']['ss']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['siteurl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['siteurl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['l']):
        $this->_foreach['siteurl']['iteration']++;
?>
<a href="<?php if (strpos ( $this->_tpl_vars['l']['sl'] , '://' ) === false): ?>http://<?php endif; ?><?php echo $this->_tpl_vars['l']['sl']; ?>
"><span id="siten"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['l']['se'])) ? $this->_run_mod_handler('htmlspecialchars_decode', true, $_tmp) : htmlspecialchars_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</span></a>
<?php endforeach; endif; unset($_from); ?>
</dd></dl></div>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['domain'] == $this->_tpl_vars['cookiedomain']): ?><span><a href="http://<?php echo @SITE_DOMAIN; ?>
/i/index.php?c=manage" target="_self"><img src="../static/images/tx_adn.gif" alt="添加分类"></a></span><?php endif; ?>
</div>
<div class="clear"></div>
 <div id="tool">
  <div class="title">
   <span class="tab">比特币价格查询</span> <span class="more"><a href="http://www.btc123.com/html/ex-info.html">更多>></a></span>  </div>
  <div class="main">
    <ul style="width:auto">
    <?php $_from = $this->_tpl_vars['zdydhList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['zdydhList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['zdydhList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
        $this->_foreach['zdydhList']['iteration']++;
?>
      <li><a href="<?php echo $this->_tpl_vars['list']['siteUrl']; ?>
"><?php echo $this->_tpl_vars['list']['siteName']; ?>
</a></li>
	<?php endforeach; endif; unset($_from); ?>
    </ul>
  </div>
 </div>
<?php echo @COUNT_CODE; ?>

</body>
<script type="text/javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/jquery.min.js"></script>
<script language="javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/default.js"></script>
<script  type="text/javascript" charset="utf-8" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/taobao.js"></script>
</html>