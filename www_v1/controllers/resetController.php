<?php
class resetController extends abstractController
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
                $arr[] = array('sd'=>$key+1, 'se'=>$site['siteName'], 'sl'=>str_replace('http://', '', $site['siteUrl']));
            }
        }
        $arrList = array('result'=>'list', 'ct'=>array(array('td'=>'1', 'te'=>'default', 'ss'=>$arr)));
        $this->jsonSites = json_encode(array_gbk_to_utf8($arrList));
    }

    public function indexAction()
    {
        setcookie('tag', $this->jsonSites, COOK_LIFE, '/');
		$userID = GetCUserID();
        if ($userID)
        {
        	$sql = "delete from `".DBPREFIX."tag_site_nav` where userID = $userID";
        	$this->objC->RunQuery($sql);
        	$sql = "DELETE FROM `".DBPREFIX."tag_site_url` WHERE userID = $userID";
        	$this->objC->RunQuery($sql);
        	$sql = "UPDATE `".DBPREFIX."members` SET `dstatus` = '0' WHERE `userID` = $userID;";
        	$this->objC->RunQuery($sql);
        	                // 删掉缓存数据
            $cachedir = FileCache::getDir($userID);
            @unlink(CACHE_PATH.$cachedir.'/'.$userID.'.data');
        }
        header('location:http://'.SITE_DOMAIN.'/i/index.php?c=manage');exit;
        //AlertMsg('恢复个性导航成功!','-1');
    }
}