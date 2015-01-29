<?php
ChkAdminLogin();
$sql = "SELECT stpID,stpHtmlName,stpParentID FROM ".DBPREFIX."type_site WHERE stpID = ".$stpID;
//echo $sql."<br>";
$arrTemp = $objC -> GetRow($sql);
$stpID = $arrTemp[stpID];
$stpHtmlName = $arrTemp[stpHtmlName];
$stpParentID = $arrTemp[stpParentID];
if($stpParentID == '0' && $stpHtmlName != ''){
	$openPath = 'http://' . $_SERVER['SERVER_NAME'] . '/index.php?c=channel&h=/' .  $stpHtmlName . '.htm';
	file_get_contents($openPath);
}
//print_r($arrTemp);
while($stpParentID != '0'){
	if($stpHtmlName != ''){						//静态化处理http://5w.com/index.php?c=channel&h=/chaxun.htm
		$openPath = 'http://' . $_SERVER['SERVER_NAME'] . '/index.php?c=channel&h=/' .  $stpHtmlName . '.htm';
		file_get_contents($openPath);
	}
	$sql = "SELECT stpID,stpHtmlName,stpParentID FROM ".DBPREFIX."type_site WHERE stpID = ".$stpParentID;
	$arrCheck = $objC -> GetRow($sql);
	$stpID = $arrCheck[stpID];
	$stpHtmlName = $arrCheck[stpHtmlName];
	$stpParentID = $arrCheck[stpParentID];									
}
	$openPath = 'http://' . $_SERVER['SERVER_NAME'] . '/index.php?c=newindex&h=index';
	file_get_contents($openPath);