<?php
function check_utf8($str) { 
     $len = strlen($str); 
     for($i = 0; $i < $len; $i++){ 
         $c = ord($str[$i]); 
         if ($c > 128) { 
             if (($c > 247)) return false; 
             elseif ($c > 239) $bytes = 4; 
             elseif ($c > 223) $bytes = 3; 
             elseif ($c > 191) $bytes = 2; 
             else return false; 
             if (($i + $bytes) > $len) return false; 
             while ($bytes > 1) { 
                 $i++; 
                 $b = ord($str[$i]); 
                 if ($b < 128 || $b > 191) return false; 
                 $bytes--; 
             } 
         } 
     } 
     return true; 
 } // end of check_utf8 

class tagUrlController extends abstractController
{
    public $reload = false;

    public $jsonSites = '';

    public function __construct()
    {
        parent::__construct();
        $this->setJsonSites();
    }

    public function setJsonSites()
    {
    	$childpath = 'data';
        $newcache = new FileCache();
		$cachedate = $newcache->getCache(CACHE_PATH.$childpath.'/','default.data',0);
        if($cachedate!==false){
        	$this->jsonSites = unserialize($cachedate);
        }else{
	    	$sql = "SELECT * FROM `".DBPREFIX."defaultsitetype` order by stpSort ASC";
	    	$navArr = $this->objC->GetAll($sql);
	    	$arrList = array('result'=>'list', 'ct'=>array());
	    	$li = array();
	    	foreach ($navArr as $k=>$nav){
	    		$navID = $nav['stpID'];
	    		$navImg = $nav['stpImg'];
	    		$navName = $nav['stpName'];
	    		$navSort = $nav['stpSort'];
	    		$sql = "SELECT siteID,siteName, siteUrl FROM ".DBPREFIX."defaultsite WHERE stpID = $navID ORDER BY `siteSort` ASC LIMIT 20";
	    		$siteList = $this->objC->getAll($sql);
	    		$li[$navID]['td'] = $navID;
	    		$li[$navID]['tg'] = $navImg;
	    		$li[$navID]['te'] = $navName;
	    		$li[$navID]['tt'] = $navSort;
	    		if(is_array($siteList)){
	    			foreach ($siteList as $m=>$list){
			            $list['siteName'] = htmlspecialchars_decode(stripslashes($list['siteName']));
			            $li[$navID]['ss'][$m] = array('sd'=>$list['siteID'], 'se'=>$list['siteName'], 'sl'=>$list['siteUrl']);    				
	    			}
	    		}
	    	}
	    	$arrList['ct'] = $li;
	    	$arrList = json_encode(array_gbk_to_utf8($arrList));
			$this->jsonSites = $arrList;
	    	$defaultData = serialize($arrList);
        	$newcache->setCache(CACHE_PATH.$childpath.'/','default.data',$defaultData);
        }
    }

	public function addPageAction(){
		$tagID  = GetCUserID();
		$navName = $_GET['tagName'];
		if (!check_utf8($navName)){
		$navName = iconv('gbk', 'utf-8', $navName);
		}
		$navImg = $_GET['tagImg'];
		if($tagID && $navName){
		    // 添加默认站点
            $dstatus = $this->objC->GetOne("SELECT dstatus FROM ".DBPREFIX."members WHERE userID={$tagID}");
            if($dstatus==0){
            	$siteList = json_decode($this->jsonSites, true);
            	if(CHARSET == 'gbk')
					$sites = array_utf8_to_gbk($siteList);
				else
					$sites = $siteList;
            	$navID = $this->checkDefaultSite(0, $sites);
            }
            $max = "SELECT MAX(navSort) FROM ".DBPREFIX."tag_site_nav WHERE userID = '$tagID'";
            $maxrs = $this->objC->GetOne($max);
            if($maxrs)
            	$maxrs++;
            else
            	$maxrs = 1;
			$sql = "INSERT INTO `".DBPREFIX."tag_site_nav` (`navID` ,`userID` ,`navName`,navImg,navSort)VALUES (NULL , '{$tagID}', '".$navName."','".$navImg."',{$maxrs});";
			$rs = $this->objC->RunQuery($sql);
			if (!$rs) {
                $info = array('result'=>'error', 'msg'=>'对不起,写入分页信息失败,请稍候再试!');
                echo json_encode(array_gbk_to_utf8($info));
                exit;
            }
		
            if ($this->reload) {
                echo json_encode(array('result'=>'reload'));
                exit;
            }
            
            	$navID = $this->objC->GetInsertId();
            	$info = array('result'=>'ok', 'msg'=>$navID);
            	echo json_encode($info);
            	
		}else {
			$info = array('result'=>'error', 'msg'=>'对不起,链接失效,请重新登录!');
            echo json_encode(array_gbk_to_utf8($info));
            exit;
		}
	}
	public function modifyPageAction(){
		$tagID  = GetCUserID();
		$navID = $_GET['navID'];
		$navName = $_GET['navName'];
		if (!check_utf8($navName)){
		$navName = iconv('gbk', 'utf-8', $navName);
		}
		$navImg = $_GET['navImg'];
		if($tagID && $navID){
			// 添加默认站点
            $dstatus = $this->objC->GetOne("SELECT dstatus FROM ".DBPREFIX."members WHERE userID={$tagID}");
            if($dstatus==0){
            	$siteList = json_decode($this->jsonSites, true);
            	if(CHARSET == 'gbk')
					$sites = array_utf8_to_gbk($siteList);
				else
					$sites = $siteList;
            	foreach ($sites['ct'] as &$site){
            			if($navID == $site['td']){
				    		$site['tg'] = $navImg;
				    		$site['te'] = $navName;
		                	break;            				
            			}
            	}
            	$navID = $this->checkDefaultSite($navID, $sites, true);
            }
			$sql = "UPDATE `".DBPREFIX."tag_site_nav` SET `navName` = '".$navName."',navImg = '".$navImg."' WHERE `navID` =".$navID;
			$rs = $this->objC->RunQuery($sql);
			if (!$rs) {
                $info = array('result'=>'error', 'msg'=>'对不起,修改站点信息失败,请稍候再试!');
                echo json_encode(array_gbk_to_utf8($info));
                exit;
            }else {
            	echo json_encode('');
            }
		}else {
			$info = array('result'=>'error', 'msg'=>'对不起,链接失效,请重新登录!');
            echo json_encode(array_gbk_to_utf8($info));
            exit;
		}
	}
	public function deletePageAction(){
		$tagID  = GetCUserID();
		$navID = $_GET['navID'];
		if($tagID && $navID){
					// 添加默认站点
            $dstatus = $this->objC->GetOne("SELECT dstatus FROM ".DBPREFIX."members WHERE userID={$tagID}");
            if($dstatus==0){
            	$siteList = json_decode($this->jsonSites, true);
            	if(CHARSET == 'gbk')
					$sites = array_utf8_to_gbk($siteList);
				else
					$sites = $siteList;
            	foreach ($sites['ct'] as $key=>&$site){
            			if($navID == $site['td']){
            				$site = null;
            				unset($sites['ct'][$key]);
		                	break;
            			}
            	}
            	$navID = $this->checkDefaultSite($navID, $sites, true);
            }			
			$sql = "DELETE FROM `".DBPREFIX."tag_site_nav` WHERE `navID` =".$navID;
			$rs = $this->objC->RunQuery($sql);
			if (!$rs) {
                $info = array('result'=>'error', 'msg'=>'对不起,删除分页失败,请稍候再试!');
                echo json_encode(array_gbk_to_utf8($info));
                exit;
            }else {
				$sql = "DELETE FROM `".DBPREFIX."tag_site_url` where navID = $navID and userID = $tagID";
				$this->objC->RunQuery($sql);
            	echo json_encode('');
            }			
		}else {
			$info = array('result'=>'error', 'msg'=>'对不起,链接失效,请重新登录!');
            echo json_encode(array_gbk_to_utf8($info));
            exit;
		}
	}
    public function addAction()
    {
        $tagID  = GetCUserID();
        $domain = GetCUserDomain();
        $navID = $_REQUEST['tagID'];
        $siteName = addslashes(stripcslashes($_REQUEST['siteName']));
        $siteUrl  = addslashes(stripcslashes($_REQUEST['siteUrl']));
        $siteUrl  = str_replace('http://', '', $siteUrl);
        $siteUrl  = preg_replace("/\/$/", '', $siteUrl);
        $count    = 0;

        if ($tagID)
        {
            if (empty($navID)) {
                $info = array('result'=>'error', 'msg'=>'添加失败!');
                echo json_encode(array_gbk_to_utf8($info));
                exit;
            }

            // 添加默认站点
            $dstatus = $this->objC->GetOne("SELECT dstatus FROM ".DBPREFIX."members WHERE userID={$tagID}");
            if($dstatus==0){
            	$siteList = json_decode($this->jsonSites, true);
            	if(CHARSET == 'gbk')
					$sites = array_utf8_to_gbk($siteList);
				else
					$sites = $siteList;
            	$navID = $this->checkDefaultSite($navID, $sites);
            }
            if ($siteName == '' || $siteUrl == '') {
                $info = array('result'=>'error', 'msg'=>'添加失败, 站点信息不完整!');
                echo json_encode(array_gbk_to_utf8($info));
                exit;
            }

			if(CHARSET == 'gbk'){
	            $siteName = iconv('utf-8', 'gbk', $siteName);
		        $siteUrl = iconv('utf-8', 'gbk', $siteUrl);
			}

            $sql = "SELECT siteName FROM ".DBPREFIX."tag_site_url WHERE siteName = '$siteName' AND userID = '$tagID' and navID = $navID";
            $result = $this->objC->getRow($sql);
            if ($result) {
                $info = array('result'=>'error', 'msg'=>'对不起,该分页下已存在同名的站点!');
                echo json_encode(array_gbk_to_utf8($info));
                exit;
            }
            $max = "SELECT MAX(siteSort) FROM ".DBPREFIX."tag_site_url WHERE userID = '$tagID' and navID = $navID";
            $maxrs = $this->objC->GetOne($max);
            if($maxrs)
            	$maxrs++;
            else
            	$maxrs = 1;

            $sql = "INSERT INTO ".DBPREFIX."tag_site_url (siteID, siteName, siteUrl, userID,navID, useDate,siteSort) VALUES(NULL, '$siteName', '$siteUrl', '$tagID',$navID, '".time()."',{$maxrs})";
            $result = $this->objC->RunQuery($sql);
            if (!$result) {
                $info = array('result'=>'error', 'msg'=>'添加失败！');
                echo json_encode(array_gbk_to_utf8($info));
                exit;
            }else{
            	$siteID = $this->objC->GetInsertId();
            	$newdata = serialize($this->getAllData());
            	$childpath = FileCache::getDir($tagID);
            	$newcache = new FileCache(CACHE_PATH.$childpath.'/');
            	if(CACHE_USE)
            	$newcache->setCache(CACHE_PATH.$childpath.'/',$tagID.'.data',$newdata);
            	//$this->modifyStatus($tagID);
            }

            if ($this->reload) {
                echo json_encode(array('result'=>'reload'));
                exit;
            }

            $info = array('result'=>'ok', 'msg'=>$siteID);
            echo json_encode(array_gbk_to_utf8($info));
            exit;
        }
        else {
            $info = array('result'=>'error', 'msg'=>'对不起,链接失效,请重新登录!');
            echo json_encode(array_gbk_to_utf8($info));
            exit;
        }
    }	
    public function listAction()
    {
        $li = array();
        $domain = GetCUserDomain();
		$userID = GetCUserID();
        $arrList = array('result'=>'list', 'ct'=>array());
        if (!empty($userID))
        {
        	$sql ="SELECT navName,navID,navImg FROM `".DBPREFIX."tag_site_nav` WHERE `userID` = $userID order BY navSort ASC";
        	$navArr = $this->objC->getAll($sql);
        	if(!empty($navArr)){
	        	foreach ($navArr as $k=>$nav){
	        		$navID = $nav['navID'];
	        		$navImg = $nav['navImg'];
	        		$navName = $nav['navName'];
		       		$sql = "SELECT siteID, siteName, siteUrl FROM ".DBPREFIX."tag_site_url WHERE userID = $userID and navID = $navID ORDER BY `siteSort` ASC LIMIT 77";
			        $siteList = $this->objC->getAll($sql);
			        $li[$k]['td'] = $navID;
			        $li[$k]['tg'] = $navImg;
			        $li[$k]['te'] = $navName;
			        $li[$k]['ss'] = array();
			        if (is_array($siteList)) {
			            foreach ($siteList as $m=>$list) {
			            $list['siteName'] = htmlspecialchars_decode(stripslashes($list['siteName']));
			            $li[$k]['ss'][$m] = array('sd'=>$list['siteID'], 'se'=>$list['siteName'], 'sl'=>$list['siteUrl']);
			        	}
			        }       		
	        	}
		        $arrList['ct'] = $li;
        	}
            if (empty($arrList['ct'])) {
	        	$dstatus = $this->objC->GetOne("SELECT dstatus FROM ".DBPREFIX."members WHERE userID={$userID}");
	        	if($dstatus){
	        		$sql = "insert into `".DBPREFIX."tag_site_nav`(`navID`,`userID`,`navName`,navImg,navSort) values (NULL,$userID,'默认分类','z_0.gif',1)";
	        		$this->objC->RunQuery($sql);
	        		$navID = $this->objC->GetInsertId();
	        		$sql = "update ".DBPREFIX."tag_site_url set navID = $navID where userID = $userID";
	        		$this->objC->RunQuery($sql);
	        		$sql = "SELECT siteID, siteName, siteUrl FROM ".DBPREFIX."tag_site_url WHERE userID = $userID and navID = $navID ORDER BY `siteSort` ASC LIMIT 99";
			        $siteList = $this->objC->getAll($sql);
			        $li[0]['td'] = $navID;
			        $li[0]['tg'] = 'z_0.gif';
			        $li[0]['te'] = '默认分类';
			        $li[0]['ss'] = array();
			        if (is_array($siteList)) {
			            foreach ($siteList as $m=>$list) {
			            $list['siteName'] = htmlspecialchars_decode(stripslashes($list['siteName']));
			            $li[0]['ss'][$m] = array('sd'=>$list['siteID'], 'se'=>$list['siteName'], 'sl'=>$list['siteUrl']);
			        	}
			        }
			        $arrList['ct'] = $li;
			        echo json_encode(array_gbk_to_utf8($arrList));
	        	}else{
	        		echo $this->jsonSites;
	        	}
				exit;
            }else {
                echo json_encode(array_gbk_to_utf8($arrList));
                exit;
            }
        }else{
            exit;
        }
    }
    public function deleteAction()
    {
        $tagID = GetCUserID();
        $siteID = intval($_REQUEST['siteID']);
		$navID = intval($_REQUEST['tagID']);
        if ($tagID)
        {
                    // 添加默认站点
            $dstatus = $this->objC->GetOne("SELECT dstatus FROM ".DBPREFIX."members WHERE userID={$tagID}");
            if($dstatus==0){
            	$siteList = json_decode($this->jsonSites, true);
            	if(CHARSET == 'gbk')
					$sites = array_utf8_to_gbk($siteList);
				else
					$sites = $siteList;
            	foreach ($sites['ct'][$navID]['ss'] as $key=>&$site){
            			if($siteID == $site['sd']){
            				$site = null;
            				unset($sites['ct'][$navID]['ss'][$key]);
		                	break;
            			}
            	}
            	$this->checkDefaultSite($navID, $sites, true);
            }
        	$sql = "DELETE FROM ".DBPREFIX."tag_site_url WHERE siteID = '$siteID' AND userID = '$tagID'";
        	$result = $this->objC->RunQuery($sql);
        	if (!$result) {
                $info = array('result'=>'error', 'msg'=>'删除站点失败,请稍候再试!');
                echo json_encode(array_gbk_to_utf8($info));
                exit;
        	}else{
        		$newdata = serialize($this->getAllData());
            	$childpath = FileCache::getDir($tagID);
            	$newcache = new FileCache(CACHE_PATH.$childpath.'/');
            	if(CACHE_USE)
            	$newcache->setCache(CACHE_PATH.$childpath.'/',$tagID.'.data',$newdata);
            	//$this->modifyStatus($tagID);
        	}
        	echo json_encode('');
        }else {
            $info = array('result'=>'error', 'msg'=>'对不起,链接失效,请重新登录!');
            echo json_encode(array_gbk_to_utf8($info));
            exit;
        }
    }

    public function modifyAction()
    {
        $tagID = GetCUserID();
        $navID = intval($_REQUEST['tagID']);
        $siteID = intval($_REQUEST['siteID']);
        $siteName = addslashes(stripslashes($_REQUEST['siteName']));
        $siteUrl = addslashes(stripslashes($_REQUEST['siteUrl']));
		if(CHARSET == 'gbk'){
        $siteName = iconv('utf-8', 'gbk', $siteName);
        $siteUrl = iconv('utf-8', 'gbk', $siteUrl);
		}
        $siteUrl  = str_replace('http://', '', $siteUrl);
        $siteUrl  = preg_replace("/\/$/", '', $siteUrl);

        if ($tagID && $navID)
        {
            // 添加默认站点
            $dstatus = $this->objC->GetOne("SELECT dstatus FROM ".DBPREFIX."members WHERE userID={$tagID}");
            if($dstatus==0){
            	$siteList = json_decode($this->jsonSites, true);
            	if(CHARSET == 'gbk')
					$sites = array_utf8_to_gbk($siteList);
				else
					$sites = $siteList;
            	foreach ($sites['ct'][$navID]['ss'] as &$site){
            			if($siteID == $site['sd']){
		                    $site['se'] = $siteName;
		                    $site['sl'] = $siteUrl;
		                	break;            				
            			}
            	}
            	$this->checkDefaultSite($navID, $sites, true);
            }

            $sql = "SELECT * FROM ".DBPREFIX."tag_site_url WHERE userID = '$tagID' AND siteID = '$siteID'";
            $result = $this->objC->getRow($sql);
        	if (!$result) {
                $info = array('result'=>'error', 'msg'=>'对不起，没有找到需要修改的信息!');
                echo json_encode(array_gbk_to_utf8($info));
                exit;
        	}

            $sql = "SELECT * FROM ".DBPREFIX."tag_site_url WHERE userID = '$tagID' AND siteName = '$siteName' and navID = '$navID' AND siteID != '$siteID'";
            $result = $this->objC->getRow($sql);
        	if ($result) {
                $info = array('result'=>'error', 'msg'=>'对不起，该分页下已存在此站点名称!');
                echo json_encode(array_gbk_to_utf8($info));
                exit;
        	}

        	$sql = "UPDATE ".DBPREFIX."tag_site_url SET siteName = '$siteName', siteUrl = '$siteUrl', usedate = '".time()."' WHERE siteID = '$siteID' AND userID = '$tagID'";
        	$result = $this->objC->RunQuery($sql);
        	if (!$result) {
                $info = array('result'=>'error', 'msg'=>'修改站点失败,请稍候再试!');
                echo json_encode(array_gbk_to_utf8($info));
                exit;
        	}else{
        		$newdata = serialize($this->getAllData());
            	$childpath = FileCache::getDir($tagID);
            	$newcache = new FileCache(CACHE_PATH.$childpath.'/');
            	if(CACHE_USE)
            	$newcache->setCache(CACHE_PATH.$childpath.'/',$tagID.'.data',$newdata);
            	//$this->modifyStatus($tagID);
        	}
        	echo json_encode('');
        }else {
            $info = array('result'=>'error', 'msg'=>'对不起,链接失效,请重新登录!');
            echo json_encode(array_gbk_to_utf8($info));
            exit;
        }
    }

    public function endsaveAction()
    {
    	$userID = GetCUserID();
    	if($userID){
			$siteIDArr = array();
	    	$sarr = $_REQUEST['sarr'];//[0] = 1:11931,11933,11932,11934,11930,11929,11927,11928,11912,11911,11910,11909,11908,
		    if(!empty($sarr))
	    		$sarr = explode(";", $sarr);//[1] = 2:11917,11916,11915,11914,11913,
			foreach ($sarr as $k=>$s){
				if(!empty($s)){
					$sid = explode(":", $s);
					$sid[1] = substr($sid[1],0,-1);
					$siteIDArr[$k]=$sid[1];//11917,11916,11915,11914,11913
					$navIDArr[$k]=$sid[0];//2
				}
			}
	    	// 添加默认站点
	    	$dstatus = $this->objC->GetOne("SELECT dstatus FROM ".DBPREFIX."members WHERE userID={$userID}");
	        $i = 1;
	        if($dstatus==0){
	        	foreach ($navIDArr as $key=>$navID){
		        	$sql = 'insert into '.DBPREFIX.'tag_site_nav(`userID`,`navName`,`navSort`,`navImg`) SELECT '.$userID.',`stpName`,'.$i.',`stpImg` FROM `defaultsitetype` where `stpID`= '.$navID;
	        		$this->objC->RunQuery($sql);
	        		$navID = $this->objC->GetInsertId();
	        		if(!empty($siteIDArr[$key]))
	        			$siteID = explode(",", $siteIDArr[$key]);
		    		if(!empty($siteID)){
		        		$j=1;
			        	foreach ($siteID as $id){
			        		$sql = 'insert into '.DBPREFIX.'tag_site_url(siteName,siteUrl,userID,navID,siteSort) select siteName,siteUrl,'.$userID.','.$navID.','.$j.' FROM `defaultsite` where siteID ='.$id;
			        		$this->objC->RunQuery($sql);
			        		$j++;
			        	}
		    		}
		        	$i++;
	        	}
	        }else {
	        	foreach ($navIDArr as $key=>$navID){
	         		$sql = "update ".DBPREFIX."tag_site_nav set navSort = $i where `navID` = ".$navID;
	        		$this->objC->RunQuery($sql);
	        		if(!empty($siteIDArr[$key]))
		    			$siteID = explode(",", $siteIDArr[$key]);
		    		if(!empty($siteID)){
			    		$j = 1;
			    		foreach ($siteID as $id){
				    		$sql = "UPDATE `".DBPREFIX."tag_site_url` SET `siteSort` = $j, `navID` = $navID WHERE `siteID` =".$id;
				    		$this->objC->RunQuery($sql);
				    		$j++;
			    		}
		    		}
			    	$i++;
	        	}
	        }
	    	if($this->objC->GetAffectedRows() < 0){
	            $info = array('result'=>'error', 'msg'=>'保存失败!');
	            echo json_encode(array_gbk_to_utf8($info));
	            exit;
	    	}else{
	            $this->modifyStatus($userID);
	        	$newdata = serialize($this->getAllData());
	            $childpath = FileCache::getDir($userID);
	            $newcache = new FileCache(CACHE_PATH.$childpath.'/');
	            if(CACHE_USE)
	            $newcache->setCache(CACHE_PATH.$childpath.'/',$userID.'.data',$newdata);
	            $info = array('result'=>'ok', 'msg'=>'保存成功');
	            echo json_encode(array_gbk_to_utf8($info));
	            exit;
	    	}
    	}else {
	            $info = array('result'=>'error', 'msg'=>'链接失效，请重新登录!');
	            echo json_encode(array_gbk_to_utf8($info));
	            exit;
    	}
    }

    public function checkDefaultSite($navID, $sites, $exit = false)
    {
		$userID = GetCUserID();
        if (!empty($userID)) {
        	$this->modifyStatus($userID);
        	$tagID = $this->runInsertSite($navID,$userID,$sites);
        	$this->reload = true;
            if ($exit) {
                echo json_encode(array('result'=>'reload'));
                exit;
            }
       		return $tagID;
        }
        return false;
    }

    public function runInsertSite($navID,$userID,$sites)
    {
		$nid = $navID;
    	if(isset($sites['ct']) && is_array($sites['ct'])){
    		foreach ($sites['ct'] as $site){
    			$i = 1;
    			$values = array();
    			$navName = $site['te'];
    			$navImg = $site['tg'];
    			$navSort = $site['tt'];
    			$stpid = $site['td'];
    			$sql = "INSERT INTO `".DBPREFIX."tag_site_nav` (`navID` ,`userID` ,`navName`,navImg,navSort)VALUES (NULL , '{$userID}', '".$navName."','".$navImg."','{$navSort}');";
    			$this->objC->RunQuery($sql);
    			$navID = $this->objC->GetInsertId();
    			if($nid == $stpid){
    				$tagID = $navID;
    			}
    			if(!empty($site['ss'])){
	    			foreach ($site['ss'] as $s){
	    				$values[] = "(NULL, '{$s['se']}', '{$s['sl']}', '$userID', '$navID',".($i++).",".time().")";
	    			}
	    			$sql  = "INSERT INTO ".DBPREFIX."tag_site_url (siteID, siteName, siteUrl, userID,navID,siteSort,usedate) VALUES ";
	            	$sql .= implode(',', $values);
	            	$this->objC->RunQuery($sql);
    			}
    		}
    		return $tagID;
    	}
    	return false;
    }

    public function getAllData(){
    	// 代码参考indexcontroller
    	$data = '';
    	$userID = GetCUserID();
    	$result = array();
        if($userID){
            $sql = "select * from ".DBPREFIX."tag_site_nav where userID = $userID order BY navSort ASC";
            $navArr = $this->objC->GetAll($sql);
            if(!empty($navArr)){
	            foreach ($navArr as $k=>$nav){
	           		$ss = array();
	            	$navID = $nav['navID'];
	            	$navName = $nav['navName'];
	            	$navImg = $nav['navImg'];
	            	$result[$k]['td'] = $navID;
	            	$result[$k]['te'] = $navName;
	            	$result[$k]['tg'] = $navImg;
	            	$sql = "select * from ".DBPREFIX."tag_site_url where navID = $navID order by siteSort ASC";
	            	$siteList = $this->objC->GetAll($sql);
	            	if(!empty($siteList)){
	            	    foreach ($siteList as $m=>$list){
				            $list['siteName'] = htmlspecialchars_decode(stripslashes($list['siteName']));
				            $list['siteUrl'] = str_replace('http://', '', $list['siteUrl']);
				            $ss[$m] = array('sd'=>$list['siteID'], 'se'=>$list['siteName'], 'sl'=>$list['siteUrl']);    				
	    				}
	            	}
	            	$result[$k]['ss'] = $ss;
	            }
            }
            if (empty($result)){
            	$data = $this->getSiteSetting();
            }else{
            	$data = $result;
            }
        }else {
            $data = $this->getSiteSetting();
        }
        return $data;
    }
    public function getSiteSetting()
    {
        // 自定义导航
            $sql = "select * from ".DBPREFIX."defaultsitetype order BY stpSort ASC";
            $navArr = $this->objC->GetAll($sql);
            $result = array();
            if(!empty($navArr)){
	            foreach ($navArr as $k=>$nav){
	            	$ss = array();
	            	$navID = $nav['stpID'];
	            	$navName = $nav['stpName'];
					$navImg = $nav['stpImg'];
	            	$result[$k]['td'] = $navID;
	            	$result[$k]['te'] = $navName;
	            	$result[$k]['tg'] = $navImg;
	            	$sql = "select * from ".DBPREFIX."defaultsite where stpID = $navID order by siteSort ASC";
	            	$siteList = $this->objC->GetAll($sql);
	            	if(!empty($siteList)){
	            	    foreach ($siteList as $m=>$list){
				            $list['siteName'] = htmlspecialchars_decode(stripslashes($list['siteName']));
				            $list['siteUrl'] = str_replace('http://', '', $list['siteUrl']);
				            $ss[$m] = array('sd'=>$list['siteID'], 'se'=>$list['siteName'], 'sl'=>$list['siteUrl']);    				
	    				}
	            	}
	            	$result[$k]['ss'] = $ss;
	            }
            }
        	return $result;
    }
    public function reindexAction(){
    	$newdata = serialize($this->getSiteSetting());
      	$newcache = new FileCache(CACHE_PATH.'data/');
      	$newcache->setCache(CACHE_PATH.'data/','0.data',$newdata);
    }

    public function modifyStatus($userID){
    	$this->objC->RunQuery("UPDATE ".DBPREFIX."members SET dstatus=1 WHERE userID={$userID}");
    }
}