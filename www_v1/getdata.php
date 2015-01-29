<?php
include('header.inc.php');
if($_GET['act'] == 'getTab'){
	$iid = addSlash($_GET['iid']);
	$new_cache = new FileCache();				//------------fengguanxing 缓存
	$sdata = $new_cache->getCache(CACHE_PATH.'data/',$iid.'m.data',60*60*24);
	if($sdata !== false){
		$sdata = unserialize($sdata);
		echo json_encode(array_gbk_to_utf8($sdata));
	}else{
		$sql = "SELECT iiframe FROM `".DBPREFIX."index_setting` where `iid` = ".$iid;
		$iif = $objC->GetOne($sql);
		$iif = htmlspecialchars_decode(stripslashes($iif));
		//$iif = addSlashes($iif);
		if(CHARSET=='gbk')
		$iif = iconv("GBK","UTF-8",$iif);
		$cachedata = serialize($iif);
	    $new_cache->setCache(CACHE_PATH.'data/',$iid.'m.data',$cachedata);
		echo json_encode($iif);
	}
}elseif($_GET['act'] == 'getneisearch'){
	$sid = addSlash($_GET['sid']);

	$new_cache = new FileCache();				//------------fengguanxing 缓存
	$sdata = $new_cache->getCache(CACHE_PATH.'data/',$sid.'ns.data',60*60*24);
	if($sdata !== false){
		$sdata = unserialize($sdata);
		echo json_encode(array_gbk_to_utf8($sdata));
	}else{
	    // 搜索分类
		$sql = "SELECT * FROM `".DBPREFIX."search` WHERE `class`=$sid ORDER BY `sort` ASC";
	    $search = $objC->getAll($sql);
	//	echo json_encode(array_gbk_to_utf8($search));
		//默认搜索
//		if($sid==2)
//			$sql = "SELECT * FROM `".DBPREFIX."search` WHERE `class`=$sid and `search_select` like '%搜狗%'";
//		else
			$sql = "SELECT * FROM `".DBPREFIX."search` WHERE `class`=$sid and `is_default` = 1";

	    $defaultsearch = $objC->getRow($sql);
	    $defaultsearch['action'] = htmlspecialchars_decode($defaultsearch['action']);
	//	echo json_encode(array_gbk_to_utf8($defaultsearch));
	    if(!empty($defaultsearch['params'])){
	    	$search_params = explode(",",$defaultsearch['params']);
	    	$i=0;
		    foreach($search_params as $p){
		    	$params[$i] = explode(":",$p);   //sort:'0', array(0=>sort,1=>'0')
		    	$params[$i][0] = trim(urldecode($params[$i][0]));
		    	$params[$i][1] = trim(urldecode($params[$i][1]));
		    	$i++;
		    }
	    	$result['params'] = $params;
	    }
	    //$sql = "SELECT *  FROM `".DBPREFIX."search_keyword` WHERE `class` = $sid ORDER BY `sort` ASC limit 5";
	    //$keywords = $objC->getAll($sql);

	    $result['i'] = $i;
	    $result['search'] = $search;
	    $result['def'] = $defaultsearch;
	   // $result['keywords'] = $keywords;

	    $cachedata = serialize($result);
	    $new_cache->setCache(CACHE_PATH.'data/',$sid.'ns.data',$cachedata);

		echo json_encode(array_gbk_to_utf8($result));
	}
}elseif($_GET['act'] == 'getsearch'){
	$sid = addSlash($_GET['sid']);

	$new_cache = new FileCache();				//------------fengguanxing 缓存
	$sdata = $new_cache->getCache(CACHE_PATH.'data/',$sid.'s.data',60*60*24);
	if($sdata !== false){
		$sdata = unserialize($sdata);
		echo json_encode(array_gbk_to_utf8($sdata));
	}else{
	    // 搜索分类
		$sql = "SELECT * FROM `".DBPREFIX."search` WHERE `class`=$sid ORDER BY `sort` ASC";
	    $search = $objC->getAll($sql);
		//默认搜索
		$sql = "SELECT * FROM `".DBPREFIX."search` WHERE `class`=$sid and is_default=1";
	    $defaultsearch = $objC->getRow($sql);
	    $defaultsearch['action'] = htmlspecialchars_decode($defaultsearch['action']);
	    if(!empty($defaultsearch['params'])){
	    	$search_params = explode(",",$defaultsearch['params']);
	    	$i=0;
		    foreach($search_params as $p){
		    	$params[$i] = explode(":",$p);   //sort:'0', array(0=>sort,1=>'0')
		    	$params[$i][0] = trim(urldecode($params[$i][0]));
		    	$params[$i][1] = trim(urldecode($params[$i][1]));
		    	$i++;
		    }
	    	$result['params'] = $params;
	    }
	    $sql = "SELECT *  FROM `".DBPREFIX."search_keyword` WHERE `class` = $sid ORDER BY `sort` ASC limit 5";
	    $keywords = $objC->getAll($sql);

	    $result['i'] = $i;
	    $result['search'] = $search;
	    $result['def'] = $defaultsearch;
	    $result['keywords'] = $keywords;

	    $cachedata = serialize($result);
	    $new_cache->setCache(CACHE_PATH.'data/',$sid.'s.data',$cachedata);

		echo json_encode(array_gbk_to_utf8($result));
	}
}elseif($_GET['act'] == 'getcon'){
	$id = addSlash($_GET['id']);

	$new_cache = new FileCache();				//------------fengguanxing 缓存
	$cdata = $new_cache->getCache(CACHE_PATH.'data/',$id.'c.data',60*60*24);
	if($cdata !== false){
		$cdata = unserialize($cdata);
		echo json_encode(array_gbk_to_utf8($cdata));
	}else{
		$sql = "SELECT * FROM `".DBPREFIX."search` WHERE `id`=$id ";
		$con = $objC->GetRow($sql);
		$con['action'] = htmlspecialchars_decode($con['action']);
	    if(!empty($con['params'])){
	    	$search_params = explode(",",$con['params']);
	    	$i=0;
		    foreach($search_params as $p){
		    	$params[$i] = explode(":",$p);   //sort:'0', array(0=>sort,1=>'0')
		    	$params[$i][0] = trim($params[$i][0]);
		    	$params[$i][1] = urldecode($params[$i][1]);
		    	$i++;
		    }
		    $result['params'] = $params;
	    }
	    $result['i'] = $i;
	    $result['con'] = $con;

	    $cachedata = serialize($result);
	    $new_cache->setCache(CACHE_PATH.'data/',$id.'c.data',$cachedata);

		echo json_encode(array_gbk_to_utf8($result));
	}
}elseif($_GET['act'] == 'mail163'){
	$url = $_POST['url'];
	$unm = $_POST['username'];
	$pwd = $_POST['password'];
	$url .= '&username='.$unm.'&password='.$pwd;
	echo "<meta http-equiv=\"refresh\" content=\"0;url=".$url."\">";exit;
}elseif($_GET['act'] == 'mail126'){
	$url = $_POST['url'];
	$unm = $_POST['username'];
	$pwd = $_POST['password'];
	$url .= '&username='.$unm.'&password='.$pwd;
	//header("location:".$url);exit;
	echo "<meta http-equiv=\"refresh\" content=\"0;url=".$url."\">";exit;
}
