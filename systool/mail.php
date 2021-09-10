<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

_mail("test-".date("Y-m-d h:i"), "this body", "lovekyoe@gmail.com");

function _mail($subject, $body, $toemail) {
$mail = new PHPMailer(); // defaults to using php "mail()"
$mail ->SetLanguage('zh');
$mail->IsSMTP(); //設定使用SMTP方式寄信 
$mail->SMTPAuth = false; //設定SMTP需要驗證        
$mail->CharSet = "utf-8"; //設定郵件編碼        

$mail->SMTPSecure = false; // Gmail的SMTP主機需要使用SSL連線   
$mail->SMTPAutoTLS = false;
$mail->Host = "192.168.88.8"; //Gamil的SMTP主機        
$mail->Port = 25;  //Gamil的SMTP主機的SMTP埠位為465埠。        
$mail->Username = ""; //設定驗證帳號        
$mail->Password = ""; //設定驗證密碼        

$mail->SMTPDebug = 2;

$mail->From = "no-reply@singleparty.com.tw"; //設定寄件者信箱        
$mail->FromName = "約會專家"; //設定寄件者姓名

$toemails = explode(",",$toemail);
foreach($toemails as $value) {
$address = $value;
$mail->AddAddress($address, $address);
}
$mail->Subject    = $subject;
$mail->IsHTML(true); //設定郵件內容為HTML   
$mail->MsgHTML($body);

if(!$mail->Send()) {
  //die("電子郵件寄出失敗。<br>".$mail->ErrorInfo, "e");
  die($mail->ErrorInfo);
}

return true;
	
}

?>