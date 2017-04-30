<?php
	/************************************************************************/
	/* 
	        mailer.php par Abdoullah REZGUI
	        - Envoi un email en utiliser les identifiants GMail par smtp
	        car la fonction mail de PHP ne marche pas
	*/
	/************************************************************************/

    require_once('class.smtp.php');
    require_once('class.phpmailer.php');
    
	define('GUSER', ''); // GMail username
	define('GPWD', '');  // GMail password

	function smtpmailer($to, $from, $from_name, $subject, $body) { 
		global $error;
		$mail = new PHPMailer();  // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true;  // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465; 
		$mail->Username = GUSER;  
		$mail->Password = GPWD;           
		$mail->SetFrom($from, $from_name);
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->AddAddress($to);

		if(!$mail->Send()) {
			$error = 'Mail error: '.$mail->ErrorInfo; 
			echo $error;
			return false;
		} else {
			$error = 'Message envoyé avec succés !';
			echo $error;
			return true;
		}
	}
?>