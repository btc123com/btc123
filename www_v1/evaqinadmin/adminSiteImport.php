<?php
	session_cache_limiter('private,must-revalidate');
	require("header.inc.php");
	ChkAdminLogin();
	$objC = new Conn();
//站点分类
$sql = 'SELECT stpID,stpName,stpHtmlName,stpSort,stpParentID FROM '.DBPREFIX.'type_site WHERE 1=1 AND `stpParentID`=0';
$arrAllRow = $objC -> GetAll($sql);
$objS -> assign("arrAllRow",$arrAllRow);
if(count($arrAllRow)){
	foreach ($arrAllRow as $k){
		 $arrAddSiteType[$k['stpID']] = $k['stpName'];
	}
	$objS -> assign("arrAddSiteType",$arrAddSiteType);
}
$act = isset($_GET['act']) ? $_GET['act'] : '';
if($act == "import"){
	$ssort = 1;
	$imp = $_POST;
	$stpID = $imp['stpID'];
	$siteContent = $imp['sites'];
	$sites = getsitefromhtml($siteContent);
	if(is_array($sites) && !empty($sites['sites'])){
		foreach($sites['sites'] as $site){
			$name = htmlspecialchars(trim($site['name']));
            $url = htmlspecialchars(trim($site['url']));
            $sort = $site['siteSort'];
            $sql = "INSERT INTO `".DBPREFIX."site` (`siteCreateDate`, `siteName`, `siteUrl`,`stpID`,`siteSort`) VALUES ('".time()."', '".$name."', '".$url."', '".$stpID."', '".$sort."')";
            $objC->RunQuery($sql);
		}
		if($objC -> GetAffectedRows() < 0){
			AlertMsg("导入失败！",-1);
			exit();
		}else{
			AlertMsg("导入成功！",-1);
		}
	}
}
$objS->display('admin/site_import.tpl');