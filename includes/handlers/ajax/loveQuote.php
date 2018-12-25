<?php
require_once '../../databaseConfig.php';

// check if the quote,the author the genres and user id is passed
$quoteId = $_POST['quoteId'];
$userId = $_POST['userId']; 

// check if the user has liked the quote before
$sql = "SELECT id FROM quoteLovers WHERE quote='$quoteId' AND user='$userId'";
$query = mysqli_query($con, $sql);

if (mysqli_num_rows($query) == 0) {
    // push the details into quotelovers
    $sql = "INSERT INTO quoteLovers (id, quote, user) VALUES('', '$quoteId', '$userId')";
    $query = mysqli_query($con, $sql);

    echo ($query ? "success" : "failure");
}
?>
