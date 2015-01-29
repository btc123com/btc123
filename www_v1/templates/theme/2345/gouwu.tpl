<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?{if $c_name.title != ''}?><?{$c_name.title}?><?{else}?><?{$notag_c_name}?><?{$smarty.const.PAGE_INDEX_TITLE}?><?{/if}?></title>

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="http://<?{$smarty.const.SITE_DOMAIN}?>/theme/<?{$smarty.const.THEME_PATH}?>css/netbuy.css?2011033015" rel="stylesheet" type="text/css" />
<script language="javascript">
function taobaoSearch(id)
{
	document.getElementById("taobaost").value = id-1;
	document.getElementById("rel"+id).className = 'cur';

	for (var i=0; i<=1; i++) {
		if (i != id) {
			document.getElementById("rel"+i).className = '';
		}
	}
}
var tabtimer;
function tabshow(a){tabtimer=setTimeout("tabchange("+a+")",500)}
var tabifr = new Array('','','http://www.5w.com/data/html/gouwu/tb.htm','','http://www.5w.com/data/html/gouwu/tab_shuma.htm','http://www.5w.com/data/html/gouwu/tab_muying.htm','http://www.5w.com/data/html/gouwu/tab_tushu.htm','http://www.5w.com/data/html/gouwu/tab_dazhe.htm');
function tabchange(index){
	for(var i=1;i<=9;i++){
		document.getElementById('tab'+i).className='';
		if(i==9)
			document.getElementById('tab'+i).className='last';
		document.getElementById('tab_'+i).style.display='none';
	}
	var ifr = document.getElementById('ifr'+index);
	if(ifr!=null){
		if(ifr.src!=tabifr[index] && tabifr[index]!='')ifr.src=tabifr[index];
	}
	if(index==1)
		document.getElementById('tab'+index).className='active tab-def';
	else if(index == 9)
		document.getElementById('tab'+index).className='active2 last';
	else
		document.getElementById('tab'+index).className='active';
	document.getElementById('tab_'+index).style.display='';
}
</script>
<style>
.loginon{float:left;width:72px;height:25px;text-align:center;line-height:25px;cursor:pointer;color:#06C;background:url(http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/dialog2_bg_on.jpg) no-repeat center;}
.loginoff{float:left;width:72px;height:25px;text-align:center;line-height:25px;cursor:pointer;color:#FFF;background:url(http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/dialog2_bg_off.jpg) no-repeat center;}
#tab li.tab-def.active { width:72px; margin-left:0;}
</style>
<base target="_blank" />
</head>
<body class="buybg" style="background-position:0px -328px;">
<div class="auto_hidden" id="auto"></div>
<div id="header_detail">
<div id="logo"><a title="<?{$smarty.const.SITE_DOMAIN}?>网址导航" href="http://<?{$smarty.const.SITE_DOMAIN}?>"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/<?{$smarty.const.SITE_LOGO}?>"  width="148" height="60"/></a></div>
<div class="logo_gw"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/logo_gw.gif" width="60" height="47" alt="5w网址导航团购网" /></div>
 <form method="get" style="margin:0px;" name="f" id="J_searchForm" action="http://search8.taobao.com/browse/search_auction.htm" target="_blank" accept-charset="gbk" onsubmit="document.charset='gbk';">
<div id="tsearch">
		<a href="http://www.taobao.com/go/chn/tbk_channel/onsale.php?pid=mm_19869273_2351857_9092259" class="slogo">taobao</a>
		<input type="text" id="q" name="q" autocomplete="off" onkeyup="ac.start(event)" class="input">		
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
 <div class="search_hot_words">
 <a href="http://tb.taoku.com/huangguan/">淘宝皇冠</a><a href="http://s8.taobao.com/search?q=%D0%C2%BF%EE%B4%BA%D7%B0&pid=mm_19869273_2351857_9092259&commend=all">新款春装</a> <a href="http://s.click.taobao.com/t_3?&amp;p=mm_19869273_2351857_9092259&amp;n=23&amp;l=http%3A%2F%2Fs8.taobao.com%2Fbrowse%2F0%2Fn-g%2Czlllx6q----------------40--commend-0-1%2C2-0.htm%3Fpid%3Dmm_19869273_2351857_9092259">淘宝手机</a><a href="http://tb.taoku.com/nvzhuang-1.html">品质女装</a>
 </div>
</div> </form>
 </div>
<div id="nav">
<div class="nav_left"></div>
<ul>
<li class="select"><a>购物导航</a></li>
<li><a href="http://tuan.5w.com">团购大全</a></li>
<li><a href="http://www.taoku.com">网上商城</a></li>
<li><a href="http://dianpu.tao123.com/?pid=mm_26473568_2374124_9161457">淘宝皇冠店</a></li>
<li><a href="http://www.doudou.com/gnCps.php">购物返利</a></li>
</ul>
<div class="nav_right"></div>
</div>
    
<div id="netbuy_content">
 
  <div id="lay-side-right">
  <h2 class="hot_pro">热卖频道</h2>
  <div class="sideright">
  
  
<table width="95%" border="0" cellspacing="0" cellpadding="0" class="hot_pic">
  <tr>
    <td><a href="http://tb.taoku.com/nvzhuang-1.html"> <img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/1.jpg"/></a><br />
      <a href="http://tb.taoku.com/nvzhuang-1.html">品质女装</a></td>
    <td><a href="http://tb.taoku.com/huazhuangpin-1.html"> <img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/2.jpg"/></a><br />
      <a href="http://tb.taoku.com/huazhuangpin-1.html">美容护肤</a></td>
    <td><a href="http://tb.taoku.com/shoushi-1.html"> <img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/3.jpg"/></a><br />
      <a href="http://tb.taoku.com/shoushi-1.html">饰品鞋包</a></td>
    </tr>
  <tr>
    <td><a href="http://tb.taoku.com/neiyi-1.html"> <img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/4.jpg"></a><br />
      <a href="http://tb.taoku.com/neiyi-1.html">男女内衣</a></td>
    <td><a href="http://tb.taoku.com/jianshen-1.html"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/5.jpg"/></a><a href="http://pindao.huoban.taobao.com/tms/channel/beauty.htm?pid=mm_12351394_2325537_9003292&amp;eventid=101328"></a><br />
      <a href="http://tb.taoku.com/jianshen-1.html">运动户外</a></td>
    <td><a href="http://tb.taoku.com/chufangweiyu-1.html"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/6.jpg" /></a><a href="http://pindao.huoban.taobao.com/tms/channel/digital.htm?pid=mm_12351394_2325537_9003292&amp;eventid=101332"></a><br />
      <a href="http://tb.taoku.com/chufangweiyu-1.html">居家日用</a></td>
    </tr>
</table>
</div>
    <h2 class="hot_pro">快捷功能</h2>
    
    <table width="95%" border="0" cellspacing="0" cellpadding="0" class="hot_tool">
      <tr>
        <td height="40"><a href="https://www.alipay.com/"> <img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/alipay.jpg" width="100" height="40"/><br />
          <br />
        </a></td>
        <td><a href="http://kuaidi.5w.com/"> <img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/wl.jpg" width="100" height="40"/><br />
          <br />
        </a></td>
      </tr>
    </table>
    <h2>快递网站</h2>
    <ul class="clearfix">
      <li><a href="http://www.ems.com.cn/">EMS</a></li>
      <li><a href="http://www.sto.cn/">申通快递</a></li>
      <li><a href="http://www.htky365.com/">汇通速递</a></li>
      <li><a href="http://www.zto.cn/">中通快递</a></li>
      <li><a href="http://www.yto.net.cn/">圆通速递</a></li>
      <li><a href="http://www.sf-express.com/">顺丰快递</a></li>
      <li><a href="http://www.4006688400.com/">星晨急便</a></li>
      <li><a href="http://www.yundaex.com">韵达快运</a></li>
      <li><a href="http://www.ttkdex.com">天天快递</a></li>
      <li><a href="http://www.zjs.com.cn">宅急送</a></li>
      <li><a href="http://www.fedex.com/cn/ ">联邦快递</a></li>
      <li><a href="http://www.xbwl.cn/">新邦物流</a></li>
      <li><a href="http://www.tnt.com/express/zh_cn/site/home.html">TNT</a></li>
      <li><a href="http://www.cn.dhl.com/zh.html">DHL</a></li>
      <li><a href="http://www.ups.com/cn">UPS</a></li>
    </ul>
    <h2>在线支付</h2>
    <ul class="clearfix">
      <li><a href="http://www.alipay.com">支付宝</a></li>
      <li><a href="https://www.99bill.com/">快钱</a></li>
      <li><a href="http://www.paypal.com/cn/">贝宝</a></li>
      <li><a href="http://www.chinabank.com.cn">网银在线</a></li>
      <li><a href="https://www.tenpay.com/">财付通</a></li>
      <li><a href="https://www.baifubao.com/">百付宝</a></li>
      <li><a href="http://www.yeepay.com/">易宝支付</a></li>
      <li><a href="http://www.cncard.net/">云网支付</a></li>
      <li><a href="http://www.cmpay.com/">移动支付</a></li>
    </ul>
    <h2>网上银行</h2>
    <ul class="clearfix">
      <li><a href="http://www.icbc.com.cn/icbc/">工商银行</a></li>
      <li><a href="http://www.cmbchina.com">招商银行</a></li>
      <li><a href="http://www.95599.cn/cn">农业银行</a></li>
      <li><a href="http://www.ccb.com/cn/home/index.html">建设银行</a></li>
      <li><a href="http://www.cebbank.com">光大银行</a></li>
      <li><a href="http://www.boc.cn/">中国银行</a></li>
      <li><a href="http://www.spdb.com.cn">浦发银行</a></li>
      <li><a href="http://www.psbc.com">邮政储蓄</a></li>
      <li><a href="http://www.cmbc.com.cn">民生银行</a></li>
      <li><a href="http://www.chinaunionpay.com">中国银联</a></li>
      <li><a href="http://www.sdb.com.cn/website/page">深发银行</a></li>
      <li><a href="http://www.cib.com.cn">兴业银行</a></li>
      <li><a href="http://www.hxb.com.cn">华夏银行</a></li>
      <li><a href="http://www.gdb.com.cn/">广发银行</a></li>
    </ul>
  </div>
  <div id="lay-side-left">
    <div id="tab">
      <ul id="tab_tab">
        <li class="active tab-def" id="tab1" onmouseover="tabshow(1)" onmouseout="clearTimeout(tabtimer)">网购名站</li>
        <li id="tab2" onmouseover="tabshow(2)" onmouseout="clearTimeout(tabtimer)">淘宝购物</li>
        <li id="tab3" onmouseover="tabshow(3)" onmouseout="clearTimeout(tabtimer)">团购名站</li>
        <li id="tab4" onmouseover="tabshow(4)" onmouseout="clearTimeout(tabtimer)">数码家电</li>
        <li id="tab5" onmouseover="tabshow(5)" onmouseout="clearTimeout(tabtimer)">女性母婴</li>
        <li id="tab6" onmouseover="tabshow(6)" onmouseout="clearTimeout(tabtimer)">图书音像</li>
        <li id="tab7" onmouseover="tabshow(7)" onmouseout="clearTimeout(tabtimer)">服装服饰</li>
        <li id="tab8" onmouseover="tabshow(8)" onmouseout="clearTimeout(tabtimer)">日用百货</li>
        <li id="tab9" class="last" onmouseover="tabshow(9)" onmouseout="clearTimeout(tabtimer)">导购打折</li>
      </ul>
    </div>
    <div>
      <div id="tab_1" class="fm" style="display:block;">
      <iframe id="ifr1" src="http://www.5w.com/data/html/gouwu/tab_mz.htm" frameborder="0" scrolling="no" height="336" allowtransparency="true" width="100%"></iframe>
     
        <ul class="site_list">
        <?{foreach name="list" item=tempsite from=$indexedSiteList[0]}?>
          <li><a <?{if $tempsite.siteColor!=''}?>style="color:<?{$tempsite.siteColor}?>"<?{/if}?> href="<?{$tempsite.siteUrl}?>"><?{$tempsite.siteName}?></a></li>
        <?{/foreach}?>
        </ul>
      </div>
      <div id="tab_2" style="display:none">
        <iframe id="ifr2" src="" frameborder="0" scrolling="no" height="476" allowtransparency="true" width="100%"></iframe>
      </div>
      <div id="tab_3" style="display:none">
      <iframe id="ifr1" src="http://www.5w.com/data/html/gouwu/tuan_mz.htm" frameborder="0" scrolling="no" height="158" allowtransparency="true" width="100%"></iframe>
        <ul class="site_list">
<?{foreach name="list" item=tempsite from=$indexedSiteList[7]}?>
          <li><a <?{if $tempsite.siteColor!=''}?>style="color:<?{$tempsite.siteColor}?>"<?{/if}?> href="<?{$tempsite.siteUrl}?>"><?{$tempsite.siteName}?></a></li>
        <?{/foreach}?>
    	
		<li><a href="http://tuan.5w.com/"><font color="red">团购导航</font></a></li>
		<li><a href="http://www.5w.com/tgmore.htm"><font color="red">团购网站大全</font></a></li>
        </ul>
      </div>
      
      <div id="tab_4" style="display:none">
        <iframe id="ifr4" src="" frameborder="0" scrolling="no" height="78" allowtransparency="true" width="100%"></iframe>
        <ul class="site_list">
          <?{foreach name="list" item=tempsite from=$indexedSiteList[1]}?>
          <li><a <?{if $tempsite.siteColor!=''}?>style="color:<?{$tempsite.siteColor}?>"<?{/if}?> href="<?{$tempsite.siteUrl}?>"><?{$tempsite.siteName}?></a></li>
        <?{/foreach}?>
        </ul>
      </div>
      <div id="tab_5" style="display:none">
        <iframe id="ifr5" src="" frameborder="0" scrolling="no" height="78" allowtransparency="true" width="100%"></iframe>
        <ul class="site_list">
          <?{foreach name="list" item=tempsite from=$indexedSiteList[2]}?>
          <li><a <?{if $tempsite.siteColor!=''}?>style="color:<?{$tempsite.siteColor}?>"<?{/if}?> href="<?{$tempsite.siteUrl}?>"><?{$tempsite.siteName}?></a></li>
        <?{/foreach}?>
        </ul>
      </div>
      <div id="tab_6" style="display:none">
      <iframe id="ifr6" src="" frameborder="0" scrolling="no" height="78" allowtransparency="true" width="100%"></iframe>
        <ul class="site_list">
          <?{foreach name="list" item=tempsite from=$indexedSiteList[3]}?>
          <li><a <?{if $tempsite.siteColor!=''}?>style="color:<?{$tempsite.siteColor}?>"<?{/if}?> href="<?{$tempsite.siteUrl}?>"><?{$tempsite.siteName}?></a></li>
        <?{/foreach}?>
        </ul>
      </div>
      <div id="tab_7" style="display:none">
      <iframe id="ifr7" src="" frameborder="0" scrolling="no" height="78" allowtransparency="true" width="100%"></iframe>
        <ul class="site_list">
          <?{foreach name="list" item=tempsite from=$indexedSiteList[4]}?>
          <li><a <?{if $tempsite.siteColor!=''}?>style="color:<?{$tempsite.siteColor}?>"<?{/if}?> href="<?{$tempsite.siteUrl}?>"><?{$tempsite.siteName}?></a></li>
        <?{/foreach}?>
        </ul>
      </div>
      <div id="tab_8" style="display:none;">
        <ul class="site_list">
        <?{foreach name="list" item=tempsite from=$indexedSiteList[5]}?>
          <li><a <?{if $tempsite.siteColor!=''}?>style="color:<?{$tempsite.siteColor}?>"<?{/if}?> href="<?{$tempsite.siteUrl}?>"><?{$tempsite.siteName}?></a></li>
        <?{/foreach}?>
        </ul>
      </div>
      <div id="tab_9" style="display:none;">
        <ul class="site_list">
        <?{foreach name="list" item=tempsite from=$indexedSiteList[6]}?>
          <li><a <?{if $tempsite.siteColor!=''}?>style="color:<?{$tempsite.siteColor}?>"<?{/if}?> href="<?{$tempsite.siteUrl}?>"><?{$tempsite.siteName}?></a></li>
        <?{/foreach}?>
        </ul>
      </div>
  
    </div>
   
  </div>
  
  <div id="hotpro">
  <div id="tab_hot_pro">
      <ul>
        <li class="active tab-def">名品推荐</li>
        </ul>
    </div>
    <ul id="hotpro_list">
      <li><a href="http://s.click.taobao.com/t_3?&p=mm_19869273_2351857_9092259&n=23&l=http%3A%2F%2Fs8.taobao.com%2Fbrowse%2F0%2Fn-g%2Cwcrllty----------------40--commend-0-1%2C2-0.htm%3Fpid%3Dmm_19869273_2351857_9092259"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/ming/ad.png"  width="100" height="49"/></a></li>
       <li><a href="http://s.click.taobao.com/t_3?&p=mm_19869273_2351857_9092259&n=23&l=http%3A%2F%2Fs8.taobao.com%2Fbrowse%2F0%2Fn-g%2Cmfyha3df----------------40--commend-0-1%2C2-0.htm%3Fpid%3Dmm_19869273_2351857_9092259"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/ming/apple.png"  width="100" height="49"/></a></li>
        <li><a href="http://s.click.taobao.com/t_3?&p=mm_19869273_2351857_9092259&n=23&l=http%3A%2F%2Fs8.taobao.com%2Fbrowse%2F0%2Fn-g%2Cx7x437q----------------40--commend-0-1%2C2-0.htm%3Fpid%3Dmm_19869273_2351857_9092259"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/ming/conver.png"  width="100" height="49"/></a></li>
         <li><a href="http://s.click.taobao.com/t_3?&p=mm_19869273_2351857_9092259&n=23&l=http%3A%2F%2Fs8.taobao.com%2Fbrowse%2F0%2Fn-g%2Cwtx5zpoe3uqmllwqvq----------------40--commend-0-1%2C2-0.htm%3Fpid%3Dmm_19869273_2351857_9092259"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/ming/dfn.png"  width="100" height="49"/></a></li>
          <li><a href="http://s.click.taobao.com/t_3?&p=mm_19869273_2351857_9092259&n=23&l=http%3A%2F%2Fs8.taobao.com%2Fbrowse%2F0%2Fn-g%2Cydxm5lglxeqmli6x2a----------------40--commend-0-1%2C2-0.htm%3Fpid%3Dmm_19869273_2351857_9092259"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/ming/lvs.png"  width="100" height="49"/></a></li>
           <li><a href="http://s.click.taobao.com/t_3?&p=mm_19869273_2351857_9092259&n=23&l=http%3A%2F%2Fs8.taobao.com%2Fbrowse%2F0%2Fn-g%2Cnzuwwzja2tf3nl6qvq----------------40--commend-0-1%2C2-0.htm%3Fpid%3Dmm_19869273_2351857_9092259"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/ming/nk.png"  width="100" height="49"/></a></li>
            <li><a href="http://s.click.taobao.com/t_3?&p=mm_19869273_2351857_9092259&n=23&l=http%3A%2F%2Fs8.taobao.com%2Fbrowse%2F0%2Fn-g%2Cn5rwq2lsnr4q----------------40--commend-0-1%2C2-0.htm%3Fpid%3Dmm_19869273_2351857_9092259"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/ming/oc.png"  width="100" height="49"/></a></li>
             <li><a href="http://s.click.taobao.com/t_3?&p=mm_19869273_2351857_9092259&n=23&l=http%3A%2F%2Fs8.taobao.com%2Fbrowse%2F0%2Fn-g%2Cwhv4f3jaob2w2yi----------------40--commend-0-1%2C2-0.htm%3Fpid%3Dmm_19869273_2351857_9092259"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/ming/puma.png"  width="100" height="49"/></a></li>
              <li><a href="http://s.click.taobao.com/t_3?&p=mm_19869273_2351857_9092259&n=23&l=http%3A%2F%2Fs8.taobao.com%2Fbrowse%2F0%2Fn-g%2Ckzcvet2nj5cecigfv3l3a----------------40--commend-0-1%2C2-0.htm%3Fpid%3Dmm_19869273_2351857_9092259"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/ming/vero-moda.png"  width="100" height="49"/></a></li>
               <li><a href="http://s.click.taobao.com/t_3?&p=mm_19869273_2351857_9092259&n=23&l=http%3A%2F%2Fs8.taobao.com%2Fbrowse%2F0%2Fn-g%2Cpjqxeyi----------------40--commend-0-1%2C2-0.htm%3Fpid%3Dmm_19869273_2351857_9092259"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/ming/zara.gif"  width="100" height="49"/></a></li>
    </ul>
  </div>
</div>
<div class="request"><a href="http://<?{$smarty.const.SITE_DOMAIN}?>/message.htm<?{if $siteUlr}?>?from=<?{$siteUlr}?><?{/if}?>">您觉得该栏目还有哪些不足</a>？</div>
<div class="home"><a href="http://<?{$smarty.const.SITE_DOMAIN}?>" class="back" target="_self">返回</a></div>
<a href="#" id="addmyfav" style="display:none;" title="添加到自定义导航"></a>
<!--//底部版权-->
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/5wsub.js"></script>
<script language="javascript">
var ac=new AC('q','auto','taobao');
</script>
<?{$smarty.const.COUNT_CODE}?>
</body>
</html>