<?php
require("header.inc.php");
ChkAdminLogin();
$objC = new Conn();

$classid = empty($_GET['classid']) ? '' : $_GET['classid'];
$sql = "SELECT `classid`,`classname` FROM `".DBPREFIX."search_class` ORDER BY `sort` ASC";
$rows = $objC->GetAll($sql);
if(empty($classid)){
	$classid = $rows[0]['classid'];
}
$options = array();
foreach ($rows as $row)
{
	$options[$row['classid']] = $row['classname'];
}
$objS->assign('classid',$classid);
$objS->assign('options',$options);

$sql="SELECT a.*,b.classname FROM `".DBPREFIX."search` as a LEFT JOIN `".DBPREFIX."search_class` as b ON a.class=b.classid WHERE 1=1 AND b.classid = $classid ORDER BY a.`sort` ASC";
$data = $objC->GetAll($sql);
$objS->assign('data',$data);

$act = isset($_GET['act']) ? $_GET['act'] : '';
if($act == 'operate'){
	$iid = $_POST['id'];
	$isort = $_POST['sort'];
	$ishow = $_POST['is_show'];
	$def = $_POST['is_def'];
	if(!empty($_POST['upsub'])){
		foreach($iid as $id){
			if($def == $id){$default=1;}else{$default=0;}
			if($ishow[$id]){$ishow[$id]=1;}else{$ishow[$id]=0;}
			$sql = "UPDATE `".DBPREFIX."search` SET `is_show` = $ishow[$id], `sort` = $isort[$id], `is_default` = $default WHERE `id` = ".$id;
			$objC->RunQuery($sql);
		}
		if($objC -> GetAffectedRows() < 0){
			AlertMsg('对不起，操作失败！','-1');
		}
		else{
			AlertMsg('操作成功！','-1');
		}
	}
}elseif($act == 'delete'){
	$cid = $_REQUEST['classid'];
	$id = $_REQUEST['id'];
	$sql = "SELECT `is_default` FROM `".DBPREFIX."search` WHERE `class` = $cid and `id` = $id";
	$default = $objC->GetOne($sql);
	if($default){
		AlertMsg('对不起，默认搜索引擎不能被删除，请重新设置！','-1');
	}else{
		$sql = "DELETE FROM `".DBPREFIX."search` WHERE `class` = $cid and `id` = $id";
		$objC->RunQuery($sql);
		if($objC -> GetAffectedRows() < 0){
			AlertMsg('对不起，操作失败！','-1');
		}
		else{
			$cachedir = CACHE_PATH."data/";
			if($handle = opendir($cachedir)){
				while(false !== ($file=readdir($handle))){
					if(preg_match("/(.*)c\.data$/i",$file,$match) && $file != '.' && $file != '..'){
						unlink($cachedir.$file);
					}
				}
				while(false !== ($file=readdir($handle))){
					if(preg_match("/(.*)s\.data$/i",$file,$match) && $file != '.' && $file != '..'){
						unlink($cachedir.$file);
					}
				}
			}
			AlertMsg('操作成功！','-1');
		}
	}
}elseif($act == 'update'){
	$id = isset($_REQUEST['id'])?$_REQUEST['id']:0;
	if($id){
	    $sql = "SELECT * FROM `".DBPREFIX."search` WHERE `id`= $id";
	    $data = $objC->GetRow($sql);
	    $objS->assign('data',$data);
	}
}elseif($act == 'save'){
	if(isset($_POST['savebtn'])){
		$form = $_POST['form'];
		$id = isset($form['id'])?$form['id']:'';
		$class = isset($form['class'])?$form['class']:'';
		$search_select = isset($form['search_select'])?$form['search_select']:'';
		$action = isset($form['action'])?$form['action']:'';
		$name = isset($form['name'])?$form['name']:'';
		$url = isset($form['url'])?$form['url']:'';
		$img_url = isset($form['img_url'])?$form['img_url']:'';
		$img_text = isset($form['img_text'])?$form['img_text']:'';
		$btn = isset($form['btn'])?$form['btn']:'';
		$sort = isset($form['sort'])?$form['sort']:'';
		$params = isset($form['params'])?$form['params']:'';
		if($id){						//修改
			$sql = "UPDATE `".DBPREFIX."search` SET `class`=$class, `search_select`='".$search_select."', `action`='".$action."', `name`='".$name."', `url`='".$url."', `img_url`='".$img_url."', `img_text`='".$img_text."', `btn`='".$btn."', `sort`=$sort, `params`='".$params."' where `id` = $id";
			$objC->RunQuery($sql);
		}else{							//添加
			$sql = "insert into `".DBPREFIX."search`(id,class,search_select,action,name,btn,img_text,img_url,url,params,sort,is_show,is_default)" .
					"VALUES(NULL,$class,'".$search_select."','".$action."','".$name."','".$btn."','".$img_text."','".$img_url."','".$url."','".$params."',$sort,1,0)";
			$objC->RunQuery($sql);
		}
		$url = 'adminSearch.php?classid='.$class;
		if($objC -> GetAffectedRows() < 0){
			AlertMsg('对不起，操作失败！',$url);
		}
		else{
			$cachedir = CACHE_PATH."data/";
			if($handle = opendir($cachedir)){
				while(false !== ($file=readdir($handle))){
					if(preg_match("/(.*)c\.data$/i",$file,$match) && $file != '.' && $file != '..'){
						unlink($cachedir.$file);
					}
				}
				while(false !== ($file=readdir($handle))){
					if(preg_match("/(.*)s\.data$/i",$file,$match) && $file != '.' && $file != '..'){
						unlink($cachedir.$file);
					}
				}
			}
			AlertMsg('操作成功！',$url);
		}
	}
}

require("footer.inc.php");
$objS -> display("admin/adminsearch.tpl");
?>
