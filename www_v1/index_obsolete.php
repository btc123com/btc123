<?php
include('header.inc.php');
if($_GET['act'] == 'getTab'){
	$iid = addSlash($_GET['iid']);
	$sql = "SELECT iiframe FROM `".DBPREFIX."index_setting` where `iid` = ".$iid;
	$iif = $objC->GetOne($sql);
	$iif = htmlspecialchars_decode(stripslashes($iif));
	if(CHARSET=='gbk')$iif = iconv("GBK","UTF-8",$iif);
	echo json_encode($iif);
}elseif($_GET['act'] == 'getsearch'){
	$sid = addSlash($_GET['sid']);
    // 搜索分类
	$sql = "SELECT * FROM `".DBPREFIX."search` WHERE `class`=$sid ORDER BY `sort` ASC";
    $search = $objC->getAll($sql);
//	echo json_encode(array_gbk_to_utf8($search));
	//默认搜索
	$sql = "SELECT * FROM `".DBPREFIX."search` WHERE `class`=$sid and is_default=1";
    $defaultsearch = $objC->getRow($sql);
//	echo json_encode(array_gbk_to_utf8($defaultsearch));
    $search_params = explode(",",$defaultsearch['params']);
    $i=0;
    if(!empty($search_params)){
	    foreach($search_params as $p){
	    	$params[$i] = explode(":",$p);   //sort:'0', array(0=>sort,1=>'0')
	    	$i++;
	    }
    	$result['params'] = $params;
    }
    $result['i'] = $i;
    $result['search'] = $search;
    $result['def'] = $defaultsearch;
	echo json_encode(array_gbk_to_utf8($result));
}elseif($_GET['act'] == 'getcon'){
	$id = addSlash($_GET['id']);
	$sql = "SELECT * FROM `".DBPREFIX."search` WHERE `id`=$id ";
	$con = $objC->GetRow($sql);
    $search_params = explode(",",$con['params']);
    if(!empty($search_params)){
    	$i=0;
	    foreach($search_params as $p){
	    	$params[$i] = explode(":",$p);   //sort:'0', array(0=>sort,1=>'0')
	    	$i++;
	    }
	    $result['params'] = $params;
    }
    $result['i'] = $i;
    $result['con'] = $con;
	echo json_encode(array_gbk_to_utf8($result));
}
if(!file_exists(ROOT . 'data/install.lock')){
	header("location: ./install/");
}
if(count($_GET)==0){
	if(is_file('index.htm'))
		include('index.htm');
	else
		die('请先登录管理后台生成静态文件');
}
