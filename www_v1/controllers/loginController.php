<?php
class loginController extends abstractController
{
    public function indexAction()
    {
        if($_GET['act'] == 'login')
        {

        	$userName = $_REQUEST['tbUserName'];
        	$userPwd  = $_REQUEST['tbUserPwd'];
        	$cookie   = $_REQUEST['scookie'];
            if(!preg_match("/^[0-9a-zA-Z]+$/", $userName)){
            	AlertMsg("对不起用户名只能是字母和数字组合！",-1);
            }

        	$sql = "SELECT * FROM `".DBPREFIX."members` WHERE `userName` = '".addSlash($userName)."' AND `userPwd` = '".md5($userPwd)."' AND `from` = '5w'";
        	$arrRow = $this->objC->GetRow($sql);

        	if($arrRow)
        	{
        		if($arrRow['userStatus'] == "0"){
        			AlertMsg('对不起，您的帐号已锁定，请联系客服人员！',"-1");
        		}
        		//设置COOKIE和SESSION
        		if($cookie == "1"){
        			setcookie("cUser[userID]",$arrRow['userID']."\t".MDCUserPwd($arrRow['userPwd']),time()+60*60*24*365, '/');
        			setcookie("cUser[domain]",$arrRow['domain']."\t".MDCUserPwd($arrRow['userPwd']),time()+60*60*24*365, '/');
        		}else{
        			setcookie("cUser[userID]",$arrRow['userID']."\t".MDCUserPwd($arrRow['userPwd']),NULL, '/');
        			setcookie("cUser[domain]",$arrRow['domain']."\t".MDCUserPwd($arrRow['userPwd']),NULL, '/');
        		}
        		$userDomain = $arrRow['domain'];
        		$this->params['domain']=$userDomain;
        		if(is_file(CONTROLLER_PATH.'doudouController.php')){
									require_once CONTROLLER_PATH . 'doudouController.php';
									$ins = new doudouController();
									$ins->enterIAction($arrRow['userID']);
								}

        		//修改最后登陆时间
        		$sql = 'UPDATE '.DBPREFIX.'members SET userLoginTimes=userLoginTimes+1,userLastIP = "'.GetIP().'",userLastDate="'.time().'" WHERE userID = "'.$arrRow['userID'].'"';
        		$this->objC->RunQuery($sql);



        		$url = (isset($_REQUEST['re']) && $_REQUEST['re'] != '') ? $_REQUEST['re'] : "http://".SITE_DOMAIN."/i/?$userDomain";


        		header("location:".$url);
        		exit;
        		//AlertMsg('',$url);
        	}
        	else {
        		AlertMsg('对不起，登陆失败，请检查您的帐号和密码！',"-1");
        	}
        }else if($_GET['act'] == 'ajaxlogin'){
        	$r = 0;
        	$userName = isset($_REQUEST['n']) ? $_REQUEST['n'] : '';
        	$userPwd  = isset($_REQUEST['p']) ? $_REQUEST['p'] : '';
        	$cookie   = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';
            if(!preg_match("/^[0-9a-zA-Z]+$/", $userName)){
            	echo $r;exit;
            }
            if(empty($userPwd)){
            	echo $r;exit;
            }
        	$sql = "SELECT * FROM `".DBPREFIX."members` WHERE `userName` = '".addSlash($userName)."' AND `userPwd` = '".md5($userPwd)."' AND `from` = '5w'";
        	$arrRow = $this->objC->GetRow($sql);

        	if($arrRow)
        	{
        		if($arrRow['userStatus'] == "0"){
        			echo $r;exit;
        		}
        		//设置COOKIE和SESSION
        		if($cookie == "1"){
        			setcookie("cUser[userID]",$arrRow['userID']."\t".MDCUserPwd($arrRow['userPwd']),time()+60*60*24*365, '/', WEB_HOST);
        			setcookie("cUser[domain]",$arrRow['domain']."\t".MDCUserPwd($arrRow['userPwd']),time()+60*60*24*365, '/', WEB_HOST);
        		}else{
        			setcookie("cUser[userID]",$arrRow['userID']."\t".MDCUserPwd($arrRow['userPwd']),NULL, '/', WEB_HOST);
        			setcookie("cUser[domain]",$arrRow['domain']."\t".MDCUserPwd($arrRow['userPwd']),NULL, '/', WEB_HOST);
        		}
        		//修改最后登陆时间
        		$sql = 'UPDATE '.DBPREFIX.'members SET userLoginTimes=userLoginTimes+1,userLastIP = "'.GetIP().'",userLastDate="'.time().'" WHERE userID = "'.$arrRow['userID'].'"';
        		$this->objC->RunQuery($sql);
				$r = 1;echo $r;exit;
        	}else {
        		echo $r;exit;
        	}
        }else if($_GET['act'] == 'logout'){

            $domain = GetCUserDomain();
            if($domain === 0){
            	$url = 'http://'.SITE_DOMAIN.'/';
            }else{
          	$url = 'http://'.SITE_DOMAIN.'/i/?'.$domain;}
            setcookie("cUser[userID]",'0',null, '/');
            setcookie("cUser[domain]",'0',null, '/');
            setcookie("cUser","",null, '/');
            header('location:'.$url);exit;
            //AlertMsg("",$url);
        }else{
			$url = 'http://'.SITE_DOMAIN.'/i/?c=manage';
        	header('location:'.$url);exit;
        }
    }
    public function showLoginAreaAction()
    {
        $re = $_REQUEST['re'];
        $this->objS->assign('reUrl', $re);
        $this->objS->display('i/loginArea.tpl');
    }
}