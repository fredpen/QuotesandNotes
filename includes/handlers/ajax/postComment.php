<?php
require_once '../../databaseConfig.php';

// check if the quote id and the user id is set
if (isset($_POST['userId']) && isset($_POST['quoteId']) && isset($_POST['comment'])) {

    // variables
    $userId = $_POST['userId'];
    $quoteId = $_POST['quoteId'];
    $comment = $_POST['comment'];
    $date = date("Y/m/d H:i:s");

    // push he comment into the database
    $sql = "INSERT INTO comment (id, user_id, quote_id, comment, date) VALUES('', '$userId', '$quoteId', '$comment', '$date')";
    $query = mysqli_query($con, $sql);
    $query = mysqli_affected_rows($query);
    $commentId = $query['id'];

    $commentsql = "SELECT comment.comment, users.firstName, users.lastname, comment.date, users.id
            FROM comment
                INNER JOIN users ON comment.user_id=users.id
                WHERE comment.comment='$comment'";

    $query = mysqli_query($this->con, $sql);
        // $query = mysqli_fetch_array($query);
    return $query;

// if any of the parameters is missing
} else {
    echo "incompleteValues";
}

?>
