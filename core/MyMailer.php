<?php
namespace Core;

class MyMailer extends \PHPMailer {

	public static function sendMail($to, $header, $body, $attach = false)
	{
		$mail = new static;
		$mail->isSMTP();                                      
		$mail->Host = 'smtp.mailtrap.io';  
		$mail->SMTPAuth = true; 
		$mail->Username = 'ad4452499edd53'; 
		$mail->Password = '72e19410642c5a';
		$mail->SMTPSecure = '';
		$mail->Port = 465;
		$mail->isSMTP();
		$mail->CharSet="UTF-8";                              

		$mail->setFrom('m2lFormations@m2l.fr', 'm2l');
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
		$mail->Body = static::getBody($body);
		$mail->IsHtml(true);

		if($attach)
		{
			$mail->AddAttachment($attach);
		}
		if(dd($mail->send()))
		{
			return true;
		}
		else 
		{
			return $mail->ErrorInfo;
		}
	}

	protected static function getBody($body)
	{
		return "
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>M2L Formations</title>
	<style>
		body {
			width: 100%;
			font-family: Arial, Helvetica
			margin: 0;
			padding: 0
		}
		.container {
			width: 65%;
		}
		.header {
			width:100%;
			background: blue;
			color:white;
			text-align: center;
			margin-bottom: 50px;
			line-height: 100px;
		}
	</style>
</head>
<body>
	<div class='header'>
		<h1>M2L - Formations</h1>
	</div>
	<div class='container'>
		{$body}
	</div>
</body>
</html>
		";
	}
}