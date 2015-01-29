<?php
class regController extends abstractController
{
    public function indexAction()
    {
        $userMail = isset($_REQUEST['mail']) ? $_REQUEST['mail'] : '';
        $userName = $_REQUEST['uname'];
        $userPwd  = $_REQUEST['pass'];
        if(!preg_match("/^[0-9a-zA-Z]{3,}$/", $userName)){
        	AlertMsg("对不起用户名只能是字母和数字组合,且长度在三个字符以上！",-1);
        }

        $userName = addSlash($userName);
        $userName = strtolower($userName);
        $userMail = addSlash($userMail);

        $objC = new Conn();

        $sql = "SELECT count(*) as ct FROM ".DBPREFIX."members WHERE userName = '".$userName."'";
        $ct = $objC -> GetOne($sql);
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
        $objC -> RunQuery($sql);
        if($objC -> GetAffectedRows() <= 0){
        	AlertMsg('对不起，注册失败，请稍候再试！',"-1");
        	exit();
        }
        $userID = $objC->GetInsertId();
		if(is_file(CONTROLLER_PATH.'doudouController.php')){
			require_once CONTROLLER_PATH . 'doudouController.php';
			$ins = new doudouController();
			$ins->doudouRegAction($userID);
		}
        //设置COOKIE

        setcookie("cUser[userID]",$userID."\t".MDCUserPwd(md5($userPwd)), COOK_LIFE, '/');
        setcookie("cUser[domain]",$domain."\t".MDCUserPwd(md5($userPwd)), COOK_LIFE, '/');

		$sql = 'SELECT usersite FROM '.DBPREFIX.'site_setting';
		$usersite = $objC->GetOne($sql);
		if($usersite == 1){
			$url = "http://".SITE_DOMAIN."/i/?$domain";
		}elseif($usersite == 2){
			$url = "http://".SITE_DOMAIN."/i/$domain/";
		}else{
			$site_domain = substr(SITE_DOMAIN,0,4);
			if($site_domain == 'www.'){
				$site_domain = substr(SITE_DOMAIN,4);
			}else{
				$site_domain = SITE_DOMAIN;
			}
			$url = "http://$domain.$site_domain";
		}
        header('location:'.$url);exit;
    }
    // 新增异步请求检测注册用户名 xugang
    public function checkAction()
    {
        $userName = unescape($_REQUEST['uname']);
        if(!preg_match("/^[0-9a-zA-Z]{3,}$/", $userName)){
        	$info = array('result'=>'error1', 'msg'=>'对不起用户名只能是字母和数字组合,且长度在三个字符以上！');
          echo json_encode(array_gbk_to_utf8($info));
          exit;
        }

        $userName = addSlash($userName);

        $objC = new Conn();

        $sql = 'SELECT count(*) as ct FROM '.DBPREFIX.'members WHERE userName = "'.$userName.'"  AND `from` = "5w"';
        $ct = $objC -> GetOne($sql);
		if(empty($ct)){
			$sql = 'SELECT count(*) as ct FROM '.DBPREFIX.'members WHERE `domain` = "'.$userName.'"';
			$ct = $objC -> GetOne($sql);
		}
        $darkNameContent = file_get_contents(ROOT . 'darkName.txt');
        $arrDarkNames = preg_split("/\n/", $darkNameContent);
        if($ct || in_array($userName, $arrDarkNames)){
        	$info = array('result'=>'error2', 'msg'=>'对不起,该用户名已经被注册，请换一个再试！');
	        echo json_encode(array_gbk_to_utf8($info));
	        exit;
        }

        $info = array('result'=>'ok', 'msg'=>"");
        echo json_encode(array_gbk_to_utf8($info));
    }
}