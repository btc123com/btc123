<?php

/*
 * ClassName: Data for Conn
 * Date: 2008-06-08
 * Author: ziyan.suo@163.com
 */
 
class Data extends Conn{

	public function __construct(){
		parent::__construct();
	}
	
	/*
	 * Function: backUp
	 * Parameter: data;
	 * Retrun: string;
	 */
	public function backUp($data=true,$extended=false){
		$query = "SHOW TABLE STATUS FROM `".DBNAME."`";
		foreach(parent::getAll($query) as $arr){
			if($data){
				$sql .= $this->backTable($arr["Name"],$data,$extended=false);
			}
		}
		return $sql;
	}
	
	/*
	 * Function: backTable
	 * Parameter: table;
	 * Parameter: data;
	 * Return: string
	 */
	public function backTable($table,$data=true,$extended=false){
		$str = "DROP TABLE IF EXISTS `".$table."`;\r\n";
		if($arrRow = parent::getRow("SHOW CREATE TABLE ".$table)){
			$tmp .= preg_replace("/\n/","",$arrRow["Create Table"]).";\r\n";
			if($data){
				$tmp .= $this->backField($table,$extended=false);
			}
			return $str .= $tmp;
		}
	}
	
	/*
	 * Function: backField
	 * Parameter: table;
	 * Return: string
	 */
	private function backField($table,$extended=false){
		$arrRecord = parent::getAll("SELECT * FROM ".$table);
		if(count($arrRecord)){
			if($extended){
				$tmp = 'INSERT INTO `'.$table.'` VALUES ';
				foreach($arrRecord as $arr){
					$tmp .= "(";
					$com = '';
					foreach($arr as $v){
						if($v===NULL){
							$tmp .= $com.'NULL';
						}
						else{
							$tmp .= $com.'"'.$v.'"';
						}
						$com = ',';
					}
					$tmp .= "),";
				}
				$str .= substr($tmp,0,strlen($tmp)-1).";\r\n";
			}
			else{
				foreach($arrRecord as $arr){
					$tmp .= "INSERT INTO `$table` VALUES (";
					$com = '';
					foreach($arr as $v){
						if($v===NULL){
							$tmp .= $com.'NULL';
						}
						else{
							$tmp .= $com.'"'.$v.'"';
						}
						$com = ',';
					}
					$tmp .= ");\r\n";
				}
				$str .= substr($tmp,0,strlen($tmp)-1).";\r\n";
			}
			return $str;
		}
	}
		
	/*
	 * Function: renameTable
	 * Parameter: oldName;
	 * Parameter: newName;
	 * Return: bool
	 */
	public function renameTable($oldName,$newName){
		$sql = 'RENAME TABLE '.$oldName.' TO '.$newName;
		return parent::query($sql)==false?false:true;
	}
	
	/*
	 * Function: downFile
	 * Parameter: sql;
	 * Return: file
	 */
	public function downFile($sql){
		ob_end_clean();
		header("Content-Encoding: none");
		header("Content-Type: ".(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') ? 'application/octetstream' : 'application/octet-stream'));
		header("Content-Disposition: ".(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') ? 'inline; ' : 'attachment; ')."filename=data.sql");
		header("Content-Length: ".strlen($sql));
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $sql;
		$tmp=ob_get_contents();
		ob_end_clean();
		exit();
	}

	/*
	 * Function: saveFile
	 * Parameter: sql;
	 * Parameter: path;
	 * Parameter: fileName;
	 * Return: bool
	 */
	public function saveFile($sql,$path,$fileName){
		if(!file_exists($path)){
			mkdir($path,0777);
		}
		$fp = fopen($path."/".$fileName,"w+");
		if(fwrite($fp,$sql)){
			fclose($fp);
			return true;
		}
		else{
			return false;
		}
	}
	
	/*
	 * Function: restore
	 * Parameter: filename;
	 * Return: bool
	 */
	public function restore($filename){
		$succeed = true;
		$arrSql = file($filename);
		if(count($arrSql) <= 0){
			return false;
		}
		foreach($arrSql as $sql){
			if(parent::query($sql)==false){
				$succeed = false;
				break;
			}
		}
		return $succeed;
	}
}

?>