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
        $genre1 = $quoteDetails['genre1'];
        $genre2 = $quoteDetails['genre2'];
        $genre3 = $quoteDetails['genre3'];
        $author = $quoteDetails['author'];
        // push the details into quotelovers
        $sql = "INSERT INTO quoteLovers (id, quote, user, genre1, genre2, genre3, author) VALUES('', '$quoteId', '$userId', '$genre1', '$genre2', '$genre3', '$author')";
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
