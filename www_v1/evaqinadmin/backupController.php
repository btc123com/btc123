<?php
/**
 * 备份
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
class backupController extends abstractController
{
    /**
     * 分卷大小
     * @var int
     */
    private static $size_limit = 4096;

    /**
     * 文件名前缀
     * @var int
     */
    private static $pre = '';

    /**
     * 开始备份的记录数
     * @var int
     */
    private static $start = 0;
    private static $start_from = 0;
    private static $step = 0;
    private static $table_id = 0;
    private static $stop = 0;
    private static $rows = 0;

    /**
     * URL(用于跳转)
     * @var unknown_type
     */
    private static $base_url = 'backupController.php?';


    /**
     * 显示需要备份的表
     */
    public function indexAction()
    {
        try
        {
            $this->objS->assign( 'npa', array('数据管理', '数据库备份') );
        	$output = array();
            $total_size = 0;
			$sql='SHOW TABLE STATUS from ' . DBNAME;
			$tableArr = $this->objC->getAll($sql);
//			print_r($tableArr);
           if (file_exists(PATH_DATA . '/backup/tableuse.php'))
            {
                require PATH_DATA . '/backup/tableuse.php';
                foreach ($tableArr as $table)
                {
                	if (!in_array($table['Name'], array_keys($table_use)))
                    {
                        continue;
                    }
                    $tmp = array();
                    $tmp['table_name'] = $table['Name'];
					$tmp['table_use'] = $table_use[$table['Name']];

					$tmp['Engine'] = $table['Engine'];
					$tmp['Rows'] = $table['Rows'];
					$tmp['Data_length'] = self::bytes_to_string($table['Data_length']);
					$tmp['Index_length'] = self::bytes_to_string($table['Index_length']);
					$tmp['Data_free'] = $table['Data_free'];

                    $tmp['size'] = self::bytes_to_string($table['Data_length'] + $table['Index_length']);
                    $total_size += $table['Data_length'] + $table['Index_length'];
                    $output[] = $tmp;
                }
                $total_size = self::bytes_to_string($total_size); //数据库大小
                $this->objS->assign('output', $output);
                $this->objS->assign('total_size', $total_size);
            }
           		$this->objS->display( 'admin/backup.tpl' );
        }
        catch (Exception $e)
        {
            echo $e->Message();
        }
    }


    /**
     * 备份
     */
	public function backupAction()
	{
	    if(isset($_POST['backup'])){
	    try
	    {
	        function_exists('set_time_limit') && set_time_limit(600);
	        $s = time();

    		$bak = "#\n# bakfile\n" .
    		       "# Version:" . mysql_get_server_info() . "\n" .
                   "# Time: " .  date('Y-m-d H:i:s') . "\n" .
                   "# Type: \n" .
                   "# 5w: http://www.5w.com\n";

    		$this->objC->RunQuery("SET SQL_QUOTE_SHOW_CREATE = 0");

    		self::$start = (empty($_GET['start'])) ? 0 : (int)$_GET['start'];
            $table_list = (empty($_POST['table_list'])) ? '' : $_POST['table_list'];
            if (empty($table_list))
            {
                AlertMsg('您未选择需要备份的表，请返回!', "-1");//throw new Exception('请选择需要备份的表', 10);
            }

            self::$size_limit = (empty($_REQUEST['size_limit'])) ? 0 : (int)$_REQUEST['size_limit'];
            self::$step = (empty($_GET['step'])) ? 0 : (int)$_GET['step'];

            self::$table_id = (empty($_GET['table_id'])) ? 0 : $_GET['table_id'];

            !self::$step && self::$size_limit /= 2;
            self::$pre = 'bak_' . time();


            // 备份表里的数据
            $bakup_data = self::bakup_data($table_list);
            // 备份表结构
            if (!self::$step)
            {
                $table_sel = implode('|', $table_list);
                self::$step = 1;
                self::$start = 0;
                $pre = self::$pre;
                $bakup_table = self::bakup_table($table_list);

            }
            $f_num = ceil(self::$step / 2);
            $filename = $pre . '.sql';
            self::$step++;
            $write_data = (!empty($bakup_table)) ? $bakup_table . $bakup_data : $bakup_data;

         // $t_name = $table_list[self::$table_id - 1];
         // $c_n = $start_from;

            $filename = PATH_DATA . '/backup/' .  $filename;
            if (self::$stop == 1)
            {
            	$files = self::$step - 1;
                trim($write_data) && self::write($filename, $bak . $write_data, 'ab');
 				AlertMsg("操作成功！", "restoreController.php");
            }
            else
            {
                trim($write_data) && self::write($filename, $bak . $write_data, 'ab');
                $backup_file = '';
                if(self::$step > 1)
                {
                    for($i = 1; $i <= $f_num; $i++)
                    {
                    	$backup_file .= '<a href ="/cache/backup/' . $pre . $i . '.sql">' . $pre . $i . '.sql</a><br>';
                    }
                }
					AlertMsg("操作成功！", "restoreController.php");
            }
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
	    }elseif(isset($_POST['repair'])){
	    	$table_list = $_POST['table_list'];
	    	if($table_list && count($table_list)){
	    		foreach($table_list as $table){
	    			$rs = $this->objC->RunQuery("REPAIR TABLE ".$table);
	    			if($rs){
	    				echo '修复 '.$table.' 成功！<br />';
	    			}else{
	    				echo '修复 '.$table.' 失败！<br />';
	    			}
	    		}
	    	}
	    	echo '<meta http-equiv="refresh" content="3;url=backupController.php">';
	    }elseif($_POST['optimize']){
	    	$table_list = $_POST['table_list'];
	    	if($table_list && count($table_list)){
	    		foreach($table_list as $table){
	    			$rs = $this->objC->RunQuery("OPTIMIZE TABLE ".$table);
						if($rs){
	    				echo '优化 '.$table.' 成功！<br />';
	    			}else{
	    				echo '优化 '.$table.' 失败！<br />';
	    			}
	    		}
	    	}
	    	echo '<meta http-equiv="refresh" content="3;url=backupController.php">';
	    }

    }


    /**
     * 备份数据
     *
     * @param array $table_list
     * @param int $start
     * @return string
     */
    private function bakup_data($table_list)
    {
        try
        {
            if (empty($table_list))
            {
                throw new Exception('请选择需要备份的表', 10);
            }

            self::$table_id = self::$table_id ? self::$table_id - 1 : 0;
            self::$stop = 0;

            $output = '';

            $table_count = count($table_list);

            for($i = self::$table_id; $i < $table_count; $i++)
            {

                // 表记录数
                $ts = $this->objC->GetRow("SHOW TABLE STATUS LIKE '{$table_list[$i]}'");
                self::$rows = $ts['Rows'];

                $sql = "SELECT * FROM {$table_list[$i]} LIMIT " . self::$start . ', 100000';
				$rs = $this->objC->GetAll("DESC ".$table_list[$i]);
                $num_field = count($rs);

				$dataArr = $this->objC->getAll($sql);

                foreach($dataArr as $data)
                {
                    self::$start++;
                    $output .= "INSERT INTO {$table_list[$i]} VALUES(" . "'" . mysql_escape_string($data[$rs[0]['Field']]) . "'";

                    // 备份每个字段
                    $tempdb = '';
                    for ($j = 1; $j < $num_field; $j++)
                    {
                        $tempdb .= ",'" . mysql_escape_string($data[$rs[$j]['Field']]) . "'";
                    }
                    $output .= $tempdb. ");\n";

                    if(self::$size_limit && strlen($output) > self::$size_limit * 1000)
                    {
                        break;
                    }
                }

                if(self::$start >= self::$rows)
                {
                    self::$start = 0;
                    self::$rows = 0;
                }
                $output .= "\n";
                if(self::$size_limit && strlen($output) > self::$size_limit * 1000)
                {
                    self::$start == 0 && $i++;
                    self::$stop = 1;
                    break;
                }
                self::$start = 0;
            }

            if(self::$stop == 1)
            {
                $i++;
                self::$table_id = $i;
                self::$start_from = self::$start;
                self::$start = 0;
            }
            return $output;
        }
        catch (Exception $e)
        {
            $message = $e->getMessage();

            return false;
        }

    }


    /**
     * 获取创建表的 SQL
     *
     * @param array $table_list
     * @return void
     */
    private  function bakup_table($table_list)
    {
        $output = '';
        if (!is_array($table_list) || empty($table_list))
        {
            return false;
        }
        foreach($table_list as $key => $table)
        {
            $output .= "DROP TABLE IF EXISTS {$table};\n";
			$tmp = $this->objC->GetRow("SHOW CREATE TABLE ".$table);
            $tmp['Create Table'] = str_replace($tmp['Table'], $table, $tmp['Create Table']);
            if(CHARSET == 'gbk')
				$output .= $tmp['Create Table'] . " COLLATE=gbk_chinese_ci;\n\n";
			else
				$output .= $tmp['Create Table'] . " COLLATE=utf8_general_ci;\n\n";
        }
        return $output;
    }

    function bytes_to_string( $bytes )
	{
		if (!preg_match("/^[0-9]+$/", $bytes)) return 0;
		$sizes = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB' );
		$extension = $sizes[0];
		for( $i = 1; ( ( $i < count( $sizes ) ) && ( $bytes >= 1024 ) ); $i++ )
		{
			$bytes /= 1024;
			$extension = $sizes[$i];
		}

		return round( $bytes, 2 ) . ' ' . $extension;
	}
	public static function write($filename, $data, $method = 'wb+', $iflock = 1, $check = 1, $chmod = 1)
	{
//		echo '<br>'.$filename;
//		echo '<br>'.$data;
		if (empty($filename))
		{
		    return false;
		}

		if ($check && strpos($filename, '..') !== false)
		{
			return false;
		}

        if (!is_dir(dirname($filename)))
        {
            return false;
        }
		if (false == ($handle = fopen($filename, $method)))
		{
			return false;
		}

		if($iflock)
		{
			flock($handle, LOCK_EX);
		}
		fwrite($handle, $data);
		touch($filename);

		if($method == "wb+")
		{
			ftruncate($handle, strlen($data));
		}
		fclose($handle);
		$chmod && @chmod($filename,0777);

		return true;
	}

}


$action     = isset($_GET['a']) ? $_GET['a'] : 'index';
$classname  = "backupController";
$controllerObj = new $classname;
$actionName = $action.'Action';
if (method_exists($controllerObj, $actionName))
	$controllerObj->$actionName();
else
	die('链接错误');
?>