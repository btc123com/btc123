<?php
include('../header.inc.php');
$getKey = array_keys($_GET);
$domain = $getKey[0];

$controller = !empty($_GET['c']) ? $_GET['c'] : 'index';
$action     = !empty($_GET['a']) ? $_GET['a'] : 'index';

$params['domain']   = $domain;
$params['controller'] = $controller;
$params['action']     = $action;

 //cookie 自动登陆 并判断 uri
if (isset($_COOKIE['cUser']) && $_COOKIE['cUser']['userID'] != 0) {
	$userID = GetCUserID();
	$domain = GetCUserDomain();
	$sql = 'SELECT * FROM members WHERE userID = "'.$userID.'"';
	$arrRow = $objC -> GetRow($sql);
	if (MDCUserPwd($arrRow['userPwd']) == GetCUserPwd($_COOKIE['cUser']['userID'])) {
    	if ($params['domain'] != $domain) {
    		$params['controller'] = $controller;
			$params['action']     = $action;
			$params['domain']   = $domain;
    	}
    }
}else if($domain == 'c' || $domain == 'a' || $domain == ''){
	$domain = GetCUserDomain();
	$params['controller'] = $controller;
	$params['action']     = $action;
	$params['domain']   = $domain;
}

require_once CONTROLLER_PATH . 'abstractController.php';
if(is_file(CONTROLLER_PATH.'doudouController.php')){
	require_once CONTROLLER_PATH . 'doudouController.php';
	$ins = new doudouController();
	$ins->enterIAction();
}
$classname  = $controller.'Controller';
$actionName = $action.'Action';

$filePath   = CONTROLLER_PATH . $classname.'.php';
if (file_exists($filePath))
{
	include_once $filePath;

	if (class_exists($classname, false)) {
		$controllerObj = new $classname;
		if (method_exists($controllerObj, $actionName)) {
		    $controllerObj->$actionName();
			$objC->Close();
		}
		else {
		    exit('method not exists!');
		}
	}
	else {
	    exit('controller class not exists!');
	}
}
else {
    exit('file not exists!');
}