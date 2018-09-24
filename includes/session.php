<?php

   require_once 'classes/Account.php';
   $account = new Account($con);
   // keeping track of users in session
   if (isset($_SESSION['email'])) {
   $email =  $_SESSION['email'];
   
   $userDetails = $account->userDetails($email);
   }  else {
   $userDetails = '';
}


 ?>
