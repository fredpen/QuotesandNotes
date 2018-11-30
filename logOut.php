<?php
// destroy cookies
setcookie("user", "", time() - 3600, "/");

// close sessions
session_start();
session_unset();
session_destroy();

// redirect home
header("location:index.php");

exit();
?>
