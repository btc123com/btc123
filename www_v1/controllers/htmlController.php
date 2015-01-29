<?php
class htmlController extends abstractController{
	// 生成首页
	public function indexAction(){
		$args = func_get_args();
		if(count($args) == 2){
			$h = $args[0];
			$psize = $args[1];
		}else{
			$h = $psize = '';
		}

		$htmlTemp = addSlash($h);					//index
		$htmlName = basename($htmlTemp) . '.htm';
		$filePath = ROOT . $htmlName;

		if($psize == 'kp'){
			$countAd = 2;
			$countSad = 6;
			$tpl_name = "theme/".THEME_PATH."index_kp.tpl";
			$count = 8;
		}else{
			$countAd = 2;
			$countSad = 4;
			$tpl_name = "theme/".THEME_PATH."index.tpl";
			$count = 7;
		}
		if($psize == 'kp' && !is_file(TEMPLATES.$tpl_name)){
			return true;
			// 没有宽屏的主题直接返回成功。
		}

		$this->objS->assign('footer_path', 'theme/'.THEME_PATH.'footer.tpl');

		// 名站
    $sql = "SELECT siteID, siteName, siteUrl,siteColor FROM ".DBPREFIX."site_famous WHERE siteStatus = 1 ORDER BY siteSort ASC LIMIT 36";
    $mingzhanSiteList = $this->objC->getAll($sql);
    $this->objS->assign('mingzhanSiteList', $mingzhanSiteList);
		// 名站切换栏
    $sql = "SELECT * FROM `".DBPREFIX."index_setting` ORDER BY isort ASC LIMIT 10";
    $mztabs = $this->objC->getAll($sql);
    $this->objS->assign('mztabs', $mztabs);
		// 名站首行
    $sql = "SELECT * FROM `".DBPREFIX."admin_ad` where id = 'mztop' and status= 1 order by orders ASC LIMIT 6";
    $mztop = $this->objC->getAll($sql);
    $this->objS->assign('mztop', $mztop);
		// 广告
    $sql = "SELECT * FROM `".DBPREFIX."admin_ad` where id = 'index05' and status= 1 order by orders ASC LIMIT 6";
    $adMingzhan = $this->objC->getAll($sql);
    $this->objS->assign('adMingzhan', $adMingzhan);

    $sql = "SELECT * FROM `".DBPREFIX."admin_ad` where id = 'index03' and status= 1 order by orders DESC LIMIT 3";
    $adsRightArr = $this->objC->getAll($sql);
    $this->objS->assign('adsRightArr',$adsRightArr);
    $sql = "SELECT * FROM `".DBPREFIX."admin_ad` where id = 'index01' and status= 1 order by orders ASC LIMIT 1";
    $adIndexMidArr = $this->objC->getRow($sql);
    $this->objS->assign('adIndexMidArr',$adIndexMidArr);

    $sql = "SELECT * FROM `".DBPREFIX."admin_ad` where id = 'index02' and status= 1 order by orders ASC LIMIT ".$countAd;
    $adIndexArr = $this->objC->getAll($sql);
    $this->objS->assign('adIndexArr',$adIndexArr);

//		$sql = "SELECT * FROM `".DBPREFIX."admin_ad` where id = 'index03' and status= 1 order by orders ASC LIMIT ".$countSad;
//		$adSeacherArr = $this->objC->getAll($sql);
//		$this->objS->assign("adSeacherArr",$adSeacherArr);
	$sql ="SELECT k.* FROM `".DBPREFIX."search_keyword`as k LEFT JOIN ".DBPREFIX."search_class as s ON k.class=s.classid where s.is_default = 1 ORDER BY k.`sort` ASC limit 5";
	$adSeacherArr = $this->objC->getAll($sql);
	$this->objS->assign("adSeacherArr",$adSeacherArr);

    $sql = "SELECT * FROM `".DBPREFIX."admin_ad` where id = 'index04' and status= 1 order by orders ASC LIMIT 9";
    $adMidArr = $this->objC->getAll($sql);
    $this->objS->assign('adMidArr',$adMidArr);

    // 实用工具
    $sql = "SELECT siteID, siteName, siteUrl,siteColor FROM ".DBPREFIX."site_tool WHERE siteStatus = 1 ORDER BY siteSort ASC LIMIT 18";
    $toolList = $this->objC->getAll($sql);
    $this->objS->assign('toolList', $toolList);
    // 搜索
    $sql = "SELECT * FROM ".DBPREFIX."search_class ORDER BY `sort` ASC";
    $search_class = $this->objC->getAll($sql);
    $this->objS->assign('search_class', $search_class);
    // 搜索分类
	$sql = "SELECT a.* FROM `".DBPREFIX."search` as a, ".DBPREFIX."search_class as b WHERE a.`is_show`=1 and a.`class`=b.`classid` and b.is_default = 1 ORDER BY `sort` ASC";
    $search = $this->objC->getAll($sql);
    $this->objS->assign('search', $search);
	//默认搜索
	$sql = "SELECT a.* FROM `".DBPREFIX."search` as a, ".DBPREFIX."search_class as b WHERE a.`is_default`=1 and a.`is_show`=1 and a.`class`=b.`classid` and b.is_default = 1";
    $defaultsearch = $this->objC->getRow($sql);
    $this->objS->assign('defaultsearch', $defaultsearch);
    if(!empty($defaultsearch['params'])){
    	$search_params = explode(",",$defaultsearch['params']);
    	$i=0;
    	$params=array();
	    foreach($search_params as $p){
	    	$params[$i] = explode(":",$p);   //sort:'0', array(0=>sort,1=>'0')
			$params[$i][0] = trim(urldecode($params[$i][0]));
			$params[$i][1] = trim(urldecode($params[$i][1]));
	    	$i++;
	    }
    	$this->objS->assign('params', $params);
    }
//		// 左边版块
//		$typeSql = "SELECT stpID,stpName,stpHtmlName,stpCount,stpColor FROM ".DBPREFIX."type_site WHERE stpParentID=0 AND stpshow=1 ORDER BY stpSort ASC";
//		$typeRs = $this->objC->GetAll($typeSql);
//		foreach($typeRs as $key => $sites){
//			$html = $typeRs[$key]['stpHtmlName'];
//			$typeRs[$key]['stpHtmlName'] = $this->getRealPath($html,HTML_PATH);
//		}
//		$sql = "SELECT stpID as siteID, stpName as siteName, stpHtmlName as siteUrl, stpParentID as stpID, stpColor as siteColor FROM ".DBPREFIX."type_site WHERE stpParentID IN ('^^IDS^^')  AND stpStatus=1 ORDER BY stpSort ASC";
//		$leftSiteList = $this->getUrlContent($typeRs,$sql,16);
//		$this->objS->assign('leftSiteList', $leftSiteList);

		// 左边板块
		$typeSql = "SELECT stpID,stpName,stpHtmlName FROM ".DBPREFIX."type_left where stpStatus = 1 ORDER BY stpSort ASC";
		$typeRs = $this->objC->GetAll($typeSql);
		foreach($typeRs as $key => $sites){
			$html = $typeRs[$key]['stpHtmlName'];
			$typeRs[$key]['stpHtmlName'] = $this->getRealPath($html,HTML_PATH);
			$typeRs[$key]['stpHtmlName_all'] = $this->getRealPath($html,HTML_PATH,'http://www.5w.com');
		}
		$sql = "SELECT siteID, siteName, siteUrl, stpID,siteColor FROM ".DBPREFIX."site_left WHERE siteStatus = 1 AND stpID IN ('^^IDS^^') ORDER BY siteSort ASC";
		$leftSiteList = $this->getUrlContent($typeRs,$sql,30);

		$this->objS->assign('leftSiteList', $leftSiteList);

		// 底部版块
		$typeSql = "SELECT stpID,stpName,stpHtmlName FROM ".DBPREFIX."type_foot ORDER BY stpSort ASC LIMIT 3";
		$typeRs = $this->objC->GetAll($typeSql);
		foreach($typeRs as $key => $sites){
			$html = $typeRs[$key]['stpHtmlName'];
			$typeRs[$key]['stpHtmlName'] = $this->getRealPath($html,HTML_PATH);
		}
		$sql = "SELECT siteID, siteName, siteUrl, stpID,siteColor FROM ".DBPREFIX."site_foot WHERE siteStatus = 1 AND stpID IN ('^^IDS^^') ORDER BY siteSort ASC";
		$footSiteList = $this->getUrlContent($typeRs,$sql,20);
		$this->objS->assign('footSiteList', $footSiteList);

		// 实用酷站
		$sql = "SELECT stpID, stpName, stpHtmlName,stpShortName FROM ".DBPREFIX."type_cool ORDER BY stpSort ASC LIMIT 28";
		$stpIDs = $this->objC->getAll($sql);
		foreach($stpIDs as $key => $sites){
			$html = $stpIDs[$key]['stpHtmlName'];
			$stpIDs[$key]['stpHtmlName'] = $this->getRealPath($html,HTML_PATH);
		}

		$sql = "SELECT siteID, siteName, siteUrl, stpID,siteColor FROM ".DBPREFIX."site_cool WHERE siteStatus = 1 AND stpID IN ('^^IDS^^') ORDER BY siteSort ASC";
		$coolSiteList = $this->getUrlContent($stpIDs,$sql,$count);
		$this->objS->assign('coolSiteList', $coolSiteList);

		// 生成html
		$content = $this->objS->fetch($tpl_name);
		$content = str_replace('
','',$content);
		if($htmlTemp != ''){
			$rs = file_put_contents($filePath, $content);
			copy(ROOT."index.htm",ROOT."v1.html");
			if(!$rs)
				return false;
			else
				return true;
		}
	}

	// 生成全部频道页
	function allChannelAction(){
    $sql = "SELECT stpHtmlName FROM `".DBPREFIX."type_site` WHERE `stpHtmlName` != '' AND stpStatus=1";
    $arrStpHtmlName = $this->objC->getAll($sql);

    $htmlTempArr = array();
    foreach ($arrStpHtmlName as $htmlTempName){
    	$htmlname = $htmlTempName['stpHtmlName'];
    	if(substr($htmlname,0,7)!='http://' && substr($htmlname,0,8)!='https://')
    		$htmlTempArr[] = $htmlTempName['stpHtmlName'];
    }

    $arrCount = count($htmlTempArr);
    for($i = 0;$i < $arrCount;$i++){
  		$htmlPathName = $htmlTempArr[$i];
  		$this->makePath($htmlPathName);
  		$htmlPathName = $this->getRealPath($htmlPathName,'');
  		$rs = $this->oneChannelAction('/'.$htmlPathName);

			if(!$rs){
				$str = '生成 '.$htmlPathName.' <font style="color:red">失败！</font><br />';
			}else{
				$str = '生成 '.$htmlPathName.' 成功！<br />';
			}
			flushHTML($str);
    }
	}

	// 生成单个频道页
	function oneChannelAction(){
		$nullfor = array(0,1,2,3,4,5);
		$this->objS->assign('nullfor', $nullfor);
		$args = func_get_args();
		if(count($args) == 2){
			$h = $args[0];
			$hdir = $args[1];
		}else if(count($args) == 1){
			$h = $args[0];
		}
		$this->objS->assign('footer_path', 'theme/'.THEME_PATH.'footer.tpl');
		if(isset($hdir)){$this->makePath($hdir);}
    $h = isset($h) ? $h : '';
    $htmlTemp = addSlash($h);
    $htmlName = basename($htmlTemp);
    $htmlPath = '';
	  if (preg_match("/\/(.*)\//",$htmlTemp,$matches)) {
	    $htmlPath = $matches[1];
	  }
		if($htmlPath != '')
			$filePath = ROOT . HTML_PATH.$htmlPath . '/' . $htmlName;
		else
			$filePath = ROOT . HTML_PATH . $htmlName;

		$req = substr($htmlTemp,1,strlen($htmlTemp));
		//地址栏值不为空,显示子页
		if ($req != "") {

			// 新的子页显示方法：
			// 本级的直接下属站点，下级无stphtmlname目录及站点（页内的分类），下级有stphtmlname目录（目录链接）
			$c_name = "SELECT t.*,m.url as tplUrl FROM ".DBPREFIX."type_site t LEFT JOIN ".DBPREFIX."templates m ON m.id=t.tplID WHERE stpHtmlName='".$req."' AND stpStatus=1";
			$c_namers = $this->objC->getRow($c_name);
			$c_namers['title'] = isset($c_namers['title'])?$c_namers['title']:'';
			$c_namers['stpName'] = isset($c_namers['stpName'])?$c_namers['stpName']:'';
			if($c_namers['title']=='')
				$c_namers['title'] = $c_namers['stpName'].'-'.PAGE_INDEX_TITLE;
			$this->objS->assign('c_name', $c_namers);
			$sql_site = "SELECT s.`stpID`,`siteName`,`siteUrl`,`siteColor`,`dsiteColor`  FROM `".DBPREFIX."site` s LEFT JOIN ".DBPREFIX."type_site t ON s.stpID=t.stpID WHERE `siteStatus`= 1 AND t.stpHtmlName='".$req."' AND t.stpStatus=1";
			$dir_sites = $this->objC->getAll($sql_site);
			$this->objS->assign('dirsite', $dir_sites);
			$sql_links = "SELECT S2.`stpID`, S2.`stpName`, S2.`stpHtmlName`,S2.description,S2.keywords,S2.title FROM `".DBPREFIX."type_site` S1 INNER JOIN `".DBPREFIX."type_site` S2 ON S1.`stpHtmlName`='" . $req . "' AND S1.`stpID`=S2.`stpParentID` AND S2.`stpHtmlName` != '' AND S2.stpStatus=1";
			$dir_links = $this->objC->getAll($sql_links);
			$this->objS->assign('dirs', $dir_links);
			$sql_forder = "SELECT S2.stpID,S2.stpName,S2.stpHtmlName,S2.description,S2.keywords,S2.title FROM ".DBPREFIX."type_site S,".DBPREFIX."type_site S2 WHERE S.stpHtmlName='" . $req . "' AND S2.stpParentID = S.stpID AND S2.`stpHtmlName`='' AND S2.stpStatus=1 ORDER BY S2.stpSort ASC";
			$stpIDs = $this->objC->getAll($sql_forder);
			if($stpIDs){
				$arr = array();
				foreach ( $stpIDs as $tempid) {
					$arr[] = $tempid['stpID'];	//stpID字符串
					$temp_sql_content[$tempid['stpID']]['stpName'] = $tempid['stpName'];	//
					$temp_sql_content[$tempid['stpID']]['stpHtmlName'] = $tempid['stpHtmlName'];
				}
//				$idstr = implode(",",$arr);
//				$sql = "SELECT `stpID`,`siteName`,`siteUrl`  FROM `".DBPREFIX."site` WHERE `siteStatus`= 1 AND `stpID` IN (" . $idstr . ")";
//				$sites = $this->objC->getAll($sql);
				$sites = array();$i = 0;
				foreach($arr as $arrid){
					$sql = "SELECT `stpID`,`siteName`,`siteUrl`,`siteColor`  FROM `".DBPREFIX."site` WHERE `siteStatus`= 1 AND `stpID`=$arrid order by siteSort ASC";
					$site = $this->objC->getAll($sql);
					foreach($site as $s){
						$sites[$i] = $s;
						$i++;
					}
				}
				$arrsites = null;
				foreach ($sites as $key => $tempsite) {
					$stpName = $temp_sql_content[$tempsite['stpID']]['stpName'];	//根据stpID获得地点名称
					$stpHtmlName = $temp_sql_content[$tempsite['stpID']]['stpHtmlName'];	//根据stpID获得地点HTML名称
					$arrsites[$stpName][0] = $stpHtmlName;
					$arrsites[$stpName][1][$key]['siteName'] = $tempsite['siteName'];
					$arrsites[$stpName][1][$key]['siteUrl'] = $tempsite['siteUrl'];
					$arrsites[$stpName][1][$key]['siteColor'] = $tempsite['siteColor'];
				}
			}
	// 广告
			$sql = "SELECT * FROM `".DBPREFIX."admin_ad` where id = 'index06' and status= 1 order by orders ASC LIMIT 2";
			$adneiye = $this->objC->getAll($sql);
			$this->objS->assign('adneiye', $adneiye);
	//内页搜索
		    $sql = "SELECT * FROM ".DBPREFIX."search_class ORDER BY `sort` ASC";
		    $search_class = $this->objC->getAll($sql);
		    $this->objS->assign('search_class', $search_class);
	//默认搜索
			$sql = "SELECT a.* FROM `".DBPREFIX."search` as a, ".DBPREFIX."search_class as b WHERE a.`is_default`=1 and a.`is_show`=1 and a.`class`=b.`classid` and b.is_default = 1";
		    $defaultsearch = $this->objC->getRow($sql);
		    $this->objS->assign('defaultsearch', $defaultsearch);
		    if(!empty($defaultsearch['params'])){
		    	$search_params = explode(",",$defaultsearch['params']);
		    	$i=0;
		    	$params=array();
			    foreach($search_params as $p){
			    	$params[$i] = explode(":",$p);   //sort:'0', array(0=>sort,1=>'0')
					$params[$i][0] = trim(urldecode($params[$i][0]));
					$params[$i][1] = trim(urldecode($params[$i][1]));
			    	$i++;
			    }
		    	$this->objS->assign('params', $params);
		    }

			$this->objS->assign('coolSiteList', isset($arrsites)?$arrsites:array());			
			$indexedSiteList = array();
			$indexedcount=0;
			$indexedkey = '';
			$arrsites = isset($arrsites)?$arrsites:array();
			foreach($arrsites as $key => $row){
				if($indexedkey == ''){
					$indexedkey = $key;
				}else{
					if($indexedkey == $key){

					}else{
						$indexedcount++;
						$indexedkey = $key;
					}
				}
				$indexedSiteList[$indexedcount] = $row[1];

			}
			$this->objS->assign('indexedSiteList', $indexedSiteList);
			if($c_namers['tplUrl'])
				$tpl_name = "theme/".THEME_PATH.$c_namers['tplUrl'];
			else
				$tpl_name = "theme/".THEME_PATH."sub.tpl";
			/*
			// 暂注释掉地图----徐刚
      if (strpos($req,"zhaopin") !== false || strpos($req,"xinwen") !== false || strpos($req,"shequ") !== false || strpos($req,"daxue") !== false  || strpos($req,"fangchan") !== false  || strpos($req,"dianshi") !== false ) {
      	$this->objS->assign('havemap', 'havemap');
      }
      */

			$this->objS->assign('siteUlr', $req);
		} else {
			 exit('method not exists!');
		}

    $content = $this->objS->fetch($tpl_name);
    $rs = file_put_contents($filePath, $content);
    if(!$rs)
      return false;
    else
      return true;
	}

	// 生成404页面
	public function errorAction(){
    $filePath = ROOT . '404.htm';
    $this->objS->assign('footer_path', 'theme/'.THEME_PATH.'footer.tpl');
    $content = $this->objS->fetch("theme/".THEME_PATH.'404.tpl');
		$f = file_put_contents($filePath, $content);
    if($f)
			return true;
		else
			return false;
  }

	// 生成about页面
  public function aboutAction(){
    $filePath = ROOT . 'about.htm';
    $this->objS->assign('footer_path', 'theme/'.THEME_PATH.'footer.tpl');
    $content = $this->objS->fetch("theme/".THEME_PATH.'about.tpl');
		$f = file_put_contents($filePath, $content);
		if($f)
			return true;
		else
			return false;
  }
  // 全部帮助页
  public function allHelpAction(){
  	$error = $this->errorAction();
  	$about = $this->aboutAction();
  	return $error && $about;
  }

  // 一次生成所有
  public function allAction(){
  	$index = $this->indexAction();
  	$channel = $this->allChannelAction();
  	$allhelp = $this->allHelpAction();
  	return $index && $channel && $allhelp;
  }

	private function getUrlContent($stpIDs,$sql,$count = 0) {
		foreach ($stpIDs as $list) {
			$arrID[] = $list['stpID'];
			$showCount[$list['stpID']] = isset($list['stpCount'])?$list['stpCount']:'';
			$typeNames[$list['stpID']] = $list['stpName'];
			$htmlNames[$list['stpID']] = $list['stpHtmlName'];
			$shortName[$list['stpID']] = isset($list['stpShortName'])?$list['stpShortName']:'';
		}
		$idstr = implode("','", $arrID);
		$sql = str_replace('^^IDS^^',$idstr,$sql);
		$allSiteList = $this->objC->getAll($sql);
		$coolSiteList = array();
		foreach ($arrID as $key => $id){
			$i = 0;
			$coolSiteList[$id]['stpName'] = $typeNames[$id];
			$coolSiteList[$id]['stpHtmlName'] = $htmlNames[$id];
			$coolSiteList[$id]['stpShortName'] = $shortName[$id];
			if(!empty($showCount[$id])){$count = $showCount[$id];}
			foreach ($allSiteList as $list){
				//只显示6条
				if ($count) {
					if (isset($coolSiteList[$id]['sites']) && count($coolSiteList[$id]['sites']) >= $count) {
						break;
					}
				}
				if ($list['stpID'] == $id) {
					$list['siteUrl'] = $this->getRealPath($list['siteUrl'],HTML_PATH);
					$coolSiteList[$id]['sites'][] = $list;
					$i++;
				}
			}
		}
		return $coolSiteList;
	}

	private function getRealPath($path,$child = ''){
		$return = '';
		$path = trim($path);
    	if(strtolower(substr($path,0,7)) == 'http://' || strtolower(substr($path,0,8)) == 'https://'){
    		return $path;
    	}
    	if($path == '')return '';
    $path = $child.$path;
		$arr = explode('/',$path);
		// 判断最后一个元素
		$last = $arr[count($arr)-1];
		if($last == ''){
			// 目录
			$return = $path.'index.htm';
		}else{
			if(strpos($last,'.')!==false){
				// 带自定义后缀
				$return = $path;
			}else{
				// 非目录，没带后缀
				$return =$path.'.htm';
			}
		}
		return $return;
	}

	private function makePath($dir){
    if(strtolower(substr($dir,0,7)) == 'http://' || strtolower(substr($dir,0,8)) == 'https://'){
    	return;
    }
    $dir = HTML_PATH.$dir;
    if(strpos($dir,'/')!==false){
    	$arr = explode('/',$dir);
    	$base = ROOT;
    	for($i=0;$i<count($arr)-1;$i++){
    		$base .= $arr[$i].'/';
    		if(!is_dir($base))mkdir($base,0777);
    	}
    }
  }
}
