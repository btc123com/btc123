<?php

/*
 * ClassName: FTP
 * Date: 2008-06-07
 * Author: ziyan.suo@163.com
 */
 
class FTP{

	private $ftp;
	
	/*
	 * Function: FTP
	 * Parameter: host;
	 * Parameter: user;
	 * Parameter: pwd;
	 * Return: bool
	 */
	public function __construct($host=FTPHOST,$user=FTPUSER,$pwd=FTPPWD){
		if($this->ftp = ftp_connect($host)){
			ftp_login($this->ftp,$user,$pwd);
		}
	}
	
		
	/*
	 * Function: chgDir
	 * Parameter: string
	 * Return: bool
	 */
	public function chgDir($dir='.'){
		return ftp_chdir($this->ftp,$dir);
	}

	/*
	 * Function: makeDir
	 * Parameter: string
	 * Return: string/false
	 */
	public function makeDir($name){
		return ftp_mkdir($this->ftp,$name);
	}

	/*
	 * Function: listDir
	 * Parameter: string
	 * Return: array/false
	 */
	public function listDir($dir='.'){
		return ftp_nlist($this->ftp,$dir);
	}

	/*
	 * Function: rename
	 * Parameter: string
	 * Parameter: string
	 * Return: bool
	 */
	public function rename($from,$to){
		return ftp_rename($this->ftp,$from,$to);
	}

	/*
	 * Function: delDir
	 * Parameter: string
	 * Return: bool
	 */
	public function delDir($dir){
		return ftp_rmdir($this->ftp,$dir);
	}

	/*
	 * Function: delFile
	 * Parameter: string
	 * Return: bool
	 */
	public function delFile($path){
		return ftp_delete($this->ftp,$path);
	}

	/*
	 * Function: getSize
	 * Parameter: string
	 * Return: int
	 */
	public function getSize($file){
		return ftp_size($this->ftp,$file);
	}

	/*
	 * Function: GetDir
	 * Return: string
	 */
	public function getDir(){
		return ftp_pwd($this->ftp);
	}
	
	/*
	 * Function: getFile
	 * Parameter: string
	 * Parameter: string
	 * Return: bool
	 */
	public function getFile($local,$remote){
		return ftp_get($this->ftp,$local,$remote,FTP_BINARY);
	}

	/*
	 * Function: putFile
	 * Parameter: string
	 * Parameter: string
	 * Return: bool
	 */
	public function putFile($remote,$local){
		return ftp_put($this->ftp,$remote,$local,FTP_BINARY);
	}
	
	/*
	 * Function: nbGetFile
	 * Parameter: string
	 * Parameter: string
	 * Return: bool
	 */
	public function nbGetFile($local,$remote){
		$result = ftp_nb_get($this->ftp,$local,$remote,FTP_BINARY);
		while ($result==FTP_MOREDATA){
			$result = ftp_nb_continue ($this->ftp);
		}
		if($result != FTP_FINISHED){
			return false;
		}
		return true;
	}

	/*
	 * Function: nbPutFile
	 * Parameter: string
	 * Parameter: string
	 * Return: bool
	 */
	public function nbPutFile($remote,$local){
		$result = ftp_nb_put($this->ftp,$remote,$local,FTP_BINARY);
		while ($result==FTP_MOREDATA){
			$result = ftp_nb_continue ($this->ftp);
		}
		if($result != FTP_FINISHED){
			return false;
		}
		return true;
	}

	/*
	 * Function: exec
	 * Return: bool
	 */
	public function exec($command){
		return ftp_exec($this->ftp,$command);
	}

	/*
	 * Function: close
	 * Return: void
	 */
	public function close(){
		ftp_close($this->ftp);
	}

}
?> 