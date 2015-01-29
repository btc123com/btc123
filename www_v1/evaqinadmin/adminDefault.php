<?php
require_once('header.inc.php');
ChkAdminLogin();
$objC = new Conn();

$sysContent = indexAction();
$webSer = $_SERVER['SERVER_SOFTWARE'];
$objS->assign('webSer',$webSer);
$objS->assign('sysContent',$sysContent);

/*

$ctx = stream_context_create(array('http'=>array('timeout'=>15)));
$content = getContent("http://www.5w.com/index.php?c=download&a=getdata",0,$ctx);
$conArr = json_decode($content,true);
$content = array_utf_to_gbk($conArr);
$news = $content['data'];
$question = $content['news'];
$objS->assign('news', $news);
$objS->assign('question', $question);

$sql = "SELECT ver,misver,dataver,misdataver FROM ".DBPREFIX."site_setting";
$vers = $objC->getRow($sql);

$myver = $vers['ver'];
$misver = $vers['misver'];
$mydataver = $vers['dataver'];
$misdataver = $vers['misdataver'];

$sysver = getContent("http://download.5w.com/sysver8.txt");
$sysvers = explode("\n",$sysver);
foreach($sysvers as $k=>$v){
	$v = explode(",",$v);
	$uptime[$k] = $v[0];
	$uptext[$k] = $v[1];
}
$upvers = array();
if($myver < max($uptime) && $misver < max($uptime)){
	
	$i = 0;
	foreach($uptime as $key=>$upt){
		if($myver < $upt){
			$upvers[$i]['time'] = $upt;
			$upvers[$i]['text'] = $uptext[$key];
			$i++;
		}
	}
}

$sysdataver = getContent("http://download.5w.com/sysdataver8.txt");
$sysdatavers = explode("\n",$sysdataver);
foreach($sysdatavers as $i=>$data){
	$data = explode(",",$data);
	$updatatime[$i] = $data[0];
	$updatatext[$i] = $data[1];
}
$updatavers = array();
if($mydataver < max($updatatime) && $misdataver < max($updatatime)){
	
	$i = 0;
	foreach($updatatime as $j=>$updt){
		if($mydataver < $updt){
			$updatavers[$j]['time'] = $updt;
			$updatavers[$j]['text'] = $updatatext[$j];
			$i ++;
		}
	}
}
if(CHARSET=='utf8'){
$updatavers = array_gbk_to_utf($updatavers);
$upvers = array_gbk_to_utf($upvers);
}
if(!empty($updatavers))$objS->assign("updatavers",$updatavers);
if(!empty($upvers))$objS->assign("upvers",$upvers);

*/

//---------------------------------------fengguanxing 10.28 获取系统相关信息
	function indexAction(){
		$objC = new Conn();
		$serverapi=strtoupper(php_sapi_name());
		$phpversion=PHP_VERSION;
		$systemversion=explode(" ", php_uname());
		$sysReShow='none';
		switch (PHP_OS)
		{
		    case "Linux":
				$sysReShow = (false !== ($sysInfo = sys_linux()))?"show":"none";
				$sysinfo=$systemversion[0].'   '.$systemversion[2];
				break;
		    case "FreeBSD":
				$sysReShow = (false !== ($sysInfo = sys_freebsd()))?"show":
				    "none";
				$sysinfo=$systemversion[0].'   '.$systemversion[2];
				break;
		    default:
				$sysinfo=$systemversion[0].'  '.$systemversion[1].' '.$systemversion[3].$systemversion[4].$systemversion[5];
				break;
		}
		if($sysReShow=='show')
		{
		    $pmemory='共'.$sysInfo['memTotal'].'M, 已使用'.$sysInfo['memUsed'].'M, 空闲'.$sysInfo['memFree'].'M, 使用率'.$sysInfo['memPercent'].'%';
		    $pmemorybar=$sysInfo['memPercent'];
		    $swapmomory='共'.$sysInfo['swapTotal'].'M, 已使用'.$sysInfo['swapUsed'].'M, 空闲'.$sysInfo['swapFree'].'M, 使用率'.$sysInfo['swapPercent'].'%';
		    $swapmemorybar=$sysInfo['swapPercent'];
		    $syslaodavg=$sysInfo['loadAvg'];
		}
		$mysql = $objC->GetOne("SELECT VERSION() AS dbversion");
		$phpsafe=getcon("safe_mode");
		$dispalyerror=getcon("display_errors");
		$allowurlopen=getcon("allow_url_fopen");
		$registerglobal=getcon("register_globals");
		$maxpostsize=getcon("post_max_size");
		$maxupsize=getcon("upload_max_filesize");
		$maxexectime=getcon("max_execution_time").'s';
		$mqqsp=get_magic_quotes_gpc()===1?'YES':'NO';
		$mprsp=get_magic_quotes_runtime()===1?'YES':'NO';
		$zendoptsp=(get_cfg_var("zend_optimizer.optimization_level")||get_cfg_var("zend_extension_manager.optimizer_ts")||get_cfg_var("zend_extension_ts"))?'YES':'NO';
		$iconvsp=isfun('iconv');
		$curlsp=isfun('curl_init');
		$gdsp=isfun('gd_info');
		$zlibsp=isfun('gzclose');
		$eaccsp=isfun('eaccelerator_info');
		$xcachesp=extension_loaded('XCache')?'YES':'NO';
		$sessionsp=isfun("session_start");
		$cookiesp=isset($_COOKIE)?'YES':'NO';
		$serverip=@gethostbyname($_SERVER['SERVER_NAME']);
		$serverip=$serverip==''?'':"  ($serverip)";
		$systime=gmdate("Y年n月j日 H:i:s",time()+8*3600);
		$phpversionsp=$phpversion>'5.0'?'YES':'NO';
		$mysqlversionsp=$mysql>'4.1'?'YES':'NO';
		$dbasp=extension_loaded('dba')?'YES':'NO';
		// 数据库大小
		$databasesize=0;
		$rs = $objC->GetAll("SHOW TABLE STATUS");
		foreach($rs as $row)
		{
		    $databasesize +=$row['Data_length'] + $row['Index_length'];
		}
		$databasesize=(int)($databasesize*100/(1024*1024));
		$databasesize = ($databasesize/100).'M';
		//站点统计   请补充
		$sitesum = '';

		$noticemsg='';


		$data['serverip']=$serverip;
		$data['systime']=$systime;
		$data['sysinfo']=$sysinfo;
		$data['phpversion']=$phpversion;
		$data['dbversion']=$mysql;
		$data['dispalyerror']=$dispalyerror;
		$data['serverapi']=$serverapi;
		$data['phpsafe']=$phpsafe;
		$data['sessionsp']=$sessionsp;
		$data['cookiesp']=$cookiesp;
		$data['phpsafe']=$phpsafe;
		$data['zendoptsp']=$zendoptsp;
		$data['eaccsp']=$eaccsp;
		$data['xcachesp']=$xcachesp;
		$data['registerglobal']=$registerglobal;
		$data['mqqsp']=$mqqsp;
		$data['mprsp']=$mprsp;
		$data['maxupsize']=$maxupsize;
		$data['maxpostsize']=$maxpostsize;
		$data['maxexectime']=$maxexectime;
		$data['allowurlopen']=$allowurlopen;
		$data['curlsp']=$curlsp;
		$data['iconvsp']=$iconvsp;
		$data['zlibsp']=$zlibsp;
		$data['gdsp']=$gdsp;
		$data['dbasp']=$dbasp;
		$data['datasize']=$databasesize;
		$data['sitesum']=$sitesum;

		if(isfun('json_encode')=='YES'){
			$data['json']='YES';
		}else{$data['json']='NO';}

		return $data;
	}

	function sys_linux()
    {
    // CPU
        if (false === ($str = @file("/proc/cpuinfo"))) return false;
        $str = implode("", $str);
        @preg_match_all("/model\s+name\s{0,}\:+\s{0,}([\w\s\)\(.@\.]+)[\r\n]+/", $str, $model);
        //@preg_match_all("/cpu\s+MHz\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $mhz);
        @preg_match_all("/cache\s+size\s{0,}\:+\s{0,}([\d\.]+\s{0,}[A-Z]+[\r\n]+)/", $str, $cache);
        if (false !== is_array($model[1]))
        {
            $res['cpu']['num'] = sizeof($model[1]);
            for($i = 0; $i < $res['cpu']['num']; $i++)
            {
                $res['cpu']['detail'][] = "类型：".$model[1][$i]." 缓存：".$cache[1][$i];
            }
            if (isset($res['cpu']['detail']) && false !== is_array($res['cpu']['detail'])) $res['cpu']['detail'] = implode("<br />", $res['cpu']['detail']);
        }


        // UPTIME
        if (false === ($str = @file("/proc/uptime"))) return false;
        $str = explode(" ", implode("", $str));
        $str = trim($str[0]);
        $min = $str / 60;
        $hours = $min / 60;
        $days = floor($hours / 24);
        $hours = floor($hours - ($days * 24));
        $min = floor($min - ($days * 60 * 24) - ($hours * 60));
        if ($days !== 0) $res['uptime'] = $days."天";
        if ($hours !== 0) $res['uptime'] .= $hours."小时";
        $res['uptime'] .= $min."分钟";

        // MEMORY
        if (false === ($str = @file("/proc/meminfo"))) return false;
        $str = implode("", $str);
        preg_match_all("/MemTotal\s{0,}\:+\s{0,}([\d\.]+).+?MemFree\s{0,}\:+\s{0,}([\d\.]+).+?SwapTotal\s{0,}\:+\s{0,}([\d\.]+).+?SwapFree\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buf);

        $res['memTotal'] = round($buf[1][0]/1024, 2);
        $res['memFree'] = round($buf[2][0]/1024, 2);
        $res['memUsed'] = ($res['memTotal']-$res['memFree']);
        $res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0;

        $res['swapTotal'] = round($buf[3][0]/1024, 2);
        $res['swapFree'] = round($buf[4][0]/1024, 2);
        $res['swapUsed'] = ($res['swapTotal']-$res['swapFree']);
        $res['swapPercent'] = (floatval($res['swapTotal'])!=0)?round($res['swapUsed']/$res['swapTotal']*100,2):0;

        // LOAD AVG
        if (false === ($str = @file("/proc/loadavg"))) return false;
        $str = explode(" ", implode("", $str));
        $str = array_chunk($str, 3);
        $res['loadAvg'] = implode(" ", $str[0]);

        return $res;
    }
    // freebsd 系统信息
    function sys_freebsd()
    {
    //CPU
        if (false === ($res['cpu']['num'] = get_key("hw.ncpu"))) return false;
        $res['cpu']['detail'] = get_key("hw.model");

        //LOAD AVG
        if (false === ($res['loadAvg'] = get_key("vm.loadavg"))) return false;
        $res['loadAvg'] = str_replace("{", "", $res['loadAvg']);
        $res['loadAvg'] = str_replace("}", "", $res['loadAvg']);

        //UPTIME
        if (false === ($buf = get_key("kern.boottime"))) return false;
        $buf = explode(' ', $buf);
        $sys_ticks = time() - intval($buf[3]);
        $min = $sys_ticks / 60;
        $hours = $min / 60;
        $days = floor($hours / 24);
        $hours = floor($hours - ($days * 24));
        $min = floor($min - ($days * 60 * 24) - ($hours * 60));
        if ($days !== 0) $res['uptime'] = $days."天";
        if ($hours !== 0) $res['uptime'] .= $hours."小时";
        $res['uptime'] .= $min."分钟";

        //MEMORY
        if (false === ($buf = get_key("hw.physmem"))) return false;
        $res['memTotal'] = round($buf/1024/1024, 2);
        $buf = explode("\n", do_command("vmstat", ""));
        $buf = explode(" ", trim($buf[2]));

        $res['memFree'] = round($buf[5]/1024, 2);
        $res['memUsed'] = ($res['memTotal']-$res['memFree']);
        $res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0;

        $buf = explode("\n", do_command("swapinfo", "-k"));
        $buf = $buf[1];
        preg_match_all("/([0-9]+)\s+([0-9]+)\s+([0-9]+)/", $buf, $bufArr);
        $res['swapTotal'] = round($bufArr[1][0]/1024, 2);
        $res['swapUsed'] = round($bufArr[2][0]/1024, 2);
        $res['swapFree'] = round($bufArr[3][0]/1024, 2);
        $res['swapPercent'] = (floatval($res['swapTotal'])!=0)?round($res['swapUsed']/$res['swapTotal']*100,2):0;


        return $res;
    }

    function getcon($varName)
    {
        switch($res = get_cfg_var($varName))
        {
            case 0:
                return 'NO';
                break;
            case 1:
                return 'YES';
                break;
            default:
                return $res;
                break;
        }

    }
    function isfun($funName)
    {
        return (false !== function_exists($funName))?'YES':'NO';
    }
function array_utf_to_gbk(&$array)
	{
		if(CHARSET=='utf8')return $array;
		foreach ($array as &$arr)
		{
			if (is_array($arr)) {
				$arr = array_utf_to_gbk($arr);
			}
			else {
				$arr = iconv('utf-8', 'gbk', $arr);
			}
		}
		return $array;
	}
function array_gbk_to_utf(&$array)
{
    if(is_array($array))
    foreach ($array as &$arr)
    {
        if (is_array($arr)) {
        	$arr = array_gbk_to_utf($arr);
        }
        else {
            $arr = iconv('gbk', 'utf-8', $arr);
        }
    }
    return $array;
}
/**
 * 取得参数值
 * @param string $keyName 参数名
 * @return bool
 */
function get_key($keyName)
{
    return do_command('sysctl', "-n $keyName");
}


/**
 * 查找执行文件位置
 * @param string $commandName 命令名
 * @return bool
 */
function find_command($commandName)
{
    $path = array('/bin', '/sbin', '/usr/bin', '/usr/sbin', '/usr/local/bin', '/usr/local/sbin');
    foreach($path as $p)
    {
        if (@is_executable("$p/$commandName")) return "$p/$commandName";
    }
    return false;
}

/*
 * 执行系统命令
 * @param string $commandName 命令名
 * @param string $args 参数
 * @return bool
 */
function do_command($commandName, $args)
{
    $buffer = "";
    if (false === ($command = find_command($commandName))) return false;
    if ($fp = @popen("$command $args", 'r'))
        {
            while (!@feof($fp))
            {
                $buffer .= @fgets($fp, 4096);
            }
            return trim($buffer);
        }
    return false;
}
require("footer.inc.php");
$objS->display('admin/adminDefault.tpl');
