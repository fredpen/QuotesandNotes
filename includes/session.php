<?php

require_once 'classes/Account.php';
$account = new Account($con);

// keeping track of users in session
// set the cookies and the sessions
if (isset($_COOKIE['user']) || isset($_SESSION['email'])) {

   if ($_COOKIE['user']) {
      $email = $_COOKIE['user'];
   } else {
      $email = $_SESSION['email'];
   }
   $userDetails = $account->userDetails($email);

   $userId = $userDetails['id'];

} else {
   $userDetails = "";
   $userId = '';
}


?>
