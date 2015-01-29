//readUrlList()
var lastli = "btype0";
function readyQuery(id)
{
	var obj = document.getElementById("btype"+id);
     atts = obj.attributes;
	 var arrUrl = [
				 'http://www.baidu.com/s',
				 'http://mp3.baidu.com/m',
				 'http://video.baidu.com/v',
				 'http://image.baidu.com/i',
				 'http://zhidao.baidu.com/q',
				 'http://news.baidu.com/ns',
				 'http://map.baidu.com/'
				 ];
	var arrCT = [
				 '',
				 '134217728',
				 '301989888',
				 '201326592',
				 '17',
				 '',
				 ''
				 ];
	var arrTN = [
				 '',
				 'baidump3',
				 '',
				 'baiduimage',
				 'ikaslist',
				 'news',
				 ''
				 ];
	 var arrImages = [
					  '../static/images/logox3.gif',
					  '../static/images/logo_d_mp3.gif',
					  '../static/images/logo_d_video.gif',
					  '../static/images/logo_d_pic.gif',
					  '../static/images/logo_d_zhidao.gif',
					  '../static/images/logo_news.gif',
					  '../static/images/logo_d_map.gif'
					  ];

	 document.getElementById("baidu_search").action = arrUrl[id];
	 document.getElementById("ct").value = arrCT[id];
	 document.getElementById("tn").value = arrTN[id];
	 document.getElementById("baidu_logo").src = arrImages[id];
	 document.getElementById("i").value = id;

	 obj.className='ss_active';

	 for (var i=0; i<=6; i++) {
		 if (i != id) {
	 		document.getElementById("btype"+i).className = '';
		 }
	 }
}

function checkMap(){
	t = document.getElementById("i").value;
	if(t == '6'){
		 parStr = document.getElementById("word").value;
		 if (parStr)
		 {
			 url = "http://map.baidu.com/?q="+parStr+"&newmap=1&s="+encodeURIComponent("s&wd="+encodeURIComponent(parStr)+"&c=1");
			 window.open(url,"_blank");
			 return false;
		 }
	 }
	 if(null!=document.forms['f'].w)document.forms['f'].w.disabled = true;
	 return true;
}

function toLoginCheck()
{
	var tbUserName = document.getElementById("tbUserName").value;
	var tbUserPwd = document.getElementById("tbUserPwd").value;
	if (tbUserName == '') {
		alert('请输入用户名!');
		return false;
	}
	if (tbUserPwd == '') {
		alert('请输入密码!');
		return false;
	}
	return true;
}
function toqqLoginCheck()
{
	var tbUserName = document.getElementById("qqUserName").value;
	var tbUserPwd = document.getElementById("qqUserPwd").value;
	if (tbUserName == '') {
		alert('请输入用户名!');
		return false;
	}
	if (tbUserPwd == '') {
		alert('请输入密码!');
		return false;
	}
	return true;
}
function setHomePage(obj,homepage)
{
    if (document.all)
    {
        document.body.style.behavior='url(#default#homepage)';
        document.body.setHomePage(homepage);
    }
    else if (window.sidebar)
    {
        if(window.netscape)
        {
            try
            {
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            }
            catch(e)
            {
                alert("您的firefox安全限制限制您进行剪贴板操作，请在浏览器地址栏输入’about:config’并回车，然后将’signed.applets.codebase_principal_support’设置为’true’之后重试。");
				return;
            }
         }
         var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
         prefs.setCharPref('browser.startup.homepage',homepage);
     }
}

function addFav(sURL, sTitle){var ua = navigator.userAgent.toLowerCase();if(ua.indexOf("msie 8")>-1){external.AddToFavoritesBar(sURL,sTitle,'实用工具');}else{try{window.external.addFavorite(sURL, sTitle);} catch(e){try{window.sidebar.addPanel(sTitle, sURL, "");} catch(e){alert("加入收藏失败，请使用Ctrl+D进行添加");}}}}

//cookie的相关函数
function getCookieVal (offset)
{
	var endstr = document.cookie.indexOf (";", offset);
	if (endstr == -1) endstr = document.cookie.length;
	return unescape(document.cookie.substring(offset, endstr));
}

function getCookie(Name)
{
 	var search = Name + "=";
 	var returnvalue = "";
 	if (document.cookie.length > 0)
	{
  		offset = document.cookie.lastIndexOf(search);
		if (offset != -1)
		{
			offset += search.length;
			end = document.cookie.indexOf(";", offset);
			if (end == -1) {
				end = document.cookie.length;
			}
			returnvalue=unescape(document.cookie.substring(offset,end));
		}
	}
 	return returnvalue;
}

function SetCookie(name, value, expires, path, domain)
{
	var date = new Date();
	date.setTime(date.getTime() + 30*24*60*60);
	expires = date.toGMTString();
	path    = '/';
	domain  = '5w.com';
	document.cookie=name+"="+escape(value)+("; expires="+expires)+("; path="+path)+("; domain="+domain);
}

function putUrl(siteName, siteUrl)
{
	var content = document.getElementById("urlArea").innerHTML;
	var str = "<li class=\"url_area\" style=\"width:72px;\"><a href=\"http://"+siteUrl+"\" onclick=\"addHistory('"+siteName+"', '"+siteUrl+"')\" target=\"_blank\">" + siteName + "</a></li>";
	document.getElementById("urlArea").innerHTML = content + str;
}

function putHistoryUrl(siteName, siteUrl)
{
	var content = document.getElementById("historyTag").innerHTML;
	var str = "<li class=\"url_area\"><a href=\"http://"+siteUrl+"\" onclick=\"addHistory('"+siteName+"', '"+siteUrl+"')\" target=\"_blank\">" + siteName + "</a></li>";
	document.getElementById("historyTag").innerHTML = content + str;
}

function readUrlList()
{
	var urlList = defaultSiteList;
	var siteList = urlList.split(',');
	var site = '';
	for (var i=0; i < siteList.length; i++) {
		site = siteList[i].split('|');
		putUrl(site[0], site[1]);
	}
}

function addHistory(name, url)
{
	var history = getCookie('historyTag');
	var newStr = name +"|"+ url;
	var str = '';
	str = newStr + ',' + history;
	if (history == '') {
		str = newStr;
	}
	SetCookie('historyTag', str);
}

function famTab1(){
	document.getElementById("FamTab2").className = "";
	document.getElementById("FamTab1").className = "active";
	document.getElementById("famSiteBox1").style.display = "block";
	document.getElementById("famSiteBox2").style.display = "none";
	document.getElementById("FamTab2").style.color = "#999999";
	document.getElementById("FamTab1").style.color = "#FFFFFF";
}

function famTab2(){
	document.getElementById("FamTab2").className = "active";
	document.getElementById("FamTab1").className = "";
	document.getElementById("famSiteBox1").style.display = "none";
	document.getElementById("famSiteBox2").style.display = "block";
	document.getElementById("FamTab2").style.color = "#FFFFFF";
	document.getElementById("FamTab1").style.color = "#999999";
	readHistoryUrlList();
}

function readHistoryUrlList()
{
	var urlList = getCookie('historyTag');
	if (urlList == null || urlList == '') {
		document.getElementById("nohistory").style.display = 'block';
		document.getElementById("clearHits").style.display = 'none';
	}
	else {
		document.getElementById("nohistory").style.display = 'none';
		document.getElementById("clearHits").style.display = 'block';

		var siteList = urlList.split(',');
		var site = '';
		document.getElementById("historyTag").innerHTML = '<li id="nohistory" style="display:none;" class="lst">没有浏览记录</li>';
		for (var i=0; i < siteList.length; i++) {
			site = siteList[i].split('|');
			putHistoryUrl(site[0], site[1]);
		}
	}
}

function clearMyHit()
{
	SetCookie("historyTag","");
	document.getElementById("historyTag").innerHTML = '<li id="nohistory" class="lst">没有浏览记录</li>';
	document.getElementById("clearHits").style.display = 'none';
}

function showDialog()
{
	document.getElementById("divDialog").style.display = 'block';
}

function showRegArea()
{
	document.getElementById("showLoginArea").style.display = 'none';
	document.getElementById("showRegArea").style.display = 'block';
}

function showLoginArea()
{
	document.getElementById("showRegArea").style.display = 'none';
	document.getElementById("showLoginArea").style.display = 'block';
}

function closeDialog()
{
	document.getElementById("divDialog").style.display = 'none';
}

function googleSearch(id)
{
	document.getElementById("gsb"+id).className = 'ss_active';

	var actions = [
				   'http://www.google.com.hk/cse?client=aff-avalanche&tbo=d&channel=logo&q=',
				   'http://news.google.com.hk/news?client=aff-avalanche&channel=logo&q=',
				   'http://www.google.com.hk/videohp?client=aff-avalanche&channel=logo&q=',
				   'http://images.google.com.hk/images?client=aff-avalanche&channel=logo&q=',
				   'http://www.google.cn/music/search?client=aff-avalanche&channel=logo&q=',
				   'http://ditu.google.com/maps?client=aff-avalanche&channel=logo&q=',
				   'http://www.google.com.hk/products?client=aff-avalanche&channel=logo&q=',
				   'http://wenda.tianya.cn/wenda/search?client=aff-avalanche&channel=logo&q=',
				   'http://www.google.com.hk/finance?client=aff-avalanche&channel=logo&q='
				   ]
	document.getElementById("cse-search-box").action = actions[id-1];
	for (var i=1; i<=9; i++) {
		if (i != id) {
			document.getElementById("gsb"+i).className = '';
		}
	}
	if(id == 1){
		document.getElementById("google_web").style.display = 'block';
		document.getElementById("google_others").style.display = 'none';
	}else{
		document.getElementById("google_web").style.display = 'none';
		document.getElementById("google_others").style.display = 'block';
	}
}

function taobaoSearch(id)
{
	document.getElementById("taobaost").value = id-1;
	document.getElementById("tsb"+id).className = 'ss_active';

	for (var i=1; i<=2; i++) {
		if (i != id) {
			document.getElementById("tsb"+i).className = '';
		}
	}
}
function ajaxCheckReg()
{
	// 表单值应该先escape，前面代码好像都没做此处理
	var tbUserName = $("#uname").val();
	var tbUserPwd = $("#pass").val();
	if (tbUserName == '') {
		alert('请输入用户名!');
		return false;
	}
	if (tbUserPwd == '') {
		alert('请输入密码!');
		return false;
	}
	return true;
}
function changelogin(lid)
{
	var zid = 2;
	for(var l=1;l<=zid;l++){
		if(l != lid){
			document.getElementById('login'+l).style.display = 'none';
			document.getElementById('logint'+l).className = 'loginoff';
		}else{
			document.getElementById('login'+l).style.display = 'block';
			document.getElementById('logint'+l).className = 'loginon';
		}
	}
}