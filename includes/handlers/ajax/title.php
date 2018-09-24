<?php
   require_once '../../databaseConfig.php';

    // check if the quote id and the user id is set
    if (isset($_POST['userId']) && isset($_POST['quoteId']) ) {
       $userId = $_POST['userId'];
       $quoteId = $_POST['quoteId'];

    // search the database to see if the user has like the quote before
       $sql = "SELECT * FROM quoteLovers WHERE quote='$quoteId' AND user='$userId'";
       $query = mysqli_query($con, $sql);

       if (mysqli_num_rows($query) == 0) {
          // push the userid and the quote id into the quotelovers database
          $sql = "INSERT INTO quoteLovers (quote, user) VALUES('$quoteId', '$userId')";
          $query = mysqli_query($con, $sql);
          // echo "success";
       // if logged in user already like the quote
       }  else {
          // echo "failure";
       }
    // if there is no logged in user
    }  else {
    // echo "noUser";
 }
  ?>
