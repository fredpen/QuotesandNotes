<?php
$date = date("Y/m/d/m/s");
if (isset($_GET['id'])) {
    $quoteId = $_GET['id'];
} else {
    header("Location: index.php");
}

$pageTitle = $_GET['q'];
require_once "includes/header.php";
require_once "includes/quote_of_moment.php";

 // save the data from fetch author to authors
$authorArray = $quote->fetchAuthor("5");
// save the data from fetch genre
$genreArray = $quote->fetchGenre("5");
$quoteDetails = $quote->fetchQuoteDetails($quoteId);
$comments = $comment->fetchComments($quoteId);
$quoteArray = "";
?>

<div class="fcontainer">
    <div class="frow">

        <div class="main main-raised light">
            <div class="profile-content">
                <div class="container">

                    <div class="row">
                        <div class="main-container">

                            <?php require_once 'includes/indexMainContainer.php'; ?>

                            <div class="media-area comment_section">
                                <h3 class="title text-center">
                                <?php if (mysqli_num_rows($comments) > 0) {
                                    echo (mysqli_num_rows($comments) == 1 ? "Comment" : mysqli_num_rows($comments) . " Comments");
                                } ?>
                                </h3>

                                <!-- Welcome message -->
                                <div id="commentSection" class="blockquote"> 
                                    <div class="media commentarea">
                                        <a class="pull-left" href="profilePage.php?id=1">
                                            <div class="avatar">
                                                <img class="media-object" alt="Tim Picture" src="assets/images/placeholder.jpg">
                                            </div>
                                        </a>

                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <a href="profilePage.php?id=1">Oladipupo Fredrick </a>
                                                <small> -  few days ago</small>
                                            </h4>
                                            
                                            <p>Hi <?php echo ($userDetails ? $last_name : "Guest"); ?>, <br>Welcome to comment's section. <br>Feel free to share your thoughts and experience about this quote with other people</p>
                                        </div>
                                    </div>

                                    <?php while ($row = mysqli_fetch_array($comments)) { ?>
                                    <div class="media commentarea">
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
                                <div id="postComment" class="media media-post">
                                    <a class="pull-left author" href="profilePage.php?id=<?php echo $userId ?>">
                                        <div class="avatar">
                                            <img class="media-object" alt="Tim Picture" src="assets/images/placeholder.jpg">
                                        </div>
                                    </a>

                                    <div class="media-body">
                                        <textarea id="comment" class="form-control" name="comment" placeholder="Share with us" rows="4"></textarea>
                                        <div class="media-footer text-center">
                                            <a id="submit" onclick="post_comment(<?php echo $quoteId; ?>)" class="btn btn-primary pull-right">Post Comment</a>
                                        </div>
                                    </div>    

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
	    </div>

       
    </div>
</div>
<?php
// require_once 'includes/indexRightContainer.php';
include_once "includes/footer.php"
?>

