<?php
   require_once '../../databaseConfig.php';
   require_once '../../classes/Quote.php';
   $quote = new Quote($con);

      // check if the quote,the author the genres and user id is passed
      if (isset($_POST['quoteId']) && isset($_POST['genre1']) && isset($_POST['genre2']) && isset($_POST['genre3']) && isset($_POST['author'])) {

            $quoteId = $_POST['quoteId'];
            $userId = $_POST['userId'];
            $genre1 = $_POST['genre1'];
            $genre2 = $_POST['genre2'];
            $genre3 = $_POST['genre3'];
            $author = $_POST['author'];

            // change the genres and author to thier respective id's
            $genre1 = $quote->genreId($genre1);
            $genre2 = $quote->genreId($genre2);
            $genre3 = $quote->genreId($genre3);
            $author = $quote->authorId($author);

      // search the database to see if the user has like the quote before
            $sql = "SELECT * FROM quoteLovers WHERE quote='$quoteId' AND user='$userId'";
            $query = mysqli_query($con, $sql);

            if (mysqli_num_rows($query) == 0) {
      // push the userid,genres, author and the quote id into the quotelovers database
            $sql = "INSERT INTO quoteLovers (id, quote, user, genre1, genre2, genre3, author) VALUES('', '$quoteId', '$userId', '$genre1', '$genre2', '$genre3', '$author')";
            $query = mysqli_query($con, $sql);

      // check if the datbase is succesfully updated
            if ($query) {
            echo "success";
            }else {
            echo "failure";
            }

      // if logged in user already like the quote
            }  else {
            echo "you've liked this quote before";
            }

      }else{
            echo "nothing is happening here";
      }
   
  



 ?>
