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
				$sql = "UPDATE ".DBPREFIX."site SET siteStatus=0 WHERE siteID = '".$sid."'";
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
				$sql = "UPDATE ".DBPREFIX."type_site SET stpStatus=0 WHERE stpID = '".$sid."'";
				$rs = $this->objC->RunQuery($sql);
				$this->updateTypeTree($sid);
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

    public function updateTypeTree($sid){
    	$this->objC->RunQuery("UPDATE ".DBPREFIX."site SET siteStatus=0 WHERE stpID ={$sid}");
    	$sql = "UPDATE ".DBPREFIX."type_site SET stpStatus=0 WHERE stpParentID = '".$sid."'";
    	$this->objC->RunQuery($sql);
    	$sql = "UPDATE ".DBPREFIX."site SET siteStatus=0 WHERE stpID in (SELECT stpID FROM ".DBPREFIX."type_site WHERE stpParentID='".$sid."')";
    	$this->objC->RunQuery($sql);
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
			$siteStpIDArr = isset($req['stpID'])?$req['stpID']:array();
			$siteColorArr = isset($req['siteColor'])?$req['siteColor']:array();
			$return = array();
			foreach($siteIDArr as $key => $sid){

				if($sid){													//update
					$sql = "update ".DBPREFIX."site set siteName='".unescape($siteNameArr[$key])."',siteUrl='".unescape(htmlspecialchars_decode($siteUrlArr[$key]))."',siteStatus='".unescape($siteStatusArr[$key])."',cDate='".time()."',siteSort='".unescape($siteSortArr[$key])."',siteColor='".unescape($siteColorArr[$key])."' WHERE siteID={$sid}";
					$rs = $this->objC->RunQuery($sql);
					if($rs)
						$return[]=array('flag'=>'update','siteID'=>$sid,'siteName'=>unescape($siteNameArr[$key]),'siteUrl'=>stripSlash(unescape(htmlspecialchars_decode($siteUrlArr[$key]))),'siteStatus'=>unescape($siteStatusArr[$key]),'siteSort'=>unescape($siteSortArr[$key]),'siteColor'=>unescape($siteColorArr[$key]));
					else
						$return[]=array('flag'=>'error');
				}else{															//insert
					$sql = "insert into ".DBPREFIX."site(siteName,siteUrl,siteStatus,cDate,siteSort,siteCreateDate,stpID,siteColor) values('".unescape($siteNameArr[$key])."','".unescape($siteUrlArr[$key])."','".unescape($siteStatusArr[$key])."','".time()."','".unescape($siteSortArr[$key])."',".time().",'".unescape($siteStpIDArr[$key])."','".unescape($siteColorArr[$key])."')";
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

    public function edittypeAction()
    {
    	if($_GET){
    		$req = addSlash($_GET);

			$stpParentID = isset($req['stpParentID'])?$req['stpParentID']:'';
			$stpIDArr = isset($req['stpID'])?$req['stpID']:array();
			$stpNameArr = isset($req['stpName'])?$req['stpName']:array();
			$stpHtmlNameArr = isset($req['stpHtmlName'])?$req['stpHtmlName']:array();
			$stpSortArr = isset($req['stpSort'])?$req['stpSort']:array();
			$title = isset($req['title'])?$req['title']:array();
			$keywords = isset($req['keywords'])?$req['keywords']:array();
			$description = isset($req['description'])?$req['description']:array();
			$tplIDArr = isset($req['tplID']) ? $req['tplID'] : array();

			$return = array();
			foreach($stpIDArr as $key => $sid){
				if($tplIDArr[$key])
						$tplName = $this->objC->GetOne("SELECT name FROM ".DBPREFIX."templates WHERE id=".$tplIDArr[$key]);
					else
						$tplName = '';
				if($sid){													//update
					$sql = "update ".DBPREFIX."type_site set stpName='".unescape($stpNameArr[$key])."',stpHtmlName='".unescape($stpHtmlNameArr[$key])."',stpSort='".unescape($stpSortArr[$key])."',title='".unescape(isset($title[$key])?$title[$key]:'')."',keywords='".unescape(isset($keywords[$key])?$keywords[$key]:'')."',description='".unescape(isset($description[$key])?$description[$key]:'')."',tplID=".unescape($tplIDArr[$key])." WHERE stpID={$sid}";
					$rs = $this->objC->RunQuery($sql);
					if($rs)
						$return[]=array('flag'=>'update','stpID'=>$sid,'stpName'=>unescape($stpNameArr[$key]),'stpHtmlName'=>unescape($stpHtmlNameArr[$key]),'stpSort'=>unescape($stpSortArr[$key]),'title'=>unescape($title[$key]),'keywords'=>unescape($keywords[$key]),'description'=>unescape($description[$key]),'tplID'=>unescape($tplIDArr[$key]),'tplName'=>unescape($tplName));
					else
						$return[]=array('flag'=>'error');
				}else{															//insert
					$sql = "insert into ".DBPREFIX."type_site (stpName,stpHtmlName,stpSort,stpCreateDate,stpParentID,stpShortName,title,keywords,description) values('".unescape($stpNameArr[$key])."','".unescape($stpHtmlNameArr[$key])."','".unescape($stpSortArr[$key])."',".time().",".$stpParentID.",'','".unescape($title[$key])."','".unescape($keywords[$key])."','".unescape($description[$key])."')";
					$rs = $this->objC->RunQuery($sql);
					if($rs){
						$sid = $this->objC->GetInsertId();
						$return[]=array('flag'=>'insert','stpID'=>$sid,'stpName'=>unescape($stpNameArr[$key]),'stpHtmlName'=>unescape($stpHtmlNameArr[$key]),'stpSort'=>unescape($stpSortArr[$key]),'title'=>unescape($title[$key]),'keywords'=>unescape($keywords[$key]),'description'=>unescape($description[$key]),'tplID'=>unescape($tplIDArr[$key]),'tplName'=>unescape($tplName));
					}else
						$return[]=array('flag'=>'error');
				}
			}
			echo json_encode(array_gbk_to_utf8($return));
			exit;
    	}
    }

    function getChildAction(){
    	$nodeid = $_GET['id']?(int)$_GET['id']:'';
    	if($nodeid){
    		$sql = "SELECT stpID,stpName,stpParentID FROM ".DBPREFIX."type_site WHERE stpParentID={$nodeid} AND stpStatus=1 ORDER BY stpSort ASC";
		    $rs = $this->objC->GetAll($sql);
		    foreach($rs as $key => $row){
		    	$sub = "SELECT COUNT(*) FROM ".DBPREFIX."type_site WHERE stpParentID=".$row['stpID']." AND stpStatus=1";
		    	$subcount = $this->objC->GetOne($sub);
		    	$rs[$key]['child'] = $subcount;
		    }
    	}else{
    		$rs = array();
    	}
    	echo json_encode(array_gbk_to_utf8($rs));
    	exit;
    }
	function createHtmlAction(){
		if($_GET['hid']){
			$sql = "SELECT stpHtmlName FROM `".DBPREFIX."type_site` WHERE `stpID` =".$_GET['hid'];
			$h = $this->objC->GetOne($sql);
			if(preg_match('/^https?:(.*)$/Ui',$h,$match)){
				AlertMsg("外网路径无法生成静态页",-1);
				exit;
			}
			include_once('../controllers/htmlController.php');
			$channel = new htmlController();
			$rs = $channel->oneChannelAction('/'.$h,$h);
			if($rs){
				$result = array('flag'=>'yes');
				echo json_encode($result);
			}else{
				$result = array('flag'=>'no');
				echo json_encode($result);
			}
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