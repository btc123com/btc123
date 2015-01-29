<?php
require("header.inc.php");
ChkAdminLogin();
require_once CONTROLLER_PATH . 'abstractController.php';

class adminSiteController extends abstractController
{
    public function deleteAction()
    {
		if($_GET){
			$siteIDArr = $_GET['siteID'];
			foreach($siteIDArr as $sid){
				$sql = "delete from ".DBPREFIX."site_tool where siteID = '".$sid."'";
				$rs = $this->objC->RunQuery($sql);
			}
			if(!$rs){
				$result = array('flag'=>'error');
				echo json_encode($result);
				exit;
			}else{
				$result = array('flag'=>'delete','siteID'=>$sid);
				echo json_encode($result);
				exit;
			}
		}
    }
    public function editAction()
    {
    	if($_GET){
    		$req = addSlash($_GET);
			$siteIDArr = $req['siteID'];
			$siteNameArr = $req['siteName'];
			$siteUrlArr = $req['siteUrl'];
			$siteStatusArr = $req['siteStatus'];
			$siteSortArr = $req['siteSort'];
			$siteColorArr = $req['siteColor'];
			$return = array();
			foreach($siteIDArr as $key => $sid){
				if($sid){													//update
					$sql = "update ".DBPREFIX."site_tool set siteName='".unescape($siteNameArr[$key])."',siteUrl='".unescape(htmlspecialchars_decode($siteUrlArr[$key]))."',siteStatus='".unescape($siteStatusArr[$key])."',cDate='".time()."',siteSort='".unescape($siteSortArr[$key])."',siteColor='".unescape($siteColorArr[$key])."' WHERE siteID={$sid}";
					$rs = $this->objC->RunQuery($sql);
					if($rs)
						$return[]=array('flag'=>'update','siteID'=>$sid,'siteName'=>unescape($siteNameArr[$key]),'siteUrl'=>stripSlash(unescape(htmlspecialchars_decode($siteUrlArr[$key]))),'siteStatus'=>unescape($siteStatusArr[$key]),'siteSort'=>unescape($siteSortArr[$key]),'siteColor'=>unescape($siteColorArr[$key]));
					else
						$return[]=array('flag'=>'error');
				}else{															//insert
					$sql = "insert into ".DBPREFIX."site_tool(siteName,siteUrl,siteStatus,cDate,siteSort,siteColor) values('".unescape($siteNameArr[$key])."','".unescape($siteUrlArr[$key])."','".unescape($siteStatusArr[$key])."','".time()."','".unescape($siteSortArr[$key])."','".unescape($siteColorArr[$key])."')";
					$rs = $this->objC->RunQuery($sql);
					if($rs){
						$sid = $this->objC->GetInsertId();
						$return[]=array('flag'=>'insert','siteID'=>$sid,'siteName'=>unescape($siteNameArr[$key]),'siteUrl'=>stripSlash(unescape($siteUrlArr[$key])),'siteStatus'=>unescape($siteStatusArr[$key]),'siteSort'=>unescape($siteSortArr[$key]),'siteColor'=>unescape($siteColorArr[$key]));
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