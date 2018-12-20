<?php
require_once 'classes/Account.php';
$account = new Account($con);

// keeping track of users in session
// set the cookies and the sessions
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
