<?php
session_cache_limiter('private,must-revalidate');
include_once("header.inc.php");

$act = isset($_GET['act'])?addSlash($_GET['act']):'';
if($act == "login"){
	$req = addSlash($_POST);
	$masterMail = addslashes(stripslashes($req['tbMasterMail']));
	$masterPwd = $req['tbMasterPwd'];
	$safeCode = isset($req['tbSafeCode'])?$req['tbSafeCode']:'';
/*
	if(ChkSafeCode($safeCode)==false){
		AlertMsg('对不起，您输入的验证码错误！',"-1","parent");
	}
*/
	if(checkValid($masterMail,'string')==false){
		AlertMsg('对不起，您输入的账号格式错误！',"-1","parent");
	}
	if(checkValid($masterPwd,'string')==false){
		AlertMsg('对不起，您输入的密码格式错误！',"-1","parent");
	}

	$sql = 'SELECT m.groupID FROM '.DBPREFIX.'admin_master m WHERE m.masterState = 1 AND m.masterPwd = "'.Encrypt($masterPwd).'" AND m.masterMail = "'.$masterMail.'"';
	$objC = new Conn();
	$groupID = $objC -> GetOne($sql);
	$sql = 'SELECT ag.actionStr FROM '.DBPREFIX.'admin_ag AS ag LEFT JOIN '.DBPREFIX.'admin_action AS a ON ag.actionStr = a.actionStr WHERE ag.groupID = '.$groupID;
	$arrRow = $objC -> GetAll($sql);
	$arrAct = array();
	if($arrRow)
	foreach($arrRow as $k => $arr){
		$arrAct[] = $arr['actionStr'];
	}
	$arrModuleID = array();
	$sql = 'SELECT DISTINCT a.moduleID FROM '.DBPREFIX.'admin_ag AS ag LEFT JOIN '.DBPREFIX.'admin_action AS a ON ag.actionStr = a.actionStr WHERE ag.groupID = '.$groupID;
	$arrRow = $objC -> GetAll($sql);
	if($arrRow)
	foreach($arrRow as $k => $arr){
		$arrModuleID[] = $arr['moduleID'];
	}

	if(count($arrModuleID) <= 0 || count($arrAct) <= 0){
		AlertMsg('对不起，登陆失败，请检查您的帐号和密码！',"-1","parent");
	}
	$sql = 'UPDATE '.DBPREFIX.'admin_master SET masterLoginTimes = masterLoginTimes+1,masterLastIP = "'.GetIP().'",masterLastDate = "'.time().'" WHERE masterMail = "'.$masterMail.'"';
	if($objC -> RunQuery($sql)){
		//查询模块
		$_SESSION['sMaster']['masterMail'] = $masterMail;
		$_SESSION['sMaster']['moduleID'] = '"'.implode('","',$arrModuleID).'"';
		$_SESSION['sMaster']['masterAct'] = '"'.implode('","',$arrAct).'"';
		AlertMsg('',"index.php","parent");
	}
	else{
		AlertMsg('对不起，登陆失败，请检查您的帐号和密码！',"-1","parent");
	}
}
else if($act == "logout"){
	unset($_SESSION['sMaster']);
	AlertMsg("","login.php","parent");
}

require("footer.inc.php");
$objS -> display("admin/login.tpl");
?>