<?php
session_cache_limiter('private,must-revalidate');
require("header.inc.php");
ChkAdminLogin();

$sMasterAct = $_SESSION['sMaster']['masterAct'];
if(preg_match('["lockUser"]','"'.$sMasterAct.'"')){
	$lockUser = "true";
}
if(preg_match('["delUser"]','"'.$sMasterAct.'"')){
	$delUser = "true";
}
if(preg_match('["updateUser"]','"'.$sMasterAct.'"')){
	$updateUser = "true";
}
if(preg_match('["viewUser"]','"'.$sMasterAct.'"')){
	$viewUser = "true";
}

$objC = new Conn();

if($act == "operate"){
	if($_POST['btnLock']){
		AddAdminLog("锁定用户");
		$arrUserID = $_POST['hidUserID'];
		$arrLockID = $_POST['chkLockID'];
		$sql = 'UPDATE '.DBPREFIX.'members SET userStatus="1" WHERE userID IN ("'.implode('","',$arrUserID).'")';
		$objC -> RunQuery($sql);
		if(count($arrLockID)>0){
			$sLockID = implode('","',$arrLockID);
			$sql = 'UPDATE '.DBPREFIX.'members SET userStatus="0" WHERE userID IN ("'.$sLockID.'")';
			$objC -> RunQuery($sql);
		}
		if($objC -> GetAffectedRows() > 0){
			AlertMsg('数据修改成功！',"?p=".$p);
		}
		else{
			AlertMsg('对不起，数据修改失败！',"-1");
		}
	}
	else if($_POST['btnReset']){
		$arrResetID = $_POST['chkResetID'];
		if(count($arrResetID)>0){
			$sResetID = implode('","',$arrResetID);
			$sql = 'UPDATE '.DBPREFIX.'members SET userPwd="'.md5("aosoo").'" WHERE userID IN ("'.$sResetID.'")';
			$objC -> RunQuery($sql);
		}
		if($objC -> GetAffectedRows() > 0){
			AlertMsg('数据修改成功！',"?p=".$p);
		}
		else{
			AlertMsg('对不起，数据修改失败！',"-1");
		}
	}
}
else{
	//搜索设置
	$arrSearchField = array(
							"userName"=>"用户名",
							"userLoginTimes"=>"登陆次数");

	$arrSearchDate = array("userRegDate"=>"注册时间",
						   "userLastDate"=>"最后登陆时间");
	$arrLockState = array("1"=>"正常",
						   "0"=>"锁定");
	$objS -> assign("arrSearchField",$arrSearchField);

	$objS -> assign("arrUserState",$arrLockState);
	$objS -> assign("arrSearchDate",$arrSearchDate);

	//搜索判断
	$req = addSlash($_GET);
	$strSearchField = isset($req['searchField'])?$req['searchField']:''; //用户属性 搜索
	$strkeyWord = isset($req['keyWord'])?$req['keyWord']:'';//用户属性值
	$strUserStatus = isset($req['userState'])?$req['userState']:'';//状态
	$strSearchDate = isset($req['searchDate'])?$req['searchDate']:'';//时间属性
	$strStartDate = isset($req['startDate'])?$req['startDate']:'';//开始时间
	$strEndDate = isset($req['endDate'])?$req['endDate']:'';//结束时间

	$ct = 'SELECT COUNT(*) as ct FROM '.DBPREFIX.'members WHERE 1 = 1';
	$sql = 'SELECT userID,userName,userMail,userLastDate,userRegDate,userLoginTimes,userRegIP,userStatus,`from`,`domain` FROM '.DBPREFIX.'members WHERE 1 = 1';


	$where_condition = "";
	if($strkeyWord != "" && $strSearchField != ""){
		$where_condition .= " and ".$strSearchField." = '".$strkeyWord."'";
	}

	if($strUserStatus!=""){
		$where_condition .= " and userStatus=".$strUserStatus;
	}
	if($strStartDate!=""){
		$strStartDate = strtotime($strStartDate);
		$where_condition .= " and ".$strSearchDate." >= ".$strStartDate."";
	}
	if($strEndDate!=""){
		$strEndDate = strtotime($strEndDate)+86400;
		$where_condition .= " and ".$strSearchDate." <= ".$strEndDate."";
	}
	$sql .= $where_condition;
	$ct .= $where_condition;
	//点击标题后升序或降序排序
	$strSortF= isset($req['sortf'])?$req['sortf']:'';
	$strSortB = isset($req['sortb'])?$req['sortb']:'';
	if($strSortF==""){
			$strSortF="userLastDate";
			$strSortB="DESC";
	}
	$sql .= " order by ".$strSortF." ".$strSortB;

    if($recordCount = $objC -> GetOne($ct)){

      if($recordCount){
        $objP = new Pager($recordCount);
        $arrLimit = $objP -> GetLimit();
        $result = $objC -> SelectLimit($sql,$arrLimit[1],$arrLimit[0]);
        //var_dump($sql);
        while($arrRow = $objC->FetchRow($result)){
          $arrUserList[] = $arrRow;
        }
        $objS -> assign("pager",$objP->ShowMain().$objP->ShowNum());
        $objS -> assign("arrUserList",$arrUserList);
      }
    }

}

$objS -> assign("viewUser",$viewUser);
$objS -> assign("lockUser",$lockUser);
$objS -> assign("delUser",$delUser);
$objS -> assign("updateUser",$updateUser);

require("footer.inc.php");
$objS -> display("admin/adminUser.tpl");
?>