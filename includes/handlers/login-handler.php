<?php

if (isset($_POST['loginButton'])) {

   $email = sanitiseStrings($_POST['loginEmail']);
   $password = sanitisePasswords($_POST['loginPassword']);

   $loginUser = $account->login($email, $password);

   if ($loginUser) {
      $_SESSION['email'] = $email;
      header("Location: index.php");

   }
   $loginFailed = true;
}

?>
