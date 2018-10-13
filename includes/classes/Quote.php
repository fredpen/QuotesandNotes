<?php
   // require_once "includes/header.php";

   /**
    *
    */
   class Quote

   {
      private $con;
      private $errorArray;

      function __construct($con)
      {

         $this->con = $con;
         $this->errorArray  = array();

      }

      // sanitise quotes
      public function sanitiseQuote($quote) {
      $quote = strip_tags($quote);
      $quote = str_replace("  ", " ", $quote);
      $quote = ucfirst($quote);
      return $quote;
   }

      // upload quote into the database
      public function uploadQuote($content, $genre1, $genre2, $genre3, $author, $userDetails){

         $dt = date("Y-m-d h:i:s");
         $user = $userDetails['id'];
         $likes = 0;

         $sql = "INSERT INTO quotes VALUES('', '$dt', '$content', '$user', '$author', '$genre1', '$genre2', '$genre3')";

         $query = mysqli_query($this->con, $sql);

         if ($query) {
            return true;
         }else {
            return false;

         }
      }

      // retrieve a quotes from the database as quote of the day
      public function editQuote($quoteId){
      $sql = "SELECT quotes.id, quotes.dt, quotes.content, users.firstname, users.lastname, author.author, author.img, genre1.genre1,  genre2.genre2, genre3.genre3
               FROM quotes
                  INNER JOIN users ON quotes.user=users.id
                  INNER JOIN author ON quotes.author= author.id
                  INNER JOIN genre1 ON quotes.genre1=genre1.id
                  INNER JOIN genre2 ON quotes.genre2=genre2.id
                  INNER JOIN genre3 ON quotes.genre3=genre3.id
               WHERE quotes.id = '$quoteId'";

         $query = mysqli_query($this->con, $sql);
         $query = mysqli_fetch_array($query);
         return $query;
      }

      // fetch a particular author from the database --   // fetch all author if the parameter say all
      public function fetchAuthor ($num) {
         if ($num == "all") {
            $sql = "SELECT * FROM author ORDER BY author";
            $query = mysqli_query($this->con, $sql);
            return $query;
         }else {
            $sql = "SELECT * FROM author ORDER BY author LIMIT $num";
            $query = mysqli_query($this->con, $sql);
            return $query;
         }
      }

      // fetch a particular number of genre from the database  --      // fetch all genre if the parameter say all
      public function fetchGenre ($num)
      {
         if ($num == "all") {
            $sql = "SELECT * FROM genre1 ORDER BY genre1";
            $query = mysqli_query($this->con, $sql);
            return $query;
         }else {
            $sql = "SELECT * FROM genre1 ORDER BY genre1 LIMIT $num";
            $query = mysqli_query($this->con, $sql);
            return $query;

         }
      }

      // fetch the number of likes of a particular quote
      public function numberOfQuoteLover ($quoteId)
      {
         $sql = "SELECT * FROM quoteLovers WHERE quote='$quoteId'";
         $query = mysqli_query($this->con, $sql);
         return mysqli_num_rows($query);
      }

       // check if a user is loggedin and if the user has like the quote before
       public function quoteLoveCheck ($quoteId, $userId)
       {
         $sql = "SELECT id FROM quoteLovers WHERE quote='$quoteId' AND user='$userId'";
         $query = mysqli_query($this->con, $sql);
         if (mysqli_num_rows($query) != 0 ){
            return true;
         };
      }

      // find the id of a particular genre from the database
      public function genreId($genre)
      {
         $sql = "SELECT id FROM genre1 WHERE genre1='$genre'";
         $query = mysqli_query($this->con, $sql);
         $query = mysqli_fetch_array($query);
         return $query['id'];
      }

      // find the id of a particular author from the database
      public function authorId($author)
      {
         $sql = "SELECT id FROM author WHERE author='$author'";
         $query = mysqli_query($this->con, $sql);
         $query = mysqli_fetch_array($query);
         return $query['id'];
      }


      // query all the quotes that are from a particular author from the database
      public function fetchQuotesFromSameAuthor($author)
      {
       $sql = "SELECT quotes.id, quotes.dt, quotes.content, users.firstname, users.lastname, author.author, author.img, genre1.genre1,  genre2.genre2, genre3.genre3
            FROM quotes
               INNER JOIN users ON quotes.user=users.id
               INNER JOIN author ON quotes.author= author.id
               INNER JOIN genre1 ON quotes.genre1=genre1.id
               INNER JOIN genre2 ON quotes.genre2=genre2.id
               INNER JOIN genre3 ON quotes.genre3=genre3.id
            WHERE quotes.author='$author'";

         $query = mysqli_query($this->con, $sql);
         return $query;
      }

      // querry all the quotes from the database with a particular genre
      public function fetchQuotesFromSameGenre($genre)
      {
         // find the id of the author with the name $author
         $sql = "SELECT id FROM genre1 WHERE genre1='$genre'";
         $query = mysqli_query($this->con, $sql);
         $query = mysqli_fetch_array($query);
         $genreId = $query['id'];

         // query all the quotes with the genreId    
         $sql = "SELECT quotes.id, quotes.dt, quotes.content, users.firstname, users.lastname, author.author, author.img, genre1.genre1,  genre2.genre2, genre3.genre3
                FROM quotes
                  INNER JOIN users ON quotes.user=users.id
                  INNER JOIN author ON quotes.author= author.id
                  INNER JOIN genre1 ON quotes.genre1=genre1.id
                  INNER JOIN genre2 ON quotes.genre2=genre2.id
                  INNER JOIN genre3 ON quotes.genre3=genre3.id
               WHERE quotes.genre1='$genreId' OR quotes.genre2='$genreId' OR quotes.genre3='$genreId'";

         $query = mysqli_query($this->con, $sql);
         return $query;
      }

      // fetch the tracked user activities for the profile page
       public function fetchProfileDetails($userId)
      {
         $sql = "SELECT quotes.id, quotes.content, genre1.genre1, genre2.genre2, genre3.genre3, author.author, author.img, users.firstname, users.lastname, users.username, users.email, users.gender, users.dt
                 FROM quoteLovers
                  INNER JOIN quotes ON quoteLovers.quote=quotes.id
                  INNER JOIN users  ON quoteLovers.user=users.id
                  INNER JOIN genre1 ON quoteLovers.genre1=genre1.id
                  INNER JOIN genre2 ON quoteLovers.genre2=genre2.id
                  INNER JOIN genre3 ON quoteLovers.genre3=genre3.id
                  INNER JOIN author ON quoteLovers.author=author.id
               WHERE quoteLovers.user='$userId'";

         $query = mysqli_query($this->con, $sql);
         return $query;                      
      }
    
      // fetch the number of quotes a user has liked
      public function numberOfQuoteLoveByUser($userId)
      {      
         $query = $this->fetchProfileDetails($userId);
         $query = mysqli_num_rows($query);
         return $query;
      }


       public function fetchAuthorDetails($authorId)
      {
         $sql = "SELECT * FROM author WHERE id='$authorId'";
         $query = mysqli_query($this->con, $sql);
         $query = mysqli_fetch_array($query);
         return $query;
         }

      public function fetchUserDetails($userId)
      {
         $sql = "SELECT * FROM users WHERE id='$userId'";
         $query = mysqli_query($this->con, $sql);
         $query =mysqli_fetch_array($query);
         return $query;
      }

      // fetching the id of all quotes in the database
       public function fetchQuoteId()
      {
         $idArray = [];
         $sql = "SELECT id FROM quotes";
         $query = mysqli_query($this->con, $sql);
         // push all the ids into an array
         while ($row = mysqli_fetch_array($query)) {
            array_push($idArray, $row['id']);
         }
         return $idArray;
      }

      // fetch all the details of a partcular quote in a database
      public function fetchQuoteDetails($quoteId){
          $sql = "SELECT quotes.id, quotes.dt, quotes.content, author.author, author.img, genre1.genre1,  genre2.genre2, genre3.genre3
                FROM quotes
                  INNER JOIN author ON quotes.author= author.id
                  INNER JOIN genre1 ON quotes.genre1=genre1.id
                  INNER JOIN genre2 ON quotes.genre2=genre2.id
                  INNER JOIN genre3 ON quotes.genre3=genre3.id
               WHERE quotes.id='$quoteId'";

         $query = mysqli_query($this->con, $sql);
         $query = mysqli_fetch_array($query);
         return $query;
      }

      // fetch all the quote from the database
      public function fetchQuotes()
      {
         $quotesArray = [];
         // fetch all quotes id
         $idArray = $this->fetchQuoteId();
         // shuffle the id array
         shuffle($idArray);
         // loop and get the details of quotes
         foreach ($idArray as $quoteId) {
            array_push($quotesArray, $this->fetchQuoteDetails($quoteId));
         }
         // return the array that has the shuffled quotes
         return $quotesArray;
      }


      // fetch random quote for the quote of the moment 
      public function fetchRandomQuote()
      {
         $idArray = $this->fetchQuoteId();
         // shuffle the array 
         shuffle($idArray);
         $randomId  = $idArray[0];
         return $this->fetchQuoteDetails($randomId);
      }

      // saving users email for subscription purposes
      public function pushEmail($receipientMail)
      {
         $sql = "SELECT email FROM subscriptionEmail";
         $query = mysqli_query($this->con, $sql);
         $query = mysqli_fetch_array($query);

         // check if the users email is not already in the database
         while ($row = ($query['email'])) {
            if ($row !== $receipientMail) {
               // echo $row. " and " . $receipientMail;
               $sql ="INSERT INTO subscriptionEmail VALUES('', '$receipientMail')";
               $query = mysqli_query($this->con, $sql);
            }
         }
      }
   
     
}


 ?>
