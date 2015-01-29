<?php

/*
 * ClassName: Mailer
 * Date: 2008-07-13
 * Author: ziyan.suo@163.com
 */
 
class Mailer{

	private $mailServer;
	private $mailPort=25;
	private $mailSender;
	private $mailUser;
	private $mailPwd;
	private $socket;
	private $timeout=30;
	
	/*
	 * Function: Mailer
	 * Parameter: string
	 * Parameter: int
	 * Parameter: string
	 * Parameter: string
	 * Parameter: string
	 */
	public function __construct($mailServer=MAILSERVER,$mailPort=MAILPORT,$mailSender=MAILSENDER,$mailUser=MAILUSER,$mailPwd=MAILPWD){
		$this->mailServer = $mailServer;
		$this->mailPort = $mailPort;
		$this->mailSender = $mailSender;
		$this->mailUser = $mailUser;
		$this->mailPwd = $mailPwd;
	}
	
	/*
	 * Function: send
	 * Parameter: string(to[,to])
	 * Parameter: string
	 * Parameter: string
	 * Parameter: string(file.txt[,file.jpg[,file.rar[,file.zip]]])
	 * Parameter: string(cc[,cc])
	 * Return: bool
	 */
	public function send($to,$subject,$content,$attachment='',$cc=''){
		if(!$this -> login()){
			return false;
		}
		$sent = true;
		$boundary = uniqid("");
		$arrReceiver = array();
		$arrCCReceiver = array();
		
		$header .= "MIME-Version:1.0\r\n";
		if($attachment){
			$header .= "Content-Type:multipart/mixed; boundary=\"$boundary\"\r\n";
		}
		else{
			$header .= "Content-Type:multipart/alternative; boundary=\"$boundary\"\r\n";
		}
		$header .= "To: ".$to."\r\n";
		if ($cc) {
			$header .= "Cc: ".$cc."\r\n";
			$arrCCReceiver = explode(",", $cc);
		}
		$header .= "From: ".$this->mailSender."<".$this->mailSender.">\r\n";
		$header .= "Subject: ".$subject."\r\n";
		$header .= "Date: ".date("r")."\r\n";
		
		$body = "--$boundary\r\n";
		
		$body .= "Content-Type:text/html; charset=gbk\r\nContent-transfer-encoding:base64\r\n\r\n";
		
		$body .= base64_encode($content);
		
		if($attachment){
			$arrAttachment = explode(",", $attachment);
			foreach($arrAttachment as $attachment){
				$body .= "\r\n--$boundary\r\n";
				$body .= "Content-type:octet-stream;name=$attachment\r\nContent-transfer-encoding:base64\r\nContent-disposition:attachment;filename=$attachment\r\n\r\n";
				$body .= chunk_split(base64_encode(file_get_contents($attachment)));
			}
		}

		$body .= "\r\n\r\n--$boundary--\r\n\r\n";
		
		$arrReceiver = array_merge($arrCCReceiver,explode(",",$to));

		foreach($arrReceiver as $to){
			if(!$this->cmd("MAIL FROM:<".$this->mailSender.">",235)){
				$sent = false;
				continue;
			}
			if(!$this->cmd("RCPT TO:<".$to.">",250)){
				$sent = false;
				continue;
			}
			if(!$this->cmd("DATA",250)){
				$sent = false;
				continue;
			}
			if(!$this->cmd($header."\r\n".$body."\r\n.\r\n",354)){
				$sent = false;
				continue;
			}
		}
		$this -> quit();
		return $sent;
	}
	
	/*
	 * Function: openSock
	 * Return: bool
	 */
	private function openSock(){
		$this->socket = fsockopen($this->mailServer,$this->mailPort,$errorCode,$errorMsg,$this->timeout);
		if(!$this->socket){
			return false;
		}
		set_socket_blocking($this->socket,true);
		return true;
	}
	
	/*
	 * Function: login
	 * Return: bool
	 */
	private function login(){
		if(!$this->openSock()){
			return false;
		}
		if(!$this->cmd("HELO ".$this->mailServer,220)){
			return false;
		}
		if(!$this->cmd("AUTH LOGIN ".base64_encode($this->mailUser),250)){
			return false;
		}
		if(!$this->cmd("".base64_encode($this->mailPwd),334)){
			return false;
		}
		return true;
	}
	
	/*
	 * Function: quit
	 * Return: bool
	 */
	private function quit(){
		if(!$this->cmd("QUIT\n",250)){
			return false;
		}
		unset($this->socket);
		return true;
	}
	
	/*
	 * Function: getStatus
	 * Return: string
	 */
	private function getStatus(){
		$status = fgets($this->socket);
		return $status;
	}

	/*
	 * Function: cmd
	 * Parameter: string
	 * Parameter: int
	 * Return: bool
	 */
	private function cmd($cmd,$statusCode=''){
		fputs($this->socket, $cmd."\r\n");
		if(substr($this->getStatus(),0,strlen($statusCode))==$statusCode){
			return true;
		}
		else{
			return false;
		}
	}
	
}
?>
