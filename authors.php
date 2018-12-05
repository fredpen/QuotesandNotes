<?php
$pageTitle = "Authors";
require_once 'includes/header.php';



// save all the quotes into an array
$quoteArray = $quote->fetchQuotes();
?> 

<div class="fcontainer">
    <div class="frow">

        <div class="main-container">
            <div class="masonry"><?php require_once 'includes/indexMainContainer.php'; ?></div>
</div>

<!-- right section of the main container -->
<?php
require_once 'includes/indexRightContainer.php';
require_once 'includes/footer.php';

foreach ($validChar as $key) {
   var_dump($author->authorDetails($key));
}
?>
