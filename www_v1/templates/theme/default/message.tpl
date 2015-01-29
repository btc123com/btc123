<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>意见留言_<?{$smarty.const.PAGE_INDEX_TITLE}?></title>
<link href="http://<?{$smarty.const.SITE_DOMAIN}?>/theme/<?{$smarty.const.THEME_PATH}?>css/detail.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/jquery.min.js"></script>
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/index.js?20101101"></script>
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
  <div id="logo"><a href="/"><img src="http://<?{$smarty.const.SITE_DOMAIN}?>/<?{$smarty.const.SITE_LOGO}?>" /></a></div>
  <div id="search_s"><form id="baidu_search" name="f" action="http://www.baidu.com/s" method="get" target="_blank">
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
  <div class="tree"><a href="/">首页</a> > 意见留言</div>
  <div class="sethome2"><a href="javascript:;" onclick="setHomePage(this, 'http://<?{$smarty.const.SITE_DOMAIN}?>');">把 btc123 设为首页</a></div>
</div>
<div id="main">
  <dl>
    <dt>
      <label>意见留言</label>
    </dt>
    <dd class="line_b" >
    <form action="message.php?a=add" method="post" onsubmit="return checkMessage();">
    <input type="hidden" name="urlfrom" value="<?{$urlfrom}?>">
    <input type="hidden" name="type" id="type" value="1">
      <ul class="url">
        <li><span><em class="red">*</em>您的称呼：</span>
        <input type="text" name="title" id="title" value="<?{$smarty.const.SITE_NAME}?>用户" onclick="if(this.value=='<?{$smarty.const.SITE_NAME}?>用户'){select();}"/>
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
	<?{foreach name=arrMessage item=list from=$arrMessage}?>
    <div class="mesItem">
      <div class="qa_title"><span class="number"><?{$list.mid}?></span><span class="user_name"><?{$list.title}?></span><span class="time"><?{$list.createDate|date_format:"%Y-%m-%d"}?></span></div>
      <div class="qustion"><?{$list.content}?></div>
     <div class="answer">
       <B>btc123.com管理员：</B>
       <p><?{$list.reply}?></p>
      </div>
    </div>
  <?{/foreach}?>
  <div class="page"><?{$pager}?></div>
  </div>
</div>
<?{include file="$footer_path"}?>
</body>
</html>
