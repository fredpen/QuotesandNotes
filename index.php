<?php
$nav_title = "home";
$pageTitle = "Home of quotes and notes by the brightest minds to ever walk the earth";
$page_description = "Bringing you the best of words from the greatest of minds. A community of driven people, lover of great words; sharing thier experience and opinions about quotes and notes from great minds";
require_once 'includes/header.php';
// include_once "includes/quote_of_moment.php";
include_once "includes/searchbar.php";
 // save the data from fetch author to authors
$authorArray = $quote->fetchAuthor("5");
// save the data from fetch genre
$genreArray = $quote->fetchGenre("15");  
// save all the quotes into an array
$quoteArray = $quote->fetchQuotes();
// the quotes to be diplayed
// $quoteArray = $quote->quotePlaylist($rawArray, 10);
?> 

<div class="fcontainer">
    <div class="frow">
        <!-- left section of the main container  -->
        <?php require_once 'includes/indexLeftContainer.php'; ?>

        <div class="main-container">
            <div class="masonry"><?php require_once 'includes/indexMainContainer.php'; ?></div>
    </div>
</div>

<?php
require_once 'includes/footer.php';
?>
