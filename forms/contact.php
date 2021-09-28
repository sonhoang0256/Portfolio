<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<?php
		//Import PHPMailer classes into the global namespace
		//These must be at the top of your script, not inside a function
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;

		//Load Composer's autoloader
		require 'vendor/autoload.php';

		//get data from form

		$name = $_POST['fullname'];
		$cmail = $_POST['cmail'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

		// preparing mail content
		$messagecontent ="Name: ". $name. "<br>Email: " . $cmail. "<br> Message: ".$message;


		//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
			//Server settings
			//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->CharSet = 'UTF-8';
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'sonhoang0256@gmail.com';                     //SMTP username
			$mail->Password   = 'Sonson0506';                               //SMTP password
		   // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('sonhoang0256@gmail.com', 'Contact from PortFolio');
			$mail->addAddress('sonhoang0256@gmail.com');     //Add a recipient
			//$mail->addAddress('ellen@example.com');               //Name is optional
			//$mail->addReplyTo('info@example.com', 'Information');
			$mail->addCC('sonhoang0256@gmail.com');
			//$mail->addBCC('bcc@example.com');

			//Attachments

			//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		   // $mail->addAttachment('photo.jpeg', 'photo.jpeg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $messagecontent;
			

			$mail->send();
			echo 'Bạn đã đăng nhập thành công!';
		} catch (Exception $e) {
			echo "Lỗi rồi, đéo đăng nhập được: {$mail->ErrorInfo}";
		}
		?>
	</body>
</html>