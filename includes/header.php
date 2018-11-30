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
require_once 'includes/classes/Quote.php';
require_once 'includes/classes/Comment.php';
require_once 'includes/session.php';

$account = new Account($con);
$quote = new Quote($con);
$comment = new Comment($con);

require_once 'includes/navMenu.php';
require_once 'includes/error_modals.php';
?>
