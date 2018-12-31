<?php
require_once 'classes/Account.php';
$account = new Account($con);

// setcookie("new_visitor", "", time() - 3600, "/");

if (isset($_COOKIE['new_visitor'])) {
   $new_visitor = false;
} else {
   $new_visitor = true;
}

// keeping track of users in session and  set the cookies and the sessions
if (isset($_COOKIE['user']) || isset($_SESSION['email'])) {
   $id = ($_COOKIE['user'] ? $_COOKIE['user'] : $_SESSION['email']);
   $userDetails = $account->userDetails($id);
   $userId = $userDetails['id'];
   $last_name = $userDetails['lastname'];

} else {
   $userDetails = "";
   $userId = '';
}
?>
