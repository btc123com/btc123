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
				$sql = "delete from ".DBPREFIX."search_class where classid = '".$sid."'";
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
			$siteIDArr = isset($req['siteID'])?$req['siteID']:array();
			$siteNameArr = isset($req['siteName'])?$req['siteName']:array();
			$siteDefArr = isset($req['siteDef'])?$req['siteDef']:array();
			$siteSortArr = isset($req['siteSort'])?$req['siteSort']:array();
			$return = array();
			foreach($siteIDArr as $key => $sid){
    			$default = 0;
				$def = unescape($siteDefArr[$key]);
				if($def== 'true'){
					$default = 1;
					$sql = "update ".DBPREFIX."search_class set is_default=0 where is_default=1";
					$this->objC->RunQuery($sql);
				}
				if($sid){										//update
					$sql = "update ".DBPREFIX."search_class set classname='".unescape($siteNameArr[$key])."',is_default=$default ,sort='".unescape($siteSortArr[$key])."' WHERE classid={$sid}";
					$rs = $this->objC->RunQuery($sql);
					if($rs){
						$return[]=array('flag'=>'update','siteID'=>$sid,'siteName'=>unescape($siteNameArr[$key]),'siteDef'=>$default,'siteSort'=>unescape($siteSortArr[$key]));
					}else
						$return[]=array('flag'=>'error');
				}else{														//insert
					$sql = "insert into ".DBPREFIX."search_class(classid,classname,sort,is_default) values(NULL,'".unescape($siteNameArr[$key])."','".unescape($siteSortArr[$key])."',$default)";
					$rs = $this->objC->RunQuery($sql);
					if($rs){
						$sid = $this->objC->GetInsertId();
						$return[]=array('flag'=>'insert','siteID'=>$sid,'siteName'=>unescape($siteNameArr[$key]),'siteDef'=>$default,'siteSort'=>unescape($siteSortArr[$key]));
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