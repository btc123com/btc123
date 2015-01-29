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
function SetCookie(c,e,a,f,d){
	var b=new Date();
	b.setTime(b.getTime()+30*24*60*60);
	a=b.toGMTString();f="/";
	d="";
	document.cookie=c+"="+escape(e)+("; expires="+a)+("; path="+f)+";"
}
function htmlnotice(type){
	var pf = parent.leftFrame;
	if(pf==undefined) pf = parent.parent.leftFrame;
	var htmlid = pf.rowhtmlid;
	var str='<img src="images/notice.gif" title="你更改了设置，需要重新生成静态页！">';
	pf.$('#'+htmlid+' div').html(str);
	SetCookie('htmlnotice'+type,'1');
}
function chtmlnotice(type){
	var pf = parent.leftFrame;
	if(pf==undefined) pf = parent.parent.leftFrame;
	var htmlid = pf.rowhtmlid;
	pf.$('#'+htmlid+' div').html('');
	SetCookie('htmlnotice'+type,'0');
}
function showhelp(url,hid)
{
	$.getJSON('adminHelp.php?url='+url+'&hid='+hid,function(json){
		var str='<img title="关闭" src="images/ico_del.gif" style="float:right" onclick="showhelp();">'+json;
		$('#helpcontent').html(str);
	})
	$('#help').slideToggle('slow');
}
function showchange(id){
	caller_id = id;
	document.getElementById('cform').style.display='block';
	g=($('#label_'+caller_id).offset());
	$('#cform').css({left:g.left,top:g.top});
	var str='<select id="'+caller_id+'" name="tbStpParent_'+caller_id+'[]" onchange="getSubLanmu(this,'+caller_id+')">';
	str+='<option value="0">请选择</option>';
	$.getJSON("adminAjax.php?stpParentID=0", function(json){
		for(var key in json){
			str+='<option value="'+json[key].stpID+'">'+json[key].stpName+'</option>';
		}
		str+='</select>';
		str+='<input type="hidden" id="hid_'+caller_id+'" name="stpID[]">';
		str +='<p style="margin-top:10px;"><input class="button" type="button" onclick="save('+caller_id+')" value="转移"/><input class="button" type="button" onclick="goto()" value="取消"/></p>';
		$('#cform span').html(str);
	});
}
function goto(){
document.getElementById('cform').style.display='none';
}
function save(id){
	var tid = $('#hid_'+id).val();
	$.getJSON("adminAjax.php?act=save&id="+id+"&tid="+tid,function(json){
		if(json==1){alert('转移成功');window.self.location.href="adminsite_default.php";}else{alert('转移失败');}
	})
}
function urlf(url){
	url = url.replace(/\%/g, "%25");
	url = url.replace(/\+/g, "%2B");
	return url;
}