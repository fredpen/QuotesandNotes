<?php
$pageTitle = "Contribute";
require_once 'includes/header.php';
 // save the data from fetch author to authors
$authorArray = $quote->fetchAuthor("all");
// save the data from fetch genre
$genreArray = $quote->fetchGenre("all");


$newUser = false;
$quoteSuccessful = false;
$uploadFailure = false;
$errorMessages = array();
$errors = [
    $loginError = "<strong>Holy guacamole!</strong> You need to log in first. You can do that",
    $serverError = "<strong>Holy guacamole!</strong> Sorry cant upload quote at the moment",
    $successMessage = "<strong>Your quote has successfully been uploaded!</strong> Thanks for contributing",
    $duplicateError = "<strong>Sorry!</strong>but the quote is already in our database",
    $fieldError = "<strong>oops!</strong> sorry but it seems you left one or two field(s) empty",
];

function upload()
{
    $uploadQuote = $quote->uploadQuote($content, $genre1, $genre2, $genre3, $author, $userId);
        // if quotes already exists
    if ($uploadQuote == "exists") {
        array_push($errorMessages, $duplicateError);
        // if quote is successfully uploaded
    } elseif ($uploadQuote) {
        array_push($errorMessages, $successMessage);
         // if quote fail to upload relating to database
    } else {
        array_push($errorMessages, $serverError);
    }
}

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
        <div id="contribute_container" class="main-container light">

            <?php if ($theError) { ?>
                <div id="errorDiv" class='' role='alert'>
                    <?php echo $theError; ?>
                    <a class='alert-link' href='signIn.php'>here</a>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <?php 
            }; ?>

            <form action="uploadQuote.php" method="post">
                <div class="col-sm-12 mx-auto">
                    <div class="form-group label-floating">
                        <label class="control-label quote"> Enter your quote here...</label>
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
    </div>
    <?php require_once 'includes/footer.php'; ?>


