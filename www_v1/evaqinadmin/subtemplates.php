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





	$ct = 'SELECT count(*) as ct FROM '.DBPREFIX.'templates WHERE 1=1';
	$sql = 'SELECT * FROM '.DBPREFIX.'templates WHERE 1=1';

	$arrSearchField = array("siteName"=>"模板名称",
							"siteUrl"=>"模板URL");

	$objS->assign("arrSearchField",$arrSearchField);

	$req = addSlash($_GET);

	$strSearchField = isset($req['searchField'])?$req['searchField']:''; //用户属性
	$strkeyWord = isset($req['keyWord'])?$req['keyWord']:'';//用户属性值
	$strSearchBy = isset($req['searchBy'])?$req['searchBy']:'';

	$strSortF = isset($req['sortf'])?$req['sortf']:'';
	$strSortB = isset($req['sortb'])?$req['sortb']:'';

	$id = isset($req['id'])?$req['id']:'';



	$where_condition = "";
	if($id != ""){
		$where_condition .= " and id = ".$id;
	}
	if($strkeyWord != ""){
		  $where_condition .= " and ".$strSearchField." like '%".$strkeyWord."%'";
	}


	$sql .= $where_condition;
	$ct .= $where_condition;


		$strSortF="listorder";
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
$objS -> display("admin/subtemplates.tpl");
?>
