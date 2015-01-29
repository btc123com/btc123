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





	$ct = 'SELECT count(*) as ct FROM '.DBPREFIX.'type_site WHERE 1=1 and stpParentID = 0';
	$sql = 'SELECT * FROM '.DBPREFIX.'type_site WHERE 1=1 and stpParentID = 0 order by stpSort ASC';
	//echo $sql;
	if($recordCount = $objC -> GetOne($ct)){
		if($recordCount){
			$objP = new Pager($recordCount);
			$arrLimit = $objP -> GetLimit();
			$result = $objC -> SelectLimit($sql,$arrLimit[1],$arrLimit[0]);
			while($arrRow = $objC->FetchRow($result)){
				$arrRow['stpHtmlName'] = $arrRow['stpHtmlName'];
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
$objS -> display("admin/adminsite_show.tpl");
?>
