<?php
require("header.inc.php");
ChkAdminLogin();
require_once CONTROLLER_PATH . 'abstractController.php';

class adminSiteController extends abstractController
{
    public function editAction()
    {
    	if($_GET){
    		$req = addSlash($_GET);
			$siteIDArr = $req['siteID'];
			$siteNameArr = $req['siteName'];
			$siteUrlArr = $req['siteUrl'];
			$siteStatusArr = $req['siteStatus'];
			$siteSortArr = $req['siteSort'];
			$siteCountArr = $req['siteCount'];
			$return = array();
			foreach($siteIDArr as $key => $sid){

				if($sid){													//update
					$sql = "update ".DBPREFIX."type_site set stpName='".unescape($siteNameArr[$key])."',stpHtmlName='".unescape(htmlspecialchars_decode($siteUrlArr[$key]))."',stpshow='".unescape($siteStatusArr[$key])."',stpCreateDate='".time()."',stpSort='".unescape($siteSortArr[$key])."',stpCount='".unescape($siteCountArr[$key])."' WHERE stpID={$sid}";
					$rs = $this->objC->RunQuery($sql);
					if($rs)
						$return[]=array('flag'=>'update','siteID'=>$sid,'siteName'=>unescape($siteNameArr[$key]),'siteUrl'=>stripSlash(unescape(htmlspecialchars_decode($siteUrlArr[$key]))),'siteStatus'=>unescape($siteStatusArr[$key]),'siteSort'=>unescape($siteSortArr[$key]),'siteCount'=>unescape($siteCountArr[$key]));
					else
						$return[]=array('flag'=>'error');
				}else{															//insert
					$sql = "insert into ".DBPREFIX."type_site(stpID,stpName,stpHtmlName,stpshow,stpCreateDate,stpSort,stpCount) values(NULL,'".unescape($siteNameArr[$key])."','".unescape($siteUrlArr[$key])."','".unescape($siteStatusArr[$key])."','".time()."','".unescape($siteSortArr[$key])."','".unescape($siteCountArr[$key])."')";
					$rs = $this->objC->RunQuery($sql);
					if($rs){
						$sid = $this->objC->GetInsertId();
						$return[]=array('flag'=>'insert','siteID'=>$sid,'siteName'=>unescape($siteNameArr[$key]),'siteUrl'=>stripSlash(unescape($siteUrlArr[$key])),'siteStatus'=>unescape($siteStatusArr[$key]),'siteSort'=>unescape($siteSortArr[$key]),'siteCount'=>unescape($siteCountArr[$key]));
					}else
						$return[]=array('flag'=>'error');
				}
			}
			echo json_encode(array_gbk_to_utf8($return));
			exit;
    	}
    }



}

$action     = isset($_GET['a']) ? $_GET['a'] : 'index';
$classname  = "adminSiteController";
$controllerObj = new $classname;
$actionName = $action.'Action';
if (method_exists($controllerObj, $actionName))
	$controllerObj->$actionName();
else
	die('链接错误');
?>