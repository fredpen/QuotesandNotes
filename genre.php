 <?php 
// check the id of the qenre thats been quried
if (isset($_GET['genre'])) {
    $genre = $_GET['genre'];
} else {
    header("Location: index.php");
}
$temp_page_title = $_GET['genre'];
$pageTitle = "Top quotes about " . ucfirst($genre);
$page_description = "The best of spoken and written words about " . $temp_page_title . ". Read experience and opinions of people about " . $temp_page_title . "quotes";
// import the header that houses the navbar and other dependencies
require_once 'includes/header.php';
include_once "includes/quote_of_moment.php";

 // save the data from fetch author to authors
$authorArray = $quote->fetchAuthor("5");
// save the data from fetch genre
$genreArray = $quote->fetchGenre("5");

// query the all quotes of thesame author
$quoteArray = $quote->fetchQuotesFromSameGenre($genre);
?>

<div class="fcontainer">
    <div class="frow">

        <!-- left section of the main container  -->
        <?php require_once 'includes/indexLeftContainer.php'; ?>

        
        <div class="main-container">
            <h1 class="title text-center genre_title"><?php echo $genre ?> Quotes</h1>

            <!-- import the maincontainer -->
            <div class="masonry"><?php require_once 'includes/indexMainContainer.php'; ?>

        </div>
    </div>
</div>

<?php 
require_once 'includes/footer.php' ?>
