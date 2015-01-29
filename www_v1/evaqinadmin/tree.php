<?php
require("header.inc.php");
ChkAdminLogin();
		$sql = "SELECT stpID,stpName,stpParentID FROM ".DBPREFIX."type_site WHERE stpParentID=0 AND stpStatus=1 ORDER BY stpSort ASC";
    $rs = $objC->GetAll($sql);
    foreach($rs as $key => $row){
    	$sub = "SELECT COUNT(*) FROM ".DBPREFIX."type_site WHERE stpParentID=".$row['stpID']." AND stpStatus=1";
    	$subcount = $objC->GetOne($sub);
    	$rs[$key]['child'] = $subcount;
    }
    $objS->assign ( "tree", $rs );
		$objS->display ( "admin/tree.tpl" );

?>