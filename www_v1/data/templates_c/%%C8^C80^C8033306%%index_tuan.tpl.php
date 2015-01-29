<?php /* Smarty version 2.6.18, created on 2012-06-22 07:35:18
         compiled from tuan/index_tuan.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['city']; ?>
团购 - <?php echo $this->_tpl_vars['city']; ?>
团购网 - <?php echo @SITE_NAME; ?>
网址导航! – <?php echo $this->_tpl_vars['city']; ?>
团购导航最专业的团购网站! </title>
<META name="keywords" content="<?php echo $this->_tpl_vars['city']; ?>
团购,<?php echo $this->_tpl_vars['city']; ?>
团购网,团购,团购网,团购网站,今日团购,团购导航,团购大全,团购网站大全" />
<META name="description" content="5w网址导航团购,美团,糯米,拉手,QQ团,点评团,等各大名团信息汇聚,整合杭州团购网,北京团购网,上海团购网以及广州,深圳,南京,成都,青岛,西安等全国团购网的团购信息,5w网址导航拥有团购网站大全中最具价值的团购信息,更新<?php echo $this->_tpl_vars['city']; ?>
团购每日团购信息,打造最专业的团购导航。" />
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="http://<?php echo @SITE_DOMAIN; ?>
/tuan/css/tuan.css?2011032218" rel="stylesheet" type="text/css" />
<base target="_blank" />
<style>
#suggest_box{position:absolute;display:none;z-index:1100;text-align:left;}#suggest_box table{border:1px #333 solid;background:#fff;text-align:right;}#suggest_box tr{line-height:17px;}#suggest_box .hover{background:#36c;color:#fff;}
#suggest_box .hover .suggest_keyword,#suggest_box .hover .suggest_num{color:#fff;}
.suggest_keyword{text-align:left;padding:0 1em 0 3px;font-size:13px;overflow:hidden;white-space:nowrap;color:#000;}.suggest_num{color:green;font-size:12px;overflow:hidden;padding:0 3px;text-align:right;white-space:nowrap;}
.loginon{float:left;width:72px;height:25px;text-align:center;line-height:25px;cursor:pointer;color:#06C;background:url(http://<?php echo @SITE_DOMAIN; ?>
/static/images/dialog2_bg_on.jpg) no-repeat center;}
.loginoff{float:left;width:72px;height:25px;text-align:center;line-height:25px;cursor:pointer;color:#FFF;background:url(http://<?php echo @SITE_DOMAIN; ?>
/static/images/dialog2_bg_off.jpg) no-repeat center;}
</style>
</head>
<body onclick="if(iframepage) iframepage.window.hideCity();" class="bg">
<a name="pagetop"></a>

<div style="margin:0 auto;width:960px; position:relative">
<div id="header_detail">
<div id="logo"><a href="http://<?php echo @SITE_DOMAIN; ?>
/"><img src="http://<?php echo @SITE_DOMAIN; ?>
/static/images/logo.gif" /></a></div>
<div class="logo_tuan" title="5w网址导航团购网">5w网址导航团购网</div>
<form method="get" style="margin:0px;" name="taobaoSearchForm" id="J_searchForm" action="http://search8.taobao.com/browse/search_auction.htm" target="_blank">
<div id="tsearch">
		<a href="http://www.taobao.com/go/chn/tbk_channel/onsale.php?pid=mm_19869273_2351857_9092259" class="slogo">taobao</a>
		<input type="text" value="" id="q" name="q" autocomplete="off" class="input">			
		<input type="hidden" value="mm_19869273_2351857_9092259" name="pid">
		<input type="hidden" value="0" id="taobaost" name="st">
		<input type="hidden" value="all" name="commend"/> 
<input type="hidden" value="auction" name="search_type"/>
<input type="hidden" value="initiative" name="user_action"/>
<input type="hidden" value="D9_5_1" name="f"/>
<input type="hidden" value="1" name="at_topsearch"/>
<input type="hidden" value="" name="sort"/>
<input type="hidden" value="66" name="mode" />
<input type="hidden" value="0" name="spercent"/>

          <input type="submit" value="搜索" class="searchint" > 
</div> </form>
     
</div>
<div id="nav">
<div class="nav_left"></div>
<ul>
<li><a href="http://<?php echo @SITE_DOMAIN; ?>
/netbuy.htm">购物导航</a></li>
<li class="select">团购大全</li>
<li><a href="http://www.taoku.com">网上商城</a></li>
<li><a href="http://www.taobao.com/go/chn/tbk_channel/huangguan.php?pid=mm_19869273_2351857_9092259&eventid=101858">淘宝皇冠店</a></li>
<li><a href="http://www.doudou.com/gnCps.php">购物返利</a></li>
</ul><div class="nav_right"></div>
   <!-- JiaThis Button BEGIN -->
<div id="ckepop" style="float:right; margin-top:10px">
	<a href="http://www.jiathis.com/share/?uid=895384" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
	<a class="jiathis_button_qzone"></a>
	<a class="jiathis_button_taobao"></a>
	<a class="jiathis_button_tsina"></a>
	<a class="jiathis_button_kaixin001"></a>
	<a class="jiathis_button_renren"></a>
	<a class="jiathis_button_douban"></a>
</div>
<script type="text/javascript" src="http://v2.jiathis.com/code/jia.js?uid=895384" charset="utf-8"></script>
<!-- JiaThis Button END -->

</div>
<div id="promotion_main">

<div class="tg_mall_list">
  <ul>
	<?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['max'] = (int)49;
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['arrSites']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['loop']['show'] = true;
if ($this->_sections['loop']['max'] < 0)
    $this->_sections['loop']['max'] = $this->_sections['loop']['loop'];
$this->_sections['loop']['step'] = 1;
$this->_sections['loop']['start'] = $this->_sections['loop']['step'] > 0 ? 0 : $this->_sections['loop']['loop']-1;
if ($this->_sections['loop']['show']) {
    $this->_sections['loop']['total'] = min(ceil(($this->_sections['loop']['step'] > 0 ? $this->_sections['loop']['loop'] - $this->_sections['loop']['start'] : $this->_sections['loop']['start']+1)/abs($this->_sections['loop']['step'])), $this->_sections['loop']['max']);
    if ($this->_sections['loop']['total'] == 0)
        $this->_sections['loop']['show'] = false;
} else
    $this->_sections['loop']['total'] = 0;
if ($this->_sections['loop']['show']):

            for ($this->_sections['loop']['index'] = $this->_sections['loop']['start'], $this->_sections['loop']['iteration'] = 1;
                 $this->_sections['loop']['iteration'] <= $this->_sections['loop']['total'];
                 $this->_sections['loop']['index'] += $this->_sections['loop']['step'], $this->_sections['loop']['iteration']++):
$this->_sections['loop']['rownum'] = $this->_sections['loop']['iteration'];
$this->_sections['loop']['index_prev'] = $this->_sections['loop']['index'] - $this->_sections['loop']['step'];
$this->_sections['loop']['index_next'] = $this->_sections['loop']['index'] + $this->_sections['loop']['step'];
$this->_sections['loop']['first']      = ($this->_sections['loop']['iteration'] == 1);
$this->_sections['loop']['last']       = ($this->_sections['loop']['iteration'] == $this->_sections['loop']['total']);
?>
	<li><a href="<?php echo $this->_tpl_vars['arrSites'][$this->_sections['loop']['index']]['siteurl']; ?>
" target="_blank"><font color="<?php echo $this->_tpl_vars['arrSites'][$this->_sections['loop']['index']]['wordcolor']; ?>
"><?php echo $this->_tpl_vars['arrSites'][$this->_sections['loop']['index']]['sitename']; ?>
</font></a></li>
	<?php endfor; endif; ?>
	<li><a href="http://www.5w.com/tgmore.htm" target="_blank"><font color="red">团购网站大全</font></a></li>
  </ul>
</div>
<iframe src="http://<?php echo @SITE_DOMAIN; ?>
/tuan/index.php?c=tuan&a=list" width="997px" id="iframepage" name="iframepage" frameBorder=0 scrolling=no></iframe>
</div>
  <div class="request"><a href="http://<?php echo @SITE_DOMAIN; ?>
/message.php<?php if ($this->_tpl_vars['siteUlr']): ?>?from=<?php echo $this->_tpl_vars['siteUlr']; ?>
<?php endif; ?>">您觉得该栏目还有哪些不足</a>？</div>
  <div class="home"><a href="http://<?php echo @SITE_DOMAIN; ?>
" class="back" target="_self">返回</a></div>
    <div class="gotop" style="display:none"><a href="#" target="_self" title="返回顶部">返回顶部</a></div>
</div>
<script type="text/javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/jquery.min.js"></script>
<script>
window.onscroll = function(){
	var s = $(".gotop").css("display");
	if(document.documentElement.scrollTop>600){
		if(s == 'none'){
		$(".gotop").show();
		}
	}else{
		if(s == 'block'){
		$(".gotop").hide();
		}
	}
}
</script>
<script  type="text/javascript" charset="utf-8" src="http://<?php echo @SITE_DOMAIN; ?>
/static/js/taobao.js"></script>
<?php echo @COUNT_CODE; ?>

</body>
</html>