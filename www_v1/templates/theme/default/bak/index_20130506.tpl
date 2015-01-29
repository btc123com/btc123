<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?{$smarty.const.PAGE_INDEX_TITLE}?></title>
<meta name="description" content="<?{$smarty.const.PAGE_INDEX_DESCRIPTION}?>" />
<meta name="keywords" content="<?{$smarty.const.PAGE_INDEX_KEYWORDS}?>" />
<meta name="alexaVerifyID" content="q20LXZC9gMZaY1BhljTY82Os3hM" />
<link href="theme/<?{$smarty.const.THEME_PATH}?>css/style_default.css" rel="stylesheet" type="text/css" id="links"/>
<base target="_blank" />
</head>
<body onload="$('#kw').focus()">
<div id="container">
<div id="topbar">
<div id="top" class="center">
<div id="weather">
<iframe width="540" height="22" frameBorder="0" scrolling="no" allowtransparency="true" src="http://<?{$smarty.const.SITE_DOMAIN}?>/data/html/tianqi.htm"></iframe>
</div>
<ul id="set">
<li class="sethome"><a onclick="setHomePage(this, 'http://<?{$smarty.const.SITE_DOMAIN}?>/');">设为首页</a></li>
<li class="feedback"><a href="message.php?type=3">提建议</a></li>
<li class="setbar"><a onclick="my()">个性设置</a></li>
</ul>
</div></div>
<div class="bg" id="mystylediv" style="display:none">
<div class="mystylediv">
<iframe name="ifStyle" width="100%" height="260" id="ifStyle" frameBorder="0" marginWidth="0" scrolling="no" allowTransparency="allowtransparency"></iframe>
</div>
</div>
<div id="mystyle">
<div id="header" class="center w990">
<h1 id="logo"><a style="behavior: url(#default#homepage)" title="把<?{$smarty.const.SITE_DOMAIN}?>网址导航 设为主页" onclick="this.style.behavior='url(#default#homepage)';this.sethomepage('http://<?{$smarty.const.SITE_DOMAIN}?>/');return(false);" href="http://<?{$smarty.const.SITE_DOMAIN}?>" target=_self><img src="<?{$smarty.const.SITE_LOGO}?>" width="180" height="60"></a></h1>
<form name="mail" method="post" onsubmit="MailLogin.sendMail();return false;" action="">
<div class="top_login"><b>邮箱：</b>
<select id="hao_mail_options" class="lg_select" onchange="MailLogin.change(this)"><option>--请选择--</option><option>@163.com 网易</option><option>@126.com 网易</option><option>登录百度</option><option>人人网</option><option>@sina.com 新浪</option><option>@yahoo.com.cn</option><option>@yahoo.cn</option><option>@sohu.com 搜狐</option><option>@tom.com</option><option>@21cn.com</option><option>@yeah.net</option><option>51.com</option><option>天涯社区</option><option>ChinaRen</option><option>以下请在弹出页登录↓</option><option>QQ空间</option><option>@qq.com</option><option>@gmail.com</option><option>@hotmail.com</option><option>@139.com</option><option>开心网</option></select><br>
<b>账号：</b>
<input id="hao_mail_username" class="lg_input" type="text">
<b>密码：</b>
<input id="hao_mail_passwd" class="lg_pw" type="password">
<input class="lg_sub" value="登录" type="submit">
</div></form>
<div id="topimg"><?{$adIndexMidArr.content|stripslashes}?></div>
<?{foreach name=adIndexArr item=list key=key from=$adIndexArr}?>
<div class="topimg_s" <?{if $key==1}?>id="t_s" style="display:none"<?{/if}?>><?{$list.content|stripslashes}?></div>
<?{/foreach}?>
<div style="float:right"><iframe src="data/html/huangli.htm" allowtransparency="true" style="background-color=transparent;" width="155" height="64" SCROLLING="no" frameBorder="0"></iframe></div>
</div>
<style>
#suggest_box{position:absolute;display:none;z-index:1100;text-align:left;}#suggest_box table{border:1px #333 solid;background:#fff;text-align:right;}#suggest_box tr{line-height:17px;}#suggest_box .hover{background:#36c;color:#fff;}
#suggest_box .hover .suggest_keyword,#suggest_box .hover .suggest_num{color:#fff;}
.suggest_keyword{text-align:left;padding:0 1em 0 3px;font-size:13px;overflow:hidden;white-space:nowrap;color:#000;}.suggest_num{color:green;font-size:12px;overflow:hidden;padding:0 3px;text-align:right;white-space:nowrap;}
</style>
<div id="search" class="center w990">
<div class="wrap02">
<ul class="clear_float" id="s_ul">
<?{foreach item=s1 from=$search_class}?>
<li id="so_<?{$s1.classid}?>" <?{if $s1.is_default}?>class="cur"<?{/if}?> onclick="change(<?{$s1.classid}?>)"><a><?{$s1.classname}?></a></li>
<?{/foreach}?>
</ul>
<div class="ad3"><?{foreach item=ad3 from=$adsRightArr}?><?{$ad3.content|stripslashes}?><?{/foreach}?></div>
</div>
<div class="searchbox" id="sb">
<div id="sform">
<div id="sf">
<div id="search_form"><form name="f" action="<?{$defaultsearch.action}?>" method="get" ><p><a href="<?{$defaultsearch.url}?>"><img src="<?{$defaultsearch.img_url}?>" border="0" /></a><input type="text" size="42" class="int" autocomplete="off" name="<?{$defaultsearch.name}?>" id="kw"/><?{foreach from=$params item=p}?><input type="hidden" name="<?{$p[0]}?>" value="<?{$p[1]}?>"/><?{/foreach}?><input type="submit" value="<?{$defaultsearch.btn}?>" id="bdbutton" class="searchint"></p></form></div>
<div class="ctrl">
<?{foreach from=$search item=row1}?>
<label><input class="radio" onclick="changesearch(<?{$row1.id}?>)" type="radio" name="search_select" <?{if $row1.is_default}?> checked="checked"<?{/if}?> /><?{$row1.search_select}?></label>
<?{/foreach}?>
</div>
</div>
<div id="hot_words">
<ul>
<?{foreach name=adSeacherArr item=list from=$adSeacherArr}?>
<li><a href="<?{$list.url}?>" <?{if $list.namecolor !=''}?>style="color:<?{$list.namecolor}?>"<?{/if}?>><?{$list.name}?></a></li>
<?{/foreach}?>
</ul>
</div>
</div>
</div>
</div>
<div id="TickerAndInfo" class="center w990"><iframe id="TickerAndInfoFrame" class="w990" frameBorder="0" src="http://ticker.btc123.com/" scrolling="no"></iframe></div>
<div id="content" class="center w990">
<div id="cate">

<?{foreach name=SiteList item=cate from=$leftSiteList}?>
<?{if $cate.stpHtmlName}?><h2><a href="<?{$cate.stpHtmlName}?>"><?{$cate.stpName}?></a></h2><?{else}?><h2><?{$cate.stpName}?></h2><?{/if}?>
<ul>
<?{foreach name=CateList item=list from=$cate.sites key=key}?>
<li><a href="<?{$list.siteUrl}?>" <?{if $list.siteColor !=''}?>style="color:<?{$list.siteColor}?>"<?{/if}?>><?{$list.siteName}?></a></li>
<?{foreachelse}?>
还没有添加子栏目
<?{/foreach}?>
</ul>
<?{/foreach}?>
</div>
<div id="main">
<div id="main_tab">
<div class="wrap_main">
<ul class="clear_float" id="tabname">
<li id='s10' onMouseOver="qhshow(0);" onmouseout="clearTimeout(timer)" class="cur_main"><a><span>名站导航</span></a></li>
<?{foreach name=mztabs item=tab from=$mztabs}?>
<li id='s1<?{$tab.iid}?>' onMouseOver="qhshow(<?{$tab.iid}?>);" onmouseout="clearTimeout(timer)"><a><span><?{$tab.iname}?></span></a></li>
<?{/foreach}?>
</ul>
</div>
</div>
<div class="main_box" id="tabs">
<div class="mzdh_list1" id="s_s10" style="display:block">
<ul id="topsite">
<?{foreach name=mztop item=list from=$mztop}?>
<li><?{$list.content|stripslashes}?></li>
<?{/foreach}?>
</ul>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<?{foreach name=mingzhanSiteList item=list from=$mingzhanSiteList key=key}?>
<td><a href="<?{$list.siteUrl}?>" <?{if $list.siteColor}?>style="color:<?{$list.siteColor}?>"<?{/if}?>><?{$list.siteName}?></a></td>
<?{if ($smarty.foreach.mingzhanSiteList.index+1) mod 6 eq 0}?></tr><tr><?{/if}?>
<?{/foreach}?>
<?{foreach name=adMingzhan item=list from=$adMingzhan}?>
<td><?{$list.content|stripslashes}?></a></td><?{if ($smarty.foreach.adMingzhan.index+1) mod 6 eq 0}?></tr><tr><?{/if}?>
<?{/foreach}?>
</table>
</div>
<div id="mzdh_other" style="display:none"></div>
</div>

<div id="outside_ad_1">
<!--a href="http://www.btcbbs.com" title="比特币中文论坛"><img src="http://btc123.com/static/images/btcbbs_ads_728_60.png"></a-->
<a href="https://www.btcsea.com" title="比特海"><img src="http://www.btc123.com/static/images/gg2_728_60.jpg"></a>
</div>

<div class="cate">
<div id="google">
<div class="googlelogo"><a href="https://bitcointalk.org"><img src="static/images/bitcointalk_155_25.png" width="155" height="25" /></a></div>
<div style="width:335px; float:left; height:25px; padding-top:4px;">

<form method="get" action="http://www.google.com/search" target="_blank">
<input value="搜索 BitcoinTalk.org 社区内容" onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}" style="color:#999999" type="text" name="q" class="sear">
<input type="submit" name="btnG" value="" class="s_menu" />
<input type="hidden" name="ie" value="UTF-8" />
<input type="hidden" name="oe" value="UTF-8" />
<input type="hidden" name="hl" value="UTF-8" />
<input type="hidden" name="domains" value="http://bitcontalk.org" />
<input type="hidden" name="sitesearch" value="http://bitcointalk.org" />
</form>
</div>
<div class="s_txt">　<a href="https://bitcointalk.org/index.php?board=7.0" target="_blank">比特币经济状况</a>　<a href="https://bitcointalk.org/index.php?board=57.0" target="_blank">价格走势预测</a>　<a href="https://bitcointalk.org/index.php?board=14.0" target="_blank">矿友社区</a></div>
</div>
<table width="100%" cellspacing=0>
<tbody>
<?{foreach name=coolSiteList item=cate from=$coolSiteList}?>
<tr class="<?{cycle values="bg1,bg2"}?>">
<th <?{if $smarty.foreach.coolSiteList.index eq 0}?><?{/if}?>><a href="<?{$cate.stpHtmlName}?>"><?{$cate.stpName}?></a></th>
<td class="s_widen"><?{foreach name=coolSite item=list from=$cate.sites}?>
<a href="<?{$list.siteUrl}?>" <?{if $list.siteColor}?>style="color:<?{$list.siteColor}?>"<?{/if}?>><?{$list.siteName}?></a><?{foreachelse}?>还没有添加站点<?{/foreach}?></td>
<td <?{if $smarty.foreach.coolSiteList.index eq 0}?>width=60<?{/if}?>><b><a href="<?{$cate.stpHtmlName}?>" style="font-size:12px;color:grey">更多&raquo;</a></b></td>
</tr>
<?{/foreach}?>
</tbody>
</table>
</div>
</div>
</div>
<div class="bottom_nav">
<?{foreach name=footSiteList item=cate from=$footSiteList}?>
<div class="brow"><span><a href="<?{$cate.stpHtmlName}?>"><?{$cate.stpName}?>：</a></span>
<p>
<?{foreach name=SiteList item=list from=$cate.sites}?><a href="<?{$list.siteUrl}?>" <?{if $list.siteColor}?>style="color:<?{$list.siteColor}?>"<?{/if}?>><?{$list.siteName}?></a><?{/foreach}?>
</p>
<b><a href="<?{$cate.stpHtmlName}?>" style="font-size:12px;color:grey">更多&raquo;</a></b></div>
<?{/foreach}?>
</div>
<div class="search_bottom">
<div id="search_bottom">
<form  method="get" action="http://www.soso.com/q" name="f"><p><a href="http://www.soso.com/?unc=b400056&amp;cid=union.s.wh"><img border="0" src="static/images/soso.gif"></a><input type="text" id="b_kw" name="w" autocomplete="off" class="int" size="42"><input type="hidden" value="b400056" name="unc"><input type="hidden" value="union.s.wh" name="cid"><input type="hidden" value="gb2312" name="ie"><input type="submit" class="btn" id="bdbutton" value="搜 索"></p></form>
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
</div>
<?{include file="$footer_path"}?>
</div>
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/taobao.js"></script>
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/index.js"></script>
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/mail.js"></script>
<script language="javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/mobile.js"></script>
</body>
</html>
