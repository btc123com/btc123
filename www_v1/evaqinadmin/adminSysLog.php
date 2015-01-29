<?php
session_cache_limiter('private,must-revalidate');
require("header.inc.php");
ChkAdminLogin();

$sMasterAct = $_SESSION['sMaster']['masterAct'];
if(preg_match('["viewAdminLog"]','"'.$sMasterAct.'"')){
	$viewAdminLog = "true";
}

$objC = new Conn();
$ct = 'SELECT COUNT(*) as ct FROM '.DBPREFIX.'admin_log WHERE 1 = 1 AND masterMail !="admin@3393.com"';
$sql = 'SELECT cDate,masterMail,actStr,actIP FROM '.DBPREFIX.'admin_log WHERE 1 = 1  AND masterMail !="admin@3393.com"';
//add by hongmeiqin 2008-4-18 start
$arrSearchField = array("masterMail"=>"管理员邮件",
						"actStr"=>"操作",
						"actIP"=>"操作IP",
);
$objS -> assign("arrSearchField",$arrSearchField);
$objS -> assign("arrSearchBy",$arrSearchBy);

$req = addSlash($_GET);
$strSearchField=$req['searchField'];
$strKeyWord=$req['keyWord'];
$strSearchBy=$req['searchBy'];
$strSortF=$req['sortf'];
$strSortB=$req['sortb'];

if($strKeyWord!=""){
	switch($strSearchBy){
		case "LIKE":
			$where_condition .= " and ".$strSearchField." like '%".$strKeyWord."%'";
			break;
		case "1":
			$where_condition .= " and ".$strSearchField." >= ".$strkeyWord;
			break;
		case "0":
			$where_condition .= " and ".$strSearchField." <= ".$strkeyWord;
			break;
		case "2":
			$where_condition .= " and ".$strSearchField." = ".$strkeyWord;
			break;
	}
}
$sql .= $where_condition;
$ct .= $where_condition;

if($strSortF==""){
	$strSortF="cDate";
	$strSortB="DESC";
}
$sql .= " order by ".$strSortF." ".$strSortB;
//echo $sql;
//add by hongmeiqin 2008-4-18 end
if($recordCount = $objC -> GetOne($ct)){
	if($recordCount){
		$objP = new Pager($recordCount);
		$arrLimit = $objP -> GetLimit();
		$result = $objC -> SelectLimit($sql,$arrLimit[1],$arrLimit[0]);
		while($arrRow = $objC->FetchRow($result)){
			$arrAdminLogList[] = $arrRow;
		}
		$objS -> assign("pager",$objP->ShowMain().$objP->ShowNum());
		$objS -> assign("arrAdminLogList",$arrAdminLogList);
	}
}


$objS -> assign("viewAdminLog",$viewAdminLog);

require("footer.inc.php");
$objS -> display("admin/adminSysLog.tpl");
?>