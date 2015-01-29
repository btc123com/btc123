<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?{if $c_name.title != ''}?><?{$c_name.title}?><?{else}?><?{$notag_c_name}?><?{$smarty.const.PAGE_INDEX_TITLE}?><?{/if}?></title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta  name="keywords" content="<?{if $c_name.keywords != ''}?><?{$c_name.keywords}?><?{else}?><?{$smarty.const.PAGE_INDEX_KEYWORDS}?><?{/if}?>"  />
<meta  name="description" content="<?{if $c_name.description != ''}?><?{$c_name.description}?><?{else}?><?{$smarty.const.PAGE_INDEX_DESCRIPTION}?><?{/if}?>"  />
<link href="http://<?{$smarty.const.SITE_DOMAIN}?>/theme/<?{$smarty.const.THEME_PATH}?>css/base.css" rel="stylesheet" type="text/css" id="links"/>
<link href="http://<?{$smarty.const.SITE_DOMAIN}?>/theme/<?{$smarty.const.THEME_PATH}?>css/global.css" rel="stylesheet" type="text/css" id="links"/>

<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/jquery.min.js"></script>
<script  type="text/javascript" charset="utf-8" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/taobao.js"></script>
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/index.js?20101101"></script>

</head>
<body>
<script language="javascript">

	var pCss = getCookie('pcss');
	var css='';
	if(pCss == 'green'){
		css ='http://<?{$smarty.const.SITE_DOMAIN}?>/theme/<?{$smarty.const.THEME_PATH}?>css/style_green.css?20101101';
	}else if(pCss == 'pink'){
		css ='http://<?{$smarty.const.SITE_DOMAIN}?>/theme/<?{$smarty.const.THEME_PATH}?>css/style_pink.css?20101101';
	}
	if(css != '')
		document.getElementById('links').href = css;
</script>
<div id="header_detail">
<div id="logo"><a href="http://<?{$smarty.const.SITE_DOMAIN}?>/"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/<?{$smarty.const.SITE_LOGO}?>" /></a></div>
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
<form name="f" action="<?{$defaultsearch.action}?>" method="get" accept-charset="gbk" onsubmit="document.charset='gbk';">
<p><a href="<?{$defaultsearch.url}?>"><img src="../<?{$defaultsearch.img_url}?>" border="0"></a>
<input type="text" style=" width:262px" class="int" autocomplete="off" name="<?{$defaultsearch.name}?>" name="w" id="kw"/>
<?{foreach from=$params item=p}?>
<input type="hidden" name="<?{$p[0]}?>" value="<?{$p[1]}?>"/>
<?{/foreach}?>
<input type="submit" value="<?{$defaultsearch.btn}?>" id="bdbutton" class="searchint">
</p></form></div>
</div>
 <?{foreach item=adneiye from=$adneiye}?>
 <div class="alima">
<?{$adneiye.content|stripslashes}?>
 </div>
 <?{/foreach}?></div>
<div class="bar_nav">
<div class="bar_left"></div>
<div class="tree"><a href="http://<?{$smarty.const.SITE_DOMAIN}?>/" target="_top">导航首页</a> >> <a href="http://<?{$smarty.const.SITE_DOMAIN}?>/<?{$smarty.const.HTML_PATH}?><?{$c_name.stpHtmlName}?>"><?{$c_name.stpName}?></a></div>
<div class="bar_right"></div><div class="sethome2"><a href="javascript:;" onclick="setHomePage(this, 'http://<?{$smarty.const.SITE_DOMAIN}?>');">把<?{$smarty.const.SITE_NAME}?>设为首页</a></div>
</div>
<?{if $dirsite || $coolSiteList}?>
<div class="con">
<?{if $dirsite}?>
<h2><a name="a"><?{$c_name.stpName}?></a></h2>
<table width="100%" border="0" cellpadding="0" cellspacing="1" id="tab_s">
<tr>
<?{foreach name="list1" item=dirsites from=$dirsite}?>
<td<?{if $smarty.foreach.list1.index < 5}?> width="20%"<?{/if}?>><a style="" target="_blank" href="<?{$dirsites.siteUrl}?>"><?{$dirsites.siteName}?></a></td>
<?{if ($smarty.foreach.list1.index+1) mod 5 eq 0}?></tr><tr><?{/if}?>
<?{/foreach}?>
<?{if $smarty.foreach.list1.total mod 5 eq 1}?>
<?{section name=addition loop=$dirsite start=0 max=4}?><td>&nbsp;</td><?{/section}?>
<?{/if}?>
<?{if $smarty.foreach.list1.total mod 5 eq 2}?>
<?{section name=addition loop=$dirsite start=0 max=3}?><td>&nbsp;</td><?{/section}?>
<?{/if}?>
<?{if $smarty.foreach.list1.total mod 5 eq 3}?>
<?{section name=addition loop=$dirsite start=0 max=2}?><td>&nbsp;</td><?{/section}?>
<?{/if}?>
<?{if $smarty.foreach.list1.total mod 5 eq 4}?>
<?{section name=addition loop=$dirsite start=0 max=1}?><td>&nbsp;</td><?{/section}?>
<?{/if}?>
</tr>
</table>
<?{/if}?>
<?{if $coolSiteList}?>
<?{foreach name=num  key=coolSite item=list from=$coolSiteList}?>
<h2><a name="a<?{$smarty.foreach.num.index}?>"><?{$coolSite}?></a></h2>
<table width="100%" border="0" cellpadding="0" cellspacing="1" id="tab_s">
<tr>
<?{foreach name="list" item=tempsite from=$list[1]}?>
<td<?{if $smarty.foreach.list.index < 5}?> width="20%"<?{/if}?>><a style="" target="_blank" href="<?{$tempsite.siteUrl}?>"><?{$tempsite.siteName}?></a></td>
<?{if ($smarty.foreach.list.index+1) mod 5 eq 0}?></tr><tr><?{/if}?>
<?{/foreach}?>
<?{if $smarty.foreach.list.total mod 5 eq 1}?>
<?{section name=addition loop=$list[1] start=0 max=4}?><td>&nbsp;</td><?{/section}?>
<?{/if}?>
<?{if $smarty.foreach.list.total mod 5 eq 2}?>
<?{section name=addition loop=$list[1] start=0 max=3}?><td>&nbsp;</td><?{/section}?>
<?{/if}?>
<?{if $smarty.foreach.list.total mod 5 eq 3}?>
<?{section name=addition loop=$list[1] start=0 max=2}?><td>&nbsp;</td><?{/section}?>
<?{/if}?>
<?{if $smarty.foreach.list.total mod 5 eq 4}?>
<?{section name=addition loop=$list[1] start=0 max=1}?><td>&nbsp;</td><?{/section}?>
<?{/if}?>
</tr>
</table>
<?{/foreach}?>
<?{/if}?>
</div>
<?{/if}?>
<?{if $dirs}?>
<div class="con" <?{if $dirsite && $coolSiteList}?>style="margin-top:10px;"<?{/if}?>>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="100px"><h2 style="border:none; font-size:14px;"><?{$c_name.stpName}?></h2></td>
      <td>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" id="tab_s2">
        <tr>
        <?{foreach name="list2" item=dir from=$dirs}?>
<td<?{if $smarty.foreach.list2.index < 5}?> width="20%"<?{/if}?>><a style="" target="_blank" href="<?{$dir.stpHtmlName}?>"><?{$dir.stpName}?></a></td>
<?{if ($smarty.foreach.list2.index+1) mod 5 eq 0}?></tr><tr><?{/if}?>
<?{/foreach}?>
<?{if $smarty.foreach.list2.total mod 5 eq 1}?>
<?{section name=addition loop=$dirs start=0 max=4}?><td>&nbsp;</td><?{/section}?>
<?{/if}?>
<?{if $smarty.foreach.list2.total mod 5 eq 2}?>
<?{section name=addition loop=$dirs start=0 max=3}?><td>&nbsp;</td><?{/section}?>
<?{/if}?>
<?{if $smarty.foreach.list2.total mod 5 eq 3}?>
<?{section name=addition loop=$dirs start=0 max=2}?><td>&nbsp;</td><?{/section}?>
<?{/if}?>
<?{if $smarty.foreach.list2.total mod 5 eq 4}?>
<?{section name=addition loop=$dirs start=0 max=1}?><td>&nbsp;</td><?{/section}?>
<?{/if}?>
        </tr>
      </table></td>
    </tr>
  </table>
</div>
<?{/if}?>

  <div class="request"><a href="http://<?{$smarty.const.SITE_DOMAIN}?>/message.php<?{if $siteUlr}?>?from=<?{$siteUlr}?><?{/if}?>">您觉得该栏目还有哪些不足</a>？</div>
  <div class="home"><a href="http://<?{$smarty.const.SITE_DOMAIN}?>" class="back">返回</a></div>
  <a href="#" id="addmyfav" style="display:none;" title="添加到自定义导航"></a>
</body>
</html>
<?{$smarty.const.COUNT_CODE}?>