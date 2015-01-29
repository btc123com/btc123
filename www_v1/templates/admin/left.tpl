<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="style/css.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../static/js/jquery.min.js"></script>
<script language="javascript">
var cobj = undefined;
var maincount = 0;
var rowhtmlid;
function getCookie(a){
	var b=a+"=";
	var c="";
	if(document.cookie.length>0){
		offset=document.cookie.lastIndexOf(b);
		if(offset!=-1){
			offset+=b.length;
			end=document.cookie.indexOf(";",offset);
			if(end==-1){end=document.cookie.length}
			c=unescape(document.cookie.substring(offset,end))
		}
	}
	return c;
}
$(document).ready(function(){
	$("a[name='rowlist']").each(function(){
		var h = $(this).attr("href");
		if(h=="adminCache.php"){
			rowhtmlid = $(this).parent().parent().parent().attr("id");
			return false;
		}
	});
	var c1=getCookie("htmlnotice1");
	var c2=getCookie("htmlnotice2");
	var str;
	if(c1==1 || c2==1){
		str='<img src="images/notice.gif" title="你更改了设置，需要重新生成静态页！">';
		$('#'+rowhtmlid+' div').html(str);
	}
	<?{if !$ft}?>str='<img src="images/notice.gif" title="首页不存在，请生成！">';$('#'+rowhtmlid+' div').html(str);<?{/if}?>
});
function showsubmenu(sid){
	var total = 12;
	for(var i=0;i<total;i++){
		if(undefined!=document.getElementById("submenu" + i)){
			sub = document.getElementById("submenu" + i);
			sub.style.display="none";
			document.getElementById("menu"+i).className = '';
		}
	}
	whichEl = document.getElementById("submenu" + sid);
	if (whichEl.style.display == "none"){
		whichEl.style.display="";
		document.getElementById("menu"+sid).className = 'nav_on';
		//alert(window.frames['mainFrame'].src);
		//parent.frames.mainFrame.getAttribute('src') = $("#menu"+sid).find("li:first").find("a:first").attr('href')
		//window.frames['mainFrame'].getAttribute('src') = $("#menu"+sid).find("li:first").find("a:first").attr('href')
		parent.document.getElementById("mainFrame").src = $("#menu"+sid).find("li:first").find("a:first").attr('href');
		$("#menu"+sid).find("li:first").find("a:first").addClass('on');// = 'on';
		var id=$("#menu"+sid).find("li:first").find("a:first").attr('id');
		disablelast();
		cobj = document.getElementById(id);
	}else{
		whichEl.style.display="none";
		document.getElementById("menu"+sid).className = '';
	}
	if(maincount){
		document.getElementById('em_'+maincount).className = "ico"+maincount;
	}
	maincount = sid+1;
	emhover(maincount,'over');
}

function subclick(obj){
	disablelast();
		obj.className = 'on';
		cobj = obj;
}

function disablelast(){
	if(cobj!=undefined)
			cobj.className = '';
}

function emhover(index,flag){
	if(flag == 'over'){
		document.getElementById('em_'+index).className = "ico"+index+"_on";
		//$('#em_'+index).addClass("ico"+index+"_on");
	}else{
		//$('#em_'+index).addClass("ico"+index);
		if(index!=maincount)
			document.getElementById('em_'+index).className = "ico"+index;
	}
}
</script>
</head>
<body>
<div id="box">
  <div class="left">
    <div class="home"><a href="main.php" target="mainFrame"><em class="ico">1</em>管理首页</a></div>
    <ul id="nav">
    <?{foreach name=prow from=$cRow item=list}?>
      <li id="menu<?{$smarty.foreach.prow.index}?>" style="cursor:default;position:relative;"><a href="javascript:;" style="cursor:default" onmouseover="emhover(<?{$smarty.foreach.prow.index+1}?>,'over')" onmouseout="emhover(<?{$smarty.foreach.prow.index+1}?>,'out')"><em style="cursor:pointer;float:left" onClick="showsubmenu(<?{$smarty.foreach.prow.index}?>,this);" class="ico<?{$smarty.foreach.prow.index+1}?>" id="em_<?{$smarty.foreach.prow.index+1}?>"></em><label style="cursor:pointer;float:left" onClick="showsubmenu(<?{$smarty.foreach.prow.index}?>,this);"><?{$list.moduleName}?></label><div style="width:15px;height:15px;position:absolute;top:6px;left:105px"></div></a>
     		<ul class="list<?{if $smarty.foreach.prow.last}?>2<?{/if}?>" id="submenu<?{$smarty.foreach.prow.index}?>" style="display:none">
     		<?{foreach name=crow from=$list.crow item=clist}?>
          <li id="child"><a name="rowlist" onclick="subclick(this)" href="<?{$clist.moduleLink}?>" target="mainFrame" id="a_<?{$clist.moduleID}?>_<?{$smarty.foreach.crow.index}?>"><?{$clist.moduleName}?></a></li>
        <?{/foreach}?>
        </ul>
      </li>
    <?{/foreach}?>
    </ul>

  </div>
</div>
</body>
</html>
