<?php
$pageTitle = "Home";
require_once 'includes/header.php';
// include_once "includes/quote_of_moment.php";
include_once "includes/searchbar.php";
 // save the data from fetch author to authors
$authorArray = $quote->fetchAuthor("5");
// save the data from fetch genre
$genreArray = $quote->fetchGenre("5");
// save all the quotes into an array
$quoteArray = $quote->fetchQuotes();
?>

<div class="fcontainer">
    <div class="frow">

    <!-- left section of the main container  -->
     <?php require_once 'includes/indexLeftContainer.php'; ?>

    <div class="main-container">
        <div class="masonry"><?php require_once
                                // 'includes/indexMainContainer.php';
                            'test.php';
                            ?></div>

</div>

<!-- right section of the main container -->
<?php
require_once 'includes/indexRightContainer.php';
require_once 'includes/footer.php';
?>
