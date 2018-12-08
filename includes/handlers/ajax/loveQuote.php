<?php
require_once '../../databaseConfig.php';
require_once '../../classes/Quote.php';
$quote = new Quote($con);

// check if the quote,the author the genres and user id is passed
if (isset($_POST['quoteId'])) {

    $quoteId = $_POST['quoteId'];
    $userId = $_POST['userId']; 

      // check if the user has liked the quote before
    $sql = "SELECT id FROM quoteLovers WHERE quote='$quoteId' AND user='$userId'";
    $query = mysqli_query($con, $sql);

    if (mysqli_num_rows($query) == 0) {
        // if no fetch the quote details
        $quoteDetails = $quote->fetchQuoteDetails($quoteId);
        $genre1 = $quote->genreId($quoteDetails['genre1']);
        $genre2 = $quote->genreId($quoteDetails['genre2']);
        $genre3 = $quote->genreId($quoteDetails['genre3']);
        $author = $quote->authorId($quoteDetails['author']);
        // push the details into quotelovers
        $sql = "INSERT INTO quoteLovers (id, quote, user) VALUES('', '$quoteId', '$userId')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            echo "success";
        } else {
            echo "failure";
        }
    } else {
        echo "You'have liked this quote before";
    }
} else {
    echo "You cant like a quote at the moment";
}
?>
