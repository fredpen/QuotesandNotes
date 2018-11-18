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

$account = new Account($con);
$quote = new Quote($con);

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;

//Create a new PHPMailer instance
$mail = new PHPMailer;
require_once 'includes/handlers/mailQuote-handler.php';






require_once 'includes/session.php';
require_once 'includes/navMenu.php';


if ($userDetails) { ?>
    <script type="text/javascript">
        var userId = <?php echo $userDetails['id']; ?>;
        var firstname = "<?php echo $userDetails['firstName']; ?>";
        var lastname = "<?php echo $userDetails['lastname']; ?>";
        var username = "<?php echo $userDetails['username']; ?>";
    </script>

    
<?php require_once 'includes/error_modals.php';
}; ?>
