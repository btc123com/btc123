function setCookie(c,e,a,f,d){var b=new Date();b.setDate(b.getDate()+365);a=b.toGMTString();f="/";d=".btc123.com";document.cookie=c+"="+escape(e)+(";expires="+a)+(";path="+f)+";"}
function getCookie(a){var b=a+"=";var c="";if(document.cookie.length>0){offset=document.cookie.lastIndexOf(b);if(offset!=-1){offset+=b.length;end=document.cookie.indexOf(";",offset);if(end==-1){end=document.cookie.length}c=unescape(document.cookie.substring(offset,end))}}return c}
$=function(id){return "string"==typeof id ? document.getElementById(id):id};
function rmClass(o,n){o.className=o.className.replace(n,'')};
function addClass(o,n){if(o!=undefined)o.className+=' '+n};
var str='<SPAN id="theme_page"></SPAN>',p;var m = mystyledata.type_list;var v = mystyledata.value;
for(var i in m){str+='<A id="h3_'+m[i].id+'" href="javascript:void(0);" target="_self" onclick="s('+m[i].id+',1)">'+m[i].name+'</A><I>|</I>';}
$('theme_type').innerHTML = str;var oldbg = this.parent.window.document.getElementById('mystyle').style.background;var tagid= (getCookie("tagid")) ? getCookie("tagid") : 1;var pageid=(getCookie("pageid")) ? getCookie("pageid") : 1;var styleid=(getCookie("styleid")) ? getCookie("styleid") : 0;var psize = (getCookie('psize')) ? getCookie('psize') : ((screen.width > 1399)?'kp':'index');var pcss =getCookie('pcss');if(pcss==''||pcss=='default')pcss='blue';addClass($("s_"+psize),'active');addClass($(pcss),pcss+'On');s(tagid,pageid);
function s(id,page){
	rmClass($('h3_'+tagid),'h3bg_a');addClass($('h3_'+id),'h3bg_a');tagid = id;var f,l,page=parseInt(page);
	if(page==1){str='<DIV class="last last_un" title="向前翻一页"></DIV><DIV style="position: relative; MARGIN: 0px auto; WIDTH: 876px; HEIGHT: 122px; OVERFLOW: hidden"><DL style="position: absolute; LEFT: 0px" id="mydl">';str+='<DD><A title="恢复默认" href="javascript:void(0);" target="_self" onclick="sel(0,1,1)"><IMG onmouseover="this.className=\'imghover\'" onmouseout="this.className=\'\'" src="theme/default/images/theme_reset.jpg" /></A><SPAN id="span_0" onclick="sel(0,1,1)">恢复默认</SPAN></DD>';f=0;l=5;}else{var pre=page-1;str='<DIV class="last" title="向前翻一页" onclick="s('+id+','+pre+')"></DIV><DIV style="position: relative; MARGIN: 0px auto; WIDTH: 876px; HEIGHT: 122px; OVERFLOW: hidden"><DL style="position: absolute; LEFT: 0px" id="mydl">';f=(page-1)*6-1;l=page*6-1;}
	for(var i in v[id]){if(i>=f && i<l){str+='<DD><A title="'+v[id][i].name+'" href="javascript:void(0);" target="_self" onclick="sel('+v[id][i].id+','+id+','+page+')"><IMG onmouseover="this.className=\'imghover\'" onmouseout="this.className=\'\'" src="theme/default/images/thumb'+v[id][i].id+'.jpg" /></A><SPAN id="span_'+v[id][i].id+'" onclick="sel('+v[id][i].id+','+id+','+page+')">'+v[id][i].name+'</SPAN></DD>';}}
	var total=parseInt(v[id].length/6)+1;var next=page+1;
	if(next>total){str+='</DL></DIV><DIV  class="next next_un" title="向后翻一页"> </DIV>';}else{str+='</DL></DIV><DIV  class="next" title="向后翻一页" onclick="s('+id+','+next+')"> </DIV>';}
	$('theme_page').innerHTML = '<SPAN id="theme_page">当前第 <FONT class="red">'+page+'</FONT>/'+total+' 页</SPAN>';$('styles').innerHTML = str;addClass($('span_'+styleid),'select');
}
function sel(sid,id,pid){
	if($('span_'+styleid)!=null)rmClass($('span_'+styleid),'select');addClass($('span_'+sid),'select');tagid=id;pageid=pid;styleid=sid;
	if(sid!=0){this.parent.window.document.getElementById('mystyle').style.background = 'url(theme/default/images/theme_n'+sid+'.jpg) no-repeat center top';this.parent.window.document.getElementById('header').className = 'center w990 header_b';this.parent.window.document.getElementById('sb').className = 'searchbox_b';}else{this.parent.window.document.getElementById('mystyle').style.background = '';this.parent.window.document.getElementById('header').className = 'center w990';this.parent.window.document.getElementById('sb').className = 'searchbox';}
}
function save(t){
if(t){oldbg = this.parent.window.document.getElementById('mystyle').style.background;setCookie('mybg',oldbg);setCookie('tagid',tagid);setCookie('pageid',pageid);setCookie('styleid',styleid);}else{this.parent.window.document.getElementById('mystyle').style.background = oldbg;var bimg=this.parent.window.document.getElementById('mystyle').style.backgroundImage;if(bimg==''||bimg=='none'){this.parent.window.document.getElementById('header').className = 'center w990';this.parent.window.document.getElementById('sb').className = 'searchbox';}else{this.parent.window.document.getElementById('header').className = 'center w990 header_b';this.parent.window.document.getElementById('sb').className = 'searchbox_b';}}
var m=new slide('mystylediv',500,this);m.slideUp();
}
function sc(type){
	var ps='';if(psize =='kp')ps='_wide';
	if(type=='blue'){this.parent.window.document.getElementById('links').href = 'theme/default/css/style_default'+ps+'.css';$("green").className = 'green';$("pink").className = 'pink';pcss='blue';}
	else if(type=='green'){this.parent.window.document.getElementById('links').href = 'theme/default/css/style_green'+ps+'.css';$("blue").className = 'blue';$("pink").className = 'pink';pcss='green';}
	else if(type=='pink'){this.parent.window.document.getElementById('links').href = 'theme/default/css/style_pink'+ps+'.css';$("blue").className = 'blue';$("green").className = 'green';pcss='pink';}
	setCookie('pcss',type);$(type).className =''+type+' '+type+'On';
}
function sm(type){
	if(pcss =='' || pcss=='blue')pcss='default';
	if(type == 'index'){
	$("s_kp").className = '';
	this.parent.window.document.getElementById('links').href = 'theme/default/css/style_'+pcss+'.css';
	this.parent.window.document.getElementById('t_s').style.display='none';
	psize='index';}
	else if(type=='kp'){
	$("s_index").className = '';
	this.parent.window.document.getElementById('links').href = 'theme/default/css/style_'+pcss+'_wide.css';
	this.parent.window.document.getElementById('t_s').style.display='block';
	psize='kp';}
	setCookie('psize',type);$("s_"+type).className = 'active';
}
var slide = function(id,timelen,obj){this.Objs = obj.parent.window.document.getElementById(id);this.Objs.style.overflow = "hidden";this.timelength = timelen;var isNone = false;if(this.Objs.style.display=='none'){this.Objs.style.display='block';this.Objs.style.visibility="hidden";isNone = true;}this.paddingTop = this.Objs.style.paddingTop;this.paddingBottom = this.Objs.style.paddingBottom;this.Objs.style.paddingTop=0;this.Objs.style.paddingBottom=0;this.contentheight = parseInt(this.Objs.style.height);if (isNaN(this.contentheight)){this.contentheight = parseInt(this.Objs.offsetHeight);}if(isNone){this.Objs.style.height=0;}else{this.Objs.style.paddingTop=this.paddingTop;this.Objs.style.paddingBottom=this.paddingBottom;this.Objs.style.height=this.contentheight+'px';}}
slide.prototype.engine = function(direction){var elapsed = new Date().getTime() - this.startTime;var thisobj=this;if (elapsed < this.timelength){var distancepercent;if(direction == "down"){this.Objs.style.visibility="visible";distancepercent = (1-Math.cos(elapsed/this.timelength*Math.PI))/2;}else{distancepercent = 1 - (1-Math.cos(elapsed/this.timelength*Math.PI))/2;}this.Objs.style.height = distancepercent * this.contentheight + "px";this.runtimer = setTimeout(function(){thisobj.engine(direction);},10);}else{if(direction == "down"){this.Objs.style.paddingTop=this.paddingTop;this.Objs.style.paddingBottom=this.paddingBottom;this.Objs.style.height = this.contentheight + "px";}else{this.Objs.style.visibility="hidden";this.Objs.style.display = "none";this.Objs.style.height = "";}this.runtimer = null;}}
slide.prototype.slideDown = function(){if (typeof this.runtimer == "undefined" || this.runtimer == null){if (parseInt(this.Objs.style.height)==0){this.startTime = new Date().getTime();this.engine("down");}}}
slide.prototype.slideUp = function(){if (typeof this.runtimer == "undefined" || this.runtimer == null){if (parseInt(this.Objs.style.height)==this.contentheight){this.startTime = new Date().getTime();this.engine("up");}}}
