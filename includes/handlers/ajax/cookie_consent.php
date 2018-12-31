<?php
// keeping track of new user for cookie announcement
setcookie("new_visitor", "old", time() + (9600 * 30), "/");
$new_visitor = false;
?>
