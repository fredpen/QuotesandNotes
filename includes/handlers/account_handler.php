<?php
  $errorArray = array();
   // getting error
   function errorGetter($error)  {
      global $errorArray;
     if (in_array($error, $errorArray)) {
       echo "<div class='errorMessage'>$error</div>";
     }
   }

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

   if (isset($_POST['registerButton'])) {

      // sanitize all inputs on clicking register
      $firstName = sanitiseUsername($_POST['firstName']);
      $lastName = sanitiseUsername($_POST['lastName']);
      $username = sanitiseStrings($_POST['username']);
      $email = sanitiseStrings($_POST['email']);
      $confirmEmail = sanitiseStrings($_POST['confirmEmail']);
      $password = sanitisePasswords($_POST['password']);
      $confirmPassword = sanitisePasswords($_POST['confirmPassword']);
      $gender = $_POST['gender'];

     
      // save users email to the subsription table 
      // $quote->pushEmail($email);
      
      $registerUser = $account->register($firstName, $lastName, $username, $email, $confirmEmail, $password, $confirmPassword, $gender);

      // check the logs for error from validating inputs
      $errorArray = $account->errorLog();

      // check if the registration is succesful and redirects to home
      if ($registerUser) {
         $_SESSION['email'] = $email;
        header("Location: index.php");
<<<<<<< HEAD:includes/handlers/register-handler.php
      } 
      // else {
      //    echo "failed";
      // }
}
=======
       }

   }

>>>>>>> v3:includes/handlers/account_handler.php


// ----------------------------handling log in---------------------------

    if (isset($_POST['loginButton'])) {

      $email = sanitiseStrings($_POST['loginEmail']);
      $password = sanitisePasswords($_POST['loginPassword']);

      $loginUser = $account->login($email, $password);

      // check the logs for error from validating inputs
      $errorArray = $account->errorLog();

      if ($loginUser) {
         $_SESSION['email'] = $email;
         header("Location: index.php");

      }
      $loginFailed = true;
   }


 ?>
