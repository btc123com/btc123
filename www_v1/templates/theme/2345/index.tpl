<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?{$smarty.const.PAGE_INDEX_TITLE}?></title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="description" content="<?{$smarty.const.PAGE_INDEX_DESCRIPTION}?>" />
<meta name="keywords" content="<?{$smarty.const.PAGE_INDEX_KEYWORDS}?>" />
<link href="http://<?{$smarty.const.SITE_DOMAIN}?>/theme/<?{$smarty.const.THEME_PATH}?>css/base.css" rel="stylesheet" type="text/css" id="links"/>
<link href="http://<?{$smarty.const.SITE_DOMAIN}?>/theme/<?{$smarty.const.THEME_PATH}?>css/global.css" rel="stylesheet" type="text/css" id="links"/>
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/jquery.min.js"></script>
<script  type="text/javascript" charset="utf-8" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/taobao.js"></script>
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/index.js?20101101"></script>
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/mail.js?20101101"></script>
<base target="_blank" />
</head>
<body>
<script language="javascript">
colorOn();
</script>
<div class="shanchi"><div class="notice"><span>
<b><a href="http://www.5w.com/message.htm">网友留言</a></b>
<b class="userct"><a  href="http://i.5w.com/">个性导航</a></b><b><a href="http://www.5w.com/help.htm">主页修复</a></b><b><a class="home" style="cursor:pointer" onclick="setHomePage(this,'http://2345.5w.com/');">把2345设为主页</a></b>
</span><a href="http://firefox.5w.com/" name="2">→下载站长浏览器,Firefox 3.6.12(1125) 最新版</a></div></div>
<div id="header">
<h1 id="logo"><a style="behavior: url(#default#homepage)" title="把<?{$smarty.const.SITE_DOMAIN}?>网址导航 设为主页" onclick="this.style.behavior='url(#default#homepage)';this.sethomepage('http://<?{$smarty.const.SITE_DOMAIN}?>/');clickcount('homepage1');return(false);" href="http://<?{$smarty.const.SITE_DOMAIN}?>" target=_self><img src="<?{$smarty.const.SITE_LOGO}?>" alt=""></a></h1>

<div id="weather">
<iframe src="http://<?{$smarty.const.SITE_DOMAIN}?>/data/html/tianqi234.htm" width="415" height="60" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe>
</div>
<?{foreach name=adIndexArr item=list key=key from=$adIndexArr}?>
<div class="topimg_s" <?{if $key==1}?>id="t_s" style="display:none"<?{/if}?>><?{$list.content|stripslashes}?></div>
<?{/foreach}?>
<form name="mail" method="post" onsubmit="MailLogin.sendMail();return false;" action="" target="_blank">
<div class="top_login"><b>邮箱：</b>
<select id="hao_mail_options" class="lg_select" onchange="MailLogin.change(this)"><option>--请选择--</option><option>@163.com 网易</option><option>@126.com 网易</option><option>登录百度</option><option>人人网</option><option>@sina.com 新浪</option><option>@yahoo.com.cn</option><option>@yahoo.cn</option><option>@sohu.com 搜狐</option><option>@tom.com</option><option>@21cn.com</option><option>@yeah.net</option><option>51.com</option><option>天涯社区</option><option>ChinaRen</option><option>以下请在弹出页登录↓</option><option>QQ空间</option><option>@qq.com</option><option>@gmail.com</option><option>@hotmail.com</option><option>@139.com</option><option>开心网</option></select><br>
<b>账号：</b>
<input id="hao_mail_username" class="lg_input" name="hao_mail_username" value="" type="text">
<b>密码：</b>

<input id="hao_mail_passwd" class="lg_pw" name="hao_mail_passwd" value="" type="password">

<input class="lg_sub" value="登录" type="submit" style="cursor:pointer">
</div></form>
<div style="float:right"><iframe src="http://<?{$smarty.const.SITE_DOMAIN}?>/data/html/huangli.htm" width="165" height="64" SCROLLING="no" FRAMEBORDER="0"></iframe></div>
</div>
<style>
#suggest_box{position:absolute;display:none;z-index:1100;text-align:left;}#suggest_box table{border:1px #333 solid;background:#fff;text-align:right;}#suggest_box tr{line-height:17px;}#suggest_box .hover{background:#36c;color:#fff;}
#suggest_box .hover .suggest_keyword,#suggest_box .hover .suggest_num{color:#fff;}
.suggest_keyword{text-align:left;padding:0 1em 0 3px;font-size:13px;overflow:hidden;white-space:nowrap;color:#000;}.suggest_num{color:green;font-size:12px;overflow:hidden;padding:0 3px;text-align:right;white-space:nowrap;}
.loginon{float:left;width:72px;height:25px;text-align:center;line-height:25px;cursor:pointer;color:#06C;background:url(http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/dialog2_bg_on.jpg) no-repeat center;}
.loginoff{float:left;width:72px;height:25px;text-align:center;line-height:25px;cursor:pointer;color:#FFF;background:url(http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/dialog2_bg_off.jpg) no-repeat center;}
</style>
<div id="search">
<div class="wrap02">
<ul class="clear_float" id="s_ul">
<?{foreach item=s1 from=$search_class}?>
<li id="so_<?{$s1.classid}?>" <?{if $s1.is_default}?>class="cur"<?{/if}?> onclick="change(<?{$s1.classid}?>)"><a><?{$s1.classname}?></a></li>
<?{/foreach}?>
</ul>
<div class="ad3"><?{foreach item=ad3 from=$adsRightArr}?><?{$ad3.content|stripslashes}?><?{/foreach}?></div>
</div>
</div>

<div class="searchbox">
<div id="sform">
<div id="sf"><div id="search_form"><form name="f" action="<?{$defaultsearch.action}?>" method="get" accept-charset="gbk" onsubmit="document.charset='gbk';"><p><a href="<?{$defaultsearch.url}?>"><img src="<?{$defaultsearch.img_url}?>" border="0" /></a><input type="text" size="42" class="int" autocomplete="off" name="<?{$defaultsearch.name}?>" id="kw"/><?{foreach from=$params item=p}?><input type="hidden" name="<?{$p[0]}?>" value="<?{$p[1]}?>"/><?{/foreach}?><input type="submit" value="<?{$defaultsearch.btn}?>" id="bdbutton" class="searchint"></p></form></div>
<div class="ctrl">
<?{foreach from=$search item=row1}?>
<label><input class="radio" onclick="changesearch(<?{$row1.id}?>)" type="radio" name="search_select" <?{if $row1.is_default}?> checked="checked"<?{/if}?> /><?{$row1.search_select}?></label>
<?{/foreach}?>
</div>
</div>
<div id="hot_words">
<ul>
<?{foreach name=adSeacherArr item=list from=$adSeacherArr}?>
<li><a href="<?{$list.url}?>" style="color:<?{$list.namecolor}?>"><?{$list.name}?></a></li>
<?{/foreach}?>
</ul>
</div>
</div>
</div>
<div id="content">
 <div id="user"><span>我的网站：</span><label style="float:left" id="urlhistory"></label><label><a href="http://<?{$smarty.const.SITE_DOMAIN}?>/i/?c=manage" target="_blank">登录个性首页</a></label></div>
<div id="cate">
<div id="tool">
<h2 class="tool-title">实用工具<span><a href="http://chaxun.5w.com/" target="_blank">更多&raquo;</a></span></h2>
<ul>
<?{foreach name=toolList item=list from=$toolList key=key}?>
<li><a target="_blank" href="<?{$list.siteUrl}?>" target="_blank" <?{if $list.siteColor}?>style="color:<?{$list.siteColor}?>"<?{/if}?>><?{$list.siteName}?></a></li>
<?{/foreach}?>
</ul>
</div>
<ul id="tool-tab">
<li id="tool-tab1" rel="tb4" onClick="toolChange(1);" class="active">手机</li>
<li id="tool-tab2" rel="tb1" onClick="toolChange(2);" class="">游戏</li>
<li id="tool-tab3" rel="tb2" onClick="toolChange(3);" class="">机票</li>
<li id="tool-tab4" rel="tb3" onClick="toolChange(4);" class="">酒店</li>
</ul>
<div id="tb">
<div id="tb1" class="tbox" style="display:inline-block;"><iframe width="217" SCROLLING="no" FRAMEBORDER="0" src="http://www.5w.com/data/html/mobile.htm"></iframe></div>
<div id="tb2" class="tbox" style="display:none"><iframe width="217" id="tbif2" SCROLLING="no" FRAMEBORDER="0"></iframe></div>
<div id="tb3" class="tbox" style="display:none"><iframe width="217" id="tbif3" SCROLLING="no" FRAMEBORDER="0"></iframe></div>
<div id="tb4" class="tbox" style="display:none"><iframe width="217" id="tbif4" SCROLLING="no" src="" FRAMEBORDER="0"></iframe></div>

</div>
</div>

<div id="main">

<div class="main_box">
<div class="mzdh_list1" id="s_s11" style="display:block" >
<ul id="topsite">
<?{foreach name=mztop item=list from=$mztop}?>
<li><?{$list.content|stripslashes}?></li>
<?{/foreach}?>
</ul>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<?{foreach name=mingzhanSiteList item=list from=$mingzhanSiteList key=key}?>
    <td><a target="_blank" href="<?{$list.siteUrl}?>" <?{if $list.siteColor}?>style="color:<?{$list.siteColor}?>"<?{/if}?>><?{$list.siteName}?></a></td>
<?{if ($smarty.foreach.mingzhanSiteList.index+1) mod 6 eq 0}?></tr><tr><?{/if}?>
<?{/foreach}?>
<?{foreach name=adMingzhan item=list from=$adMingzhan}?>
<td><?{$list.content|stripslashes}?></a></td><?{if ($smarty.foreach.adMingzhan.index+1) mod 6 eq 0}?></tr><tr><?{/if}?>
<?{/foreach}?>
</table>
</div>

</div>
<div class="mzdh_bottom">
<?{foreach name=adMidArr item=list from=$adMidArr}?>
<?{$list.content|stripslashes}?>
<?{/foreach}?>
</div>
<div class="cate">
<table width="100%" cellspacing=0>
<tbody>
<?{foreach name=coolSiteList item=cate from=$coolSiteList}?>
<tr class="<?{cycle values="bg1,bg2"}?>">
<th><a href="<?{$cate.stpHtmlName}?>" target="_blank"><?{$cate.stpName}?></a></th>
<td class="s_widen"><?{foreach name=coolSite item=list from=$cate.sites}?>
<a href="<?{$list.siteUrl}?>" target="_blank" <?{if $list.siteColor}?>style="color:<?{$list.siteColor}?>"<?{/if}?>><?{$list.siteName}?></a><?{foreachelse}?>还没有添加站点<?{/foreach}?></td>

<td width=60><b><a href="<?{$cate.stpHtmlName}?>" target="_blank">更多&raquo;</a></b></td>
</tr>
<?{/foreach}?>
</tbody>
</table>
</div>
</div>
<div id="cate2">
<?{foreach name=SiteList item=cate from=$leftSiteList}?>
<?{if $cate.stpHtmlName}?><h2><a href="<?{$cate.stpHtmlName}?>" target="_blank"><?{$cate.stpName}?></a></h2><?{else}?><h2><?{$cate.stpName}?></h2><?{/if}?>
<ul>
<?{foreach name=CateList item=list from=$cate.sites key=key}?>
<li><a href="<?{$list.siteUrl}?>" <?{if $list.siteColor !=''}?>style="color:<?{$list.siteColor}?>"<?{/if}?>><?{$list.siteName}?></a></li>
<?{foreachelse}?>
还没有添加子栏目
<?{/foreach}?>
</ul>
<?{/foreach}?>
</div>
</div>

<div class="bottom_nav">
<?{foreach name=footSiteList item=cate from=$footSiteList}?>
<div class="brow"><span><a href="<?{$cate.stpHtmlName}?>" target="_blank"><?{$cate.stpName}?>：</a></span>
<p>
<?{foreach name=SiteList item=list from=$cate.sites}?><a href="<?{$list.siteUrl}?>" target="_blank" <?{if $list.siteColor}?>style="color:<?{$list.siteColor}?>"<?{/if}?>><?{$list.siteName}?></a><?{/foreach}?>
</p>
<b><a href="<?{$cate.stpHtmlName}?>" target="_blank">更多&raquo;</a></b></div>
<?{/foreach}?>


</div>
<div class="search_bottom">
<div id="search_bottom">
<form  method="get" action="http://www.soso.com/q" name="f"><p><a href="http://www.soso.com/?unc=b400056&amp;cid=union.s.wh"><img border="0" src="http://www.5w.com/static/images/s/soso.gif"></a><input type="text" id="b_kw" name="w" autocomplete="off" class="int" size="42"><input type="hidden" value="b400056" name="unc"><input type="hidden" value="union.s.wh" name="cid"><input type="hidden" value="gb2312" name="ie"><input type="submit" class="btn" id="bdbutton" value="搜 索"></p></form>
</div>
<ul><li><input class="radio" onclick="b_changesearch(46)" type="radio" name="b_search_select">淘宝</li>
<li><input class="radio" onclick="b_changesearch(22)" type="radio" name="b_search_select" checked>搜搜</li>
<li><input class="radio" onclick="b_changesearch(36)" type="radio" name="b_search_select">搜狗</li>
<li><input class="radio" onclick="b_changesearch(4)" type="radio" name="b_search_select">百度</li>
<li><input class="radio" onclick="b_changesearch(13)" type="radio" name="b_search_select">谷歌</li>
<li><input class="radio" onclick="b_changesearch(44)" type="radio" name="b_search_select">有道</li>
<li><input class="radio" onclick="b_changesearch(45)" type="radio" name="b_search_select">影视</li>
</ul>
<div class="gotop"><a href="#" target="_self">返回顶部↑</a></div>
</div>
<?{include file="$footer_path"}?>
<script type="text/javascript">
$(document).ready(function(){
$.getJSON("i/index.php?c=index&a=get2345Index",function(json){
var se='';
for(s in json){
if(s<15){se += '<a target="_blank" href="http://'+json[s].sl+'">'+json[s].se+'</a>';}
}
$("#urlhistory").html(se);
})})
</script>
</body>
</html>