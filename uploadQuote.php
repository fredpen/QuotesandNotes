<?php
$pageTitle = "Contribute";
require_once 'includes/header.php';
require_once "includes/quote_of_moment.php";
 // save the data from fetch author to authors
$authorArray = $quote->fetchAuthor("all");
// save the data from fetch genre
$genreArray = $quote->fetchGenre("all");

$errorMessages = array();
$errors = [
    $loginError = "<strong>Holy guacamole!</strong> You need to log in first. You can do that",
    $serverError = "<strong>Holy guacamole! </strong> Sorry cant upload quote at the moment",
    $successMessage = "<strong>Your quote has successfully been uploaded!</strong> Thanks for contributing",
    $duplicateError = "<strong>Sorry! </strong>but the quote is already in our database",
    $fieldError = "<strong>oops! </strong> sorry but it seems you left one or two field(s) empty",
];

// check for errors after trying to upload the quote
function checkError($errorMessages, $errors)
{
    // check if there is an error
    if (count($errorMessages) > 0) {
        foreach ($errorMessages as $errorMessage) {
            foreach ($errors as $error) {
                if ($errorMessage == $error) {
                    return $error;
                }
            }
        }
    }
    return;
}

if (isset($_POST['uploadQuoteButton'])) {
    // check if there is a logged in user
    if ($userDetails) {
      // check if all the needed boxes are filled
        if ($_POST['author'] !== "author" && isset($_POST['genreList']) && count($_POST['genreList']) == 3) {
            // store all fields into variables
            $content = $quote->sanitiseQuote($_POST['quote']);
            $author = $_POST['author'];
            $genre = $_POST['genreList'];
            $genre1 = $genre[0];
            $genre2 = $genre[1];
            $genre3 = $genre[2];

            $uploadQuote = $quote->uploadQuote($content, $genre1, $genre2, $genre3, $author, $userId);
            // if quotes already exists
            if (!$uploadQuote) {
                array_push($errorMessages, $duplicateError);
            // if quote is successfully uploaded
            } elseif ($uploadQuote) {
                array_push($errorMessages, $successMessage);
             // if quote fail to upload relating to database
            } else {
                array_push($errorMessages, $serverError);
            }

            // if there is no logged in user
        } else {
            array_push($errorMessages, $fieldError);
        }
    // if there is no logged in user
    } else {
        array_push($errorMessages, $loginError);
    }
}

$theError = checkError($errorMessages, $errors);

?>
<div class="fcontainer">
    <div class="frow">

        <?php if ($theError) { ?>
            <div id="upload_error" role='alert'>
                <span class="notifs_message"><?php echo $theError ?> </span>
                <div class="button_container">
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>X</span></button>
                </div>
            </div>

            <?php 
        } ?>
       
        <div class="main main-raised topMargin0">
            <div class="contact-content">
                <h1 class="title bright text-center font30">Contribute    </h1>
                
                <?php if ($auth == 1) { ?>

                    <div class="frow">
                        <form action="uploadQuote.php" method="post">

                            <div class="col-sm-12 mx-auto">
                                <div class="form-group label-floating">
                                    <label class="control-label quote"> Enter your quote or note here...</label>
                                    <textarea class="form-control" name="quote" rows="2"></textarea>
                                    <span class="material-input"></span>
                                </div>
                            </div>

                            <div class="col-sm-12 bottomMargin15">
                                <select name="author" class="grace" data-style="btn btn-primary btn-round" title="Choose Author" data-size="7">
                                    <option name="select Author" value="author">Choose Author</option>
                                    <?php while ($row = mysqli_fetch_array($authorArray)) { ?>
                                        <option name="author" value="<?php echo $row['id']; ?>"><?php echo imagify($row['author']); ?></option>
                                        <?php 
                                    } ?>
                                </select>
                            </div>

                            <div class="col-sm-12 genreSelection">
                                <?php while ($row = mysqli_fetch_array($genreArray)) {; ?>
                                    <div class="checkbox genreSelect">
                                        <label>
                                            <input type="checkbox" value="<?php echo $row['id']; ?>" name="genreList[]">
                                            <?php echo $row['genre1']; ?>
                                        </label>
                                    </div>
                                    <?php 
                                }; ?>
                            </div>
                
                            <div class="col-sm-12  text-center">
                                <button onclick="contribute()" ondblclick="contribute()" id="submitQuote" type="submit" name="uploadQuoteButton" class="btn btn-primary btn-lg" data-toggle="tooltip" data-Button group placement="top" title="Select three genre category before submitting the quote">Submit
                                </button>
                            </div>

                        </form>

                    </div>

                    <?php 
                } else { ?>

                    <div class="frow">
                            <p class="title"><i class="red fas fa-star-of-life"></i> Kindly note that only registered and authorised member can upload quotes and notes into our collection and be paid. To join this elite team, kindly fill the form below.</p>

                        <div class="col-sm-12 full-width">
                        
                            <form role="form" id="contact-form" method="post">

                                <div class="form-group label-floating">
                                    <label class="control-label">Your name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>

                                <div class="form-group label-floating">
                                    <label class="control-label">Email address</label>
                                    <input type="email" name="email" class="form-control"/>
                                </div>

                                <div class="form-group label-floating">
                                    <label class="control-label">Phone(optional)</label>
                                    <input type="text" name="phone" class="form-control"/>
                                </div>

                                <div class="submit text-center">
                                    <input type="submit" class="btn btn-primary btn-raised btn-round" value="I want to start earning" />
                                </div>
                            </form>
                        </div>

                        <div class="col-md-12 full-width">

                            <div class="info info-horizontal">

                                <div class="icon icon-primary">
                                    <i class="fas fa-gavel"></i>
                                </div>

                                <div class="description">
                                    <h4 class="info-title">Only uploads that follow this rules will be paid</h4>
                                    <ul>
                                        <li>All quotes must be from a popular or a well known source, we only want quotes that people are interested in. We fancy quotes mostly from celebrities</li>
                                    </ul>
                                        <ul>
                                        <li>Our system is built to prevent uploads of quote that already exist in our database. However, If for any reason a member uploads a quote thats already in our database, we will not pay for such upload. Duplicates quotes would not be paid. </li>
                                        <li>Payment is made on monday of every week</li>
                                    </ul>

                                    <p class="title">Still interested? fill the form above and start earning </p>
                                    
                                </div>

                            </div>

                            
                        </div>
                    </div>
                    <?php 
                } ?>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>


