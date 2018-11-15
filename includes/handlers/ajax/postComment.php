<?php
require_once '../../databaseConfig.php';

// check if the quote id and the user id is set
if (isset($_POST['userId']) && isset($_POST['quoteId']) && isset($_POST['comment'])) {

    // variables
    $userId = $_POST['userId'];
    $quoteId = $_POST['quoteId'];
    $comment = $_POST['comment'];
    $date = date("Y/m/d");

    // push he comment into the database
    $sql = "INSERT INTO comment (id, user_id, quote_id, comment, date) VALUES('', '$userId', '$quoteId', '$comment', '$date')";
    $query = mysqli_query($con, $sql);
    echo $query;

// if any of the parameters is missing
} else {
    echo "incompleteValues";
}

?>
