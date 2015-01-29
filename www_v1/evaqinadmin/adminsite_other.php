<?php
require("header.inc.php");
ChkAdminLogin();
$objC = new Conn();

$sql = "SELECT * FROM `".DBPREFIX."index_setting` order by isort ASC";
$indexArr = $objC->GetAll($sql);
$objS->assign('indexArr',$indexArr);

$act = isset($_GET['act']) ? $_GET['act'] : '';
if($act == 'operate'){
	$iid = $_POST['iid'];
	$isort = $_POST['isort'];
	$iname = $_POST['iname'];
	$iiframe = $_POST['iiframe'];
	if(!empty($_POST['upsub'])){
		foreach($iid as $id){
			if($id == 'add'){
				$sql = "INSERT INTO `".DBPREFIX."index_setting` (`iid`, `iname`, `iiframe`, `isort`) VALUES (NULL, '".$iname[$id]."', '".htmlspecialchars(addSlashes($iiframe[$id]))."', '".$isort[$id]."');";
			}else{
				$sql = "UPDATE `".DBPREFIX."index_setting` SET `iname` = '".$iname[$id]."', `iiframe` = '".htmlspecialchars(addSlashes($iiframe[$id]))."', `isort` = '".$isort[$id]."' WHERE `iid` = ".$id;
			}
			$objC->RunQuery($sql);
		}
		if($objC -> GetAffectedRows() < 0){
			AlertMsg('对不起，操作失败！','-1');
		}
		else{
			$cachedir = CACHE_PATH."data/";
			if($handle = opendir($cachedir)){
				while(false !== ($file=readdir($handle))){
					if(preg_match("/(.*)m\.data$/i",$file,$match) && $file != '.' && $file !== '..'){
						unlink($cachedir.$file);
					}
				}
			}
			AlertMsg('操作成功！ 注意：请到 [生成静态] 栏目下重新生成首页!','-1');
		}
	}elseif(!empty($_POST['delsub'])){
		foreach($iid as $id){
			$sql = "DELETE FROM `".DBPREFIX."index_setting` WHERE `iid` = ".$id;
			$objC->RunQuery($sql);
		}
		if($objC -> GetAffectedRows() < 0){
			AlertMsg('对不起，操作失败！','-1');
		}
		else{
			$cachedir = CACHE_PATH."data/";
			if($handle = opendir($cachedir)){
				while(false !== ($file=readdir($handle))){
					if(preg_match("/(.*)m\.data$/i",$file,$match) && $file != '.' && $file !== '..'){
						unlink($cachedir.$file);
					}
				}
			}
			AlertMsg('操作成功！','-1');
		}
	}
}
require("footer.inc.php");
$objS -> display("admin/adminsite_other.tpl");
?>
