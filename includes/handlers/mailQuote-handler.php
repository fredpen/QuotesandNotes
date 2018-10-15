<?php 
  $mailSent = false;
  $mail = true;
	if (isset($_POST['mailButton'])) {
   
    // check if there is email and store and assign variables
    if (isset($_POST['receipientMail'])) {
      $receipientMail = strip_tags($_POST['receipientMail']);
      $additionalMessage = strip_tags($_POST['additionalMessage']);
      $mailContent = $_POST['mailContent'];
      $mailAuthor = $_POST['mailAuthor'];
      $quote->pushEmail($receipientMail);

      try{
  		//Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        $mail->SMTPDebug = 2;
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
        //send the message, check for errors
        $mail->send();
          $mailSent = true;
        } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
      }else{
        // receipientMail is empty
        $mail = false;
        }
  	}  

 





?>

