<?php
/**
 * 数据恢复
 */
require("header.inc.php");
ChkAdminLogin();
require_once CONTROLLER_PATH . 'abstractController.php';
if($objC->queryNum!=NULL){
	$queryNum = $objC->queryNum;
}
$version = VERSION_5W;
$objS -> assign("version",$version);
$objS -> assign("queryNum",$queryNum);
$objS -> assign("s",substr((GetMTime()-$s)/100,0,8));
class restoreController extends abstractController
{
    private $base_url = 'restoreController.php?';

    /**
     * 显示备份文件
     *
     * @return void
     */
    public function indexAction()
    {
        try
        {
            $this->objS->assign( 'npa', array('数据管理', '数据库还原') );
            $list = array();
            $handle = opendir(PATH_DATA . '/backup');
            while($file = readdir($handle))
            {
                if(preg_match('#^bak_#i', $file) && preg_match('#\.sql$#i', $file))
                {
                    $strlen = 20;
                    $fp = fopen(PATH_DATA . "/backup/$file", 'rb');
                    $bakinfo = fread($fp, 200);
                    fclose($fp);
                    $detail = explode("\n", $bakinfo);

                    $bk = array();
                    $bk['name'] = $file;
                    $bk['version'] = substr($detail[2], 10);
                    $bk['time'] = substr($detail[3], 8);
                    $bk['pre'] = substr($file, 0, strrpos($file, '.'));
                    $bk['num'] = substr($file, strrpos($file, '.') + 1, strrpos($file, '.') - 1 - strrpos($file, '.'));
                    $list[$bk['time']] = $bk;
                }
            }
			arsort($list);
            $this->objS->assign('list', $list);
            $this->objS->display( 'admin/restore.tpl' );
        }
        catch (Exception $e)
        {
            echo   $e->getMessage();
        }
    }


	/**
     * 恢复
     *
     */
    public function restoreAction()
    {
        try
        {
            function_exists('set_time_limit') && set_time_limit(600);

            $count = (empty($_GET['count'])) ? 0 : (int)$_GET['count'];
//            $step = (empty($_GET['step'])) ? 0 : (int)$_GET['step'];
            $pre = (empty($_GET['pre'])) ? '' : $_GET['pre'];
            if (empty($pre))
            {
                throw new Exception('操作失败', 10);
            }
            $start = time();
            if(!$count)
            {
                $count = 0;
                $handle = opendir(PATH_DATA . '/backup');
                while($file = readdir($handle))
                {
                    if(preg_match("#^$pre#i", $file) && preg_match("#\.sql$#i", $file))
                    {
                        $count++;
                    }
                }
            }
            self::restore_data(PATH_DATA . "/backup/{$pre}.sql");
				AlertMsg("恢复成功!",-1);
        }
        catch (Exception $e)
        {
            echo   $e->getMessage();
        }
    }


    /**
     * 确认恢复
     *
     * @return void
     */
    public function confrim_restore()
    {
        try
        {

            $this->objS->dispaly('#');
        }
        catch (Exception $e)
        {
            echo   $e->getMessage();
        }
    }


    /**
     * 删除备份文件
     *
     * @return void
     */
    public function delete_backup_fileAction()
    {
        try
        {
            $file = (empty($_POST['file'])) ? '' : $_POST['file'];
            if (empty($file))
            {
                throw new Exception('请选择需要删除的备份文件', 10);
            }

            foreach ($file as $key => $value)
            {
                if(preg_match('/\.sql$/', $value))
                {
//                    mod_file::rm(PATH_DATA . "/backup/{$value}");
					unlink(PATH_DATA . "/backup/{$value}");
                }
            }
            AlertMsg("删除成功!",-1);
            //mod_login::message("删除成功!");

        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }


    /**
     * 恢复文件
     *
     * @param string $filename
     * @return boolean
     */
    private function restore_data($filename)
    {
        if (!file_exists($filename))
        {
            throw new Exception('文件不存在', 10);
        }

        $charset = CHARSET;
        $sql = file($filename);
        $query = '';
        $num = 0;
        foreach($sql as $key => $value)
        {
            $value = trim($value);
            if(empty($value) || $value[0] == '#')
            {
                continue;
            }
            if(preg_match('#\;$#i', $value))
            {
                $query .= $value;
                if(preg_match("#^CREATE#i", $query))
                {
                    $extra = substr(strrchr($query, ')'), 1);
                    $tabtype = substr(strchr($extra, '='), 1);
                    $tabtype = substr($tabtype, 0, strpos($tabtype, strpos($tabtype, ' ') ? ' ' : ';'));
                    $query = str_replace($extra, ' ', $query);
                    if (mysql_get_server_info() > '4.1')
                    {
                        $extra = $charset ? "ENGINE={$tabtype} DEFAULT CHARSET={$charset} COLLATE=utf8_general_ci;" : "ENGINE={$tabtype};";
                    }
                    else
                    {
                        $extra = "TYPE={$tabtype};";
                    }
                    $query .= $extra;
                }
                elseif (preg_match("#^INSERT#i", $query))
                {
                    $query = 'REPLACE ' . substr($query, 6);
                }
                $this->objC->RunQuery($query);
                $query = '';
            }
            else
            {
                $query .= $value;
            }
        }
    }

    function truncateAction(){
    	if(isset($_POST['sub'])){
			$tables = $_POST['tables'];
			foreach($tables as $table){
				$sql = "TRUNCATE TABLE `".DBPREFIX."$table`";
				$this->objC->RunQuery($sql);
			}
			if($this->objC -> GetAffectedRows() < 0){
				AlertMsg('站点数据清除失败！',"-1");
			}else{
				AlertMsg('站点数据清除成功！',"-1");
			}
    	}
    	$this->objS->display('admin/truncate.tpl');
    }
}

$action     = isset($_GET['a']) ? $_GET['a'] : 'index';
$classname  = "restoreController";
$controllerObj = new $classname;
$actionName = $action.'Action';
if (method_exists($controllerObj, $actionName))
	$controllerObj->$actionName();
else
	die('链接错误');
?>