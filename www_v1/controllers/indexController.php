<?php
class indexController extends abstractController
{
    public function indexAction()
    {
        // 热门站点广告
        $new_adcache = new FileCache();
        $adcacheData = $new_adcache->getCache(CACHE_PATH.'data/','ad1.data',60*60*24);
        if($adcacheData !== false){
			$ad1 = unserialize($adcacheData);
			$this->objS->assign('taobaohotSites', $ad1);
        }else{
        	$sql = "SELECT content FROM ".DBPREFIX."admin_ad WHERE id = 'index04' ORDER BY orders ASC LIMIT 8";
	        $list = $this->objC->getAll($sql);
	        $ad1 = serialize($list);
	        $new_adcache->setCache(CACHE_PATH.'data/','ad1.data',$ad1);
	        $this->objS->assign('taobaohotSites', $list);
        }

        $adcacheData = $new_adcache->getCache(CACHE_PATH.'data/','ad2.data',60*60*24);
        if($adcacheData !== false){
			$ad2 = unserialize($adcacheData);
			$this->objS->assign('zdydhList', $ad2);
        }else{
        	$sql = "SELECT siteName, siteUrl FROM ".DBPREFIX."site_tool WHERE siteStatus = 1 ORDER BY siteSort ASC";
	        $list = $this->objC->getAll($sql);
	        $ad2 = serialize($list);
	        $new_adcache->setCache(CACHE_PATH.'data/','ad2.data',$ad2);
	        $this->objS->assign('zdydhList', $list);
        }

        if ($this->params['domain'] != 'www' && $this->params['domain'] != '')
        {
            $showhelp = 0;
            $domain = addslashes($this->params['domain']);

            $this->objS->assign('domain', $this->params['domain']);
            // 查询用户个性设置
            $sql = 'SELECT ms.title, ms.search FROM '.DBPREFIX.'member_setting AS ms LEFT JOIN '.DBPREFIX.'members AS m ON ms.userID = m.userID WHERE m.domain = "'.$domain.'"';
            $row = $this->objC->getRow($sql);
			$title = isset($row['title']) ? $row['title'] : '';
            $this->objS->assign('title', $title);
			$search = isset($row['search']) ? $row['search'] : '';
	//        $searchArr = explode(',', $row['search']);
	        if ($search == 4) {
	        	$this->objS->assign('sogou', true);
	        }

	        if ($search == 5) {
	        	$this->objS->assign('soso', true);
	        }
	        if ($search == 2) {
	        	$this->objS->assign('baidu', true);
	        }

	        if ($search == 3) {
	        	$this->objS->assign('google', true);
	        }

	        if ($search == 1) {
	        	$this->objS->assign('taobao', true);
	        }
        
	        if ($search == 6) {
	        	$this->objS->assign('youdao', true);
	        }
	        if (empty($search)) {
	        	$this->objS->assign('soso', true);
	        }

            // 查询个性导航设置
            $sql = "select userID from ".DBPREFIX."members where domain='{$domain}'";
            $cache_userID = $this->objC->getOne($sql);
            $childpath = FileCache::getDir($cache_userID);
            $newcache = new FileCache();
            if(CACHE_USE)
            	$cachedate = $newcache->getCache(CACHE_PATH.$childpath.'/',$cache_userID.'.data',CACHE_TIME);
            else
            	$cachedate = false;
	        if (isset($_COOKIE['cUser']['userID']) && $_COOKIE['cUser']['userID'] != '') {
	        	$userID = GetCUserID();
	        	$sql = 'SELECT userId,domain,userLastDate FROM '.DBPREFIX.'members WHERE userID = "'.$userID.'"';
	        	$arrRow = $this->objC -> GetRow($sql);
				$arrRow['domain'] = isset($arrRow['domain']) ? $arrRow['domain'] : '';
	        	$this->objS->assign("cookiedomain",$arrRow['domain']);
	        	if($domain == $arrRow['domain'] && $arrRow['userLastDate']+ 60*60*24 < time()){
	        		$sql = 'UPDATE '.DBPREFIX.'members SET userLoginTimes=userLoginTimes+1,userLastIP = "'.GetIP().'",userLastDate="'.time().'" WHERE userID = "'.$arrRow['userId'].'"';
        			$this->objC->RunQuery($sql);
	        	}
	        }
            if($cachedate!==false){
            	$result = unserialize($cachedate);
            }else{
            	$result = array();
            	if($cache_userID){
		            $sql = "select * from ".DBPREFIX."tag_site_nav where userID = $cache_userID order BY navSort ASC";
		            $navArr = $this->objC->GetAll($sql);
		            if(empty($navArr)){
		            	$sql = "SELECT * FROM `".DBPREFIX."tag_site_url` WHERE `userID`=".$cache_userID;
		            	$siteList = $this->objC->GetAll($sql);
		            	if(!empty($siteList)){
		            		$ss = array();
				            //$result[0]['td'] = '0';
				            $result[0]['te'] = '默认分类';
				            $result[0]['tg'] = 'z_0.gif';
		            		foreach ($siteList as $m=>$list){
						            $list['siteName'] = htmlspecialchars_decode(stripslashes($list['siteName']));
						            $list['siteUrl'] = str_replace('http://', '', $list['siteUrl']);
						            $ss[$m] = array('sd'=>$list['siteID'], 'se'=>$list['siteName'], 'sl'=>$list['siteUrl']);    				
			    			}
		            		$result[0]['ss'] = $ss;
		            	}
		            }else{
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
            	}
	            if(!empty($result)){
		            if(CACHE_USE)
		            $newcache->setCache(CACHE_PATH.$childpath.'/',$cache_userID.'.data',serialize($result));
	            }
          	}
            if (empty($result)) {
            	$showhelp = 1;
            	$this->getSiteSetting();
            }else {
                $this->objS->assign('siteUrlList', $result);
            }
        }else {
        	$showhelp = 1;
            $this->getSiteSetting();
        }
        $this->objS->assign('userID', isset($userID)?$userID:'');
        $this->objS->assign('showhelp', $showhelp);
        $this->objS->display('i/default.tpl');
    }

    public function getSiteSetting()
    {
        // 自定义导航
        $childpath = 'data';
        $newcache = new FileCache();
		$cachedate = $newcache->getCache(CACHE_PATH.$childpath.'/','0.data',0);
        if($cachedate!==false){
        	$result = unserialize($cachedate);
        }else{
                // 自定义导航
            $sql = "select * from ".DBPREFIX."defaultsitetype order BY stpSort ASC";
            $navArr = $this->objC->GetAll($sql);
            $result = array();
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
            $defaultData = serialize($result);
        	$newcache->setCache(CACHE_PATH.$childpath.'/','0.data',$defaultData);
      	}
        $this->objS->assign('siteUrlList', $result);
    }
	public function getIndexAction(){
		$domain = GetCUserDomain();
		if(empty($domain)){
			echo 1;
		}else{
			$cache_userID = $this->objC->getOne("select userID from ".DBPREFIX."members where `domain`='{$domain}'");
	        $childpath = FileCache::getDir($cache_userID);
	        $newcache = new FileCache();
	        if(CACHE_USE)
	        	$cachedate = $newcache->getCache(CACHE_PATH.$childpath.'/',$cache_userID.'.data',CACHE_TIME);
	        else
	        	$cachedate = false;
	        if($cachedate!==false){
            	$result = unserialize($cachedate);
              	echo json_encode(array_gbk_to_utf8($result));
            }else{
		        $childpath = 'data';
				$cachedate = $newcache->getCache(CACHE_PATH.$childpath.'/','0.data',0);
				if($cachedate!==false){
					$result = unserialize($cachedate);
				}else{
				    $sql = "select * from ".DBPREFIX."defaultsitetype order BY stpSort ASC";
		            $navArr = $this->objC->GetAll($sql);
		            $result = array();
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
				echo json_encode(array_gbk_to_utf8($result));
            }
		}
	}
	public function get2345IndexAction(){
		$userID = GetCUserID();
		$ss = array();
		if(empty($userID)){
		    $sql = "select * from ".DBPREFIX."defaultsite order by siteSort ASC";
		    $siteList = $this->objC->GetAll($sql);
			foreach ($siteList as $m=>$list){
				$list['siteName'] = htmlspecialchars_decode(stripslashes($list['siteName']));
				$list['siteUrl'] = str_replace('http://', '', $list['siteUrl']);
				$ss[$m] = array('sd'=>$list['siteID'], 'se'=>$list['siteName'], 'sl'=>$list['siteUrl']);    				
		    }
		}else{
			$sql = "select * from ".DBPREFIX."tag_site_url where userID = $userID order by siteSort ASC";
			$siteList = $this->objC->GetAll($sql);
			if(!empty($siteList)){
				foreach ($siteList as $m=>$list){
					 $list['siteName'] = htmlspecialchars_decode(stripslashes($list['siteName']));
					 $list['siteUrl'] = str_replace('http://', '', $list['siteUrl']);
					 $ss[$m] = array('sd'=>$list['siteID'], 'se'=>$list['siteName'], 'sl'=>$list['siteUrl']);    				
		    	}
			}else{
		        $sql = "select * from ".DBPREFIX."defaultsite order by siteSort ASC";
		        $siteList = $this->objC->GetAll($sql);
				foreach ($siteList as $m=>$list){
					 $list['siteName'] = htmlspecialchars_decode(stripslashes($list['siteName']));
					 $list['siteUrl'] = str_replace('http://', '', $list['siteUrl']);
					 $ss[$m] = array('sd'=>$list['siteID'], 'se'=>$list['siteName'], 'sl'=>$list['siteUrl']);    				
		    	}			
			}
		}
		echo json_encode(array_gbk_to_utf8($ss));
	}
    public function checkUserLoginAction()
    {
        if (isset($_COOKIE['cUser']['domain']) && $_COOKIE['cUser']['domain'] != '') {
        	echo json_encode(array('result'=>'yes', 'domain'=>GetCUserDomain()));
        	exit;
        }
        else {
            echo json_encode(array('result'=>'no', 'domain'=>''));
            exit;
        }
    }
    public function showRegAction()
    {
        $this->objS->display('i/regSuccess.tpl');
    }
    public function loginAction()
    {
    	$domain = GetCUserDomain();
    	if (!empty($domain)) {
        	$url = 'http://'.SITE_DOMAIN.'/i/?'.$domain;
        	header('location:'.$url);exit;
        }
        $this->objS->display('i/login.tpl');
    }
    public function regAction()
    {
        $this->objS->display('i/reg.tpl');
    }
    public function getpwdAction()
    {
		$_GET['u'] = isset($_GET['u']) ? $_GET['u'] : '';
        if($_GET['u']){
        	$this->objS->assign('setpwd', 'setpwd');
        	$this->objS->assign('u', $_GET['u']);
        	$this->objS->assign('t', $_GET['t']);
        	$this->objS->assign('m', $_GET['m']);
        }
        $this->objS->display('i/getpwd.tpl');
    }
}
