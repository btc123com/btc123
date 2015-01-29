<?php
header('Content-Type: text/html;charset=utf-8');
ini_set('display_errors', 'off');
ini_set('error_reporting', 8191);
ini_set('memory_limit', '128M');
ini_set('max_execution_time', 1800);
ini_set('date.timezone', 'Asia/Shanghai');
ini_set('auto_prepend_file','');
ini_set('auto_append_file','');

session_start();
if(is_file('config.php'))
	require('config.php');
else if(is_file('../config.php'))
	require('../config.php');
else if(is_file('../../config.php'))
	require('../../config.php');

$useragent = $_SERVER['HTTP_USER_AGENT'];
if (strpos($useragent,"MSIE 6.0") !== false) {
    setcookie(session_name(), session_id(), COOK_LIFE, '/', WEB_HOST);
}

require(ADODB_PATH.'adodb.inc.php');

function __autoload($className) {
  switch($className){
    case "Conn":
      require_once CLASS_PATH.'conn.class.php';
      break;
    case "Pager":
      require_once CLASS_PATH.'pager.class.php';
      break;
    case "Mailer":
      require_once CLASS_PATH.'mailer.class.php';
      break;
    case "Ftp":
      require_once CLASS_PATH.'ftp.class.php';
      break;
    case "Img":
      require_once CLASS_PATH.'img.class.php';
      break;
    case "Zip":
      require_once CLASS_PATH.'zip.class.php';
      break;
    case "Smarty":
	  require_once SMARTY_PATH.'Smarty.class.php';
	  break;
	  case "FileCache":
	  require_once CLASS_PATH.'filecache.class.php';
	  break;
  }
}

require(INC_PATH.'function.inc.php');
require(INC_PATH.'function.my.php');
require(INC_PATH.'function.db.php');

$s = GetMTime();

$objC = new Conn();

$objS = new Smarty();
$objS -> template_dir = TEMPLATES;
$objS -> compile_dir  = TEMPLATES_C;
$objS -> right_delimiter = RIGHTTAG;
$objS -> left_delimiter = LEFTTAG;
$objS -> cache_dir = SMARTY_CACHE;
$objS -> caching = false;
$objS -> cache_lifetime = SMARTY_CACHE_SECOND;

require_once(ROOT . 'site_setting.php');