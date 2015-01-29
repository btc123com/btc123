<?php
include('../class/mail/class.phpmailer.php');
class getPWDController extends abstractController {
	public function getpasswordAction(){
		if(isset($_POST) && isset($_POST['u']) && isset($_POST['t'])  && isset($_POST['m']) && isset($_POST['newpwd'])){
			$u = AddSlash($_POST['u']);
			$t = AddSlash($_POST['t']);
			$m = AddSlash($_POST['m']);
			$p = $_POST['newpwd'];
			$now = time();
			$sql = "SELECT userID,userMail,userPwd FROM ".DBPREFIX."members WHERE userID={$u}";
			$rs = $this->objC->GetRow($sql);
			if($now-$t <= 7*86400 && $rs){
				
				if($m==md5($rs['userPwd'].$t.$u.GETPWD_MASK)){
					$this->objC->RunQuery("UPDATE ".DBPREFIX."members SET userPwd='".Encrypt($p)."' WHERE userID=".$u);
					AlertMsg("密码修改成功，您新密码是：".$p,"http://".SITE_DOMAIN);
				}else{
					AlertMsg("验证码错误或已失效",-1);
				}
			}else{
				AlertMsg("超过7天，此链接已失效，或不存在此用户",-1);
			}
		}
		if(isset($_POST) && isset($_POST['email']) && isset($_POST['doudou']) && isset($_POST['username'])){
			$username = AddSlash($_POST['username']);
			$doudou = AddSlash($_POST['doudou']);
			$email = AddSlash($_POST['email']);
			$sql = "SELECT m.userID,m.userMail,d.doudouID FROM ".DBPREFIX."members m LEFT JOIN ".DBPREFIX."members_doudou d on m.userID=d.userID WHERE userName='{$username}' and d.doudouID={$doudou}";
			$rs = $this->objC->GetRow($sql);
			if($rs){
				$this->objC->RunQuery("UPDATE ".DBPREFIX."members SET userMail='{$email}' WHERE userID=".$rs['userID']);	
			}else{
				AlertMsg("您输入的doudouID有误，请重新输入",-1);
				exit;
			}
		}
		if(isset($_POST) && isset($_POST['username'])){
			$username = AddSlash($_POST['username']);
			$sql = "SELECT m.userID,m.userMail,m.userPwd FROM ".DBPREFIX."members m WHERE userName='{$username}'";
			$rs = $this->objC->GetRow($sql);
			if($rs){
				$email = $rs['userMail'];
				if($email){
					$t = time();
					$md5 = md5($rs['userPwd'].$t.$rs['userID'].GETPWD_MASK);
					$url = 'http://'.SITE_DOMAIN.'/i/?a=getpwd&t='.$t.'&u='.$rs['userID'].'&m='.$md5;
					$url = '请一周内通过以下链接修改你的密码：<a href="'.$url.'">'.$url.'</a>，记得修改成功后，删除此邮件';
					/*
					$str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ132456789";
					$strSafeCode = '';
					for($i=1;$i<=6;$i++){
						$strSafeCode .= substr($str,rand(1,60),1);
					}
					$this->objC->RunQuery("UPDATE ".DBPREFIX."members SET userPwd='".Encrypt($strSafeCode)."' WHERE userID=".$rs['userID']);
					*/
					$title = '修改密码邮件';
					$content = $url;
					if(CHARSET=='gbk'){
						$title = iconv('gbk','utf-8',$title);
						$content = iconv('gbk','utf-8',$content);
					}
					//$content = '您的新密码是：'.$strSafeCode.'，登录成功后请删除本邮件。';
					
					if($this->_sendmail($email,$title,$content)){
						$info = "发送成功，请登录邮箱".$rs['userMail']."获取修改密码链接！";
						$this->objS->assign('info', $info);
						$this->objS->assign('mailsendsucc', 'mailsendsucc');
						$this->objS->display('i/getpwd.tpl');
						//$info = iconv("UTF-8","GB2312",$info);
						//$url = "http://".SITE_DOMAIN;
						//AlertMsg($info,$url);
						exit;
					}
				}else{
						AlertMsg("您没有设定邮箱，无法获取密码，请联系客服人员处理",$url);
				}
			}else{
				AlertMsg('无此用户',-1);
			}
		}
	}

	private function _sendmail($address,$title,$content){
		$mail             = new PHPMailer();
		$mail->CharSet = 'utf-8';
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->Host       = MAILSERVER; // sets the SMTP server
		$mail->Port       = MAILPORT;                    // set the SMTP port for the GMAIL server
		$mail->Username   = MAILUSERNAME; // SMTP account username
		$mail->Password   = MAILPASSWORD;        // SMTP account password
		$mail->SetFrom(MAILUSERNAME, MAILNICK);
		$mail->AddReplyTo(MAILUSERNAME, MAILNICK);
		$mail->Subject    = $title;
		$mail->MsgHTML($content);
		$mail->AddAddress($address, "");

		if(!$mail->Send()) {
		  return false;
		}
		return true;
	}
}