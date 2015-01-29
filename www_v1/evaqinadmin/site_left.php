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
				$sql = "delete from ".DBPREFIX."site_left where siteID = '".$sid."'";
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

    public function deletetypeAction()
    {
		if($_GET){
			$stpIDArr = $_GET['stpID'];
			foreach($stpIDArr as $sid){
				$sql = "delete from ".DBPREFIX."type_left where stpID = '".$sid."'";
				$rs = $this->objC->RunQuery($sql);
			}
			if(!$rs){
				$result = array('flag'=>'error');
				echo json_encode($result);
				exit;
			}else{
				$result = array('flag'=>'delete','stpID'=>$sid);
				echo json_encode($result);
				exit;
			}
		}
    }

    public function editAction()
    {
    	if($_GET){
    		$req = AddSlash($_GET);
			$siteIDArr = isset($req['siteID'])?$req['siteID']:array();
			$siteNameArr = isset($req['siteName'])?$req['siteName']:array();
			$siteUrlArr = isset($req['siteUrl'])?$req['siteUrl']:array();
			$siteStatusArr = isset($req['siteStatus'])?$req['siteStatus']:array();
			$siteSortArr = isset($req['siteSort'])?$req['siteSort']:array();
			$siteStpIDArr = isset($req['stpID'])?$req['stpID']:array();
			$siteColorArr = isset($req['siteColor'])?$req['siteColor']:array();
			$return = array();
			foreach($siteIDArr as $key => $sid){

				if($sid){													//update
					$sql = "update ".DBPREFIX."site_left set siteName='".unescape($siteNameArr[$key])."',siteUrl='".unescape(htmlspecialchars_decode($siteUrlArr[$key]))."',siteStatus='".unescape($siteStatusArr[$key])."',cDate='".time()."',siteSort='".unescape($siteSortArr[$key])."',siteColor='".unescape($siteColorArr[$key])."' WHERE siteID={$sid}";
					$rs = $this->objC->RunQuery($sql);
					if($rs)
						$return[]=array('flag'=>'update','siteID'=>$sid,'siteName'=>unescape($siteNameArr[$key]),'siteUrl'=>unescape(htmlspecialchars_decode($siteUrlArr[$key])),'siteStatus'=>unescape($siteStatusArr[$key]),'siteSort'=>unescape($siteSortArr[$key]),'siteColor'=>unescape($siteColorArr[$key]));
					else
						$return[]=array('flag'=>'error');
				}else{															//insert
					$sql = "insert into ".DBPREFIX."site_left (siteName,siteUrl,siteStatus,cDate,siteSort,siteCreateDate,stpID,siteColor) values('".unescape($siteNameArr[$key])."','".unescape($siteUrlArr[$key])."','".unescape($siteStatusArr[$key])."','".time()."','".unescape($siteSortArr[$key])."',".time().",'".unescape($siteStpIDArr[$key])."','".unescape($siteColorArr[$key])."')";
					$rs = $this->objC->RunQuery($sql);
					if($rs){
						$sid = $this->objC->GetInsertId();
						$return[]=array('flag'=>'insert','siteID'=>$sid,'siteName'=>unescape($siteNameArr[$key]),'siteUrl'=>unescape($siteUrlArr[$key]),'siteStatus'=>unescape($siteStatusArr[$key]),'siteSort'=>unescape($siteSortArr[$key]),'siteColor'=>unescape($siteColorArr[$key]));
					}else
						$return[]=array('flag'=>'error');
				}
			}
			echo json_encode(array_gbk_to_utf8($return));
			exit;
    	}
    }

    public function edittypeAction()
    {
    	if($_GET){
    		$req = AddSlash($_GET);
			$stpParentID = isset($req['stpParentID'])?$req['stpParentID']:0;
			$stpIDArr = isset($req['stpID'])?$req['stpID']:array();
			$stpNameArr = isset($req['stpName'])?$req['stpName']:array();
			$stpHtmlNameArr = isset($req['stpHtmlName'])?$req['stpHtmlName']:array();
			$stpStatusArr = isset($req['stpStatus'])?$req['stpStatus']:array();
			$stpSortArr = isset($req['stpSort'])?$req['stpSort']:array();
			$return = array();
			foreach($stpIDArr as $key => $sid){

				if($sid){													//update
					$sql = "update ".DBPREFIX."type_left set stpName='".unescape($stpNameArr[$key])."',stpHtmlName='".unescape($stpHtmlNameArr[$key])."',stpStatus='".unescape($stpStatusArr[$key])."',stpSort='".unescape($stpSortArr[$key])."' WHERE stpID={$sid}";
					$rs = $this->objC->RunQuery($sql);
					if($rs)
						$return[]=array('flag'=>'update','stpID'=>$sid,'stpName'=>unescape($stpNameArr[$key]),'stpHtmlName'=>unescape($stpHtmlNameArr[$key]),'stpStatus'=>unescape($stpStatusArr[$key]),'stpSort'=>unescape($stpSortArr[$key]));
					else
						$return[]=array('flag'=>'error');
				}else{															//insert
					$sql = "insert into ".DBPREFIX."type_left (stpName,stpHtmlName,stpStatus,stpSort,stpCreateDate,stpParentID,stpShortName) values('".unescape($stpNameArr[$key])."','".unescape($stpHtmlNameArr[$key])."','".unescape($stpStatusArr[$key])."','".unescape($stpSortArr[$key])."',".time().",".$stpParentID.",'')";
					$rs = $this->objC->RunQuery($sql);
					if($rs){
						$sid = $this->objC->GetInsertId();
						$return[]=array('flag'=>'insert','stpID'=>$sid,'stpName'=>unescape($stpNameArr[$key]),'stpHtmlName'=>unescape($stpHtmlNameArr[$key]),'stpStatus'=>unescape($stpStatusArr[$key]),'stpSort'=>unescape($stpSortArr[$key]));
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