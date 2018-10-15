<?php
   class Account {

      private $conc;
      public $errorArray;
      public $id;

      function __construct($con)  {
         $this->con = $con;
         $this->errorArray = array();
         $this->id;
      }

      // register users data
      public function register($firstName, $lastName, $username, $email, $confirmEmail, $password, $confirmPassword, $gender){
         $this->validateFirstname($firstName);
         $this->validateLastname($lastName);
         $this->validateUsername($username);
         $this->validateEmail($email, $confirmEmail);
         $this->validatePassword($password, $confirmPassword);

         if (empty($this->errorArray)) {
            return $this->insertUserDetails($firstName, $lastName, $username, $email, $password, $gender);
            } 
            return false;
      }

      // login user
      public function login($email, $password){
         $encryptedPassword = md5($password);

         $query = "SELECT * FROM users WHERE pwd='$encryptedPassword' AND email='$email' OR username='$email' AND pwd='$encryptedPassword'";
         $results = mysqli_query($this->con, $query);

         if (mysqli_num_rows($results) == 1) {
            return true;

         }else {
            array_push($this->errorArray, Constants::$loginFailed);
         }
      }

            // getting user insertUserDetails
         public function userDetails($email) {
            $sql = "SELECT * FROM users WHERE email='$email' OR username='$email'";
            $query = mysqli_query($this->con, $sql);

            while ($row = mysqli_fetch_array($query)) {
              return $row;
            }
         }

      public function errorLog(){
         return $this->errorArray;
      }

      // insert user details into the database
      private function insertUserDetails($firstName, $lastName, $username, $email, $password, $gender){
         $encryptedPassword = md5($password);
         $date = date("Y-m-d h:i:s");

         $query = mysqli_query($this->con, "INSERT INTO users VALUES('$firstName', '$lastName', '$username', '$email', '$encryptedPassword', '$gender', '$date', '')");
         return $query;
      }

      // validate user's firstname
      private function validateFirstname($firstName)  {
         if (strlen($firstName) < 5 || strlen($firstName) > 25) {
            array_push($this->errorArray, Constants::$firstnameCharacter);
            return;
         }
      }



      // validate user's lastname
      private function validateLastname($lastName)  {
         if (strlen($lastName) < 2 || strlen($lastName) > 25) {
            array_push($this->errorArray, Constants::$lastnameCharacter);
            return;
         }
      }

      private function validateUsername($username)  {
         if (strlen($username) < 5 || strlen($username) > 25) {
            array_push($this->errorArray, Constants::$usernameCharacter);
            return;
         }
         $query = mysqli_query($this->con, "SELECT username FROM users WHERE username ='$username'");
         if (mysqli_num_rows($query) > 0) {
            array_push($this->errorArray,Constants::$usernameAlreadyExists);
            return;
         }
      }

      // validate user's password
      private function validatePassword($password, $confirmPassword)  {
         if (strlen($password) < 5 || strlen($password) > 30) {
            array_push($this->errorArray, Constants::$passwordCharacter);
            return;
         } 
         if (preg_match('/[^A-Za-z0-9]/', $password)) {
           array_push($this->errorArray, Constants::$passwordInvalid);
           return;
        }
        if ($password != $confirmPassword ) {
            array_push($this->errorArray, Constants::$passwordDonNotMatch);
              return;
         }
      }

      // validate emails
      private function validateEmail($email, $confirmEmail) {
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         array_push($this->errorArray, Constants::$emailInvalid);
         return;
         }

         $query = mysqli_query($this->con, "SELECT * FROM users WHERE email ='$email'");
         if (mysqli_num_rows($query) > 0) {
            array_push($this->errorArray, Constants::$emailAlreadyExists);
            return;
         }

         if ($email != $confirmEmail) {
            array_push($this->errorArray, Constants::$emailDoNotMatch);
            return;
         }
      }




} /**end of class */


 ?>
