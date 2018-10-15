<?php
      // getting form values
   function getInputValue ($name) {
     if (isset($_POST[$name])) {
       echo $_POST[$name];
     }
   }
   // sanitize inputs--remove tags and empty spaces
   function sanitiseStrings($strings) {
      $strings = strip_tags($strings);
      $strings = str_replace(" ", "", $strings);
      return $strings;
   }

   // sanitise passwords
   function sanitisePasswords($password)  {
      $password = strip_tags($password);
      return $password;
   }

   // sanitise the username
   function sanitiseUsername($username)  {
      $username = strip_tags($username);
      $username = str_replace(" ", "", $username);
      $username = ucfirst(strtolower($username));
      return $username;
   }

   // sanitize all inputs on clicking register
   if (isset($_POST['registerButton'])) {
      $firstName = sanitiseUsername($_POST['firstName']);
      $lastName = sanitiseUsername($_POST['lastName']);
      $username = sanitiseStrings($_POST['username']);
      $email = sanitiseStrings($_POST['email']);
      $confirmEmail = sanitiseStrings($_POST['confirmEmail']);
      $password = sanitisePasswords($_POST['password']);
      $confirmPassword = sanitisePasswords($_POST['confirmPassword']);
      $gender = $_POST['gender'];
    
      if (strlen($firstName) < 5 || strlen($firstName) > 25) {
            array_push($this->errorArray, Constants::$firstnameCharacter);
            return;
         }
      // save users email to the subsription table 
      // $quote->pushEmail($email);
      $registerUser = $account->register($firstName, $lastName, $username, $email, $confirmEmail, $password, $confirmPassword, $gender);

      if ($registerUser) {
         $_SESSION['email'] = $email;
        header("Location: index.php");
       } echo "false";

        }

 ?>
