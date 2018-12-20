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
        // select all the comments of the particular quotes
        $sql = "SELECT comment.comment, users.firstName, users.lastname, comment.date, users.id
            FROM comment
                INNER JOIN users ON comment.user_id=users.id
                WHERE comment.quote_id='$quoteId' ORDER BY comment.date asc";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($query);

        echo '<div class="media commentarea">
                <a class="pull-left" href="profilePage.php?id=' . $row["id"] . '">
                    <div class="avatar">
                        <img class="media-object" alt="Tim Picture" src="assets/images/placeholder.jpg">
                    </div>
                </a>

                <div class="media-body">
                    <h4 class="media-heading">
                        <a href="profilePage.php?id=' . $row["id"] . '">' . $row["firstName"] . ' ' . $row["lastname"] . '</a>
                        <small> -  a second ago</small>
                    </h4>
                    <p>' . $comment . ' </p>
                </div>';
    }
}
?>

