<?php /* Smarty version 2.6.18, created on 2012-06-20 15:26:43
         compiled from admin/left.tpl */ ?>
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
	<?php if (! $this->_tpl_vars['ft']): ?>str='<img src="images/notice.gif" title="首页不存在，请生成！">';$('#'+rowhtmlid+' div').html(str);<?php endif; ?>
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
    <?php $_from = $this->_tpl_vars['cRow']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['prow'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['prow']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['prow']['iteration']++;
?>
      <li id="menu<?php echo ($this->_foreach['prow']['iteration']-1); ?>
" style="cursor:default;position:relative;"><a href="javascript:;" style="cursor:default" onmouseover="emhover(<?php echo ($this->_foreach['prow']['iteration']-1)+1; ?>
,'over')" onmouseout="emhover(<?php echo ($this->_foreach['prow']['iteration']-1)+1; ?>
,'out')"><em style="cursor:pointer;float:left" onClick="showsubmenu(<?php echo ($this->_foreach['prow']['iteration']-1); ?>
,this);" class="ico<?php echo ($this->_foreach['prow']['iteration']-1)+1; ?>
" id="em_<?php echo ($this->_foreach['prow']['iteration']-1)+1; ?>
"></em><label style="cursor:pointer;float:left" onClick="showsubmenu(<?php echo ($this->_foreach['prow']['iteration']-1); ?>
,this);"><?php echo $this->_tpl_vars['list']['moduleName']; ?>
</label><div style="width:15px;height:15px;position:absolute;top:6px;left:105px"></div></a>
     		<ul class="list<?php if (($this->_foreach['prow']['iteration'] == $this->_foreach['prow']['total'])): ?>2<?php endif; ?>" id="submenu<?php echo ($this->_foreach['prow']['iteration']-1); ?>
" style="display:none">
     		<?php $_from = $this->_tpl_vars['list']['crow']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['crow'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['crow']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['clist']):
        $this->_foreach['crow']['iteration']++;
?>
          <li id="child"><a name="rowlist" onclick="subclick(this)" href="<?php echo $this->_tpl_vars['clist']['moduleLink']; ?>
" target="mainFrame" id="a_<?php echo $this->_tpl_vars['clist']['moduleID']; ?>
_<?php echo ($this->_foreach['crow']['iteration']-1); ?>
"><?php echo $this->_tpl_vars['clist']['moduleName']; ?>
</a></li>
        <?php endforeach; endif; unset($_from); ?>
        </ul>
      </li>
    <?php endforeach; endif; unset($_from); ?>
    </ul>

  </div>
</div>
</body>
</html>