<?php
session_start();
require("header.inc.php");
require_once CONTROLLER_PATH . 'abstractController.php';
class apply extends abstractController
{
    public function indexAction()
    {
		$this->objS->assign('footer_path', 'theme/'.THEME_PATH.'footer.tpl');
        $this->objS->display('theme/'.THEME_PATH.'apply.tpl');
    }

    public function addAction()
    {
        $name = addslashes(stripslashes($_POST['name']));
        $url = addslashes(stripslashes($_POST['url']));
        $contact = addslashes(stripslashes($_POST['contact']));
        $alexaRank = intval($_POST['alexaRank']);
        $typeID = intval($_POST['typeID']);
        $buildDate = addslashes($_POST['buildDate']);
        $addFriendLinkFlag = intval($_POST['addFriendLinkFlag']);
		$safeCode = strtolower($_POST['tbSafeCode']);
		$checkCode = strtolower($_SESSION['sSafeCode']);
		if($safeCode != $checkCode || $safeCode==''){
			AlertMsg('验证码错误!',-1);
            return false;
		}
        if ($name == '') {
        	AlertMsg('请输入站点名称!',-1);
            return false;
        }

        if ($url == '') {
        	AlertMsg('请输入站点链接',-1);
            return false;
        }

        if ($contact == '') {
        	AlertMsg('请输入联系方式',-1);
            return false;
        }


/**        if ($alexaRank <= 0 || $alexaRank > 200000) {
        	AlertMsg('对不起，alexa 排名必须在20万以内!',-1);
            return false;
        }
*/
        $time = time();
        $sql = "INSERT INTO ".DBPREFIX."apply_site (siteID, cDate, siteName, siteUrl, stpID, alexa, contact, buildDate) VALUES (NULL, '$time', '$name', '$url', '$typeID', '$alexaRank', '$contact', '$buildDate')";
        $result = $this->objC->RunQuery($sql);
        if ($result) {
        	AlertMsg('您的申请提交成功!','apply.php?c=apply&a=ok');
        }
        else {
            AlertMsg('对不起,申请提交失败, 请稍候再试!','-1');
        }
    }

    public function okAction(){
    	$this->objS->assign('footer_path', 'theme/'.THEME_PATH.'footer.tpl');
    	$this->objS->display('theme/'.THEME_PATH.'applyok.tpl');
    }

    public function xiufuAction(){
    	$this->objS->assign('footer_path', 'theme/'.THEME_PATH.'footer.tpl');
    	$content = $this->objS->fetch('xiufu.tpl');
    	file_put_contents(ROOT.'xiufu.htm',$content);
    }

    public function checkUserLoginAction()
    {
        if (isset($_SESSION['sUser']['userName']) && $_SESSION['sUser']['userName'] != '') {
        	echo json_encode(array('result'=>'yes', 'userName'=>$_SESSION['sUser']['userName']));
        	exit;
        }
        else {
            echo json_encode(array('result'=>'no', 'userName'=>''));
            exit;
        }
    }


    public function searchAction()
    {
        if (isset($_REQUEST['name']) && $_REQUEST['name'] != '') {
            $name = urldecode($_REQUEST['name']);
            $words = addslashes(stripslashes(htmlspecialchars($name)));
            if (is_utf8($words)) {
            	$words = iconv('utf-8', 'gbk', $words);
            }
            $sql = "SELECT siteName, siteUrl FROM ".DBPREFIX."site WHERE siteStatus = 1 AND siteName LIKE '%$words%' OR siteUrl LIKE '%$words%'";
            $searchList = $this->objC->getAll($sql);
            echo json_encode(array_gbk_to_utf8($searchList));
            exit;
        }
    }
}
$action     = isset($_GET['a']) ? $_GET['a'] : 'index';
$classname  = "apply";
$controllerObj = new $classname;
$actionName = $action.'Action';
if (method_exists($controllerObj, $actionName))
	$controllerObj->$actionName();
else
	die('链接错误');
?>