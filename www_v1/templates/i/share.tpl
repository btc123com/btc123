<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个性导航站分享</title>
<script type="text/javascript" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/js/jquery.min.js"></script>
<style type="text/css">
ol,ul,li{list-style:none;}
h2{ padding:0; margin:0 0 8px 0; font-size:14px; color:#2f87e7; font-weight:normal; height:30px; line-height:30px; padding-left:40px; float:left}
a:link,a:visited{ color:#06c}
a:hover{ color:#f60}
img{ border:none;}
.bg {background-color: #edf7ff;}
#warp{ width:560px; margin:20px auto;}
#main{ width:490px; height:174px; float:left; background:url(../static/images/sharebg.jpg) no-repeat; padding:45px 35px}
#top{ float:left; width:560px; height:60px}
.logo{ float:left;}
.add{ float:right; font-size:12px; line-height:60px; color:#333}
#main table{ width:490px}
#main table td{ font-size:13px; color:#666}
input, textarea{ border:none; width:428px; font-size:14px; color:#333}
input{ height:33px; background:none; line-height:33px; padding:0 6px }
.sumbit {float:right; margin:10px 0 0 6px}
form {padding:0;margin:0;float:left}
.add_form{ border:1px solid #444; width:360px; padding:2px; float:left}
.add_inner{border:1px solid #aeaeae; width:348px; padding:5px; float:left;}
.add_inner_title{ width:348px; height:20px; float:left; color:#333; font-size:12px; font-weight:bold; line-height:20px}
.add_inner_title span{ float:left;}
.add_inner_title a{ float:right; width:17px; height:16px; background:url(../static/images/close.jpg) no-repeat; text-indent:-999px;}
.add_inner_main{ width:308px; float:left; background:url(../static/images/add_title_line.jpg) top repeat-x; padding:20px}
.add_inner_bt{ width:348px; float:left; text-align:center; padding:10px 0}
.reg{ width:280px; overflow:hidden; float:left}
.reg li{ float:left; width:300px; text-align:left; padding:5px 0;}
.reg span{ font-size:14px; float:left; width:60px; text-align:right; padding-right:6px; line-height:26px}
.reg li .input{float:left;height:23px;line-height:23px;width:252px;_width:230px;border:1px solid #7f9db9;	font-size:14px;	padding-left:6px;background:#fff;}
.reg label{ float:left; margin-left:6px; color:#999; line-height:26px}
.set_btn { background:url(../static/images/submitbg.jpg);height:27px;line-height:28px; font-size:12px; padding:0 12px; width:94px; border:none; margin:0 6px;}
#main #checktitle{ float:right; font-size:12px; margin-top:-12px}
#main #checktitle em{margin-right:4px;	color:#333;	font-family:Constantia, Georgia;	font-size:30px;	font-weight:bold;color:#c00}
#main #checktitle.red em{ color:#c00}
</style>
<script type="text/javascript">
function checktitle(){
	var title = $("#title").val();
	var l = title.length-6;
	if(l>0){
		var str='已超出<em>'+l+'</em>字';
		$("#checktitle").html(str);
	}else{
	$("#checktitle").html('');
	}
}
function checkinfo(){
	var url = document.getElementById('url').value;
	var title = document.getElementById('title').value;
	var uname = document.getElementById('uname').value;
	if(title.length >6 || title.length==0){
		alert('标题不能为空且不大于6个字!');
		return false;
	}
	if(url.length==0){
		alert('网址不能为空!');
		return false;
	}
	if(uname == ''){
		document.getElementById('loginform').style.display='block';
		return false;
	}
	return true;
}
function closeform()
{
	document.getElementById('loginform').style.display='none';
}
function showform()
{
	document.getElementById('loginform').style.display='block';
}
</script>
</head>
<body class="bg">
  <div id="warp">
    <div id="top">
      <div class="logo"><font color="orange"><a href="http://<?{$smarty.const.SITE_DOMAIN}?>" target="_blank"><img src="../static/images/logo_180_60.png" title="<?{$smarty.const.SITE_NAME}?>" /></a></font></div>
      <div class="add">
      <?{if $uname==''}?>
      <span>加入&nbsp;<font color="orange"><?{$smarty.const.SITE_DOMAIN}?></font>&nbsp;一起分享潮流 <a href="javascript:;" onclick="showform();">登录</a></span>&nbsp;|&nbsp;<span><a href="http://<?{$smarty.const.SITE_DOMAIN}?>/i/share.php?a=sreg&url=<?{$url}?>&title=<?{$title}?>" target="_self">注册</a></span>
      <?{else}?>
      <span>你正在使用 <font color=blue><?{$uname}?></font> 帐号</span>&nbsp;|&nbsp;<span><a href="http://<?{$smarty.const.SITE_DOMAIN}?>/i/share.php?a=slogout&url=<?{$url}?>&title=<?{$title}?>" target="_self">换个帐号？</a></span>
      <?{/if}?>
      </div>
    </div>
    <div id="main">
     <h2>转发到我的5W</h2><div id="checktitle"></div>
<form action="http://<?{$smarty.const.SITE_DOMAIN}?>/i/share.php?a=add" method="post" onsubmit="return checkinfo();">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
         <td width="50"><div align="center">标题：</div></td>
         <td>
	   <input name="title" type="text" id="title" value="<?{$title}?>" onkeyup="checktitle();"/></td>
       </tr>
       <tr>
         <td width="50"><div align="center" style="margin-top:5px">网址：</div></td>
         <td>
           <input name="url" type="text" id="url" value="<?{$url}?>"  style="margin-top:7px"/></td>
       </tr>
       <tr>
         <td width="50"><div align="center" style="margin-top:5px">分类：</div></td>
<?{if $navArr}?>
         <td height="38"><select name="nav" id="nav" style="border:1px solid #abc4e2; height:20px; line-height:20px; font-size:14px; width:99px; ">
         <?{foreach item=l from=$navArr}?>
         <option value="<?{$l.navID}?>"><?{$l.navName}?></option>
         <?{/foreach}?>
         </select></td>
<?{else}?>
         <td height="38"><select name="nav" id="nav" style="border:1px solid #abc4e2; height:20px; line-height:20px; font-size:14px; width:99px; ">
         <option value="0">默认分类</option>
         </select></td>
<?{/if}?>
       </tr>
       <tr>
         <td>&nbsp;<input type="hidden" value="<?{$uname}?>" id="uname"/></td>
         <td><input type="image" src="http://<?{$smarty.const.SITE_DOMAIN}?>/static/images/post.jpg" style="width:81px; height:38px" class="sumbit" name="add"/></td>
       </tr>
     </table>
</form>
    </div>
  </div>

<div id="loginform" style="display:none;">
<div style="top:0px;width:100%; height:1020px; background-color:#000000; position:absolute;filter:Alpha(opacity=40);-moz-opacity:0.4;opacity:0.4;z-index:50;">&nbsp;</div>
<div style="position:absolute;z-index:100;left:50%;margin-left:-195px;top:30%;margin-top:-120px;background-color:#fff">
<div class="add_form">
  <div class="add_inner">
    <div class="add_inner_title"><span>登录</span><a href="javascript:;" onclick="closeform();">close</a></div>
    <div class="add_inner_main">
<form id="loginForm" name="loginForm" onsubmit="return toLoginCheck()" action="http://<?{$smarty.const.SITE_DOMAIN}?>/i/share.php?act=slogin" method="post">
   <ul class="reg" style="width:300px">
    <li><span>用户名：</span><input class="input" name="tbUserName" type="text" value="<?{$userName}?>" id="tbUserName"/></li>
    <li><span>密码：</span><input name="tbUserPwd" type="password" id="tbUserPwd" class="input"  /></li>
    <li><span>&nbsp;</span><input name="scookie" type="checkbox" value="1" checked="checked" style="width:20px;"/>&nbsp;记住我</li>
    <li><span>&nbsp;</span><input class="set_btn"  type="submit" name="loginsubmit" value="登 录" /><a href="http://<?{$smarty.const.SITE_DOMAIN}?>/i/index.php?a=getpwd" style="color:#06c">忘记密码？</a>
    <input type="hidden" name="url" value="<?{$url}?>" /><input type="hidden" name="title" value="<?{$title}?>" /></li>
   </ul></form>
</div>
  </div>
</div>
</div>
</div>
<div style="display:none"><script src='http://w.cnzz.com/c.php?id=30049693&l=3' language='JavaScript'></script></div>
</body>
</html>
