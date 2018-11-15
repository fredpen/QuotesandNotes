<?php

// its worth remembering that the id on this page is the unique id of the user
$date = date("Y/m/d/m/s");
$quoteId;
if (isset($_GET['id'])) {
    $quoteId = $_GET['id'];
}
//  else {
//     header("Location: index.php");
// }

require_once 'includes/classes/Comment.php';
include_once "includes/header.php";

$comment = new Comment($con);

include_once "includes/quote_of_moment.php";
require_once 'includes/indexLeftContainer.php';


$quoteDetails = $quote->fetchQuoteDetails($quoteId);
$comments = $comment->fetchComments($quoteId);

?>

<div class="main-container">
           
    <div class="topMargin45 col-md-10 col-md-offset-1">
        <div class="col-md-8 col-md-offset-3 rotating-card-container manual-flip">
            <div class="card card-rotate">

                <div class="front">
                    <div class="card-content">

                        <!-- the quote  -->
                        <p class="card-title"> <?php echo $quoteDetails['content']; ?> </p>
                        <!-- the quote genre -->
                        <p class="card-description">
                            <div class="genreList">
                                <p class="label label-primary">
                                    <a class="genre" href='genre.php?genre=<?php echo $quoteDetails['genre1'] ?>'><?php echo $quoteDetails['genre1']; ?></a>
                                </p>
                                <p class="label label-info">
                                    <a class="genre" href='genre.php?genre=<?php echo $quoteDetails['genre2'] ?>'><?php echo $quoteDetails['genre2']; ?></a>
                                </p>
                                <p class="label label-default">
                                    <a class="genre" href='genre.php?genre=<?php echo $quoteDetails['genre3'] ?>'><?php echo $quoteDetails['genre3']; ?></a>
                                </p>
                            </div>

                            <footer class="quote-footer">
                                <?php 
                                $quoteLoveCheck = $quote->quoteLoveCheck($quoteId, $userId);
                                $numberOfQuoteLover = $quote->numberOfQuoteLover($quoteId);
                                $noUserString = ($numberOfQuoteLover == 0 ? "be the first to like this quote" : $numberOfQuoteLover);
                                $loveQuoteString = ($numberOfQuoteLover == 1 ? "you liked this quote" : $numberOfQuoteLover . " people liked this quote");

                                    // check if a user is loggedin 
                                if ($userId) {

                                        // if user has liked the quote before
                                    if ($quoteLoveCheck) { ?>
                                            <p class="<?php echo $row['id']; ?>">
                                                <a type="button" data-toggle="modal" data-target="#unlikeQuote">
                                                <img class="<?php echo $row['id']; ?> like-image" src="assets/images/loveRed.png" alt="love button">
                                                <span class="<?php echo $row['id'] ?>quoteText"><?php echo $loveQuoteString; ?></span>
                                            </p>
                                        <!--if user has not like quote before -->
                                        <?php 
                                    } else { ?>
                                            <p class="<?php echo $row['id']; ?>">
                                                <img class="<?php echo $row['id']; ?> like-image" src="assets/images/loveBlack.png" alt="like button">
                                                <span class="<?php echo $row['id'] ?>quoteText"><?php echo $noUserString ?></span>
                                                </p>
                                        <?php 
                                    }; 
                                                                
                                    // if there is no logged in user
                                } else { ?>
                                        <!-- Button trigger modal for liking quotes-->
                                        <p class="<?php echo $row['id']; ?>">
                                            <a type="button" data-toggle="modal" data-target="#signUp">
                                                <img class="<?php echo $row['id']; ?> like-image" src="assets/images/loveBlack.png" alt="like button">
                                                <span class="<?php echo $row['id'] ?>quoteText"> <?php echo $noUserString; ?>
                                            </a>
                                        </p><?php 
                                        }; ?>
                            </footer>

                            <!-- quotes author and image -->
                            <div class="footnote">
                                <div class="author">
                                    <a href="author.php?author=<?php echo $quote->authorId($row['author']); ?>">
                                        <img src="assets/images/author/<?php echo ($row['author']); ?>.jpg" alt="<?php echo imagify($row['author']); ?>" class="avatar img-raised">
                                        <span><?php echo imagify($row['author']); ?></span>
                                    </a>
                                </div>
                            </div> <!-- end of footer -->
                        </p>

                        <hr class="hr">

                        <!-- share and edit buttons -->
                        <div class="pull-right col-xs-12 text-right">
                            <?php if ($admin) { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Edit quote" data-container="body" class="label label-info" href="edit.php?id=<?php echo $quoteId ?>">Edit
                            </a> <?php 
                            } ?>
                            
                            <!-- twitter buttons -->
                            <a class="twitter-share-button"
                                href="https://twitter.com/share"
                                data-text="<?php echo $row['content'] ?>"
                                data-url="https://QuotesandNotes.com"
                                data-hashtags="<?php echo $row['genre1'] . "," . $row['genre2'] . "," . $row['genre3'] ?>"
                                data-via="freddgreat"
                                data-show-count="true"
                                data-related="twitterapi,twitter">
                            </a>

                            <!-- facebook buttons -->
                            <a href="#pablo" class="btn btn-just-icon btn-round btn-facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <!-- mail button -->
                            <a type="button" class="btn btn-just-icon btn-round btn-rotate" data-toggle="tooltip" data-placement="top" title="mail quote to a friend" data-container="body">
                                <i class="fas fa-envelope"></i>
                            </a>
                            
                        </div>
                    </div> <!-- end of card content -->
                </div> <!-- end of front -->

                <div class="back">
                    <div class="card-content">
                        <form action="index.php" method="POST">
                            <input type="text" class="displayNone" value="<?php echo $row['content']; ?>" name="mailContent">
                            <input type="text" class="displayNone" value="<?php echo $row['author']; ?>" name="mailAuthor">

                            <p class="card-title paddingTop30"><?php echo $row['content']; ?></p>

                            <div class="text-center">

                                <!-- enter additional message -->
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons"></i>
                                    </span>
                                    <input type="text" name="additionalMessage" class="form-control" placeholder="Enter additional message here">
                                </div>

                                <!-- enter receipientMail -->
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons"></i>
                                    </span>
                                    <input type="text" name="receipientMail" class="form-control" placeholder="Enter receiver's Mail">
                                </div>

                            </div>
                            
                            <!-- mail sent buttons -->
                            <div class="text-center">
                                <button type="submit" name="mailButton" class="btn btn-round btn-sm btn-primary text-lowercase">Mail quote </button>
                                <button type="button" name="button" class="btn btn-white btn-round btn-rotate">
                                    <i class="material-icons">refresh</i> Back...
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-md-offset-2">

        <div class="media-area">
            <h3 class="title text-center">

                <!-- number of comments on a particular quotes, output only if greater than 1 -->
                <?php if (mysqli_num_rows($comments) > 1) {
                    echo mysqli_num_rows($comments);
                } ?> Comments
            </h3>
            
            <?php while ($row = mysqli_fetch_array($comments)) { ?>
            <div class="media">
                <a class="pull-left" href="profilePage.php?id=<?php echo $row['id'] ?>">
                    <div class="avatar">
                        <img class="media-object" alt="Tim Picture" src="assets/images/placeholder.jpg">
                    </div>
                </a>

                <div class="media-body">
                    <h4 class="media-heading">
                        <a href="profilePage.php?id=<?php echo $row['id'] ?>"><?php echo $row['firstName'] . " " . $row['lastname']; ?> </a> <small>&middot; 
                            <?php 
                            $dt = $row['date'];
                            // echo $dt;
                            // $time = strtotime("Y/m/d", $dt);
                            var_dump($time);

                            // date("Y-m-d H:i:s", strtotime("now"));
                            // date_diff($dt, date("d/m/Y H:i:s"))



                            ?> 
                            
                        </small>
                    </h4>
                    
                    <p><?php echo $row['comment']; ?></p>
                </div>
            </div> <?php 
                }; ?>

            <h3 class="text-center">Post your comment <br><small>- Logged In User -</small></h3>
            <div class="media media-post">
                <a class="pull-left author" href="profilePage.php?id=<?php echo $row['id'] ?>">
                    <div class="avatar">
                        <img class="media-object" alt="Tim Picture" src="assets/images/placeholder.jpg">
                    </div>
                </a>

                <div class="media-body">
                    <textarea id="comment" class="form-control" name="comment" placeholder="Write some nice stuff or nothing..." rows="6"></textarea>
                    <div class="media-footer">
                        <a id="submit" class="btn btn-primary pull-right">Post Comment</a>
                    </div>
                </div>    

            </div> <!-- end media-post -->
        </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
    $("#submit").click(function(){

        var quoteId = <?php echo $quoteId; ?>;
        
        if (userId) {
            
            // get the details of the comment from the textarea
            var comment = $("#comment").val();
            if (comment.length == 0) {
                $("#comment").addClass("noComment");
                console.log("less than 0");
            }else{
                // make ajax call to test if user has liked quote before
                $.post("includes/handlers/ajax/postComment.php", {quoteId:quoteId, userId:userId, comment:comment}, function(data){
                    console.log(data);
                    
                    console.log("we can proceed now to ajax");
                })
                $("#comment").val("");
            }  

        // prompt the user to log in 
        }else{
            console.log("u need to login");
            
        }
    })
})

</script>
                


<?php
require_once 'includes/indexRightContainer.php';
include_once "includes/footer.php"

?>
