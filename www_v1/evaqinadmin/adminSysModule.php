<?php
session_cache_limiter('private,must-revalidate');
require("header.inc.php");
ChkAdminLogin();

$sMasterAct = $_SESSION['sMaster']['masterAct'];
if(preg_match('["viewAdminModule"]','"'.$sMasterAct.'"')){
	$viewAdminModule = "true";
}
if(preg_match('["addAdminModule"]','"'.$sMasterAct.'"')){
	$addAdminModule = "true";
}
if(preg_match('["updateAdminModule"]','"'.$sMasterAct.'"')){
	$updateAdminModule = "true";
}
if(preg_match('["delAdminModule"]','"'.$sMasterAct.'"')){
	$delAdminModule = "true";
}

$objC = new Conn();
$moduleFID = isset($_GET['moduleFID'])?addSlash($_GET['moduleFID']):0;
if($act == "add" && $addAdminModule=="true"){
	AddAdminLog("添加管理模块");
	$arrModuleName = $_POST['tbModuleName'];
	$arrModuleLink = $_POST['tbModuleLink'];
	$succeed = true;
	$ctModuleName = count($arrModuleName);
	for($i=0;$i<$ctModuleName;$i++){
		if(checkValid($arrModuleName[$i],'string',1,20)==false && $arrModuleName[$i] != ""){
			AlertMsg('对不起，您输入的模块名称格式错误！',"-1");
		}
		if(checkValid($arrModuleLink[$i],'string',5,50)==false && $arrModuleLink[$i] != ""){
			AlertMsg('对不起，您输入的模块链接格式错误！',"-1");
		}
		if($arrModuleName[$i]!="" && $arrModuleLink[$i]!=""){
			$sql = 'INSERT INTO '.DBPREFIX.'admin_module (moduleName,moduleLink,moduleFID) VALUES ("'.$arrModuleName[$i].'","'.$arrModuleLink[$i].'","'.$moduleFID.'")';
			$objC -> RunQuery($sql);
			if($objC -> GetAffectedRows() <= 0){
				$succeed = false;
				break;
			}
		}
	}
	if($succeed){
		AlertMsg('数据添加成功！',"?moduleFID=".$moduleFID."&p=".$p);
	}
	else{
		AlertMsg('对不起，数据添加失败！',"-1");
	}
}
else if($act == "operate"){
	if(isset($_POST['btnUpdate'])){
		AddAdminLog("锁定管理模块");
		if($updateAdminModule=="true"){
			$succeed = true;
			$arrModuleID = $_POST['hidModuleID'];
			$arrModuleIndex = $_POST['moduleIndex'];
			$arrModuleName = $_POST['tbModuleName'];
			$arrModuleLink = $_POST['tbModuleLink'];
			$arrModuleState = isset($_POST['chkLockID'])?$_POST['chkLockID']:'';
			$ctModuleID = count($arrModuleID);
			for($i=0;$i<$ctModuleID;$i++){
				if(checkValid($arrModuleName[$i],'string',2,20)==false && $arrModuleName[$i] != ""){
					AlertMsg('对不起，您输入的模块名称格式错误！',"-1");
				}
				if(checkValid($arrModuleLink[$i],'string',5,50)==false && $arrModuleLink[$i] != ""){
					AlertMsg('对不起，您输入的模块链接格式错误！',"-1");
				}
				if(is_array($arrModuleState) && in_array($arrModuleID[$i],$arrModuleState)){
					$moduleState = "0";
				}
				else{
					$moduleState = "1";
				}
				$sql = 'UPDATE '.DBPREFIX.'admin_module SET moduleIndex="'.$arrModuleIndex[$i].'",moduleName="'.$arrModuleName[$i].'",moduleLink="'.$arrModuleLink[$i].'",moduleState="'.$moduleState.'" WHERE moduleID = "'.$arrModuleID[$i].'"';
				$objC -> RunQuery($sql);
				if($objC -> GetAffectedRows() < 0){
					$succeed = false;
					break;
				}
			}
			if($succeed){
				AlertMsg('数据修改成功！',"?moduleFID=".$moduleFID."&p=".$p);
			}
			else{
				AlertMsg('对不起，数据修改失败！',"-1");
			}
		}
	}
	else if($_POST['btnDelete']){
		AddAdminLog("删除管理模块");
		if($delAdminModule=="true"){
			$arrDelID = $_POST['chkDelID'];
			$strDelID = implode('","',$arrDelID);
			$sql = 'DELETE FROM '.DBPREFIX.'admin_module WHERE moduleID IN ("'.$strDelID.'")';
			$objC -> RunQuery($sql);
			if($objC -> GetAffectedRows() <= 0){
				AlertMsg('对不起，数据删除失败！',"-1");
			}
			AlertMsg('数据删除成功！',"?moduleFID=".$moduleFID."&p=".$p);
		}
	}
}
else{
	$ct = 'SELECT COUNT(*) as ct FROM '.DBPREFIX.'admin_module WHERE moduleFID = "'.$moduleFID.'"';
	$recordCount = $objC->GetOne($ct);
	$objP = new Pager($recordCount);
	if($recordCount > 0){
		$sql = 'SELECT moduleID,moduleIndex,moduleName,moduleLink,moduleFID,moduleState FROM '.DBPREFIX.'admin_module WHERE moduleFID = "'.$moduleFID.'" ORDER BY moduleIndex ASC';
		$arrLimit = $objP -> GetLimit();
		$result = $objC -> SelectLimit($sql,$arrLimit[1],$arrLimit[0]);
		while($arrRow = $objC->FetchRow($result)){
			$arrModuleList[] = $arrRow;
		}
		$objS -> assign("arrModuleList",$arrModuleList);
		$objS -> assign("pager",$objP->ShowMain().$objP->ShowNum());
	}
	$objS -> assign("arrModuleList",$arrModuleList);
	$objS -> assign("arrNO",array(1,2,3,4));
}

$objS -> assign("viewAdminModule",$viewAdminModule);
$objS -> assign("addAdminModule",$addAdminModule);
$objS -> assign("updateAdminModule",$updateAdminModule);
$objS -> assign("delAdminModule",$delAdminModule);
$objS -> assign("moduleFID",$moduleFID);

require("footer.inc.php");
$objS -> display("admin/adminSysModule.tpl");
?>