<?php
require("header.inc.php");
ChkAdminLogin();
require_once CONTROLLER_PATH . 'abstractController.php';

class templatesController extends abstractController
{
    public function deleteAction()
    {
		if($_GET){
			$idArr = $_GET['id'];
			foreach($idArr as $sid){
				$sql = "delete from ".DBPREFIX."templates where id = '".$sid."'";
				$rs = $this->objC->RunQuery($sql);
			}
			if(!$rs){
				$result = array('flag'=>'error');
				echo json_encode($result);
				exit;
			}else{
				$result = array('flag'=>'delete','id'=>$sid);
				echo json_encode($result);
				exit;
			}
		}
    }
    public function editAction()
    {
    	if($_GET){
    		$req = AddSlash($_GET);
			$idArr = $req['id'];
			$nameArr = $req['name'];
			$urlArr = $req['url'];
			$listorderArr = $req['listorder'];
			$return = array();
			foreach($idArr as $key => $sid){

				if($sid){													//update
					$sql = "update ".DBPREFIX."templates set name='".unescape($nameArr[$key])."',url='".unescape(htmlspecialchars_decode($urlArr[$key]))."',listorder='".unescape($listorderArr[$key])."' WHERE id={$sid}";
					$rs = $this->objC->RunQuery($sql);
					if($rs)
						$return[]=array('flag'=>'update','id'=>$sid,'name'=>htmlspecialchars_decode(stripslashes(unescape($nameArr[$key]))),'url'=>unescape(htmlspecialchars_decode($urlArr[$key])),'listorder'=>unescape($listorderArr[$key]));
					else
						$return[]=array('flag'=>'error');
				}else{															//insert
					$sql = "insert into ".DBPREFIX."templates(name,url,listorder) values('".unescape($nameArr[$key])."','".unescape($urlArr[$key])."','".unescape($listorderArr[$key])."')";
					$rs = $this->objC->RunQuery($sql);
					if($rs){
						$sid = $this->objC->GetInsertId();
						$return[]=array('flag'=>'insert','id'=>$sid,'name'=>unescape($nameArr[$key]),'url'=>unescape($urlArr[$key]),'listorder'=>unescape($listorderArr[$key]));
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
$classname  = "templatesController";
$controllerObj = new $classname;
$actionName = $action.'Action';
if (method_exists($controllerObj, $actionName))
	$controllerObj->$actionName();
else
	die('链接错误');
?>