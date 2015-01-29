<?php
/*
 * ClassName: FileCache
 * Date: 2008-06-07
 * Author: xugang9804@gmail.com
 */
class FileCache{
	static $maxfiles = 1000;

	/*
		CACHE_PATH: in config.php
	*/
	function __construct(){
	}
	/*
	params:
		path:路径，默认位于cache目录下
		file:文件名
		time:缓存有效期，秒，0=永不失效
	*/

	function getCache($path,$file,$time=0){
		$path = $path.$file;
		if(file_exists($path)){
			if($time==0 || filemtime($path)+$time > time()){
				return file_get_contents($path);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
//tianqi cache
	function getTianqiCache($path,$file,$time=0){
		$path = $path.$file;
		if(file_exists($path)){
			if($time==0 || filemtime($path)+$time > time()){
				$mktime = date("H", filemtime($path));
				$nowtime = date("H", time());
				if($mktime>8 && $mktime<19 && $nowtime>8 && $nowtime<19){
					return file_get_contents($path);
				}elseif(($mktime<7 || $mktime>18) && ($nowtime<7 || $nowtime>18)){
					return file_get_contents($path);
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function setTianqiCache($path,$file,$content=''){
		if(!is_dir($path))mkdir($path);
		$path = $path.$file;
		file_put_contents($path,$content);
	}
	/*
	params:
		file:文件名，可包含部分路径，但必须位于cache目录下
		ext:文件后缀，默认data
		content:文件内容
	*/
	function setCache($path,$file,$content=''){
		if(!is_dir($path))mkdir($path);
		$path = $path.$file;
		file_put_contents($path,$content);
	}
	static function getDir($num){
		$num = (int)$num;
		if($num==0){
			return '1';
		}else{
			return ceil($num/self::$maxfiles);
		}
	}
	static function getTianDir($num){
		$num = (int)$num;
		if($num==0){
			return 't1';
		}else{
			return 't'.$num%16;
		}
	}
}
?>