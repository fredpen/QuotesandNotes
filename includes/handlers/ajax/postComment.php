<?php
require_once '../../databaseConfig.php';

if (isset($_POST['userId']) && isset($_POST['quoteId']) && isset($_POST['comment'])) {
    // variables
    $userId = $_POST['userId'];
    $quoteId = $_POST['quoteId'];
    $comment = $_POST['comment'];
    $date = date("Y:m:d H:i:s");

    // push he comment into the database
    $sql = "INSERT INTO comment (id, user_id, quote_id, comment, date) VALUES('', '$userId', '$quoteId', '$comment', '$date')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo "success";
    } else {
        echo "failure";
    }

} else {
    echo "incompleteValues";
}

?>
