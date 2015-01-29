var MaxPageName = 8;//最大为8
var MaxPageNum = 20;//最大为20
var MaxUrlName = 12;//最大为10
var MaxUrlNum = 30;//最大为48

function showchecknow(nid){
	$(".pageNav").each(function(){
		$(this).css("background-color","gray");
	})
	$("#pageNav_"+nid).css("background-color","red");
}
function getList()
{
	$.getJSON("index.php?c=tagUrl&a=list&t="+Math.random(), function(json){
		if (json != null && json.result == 'list' && json.ct != '') {
			loadPage(json.ct);
		}
	})
}

function loadPage(list) 
{
	for (i in list) {
		addTag(list[i].te,list[i].tg, list[i].td);
		var info = list[i].ss;
		if (info != '') {
			createUrl(list[i].td,'');
			for (j in info) {
				AddUrlSave(list[i].td, info[j].sd, info[j].se, info[j].sl)
			}
		}else{
			createUrl(list[i].td,'&nbsp;');
		}
	}
	$("#showLoad").css("display","none");
	beginmove();
}
function createUrl(id,s)
{
	var str = '';
	var addButton ='<div id="urlAdd'+id+'" class="add" onclick="AddUrl('+id+')"><img style="cursor:pointer;" alt="增加网址" src="../static/images/tx_adw.gif"></div>';
	str += '<div class="widget-place column1" id="urlArea'+id+'" navID="'+id+'">';
	str += ''+s+'</div>';
	str += addButton;
	$("#page"+id).append(str);
}
//增加网址保存
function AddUrlSave(id, siteID, siteName, siteUrl)
{
	if(siteUrl.indexOf('://')<0)siteUrl='http://'+siteUrl;
	var str = '<div class="url_area widget movable site" id="url'+id+'_'+siteID+'" sid="'+siteID+'"><div class="widget-header"><a href="'+siteUrl+'" onclick="return false;" style="cursor: move;"><span id="siten">'+siteName+'</span></a><div id="imgshow" style="display:none;"><img onclick="ModifyUrl('+id+','+siteID+')" style="cursor: pointer;" src="../static/images/ModifyPage.gif" title="点击修改"><img onclick="DelUrl('+id+','+siteID+')" style="cursor: pointer;" src="../static/images/Delete.gif" title="删除此网址"></div></div></div>';
	$("#urlArea"+id).append(str);
}
function checkUserLogin()
{
	if (domain != '' && userID == '') {
		alert('请您先登陆吧!');
		return false;
	}
	else if (domain != domain2) {
		alert('对不起，这是 '+domain+' 的个性设置,你不能修改!');
		return false;
	}
	return true;
}
function AddPage()
{	/*添加分类*/
	if (!checkUserLogin()) {
		return false;
	}
	var options = {
		autoOpen: false,
		width: 400,
		height: 182,
		resizable: false,
		modal: true, 
		overlay: { opacity: 0.7, background: "black" },
		buttons: {
			"关闭": function() {
				$(this).dialog("close"); 
			}, 
			"添加": function() {
				apagesave();
			} 
		}
	}
	$('#divPage').dialog(options);
	$('#divPage').dialog('open').bind("keypress.ui-dialog", function(event){if (event.keyCode == $.ui.keyCode.ENTER) {apagesave();}});
}
function apagesave() { 
	var pageName = $("#addPageName").val();	
	var s = pageName.replace(/[^\x00-\xff]/gi, 'xx').length;
	if(s>MaxPageName){
		alert("分类名称最多8个字节！");
		return false;
	}
	var pageImg = $("#atagImg").val();
	if (pageName != '') {
		tagNameAdd(pageName,pageImg);
	}
}
function ModifyPage(id)
{	
	/*修改分类*/
	if (!checkUserLogin()) {
		return false;
	}
	var navimg = $("#pageImg_"+id).attr("iname");
	var str ='<img src="../static/images/'+navimg+'">';
	$("#mtagImg").val(navimg);
	$("#mtagImg").next("span").html(str);
	var pageName = $("#pageNav_"+id).text();
	$("#modifyPageForm #pageName").val(pageName);
	$("#modifyPageForm #modifyPageID").val(id);
	var options = {
		autoOpen: false,
		width: 400,
		height: 182,
		resizable: false,
		modal: true, 
		overlay: { opacity: 0.5, background: "black" },
		buttons: {
			"关闭": function() {
				$(this).dialog("close"); 
			}, 
			"修改": function() {
				mpagesave();
			} 
		}
	}
	$('#pageNavModify').dialog(options);
	$('#pageNavModify').dialog('open').bind("keypress.ui-dialog", function(event){if (event.keyCode == $.ui.keyCode.ENTER) {mpagesave();}});
}
function mpagesave() { 
	var tagName = $("#modifyPageForm #pageName").val();
	var s = tagName.replace(/[^\x00-\xff]/gi, 'xx').length;
	if(s>MaxPageName){
		alert("分类名称最多8个字节！");
		return false;
	}
	var nid = $("#modifyPageForm #modifyPageID").val();
	var pageImg = $("#mtagImg").val();
	$.getJSON("index.php?c=tagUrl&a=modifyPage&navID="+nid+"&navImg="+pageImg+"&navName="+tagName, function(json){
		if (json != null && json.result == 'error') {
			alert(json.msg);
			return false;
		}					
		if (json != null && json.result == 'reload') {
			history.go(0);
			return false;
		}
		$("#pageName_"+nid).text(tagName);
		$("#pageImg_"+nid).attr("src","../static/images/"+pageImg+"");
		$("#pageImg_"+nid).attr("iname",pageImg);
		$('#pageNavModify').dialog("close").unbind("keypress.ui-dialog");
	})
}
function DelPage(id)
{
	if (!checkUserLogin()) {
		return false;
	}
	if (confirm("确定要删除该分类吗？删除后该分类下的所有网址都会被删除！")) {
		var pageNums  = $("#pageNavNameList .pageNav").size();
		if(pageNums == 1){
			alert("删除失败，最少有一个分类！");
			return false;
		}
		$.getJSON("index.php?c=tagUrl&a=deletePage&navID="+id, function(json){
			if (json != null && json.result == 'error') {
				alert(json.msg);
				return false;
			}					
			if (json != null && json.result == 'reload') {
				history.go(0);
				return false;
			}else{
				$("#pageNav_"+id).parent().parent().remove();
			}
		})
	}
}
function tagNameAdd(pageName,pageImg)
{
	var pageNums  = $("#pageNavNameList .pageNav").size();
	if(pageNums >= MaxPageNum){
		alert("最多只能添加"+MaxPageNum+"个分类！");
		$('#divPage').dialog("close").unbind("keypress.ui-dialog");
		return false;
	}
	$.getJSON("index.php?c=tagUrl&a=addPage&tagName="+pageName+"&tagImg="+pageImg, function(json){
		if (json != null && json.result == 'error') {
			alert(json.msg);
			return false;
		}					
		if (json != null && json.result == 'reload') {
			history.go(0);
			return false;
		}
		var tagID = json.msg;
		doAddPage(pageName,pageImg, tagID);
		$("#addPageName").val("");
		$('#divPage').dialog("close");
	})
}
function doAddPage(pageName,pageImg, tagID)
{
	addTag(pageName,pageImg, tagID);
	createUrl(tagID,'&nbsp;');
	beginmove();
}
function addTag(pageName,pageImg, tagID)
{
	var tagIDstr = '';
	if (tagID) {
		tagIDstr = ' tagID="'+tagID+'" ';
	}
	var pageContent = '<div class="dltop"><dl><dt id="pageNav_'+tagID+'" '+tagIDstr+' class="pageNav"><img id="pageImg_'+tagID+'" iname="'+pageImg+'" src="../static/images/'+pageImg+'" /><span id="pageName_'+tagID+'">'+pageName+'</span><div id="imgshow_dt" style="display:none;cursor: pointer;"><img id="imgup" title="向上移动" src="../static/images/PageUp.gif" onclick="pageup('+tagID+')"><img src="../static/images/ModifyPage.gif" onclick="ModifyPage('+tagID+')"/><img title="删除分类" src="../static/images/Delete.gif" onclick="DelPage('+tagID+')"></div></dt><dd><div class="allsite" id="page'+tagID+'"></div></dd></dl></div>';
	var addButton = '<div id="addPageBtn" class="addcate"><img onclick="AddPage()" alt="添加分类" src="../static/images/tx_adn.gif" /></div>';		
	$("#addPageBtn").remove();
	$("#pageNavNameList").append(pageContent + addButton);
	changepage();
}
function AddUrl(id)
{
	if (!checkUserLogin()) {
		return false;
	}
	var num = $("#urlArea"+id+" .url_area").size();
	if (num >= MaxUrlNum) {
		alert("对不起，该分类下网址已达上线啦!");
		return false;
	}
	$("#UrltagID").val(id);
	/*添加url*/
	var options = {
		autoOpen: false,
		width: 400,
		height: 182,
		resizable: false,
		modal: true, 
		overlay: { opacity: 0.5, background: "black" },
		buttons: {
			"关闭": function() {
				$(this).dialog("close"); 
			}, 
			"添加": function() {
				aurlsave();
			} 
		}
	}
	$('#divUrl').dialog(options);
	$('#divUrl').dialog('open').bind("keypress.ui-dialog", function(event){if (event.keyCode == $.ui.keyCode.ENTER) {aurlsave();}});
}
function aurlsave() {
	var siteName = $("#UrlName").val();
	var siteUrl  = $("#UrlPath").val();
	var tagID    = $("#UrltagID").val();
	if (siteName == '') {
		alert("请填写站点名称");
		return false;
	}
	if (siteUrl == '') {
		alert("请填写站点链接");
		return false;
	}
	if (!IsValid(siteName,siteUrl)) {
		return false;
	}
	siteUrl = siteUrl.replace(/http:\/\//, "");
	siteUrl = siteUrl.replace(/\/$/, "");
	$.getJSON('index.php?c=tagUrl&a=add&t='+Math.random(), {"siteName":siteName, "siteUrl":siteUrl, "tagID":tagID}, function(json){
		if (json != null && json.result == 'error') {
			alert(json.msg);
			return false;
		}					
		if (json != null && json.result == 'reload') {
			history.go(0);
			return false;
		}else{
			siteID = json.msg;
			AddUrlSave(tagID, siteID, siteName, siteUrl)
		}
		$("#UrlName").val("");
		$("#UrlPath").val("");				
		$('#divUrl').dialog("close").unbind("keypress.ui-dialog");
		beginmove();
	})
}
function ModifyUrl(id, key)
{
	if (!checkUserLogin()) {
		return false;
	}
	/*修改url*/
    var siteName = $("#url"+id+"_"+key+" a").text();
    var siteUrl = $("#url"+id+"_"+key+" a").attr("href");
	$("#modifySiteID").val(key);
	$("#modifyUrlName").val(siteName);
    $("#modifyUrlPath").val(siteUrl);
    $("#modifyTagID").val(id);
	var options = {
		autoOpen: false,
		width: 400,
		height: 182,
		resizable: false,
		modal: true, 
		overlay: { opacity: 0.5, background: "black" },
		buttons: {
			"关闭": function() {
				$(this).dialog("close"); 
			}, 
			"修改": function() { 
				murlsave();
			} 
		}
	}
	$('#divModifyUrl').dialog(options);
	$('#divModifyUrl').dialog('open').bind("keypress.ui-dialog", function(event){if (event.keyCode == $.ui.keyCode.ENTER) {	murlsave();}});;
}
function murlsave() { 
	siteName = $("#modifyUrlName").val();
	siteUrl = $("#modifyUrlPath").val();
	key = $("#modifySiteID").val();
	var tagID = $("#modifyTagID").val();
	siteUrl = siteUrl.replace(/http:\/\//, "");
	siteUrl = siteUrl.replace(/\/$/, "");
	$.getJSON("index.php?c=tagUrl&a=modify&tagID="+tagID+"&siteID="+key+"&t="+Math.random(), {"siteName":siteName,"siteUrl":siteUrl}, function(json){
		if (json != null && json.result == 'error') {
			alert(json.msg);
			return false;
		}					
		if (json.result == 'reload') {
			history.go(0);
			return false;
		}
		else {
			ModifyUrlSave(tagID,key);
		}
		$('#divModifyUrl').dialog("close").unbind("keypress.ui-dialog");
	})
}
//增加网址保存
function ModifyUrlSave(id, key)
{
    //获得值
    var siteName = $("#modifyUrlName").val();
    var siteUrl = $("#modifyUrlPath").val();

	if(IsValid(siteName,siteUrl)){
    	$("#url"+id+"_"+key+" a").text(siteName);
        $("#url"+id+"_"+key+" a").attr("href", siteUrl);
	}
	else {
		return false;
	}
	return true;
}

function DelUrl(id, key)
{
	if (!checkUserLogin()) {
		return false;
	}
		$.getJSON("index.php?c=tagUrl&a=delete&tagID="+id+"&siteID="+key+"&t="+Math.random(), function(json){
			var size = $("#urlArea .url_area").size();
			
			if (json != null && json.result == 'error') {
				alert(json.msg);
				return false;
			}		
			if (json != null && json.result == 'reload') {
				history.go(0);
				return false;
			}else {
				$("#url"+id+"_"+key).remove();
			}
		})
}


function checkValid()
{
	var userMail = $("#tbUserMail").val();
	var userPwd = $("#tbUserPwd").val();
	
	if(ChkMail(userMail,2,20)==false || userMail==""){
		alert("邮箱地址错误！");
		Ofocu("tbUserMail");
		return false;
	}
	if(userPwd.length < 5){
		alert('对不起，您输入的密码格式错误！');
		Ofocu("tbUserPwd");
		return false;
	}
}

function checkReg()
{
	var userName = $("#uname").val();
	var userPwd = $("#pass").val();
	var ck = /^[0-9a-zA-Z]{3,}$/;
	if(!ck.test(userName)){
		alert("对不起，用户名必须是英文或数字,最少三个字符！");
		Ofocu("uname");
		return false;
	}
	if(userPwd == ''){
		alert('请输入密码！');
		Ofocu("pass");
		return false;
	}
	return true;
}
function IsValid(urlName,urlPath){
	//检验值
    urlName = urlName.replace(/\||\;|\,|\'|\"/g,""); //去除,;|符号
    if(isEmpty(urlName) || urlName.length<1)
    {
        alert("请输入标题");
        $("#UrlName").focus();
        return false;
    }
	
    if(urlName.lenB()>MaxUrlName)
    {
        alert("标题太长，请缩短标题");
        $("#UrlName").focus();
        return false;
    }
	
    urlPath = urlPath.replace(/⊙|◎|\'|\"/g,"");//去除⊙◎符号
    if(isEmpty(urlPath) || urlPath.length<4)
    {
        alert("请输入网址");
        $("#UrlPath").focus();
        return false;
    }
    if(urlPath.substr(0,4) != "http" && urlPath.substr(0,3) != "ftp")
        urlPath = "http://" + urlPath;
    if(!isUrl(urlPath))
    {
        alert("网址格式错误！")
        $("#UrlPath").focus();
        return false
     }	
	 return true;
}

//是否合法网址
function isUrl(str)
{
	var RegEx =/^(https?|ftp):\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/i;  
	if(RegEx.test(str)) 
        return true;
    else 
        return false; 
}
//字符串是否为空
function isEmpty(str)
{
	str = str.replace(/\r\n/g,"");
	str = str.replace(/\r/g,"");
	str = str.replace(/\n/g,"");
	str = str.replace(/\s/g,"");
	if(str=="")
		return true;
	else
		return false;
}

String.prototype.lenB = function()
{
	return this.replace(/[^\x00-\xff]/g,"**").length;
}
var EASettings = {
    behaviour : {
      useCookies : false
    }
  };
function beginmove(){
	$.fn.EasyWidgets(EASettings);
			
	$(".widget-header").hover(
		  function(){			
			$(this).parent().css("background","#f2f5f8");
			$(this).children("#imgshow").css("display", "block");
		  },
		  function(){
			$(this).parent().css("background","none");
			$(this).children("#imgshow").css("display", "none");
		  }
		);
}
function pageup(id){
	var dom = $("#pageNav_"+id).parent().parent().prev();
	dom.remove();
	$("#pageNav_"+id).parent().parent().after(dom);
	changepage();
	beginmove();
}
function changepage(){
	$(".pageNav").hover(
			function(){
				$(this).children("#imgshow_dt").css("display", "block");
			},
			function(){
				$(this).children("#imgshow_dt").css("display", "none");
			}
	);
}
function endsave(){
	var str='';
	$("#pageNavNameList .pageNav").each(function(){
		var navID = $(this).attr('tagID');
		if(navID != undefined){
			str+=navID+':';
		}
		$("#urlArea"+navID+" .url_area").each(function(){
			var siteID = $(this).attr('sid');
			str+=siteID+',';
		});
		str+=';';
	});
	$.getJSON("index.php?c=tagUrl&a=endsave&sarr="+str+"&t="+Math.random(),function(json){
		if(json != null){
			alert(json.msg);
		}
	})	
}
function chooseimg(obj){
	var imgname = obj.value;
	var str='';
	if(imgname != '0'){
		str +='<img src="../static/images/'+imgname+'">';
	}
	$(obj).next("span").html(str);
}
function changeset(id)
{
	for(var i=1;i <= 3;i++){
		$("#tab"+i).css("display", "none");
		document.getElementById("t"+i).className="tab2";
	}
	$("#tab"+id).css("display", "block");
	document.getElementById("t"+id).className="tab";
}
function ajaxcheckoldpwd()
{
	var oldUserPwd = $("#oldpass").val();
	if(oldUserPwd != ''){
		$.getJSON("index.php?c=manage&a=ajaxchangepwd&oldpwd="+oldUserPwd,function(json){
			if (json != null && json.result == 'error') {
				alert(json.msg);
				$("#oldpass").val("").focus();
				var str="<img src=\"../static/images/ico_del.gif\">&nbsp;旧密码输入错误";
				$("#oldpwdlabel").html(str);
			}else if(json != null && json.result == 'ok'){
				var str="<img src=\"../static/images/ico_ok.gif\">&nbsp;";
				$("#oldpwdlabel").html(str);				
			}
		});
	}
}
function ajaxcheckpwd()
{
	var uname = $("#pass").val();
	var plength = uname.length;
	if (plength >= 6) {
		var str="<img src=\"../static/images/ico_ok.gif\">";
		$("#pwdlabel").html(str);
	}else{
		var str="<img src=\"../static/images/ico_del.gif\">&nbsp;密码长度最少6个字符";
		$("#pwdlabel").html(str);
	}
}
function ajaxcheckpwd2()
{
	var pwd1 = $("#pass").val();
	var pwd2 = $("#spass").val();
	var pl = pwd2.length;
	if (pwd1 == pwd2 && pl >= 6) {
		var str="<img src=\"../static/images/ico_ok.gif\">";
		$("#pwdlabel2").html(str);
	}else{
		var str="<img src=\"../static/images/ico_del.gif\">&nbsp;两次密码输入不一致";
		$("#pwdlabel2").html(str);
	}
}
function ajaxCheck()
{
	var tbUserPwd = document.getElementById("pass").value;
	var tbsUserPwd = document.getElementById("spass").value;
	var oldUserPwd = document.getElementById("oldpass").value;
	if(oldUserPwd == ''){
		alert("请输入旧密码!");
		return false;
	}
	var plength = tbUserPwd.length;
	if (plength < 6) {
		alert('密码必须大于6个字符!');
		return false;
	}
	if(tbUserPwd != tbsUserPwd){
		alert('两次输入密码不一致!');
		document.getElementById("spass").value = '';
		return false;
	}
	return true;
}
function Ofocu(id){$("#"+id).focus();}
function checksetdomain(){var sd = document.getElementById("setdomain").value;var sdsize = sd.length;	$.getJSON("index.php?c=manage&a=checksetdomain&sd="+sd+"&t="+Math.random(),function(json){if(json != null){if(json.result  == 'ok' && sdsize >= 3){var str="<img src=\"../static/images/ico_ok.gif\">";$("#seturl1 #result").html(str);document.getElementById("ssubmit").disabled="";}else{var str="<img src=\"../static/images/ico_del.gif\">";$("#seturl1 #result").html(str);document.getElementById("ssubmit").disabled="disabled";}}})}
function xcopyf(){var con = $("#tbid").text();if(window.clipboardData){window.clipboardData.setData("Text",con);alert("复制成功！");}else{alert("抱歉！您现在的浏览器不支持自动拷贝功能");}}
function showDetail(){$("#divDialog").fadeIn("slow");}
function closeDetail(){$("#divDialog").css("display","none");}
function addFav(sURL, sTitle){try{window.external.addFavorite(sURL, sTitle);}catch(e){try{window.sidebar.addPanel(sTitle, sURL, "");}catch (e){alert("加入收藏失败，请使用Ctrl+D进行添加");}}}
function setHomePage(obj,homepage){if (document.all){document.body.style.behavior='url(#default#homepage)';document.body.setHomePage(homepage);}else if (window.sidebar){if(window.netscape){try{netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");}catch(e){alert("您的firefox安全限制限制您进行剪贴板操作，请在浏览器地址栏输入’about:config’并回车，然后将’signed.applets.codebase_principal_support’设置为’true’之后重试。");return;}}var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);prefs.setCharPref('browser.startup.homepage',homepage);}}
function setindex(obj,homepage){var truthBeTold = window.confirm("是否把个性导航页设为首页？");	if(truthBeTold){setHomePage(obj,homepage);}	return true;}