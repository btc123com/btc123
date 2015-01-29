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
				$sql = "delete from ".DBPREFIX."search_keyword where id = '".$sid."'";
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
			$siteCIDArr = $req['siteCID'];
			$siteSortArr = $req['siteSort'];
			$siteColorArr = $req['siteColor'];
			$return = array();
			foreach($siteIDArr as $key => $sid){

				if($sid){													//update
					$sql = "update ".DBPREFIX."search_keyword set name='".unescape($siteNameArr[$key])."',url='".unescape(htmlspecialchars_decode($siteUrlArr[$key]))."',class='".unescape($siteCIDArr[$key])."',sort='".unescape($siteSortArr[$key])."',namecolor='".unescape($siteColorArr[$key])."' WHERE id={$sid}";
					$rs = $this->objC->RunQuery($sql);
					if($rs){
						$return[]=array('flag'=>'update','siteID'=>$sid,'siteName'=>unescape($siteNameArr[$key]),'siteUrl'=>stripSlash(unescape(htmlspecialchars_decode($siteUrlArr[$key]))),'siteCID'=>unescape($siteCIDArr[$key]),'siteSort'=>unescape($siteSortArr[$key]),'siteColor'=>unescape($siteColorArr[$key]));
					}else
						$return[]=array('flag'=>'error');
				}else{															//insert
					$sql = "insert into ".DBPREFIX."search_keyword(id,name,url,class,sort,namecolor) values(NULL,'".unescape($siteNameArr[$key])."','".unescape($siteUrlArr[$key])."','".unescape($siteCIDArr[$key])."','".unescape($siteSortArr[$key])."','".unescape($siteColorArr[$key])."')";
					$rs = $this->objC->RunQuery($sql);
					if($rs){
						$sid = $this->objC->GetInsertId();
						$return[]=array('flag'=>'insert','siteID'=>$sid,'siteName'=>unescape($siteNameArr[$key]),'siteUrl'=>stripSlash(unescape($siteUrlArr[$key])),'siteCID'=>unescape($siteCIDArr[$key]),'siteSort'=>unescape($siteSortArr[$key]),'siteColor'=>unescape($siteColorArr[$key]));
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