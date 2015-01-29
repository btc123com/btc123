<?php
require("header.inc.php");
ChkAdminLogin();

$objC = new Conn();
$act = isset($_GET['act'])?$_GET['act']:'';
if($act == "operate"){
	if(isset($_POST['btnBack'])){
		$arrUserID = $_POST['chkSiteID'];
		$sql = 'UPDATE '.DBPREFIX.'site SET siteStatus=1 WHERE siteID IN ("'.implode('","',$arrUserID).'")';
		$objC -> RunQuery($sql);

		if($objC -> GetAffectedRows() > 0){
			AlertMsg('数据恢复成功！',"?p=".$p);
		}
		else{
			AlertMsg('对不起，数据恢复失败！',"-1");
		}
	}
	else if($_POST['btnDelete']){
		$arrResetID = $_POST['chkSiteID'];
		if(count($arrResetID)>0){
			$sResetID = implode('","',$arrResetID);
			$sql = 'DELETE FROM '.DBPREFIX.'site WHERE siteID IN ("'.$sResetID.'")';
			$objC -> RunQuery($sql);
		}
		if($objC -> GetAffectedRows() > 0){
			AlertMsg('数据删除成功！',"?p=".$p);
		}
		else{
			AlertMsg('对不起，数据删除失败！',"-1");
		}
	}
}
else{
	//搜索设置
	

	//搜索判断
	$req = addSlash($_GET);


	$ct = 'SELECT COUNT(*) as ct FROM '.DBPREFIX.'site WHERE siteStatus=0';
	$sql = 'SELECT s.*,t.stpName FROM '.DBPREFIX.'site s LEFT JOIN '.DBPREFIX.'type_site t ON s.stpID=t.stpID WHERE siteStatus=0';


	$where_condition = "";
	
	$sql .= $where_condition;
	$ct .= $where_condition;
	//点击标题后升序或降序排序
	
	$sql .= " order by siteID DESC";

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
        $objS -> assign("arrSiteList",$arrUserList);
      }
    }

}


require("footer.inc.php");
$objS -> display("admin/adminSiteBack.tpl");
?>