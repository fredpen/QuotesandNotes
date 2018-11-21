<?php

// its worth remembering that the id on this page is the unique id of the user
$date = date("Y/m/d/m/s");
$quoteId;
if (isset($_GET['id'])) {
    $quoteId = $_GET['id'];
} else {
    header("Location: index.php");
}

require_once 'includes/classes/Comment.php';
require_once "includes/header.php";

$comment = new Comment($con);

require_once "includes/quote_of_moment.php";
 // save the data from fetch author to authors
$authorArray = $quote->fetchAuthor("5");
// save the data from fetch genre
$genreArray = $quote->fetchGenre("5");

$quoteArray = "";
$quoteDetails = $quote->fetchQuoteDetails($quoteId);
$comments = $comment->fetchComments($quoteId);

?>

<div class="fcontainer">
    <div class="frow">

    <!-- left section of the main container  -->
     <?php require_once 'includes/indexLeftContainer.php'; ?>

<div class="main-container">
           
    <div class="masour">
        <?php require_once 'includes/indexMainContainer.php'; ?>
    </div>


    <!-- comments -->
    <div class="col-md-8 col-md-offset-2">

        <div class="media-area">
            <h3 class="title text-center">
            <!-- number of comments on a particular quotes, output only if greater than 1 -->
            <?php if (mysqli_num_rows($comments) > 0) {
                echo mysqli_num_rows($comments);
            } ?> Comments
            </h3>

            <div id="commentSection"> 
                <?php while ($row = mysqli_fetch_array($comments)) { ?>
                <div class="media">
                    <a class="pull-left" href="profilePage.php?id=<?php echo $row['id'] ?>">
                        <div class="avatar">
                            <img class="media-object" alt="Tim Picture" src="assets/images/placeholder.jpg">
                        </div>
                    </a>

                    <div class="media-body">
                        <h4 class="media-heading">
                            <a href="profilePage.php?id=<?php echo $row['id'] ?>"><?php echo $row['firstName'] . " " . $row['lastname']; ?> </a>
                            <?php $dbint = $comment->dateInt($row['date']); ?>              
                            <small> - <?php echo $dbint ?> ago</small>
                        </h4>
                        <p><?php echo $row['comment']; ?></p>

                    </div>
                </div> <?php 
                    }; ?>
            </div>

            <h3 class="text-center">Post your comment <br><small>- Logged In User -</small></h3>
            <div class="media media-post">
                <a class="pull-left author" href="profilePage.php?id=<?php echo $userId ?>">
                    <div class="avatar">
                        <img class="media-object" alt="Tim Picture" src="assets/images/placeholder.jpg">
                    </div>
                </a>

                <div class="media-body">
                    <textarea id="comment" class="form-control" name="comment" placeholder="Write some nice stuff or nothing..." rows="4"></textarea>
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
                    if (data == "success") {

                       $("#commentSection").append("<div  class='media'><a class='pull-left' href='profilePage.php?id=" + userId + "'><div class='avatar'><img class='media-object' alt='Tim Picture' src='assets/images/placeholder.jpg'></div></a><div class='media-body'><h4 class='media-heading'><a href='profilePage.php?id=" + userId + "'>" + firstname + ' ' + lastname + "</a> <small> - a second ago</small> </h4><p>" + comment + "</p></div></div>");
                    }
                    
                })
                $("#comment").val("");
            }  

        // prompt the user to log in 
        }else{
            // <a type="button" data-toggle="modal" data-target="#unlikeQuote">
            console.log("u need to login");
        }
    })
})

</script>
                


<?php
require_once 'includes/indexRightContainer.php';
include_once "includes/footer.php"

?>
