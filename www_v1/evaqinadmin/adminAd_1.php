<?php
session_cache_limiter('private,must-revalidate');
require("header.inc.php");
ChkAdminLogin();
$viewadmin_ad = '';
$sMasterAct = $_SESSION['sMaster']['masterAct'];
if (preg_match('["viewadmin_ad"]','"'.$sMasterAct.'"')) {
    $viewadmin_ad = "true";
}

$objC = new Conn();

$act = isset($_GET['act'])?$_GET['act']:'';
if ($act== 'update'){
	$autoID = isset($_GET['autoID'])?$_GET['autoID']:0;
	$sql = "select * from ".DBPREFIX."admin_ad where autoID = ".$autoID;
	$adCon = $objC->GetRow($sql);
	$objS->assign("adCon",$adCon);
	if(isset($_POST['upAd'])){
    	AddAdminLog("修改广告");
    	$autoID = $_POST['autoID'];
		$adContent = addslashes($_POST['adContent']);
		$adOrders  = $_POST['adOrders'];
		$adStatus = $_POST['adStatus'];
    	$sql = "UPDATE `".DBPREFIX."admin_ad` SET `content` = '".$adContent."', `orders` = '".$adOrders."', `status` = '".$adStatus."' WHERE `autoID` =".$autoID;
    	$objC->RunQuery($sql);
		if($objC -> GetAffectedRows() < 0){
			AlertMsg("操作失败！","adminAd_1.php");
		}else{
			AlertMsg("操作成功！ 注意：请到 [生成静态] 栏目下重新生成首页!","adminAd_1.php");
		}
    }
}else if($act == 'add'){
	if($_POST['addAd']){
		AddAdminLog("添加广告");
		$adContent = addslashes($_POST['adContent']);
		$adOrders  = $_POST['adOrders'];
		$adStatus = $_POST['adStatus'];
		$adID = $_POST['adID'];
		$adTitle = $_POST['adTitle'];
		$adWide = $_POST['adWide'];
		$adHigh = $_POST['adHigh'];
		$sql="INSERT INTO ".DBPREFIX."admin_ad (`id`, `title`, `content`, `orders`, `status`, `wide`, `high`) VALUES ('$adID', '$adTitle', '$adContent', '$adOrders', '$adStatus', '$adWide', '$adHigh');";
		$objC -> RunQuery($sql);
		if($objC -> GetAffectedRows() < 0){
			AlertMsg("操作失败！","adminAd_1.php");
		}else{
			AlertMsg("操作成功！ 注意：请到 [生成静态] 栏目下重新生成首页!","adminAd_1.php");
		}
	}
}else if($act == 'updateAll'){
	if($_POST['upAdAll']){
    	AddAdminLog("修改广告");
		$idArr = $_POST['hidMid'];
		$contentArr = $_POST['content'];
		$ordersArr = $_POST['orders'];
		$statusArr = $_POST['adStatus'];
		foreach($idArr as $id){
			$statusArr[$id] = isset($statusArr[$id]) ? '1' : '0';
	    	$sql = "UPDATE `".DBPREFIX."admin_ad` SET `content` = '".addslashes($contentArr[$id])."', `orders` = '".$ordersArr[$id]."', `status` = '".$statusArr[$id]."' WHERE `autoID` =".$id;
	    	$objC->RunQuery($sql);
		}
		if($objC -> GetAffectedRows() < 0){
			AlertMsg("操作失败！","adminAd_1.php");
		}else{
			AlertMsg("操作成功！ 注意：请到 [生成静态] 栏目下重新生成首页!","adminAd_1.php");
		}
    }
}else{
    $arrSearchField = array("id"=>"ID",
						"title"=>"标题",
						"wide"=>"宽",
    					"high"=>"高",
						"content"=>"广告内容",
    					"orders"=>"顺序",
						"status"=>"状态",
						);

    $objS->assign("arrSearchField",$arrSearchField);


    $ct = 'SELECT count(*) as ct FROM '.DBPREFIX.'admin_ad WHERE 1=1 and id="index01"';
    $sql = 'SELECT * FROM '.DBPREFIX.'admin_ad WHERE 1=1 and id="index01" order by orders ASC';

    $req = addSlash($_GET);


    $where_condition = "";


    $sql .= $where_condition;
    $ct .= $where_condition;

    if($recordCount = $objC->GetOne($ct)) {
        if($recordCount){
            $objP = new Pager($recordCount);
            $arrLimit = $objP->GetLimit();
            $result = $objC->SelectLimit($sql,$arrLimit[1],$arrLimit[0]);
            while ($arrRow = $objC->FetchRow($result)) {
                $arradmin_ad[] = $arrRow;
            }
            $objS->assign("pager",$objP->ShowMain().$objP->ShowNum());
            $objS->assign("arradmin_ad",$arradmin_ad);
        }
    }
}
$adImgPath = '../static/images/ad1.jpg';
$objS->assign("adImgPath",$adImgPath);
$objS->assign("viewadmin_ad",$viewadmin_ad);

require("footer.inc.php");
$objS->display("admin/admin_ad.tpl");