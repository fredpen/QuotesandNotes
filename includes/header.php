<?php
      // converting the wikiname of authors to img names
function imagify($string)
{
      $string = str_replace("_", " ", $string);
      return $string;
}

require_once 'includes/databaseConfig.php';
require_once 'includes/classes/Constants.php';
require_once 'includes/classes/Account.php';
require_once 'includes/classes/Quote.php';


require_once 'includes/classes/PHPMailer.php';
require_once 'includes/classes/SMTP.php';
require_once 'includes/classes/Exception.php';


      // variables
$userId;
$username;
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

require_once 'includes/navMenu.php';
require_once 'includes/session.php';

if ($userDetails) {
      var_dump($userDetails);
      $userId = $userDetails['id'];
      $firstname = $userDetails['firstName'];
      $lastname = $userDetails['lastname'];
      $username = $userDetails['username'];



} else {
      $userId = '';
}

?>


<script>
    userId = <?php echo $userId; ?>;
   var firstname = "<?php echo $firstname; ?>";
   var lastname = "<?php echo $lastname; ?>";
   var username = "<?php echo $username; ?>";
</script>
