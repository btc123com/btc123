<?php
require("header.inc.php");
ChkAdminLogin();
require_once CONTROLLER_PATH . 'abstractController.php';

class siteImportController extends abstractController{
	public function indexAction(){
		$site = $_POST['sites_content'];
		$stpID = (int)$_POST['stpID'];
		$sites = getsitefromhtml($site);
		$return = array();
		if(is_array($sites) && !empty($sites['sites'])){
			foreach($sites['sites'] as $site){
				$name = htmlspecialchars(trim($site['name']));
	      $url = htmlspecialchars(trim($site['url']));
	      $sort = $site['siteSort'];
	      $sql = "INSERT INTO `".DBPREFIX."site` (`siteCreateDate`, `siteName`, `siteUrl`,`stpID`,`siteSort`) VALUES ('".time()."', '".$name."', '".$url."', '".$stpID."', '".$sort."')";
	      $rs = $this->objC->RunQuery($sql);
	      if($rs){
						$sid = $this->objC->GetInsertId();
						$return[]=array('flag'=>'insert','siteID' => $sid,'siteName' => $name,'siteUrl' => $url,'siteStatus' => 1,'siteSort' => $sort);
					}else
						$return[]=array('flag'=>'error');
			}
		}
		krsort($return);
		$data = json_encode(array_gbk_to_utf8($return));
		echo '<script language="javascript">
		var json = '.$data.';
		for(key in json){
				window.parent.editResult(json[key]);
				if(key>20)break;
			}
		window.parent.hideDiv();
		</script>';
	}
}
$ins = new siteImportController();
$ins->indexAction();
