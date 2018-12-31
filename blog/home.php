<?php
$pageTitle = "Cookie and Privacy policies";
require_once '../includes/databaseConfig.php';
require_once '../includes/navMenu.php';
require_once '../includes/classes/Constants.php';
require_once '../includes/classes/Account.php';
require_once '../includes/classes/Author.php';
require_once '../includes/session.php';

$account = new Account($con);
$author = new Author($con);
// character that has corresponding author in the database
$validChar = $author->validChar();
?> 



<div class="fcontainer">
    <div class="frow">

        <div class="main-container topMargin65">
           
        </div>
    </div>

<?php
require_once '../includes/footer.php';
?>

                

      