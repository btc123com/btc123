<?php
session_cache_limiter('private,must-revalidate');
require("header.inc.php");
ChkAdminLogin();

$sMasterAct = $_SESSION['sMaster']['masterAct'];
if(preg_match('["viewSite"]','"'.$sMasterAct.'"')){
	$viewSite = "true";
}
if(preg_match('["addSite"]','"'.$sMasterAct.'"')){
	$addSite = "true";
}
if(preg_match('["delSite"]','"'.$sMasterAct.'"')){
	$delSite = "true";
}
if(preg_match('["updateSite"]','"'.$sMasterAct.'"')){
	$updateSite = "true";
}

$objC = new Conn();
$p = isset($_GET['p'])?(int)$_GET['p']:1;





	$ct = 'SELECT count(*) as ct FROM '.DBPREFIX.'site_tool WHERE 1=1';
	$sql = 'SELECT siteSort,siteID,siteName,siteUrl,siteStatus,siteColor FROM '.DBPREFIX.'site_tool WHERE 1=1';

	$arrSearchField = array("siteName"=>"站点名称",
							"siteUrl"=>"站点URL");

	$objS->assign("arrSearchField",$arrSearchField);


	$req = addSlash($_GET);

	$strSearchField = isset($req['searchField'])?$req['searchField']:''; //用户属性
	$strkeyWord = isset($req['keyWord'])?$req['keyWord']:'';//用户属性值
	$strSearchBy = isset($req['searchBy'])?$req['searchBy']:'';

	$strSortF = isset($req['sortf'])?$req['sortf']:'';
	$strSortB = isset($req['sortb'])?$req['sortb']:'';
	$strStatus = isset($req['sStatus'])?$req['sStatus']:'';

	$stpId = isset($req['id'])?$req['id']:'';



	$where_condition = "";
	if($stpId != ""){
		$where_condition .= " and stpID = ".$stpId;
	}
	if($strkeyWord != ""){
	    if ($strSearchField == 'siteID') {
	    	$where_condition .= " and siteID = '".$strkeyWord."'";
	    }
	    else {
		  $where_condition .= " and ".$strSearchField." like '%".$strkeyWord."%'";
	    }
	}

	if ($strStatus != '') {
		$where_condition .= " and siteStatus = '".$strStatus."'";
	}
	$sql .= $where_condition;
	$ct .= $where_condition;


		$strSortF="siteSort";
		$strSortB="ASC";

	$sql .= " order by ".$strSortF." ".$strSortB;


	//echo $sql;
	if($recordCount = $objC -> GetOne($ct)){
		if($recordCount){
			$objP = new Pager($recordCount);
			$arrLimit = $objP -> GetLimit();
			$result = $objC -> SelectLimit($sql,$arrLimit[1],$arrLimit[0]);
			while($arrRow = $objC->FetchRow($result)){
			  $arrSite[] = $arrRow;
			}
			$objS -> assign("pager",$objP->ShowMain().$objP->ShowNum().$objP->showGoTo());
			$objS -> assign("arrSite",$arrSite);
		}
	}


$objS -> assign("viewSite",$viewSite);
$objS -> assign("addSite",$addSite);
$objS -> assign("delSite",$delSite);
$objS -> assign("updateSite",$updateSite);

require("footer.inc.php");
$objS -> display("admin/adminsite_tool.tpl");
?>
