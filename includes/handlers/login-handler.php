<?php

if (isset($_POST['loginButton'])) {

   $email = sanitiseStrings($_POST['loginEmail']);
   $password = sanitisePasswords($_POST['loginPassword']);

   $loginUser = $account->login($email, $password);

   if ($loginUser) {
      setcookie($usr, $email, time * 60 * 10000000000);
      $_SESSION['email'] = $email;
      header("Location: index.php");

   }
   $loginFailed = true;
}

?>
