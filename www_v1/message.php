<?php
require("header.inc.php");
require_once CONTROLLER_PATH . 'abstractController.php';
class message extends abstractController
{
    public function indexAction()
    {
        $type = array('1'=>'首页', '2'=>'查询首页', '3'=>'导航首页', '5'=>'推荐游戏', '4'=>'其他');
        $this->objS->assign('types', $type);

        $ct = 'SELECT count(*) as ct FROM '.DBPREFIX.'message WHERE reply is not null';
    		$sql = "SELECT distinct mid, ".DBPREFIX."message.type, ".DBPREFIX."message.title, content, contact, createDate, reply, urlfrom, stpName FROM ".DBPREFIX."message LEFT JOIN ".DBPREFIX."type_site ON (".DBPREFIX."message.urlfrom=".DBPREFIX."type_site.stpHtmlName AND ".DBPREFIX."type_site.stpHtmlName!='') WHERE reply is not null ";
    		if(isset($_GET) && isset($_GET['from'])){
    			if(!empty($_GET['from'])){
    				$f = addslashes(stripslashes(htmlspecialchars($_GET['from'])));
    				$this->objS->assign("urlfrom",$f);
    				$ct .= " AND urlfrom='{$f}'";
    				$sql .= " AND urlfrom='{$f}'";
    			}else{
    				$ct .= " AND urlfrom=''";
    				$sql .= " AND urlfrom=''";
    				$this->objS->assign("urlfrom",'');
    			}

    		}
    		$sql .= " ORDER BY mid DESC";
    		if($recordCount = $this->objC->GetOne($ct)) {
	        if($recordCount){
	            $objP = new Pager($recordCount);
	            $arrLimit = $objP->GetLimit();
	            $result = $this->objC->SelectLimit($sql,$arrLimit[1],$arrLimit[0]);
	            while ($arrRow = $this->objC->FetchRow($result)) {
	                $arrRow['typeName'] = $type[$arrRow['type']];
	                $arrMessage[] = $arrRow;
	            }
	            $this->objS->assign("pager",$objP->ShowMain().$objP->ShowNum());
	            $this->objS->assign("arrMessage",$arrMessage);
	        }
	    }
	    
	    $this->objS->assign('footer_path', 'theme/'.THEME_PATH.'footer.tpl');
	    $this->objS->display('theme/'.THEME_PATH.'message.tpl');
    }

    public function addAction()
    {
        $title   = addslashes(stripslashes(htmlspecialchars($_POST['title'])));
        $content = addslashes(stripslashes(htmlspecialchars($_POST['content'])));
        $contact = addslashes(stripslashes(htmlspecialchars($_POST['contact'])));
        $urlfrom = addslashes(stripslashes(htmlspecialchars($_POST['urlfrom'])));

        $type    = intval(htmlspecialchars($_POST['type']));
        $yzm     = htmlspecialchars($_POST['yzm']);
        $re      = $_SERVER['HTTP_REFERER'];

        if ($re == '') {
            $re = 'message.php';
        }

    	if(ChkSafeCode($yzm)==false){
    		AlertMsg('对不起，您输入的验证码错误！',"-1");
    	}

        if (empty($type)) {
        	AlertMsg('对不起，请选择板块！',"-1");
        }

    	if ($title == '') {
    		AlertMsg('对不起，请输入称呼！',"-1");
    	}

    	if ($content == '') {
    		AlertMsg('对不起，请输入留言建议！',"-1");
    	}

    	if ($contact == '') {
    		AlertMsg('对不起，请输入联系方式！',"-1");
    	}
    	$time = time();
    	$sql = "INSERT INTO ".DBPREFIX."message (mid, type, title, content, contact, createDate, urlfrom) VALUES (null, '$type', '$title', '$content', '$contact', '$time', '$urlfrom')";
    	if ($this->objC->RunQuery($sql)) {
    	    AlertMsg('谢谢您的留言，您的留言将在审核后显示!',$re);
    	}
    	else {
    	   AlertMsg('对不起，留言失败,请稍候再试!',$re);
    	}
    }
}

$action     = isset($_GET['a']) ? $_GET['a'] : 'index';
$classname  = "message";
$controllerObj = new $classname;
$actionName = $action.'Action';
if (method_exists($controllerObj, $actionName))
	$controllerObj->$actionName();
else
	die('链接错误');
?>
