function ajaxcheckname()
{
		var uname = $("#uname").val();
		$.getJSON("index.php?c=reg&a=check&uname="+uname,function(json){
				if(json['result'] == 'ok'){
					var str="<img src=\"../static/images/ico_ok.gif\">";
					$("#unamelabel").html(str);
				}else if(json['result'] == 'error2'){
					var str="<img src=\"../static/images/ico_del.gif\">&nbsp;用户名已被注册";
					$("#unamelabel").html(str);
				}else{
					var str="<img src=\"../static/images/ico_del.gif\">&nbsp;英文或数字,最少3个字,最多20个字";
					$("#unamelabel").html(str);
				}
		})
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
function ajaxcheckmail()
{
	var mail = $("#mail").val();
	var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
	var r = mail.match(reg);
	if(r == null){
		var str="<img src=\"../static/images/ico_del.gif\">&nbsp;请填写正确邮箱地址,用于取回密码";
		$("#maillabel").html(str);
	}else{
		var str="<img src=\"../static/images/ico_ok.gif\">";
		$("#maillabel").html(str);
	}
}
function ajaxCheckReg()
{
	var tbUserName = document.getElementById("uname").value;
	var tbUserPwd = document.getElementById("pass").value;
	var tbsUserPwd = document.getElementById("spass").value;
	var tbMail = document.getElementById("mail").value;
	var ulength = tbUserName.length;
	var plength = tbUserPwd.length;
	if (tbUserName == '') {
		alert('请输入用户名!');
		return false;
	}
	if (ulength < 3) {
		alert('用户名必须大于3个字符!');
		return false;
	}
	if (tbUserPwd == '') {
		alert('请输入密码!');
		return false;
	}

	var r = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
	var re = tbMail.match(r);
	if(re == null){
		alert('请填写正确邮箱地址!');
		return false;	
	}

	if (plength < 6) {
		alert('密码必须大于6个字符!');
		return false;
	}
	if (tbsUserPwd == '') {
		alert('请输入确认密码!');
		return false;
	}
	if(tbUserPwd != tbsUserPwd){
		alert('两次输入密码不一致!');
		document.getElementById("pass").value = '';
		document.getElementById("spass").value = '';
		return false;
	}
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