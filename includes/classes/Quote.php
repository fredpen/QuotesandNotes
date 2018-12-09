<?php

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
        $this->errorArray = array();
    }

    // find the number of quotes uploaded by a user
    public function numOfQuoteUploaded($userId)
    {
        $sql = ("SELECT id FROM quotes WHERE user='$userId'");
        $query = mysqli_query($this->con, $sql);
        $query = mysqli_num_rows($query);
        return $query;
    }
 
    // sanitise quotes
    public function sanitiseQuote($quote)
    {
        $quote = strip_tags($quote);
        $quote = str_replace("  ", " ", $quote);
        return ucfirst($quote);
    }

    public function imagify($string)
    {
        $string = str_replace("_", " ", $string);
        return $string;
    }

    // upload quote into the database
    public function uploadQuote($content, $genre1, $genre2, $genre3, $author, $userId)
    {
         // shorten the content to a max of 50 characters
        $search = substr($content, 0, 50);
        $sql = "SELECT content FROM quotes WHERE content LIKE '%$search%'";
        $query = mysqli_query($this->con, $sql);

        // check if there is already a quote similar to the quote to be uploaded
        if (mysqli_num_rows($query) > 0) return false;
        
         // if not then push the quote
        $dt = date("Y-m-d h:i:s");
        $stmt = $this->con->prepare("INSERT INTO quotes VALUES('', ?, ?, ?, ?, ?, ?, ? )");
        $stmt->bind_param("sssssss", $dt, $content, $userId, $author, $genre1, $genre2, $genre3);
        $stmt->execute();
        return ($stmt->affected_rows === 0 ? fasle : true);
    }

    // retrieve a quotes from the database as quote of the day
    public function editQuote($quoteId)
    {
        $stmt = $this->con->prepare("SELECT quotes.id, quotes.dt, quotes.content, users.firstname, users.lastname, author.author, genre1.genre1,  genre2.genre2, genre3.genre3
               FROM quotes
                  INNER JOIN users ON quotes.user=users.id
                  INNER JOIN author ON quotes.author= author.id
                  INNER JOIN genre1 ON quotes.genre1=genre1.id
                  INNER JOIN genre2 ON quotes.genre2=genre2.id
                  INNER JOIN genre3 ON quotes.genre3=genre3.id
               WHERE quotes.id = ?");
        $stmt->bind_param("i", $quoteId);
        $stmt->execute();
        if ($stmt->num_rows === 0) return false;
        $results = $stmt->get_result();
        return $results->fetch_assoc();
    }

    // fetch a particular author from the database
    public function fetchAuthor($num)
    {
        if ($num == "all") {
            $sql = "SELECT * FROM author ORDER BY author";
            return mysqli_query($this->con, $sql);
        } else {
            $sql = "SELECT * FROM author ORDER BY author LIMIT $num";
            return mysqli_query($this->con, $sql);
        }
    }

    // fetch a particular number of genre from the database 
    public function fetchGenre($num)
    {
        if ($num == "all") {
            $sql = "SELECT * FROM genre1 ORDER BY genre1";
            return mysqli_query($this->con, $sql);
        } else {
            $sql = "SELECT * FROM genre1 ORDER BY genre1 LIMIT $num";
            return mysqli_query($this->con, $sql);
        }
    }

      // fetch the number of likes of a particular quote
    public function numberOfQuoteLover($quoteId)
    {
        $sql = "SELECT id FROM quoteLovers WHERE quote='$quoteId'";
        $query = mysqli_query($this->con, $sql);
        return mysqli_num_rows($query);
    }

    // number of quoteLover string
    public function numberOfQuoteLoverString($quoteId, $userId)
    {
        if (empty($userId) || $this->quoteLoveCheck($quoteId, $userId) == false) {
            $num = $this->numberOfQuoteLover($quoteId);
            if ($num > 1) {
                return $num . " people love this quote";
            } else {
                return ($num == 0 ? " be the first to love this quote" : $num . " person love this quote");
            }
        } else {
            if ($this->quoteLoveCheck($quoteId, $userId) == true) {
                $num = $this->numberOfQuoteLover($quoteId);
                if ($num > 2) {
                    return " you and " . ($num - 1) . " people love this quote";
                } elseif ($num == 2) {
                    return " you and " . ($num - 1) . " person love this quote";
                } else {
                    return ($num == 0 ? " be the first to love this quote" : $num . " you love this quote");
                }
            }
        }
    }

       // check if a user is loggedin and if the user has like the quote before
    public function quoteLoveCheck($quoteId, $userId)
    {
        $sql = "SELECT id FROM quoteLovers WHERE quote='$quoteId' AND user='$userId'";
        $query = mysqli_query($this->con, $sql);
        return (mysqli_num_rows($query) !== 0 ? true : false);
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
        $sql = "SELECT quotes.id, quotes.dt, quotes.content, users.firstname, users.lastname, author.author, genre1.genre1,  genre2.genre2, genre3.genre3
            FROM quotes
               INNER JOIN users ON quotes.user=users.id
               INNER JOIN author ON quotes.author= author.id
               INNER JOIN genre1 ON quotes.genre1=genre1.id
               INNER JOIN genre2 ON quotes.genre2=genre2.id
               INNER JOIN genre3 ON quotes.genre3=genre3.id
            WHERE quotes.author='$author'";
        return mysqli_query($this->con, $sql);
    }

    public function numOfQuotesFromSameAuthor($authorId)
    {
        $sql = "SELECT id FROM quotes WHERE author='$authorId'";
        $query = mysqli_query($this->con, $sql);
        return mysqli_num_rows($query);
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
        $sql = "SELECT quotes.id, quotes.dt, quotes.content, users.firstname, users.lastname, author.author, genre1.genre1,  genre2.genre2, genre3.genre3
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
    public function fetchQuotesLovedByUser($userId)
    {
        $sql = "SELECT quotes.id, quotes.content, genre1.genre1, genre2.genre2, genre3.genre3, author.author
            FROM quoteLovers
                INNER JOIN quotes ON quoteLovers.quote=quotes.id
                INNER JOIN genre1 ON quoteLovers.genre1=genre1.id
                INNER JOIN genre2 ON quoteLovers.genre2=genre2.id
                INNER JOIN genre3 ON quoteLovers.genre3=genre3.id
                INNER JOIN author ON quoteLovers.author=author.id
            WHERE quoteLovers.user='$userId'";

        return mysqli_query($this->con, $sql);
    }

    // fetch the number of quotes a user has liked
    public function numberOfQuoteLoveByUser($userId)
    {
        $query = $this->fetchQuotesLovedByUser($userId);
        return mysqli_num_rows($query);
    }


    public function fetchAuthorDetails($authorId)
    {
        $sql = "SELECT * FROM author WHERE id='$authorId'";
        $results = mysqli_query($this->con, $sql);
        return mysqli_fetch_array($results);
    }

    public function fetchUserDetails($userId)
    {
        $stmt = $this->con->prepare("SELECT * FROM users WHERE id=?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results->fetch_assoc();
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
    public function fetchQuoteDetails($quoteId)
    {
        $sql = "SELECT quotes.id, quotes.dt, quotes.content, author.author, genre1.genre1,  genre2.genre2, genre3.genre3
                FROM quotes
                  INNER JOIN author ON quotes.author= author.id
                  INNER JOIN genre1 ON quotes.genre1=genre1.id
                  INNER JOIN genre2 ON quotes.genre2=genre2.id
                  INNER JOIN genre3 ON quotes.genre3=genre3.id
               WHERE quotes.id='$quoteId'";

        $query = mysqli_query($this->con, $sql);
        return mysqli_fetch_array($query);
    }

    


      // fetch random quote for the quote of the moment 
    public function fetchRandomQuote()
    {
        $idArray = $this->fetchQuoteId();
         // shuffle the array 
        shuffle($idArray);
        $randomId = $idArray[0];
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
                $sql = "INSERT INTO subscriptionEmail VALUES('', '$receipientMail')";
                $query = mysqli_query($this->con, $sql);
            }
        }
    }

    // make a playlist of quotes
    public function quotePlaylist($quoteArray, $num)
    {
        $shuffledArray = array();
        $a = 0;
        foreach ($quoteArray as $key) {
            if ($a < $num) {
                array_push($shuffledArray, $key);
                $a++;
            } else {
                return $shuffledArray;
            }

        }
    }


    // fetch all the quote from the database
    public function fetchQuotes()
    {
        $quotesArray = [];
         // fetch all quotes id
        $idArray = $this->fetchQuoteId();
        // loop and get the details of quotes
        foreach ($idArray as $quoteId) {
            array_push($quotesArray, $this->fetchQuoteDetails($quoteId));
        }
        // shuffle the id array
        shuffle($quotesArray);
         // return the array that has the shuffled quotes
        return $quotesArray;
    }


}


?>
