<?php
	require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
	new PHPMailer;
	if(!isset($_POST['email']))
	{
		include ('views/resetmdp.php');
	}
	else
	{
		include('models/get_user.php');
		$mdp = randStr(6);
		die();
		if(changeMdp($bdd,$_POST['email'],sha1($mdp)))
		{
			$mail = new PHPMailer;
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'cc8e7d3cb95edf';                 // SMTP username
			$mail->Password = '536dd9eab27f4c';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 25;                                    // TCP port to connect to			

			$mail->setFrom('m2lFormation@m2l.fr', 'm2l');
			$mail->addAddress($_POST['email']);               // Name is optional


			$mail->Subject = 'nouveau mdp M2L';
			$mail->Body    = 'Votre nouveau mot de passr sur l\'intranet de la m2l est : '.$mdp;

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
		}
	}