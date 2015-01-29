<?php
session_cache_limiter('private,must-revalidate');
require("header.inc.php");
ChkAdminLogin();

$sMasterAct = $_SESSION['sMaster']['masterAct'];
if(preg_match('["updateMasterPwd"]','"'.$sMasterAct.'"')){
	$updateMasterPwd = "true";
}
$objC = new Conn();
if($act == "operate"){
	AddAdminLog("管理员修改密码");
	$req = addSlash($_POST);
	if($req['btnUpdate'] && $updateMasterPwd=="true"){
		$oldPwd = md5($req['tbOldPwd']);
		$newPwd = md5($req['tbNewPwd']);
		$sql = 'SELECT masterPwd FROM '.DBPREFIX.'admin_master WHERE masterMail = "'.$_SESSION['sMaster']['masterMail'].'"';
		$arrRow = $objC -> GetRow($sql);
		if($arrRow['masterPwd'] == $oldPwd){
			$sql = 'UPDATE '.DBPREFIX.'admin_master SET mDate="'.time().'",masterPwd = "'.$newPwd.'" WHERE masterMail = "'.$_SESSION['sMaster']['masterMail'].'"';
			$objC -> RunQuery($sql);
			if($objC->GetAffectedRows() <= 0){
				AlertMsg('对不起，修改失败！',"-1");
			}
			AlertMsg('修改成功！',"?p=".$p);
		}
		else{
			AlertMsg("对不起，旧密码错误，请检查后再试！","-1");
		}
	}
}

$objS -> assign("updateMasterPwd",$updateMasterPwd);

require("footer.inc.php");
$objS -> display("admin/adminMasterPwd.tpl");
?>