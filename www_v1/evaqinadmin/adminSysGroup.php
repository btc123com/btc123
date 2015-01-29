<?php
session_cache_limiter('private,must-revalidate');
require("header.inc.php");
ChkAdminLogin();

$sMasterAct = $_SESSION['sMaster']['masterAct'];
if(preg_match('["addAdminGroup"]','"'.$sMasterAct.'"')){
	$addAdminGroup = "true";
}
if(preg_match('["updateAdminGroup"]','"'.$sMasterAct.'"')){
	$updateAdminGroup = "true";
}
if(preg_match('["delAdminGroup"]','"'.$sMasterAct.'"')){
	$delAdminGroup = "true";
}
if(preg_match('["viewAdminGroup"]','"'.$sMasterAct.'"')){
	$viewAdminGroup = "true";
}

$objC = new Conn();
if($act == "add" && $addAdminGroup=="true"){
	AddAdminLog("添加管理组");
	$req = addSlash($_POST);
	$groupName = $req['tbGroupName'];
	$groupInfo = $req['tbGroupInfo'];

	if(checkValid($groupName,'string',2,20)==false){
		AlertMsg('对不起，您输入的组名称格式错误！',"-1");
	}
	if(checkValid($groupInfo,'string',2,255)==false && $groupInfo != ""){
		AlertMsg('对不起，您输入的组描述格式错误！',"-1");
	}
	$arrActionStr = $req['tbActionStr'];
	if(count($arrActionStr) <= 0){
		AlertMsg('对不起，您添加的管理员组权限为空！',"-1");
	}
	$sql = 'INSERT INTO '.DBPREFIX.'admin_group (cDate,mDate,groupName,groupInfo) VALUES ("'.time().'","'.time().'","'.$groupName.'","'.$groupInfo.'")';
	$result = $objC -> RunQuery($sql);
	if($groupID = $objC->GetInsertId()){
		$succeed = true;
		foreach($arrActionStr as $actionStr){
			$sql = 'INSERT INTO '.DBPREFIX.'admin_ag (actionStr,groupID) VALUES ("'.$actionStr.'","'.$groupID.'")';
			$objC -> RunQuery($sql);
			if($objC -> GetAffectedRows() <= 0){
				$succeed = false;
				break;
			}
		}
	}
	if($succeed){
		AlertMsg('数据添加成功！',"?p=".$p);
	}
	else{
		AlertMsg('对不起，数据添加失败！',"-1");
	}
}
else if($act == "operate"){
	if($_POST['btnUpdate']){
		AddAdminLog("修改管理组");
		if($updateAdminGroup=="true"){
			$req = addSlash($_POST);

			$arrGroupID = $req['hidGroupID'];
			$arrGroupName = $req['tbGroupName'];
			$arrGroupInfo = $req['tbGroupInfo'];
			$arrGroupState = $req['chkLockID'];
			$arrActionStr = $req['tbActionStr'];
			$i=0;
			foreach($arrGroupID as $groupID){
				if(checkValid($arrGroupName[$i],'string',2,20)==false){
					AlertMsg('对不起，您输入的组名称格式错误！',"-1");
				}
				if(checkValid($arrGroupInfo[$i],'string',2,255)==false && $arrGroupInfo[$i] != ""){
					AlertMsg('对不起，您输入的组描述格式错误！',"-1");
				}
				if(is_array($arrGroupState) && in_array($groupID,$arrGroupState)){
					$groupState = "0";
				}
				else{
					$groupState = "1";
				}
				$sql = 'UPDATE '.DBPREFIX.'admin_group SET groupName = "'.$arrGroupName[$i].'",groupInfo = "'.$arrGroupInfo[$i].'",groupState = "'.$groupState.'" WHERE groupID = "'.$groupID.'"';
				$objC -> RunQuery($sql);
				if($objC -> GetAffectedRows() < 0){
					AlertMsg('对不起，数据修改失败！',"-1");
				}
				$sql = 'DELETE FROM '.DBPREFIX.'admin_ag WHERE groupID = "'.$groupID.'"';
				$objC -> RunQuery($sql);
				if($objC -> GetAffectedRows() < 0){
					AlertMsg('对不起，数据修改失败！',"-1");
				}
				$succeed = true;
				if(count($arrActionStr) > 0){
					foreach($arrActionStr[$i] as $actionStr){
						$sql = 'INSERT INTO '.DBPREFIX.'admin_ag (actionStr,groupID) VALUES ("'.$actionStr.'","'.$groupID.'")';
						$objC -> RunQuery($sql);
						if($objC -> GetAffectedRows() <= 0){
							$succeed = false;
							break;
						}
					}
					if($succeed == false){
						break;
					}
				}
				$i++;
			}
			if($succeed){
				AlertMsg('数据修改成功！',"?p=".$p);
			}
			else{
				AlertMsg('对不起，数据修改失败！',"-1");
			}
		}
	}
	else if($_POST['btnDelete']){
		AddAdminLog("删除管理组");
		if($delAdminGroup=="true"){
			$req = addSlash($_POST);
			$arrDelID = $req['chkDelID'];
			$strDelID = implode('","',$arrDelID);
			$sql = 'DELETE FROM '.DBPREFIX.'admin_group WHERE groupID IN ("'.$strDelID.'")';
			$objC -> RunQuery($sql);
			if($objC -> GetAffectedRows() <= 0){
				AlertMsg('对不起，数据删除失败！',"-1");
			}
			$sql = 'DELETE FROM '.DBPREFIX.'admin_ag WHERE groupID IN ("'.$strDelID.'")';
			$objC -> RunQuery($sql);
			if($objC -> GetAffectedRows() <= 0){
				AlertMsg('对不起，数据删除失败！',"-1");
			}
			AlertMsg('数据删除成功！',"?p=".$p);
		}
	}
}
else{
	$ct = 'SELECT COUNT(*) as ct FROM '.DBPREFIX.'admin_group ';
	$recordCount = $objC->GetOne($ct);
	$objP = new Pager($recordCount);
	if($recordCount > 0){
		$sql = 'SELECT groupID,groupName,groupInfo,groupState FROM '.DBPREFIX.'admin_group ';
		$arrLimit = $objP -> GetLimit();
		$result = $objC -> SelectLimit($sql,$arrLimit[1],$arrLimit[0]);
		while($arrRow = $objC->FetchRow($result)){
			$sql = 'SELECT actionStr FROM '.DBPREFIX.'admin_ag WHERE groupID = "'.$arrRow['groupID'].'"';
			$arrGroupAction = $objC -> GetAll($sql);
			if(count($arrGroupAction)>0){
				foreach($arrGroupAction as $arr2){
					$arrRow['groupAction'][] = $arr2['actionStr'];
				}
			}
			$arrGroupList[] = $arrRow;
		}
		$objS -> assign("arrGroupList",$arrGroupList);
		$objS -> assign("pager",$objP->ShowMain().$objP->ShowNum());
	}
	$sql = 'SELECT actionStr,actionName FROM '.DBPREFIX.'admin_action WHERE actionState = 1';
	$arrAction = $objC -> GetAll($sql);
	foreach($arrAction as $arr){
		$arrActionList[$arr['actionStr']] = $arr['actionName'];
	}
	$objS -> assign("arrActionList",$arrActionList);
}

$objS -> assign("viewAdminGroup",$viewAdminGroup);
$objS -> assign("addAdminGroup",$addAdminGroup);
$objS -> assign("updateAdminGroup",$updateAdminGroup);
$objS -> assign("delAdminGroup",$delAdminGroup);

require("footer.inc.php");
$objS -> display("admin/adminSysGroup.tpl");
?>