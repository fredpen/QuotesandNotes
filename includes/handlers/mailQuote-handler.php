<?php 
  

  $mailSent = false;
  $receipientMail = "";
	if (isset($_POST['mailButton'])) {

    
    $receipientMail = $_POST['receipientMail'];
    $additionalMessage = $_POST['additionalMessage'];
    $mailContent = $_POST['mailContent'];
    $mailAuthor = $_POST['mailAuthor'];

	if (empty(strip_tags($receipientMail))) {
		  $mail = false;
		return;

	} else {
		//Tell PHPMailer to use SMTP
      $mail->isSMTP();
      //Enable SMTP debugging
      $mail->SMTPDebug = 0;
      //Set the hostname of the mail server
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      //Set the encryption system to use - ssl (deprecated) or tls
      $mail->SMTPSecure = 'tls';
      //Whether to use SMTP authentication
      $mail->SMTPAuth = true;
      //Username to use for SMTP authentication - use full email address for gmail
      $mail->Username = "babakamimowon@gmail.com";
      //Password to use for SMTP authentication
      $mail->Password = "lautech@60";
      //Set who the message is to be sent from
      $mail->setFrom('babakamimowon@gmail.com', 'Quotes&Notes');
      //Set an alternative reply-to address
      $mail->addReplyTo('babakamimowon@gmail.com', 'Quotes&Notes');
      //Set who the message is to be sent to
      $mail->addAddress($receipientMail);
      //Set the subject line
      $mail->Subject = $additionalMessage;
      $mail->msgHTML("<p>" . $mailContent . "</p><p><strong>" . $mailAuthor . "</strong></p>");
      //Replace the plain text body with one created manually
      $mail->AltBody =  "here we go again";
      //Attach an image file
      // $mail->addAttachment('images/phpmailer_mini.png');
      //send the message, check for errors
	    if (!$mail->send()) {
	          echo "Mailer Error: " . $mail->ErrorInfo;
            $mailSent = "fail";
	    } else {
          $mailSent = true;
	    }
	}  

  // storing the email of users for subscription purposes
  $quote->pushEmail($receipientMail);
  return;


}


?>

