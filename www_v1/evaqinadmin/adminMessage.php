<?php
session_cache_limiter('private,must-revalidate');
require("header.inc.php");
ChkAdminLogin();

$sMasterAct = $_SESSION['sMaster']['masterAct'];
if (preg_match('["viewMessage"]','"'.$sMasterAct.'"')) {
    $viewMessage = "true";
}
if (preg_match('["delMessage"]','"'.$sMasterAct.'"')) {
    $delMessage = "true";
}
$objC = new Conn();
$act = isset($_GET['act']) ? $_GET['act'] : '';
if ($act == 'operate')
{
    if($delMessage && isset($_POST['btnDelete']))
    {
        AddAdminLog("删除留言");
        $arrDelID = addSlash($_POST['chkDelID']);
        $strDelID = implode('","',$arrDelID);
        $sql = 'DELETE FROM '.DBPREFIX.'message WHERE mid IN ("'.$strDelID.'")';
        $objC->RunQuery($sql);
        if($objC->GetAffectedRows() <= 0){
            AlertMsg('对不起，数据删除失败！',"-1");
        }
        AlertMsg('数据删除成功！',"?p=".$p);
    }
	if($delMessage && $_POST['btnReply']){
    	AddAdminLog("回复留言");
    	$mids = $_POST['chkDelID'];
    	foreach($mids as $key => $value){
    		$sql = "UPDATE ".DBPREFIX."message SET reply='".addSlash($_POST['reply'][(int)$value])."' WHERE mid=".(int)$value;
    		$objC->RunQuery($sql);
    	}
    	AlertMsg('回复成功！',"?p=".$p);
    }
}
else
{
    $arrSearchField = array("mid"=>"ID",
						"title"=>"标题",
						"content"=>"内容",
						"contact"=>"联系方式",
						);

	$type = array('1'=>'5W首页', '2'=>'查询首页', '3'=>'导航首页', '5'=>'推荐游戏', '4'=>'其他');
    $objS->assign("arrSearchField",$arrSearchField);
    $objS->assign("arrTypes",$type);

    $ct = 'SELECT count(*) as ct FROM '.DBPREFIX.'message WHERE 1=1';
    $sql = 'SELECT mid, type, title, content, contact, createDate, reply, urlfrom FROM '.DBPREFIX.'message WHERE 1=1 and urluser is NULL';

    $req = addSlash($_GET);
    $strSearchField = isset($_GET['searchField'])?$_GET['searchField']:'';
    $strkeyWord = isset($_GET['keyWord'])?$_GET['keyWord']:'';
    $strType = isset($_GET['sType'])?$_GET['sType']:'';

    $where_condition = "";
    if ($strkeyWord != "") {
        if ($strSearchField == 'mid') {
            $where_condition .= " and mid = '".$strkeyWord."'";
        }
        else {
          $where_condition .= " and ".$strSearchField." like '%".$strkeyWord."%'";
        }
    }
	if ($strType != '') {
    	$where_condition .= " AND type = ".$strType;
    }

    $sql .= $where_condition;
    $ct .= $where_condition;
$strSortF = '';
    if ($strSortF=="") {
        $strSortF="mid";
        $strSortB="DESC";
    }

    $sql .= " order by ".$strSortF." ".$strSortB;
    //echo $sql;
    if($recordCount = $objC->GetOne($ct)) {
        if($recordCount){
            $objP = new Pager($recordCount);
            $arrLimit = $objP->GetLimit();
            $result = $objC->SelectLimit($sql,$arrLimit[1],$arrLimit[0]);
            while ($arrRow = $objC->FetchRow($result)) {
            	$arrRow['typeName'] = $type[$arrRow['type']];
                $arrMessage[] = $arrRow;
            }
            $objS->assign("pager",$objP->ShowMain().$objP->ShowNum());
            $objS->assign("arrMessage",$arrMessage);
        }
    }
}

$objS->assign("viewMessage",$viewMessage);
$objS->assign("delMessage",$delMessage);

require("footer.inc.php");
$objS->display("admin/adminMessage.tpl");