<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="keywords" content="<?{$smarty.const.PAGE_INDEX_KEYWORDS}?>" />
<meta name="description" content="<?{$smarty.const.PAGE_INDEX_DESCRIPTION}?>" />
<link href="http://<?{$smarty.const.SITE_DOMAIN}?>/theme/<?{$smarty.const.THEME_PATH}?>css/base.css" rel="stylesheet" type="text/css" id="links"/>
<link href="http://<?{$smarty.const.SITE_DOMAIN}?>/theme/<?{$smarty.const.THEME_PATH}?>css/global.css" rel="stylesheet" type="text/css" id="links"/>
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/jquery.min.js"></script>
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/index.js?20101101"></script>
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

function checkSite()
  {
  	  var name = $("#name").val();
	  var url = $("#url").val();
	  var contact = $("#contact").val();

	  var alexaRank = $("#alexaRank").val();


	  if (name == '') {
	  	 alert('请输入站点名称!');
		 return false;
	  }

	  if (url == '') {
	  	alert('请输入站点链接');
		return false;
	  }

	  if (contact == '') {
	  	alert('请输入联系方式');
		return false;
	  }



	  if (alexaRank == '') {
	  	alert('请输入Alexa排名');
		return false;
	  }


	  return true;
  }
</script>
</head>
<body>
<div id="header_detail">
  <div id="logo"><a href="/"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/<?{$smarty.const.SITE_LOGO}?>" /></a></div>
  <div id="search_s">
  <form id="baidu_search" name="f" action="http://www.baidu.com/s" method="get" target="_blank">
        <p><a href="http://www.baidu.com/index.php?tn=leebootool_pg&ch=7" target="_blank"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/logo_web.gif" id="baidu_logo" border="0" /></a>
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
  <div class="tree"><a href="/">首页</a> > 收录申请</div>
  <div class="sethome2"><a href="javascript:;" onclick="setHomePage(this, 'http://<?{$smarty.const.SITE_DOMAIN}?>');">把<?{$smarty.const.SITE_NAME}?>设为首页</a></div>
</div>
<div id="main_detail">
  <dl>
    <dt>
      <label>提交您的站点信息</label>
    </dt>
    <dd class="line_b" style=" padding-bottom:0px">
   <ul class="url">
   <form id="add" method="post" onsubmit="return checkSite();" action="http://<?{$smarty.const.SITE_DOMAIN}?>/apply.php?a=add">
     <li>请认真填写以下资料：</li>
     <li><span><em class="red">*</em>推荐网址：</span>
       <input name="url" id="url" type="text" /><label>网站链接地址</label></li>
     <li><span>网站名称：</span><input name="name" id="name" type="text" /><label>网站的链接名称(不超过六个字)</label></li>
     <li><span>联系方式：</span><input name="contact" id="contact" type="text" class="s"  /><label>如QQ、MSN或手机号码</label></li>
     <li><span>Alexa排名：</span><input name="alexaRank" id="alexaRank" type="text" class="s" /><label>全球网站排名&nbsp;&nbsp;<a href="http://alexa.chinaz.com/" target="_blank">查询Alexa排名</a></label>
     </li>
     <li><span>建站时间：</span><input name="buildDate" id="buildDate" type="text" class="s" /></li>
     <li><span>验证码：</span><input name="tbSafeCode" id="tbSafeCode" type="text" class="s" maxlength="4" size="8"  value=""/><img align="absmiddle" src="class/safeCode.img.php" width="56" height="17" class="button" onClick="this.src='admin/safeCode.img.php?'+Math.random()" /></li>
     <li><span>&nbsp;</span> <input type="submit" value="提交申请" class="submit" /> <input type="button" value="清空重写" class="submit" /></li>
     <li class="orange">提示：如提交收录申请一周后未收录，则表示本次申请不成功，可以后再提交。</li>
     <li></li>
   </form>
   </ul>

</dd>
  </dl>
  <div class="yaoqiu">
  <h1><?{$smarty.const.SITE_NAME}?>收录有以下要求：</h1>
  <ul>
  <li>Alexa排名20万以内，且经常更新的各类网站。</li>
<li>网站内容健康，合法,无病毒及不良插件，已在信息产业部ICP/IP备案的网站。</li>
<li>添加<?{$smarty.const.SITE_NAME}?>友情链接,未添加的将不予以收录。<a href="javascript:;" onclick="$('#show1').show();$('#show2').show()">(查看友情链接示例)</a></li>
  </ul>
  <h2 id="show1" style="display:none">友情链接示例:</h2>
  <ul id="show2" style="display:none">
        <li><span>网站说明：</span>
          <?{$smarty.const.SITE_NAME}?>
          <label></label>
        </li>
        <li><span>首页地址：</span>
          <?{$smarty.const.SITE_DOMAIN}?>
          <label></label>
        </li>
        <li><span>文字链接：</span>
          <input type="text" size="60" id="textLinkCode" value="&lt;a href=&quot;http://<?{$smarty.const.SITE_DOMAIN}?>&quot; target=&quot;_blank&quot;&gt;<?{$smarty.const.SITE_NAME}?>&lt;/a&gt;" />
          <label><a href="javascript:copyText('textLinkCode');">点击复制</a></label>
        </li>
        <li><span>图片链接：</span><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/<?{$smarty.const.SITE_LOGO}?>" />
          <label></label>
        </li>
        <li><span>图片代码：</span>
         <textarea cols="50" rows="3" id="imgLinkCode"><a href="http://<?{$smarty.const.SITE_DOMAIN}?>/" target="_blank"><img alt="<?{$smarty.const.SITE_NAME}?>" src="http://<?{$smarty.const.SITE_DOMAIN}?>/<?{$smarty.const.SITE_LOGO}?>" width="214" height="60" border="0" /></a></textarea>
          <label><a onclick="copyText('imgLinkCode');" href="javascript:;">点击复制</a></label>
        </li>
      </ul>

  </div>
</div>
<?{include file="$footer_path"}?>
</body>
</html>

