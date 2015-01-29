<?php

/*
    * 中文截取，支持gb2312,gbk,utf-8,big5
    *
    * @param string $str 要截取的字串
    * @param int $start 截取起始位置
    * @param int $length 截取长度
    * @param string $charset utf-8|gb2312|gbk|big5 编码
    * @param $suffix 是否加尾缀
    */
    function csubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
    {
        if(function_exists("mb_substr"))
        {
            if(mb_strlen($str, $charset) <= $length) return $str;
            $slice = mb_substr($str, $start, $length, $charset);
        }
        else
        {
            $re['&#39;utf-8&#39;']  = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
            $re['&#39;gb2312&#39;'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
            $re['&#39;gbk&#39;']     = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
            $re['&#39;big5&#39;']     = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
            preg_match_all($re[$charset], $str, $match);
            if(count($match[0]) <= $length) return $str;
            $slice = join("",array_slice($match[0], $start, $length));
        }
        if($suffix) return $slice."…";
        return $slice;
    }

/*
 * Function: SendMail
 * Parameter: to
 * Parameter: subject
 * Parameter: boby
 * Parameter: type
 * Parameter: sender
 * Return：bool
 */
function SendMail($to,$subject,$boby,$type='HTML',$sender=MAILSENDER){

	$objSmtp = new smtp(MAILSMTP,MAILPORT,true,MAILUSER,MAILPWD,MAILSENDER);

	$objSmtp->debug = false;

	return $objSmtp->sendmail($to, $sender, $subject, $boby, $type);
}


/*
 * Function: SendTplMail
 * Parameter: to
 * Parameter: subject
 * Parameter: tpl
 * Parameter: arrReplace
 * Return：bool
 */
function SendTplMail($to,$subject,$tpl,$arrReplace=array()){
	if(file_exists($tpl)){
		$content = file_get_contents($tpl);
		foreach($arrReplace as $search => $replace){
			$content = str_replace($search,$replace,$content);
		}
		return SendMail($to, $subject, $content);
	}
	else{
		return false;
	}
}

/*
 * Function: AlertMsg
 * Parameter: msg
 * Parameter: url
 * Parameter: target
 * Return：string
 */
function AlertMsg($msg="",$url="",$target="",$close=false){
	$title = '操作提示：';
	$jumpurl = '';
	$script = "<script type=\"text/javascript\">\n";
	if($msg != ""){
		//$script .= "alert(\"".$msg."\");\n";
		$title = str_replace('\r\n','<br />',$msg);
	}
	if($url == "-1"){
		//$script .= "history.back();\n";
		$jumpurl = $_SERVER['HTTP_REFERER'];
	}
	else if($target == "parent"){
		$script .= "window.top.location.href='".$url."';\n";
	}
	else if(!(strpos($target,"Frame")===false) && $url != "" && $url != NULL){
		$script .= "top.".$target.".location='".$url."';\n";
	}
	else if($url != ""){
		//$script .= "location.href='".$url."';\n";
		$jumpurl = $url;
	}
	if($close){
		$script .= "window.close();";
	}
	$script .= "</script>\n";

	ob_start();
	include(ROOT.'templates/admin/redir.tpl');
	ob_end_flush();

	//echo $script;
	exit();
}

/*
 * Function: chkStrLen
 * Parameter: string
 * Parameter: int
 * Parameter: int
 * Return：bool
 */
function chkStrLen($str,$minLength=0,$maxLength=NULL){
	if(iconv_strlen(strval($str)) < intval($minLength)){
		return false;
	}
	if ($maxLength !== NULL && iconv_strlen(strval($str)) > $maxLength) {
		return false;
	}
	return true;
}

/**
 * 常用或自定义格式正则校验
 *
 * @param string $value	源字符串
 * @param string $checkName	校验类型或自定义正则表达式
 * @return boolean
 */
function checkValid($value,$checkName,$minLength=0,$maxLength=NULL)
{
	$regex = array(
			'email' => '^[\w_+((-\w+)|(\.\w+))]*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$',
			'phone' => '^([0-9]{3})|([0-9]{3}\-))?1(3)|(5)[0-9]{9}$',
			'url' => '^(http|https|ftp):\/\/[A-Za-z0-9]+\.[A-Za-z0-9]*',
			'currency' => '^[0-9]+(\.[0-9]+)?$',
			'qq' => '^[1-9]\d{4,8}$',
			'english' => '^[A-Za-z]+$',
			'chinese' =>  '^[\xa1-\xff]+$',
			'password' => '/^[a-zA-Z0-9]{6,20}$/i',
			'name' =>  '^([\xa1-\xff]{1,8}|[A-Za-z0-9]{2,20})$',
			'string' => "^[^`%&()=;:'\"/\\]*$",
			'int' => "^-?[1-9]+[0-9]*$",
			'float' => "^(-?[0-9]+)(\.[0-9]+)?$",
			'time' => "^(20|21|22|23|1[0-9]{1}|0?[0-9]{1})(:[0-5]?[0-9]{1})(:(60)|([0-5]?[0-9]{1}))?$",
			'card' => "^[0-9]{15}([0-9]{2}[A-Za-z0-9])?$",
			'post' => "^[0-9]{6}$",
			);

	if(isset($regex[strtolower($checkName)])) {
         $matchRegex = $regex[strtolower($checkName)];
    }else {
    	 $matchRegex = $checkName;
    }

    if(eregi($matchRegex,$value) == false){
    	return false;
    }
    return chkStrLen($value,$minLength,$maxLength);
}

/**
 * 屏蔽js等跨站点脚本攻击
 *
 * @param string $Data	源字符串
 * @return string
 */
function blockScript($Data)
{
	$search_array = array("/&lt;script&gt;(.*)&lt;\/script&gt;/isU",
							"/\son(\S*)=/isU",
							"/&lt;iframe&gt;(.*)&lt;\/iframe&gt;/isU");
	$replace_array = array("&amp;lt;script&amp;gt;\\1&amp;lt;\/script&amp;gt;",
							"on\\1='';",
							"&amp;lt;iframe&amp;gt;\\1&amp;lt;\/iframe&amp;gt;");
	$Data = htmlspecialchars($Data);								//转换html特殊字符标记
	$Data = preg_replace($search_array, $replace_array, $Data);		//替换js脚本关键字
	return $Data;
}

/**
 * 加转义字符，防止SQL注入等不安全情况
 *
 * @param string or array $Data	源字符串
 * @return string
 */
function addSlash($Data,$blockScript=0)
{
	if(is_array($Data))
	{
		foreach($Data as $Key => $Value)
		{
			if(is_array($Value))
			{
				$Data[$Key] = addSlash($Value);
			}
			else
			{
				if($blockScript){
					$Value = blockScript(trim($Value));
				}
				if (!get_magic_quotes_gpc()) {
					$Data[$Key] = addslashes($Value);
				}else{
					$Data[$Key] = $Value;
				}
			}
		}
	}
	else
	{
		if($blockScript){
			$Data = blockScript($Data);
		}
		if (!get_magic_quotes_gpc()) {
			$Data = addslashes($Data);
		}
	}
	return $Data;
}

/**
 * 去除转义字符
 *
 * @param string or array $Data	源字符串
 * @return string
 */
function stripSlash($Data)
{
	if(is_array($Data))
	{
		foreach($Data as $Key => $Value)
		{
			if(is_array($Value))
			{
				$Data[$Key] = stripSlash($Value);
			}
			else
			{
				$Data[$Key] = stripslashes($Value);
			}
		}
	}
	else
	{
		$Data = stripslashes($Data);
	}
	return $Data;
}

/**
 * 替换禁用的字符串
 *
 * @param string $srcWords	源字符串
 * @return string
 */
function killWords($srcWords)
{
	if(defined("KILLWORDS_FILE"))	//如果存在禁用词语的列表文件则读取
		$killwords = file_get_contents(ROOT.KILLWORDS_FILE);
	else
		$killwords = KILLWORDS;

	$kw_arr = split(",",$killwords);
	foreach($kw_arr as $key=>$value)
	{
		$srcWords = preg_replace("/$value/i", "***", $srcWords);
	}
	return $srcWords;
}

/**
 * 检测是否有禁用的字符串
 *
 * @param string $srcWords	源字符串
 * @param string $myKillWords	可以用逗号隔开的禁用字符串
 * @return boolean
 */
function checkWords($srcWords,$myKillWords="")
{
	if($myKillWords != "")
		$killwords = $myKillWords;
	else
		return true;
	$kw_arr = split(",",$killwords);
	foreach($kw_arr as $key=>$value)
	{
		if(preg_match("/$value/i",$srcWords))
			return false;
	}
	return true;
}

/*
 * Function: RandValue
 * Parameter: str
 * Parameter: len
 * Return：string
 */
function RandValue($str,$len){
	return substr(md5(uniqid(rand()*$str)),0,$len);
}

/*
 * Function: SubString
 * Parameter: str
 * Parameter: start
 * Parameter: len
 * Return：string
 */
function SubString($str,$start,$len){
	for($i = 0;$i < strlen($str);$i++){
		if(ord(substr($str,$i,1)) > 127){
			$arrResult[] = substr($str,$i,2);
			$i++;
		}
		else{
			$arrResult[] = substr($str,$i,1);
		}
	}
	if(count($arrResult) > $len){
		$arrTmp = array_slice($arrResult,$start,$len);
	}
	else if(count($arrResult) <= $len){
		$arrTmp = $arrResult;
	}
	if(count($arrTmp)){
		$str = implode("",$arrTmp);
	}
	else{
		$str = $arrTmp;
	}
	return $str;
}


/*
 * Function: GetStrLen
 * Parameter: str
 * Return：string
 */
function GetStrLen($str){
	for($i = 0;$i < strlen($str);$i++){
		if(ord(substr($str,$i,1)) > 127){
			$result[] = substr($str,$i,2);
			$i++;
		}
		else{
			$result[] = substr($str,$i,1);
		}
	}
	return count($result);
}

/*
 * Function: GetIP
 * Return：string
 */
/*function GetIP(){
	if(getenv("HTTP_X_FORWARDED_FOR")){
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	}
	elseif(getenv("HTTP_CLIENT_IP")){
		$ip = getenv("HTTP_CLIENT_IP");
	}
	elseif(getenv("REMOTE_ADDR")){
		$ip = getenv("REMOTE_ADDR");
	}
	else {
		$ip = false;
	}
	return substr($ip,0,15);
}*/

function GetIP()
{
    static $realip;
    if (isset($_SERVER)){
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        }
    }

    return $realip;
}

/*
 * Function: getIPAddr
 * Parameter: string
 * Parameter: string
 * Return：string
 */
function getIPAddr($ip){
	$ip = sprintf("%u",ip2long($ip));
	if($ip==false){
		return 'unkown';
	}
	$content = file_get_contents(ROOT.'ip.dat');
	$arrContent = explode("\r\n",$content);
	$first = 0;
	$end = count($arrContent);
	while($first<=$end){
		$i = floor(($first+$end)/2);
		$arrLine = explode("||",$arrContent[$i]);
		if(sprintf("%u",ip2long($arrLine[0])) > $ip){
			$end = $i;
		}
		else if(sprintf("%u",ip2long($arrLine[0])) <= $ip && sprintf("%u",ip2long($arrLine[1])) < $ip){
			$first = $i;
		}
		else if(sprintf("%u",ip2long($arrLine[0])) <= $ip && sprintf("%u",ip2long($arrLine[1])) >= $ip){
			return $arrLine[2];
		}
	}
}

/*
 * Function: CheckIP
 * Return：string
 */
function CheckIP($ip){
	//判断国外ip
	$myLand = false;
	$ipArea = explode('.',$ip);

	if($ipArea[0] >= 58 && $ipArea[0] <= 61){
		$myLand = true;
		if($ipArea[0] == 58 && $ipArea[1] < 14){
			$myLand = false;
		}
		if($ipArea[0] == 61 && $ipArea[1] > 244){
			$myLand = false;
		}
	}
	if($ipArea[0] >= 116 && $ipArea[0] <= 202){
		$myLand = true;
		if($ipArea[0] == 202 && $ipArea[1] > 207){
			$myLand = false;
		}
	}
	if($ipArea[0] == 211 && (($ipArea[1] >= 20 && $ipArea[1] <= 23) || ($ipArea[1] >= 64 && $ipArea[1] <= 103) || ($ipArea[1] >= 136 && $ipArea[1] <= 167))){
		$myLand = true;
	}
	if($ipArea[0] >= 218 && $ipArea[0] <= 222){
		$myLand = true;
	}
	return $myLand;
}

function MDCUserPwd($pwd){
	return md5($pwd."-Cookie");
}

function GetCUserPwd($str){
	$arrCUser = explode("\t",$str);
	return $arrCUser[1];
}

function GetCUserID(){
	if(isset($_COOKIE['cUser'])){
		$arrUser = explode("\t",$_COOKIE['cUser']['userID']);
	}
	return $arrUser[0];
}
function GetCUserDomain(){
	if(isset($_COOKIE['cUser'])){
		$arrUser = explode("\t",$_COOKIE['cUser']['domain']);
	}
	return $arrUser[0];
}
function GetCUserName(){
	if(isset($_COOKIE['cUser'])){
		$arrUser = explode("\t",$_COOKIE['cUser']['userName']);
	}
	return $arrUser[0];
}

/*
 * Function: GetMTime
 * Return：string(12)
 */
function GetMTime(){
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec)*100;
}


/*
 * Function: GetRandMail
 * Parameter: num
 * Return：array
 */
function GetRandMail($num){
	$str = "abcdefghijklmnopqrstuvwxyz0123456789_-.";
	$arrPrefix = array("com","cn");
	for($n=0;$n<$num;$n++){
		$mail1=$mail2="";
		for($i=0;$i<rand(2,4);$i++){
			$mail1 .= substr($str,rand(1,strlen($str)-14),1);
		}
		for($i=0;$i<rand(2,4);$i++){
			$mail1 .= substr($str,rand(1,strlen($str)),1);
		}
		for($i=0;$i<rand(2,4);$i++){
			$mail1 .= substr($str,rand(1,strlen($str)-14),1);
		}
		for($i=0;$i<rand(3,7);$i++){
			$mail2 .= substr($str,rand(1,strlen($str)-14),1);
		}
		$arrTmp[$n] = $mail1."@".$mail2.".".$arrPrefix[rand(0,1)];
	}
	return $arrTmp;
}

/*
 * Function: FckEdit
 * Parameter: objFck
 * Parameter: path
 * Parameter: tool
 * Parameter: ,$height
 * Parameter: value
 * Return：string
 */
function FckEdit($objFck,$path,$tool,$height,$value=""){
	$objFck -> BasePath = $path;
	$objFck -> ToolbarSet = $tool;
	$objFck -> Height = $height;
	$objFck -> Value = $value;
	ob_start();
	$objFck -> Create();
	$fck = ob_get_contents();
	ob_end_clean();
	return $fck;
}


/*
 * Function: DownFile
 * Parameter: path
 * Parameter: fileName
 * Return：file
 */
function DownFile($path,$fileName){
	ob_end_clean();
	header("Content-Encoding: none");
	header("Content-Type: ".(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') ? 'application/octetstream' : 'application/octet-stream'));
	header("Content-Disposition: ".(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') ? 'inline; ' : 'attachment; ')."filename=".$fileName);
	header("Pragma: no-cache");
	header("Expires: 0");
	readfile($path."/".$fileName);
	$tmp=ob_get_contents();
	ob_end_clean();
	exit();
}


function GetUpFileDir($userID,$type){
	$folder = intval($userID/10000);
	$url = "/data/doudou/image.doudou.com/u/$type/$folder";
	if(!file_exists($url)){
		if(mkdir($url,0777)){
			chmod($url,0777);
		}
	}
	if(!file_exists($url."/nophoto.jpg")){
		copy("images/nophoto.jpg",$url."/nophoto.jpg");
	}
	return "u/$type/$folder";
}


/*
 * Function: Load
 * Parameter: sourceDir;
 * Parameter: sourceFile;
 * Parameter: aimFileName;
 * Parameter: arrSecExt;
 * Parameter: maxSize;
 * Return: array
 */
function Load($arrFile,$aimDir,$aimFileName,$arrSecType,$arrSecExt,$maxSize){
	$type = $arrFile['type'];
	if(array_key_exists($type,$arrSecType) == false){
		$arrErrorMsg['typeFormatError'] = true;
		return $arrErrorMsg;
	}
	$size = $arrFile['size'];
	if($size > $maxSize){
		$arrErrorMsg['sizeMaxError'] = true;
		return $arrErrorMsg;
	}
	$arrTmpName = explode(".",$arrFile['name']);
	$extName = $arrTmpName[count($arrTmpName)-1];
	if(in_array(strtolower($extName),$arrSecExt)==false){
		$arrErrorMsg['extFormatError'] = true;
		return $arrErrorMsg;
	}
	if(is_uploaded_file($arrFile['tmp_name'])){
		if(move_uploaded_file($arrFile['tmp_name'],$aimDir."/".$aimFileName.".".$extName)){
			$arrErrorMsg['loadSucceed'] = $aimFileName.".".$extName;
			return $arrErrorMsg;
		}
		else{
			$arrErrorMsg['loadError'] = true;
			return $arrErrorMsg;
		}
	}
	else{
		$arrErrorMsg['postError'] = true;
		return $arrErrorMsg;
	}
}



/*
 * Function: ImgResize
 * Parameter: sourceImg;
 * Parameter: aimDir;
 * Parameter: aimFileName;
 * Parameter: aimWidth;
 * Parameter: aimHeight;
 * Return: fileName
 */
function ImgResize($sourceImg,$aimDir,$aimFileName,$aimWidth,$aimHeight){

	if(file_exists($sourceImg)){
		$arrType = array("1"=>"gif","2"=>"jpeg","3"=>"png");
		list($sourceWidth,$sourceHeight,$sourceType) = getimagesize($sourceImg);
		if(!isset($arrType[$sourceType])){
			return false;
		}
		$arrTmpName = explode(".",$sourceImg);
    $extName = $arrTmpName[count($arrTmpName)-1];

		$sourceType = $arrType[$sourceType];
		$funImageCreate = "imagecreatefrom$sourceType";
		$sImg = $funImageCreate($sourceImg);
		if($sourceWidth > $aimWidth || $sourceHeight > $aimHeight){
			if(($sourceWidth / $aimWidth) >= ($sourceHeight / $aimHeight)){
				$scale = ($sourceWidth / $aimWidth);
			}
			else{
				$scale = ($sourceHeight / $aimHeight);
			}
			$aimWidth = $sourceWidth / $scale;
			$aimHeight = $sourceHeight / $scale;
			$aimImg = imagecreatetruecolor($aimWidth,$aimHeight);
			imagefilledrectangle($aimImg,0,0,$aimWidth,$aimHeight,imagecolorallocate($aimImg,255,255,255));
			imagecopyresampled($aimImg,$sImg,0,0,0,0,$aimWidth,$aimHeight,$sourceWidth,$sourceHeight);
			$funImg = "image$sourceType";
			$funImg($aimImg,$aimDir."/".$aimFileName);
			imagedestroy($aimImg);
			imagedestroy($sImg);
		}
		else{
			copy($sourceImg,$aimDir."/".$aimFileName);
		}
		return $aimFileName;
	}
	else{
		return false;
	}
}


/*
 * Function: waterImage
 * Parameter: string;
 * Parameter: int;
 * Parameter: int;
 * Parameter: string;
 * Parameter: int;
 * Parameter: int;
 * Parameter: int;
 * Return: bool
 */
function waterImage($sourceImg,$waterText="",$wTextX=0,$wTextY=0,$waterImg="",$wImgX=0,$wImgY=0,$wImgPct=50){
	if(!file_exists($sourceImg)){
		return false;
	}
	$arrType = array("1"=>"gif","2"=>"jpeg","3"=>"png");
	list($sourceWidth,$sourceHeight,$sourceType) = getimagesize($sourceImg);
	if(!isset($arrType[$sourceType])){
		return false;
	}
	$sourceType = $arrType[$sourceType];
	$funImageCreate = "imagecreatefrom$sourceType";
	$funImage = "image$sourceType";
	$sImg = $funImageCreate($sourceImg);
	if($waterText){
		$white=imagecolorallocate($sImg,255,255,255);
		imagestring($sImg,5,$wTextX,$wTextY,$waterText,$white);
	}
	if($waterImg && file_exists($waterImg)){
		list($wImgWidth,$wImgHeight,$wImgType) = getimagesize($waterImg);
		if(!isset($arrType[$wImgType])){
			return false;
		}
		$sourceType = $arrType[$wImgType];
		$funImageCreate = "imagecreatefrom$sourceType";
		$wImg = $funImageCreate($waterImg);
		imagecopymerge($sImg,$wImg,$wImgX,$wImgY,0,0,$wImgWidth,$wImgHeight,$wImgPct);
		imagedestroy($wImg);
	}
	return $funImage($sImg,$sourceImg);
}




/*
 * Function: CopyDir
 * Parameter: sourceDir;
 * Parameter: aimDir;
 * Return：bool
 */
function CopyDir($sourceDir,$aimDir){
	$succeed = true;
	if(!file_exists($aimDir)){
		if(!mkdir($aimDir,0777)){
			return false;
		}
	}
	$objDir = opendir($sourceDir);
	while(false !== ($fileName = readdir($objDir))){
		if(($fileName != ".") && ($fileName != "..")){
			if(!is_dir("$sourceDir/$fileName")){
				if(!copy("$sourceDir/$fileName","$aimDir/$fileName")){
					$succeed = false;
					break;
				}
			}
			else{
				CopyDir("$sourceDir/$fileName","$aimDir/$fileName");
			}
		}
	}
	closedir($objDir);
	return $succeed;
}

/*
 * Function: DeleteDir
 * Parameter: sourceDir;
 * Return：bool
 */
function DeleteDir($sourceDir){
	$succeed = true;
	if(file_exists($sourceDir)){
		$objDir = opendir($sourceDir);
		while(false !== ($fileName = readdir($objDir))){
			if(($fileName != ".") && ($fileName != "..")){
				chmod("$sourceDir/$fileName",0777);
				if(!is_dir("$sourceDir/$fileName")){
					if(!unlink("$sourceDir/$fileName")){
						$succeed = false;
						break;
					}
				}
				else{
					DeleteDir("$sourceDir/$fileName");
				}
			}
		}
		if(!readdir($objDir)){
			closedir($objDir);
			if(!rmdir($sourceDir)){
				$succeed = false;
			}
		}
	}
	return $succeed;
}


/*
 * Function: Encrypt
 * Parameter: string;
 * Return：string
 */
function Encrypt($v){
	return md5($v);
}

/*
 * Function: ChkSafeCode
 * Parameter: code
 * Return：bool
 */
function ChkSafeCode($code){
	if(strtolower($_SESSION['sSafeCode']) != strtolower($code)){
		return false;
	}
	else{
		return true;
	}
}

/*
 * Function: ChkUserLogin
 */
function ChkUserLogin(){
	global $arrMsg;
	if(!isset($_SESSION['sUser'])){
		AlertMsg('对不起，您还没有登陆，请先登陆！',"/login.php?re=http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],"parent");
	}
}

/*
 * Function: ChkAdminLogin
 */
function ChkAdminLogin(){
	global $arrMsg;
	if(!isset($_SESSION['sMaster'])){
		AlertMsg('',"login.php","parent");
	}
}

/**
 * 将数据倒序排列，从第一个开始取，返回第一个有值的数据
 * @param  $arr Array 数组
 * @return String
 */
function array_reverse_first($arr) {
	$arr = array_reverse($arr);
	foreach ($arr as $temp) {
		if ($temp !== '') {
			 return $temp;
		}
	}
	return "";
}

/**
 * 得到栏目树结构
 *
 * @param array $arrid	栏目数组列表
 * @param array $returnarr	栏目树结构
 * @param String $prefix	栏目显示前缀
 * @return array 栏目树结构
 */
function getLanmu($arrid,&$returnarr,&$prefix) {
	//global $count;
	foreach ($arrid as $news_type) {
		$returnarr[$news_type["newstype_id"]] = $prefix . $news_type["type_name"];

		$where = "," . $news_type["newstype_id"] . ",";
		global $objC;
		$sql = "SELECT `newstype_id`,`type_name`,`parentID` FROM `news_type` WHERE parentID like '" . $where . "%'";
		echo $sql . "<br>";
		$arr = $objC ->GetAll($sql);
		if ($arr) {
			$prefix .= "----";
			getLanmu($arr,$returnarr,$prefix);
		} else {
			$prefix = substr($prefix,4,strlen($prefix));
		}
	}
	return $returnarr;
}

function getClassList(&$classes, $stpParentID = ',', $level = 0) {
        if (is_array($classes)) {
            $newArray = array();
            $level++;
        	foreach ($classes as $class)
        	{
        	    if ($stpParentID == $class['parentID']) {
        	        $newArray[] = array('newstype_id'=>$class['newstype_id'], 'type_name'=>$class['type_name'], 'parentID'=>$class['parentID'], 'stpLevel'=>$level -1);
        	        $arr = getClassList($classes,$class['parentID'] . $class['newstype_id'] . ",", $level);
        	        if ($arr) {
        	        	$newArray = array_merge($newArray, (array) $arr);
        	        }
        	    }
        	}
        	$level--;
        }
        return $newArray;
}





/**
 *  加载fckeditor
 *
 * @param String $id	fckeditorID
 * @param String $fck_path	fckeditor的路径
 * @param int $width	fckeditor宽度
 * @param int $height	fckeditor高度
 * @return Stirng	fckeditor的html内容
 */
function getFckeditor($id,$fck_path,$width,$height) {
	include(EDITOR_PATH . "fckeditor.php");
	$oFCKeditor = new FCKeditor($id) ;//'news_content'
	$oFCKeditor->BasePath = $fck_path;//"fckeditor/";

	//$oFCKeditor->Value		= '<p>This is some <strong>sample text</strong>. You are using <a href="http://www.fckeditor.net/">FCKeditor</a>.</p>' ;
	$oFCKeditor->Width = $width;
	$oFCKeditor->Height = $height;
	return $oFCKeditor;
	//$editor_content = $oFCKeditor->CreateHtml();
	//return $editor_content;
}

$pinyin_dictionary = array(
    array("a", -20319),
    array("ai", -20317),
    array("an", -20304),
    array("ang", -20295),
    array("ao", -20292),
    array("ba", -20283),
    array("bai", -20265),
    array("ban", -20257),
    array("bang", -20242),
    array("bao", -20230),
    array("bei", -20051),
    array("ben", -20036),
    array("beng", -20032),
    array("bi", -20026),
    array("bian", -20002),
    array("biao", -19990),
    array("bie", -19986),
    array("bin", -19982),
    array("bing", -19976),
    array("bo", -19805),
    array("bu", -19784),
    array("ca", -19775),
    array("cai", -19774),
    array("can", -19763),
    array("cang", -19756),
    array("cao", -19751),
    array("ce", -19746),
    array("ceng", -19741),
    array("cha", -19739),
    array("chai", -19728),
    array("chan", -19725),
    array("chang", -19715),
    array("chao", -19540),
    array("che", -19531),
    array("chen", -19525),
    array("cheng", -19515),
    array("chi", -19500),
    array("chong", -19484),
    array("chou", -19479),
    array("chu", -19467),
    array("chuai", -19289),
    array("chuan", -19288),
    array("chuang", -19281),
    array("chui", -19275),
    array("chun", -19270),
    array("chuo", -19263),
    array("ci", -19261),
    array("cong", -19249),
    array("cou", -19243),
    array("cu", -19242),
    array("cuan", -19238),
    array("cui", -19235),
    array("cun", -19227),
    array("cuo", -19224),
    array("da", -19218),
    array("dai", -19212),
    array("dan", -19038),
    array("dang", -19023),
    array("dao", -19018),
    array("de", -19006),
    array("deng", -19003),
    array("di", -18996),
    array("dian", -18977),
    array("diao", -18961),
    array("die", -18952),
    array("ding", -18783),
    array("diu", -18774),
    array("dong", -18773),
    array("dou", -18763),
    array("du", -18756),
    array("duan", -18741),
    array("dui", -18735),
    array("dun", -18731),
    array("duo", -18722),
    array("e", -18710),
    array("en", -18697),
    array("er", -18696),
    array("fa", -18526),
    array("fan", -18518),
    array("fang", -18501),
    array("fei", -18490),
    array("fen", -18478),
    array("feng", -18463),
    array("fo", -18448),
    array("fou", -18447),
    array("fu", -18446),
    array("ga", -18239),
    array("gai", -18237),
    array("gan", -18231),
    array("gang", -18220),
    array("gao", -18211),
    array("ge", -18201),
    array("gei", -18184),
    array("gen", -18183),
    array("geng", -18181),
    array("gong", -18012),
    array("gou", -17997),
    array("gu", -17988),
    array("gua", -17970),
    array("guai", -17964),
    array("guan", -17961),
    array("guang", -17950),
    array("gui", -17947),
    array("gun", -17931),
    array("guo", -17928),
    array("ha", -17922),
    array("hai", -17759),
    array("han", -17752),
    array("hang", -17733),
    array("hao", -17730),
    array("he", -17721),
    array("hei", -17703),
    array("hen", -17701),
    array("heng", -17697),
    array("hong", -17692),
    array("hou", -17683),
    array("hu", -17676),
    array("hua", -17496),
    array("huai", -17487),
    array("huan", -17482),
    array("huang", -17468),
    array("hui", -17454),
    array("hun", -17433),
    array("huo", -17427),
    array("ji", -17417),
    array("jia", -17202),
    array("jian", -17185),
    array("jiang", -16983),
    array("jiao", -16970),
    array("jie", -16942),
    array("jin", -16915),
    array("jing", -16733),
    array("jiong", -16708),
    array("jiu", -16706),
    array("ju", -16689),
    array("juan", -16664),
    array("jue", -16657),
    array("jun", -16647),
    array("ka", -16474),
    array("kai", -16470),
    array("kan", -16465),
    array("kang", -16459),
    array("kao", -16452),
    array("ke", -16448),
    array("ken", -16433),
    array("keng", -16429),
    array("kong", -16427),
    array("kou", -16423),
    array("ku", -16419),
    array("kua", -16412),
    array("kuai", -16407),
    array("kuan", -16403),
    array("kuang", -16401),
    array("kui", -16393),
    array("kun", -16220),
    array("kuo", -16216),
    array("la", -16212),
    array("lai", -16205),
    array("lan", -16202),
    array("lang", -16187),
    array("lao", -16180),
    array("le", -16171),
    array("lei", -16169),
    array("leng", -16158),
    array("li", -16155),
    array("lia", -15959),
    array("lian", -15958),
    array("liang", -15944),
    array("liao", -15933),
    array("lie", -15920),
    array("lin", -15915),
    array("ling", -15903),
    array("liu", -15889),
    array("long", -15878),
    array("lou", -15707),
    array("lu", -15701),
    array("lv", -15681),
    array("luan", -15667),
    array("lue", -15661),
    array("lun", -15659),
    array("luo", -15652),
    array("ma", -15640),
    array("mai", -15631),
    array("man", -15625),
    array("mang", -15454),
    array("mao", -15448),
    array("me", -15436),
    array("mei", -15435),
    array("men", -15419),
    array("meng", -15416),
    array("mi", -15408),
    array("mian", -15394),
    array("miao", -15385),
    array("mie", -15377),
    array("min", -15375),
    array("ming", -15369),
    array("miu", -15363),
    array("mo", -15362),
    array("mou", -15183),
    array("mu", -15180),
    array("na", -15165),
    array("nai", -15158),
    array("nan", -15153),
    array("nang", -15150),
    array("nao", -15149),
    array("ne", -15144),
    array("nei", -15143),
    array("nen", -15141),
    array("neng", -15140),
    array("ni", -15139),
    array("nian", -15128),
    array("niang", -15121),
    array("niao", -15119),
    array("nie", -15117),
    array("nin", -15110),
    array("ning", -15109),
    array("niu", -14941),
    array("nong", -14937),
    array("nu", -14933),
    array("nv", -14930),
    array("nuan", -14929),
    array("nue", -14928),
    array("nuo", -14926),
    array("o", -14922),
    array("ou", -14921),
    array("pa", -14914),
    array("pai", -14908),
    array("pan", -14902),
    array("pang", -14894),
    array("pao", -14889),
    array("pei", -14882),
    array("pen", -14873),
    array("peng", -14871),
    array("pi", -14857),
    array("pian", -14678),
    array("piao", -14674),
    array("pie", -14670),
    array("pin", -14668),
    array("ping", -14663),
    array("po", -14654),
    array("pu", -14645),
    array("qi", -14630),
    array("qia", -14594),
    array("qian", -14429),
    array("qiang", -14407),
    array("qiao", -14399),
    array("qie", -14384),
    array("qin", -14379),
    array("qing", -14368),
    array("qiong", -14355),
    array("qiu", -14353),
    array("qu", -14345),
    array("quan", -14170),
    array("que", -14159),
    array("qun", -14151),
    array("ran", -14149),
    array("rang", -14145),
    array("rao", -14140),
    array("re", -14137),
    array("ren", -14135),
    array("reng", -14125),
    array("ri", -14123),
    array("rong", -14122),
    array("rou", -14112),
    array("ru", -14109),
    array("ruan", -14099),
    array("rui", -14097),
    array("run", -14094),
    array("ruo", -14092),
    array("sa", -14090),
    array("sai", -14087),
    array("san", -14083),
    array("sang", -13917),
    array("sao", -13914),
    array("se", -13910),
    array("sen", -13907),
    array("seng", -13906),
    array("sha", -13905),
    array("shai", -13896),
    array("shan", -13894),
    array("shang", -13878),
    array("shao", -13870),
    array("she", -13859),
    array("shen", -13847),
    array("sheng", -13831),
    array("shi", -13658),
    array("shou", -13611),
    array("shu", -13601),
    array("shua", -13406),
    array("shuai", -13404),
    array("shuan", -13400),
    array("shuang", -13398),
    array("shui", -13395),
    array("shun", -13391),
    array("shuo", -13387),
    array("si", -13383),
    array("song", -13367),
    array("sou", -13359),
    array("su", -13356),
    array("suan", -13343),
    array("sui", -13340),
    array("sun", -13329),
    array("suo", -13326),
    array("ta", -13318),
    array("tai", -13147),
    array("tan", -13138),
    array("tang", -13120),
    array("tao", -13107),
    array("te", -13096),
    array("teng", -13095),
    array("ti", -13091),
    array("tian", -13076),
    array("tiao", -13068),
    array("tie", -13063),
    array("ting", -13060),
    array("tong", -12888),
    array("tou", -12875),
    array("tu", -12871),
    array("tuan", -12860),
    array("tui", -12858),
    array("tun", -12852),
    array("tuo", -12849),
    array("wa", -12838),
    array("wai", -12831),
    array("wan", -12829),
    array("wang", -12812),
    array("wei", -12802),
    array("wen", -12607),
    array("weng", -12597),
    array("wo", -12594),
    array("wu", -12585),
    array("xi", -12556),
    array("xia", -12359),
    array("xian", -12346),
    array("xiang", -12320),
    array("xiao", -12300),
    array("xie", -12120),
    array("xin", -12099),
    array("xing", -12089),
    array("xiong", -12074),
    array("xiu", -12067),
    array("xu", -12058),
    array("xuan", -12039),
    array("xue", -11867),
    array("xun", -11861),
    array("ya", -11847),
    array("yan", -11831),
    array("yang", -11798),
    array("yao", -11781),
    array("ye", -11604),
    array("yi", -11589),
    array("yin", -11536),
    array("ying", -11358),
    array("yo", -11340),
    array("yong", -11339),
    array("you", -11324),
    array("yu", -11303),
    array("yuan", -11097),
    array("yue", -11077),
    array("yun", -11067),
    array("za", -11055),
    array("zai", -11052),
    array("zan", -11045),
    array("zang", -11041),
    array("zao", -11038),
    array("ze", -11024),
    array("zei", -11020),
    array("zen", -11019),
    array("zeng", -11018),
    array("zha", -11014),
    array("zhai", -10838),
    array("zhan", -10832),
    array("zhang", -10815),
    array("zhao", -10800),
    array("zhe", -10790),
    array("zhen", -10780),
    array("zheng", -10764),
    array("zhi", -10587),
    array("zhong", -10544),
    array("zhou", -10533),
    array("zhu", -10519),
    array("zhua", -10331),
    array("zhuai", -10329),
    array("zhuan", -10328),
    array("zhuang", -10322),
    array("zhui", -10315),
    array("zhun", -10309),
    array("zhuo", -10307),
    array("zi", -10296),
    array("zong", -10281),
    array("zou", -10274),
    array("zu", -10270),
    array("zuan", -10262),
    array("zui", -10260),
    array("zun", -10256),
    array("zuo", -10254)
);
function transform($num){
    global $pinyin_dictionary;
    if ($num > 0 && $num < 160) {
        return chr($num);
    }
    elseif ($num < -20319 || $num > -10247) {
        return "";
    }
    else {
        for ($i = count($pinyin_dictionary) - 1; $i >= 0; $i--) {
            if ($pinyin_dictionary[$i][1] <= $num) {
                break;
            }
        }
        return $pinyin_dictionary[$i][0];
    }
}
function zh2pinyin($string)
{
    $output = "";
    for ($i=0; $i < strlen($string); $i++) {
        $letter = ord(substr($string, $i, 1));
        if($letter > 160){
            $tmp = ord(substr($string, ++$i, 1));
            $letter = $letter * 256 + $tmp - 65536;
        }
        $output .= transform($letter);
    }
    return $output;
}

function unescape($str) {
  $str = urldecode($str);
  preg_match_all("/(?:%u.{4}|&#x.;|&#d+;|.+)/U",$str,$r);
  $ar = $r[0];
  foreach($ar as $k=>$v) {
    if(substr($v,0,2) == "%u")
      $ar[$k] = iconv("UCS-2BE","utf-8",pack("H4",substr($v,-4)));
    elseif(substr($v,0,3) == "&#x")
      $ar[$k] = iconv("UCS-2BE","utf-8",pack("H4",substr($v,3,-1)));
    elseif(substr($v,0,2) == "&#") {
      $ar[$k] = iconv("UCS-2BE","utf-8",pack("n",substr($v,2,-1)));
    }
  }
  return join("",$ar);
}

function flushHTML($msg){
	echo $msg;
	$str = '<script language="javascript">
	window.scrollTo(0,99999);
	</script>';
	echo $str;
	//ob_flush();
  flush();
}

if(!function_exists('json_encode')){
	function json_encode($arr)
	{
	    $json_str = "";
	    if(is_array($arr))
	    {
	      $pure_array = true;
	      $array_length = count($arr);
	      for($i=0;$i<$array_length;$i++)
	      {
	        if(! isset($arr[$i]))
	        {
	          $pure_array = false;
	          break;
	        }
	      }
	      if($pure_array)
	      {
	        $json_str ="[";
	        $temp = array();
	        for($i=0;$i<$array_length;$i++)
	        {
	          $temp[] = sprintf("%s", json_encode($arr[$i]));
	        }
	        $json_str .= implode(",",$temp);
	        $json_str .="]";
	      }
	      else
	      {
	        $json_str ="{";
	        $temp = array();
	        foreach($arr as $key => $value)
	        {
	          $temp[] = sprintf("\"%s\":%s", $key, json_encode($value));
	        }
	        $json_str .= implode(",",$temp);
	        $json_str .="}";
	      }
	    }
	    else
	    {
	      if(is_string($arr))
	      {
	        $json_str = "\"". json_encode_string($arr) . "\"";
	      }
	      else if(is_numeric($arr))
	      {
	        $json_str = $arr;
	      }
	      else
	      {
	        $json_str = "\"". json_encode_string($arr) . "\"";
	      }
	    }
	    return $json_str;
	}

	function json_encode_string($in_str) {
	    mb_internal_encoding("UTF-8");
	    $convmap = array(0x80, 0xFFFF, 0, 0xFFFF);
	    $str = "";
	    for ($i = mb_strlen($in_str)-1; $i>=0; $i--) {
	        $mb_char = mb_substr($in_str, $i, 1);
	        if (mb_ereg("&#(\\d+);", mb_encode_numericentity($mb_char, $convmap, "UTF-8"), $match)) {
	            $str = sprintf("\\u%04x", $match[1]) . $str;
	        } else {
	            $str = $mb_char . $str;
	        }
	    }
	    return $str;
	}
	define('SERVICES_JSON_SLICE',   1);

define('SERVICES_JSON_IN_STR',  2);

define('SERVICES_JSON_IN_ARR',  3);

define('SERVICES_JSON_IN_OBJ',  4);

define('SERVICES_JSON_IN_CMT', 5);

define('SERVICES_JSON_LOOSE_TYPE', 16);

define('SERVICES_JSON_SUPPRESS_ERRORS', 32);
	function reduce_string($str)
    {
        $str = preg_replace(array(

                // eliminate single line comments in '// ...' form
                '#^\s*//(.+)$#m',

                // eliminate multi-line comments in '/* ... */' form, at start of string
                '#^\s*/\*(.+)\*/#Us',

                // eliminate multi-line comments in '/* ... */' form, at end of string
                '#/\*(.+)\*/\s*$#Us'

            ), '', $str);

        // eliminate extraneous space
        return trim($str);
    }
  function utf162utf8($utf16)
    {
        // oh please oh please oh please oh please oh please
        if(function_exists('mb_convert_encoding')) {
            return mb_convert_encoding($utf16, 'UTF-8', 'UTF-16');
        }

        $bytes = (ord($utf16{0}) << 8) | ord($utf16{1});

        switch(true) {
            case ((0x7F & $bytes) == $bytes):
                // this case should never be reached, because we are in ASCII range
                // see: http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                return chr(0x7F & $bytes);

            case (0x07FF & $bytes) == $bytes:
                // return a 2-byte UTF-8 character
                // see: http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                return chr(0xC0 | (($bytes >> 6) & 0x1F))
                     . chr(0x80 | ($bytes & 0x3F));

            case (0xFFFF & $bytes) == $bytes:
                // return a 3-byte UTF-8 character
                // see: http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                return chr(0xE0 | (($bytes >> 12) & 0x0F))
                     . chr(0x80 | (($bytes >> 6) & 0x3F))
                     . chr(0x80 | ($bytes & 0x3F));
        }

        // ignoring UTF-32 for now, sorry
        return '';
    }
	function json_decode($str)
    {
        $str = reduce_string($str);

        switch (strtolower($str)) {
            case 'true':
                return true;

            case 'false':
                return false;

            case 'null':
                return null;

            default:
                $m = array();

                if (is_numeric($str)) {
                    // Lookie-loo, it's a number

                    // This would work on its own, but I'm trying to be
                    // good about returning integers where appropriate:
                    // return (float)$str;

                    // Return float or int, as appropriate
                    return ((float)$str == (integer)$str)
                        ? (integer)$str
                        : (float)$str;

                } elseif (preg_match('/^("|\').*(\1)$/s', $str, $m) && $m[1] == $m[2]) {
                    // STRINGS RETURNED IN UTF-8 FORMAT
                    $delim = substr($str, 0, 1);
                    $chrs = substr($str, 1, -1);
                    $utf8 = '';
                    $strlen_chrs = strlen($chrs);

                    for ($c = 0; $c < $strlen_chrs; ++$c) {

                        $substr_chrs_c_2 = substr($chrs, $c, 2);
                        $ord_chrs_c = ord($chrs{$c});

                        switch (true) {
                            case $substr_chrs_c_2 == '\b':
                                $utf8 .= chr(0x08);
                                ++$c;
                                break;
                            case $substr_chrs_c_2 == '\t':
                                $utf8 .= chr(0x09);
                                ++$c;
                                break;
                            case $substr_chrs_c_2 == '\n':
                                $utf8 .= chr(0x0A);
                                ++$c;
                                break;
                            case $substr_chrs_c_2 == '\f':
                                $utf8 .= chr(0x0C);
                                ++$c;
                                break;
                            case $substr_chrs_c_2 == '\r':
                                $utf8 .= chr(0x0D);
                                ++$c;
                                break;

                            case $substr_chrs_c_2 == '\\"':
                            case $substr_chrs_c_2 == '\\\'':
                            case $substr_chrs_c_2 == '\\\\':
                            case $substr_chrs_c_2 == '\\/':
                                if (($delim == '"' && $substr_chrs_c_2 != '\\\'') ||
                                   ($delim == "'" && $substr_chrs_c_2 != '\\"')) {
                                    $utf8 .= $chrs{++$c};
                                }
                                break;

                            case preg_match('/\\\u[0-9A-F]{4}/i', substr($chrs, $c, 6)):
                                // single, escaped unicode character
                                $utf16 = chr(hexdec(substr($chrs, ($c + 2), 2)))
                                       . chr(hexdec(substr($chrs, ($c + 4), 2)));
                                $utf8 .= utf162utf8($utf16);
                                $c += 5;
                                break;

                            case ($ord_chrs_c >= 0x20) && ($ord_chrs_c <= 0x7F):
                                $utf8 .= $chrs{$c};
                                break;

                            case ($ord_chrs_c & 0xE0) == 0xC0:
                                // characters U-00000080 - U-000007FF, mask 110XXXXX
                                //see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                                $utf8 .= substr($chrs, $c, 2);
                                ++$c;
                                break;

                            case ($ord_chrs_c & 0xF0) == 0xE0:
                                // characters U-00000800 - U-0000FFFF, mask 1110XXXX
                                // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                                $utf8 .= substr($chrs, $c, 3);
                                $c += 2;
                                break;

                            case ($ord_chrs_c & 0xF8) == 0xF0:
                                // characters U-00010000 - U-001FFFFF, mask 11110XXX
                                // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                                $utf8 .= substr($chrs, $c, 4);
                                $c += 3;
                                break;

                            case ($ord_chrs_c & 0xFC) == 0xF8:
                                // characters U-00200000 - U-03FFFFFF, mask 111110XX
                                // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                                $utf8 .= substr($chrs, $c, 5);
                                $c += 4;
                                break;

                            case ($ord_chrs_c & 0xFE) == 0xFC:
                                // characters U-04000000 - U-7FFFFFFF, mask 1111110X
                                // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                                $utf8 .= substr($chrs, $c, 6);
                                $c += 5;
                                break;

                        }

                    }

                    return $utf8;

                } elseif (preg_match('/^\[.*\]$/s', $str) || preg_match('/^\{.*\}$/s', $str)) {
                    // array, or object notation

                    if ($str{0} == '[') {
                        $stk = array(SERVICES_JSON_IN_ARR);
                        $arr = array();
                    } else {
                        if (0 & SERVICES_JSON_LOOSE_TYPE) {
                            $stk = array(SERVICES_JSON_IN_OBJ);
                            $obj = array();
                        } else {
                            $stk = array(SERVICES_JSON_IN_OBJ);
                            $obj = new stdClass();
                        }
                    }

                    array_push($stk, array('what'  => SERVICES_JSON_SLICE,
                                           'where' => 0,
                                           'delim' => false));

                    $chrs = substr($str, 1, -1);
                    $chrs = reduce_string($chrs);

                    if ($chrs == '') {
                        if (reset($stk) == SERVICES_JSON_IN_ARR) {
                            return $arr;

                        } else {
                            return $obj;

                        }
                    }

                    //print("\nparsing {$chrs}\n");

                    $strlen_chrs = strlen($chrs);

                    for ($c = 0; $c <= $strlen_chrs; ++$c) {

                        $top = end($stk);
                        $substr_chrs_c_2 = substr($chrs, $c, 2);

                        if (($c == $strlen_chrs) || (($chrs{$c} == ',') && ($top['what'] == SERVICES_JSON_SLICE))) {
                            // found a comma that is not inside a string, array, etc.,
                            // OR we've reached the end of the character list
                            $slice = substr($chrs, $top['where'], ($c - $top['where']));
                            array_push($stk, array('what' => SERVICES_JSON_SLICE, 'where' => ($c + 1), 'delim' => false));
                            //print("Found split at {$c}: ".substr($chrs, $top['where'], (1 + $c - $top['where']))."\n");

                            if (reset($stk) == SERVICES_JSON_IN_ARR) {
                                // we are in an array, so just push an element onto the stack
                                array_push($arr, json_decode($slice));

                            } elseif (reset($stk) == SERVICES_JSON_IN_OBJ) {
                                // we are in an object, so figure
                                // out the property name and set an
                                // element in an associative array,
                                // for now
                                $parts = array();
                                
                                if (preg_match('/^\s*(["\'].*[^\\\]["\'])\s*:\s*(\S.*),?$/Uis', $slice, $parts)) {
                                    // "name":value pair
                                    $key = json_decode($parts[1]);
                                    $val = json_decode($parts[2]);

                                    if (0 & SERVICES_JSON_LOOSE_TYPE) {
                                        $obj[$key] = $val;
                                    } else {
                                        $obj->$key = $val;
                                    }
                                } elseif (preg_match('/^\s*(\w+)\s*:\s*(\S.*),?$/Uis', $slice, $parts)) {
                                    // name:value pair, where name is unquoted
                                    $key = $parts[1];
                                    $val = json_decode($parts[2]);

                                    if (0 & SERVICES_JSON_LOOSE_TYPE) {
                                        $obj[$key] = $val;
                                    } else {
                                        $obj->$key = $val;
                                    }
                                }

                            }

                        } elseif ((($chrs{$c} == '"') || ($chrs{$c} == "'")) && ($top['what'] != SERVICES_JSON_IN_STR)) {
                            // found a quote, and we are not inside a string
                            array_push($stk, array('what' => SERVICES_JSON_IN_STR, 'where' => $c, 'delim' => $chrs{$c}));
                            //print("Found start of string at {$c}\n");

                        } elseif (($chrs{$c} == $top['delim']) &&
                                 ($top['what'] == SERVICES_JSON_IN_STR) &&
                                 ((strlen(substr($chrs, 0, $c)) - strlen(rtrim(substr($chrs, 0, $c), '\\'))) % 2 != 1)) {
                            // found a quote, we're in a string, and it's not escaped
                            // we know that it's not escaped becase there is _not_ an
                            // odd number of backslashes at the end of the string so far
                            array_pop($stk);
                            //print("Found end of string at {$c}: ".substr($chrs, $top['where'], (1 + 1 + $c - $top['where']))."\n");

                        } elseif (($chrs{$c} == '[') &&
                                 in_array($top['what'], array(SERVICES_JSON_SLICE, SERVICES_JSON_IN_ARR, SERVICES_JSON_IN_OBJ))) {
                            // found a left-bracket, and we are in an array, object, or slice
                            array_push($stk, array('what' => SERVICES_JSON_IN_ARR, 'where' => $c, 'delim' => false));
                            //print("Found start of array at {$c}\n");

                        } elseif (($chrs{$c} == ']') && ($top['what'] == SERVICES_JSON_IN_ARR)) {
                            // found a right-bracket, and we're in an array
                            array_pop($stk);
                            //print("Found end of array at {$c}: ".substr($chrs, $top['where'], (1 + $c - $top['where']))."\n");

                        } elseif (($chrs{$c} == '{') &&
                                 in_array($top['what'], array(SERVICES_JSON_SLICE, SERVICES_JSON_IN_ARR, SERVICES_JSON_IN_OBJ))) {
                            // found a left-brace, and we are in an array, object, or slice
                            array_push($stk, array('what' => SERVICES_JSON_IN_OBJ, 'where' => $c, 'delim' => false));
                            //print("Found start of object at {$c}\n");

                        } elseif (($chrs{$c} == '}') && ($top['what'] == SERVICES_JSON_IN_OBJ)) {
                            // found a right-brace, and we're in an object
                            array_pop($stk);
                            //print("Found end of object at {$c}: ".substr($chrs, $top['where'], (1 + $c - $top['where']))."\n");

                        } elseif (($substr_chrs_c_2 == '/*') &&
                                 in_array($top['what'], array(SERVICES_JSON_SLICE, SERVICES_JSON_IN_ARR, SERVICES_JSON_IN_OBJ))) {
                            // found a comment start, and we are in an array, object, or slice
                            array_push($stk, array('what' => SERVICES_JSON_IN_CMT, 'where' => $c, 'delim' => false));
                            $c++;
                            //print("Found start of comment at {$c}\n");

                        } elseif (($substr_chrs_c_2 == '*/') && ($top['what'] == SERVICES_JSON_IN_CMT)) {
                            // found a comment end, and we're in one now
                            array_pop($stk);
                            $c++;

                            for ($i = $top['where']; $i <= $c; ++$i)
                                $chrs = substr_replace($chrs, ' ', $i, 1);

                            //print("Found end of comment at {$c}: ".substr($chrs, $top['where'], (1 + $c - $top['where']))."\n");

                        }

                    }

                    if (reset($stk) == SERVICES_JSON_IN_ARR) {
                        return $arr;

                    } elseif (reset($stk) == SERVICES_JSON_IN_OBJ) {
                        return $obj;

                    }

                }
        }
    }
}

function getsitefromhtml($siteContent){
	$siteContent = stripslashes($siteContent);
	$sites = array();
	$ssort = 1;
	preg_match_all("/<a(.*?)href=[\'\"](.*?)[\'\"](.*?)>(.*?)<\/a>/is", $siteContent, $result);
	foreach($result[4] as $i => $name){
    $name = trim(strip_tags($name));
    $url = $result[2][$i];
    if(empty($name) || empty($url)){
      unset($result[2][$i]);
      unset($result[4][$i]);
      continue;
    }
    $sites['sites'][] = array('name' => $name, 'url' => $url, 'siteSort'=> $ssort);
    $ssort++;
  }

  return $sites;
}
?>