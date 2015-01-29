<?php
set_time_limit(15);
include_once 'config.php';
include_once INC_PATH.'function.my.php';
include_once INC_PATH.'function.inc.php';
include_once CLASS_PATH.'filecache.class.php';
ini_set('date.timezone', 'Asia/Shanghai');
ini_set('display_errors', 'off');
class weatherController{
	public function getWeatherAction(){
		$city = isset($_GET['ccity']) ? $_GET['ccity'] : '';
		if($city != ''){
			$cityName = $this->getCityName($city);
		}else{
			if(isset($_COOKIE['s_prov']) && isset($_COOKIE['s_city']) && isset($_COOKIE['dcity']) && $_COOKIE['dcity'] != ''){
				$provinceId = $_COOKIE['s_prov'];
				$cityId = $_COOKIE['s_city'];
				$city = $_COOKIE['dcity'];
				$cityName = $this->getCityName($city);
			}else{
			$fp = fopen(ROOT . 'tianqi/arr.php','rb');
			$con = fread($fp,filesize(ROOT . 'tianqi/arr.php'));
	        $provinces = unserialize($con);
			fclose($fp);
			$fp = fopen(ROOT . 'tianqi/newAllArrs.php','rb');
			$con = fread($fp,filesize(ROOT . 'tianqi/newAllArrs.php'));
	        $citys = unserialize($con);
			fclose($fp);
				$ip = getIP();
				$url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=".$ip;
				$rs = file_get_contents($url);
				$rs = iconv("GBK","UTF-8//IGNORE",$rs);
				$z_arr = explode('	',$rs);
				if(count($z_arr)>=5){
					$province = $z_arr[4];
					$cityName = $z_arr[5];
					$back = $this->getzone2($province,$cityName);
					$province = $back[0];
					$cityName = $back[1];
					$districtName = $cityName;
					$provinceId = array_search($province, $provinces);
					$cityArray = $citys[$provinceId];
					if(CHARSET=='gbk')
						$cityArray = array_utf8_to_gbk($cityArray);
					$cityId    = array_search($cityName, $cityArray['level1']);
					$areaId    = array_search($districtName, $cityArray['level2'][$cityId]);
					$pageId    = isset($cityArray['level3'][$areaId]) ? $cityArray['level3'][$areaId] : '';

					$city = $pageId;
				}
				if ('' == $city) {
					$city = 101010100;
					$cityName = '北京';
				}
				$provinceId = isset($provinceId)?$provinceId:'01';
				$cityId = isset($cityId)?$cityId:'0101';
				setcookie("dcity",$city,time()+60*60*24*365, '/');
				setcookie("s_prov",$provinceId,time()+60*60*24*365, '/');
				setcookie("s_city",$cityId,time()+60*60*24*365, '/');
				//setcookie("tuancity",zh2pinyin($cityName),time()+60*60*24*365, '/','.5w.com');
			}
		}
		$new_cache = new FileCache();
		$wdata = $new_cache->getTianqiCache(CACHE_PATH.'data/newdata/',$city.'w.data',60*60*2);
		if($wdata !== false){
			$cachedata = unserialize($wdata);
		}else{
			$weatherinfo = array();
			$cachedata = array();
			$content = file_get_contents('http://m.weather.com.cn/data/'.$city.'.html');
			if($content){
				$weatherinfo = json_decode($content,TRUE);
				if(count($weatherinfo)){
					for($i=1;$i<=12;$i++){
						$img = $weatherinfo['weatherinfo']['img_title'.$i];
						$img = getWeatherImage($img);
						$weatherinfo['weatherinfo']['img'.$i] = $img;
					}
					$cachedata = $weatherinfo;
					$weatherinfo = serialize($weatherinfo);
		    	$new_cache->setTianqiCache(CACHE_PATH.'data/newdata/',$city.'w.data',$weatherinfo);
				}
			}
		}
		$callback=isset($_GET['callback'])?$_GET['callback']:'getWeather';
		echo "{$callback}(".json_encode($cachedata).")";
	}

	public function getZoneInfoAction(){
			$returnarr = array();
			$type = isset($_GET['type'])?$_GET['type']:0;
			$provinceId = isset($_GET['pid'])?$_GET['pid']:'';
			$cityId = isset($_GET['cid'])?$_GET['cid']:'';

			$fp = fopen(ROOT . 'tianqi/arr.php','rb');
			$con = fread($fp,filesize(ROOT . 'tianqi/arr.php'));
	        $provinces = unserialize($con);
			fclose($fp);
			$fp = fopen(ROOT . 'tianqi/newAllArrs.php','rb');
			$con = fread($fp,filesize(ROOT . 'tianqi/newAllArrs.php'));
	        $citys = unserialize($con);
			fclose($fp);
        
        if ($type == 2) {
          $cityArray  = $citys[$provinceId];
        	$city2      = $cityArray['level2'][$cityId];
        	$newcity = array();
        	foreach($city2 as $key => $value){
        		if(CHARSET=='utf8')
			        	$piny = zh2pinyin(trim(iconv('utf-8','gbk',$value)));
			    	else
			        	$piny = zh2pinyin(trim($value));
        				//$piny = zh2pinyin(trim(iconv('utf-8','gbk',$value)));
        		if($piny){
	        		$piny = strtoupper(substr($piny,0,1));
	        		$newcity[$cityArray['level3'][$key]] = $piny.' '.$value;
	        	}else
        			$newcity[$cityArray['level3'][$key]] = $value;
        	}
        	
        	$city2 = $newcity;

        	$returnarr = array(array('id'=>'city2', 'value'=>$city2));
        }else if ($type == 1) {
        	$cityArray  = $citys[$provinceId];
        	$city1      = $cityArray['level1'];
        	foreach($city1 as $key => $value){
        		if(CHARSET=='utf8')
			        	$piny = zh2pinyin(trim(iconv('utf-8','gbk',$value)));
			    	else
			        	$piny = zh2pinyin(trim($value));
        		if($piny){
	        		$piny = strtoupper(substr($piny,0,1));
	        		$city1[$key] = $piny.' '.$value;
	        	}else
        			$city1[$key] = $value;
        	}
        	$city1key   = array_keys($cityArray['level1']);
        	$cityId     = array_shift($city1key);
        	$city2      = $cityArray['level2'][$cityId];

        	$newcity = array();
        	foreach($city2 as $key => $value){
        		if(CHARSET=='utf8')
			        	$piny = zh2pinyin(trim(iconv('utf-8','gbk',$value)));
			    	else
			        	$piny = zh2pinyin(trim($value));
        		if($piny){
	        		$piny = strtoupper(substr($piny,0,1));
	        		$newcity[$cityArray['level3'][$key]] = $piny.' '.$value;
	        	}else
        			$newcity[$cityArray['level3'][$key]] = $value;
        		
        	}
        	
        	$city2 = $newcity;
        	$returnarr = array(array('id'=>'city1', 'value' => $city1), array('id'=>'city2', 'value'=>$city2));
        }else if ($type == 0) {
        	$provinceId = isset($_GET['p']) ? $_GET['p'] : '';
        	$cityId = isset($_GET['c']) ? $_GET['c'] : '';
        	if($provinceId =='' || $cityId==''){
	        	if(isset($_COOKIE['s_prov']) && isset($_COOKIE['s_city']) && isset($_COOKIE['dcity'])){
	        		$provinceId = $_COOKIE['s_prov'];
	        		$cityId = $_COOKIE['s_city'];
	        		$county = $_COOKIE['dcity'];
	        		$cityArray = $citys[$provinceId];//array_utf8_to_gbk($citys[$provinceId]);
	        	}else{
        			$provinceId = '01';
			    	$cityId = '0101';
						$ip = getIP();
						$url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=".$ip;
			      $rs = file_get_contents($url);
				$rs = iconv("GBK","UTF-8//IGNORE",$rs);
			      $z_arr = explode('	',$rs);
			      if(count($z_arr)>=5){
			        $province = $z_arr[4];
			        $cityName = $z_arr[5];
			        $back = $this->getzone2($province,$cityName);
			        $province = $back[0];
			        $cityName = $back[1];
							$districtName = $cityName;
			
							$provinceId = array_search($province, $provinces);
							$cityArray = array_utf8_to_gbk($citys[$provinceId]);
							$_cityId    = array_search($cityName, $cityArray['level1']);
							$cityId    = array_search($districtName, $cityArray['level2'][$_cityId]);
						}
						$county = '';
	        	}
        	}else{
        		$cityArray = $citys[$provinceId];//array_utf8_to_gbk($citys[$provinceId]);
        	}
        	
        		$cityArray  = $citys[$provinceId];
	        	$city1  = isset($cityArray['level1']) ? $cityArray['level1'] : array();
	        	foreach($city1 as $key => $value){
		        	if(CHARSET=='utf8')
				        	$piny = zh2pinyin(trim(iconv('utf-8','gbk',$value)));
				    	else
				        	$piny = zh2pinyin(trim($value));
	        		$city1[$key] = strtoupper(substr($piny,0,1)).' '.$value;
	        	}
				$cityArray['level1'] = isset($cityArray['level1']) ? $cityArray['level1'] : array();
	        	$city1key   = array_keys($cityArray['level1']);
	        	if(!isset($_COOKIE['s_prov']) || !isset($_COOKIE['s_city']) || !isset($_COOKIE['dcity'])){
	        		$cityId     = array_shift($city1key);
	        	}
	        	
	        	$city2      = isset($cityArray['level2'][$cityId])?$cityArray['level2'][$cityId]:array();
	
	        	$newcity = array();
	        	foreach($city2 as $key => $value){
		        	if(CHARSET=='utf8')
				        	$piny = zh2pinyin(trim(iconv('utf-8','gbk',$value)));
				    	else
				        	$piny = zh2pinyin(trim($value));
	        		$newcity[$cityArray['level3'][$key]] = strtoupper(substr($piny,0,1)).' '.$value;
	        	}
	        	$city2 = $newcity;
        	
        	foreach($provinces as $key => $value){
			    		if(CHARSET=='utf8')
			        	$piny = zh2pinyin(trim(iconv('utf-8','gbk',$value)));
			        else
			        	$piny = zh2pinyin(trim($value));
			    		$provinces[$key] = strtoupper(substr($piny,0,1)).' '.$value;
			    	}

    			$returnarr = array(array('id'=>'prov','value'=>$provinceId),array('id'=>'city','value'=>array_gbk_to_utf8($provinces)),array('id'=>'city1', 'value' => array_gbk_to_utf8($city1)), array('id'=>'city2', 'value'=>array_gbk_to_utf8($city2)),array('id'=>'cityid','value'=>$cityId),array('id'=>'countyid','value'=>$county));
        }
        $callback=isset($_GET['callback'])?$_GET['callback']:'getZoneInfo';
			echo "{$callback}(".json_encode($returnarr).")";

    }


    // 根据cityid返回cityname
    function getCityName($cityid){
    	$path = '';
			$fp = fopen(ROOT . 'tianqi/newAllArrs.php','rb');
			$con = fread($fp,filesize(ROOT . 'tianqi/newAllArrs.php'));
	        $citys = unserialize($con);
			fclose($fp);
    	foreach($citys as $pkey => $allcity){
    		$allcity = $allcity;//array_utf8_to_gbk($allcity);
    		foreach($allcity['level1'] as $key => $cityName){
	        $areaId    = array_search($cityName, $allcity['level2'][$key]);
	        $pageId    = isset($allcity['level3'][$areaId]) ? $allcity['level3'][$areaId] : '';
	        if($pageId == $cityid)return $cityName;
	        
	        $city2      = $allcity['level2'][$key];
        	foreach($city2 as $key2 => $value2){
        		if($allcity['level3'][$key2] == $cityid)return $value2;
        	}
	        
	    	}
    	}
    	return '';
    }
    function getzone2($prv,$city){
			$returnarr = array();
			$citys = array(
			'黑龙江'=>'哈尔滨',
			'吉林'=>'长春',
			'辽宁'=>'沈阳',
			'河北'=>'石家庄',
			'山西'=>'太原',
			'山东'=>'济南',
			'青海'=>'西宁',
			'甘肃'=>'兰州',
			'陕西'=>'西安',
			'河南'=>'郑州',
			'江苏'=>'南京',
			'四川'=>'成都',
			'湖北'=>'武汉',
			'安徽'=>'合肥',
			'浙江'=>'杭州',
			'湖南'=>'长沙',
			'江西'=>'南昌',
			'贵州'=>'贵阳',
			'福建'=>'福州',
			'台湾'=>'台北',
			'云南'=>'昆明',
			'广东'=>'广州',
			'海南'=>'海口',
			'上海'=>'上海',
			'北京'=>'北京',
			'天津'=>'天津',
			'重庆'=>'重庆',
			'香港'=>'香港',
			'澳门'=>'澳门',
			'新疆'=>'乌鲁木齐',
			'内蒙古'=>'呼和浩特',
			'宁夏'=>'银川',
			'西藏'=>'拉萨',
			'广西'=>'南宁'
			);
			if($prv==''){
				$returnarr[] = '北京';
				$returnarr[] = '北京';
			}else if($city==''){
				foreach($citys as $key => $row){
					if($key == $prv){
						$returnarr[] = $key;
						$returnarr[] = $row;
					}
				}
			}else{
				$returnarr[] = $prv;
				$returnarr[] = $city;
			}
			return $returnarr;
		}
    function getzone($zone){
			$returnarr = array();
			$city = array(
			'黑龙江'=>'哈尔滨',
			'吉林'=>'长春',
			'辽宁'=>'沈阳',
			'河北'=>'石家庄',
			'山西'=>'太原',
			'山东'=>'济南',
			'青海'=>'西宁',
			'甘肃'=>'兰州',
			'陕西'=>'西安',
			'河南'=>'郑州',
			'江苏'=>'南京',
			'四川'=>'成都',
			'湖北'=>'武汉',
			'安徽'=>'合肥',
			'浙江'=>'杭州',
			'湖南'=>'长沙',
			'江西'=>'南昌',
			'贵州'=>'贵阳',
			'福建'=>'福州',
			'台湾'=>'台北',
			'云南'=>'昆明',
			'广东'=>'广州',
			'海南'=>'海口',
			);
			$others = array(
			'上海',
			'北京',
			'天津',
			'重庆',
			'香港',
			'澳门'
			);
			$o2 = array(
			'乌鲁木齐'=>'新疆',
			'呼和浩特'=>'内蒙古',
			'银川'=>'宁夏',
			'拉萨'=>'西藏',
			'南宁'=>'广西'
			);
			if (preg_match('/([^^]*?)省([^^]*?)市/', $zone, $areaInfo)){
				$returnarr[] = $areaInfo[1];
				$returnarr[] = $areaInfo[2];
			}elseif(preg_match('/([^^]*?)省/', $zone, $areaInfo)){
				$returnarr[] = $areaInfo[1];
				if(!empty($city[$areaInfo[1]]))
					$returnarr[]=$city[$areaInfo[1]];
			}else{
				$prv = $ct = '';
				foreach($others as $v){
					if(strpos($zone,$v)!==false){
						$prv = $v;
						$ct = $v;
					}
				}
				foreach($o2 as $key => $v){
					if(strpos($zone,$v)!==false){
						$prv = $v;
						$ct = substr($zone,strlen($v));
						if(substr($ct,strlen($ct)-2)=="市" || substr($ct,strlen($ct)-2)=="旗")
							$ct = substr($ct,0,strlen($ct)-1);
						if($ct==""){
							$ct = $key;
						}
					}
				}
				if($prv==""){
					$prv = $ct = "北京";
				}
				$returnarr[] = $prv;
				$returnarr[] = $ct;
			}
			return $returnarr;
		}
}
$action     = isset($_GET['a']) ? $_GET['a'] : 'index';
$classname  = "weatherController";
$controllerObj = new $classname;
$actionName = $action.'Action';
if (method_exists($controllerObj, $actionName))
	$controllerObj->$actionName();
else
	die('链接错误');