<?php
require("../header.inc.php");
ini_set('display_errors','off');
require_once CONTROLLER_PATH . 'abstractController.php';
class share extends abstractController
{
    public function indexAction()
    {
    	//判断COOKIE
    	$url = addSlash($_REQUEST['url']);
    	$title = addSlash($_REQUEST['title']);
    	$navArr = array();
		if (!empty($_COOKIE['cUser']['userID'])) {
			$userID = GetCUserID();
			$sql = "SELECT userName FROM `".DBPREFIX."members` WHERE `userID` = ".$userID;
			$uname = $this->objC->GetOne($sql);
			$dstatus = $this->objC->GetOne("SELECT dstatus FROM ".DBPREFIX."members WHERE userID=".$userID);
			if($dstatus){
				$sql = "SELECT navID,navName FROM `".DBPREFIX."tag_site_nav` WHERE `userID` = $userID ORDER by navSort ASC";
				$navArr = $this->objC->GetAll($sql);
			}else{
				$sql = "SELECT stpID as navID,stpName as navName FROM `".DBPREFIX."defaultsitetype` ORDER by stpSort ASC";
				$navArr = $this->objC->GetAll($sql);
			}
		}
 		if($_GET['act'] == 'slogin')
        {
	    	$url = $_POST['url'];
	    	$title = $_POST['title'];
        	$userName = $_REQUEST['tbUserName'];
        	$userPwd  = $_REQUEST['tbUserPwd'];
        	$cookie   = $_REQUEST['scookie'];
            if(!preg_match("/^[0-9a-zA-Z]+$/", $userName)){
            	AlertMsg("对不起用户名只能是字母和数字组合！","-1");
            }

        	$sql = "SELECT * FROM `".DBPREFIX."members` WHERE `userName` = '".addSlash($userName)."' AND `userPwd` = '".md5($userPwd)."' AND `from` = '5w'";
        	$arrRow = $this->objC->GetRow($sql);

        	if($arrRow)
        	{
        		if($arrRow['userStatus'] == "0"){
        			AlertMsg('对不起，您的帐号已锁定，请联系客服人员！',"-1");
        		}
        		//设置COOKIE
        		if($cookie == "1"){
        			setcookie("cUser[userID]",$arrRow['userID']."\t".MDCUserPwd($arrRow['userPwd']),COOK_LIFE, '/', WEB_HOST);
        			setcookie("cUser[domain]",$arrRow['domain']."\t".MDCUserPwd($arrRow['userPwd']),COOK_LIFE, '/', WEB_HOST);
        		}else{
        			setcookie("cUser[userID]",$arrRow['userID']."\t".MDCUserPwd($arrRow['userPwd']),NULL, '/', WEB_HOST);
        			setcookie("cUser[domain]",$arrRow['domain']."\t".MDCUserPwd($arrRow['userPwd']),NULL, '/', WEB_HOST);
        		}
				$headerurl = 'http://'.SITE_DOMAIN.'/i/share.php?url='.$url.'&title='.$title;
        		header('location:'.$headerurl);exit;
        	}
        	else {
        		AlertMsg('对不起，登陆失败，请检查您的帐号和密码！',"-1");
        	}
        }
	    //$url = iconv("utf-8","gbk",$url) ? iconv("utf-8","gbk",$url) : $url;
		//$title = iconv("utf-8","gbk",$title) ? iconv("utf-8","gbk",$title) : $title;
		$this->objS->assign('uname',$uname);
		$this->objS->assign('navArr',$navArr);
		$this->objS->assign('url',$url);
		$this->objS->assign('title',$title);
	    $this->objS->display('i/share.tpl');
    }
    public function sregAction(){
    	$url = addSlash($_REQUEST['url']);
    	$title = addSlash($_REQUEST['title']);
    	if($_POST['regsub']){
	        $userMail = isset($_REQUEST['mail']) ? $_REQUEST['mail'] : '';
	        $userName = $_REQUEST['uname'];
	        $userPwd  = $_REQUEST['pass'];     
	        if(!preg_match("/^[0-9a-zA-Z]{3,}$/", $userName)){
	        	AlertMsg("对不起用户名只能是字母和数字组合,且长度在三个字符以上！",-1);
	        }
    		if(empty($userPwd) || empty($userMail)){
				AlertMsg("对不起密码和邮箱不能为空！",-1);
			}
	        $userName = addSlash($userName);
	        $userName = strtolower($userName);
	        $userMail = addSlash($userMail);

	        $sql = "SELECT count(*) as ct FROM ".DBPREFIX."members WHERE userName = '".$userName."'";
	        $ct = $this->objC -> GetOne($sql);
	        $darkNameContent = file_get_contents(ROOT . 'darkName.txt');
	        $arrDarkNames = preg_split("/\n/", $darkNameContent);

	        if($ct || in_array($userName, $arrDarkNames)){
	        	AlertMsg('对不起,该用户名已经被注册，请换一个再试！',"-1");
	        	exit();
	        }

	        $getIP = GetIP();
			$domain = $userName;
	$sql = "INSERT INTO `".DBPREFIX."members` (`userID`, `userMail`, `userName`, `userPwd`, `userLoginTimes`, `userLastIP`, `userStatus`, `userLastDate`, `userRegDate`, `userRegIP`, `from`, `domain`) VALUES (NULL, '".$userMail."', '".$userName."', '".md5($userPwd)."', '1', '".$getIP."', '1', '".time()."', '".time()."', '".$getIP."', '5w', '".$domain."');";
	//		echo $sql;exit;
	        $this->objC -> RunQuery($sql);
	        if($this->objC -> GetAffectedRows() <= 0){
	        	AlertMsg('对不起，注册失败，请稍候再试！',"-1");
	        	exit();
	        }
	        $userID = $this->objC->GetInsertId();
	        //设置COOKIE

	        setcookie("cUser[userID]",$userID."\t".MDCUserPwd(md5($userPwd)), COOK_LIFE, '/', WEB_HOST);
	        setcookie("cUser[domain]",$domain."\t".MDCUserPwd(md5($userPwd)), COOK_LIFE, '/', WEB_HOST);

			$headerurl = 'http://'.SITE_DOMAIN.'/i/share.php?url='.$url.'&title='.$title;
	        header('location:'.$headerurl);exit;
    	}
    	$this->objS->assign('fromshare','1');
		$this->objS->assign('url',$url);
		$this->objS->assign('title',$title);
	    $this->objS->display('i/reg.tpl');
    }
    public function slogoutAction(){
    	$url = addSlash($_REQUEST['url']);
    	$title = addSlash($_REQUEST['title']);
        setcookie("cUser[userID]",'0',null, '/', WEB_HOST);
        setcookie("cUser[domain]",'0',null, '/', WEB_HOST);
        setcookie("cUser","",null, '/', WEB_HOST);
		$headerurl = 'http://'.SITE_DOMAIN.'/i/share.php?url='.$url.'&title='.$title;
	    header('location:'.$headerurl);exit;
    }
    public function addAction()
    {
        $tagID  = GetCUserID();
        $domain = GetCUserDomain();
    	$siteUrl = stripSlash($_POST['url']);
    	$siteName = stripSlash($_POST['title']);
    	$navID = intval($_POST['nav']);
        $siteUrl  = str_replace('http://', '', $siteUrl);
        $siteUrl  = preg_replace("/\/$/", '', $siteUrl);
		if($_POST){
	        if (!empty($tagID))
	        {
	        	$dstatus = $this->objC->GetOne("SELECT dstatus FROM ".DBPREFIX."members WHERE userID={$tagID}");
	        	if($dstatus == 0){
			        $newcache = new FileCache();
					$cachedate = $newcache->getCache(CACHE_PATH.'data/','default.data',0);
					if($cachedate!==false){
		            	$siteList = json_decode(unserialize($cachedate), true);
		            	//$sites = array_utf8_to_gbk($siteList);
		            	$navID = $this->runInsertSite($navID, $tagID, $siteList);
					}else{
		        		$sql = "insert into `".DBPREFIX."tag_site_nav`(`navID`,`userID`,`navName`,navImg,navSort) values (NULL,$tagID,'默认分类','z_0.gif',1)";
			        	$result = $this->objC->RunQuery($sql);
			        	$navID = $this->objC->GetInsertId();
					}
		        	if($navID){
					    $sql = "INSERT INTO ".DBPREFIX."tag_site_url (siteID, siteName, siteUrl, userID, usedate,siteSort,navID) VALUES(NULL, '$siteName', '$siteUrl', $tagID, '".time()."',100,$navID)";
					    $result = $this->objC->RunQuery($sql);
		        	}
	        	}else{
		        	if($navID){
			            $sql = "INSERT INTO ".DBPREFIX."tag_site_url (siteID, siteName, siteUrl, userID, usedate,siteSort,navID) VALUES(NULL, '$siteName', '$siteUrl', $tagID, '".time()."',100,$navID)";
			            $result = $this->objC->RunQuery($sql);		        		
		        	}else{
		        		$sql = "insert into `".DBPREFIX."tag_site_nav`(`navID`,`userID`,`navName`,navImg,navSort) values (NULL,$tagID,'默认分类','z_0.gif',1)";
		        		$result = $this->objC->RunQuery($sql);
		        		if($result){
			        		$navID = $this->objC->GetInsertId();
			        		$sql = "update ".DBPREFIX."tag_site_url set navID = $navID where userID = $tagID";
		        			$this->objC->RunQuery($sql);
				            $sql = "INSERT INTO ".DBPREFIX."tag_site_url (siteID, siteName, siteUrl, userID, usedate,siteSort,navID) VALUES(NULL, '$siteName', '$siteUrl', $tagID, '".time()."',100,$navID)";
				            $result = $this->objC->RunQuery($sql);
		        		}
		        	}
	        	}
	            if (!$result) {
	                echo "<script type=\"text/javascript\">alert(\"对不起,写入站点信息失败,请稍候再试!\");window.close();</script>";
	            }else{
		            //-------------------------------------同步新浪微博、豆瓣广播、人人状态---fengguanxing 2010.12.15
					$text = "#网络收藏夹# 我在btc123自定义导航分享了一个不错的网站：#".$siteName."# http://www.btc123.com/i/?".$domain;
					$text = addslashes($text);
					//$text = iconv('gbk', 'utf-8', $text);
					$sql = "SELECT sina,renren,douban,qq FROM `".DBPREFIX."members` WHERE `userID` = '".$tagID."'";
					$bindarr = $this->objC->GetRow($sql);
					if(!empty($bindarr)){
						$sql = 'insert into '.DBPREFIX.'members_addsite(id,userID,bfrom,content) values';
						$sqls='';
						if($bindarr['renren']){
							$sqls .= "(NULL,'".$tagID."','renren','".$text."'),";
						}
						if($bindarr['sina']){
							$sqls .= "(NULL,'".$tagID."','sina','".$text."'),";
						}
						if($bindarr['douban']){
							$sqls .= "(NULL,'".$tagID."','douban','".$text."'),";
						}
						if($bindarr['qq']){
							$sqls .= "(NULL,'".$tagID."','qq','".$text."'),";
						}
						if(!empty($sqls)){
							$sqls = substr($sqls, 0, -1);
							$sql = $sql.$sqls;
							$this->objC->RunQuery($sql);
						}
					}
					if(CACHE_USE){
						$childpath = FileCache::getDir($tagID);
			            unlink(CACHE_PATH.$childpath.'/'.$tagID.'.data');
					}
					$this->objC->RunQuery("UPDATE ".DBPREFIX."members SET dstatus=1 WHERE userID={$tagID}");
					$this->objS->display('i/share_ok.tpl');
					echo "<script type=\"text/javascript\">window.setTimeout('window.close();', 3000);</script>";
	            }
	        }
	        else {
	            echo "<script type=\"text/javascript\">alert(\"对不起,链接失效,请重新登录!\");window.close();</script>";
	        }
		}
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
}
$action     = isset($_GET['a']) ? $_GET['a'] : 'index';
$classname  = "share";
$controllerObj = new $classname;
$actionName = $action.'Action';
if (method_exists($controllerObj, $actionName))
	$controllerObj->$actionName();
else
	die('链接错误');
?>
