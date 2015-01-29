<?php
class manageController extends abstractController
{
    public $jsonSites = '';

    public function __construct()
    {
        parent::__construct();
        $this->setJsonSites();
    }

    public function setJsonSites()
    {
        $sql = "SELECT siteName, siteUrl FROM ".DBPREFIX."defaultsite ORDER BY siteSort ASC";
        $list = $this->objC->getAll($sql);
        if ($list) {
            $arr = array();
            foreach ($list as $key=>$site) {
            	$site['siteName'] = htmlspecialchars_decode(stripslashes($site['siteName']));
                $arr[] = array('sd'=>$key+1, 'se'=>$site['siteName'], 'sl'=>str_replace('http://', '', $site['siteUrl']));
            }
        }
        $arrList = array('result'=>'list', 'ct'=>array(array('td'=>'1', 'te'=>'default', 'ss'=>$arr)));
        $this->jsonSites = json_encode(array_gbk_to_utf8($arrList));
    }

    public function indexAction()
    {
        if (empty($_COOKIE['cUser']['userID'])) {
        	$url = 'http://'.SITE_DOMAIN.'/i/?a=login';
        	header('location:'.$url);exit;
        	//AlertMsg('请先登陆吧!','http://'.SITE_DOMAIN.'/i/?a=login');
        }
//        if (!isset($_COOKIE['tag'])){
//            setcookie('tag', $this->jsonSites, COOK_LIFE, '/', WEB_HOST);
//        }
        $domain = GetCUserDomain();
        $this->objS->assign('domain', $domain);
        // 查询用户个性设置
        $userID = GetCUserID();
        $this->objS->assign('userID', $userID);
        $sql = 'SELECT title, search FROM '.DBPREFIX.'member_setting WHERE userID = "'.$userID.'"';
        $row = $this->objC->getRow($sql);
			$title = isset($row['title']) ? $row['title'] : '';
            $this->objS->assign('title', $title);
			$search = isset($row['search']) ? $row['search'] : '';
        if ($search == 4) {
        	$this->objS->assign('sogou', true);
        }
        if ($search == 5) {
        	$this->objS->assign('soso', true);
        }
        if ($search == 1) {
        	$this->objS->assign('taobao', true);
        }
        if ($search == 2) {
        	$this->objS->assign('baidu', true);
        }
        if ($search == 3) {
        	$this->objS->assign('google', true);
        }    
        if ($search == 6) {
        	$this->objS->assign('youdao', true);
        }
        if (empty($search)) {
        	$this->objS->assign('soso', true);
        }

		$sql = "select setdomain from ".DBPREFIX."members WHERE userID = '".$userID."'";
		$setdomain = $this->objC->GetOne($sql);
		$this->objS->assign('setdomain',$setdomain);

		$sql = 'SELECT usersite FROM '.DBPREFIX.'site_setting';
		$sets = $this->objC->GetOne($sql);
		$site_domain = substr(SITE_DOMAIN,0,4);
		if($site_domain == 'www.'){
			$site_domain = substr(SITE_DOMAIN,4);
		}else{
			$site_domain = SITE_DOMAIN;
		}
		$this->objS->assign('site_domain', $site_domain);
		$this->objS->assign('sets', $sets);

		$sql = "select `domain` from ".DBPREFIX."members WHERE userID = '".$userID."'";
		$userdomain = $this->objC->GetOne($sql);
		$this->objS->assign('userdomain',$userdomain);
		$sql = "select `username` from ".DBPREFIX."members WHERE userID = '".$userID."'";
		$username = $this->objC->GetOne($sql);
		$this->objS->assign('username',$username);

		$sql = "select * from ".DBPREFIX."tag_nav_img";
		$tagImg = $this->objC->GetAll($sql);
		$this->objS->assign('tagImg',$tagImg);
        //生成静态页面
        $this->objS->display('i/manage.tpl');
    }   
	public function setdomainAction()
	{
		if($_POST['ssubmit'] && !empty($_COOKIE['cUser']['userID'])){
			$suserID = GetCUserID();
			$sdomain = $_POST['sdomain'];
			$sdomain = strtolower($sdomain);
		if(!preg_match("/^[0-9a-zA-Z]{3,}$/", $sdomain)){
        	AlertMsg("对不起域名只能是字母和数字组合,且长度在三个字符以上！",-1);
        }
			$sql = "UPDATE `".DBPREFIX."members` SET `domain` = '".$sdomain."',`setdomain` = '1' WHERE `userID` = '".$suserID."';";
            if ($this->objC->RunQuery($sql)) {
			    $sql = "select userPwd from `".DBPREFIX."members` WHERE `userID` = '".$suserID."';";
			    $suserPwd = $this->objC->GetOne($sql);
			    setcookie("cUser[domain]",$sdomain."\t".MDCUserPwd($suserPwd),time()+60*60*24*365, '/', WEB_HOST);
			    header('location:http://'.SITE_DOMAIN.'/i/?c=manage');exit;
            	//AlertMsg('设置成功!','?c=manage');
            }
            else {
            	AlertMsg('对不起，设置失败，请稍候再试!','?c=manage');
            }
		}
	}
	function checksetdomainAction()
	{
		$userID = GetCUserID();
		if($userID){		
			$setdomain = $_REQUEST['sd'];
			$sql = "select count(*) from `".DBPREFIX."members` where `domain` = '".$setdomain."'";
			$ct = $this->objC->GetOne($sql);
	
	        $darkNameContent = file_get_contents(ROOT . 'darkName.txt');
	        $arrDarkNames = preg_split("/\n/", $darkNameContent);
	
			if($ct || in_array($setdomain, $arrDarkNames)){
				$info = array('result'=>'error');
		        echo json_encode(array_gbk_to_utf8($info));
			}else{
				$info = array('result'=>'ok');
		        echo json_encode(array_gbk_to_utf8($info));
			}
		}else{
				$info = array('result'=>'error');
		        echo json_encode(array_gbk_to_utf8($info));			
		}
	}
	public function ajaxchangepwdAction(){
		$userID = GetCUserID();
		if($userID){
			$oldUserPwd = $_REQUEST['oldpwd'];
			if($oldUserPwd){
				$sql = "SELECT userPwd  FROM `members` WHERE `userID` = ".$userID;
				$opwd = $this->objC->GetOne($sql);
				if(md5($oldUserPwd) != $opwd){
					$info = array('result'=>'error', 'msg'=>'旧密码输入错误，请重新输入!');
	                echo json_encode(array_gbk_to_utf8($info));
	                exit;
				}else {
					$info = array('result'=>'ok');
	                echo json_encode(array_gbk_to_utf8($info));
	                exit;
				}
			}			
		}else{
			$info = array('result'=>'error', 'msg'=>'链接失效，请重新登录!');
	        echo json_encode(array_gbk_to_utf8($info));
	        exit;
		}		
	}
	public function changepwdAction()
	{
		$userID = GetCUserID();
		if($userID){
			$oldUserPwd = $_POST['oldpass'];
			$newUserPwd = $_POST['pass'];
			if($oldUserPwd && $newUserPwd){
				$sql = "SELECT userPwd FROM `".DBPREFIX."members` WHERE `userID` = ".$userID;
				$opwd = $this->objC->GetOne($sql);
				if(md5($oldUserPwd) == $opwd){
					$sql = "update `".DBPREFIX."members` set userPwd = '".md5($newUserPwd)."' WHERE `userID` = ".$userID;
					$r = $this->objC->RunQuery($sql);
					if($r){
						setcookie("cUser[userID]",$userID."\t".MDCUserPwd(md5($oldUserPwd)),time()+60*60*24*365, '/', WEB_HOST);
        				setcookie("cUser[domain]",$userID."\t".MDCUserPwd(md5($oldUserPwd)),time()+60*60*24*365, '/', WEB_HOST);
						$url = 'http://'.SITE_DOMAIN.'/i/index.php?c=manage';
        				header('location:'.$url);exit;
					}else {
						AlertMsg('操作失败!',-1);
					}
				}else{
					AlertMsg('旧密码输入错误!',-1);
				}
			}			
		}else{
			AlertMsg('请先登陆吧!','http://'.SITE_DOMAIN.'/i/index.php?a=login');
		}
	}
    public function changeAction()
    {
		$userID = GetCUserID();
        if ($userID) {
            $title = isset($_REQUEST['title']) ? addslashes(stripslashes($_REQUEST['title'])) : '';
            $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '1';
            if ($title) {
                $sql = 'SELECT COUNT(*) FROM '.DBPREFIX.'member_setting WHERE userID = "'.$userID.'"';
            	if ($this->objC->getOne($sql)) {
            		$sql = "UPDATE ".DBPREFIX."member_setting SET title = '$title', search = '$search' WHERE userID = '{$userID}'";
            	}
            	else {
                    $sql = "INSERT INTO ".DBPREFIX."member_setting (userID, title, search) VALUES ('{$userID}', '$title', '$search')";
            	}

            	if ($this->objC->RunQuery($sql)) {
            		$url = 'http://'.SITE_DOMAIN.'/i/?c=manage';
        			header('location:'.$url);exit;
            		//$this->indexAction();
            	    //AlertMsg('设置成功!','?c=manage');
            	}
            	else {
            	    AlertMsg('对不起，设置失败，请稍候再试!','http://'.SITE_DOMAIN.'/i/?c=manage&a=index');
            	}
            }
            else {
                AlertMsg('对不起，请填写首页标题!','?c=manage');
            }
        }
        else {
            AlertMsg('请先登陆吧!','http://'.SITE_DOMAIN.'/i/?a=login');
        }
    }
    public function initCookieAction()
    {
        setcookie('tag', $this->jsonSites, COOK_LIFE, '/', WEB_HOST);
        AlertMsg('','?c=manage');
    }
}