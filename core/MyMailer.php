<?php
namespace Core;
require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
	class MyMailer extends \PHPMailer {
		public function sendMail($to, $header, $body)
		{
			$mail = new static;
			$mail->isSMTP();                                      
			$mail->Host = 'smtp.mailtrap.io';  
			$mail->SMTPAuth = true; 
			$mail->Username = 'cc8e7d3cb95edf'; 
			$mail->Password = '536dd9eab27f4c';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 25;
			$mail->isSMTP();
			$mail->Host = 'smtp.mailtrap.io';
			$mail->SMTPAuth = true;                   
			$mail->Username = 'cc8e7d3cb95edf';   
			$mail->Password = '536dd9eab27f4c';                         
			$mail->SMTPSecure = 'tls';                        
			$mail->Port = 25;                                 

			$mail->setFrom('m2lFormation@m2l.fr', 'm2l');
			if(is_array($to))
			{
				foreach($to as $subject)
				{
					$mail->addAddress($subject);              
				}
			}
			else
			{
				$mail->addAddress($to);
			}

			$mail->Subject = $header;
			$mail->Body = $body;

			if($mail->send())
			{
				return true;
			}
			else 
			{
				return $mail->ErrorInfo;
			}
		}
	}