<?php
include('../../header.inc.php');
//$username = '';
$controller = isset($_GET['c']) ? $_GET['c'] : 'index';
$action     = isset($_GET['a']) ? $_GET['a'] : 'index';
//if(empty($_SESSION['manager'])){
//	if(empty($_POST)){
//		$objS->display('manager/login.tpl');
//		exit;
//	}
//}
//$params['username']   = $username;
$params['controller'] = $controller;
$params['action']     = $action;
require_once CONTROLLER_PATH . 'tuan/abstractController.php';
$classname  = $controller.'Controller';
$actionName = $action.'Action';
$filePath   = CONTROLLER_PATH .'tuan/manager/'. $classname.'.php';

if (file_exists($filePath)){

	include_once $filePath;
	if (class_exists($classname, false)){

		$controllerObj = new $classname;
		if (method_exists($controllerObj, $actionName)){
		    $controllerObj->$actionName();
			$objC->Close();
		}else{
		    exit('method not exists!');
		}
	}else{
	    exit('controller class not exists!');
	}
}else{
    exit('file not exists!');
}
