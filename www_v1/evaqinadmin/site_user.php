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
			$this->defaultCache();
		}
    }
    public function editAction()
    {
    	if($_GET){
    		$req = addSlash($_GET);
			$siteIDArr = isset($req['siteID'])?$req['siteID']:array();
			$siteNameArr = isset($req['siteName'])?$req['siteName']:array();
			$siteUrlArr = isset($req['siteUrl'])?$req['siteUrl']:array();
			$siteStatusArr = isset($req['siteStatus'])?$req['siteStatus']:array();
			$siteSortArr = isset($req['siteSort'])?$req['siteSort']:array();
			$return = array();
			foreach($siteIDArr as $key => $sid){

				if($sid){													//update
					$sql = "update ".DBPREFIX."defaultsite set siteName='".unescape($siteNameArr[$key])."',siteUrl='".unescape(htmlspecialchars_decode($siteUrlArr[$key]))."',siteSort='".unescape($siteSortArr[$key])."' WHERE siteID={$sid}";
					$rs = $this->objC->RunQuery($sql);
					if($rs)
						$return[]=array('flag'=>'update','siteID'=>$sid,'siteName'=>htmlspecialchars_decode(stripslashes(unescape($siteNameArr[$key]))),'siteUrl'=>stripSlash(unescape(htmlspecialchars_decode($siteUrlArr[$key]))),'siteSort'=>unescape($siteSortArr[$key]));
					else
						$return[]=array('flag'=>'error');
				}else{															//insert
					$sql = "insert into ".DBPREFIX."defaultsite(siteName,siteUrl,siteSort) values('".unescape($siteNameArr[$key])."','".unescape($siteUrlArr[$key])."','".unescape($siteSortArr[$key])."')";
					$rs = $this->objC->RunQuery($sql);
					if($rs){
						$sid = $this->objC->GetInsertId();
						$return[]=array('flag'=>'insert','siteID'=>$sid,'siteName'=>unescape($siteNameArr[$key]),'siteUrl'=>stripSlash(unescape($siteUrlArr[$key])),'siteSort'=>unescape($siteSortArr[$key]));
					}else
						$return[]=array('flag'=>'error');
				}
				$this->defaultCache();
			}
			echo json_encode(array_gbk_to_utf8($return));
			exit;
    	}

    }

    public function defaultCache(){
    	$newcache = new FileCache();
    	$childpath = 'data';
    	$sql = "SELECT siteName, siteUrl FROM ".DBPREFIX."defaultsite ORDER BY siteSort ASC";
        	$list = $this->objC->getAll($sql);
	        foreach ($list as &$site) {
	        	$site['siteName'] = htmlspecialchars_decode(stripslashes($site['siteName']));
	            $site['siteUrl'] = str_replace('http://', '', $site['siteUrl']);
	        }
        	$defaultData = serialize($list);
        	$newcache->setCache(CACHE_PATH.$childpath.'/','0.data',$defaultData);
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