<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "vendor/autoload.php";

class Mail
{
	public static function send($to="",$subject="",$body=""){


		$mail = new PHPMailer(true);
    $mail->isSMTP();
		$mail->SMTPDebug = 0;
		$mail->Debugoutput = 'HTML';

		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';

		$mail->Username = '';
		$mail->Password = '';

		$mail->setFrom("");
		$mail->addReplyTo("");
		$mail->addAddress($to);
		$mail->Subject = $subject;
		$mail->isHTML(true);
		$mail->Body = $body;

    if(!$mail->send()){
  			return false;
  		}else {
  			return true;
  		}


	/*	if(!$mail->send()){
			echo $mail->ErrorInfo;
		}else {
			echo "mail poslat";
		}*/

	}
}
