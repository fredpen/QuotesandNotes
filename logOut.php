<?php

setcookie("user", "", time() - 3600, "/");

session_start();
session_unset();
session_destroy();



header("location:index.php");

exit();
?>
