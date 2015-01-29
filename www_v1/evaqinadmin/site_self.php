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
				$sql = "delete from ".DBPREFIX."defaultsite where siteID = '".$sid."'";
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
				$sql = "delete from ".DBPREFIX."defaultsitetype where stpID = '".$sid."'";
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
			$siteIDArr = $req['siteID'];
			$siteNameArr = $req['siteName'];
			$siteUrlArr = $req['siteUrl'];
			$siteSortArr = $req['siteSort'];
			$siteStpIDArr = isset($req['stpID']) ? $req['stpID'] : array();
			$return = array();
			foreach($siteIDArr as $key => $sid){

				if($sid){													//update
					$sql = "update ".DBPREFIX."defaultsite set siteName='".unescape($siteNameArr[$key])."',siteUrl='".unescape(htmlspecialchars_decode($siteUrlArr[$key]))."',siteSort='".unescape($siteSortArr[$key])."' WHERE siteID={$sid}";
					$rs = $this->objC->RunQuery($sql);
					if($rs)
						$return[]=array('flag'=>'update','siteID'=>$sid,'siteName'=>unescape($siteNameArr[$key]),'siteUrl'=>unescape(htmlspecialchars_decode($siteUrlArr[$key])),'siteSort'=>unescape($siteSortArr[$key]));
					else
						$return[]=array('flag'=>'error');
				}else{															//insert
					$sql = "insert into ".DBPREFIX."defaultsite (siteName,siteUrl,siteSort,stpID) values('".unescape($siteNameArr[$key])."','".unescape($siteUrlArr[$key])."','".unescape($siteSortArr[$key])."','".unescape($siteStpIDArr[$key])."')";
					$rs = $this->objC->RunQuery($sql);
					if($rs){
						$sid = $this->objC->GetInsertId();
						$return[]=array('flag'=>'insert','siteID'=>$sid,'siteName'=>unescape($siteNameArr[$key]),'siteUrl'=>unescape($siteUrlArr[$key]),'siteSort'=>unescape($siteSortArr[$key]));
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
			$stpIDArr = $req['stpID'];
			$stpNameArr = $req['stpName'];
			$stpHtmlNameArr = $req['stpHtmlName'];
			$stpSortArr = $req['stpSort'];
			$return = array();
			foreach($stpIDArr as $key => $sid){

				if($sid){													//update
					$sql = "update ".DBPREFIX."defaultsitetype set stpName='".unescape($stpNameArr[$key])."',stpImg='".unescape($stpHtmlNameArr[$key])."',stpSort='".unescape($stpSortArr[$key])."' WHERE stpID={$sid}";
					$rs = $this->objC->RunQuery($sql);
					if($rs)
						$return[]=array('flag'=>'update','stpID'=>$sid,'stpName'=>unescape($stpNameArr[$key]),'stpHtmlName'=>unescape($stpHtmlNameArr[$key]),'stpSort'=>unescape($stpSortArr[$key]));
					else
						$return[]=array('flag'=>'error');
				}else{															//insert
					$sql = "insert into ".DBPREFIX."defaultsitetype (stpName,stpImg,stpSort) values('".unescape($stpNameArr[$key])."','".unescape($stpHtmlNameArr[$key])."','".unescape($stpSortArr[$key])."')";
					$rs = $this->objC->RunQuery($sql);
					if($rs){
						$sid = $this->objC->GetInsertId();
						$return[]=array('flag'=>'insert','stpID'=>$sid,'stpName'=>unescape($stpNameArr[$key]),'stpHtmlName'=>unescape($stpHtmlNameArr[$key]),'stpSort'=>unescape($stpSortArr[$key]));
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