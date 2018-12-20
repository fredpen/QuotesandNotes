<?php
// converting the wikiname of authors to img names
function imagify($string)
{
    $string = str_replace("_", " ", $string);
    return $string;
}

require_once 'includes/databaseConfig.php';
require_once 'includes/classes/Constants.php';
require_once 'includes/classes/Account.php';
require_once 'includes/classes/Author.php';
require_once 'includes/session.php';

if ($pageTitle !== "Login" && $pageTitle !== "Register") {
    require_once 'includes/classes/Comment.php';
    require_once 'includes/classes/Quote.php';
    $comment = new Comment($con);
    $quote = new Quote($con);
}

if ($pageTitle == "Login" || $pageTitle == "Register") {
    require_once 'includes/handlers/account_handler.php';
}

$account = new Account($con);
$author = new Author($con);
// character that has corresponding author in the database
$validChar = $author->validChar();

require_once 'includes/navMenu.php';


?>
