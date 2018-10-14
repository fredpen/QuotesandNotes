<?php

      require_once 'includes/databaseConfig.php';
      require_once 'includes/classes/Constants.php';
      require_once 'includes/classes/Account.php';
      require_once 'includes/classes/Quote.php';


      require_once 'includes/classes/PHPMailer.php';
      require_once 'includes/classes/SMTP.php';
      require_once 'includes/classes/Exception.php';

         
     // keeping track of users information when filling a form
      function getInputValue ($name) {
        if (isset($_POST[$name])) {
          echo $_POST[$name];
        }
      }

      // variables
       $userId;
      $userDetails;
      $author;
      $admin = false;


      $account = new Account($con);
      $quote = new Quote($con);

      //Import PHPMailer classes into the global namespace
      use PHPMailer\PHPMailer\PHPMailer;

      //Create a new PHPMailer instance
      $mail = new PHPMailer;
      require_once 'includes/handlers/mailQuote-handler.php';

      // fetch a quote for the quote of the moment
      $randQuote = $quote->fetchRandomQuote();
   
      
      // save all the quotes into an array
      $quoteArray = $quote->fetchQuotes();
      // save the data from fetch author to authors
      $authors = $quote->fetchAuthor("5");
      $authorAll = $quote->fetchAuthor("all");
      // save the data from fetch genre
      $genres = $quote->fetchGenre("5");
      $genreAll = $quote->fetchGenre("all");

      require_once 'includes/handlers/register-handler.php';
      require_once 'includes/handlers/login-handler.php';
      require_once 'includes/navMenu.php';
      require_once 'includes/session.php';

      // confirming if thier is a logged in user and assign it to a variable to track it


      if ($userDetails) {
         $userId = $userDetails['id'];
      } else {
         $userId = '';
         }

      $jsonUserid = json_encode($userId);

     ?>

   <script>
      userId = <?php echo $jsonUserid; ?>;
   </script>
