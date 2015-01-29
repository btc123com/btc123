<?php
require("header.inc.php");
ChkAdminLogin();

$sMasterAct = $_SESSION['sMaster']['masterAct'];
if(preg_match('["checkSite"]','"'.$sMasterAct.'"')){
	$checkSite = "true";
}

$objC = new Conn();
if(isset($_POST['btnPass']) && $checkSite){
	$passID = $_POST['chkDelID'];
	$stpIDArr = $_POST['stpID'];
	foreach($passID as $key=>$pid){
		$stpID = $stpIDArr[$key];
		$stpQt = "'".$stpID."'";
		$sql = 'INSERT INTO '.DBPREFIX.'site(siteCreateDate,siteName,siteUrl,stpID) SELECT cDate,siteName,siteUrl,'.$stpQt.' FROM '.DBPREFIX.'apply_site WHERE siteID = '.$pid;
		$objC -> RunQuery($sql);
	}
	if($objC -> GetAffectedRows() < 0){
		AlertMsg("审核失败！",-1);
		exit();
	}

	$sql = 'DELETE FROM '.DBPREFIX.'apply_site WHERE siteID in ("'.implode('","',$passID).'")';
	$objC -> RunQuery($sql);

	if($objC -> GetAffectedRows() < 0){
		AlertMsg("审核失败！",-1);
		exit();
	}else {
		AlertMsg("审核成功！",-1);
	}

}elseif (isset($_POST['btnDelete']) && $checkSite){
	$delID = $_POST['chkDelID'];
	$sql = 'DELETE FROM '.DBPREFIX.'apply_site WHERE siteID in ("'.implode('","',$delID).'")';
	$objC -> RunQuery($sql);
	if($objC -> GetAffectedRows() < 0){
		AlertMsg("删除失败！",-1);
		exit();
	}else {
		AlertMsg("删除成功！",-1);
	}
}

$req = addSlash($_GET);
$strSearchField = isset($req['searchField'])?$req['searchField']:''; //用户属性
$strkeyWord = isset($req['keyWord'])?$req['keyWord']:'';//用户属性值
$strType = isset($req['sStpID'])?$req['sStpID']:'';

$sql = 'SELECT stpID,stpName FROM '.DBPREFIX.'type_site WHERE stpParentID=0 and stpStatus=1 order by stpID asc';
$arrAllRow = $objC -> GetAll($sql);

if(count($arrAllRow)){
    //$arrSortAllRow = getClassList($arrAllRow, 0, 0);
	foreach ($arrAllRow as $k){
		 $arrAddSiteType[$k['stpID']] = $k['stpName'];
	}
	$objS -> assign("arrAddSiteType", $arrAddSiteType);
}

$arrSearchField = array("siteName"=>"站点名称",
						"siteUrl"=>"站点URL",
						"siteID"=>"站点ID");
$objS->assign("arrSearchField",$arrSearchField);

$where_condition = "";
if($strkeyWord != ""){
    if ($strSearchField == 'siteID') {
    	$where_condition .= " and siteID = '".$strkeyWord."'";
    }
    else {
	  $where_condition .= " and ".$strSearchField." like '%".$strkeyWord."%'";
    }
}

if($strType){
	$where_condition .= " and stpID = ".$strType;
}

$ct = 'SELECT count(*) as ct FROM '.DBPREFIX.'apply_site WHERE 1=1 '.$where_condition;
$sql = 'SELECT a.siteID,a.siteName, a.alexa, a.buildDate, a.contact, a.siteUrl,a.stpID,a.cDate,st.stpName FROM '.DBPREFIX.'apply_site AS a LEFT JOIN '.DBPREFIX.'type_site AS st ON a.stpID = st.stpID WHERE 1=1 '.$where_condition.' ORDER BY a.cDate ASC';

if($recordCount = $objC -> GetOne($ct)){
	if($recordCount){
		$objP = new Pager($recordCount);
		$arrLimit = $objP -> GetLimit();
		$result = $objC -> SelectLimit($sql,$arrLimit[1],$arrLimit[0]);
		while($arrRow = $objC->FetchRow($result)){
		  $arrSite[] = $arrRow;
		}
		$objS -> assign("pager",$objP->ShowMain().$objP->ShowNum());
		$objS -> assign("arrSite",$arrSite);

	}
}



$objS -> assign("checkSite",$checkSite);

require("footer.inc.php");
$objS -> display("admin/adminSiteCheck.tpl");
?>