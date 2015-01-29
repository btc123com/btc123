<?php

/*
 * ClassName: Conn for ADODB
 * Parameter: host;
 * Parameter: user;
 * Parameter: pwd;
 * Parameter: dbName;
 * Author: ziyan.suo@163.com
 */
 
class Conn{

	protected $conn;
	public $queryNum = 0;
	
	/*
	 * Function: Conn
	 * Parameter: host;
	 * Parameter: user;
	 * Parameter: pwd;
	 * Parameter: dbName;
	 */
	public function __construct($dbName=DBNAME,$host=DBHOST,$user=DBUSER,$pwd=DBPWD,$charset=CHARSET){
		$this -> conn = ADONewConnection('mysql');
		$this -> conn -> debug = false;
		$this -> conn -> SetFetchMode(ADODB_FETCH_ASSOC);
		if($this -> conn -> Connect($host,$user,$pwd,$dbName) == false){
			$this -> WriteErrorLog();
		}
		else{
			$this -> conn -> Execute('set names '.$charset);
		}
	}
	
		
	/*
	 * Function: RunQuery
	 * Parameter: query(INSERT INTO table (col1,col2) VALUES (?,?))
	 * Parameter: array('val'=>$val)
	 * Return: result
	 */
	public function RunQuery($query,$arrValue=false){
		if($result = $this -> conn -> Execute($query,$arrValue)){
			$this -> queryNum++;
			return $result;
		}
		else{
			$this -> Close();
			$this -> WriteErrorLog($query);
		}
	}
	
	/*
	 * Function: Prepare
	 * Parameter: query(INSERT INTO table (col1,col2) VALUES (?,?))
	 * Return: handle
	 */
	public function Prepare($query){
		if($handle = $this -> conn -> Prepare($query)){
			$this -> queryNum++;
			return $handle;
		}
		else{
			$this -> WriteErrorLog($query);
		}
	}
	
	/*
	 * Function: SelectLimit
	 * Parameter: query(SELECT * FROM TABLE WHERE COND=:val)
	 * Parameter: numrows
	 * Parameter: offset
	 * Parameter: array('val'=>$val)
	 * Return: result
	 */
	public function SelectLimit($query,$numrows,$offset,$arrValue=false){
		if($result = $this -> conn -> SelectLimit($query,$numrows,$offset,$arrValue)){
			$this -> queryNum++;
			return $result;
		}
		else{
			$this -> WriteErrorLog($query);
		}
	}
	
	/*
	 * Function: RunCacheQuery
	 * Parameter: query
	 * Parameter: array('val'=>$val)
	 * Parameter: second
	 * Return: result
	 */
	public function RunCacheQuery($query,$arrValue=false,$second=CACHE_SECOND){
		if($result = $this -> conn -> CacheExecute($second,$query,$arrValue)){
			$this -> queryNum++;
			return $result;
		}
		else{
			$this -> WriteErrorLog($query);
		}
	}
	
	/*
	 * Function: Begin
	 */
	public function Begin(){
		$this -> conn -> BeginTrans();
	}
	
	/*
	 * Function: Commit
	 */
	public function Commit(){
		$this -> conn -> CommitTrans();
	}
	
	/*
	 * Function: Back
	 */
	public function Back(){
		$this -> conn -> RollbackTrans();
	}
	
	/*
	 * Function: FetchRow
	 * Parameter: result
	 * Return: array
	 */
	public function FetchRow($result){
		return $arrRow = $result -> FetchRow();
	}
	
	/*
	 * Function: FieldCount
	 * Parameter: result
	 * Return: int
	 */
	public function FieldCount($result){
		return $result -> FieldCount();
	}
	
	/*
	 * Function: GetRecordCount
	 * Parameter: result
	 * Return: int
	 */
	public function GetRecordCount($result){
		return $result -> RecordCount();
	}
	
	/*
	 * Function: GetAffectedRows
	 * Return: int
	 */
	public function GetAffectedRows(){
		return $this -> conn -> Affected_Rows();
	}
	
	/*
	 * Function: GetOne
	 * Return: array
	 */
	public function GetOne($query){
		$this -> queryNum++;
		return $this -> conn -> GetOne($query);
	}
	
	/*
	 * Function: GetRow
	 * Return: array
	 */
	public function GetRow($query){
		$this -> queryNum++;
		return $this -> conn -> GetRow($query);
	}
	
	/*
	 * Function: GetAll
	 * Return: array
	 */
	public function GetAll($query){
		$this -> queryNum++;
		return $this -> conn -> GetAll($query);
	}
	
	/*
	 * Function: GetInsertId
	 * Return: int
	 */
	public function GetInsertId(){
		return $this -> conn -> Insert_ID();
	}
	
	/*
	 * Function: Close
	 * Return:null
	 */
	public function Close(){
		$this -> conn -> Close();
	}
	
	/*
	 * Function: WriteErrorLog
	 * Parameter: query;
	 * Return:null
	 */
	private function WriteErrorLog($query=""){
		$msg  = "\r\nAddr:".getenv("REMOTE_ADDR").";";
		$msg .= "\r\nData:".date("Y-m-d H:i:s").";";
		$msg .= "\r\nPage:".$_SERVER['PHP_SELF'].";";
		$msg .= "\r\nInfo:".$this -> conn -> ErrorMsg().";";
		$msg .= "\r\nQuery:".$query.";\r\n";
		if(file_exists(LOG_PATH."/error.log")){
			chmod(LOG_PATH."/error.log",0777);
			if(filesize(LOG_PATH."/error.log") > 10*1024*1024){
				rename(LOG_PATH."/error.log",LOG_PATH."/".date("Y-m-d H:i",time()).".log");	
			}
		}
		error_log($msg,3,LOG_PATH."/error.log");
		//exit("Server busy, please try again later!");
	}
	
}
?>