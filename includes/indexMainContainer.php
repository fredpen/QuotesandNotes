 <?php 

$num = 1;
if ($quoteArray) {
    foreach ($quoteArray as $row) {
        $quoteId = $row['id']; ?>
        
        <div class="item">                
            <div class="card">
                <a href="quote.php?id=<?php echo $quoteId; ?>">
                    <div class="card-content">
                        <p class="card-title"> <?php echo $row['content']; ?> </p>
                        <!-- the quote genre -->
                        <div class="card-description genreList">
                            <p class="label label-primary">
                                <a class="genre" href='genre.php?genre=<?php echo $row['genre1'] ?>'><?php echo $row['genre1']; ?></a>
                            </p>
                            <p class="label label-info">
                                <a class="genre" href='genre.php?genre=<?php echo $row['genre2'] ?>'><?php echo $row['genre2']; ?></a>
                            </p>
                            <p class="label label-default">
                                <a class="genre" href='genre.php?genre=<?php echo $row['genre3'] ?>'><?php echo $row['genre3']; ?></a>
                            </p>
                        </div>
                        <footer class="quote-footer">
                            <div>
                                <?php 
                                $quoteLoveCheck = $quote->quoteLoveCheck($quoteId, $userId);
                                $numberOfQuoteLover = $quote->numberOfQuoteLover($quoteId);
                                $loveQuoteString = $quote->numberOfQuoteLoverString($quoteId, $userId);
                                // check if a user is loggedin 
                                if ($userId) {
                                    // if user has liked the quote before
                                    if ($quoteLoveCheck) { ?>
                                        <p class="<?php echo $row['id']; ?>">
                                            <a type="button" data-toggle="modal" data-target="#unlikeQuote">
                                                <i class="<?php echo $row['id']; ?> fas fa-heart red"></i>
                                                <span class="<?php echo $row['id'] ?>quoteText"><?php echo $loveQuoteString; ?></span>
                                            </a>
                                        </p>

                                    <!-- if user has not liked the quote before -->
                                        <?php 
                                    } else { ?>
                                        <p class="<?php echo $row['id']; ?>">
                                            <i class="<?php echo $row['id']; ?> fas fa-heart black"></i>
                                            <span class="<?php echo $row['id'] ?>quoteText"><?php echo $loveQuoteString ?></span>
                                        </p>
                                        <?php 
                                    }; 
                                                                    
                                    // if there is no logged in user
                                } else { ?>
                                    <p class="<?php echo $row['id']; ?>">
                                        <!-- Button trigger modal for liking quotes-->
                                        <a type="button" data-toggle="modal" data-target="#signUp">
                                            <i class="<?php echo $row['id']; ?> fas fa-heart black"></i>
                                            <span class="<?php echo $row['id'] ?>quoteText"><?php echo $loveQuoteString ?>                       
                                        </a>
                                    </p>
                                    <?php 
                                }; ?>
                            </div>
                            <div class="numComments">
                                <?php $commentString = (mysqli_num_rows($comment->fetchComments($quoteId)) < 2 ? " comment" : " comments") ?>
                                <a href="quote.php?id=<?php echo $quoteId; ?>"><i class="fas fa-comment black"></i> <?php echo mysqli_num_rows($comment->fetchComments($quoteId)) + 1; ?><?php echo $commentString ?></a>
                            </div>
                        </footer>

                        <!-- quotes author and image -->
                        <div class="footnote">
                            <div class="author">
                                <a href="author.php?nm=<?php echo $row['author'] ?>&author=<?php echo $quote->authorId($row['author']); ?>">
                                    <img src="assets/images/author/<?php echo ($row['author']); ?>.jpg" alt="<?php echo imagify($row['author']); ?>" class="avatar img-raised">
                                    <span><?php echo imagify($row['author']); ?></span>
                                </a>
                            </div>
                        </div> 

                        <hr class="hr">

                        <!-- share and edit buttons -->
                        <div class="pull-right col-xs-12 text-right">
                            <?php if ($userId == 1) { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Edit quote" data-container="body" class="btn btn-just-icon btn-round btn-twitter" href="edit.php?id=<?php echo $quoteId ?>"><i class="fas fa-edit"></i>
                            </a> <?php 
                            } ?>
                            
                            <!-- facebook buttons -->
                            <a href="#pablo" class="btn btn-just-icon btn-round btn-facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>

                            <!-- whatsappp buttons -->
                            <a href="#pablo" class="btn btn-just-icon btn-round btn-facebook">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            
                            <!-- mail button -->
                            <a href="quote.php?id=<?php echo $quoteId; ?>" class="btn btn-just-icon btn-round btn-github" data-toggle="tooltip" data-placement="top" title="mail quote to a friend" data-container="body">
                                <i class="fas fa-envelope"></i>
                            </a>

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

                        </div>
                    </div> <!-- end of card content -->
                </a>
            </div>
        </div>
                    
        <!-- the javascript the monitor the ajax call and take full charge of the page -->
        <script type="text/javascript">
            $(document).ready(function(){
                $(".<?php echo $row['id'] ?>").click(function(){
                quoteId = '<?php echo $row['id']; ?>';

                // check if there is a logged in user
                if (userId) {
                    // make ajax call to test if user has liked quote before
                    $.post("includes/handlers/ajax/loveQuote.php", { quoteId:quoteId, userId:userId }, function(data){

                        if (data === "success") {
                            $(".<?php echo $row['id'] ?>quoteText").text("<?php echo $numberOfQuoteLover + 1 ?>");
                            // change the image to red and increase the number of likes
                            $(".<?php echo $row['id'] ?>.fas.fa-heart").removeClass("black").addClass("red");
                        } else if (data === "failure") {
                        console.log("cant like the quote at the moment");
                        }else {
                        console.log(data);
                        }
                    });
                } else {
                    var notLoggedin = true;
                    console.log("you need to log in to do that");
                    }
                })
            })
        </script>

        <?php 
        // the ads logic: for every 5 quotes put an ad up
        if ($num % 5 == 0) { ?>
            <div class="item">                
                <div class="card">
                    <h1>put ur ads here</h1>
                </div>
            </div>
            <?php 
        }
        $num++;
        continue;
    };

// if its not quote array is not coming as an associative array
} elseif ($quoteDetails) {
    $row = $quoteDetails; ?>

    <div class="singleCard">
        <div id="singleCard" class="card topMargin80">
            <div class="front">
                <div class="card-content">
                    <!-- the quote  -->
                    <div>
                        <p class="card-title"> <?php echo $row['content']; ?> </p>
                        
                        <footer class="quote-footer">
                        <!-- quotes author and image -->
                            <div class="footnote">
                                <div class="author">
                                    <a href="author.php?nm=<?php echo $row['author'] ?>&author=<?php echo $quote->authorId($row['author']); ?>">
                                        <img src="assets/images/author/<?php echo ($row['author']); ?>.jpg" alt="<?php echo imagify($row['author']); ?>" class="avatar img-raised">
                                        <span><?php echo imagify($row['author']); ?></span>
                                    </a>
                                </div>
                            </div>
                            <!-- the house for love checks -->
                            <div>
                                <?php 
                                $quoteLoveCheck = $quote->quoteLoveCheck($quoteId, $userId);
                                $numberOfQuoteLover = $quote->numberOfQuoteLover($quoteId);
                                $loveQuoteString = $quote->numberOfQuoteLoverString($quoteId, $userId);
                                // check if a user is loggedin 
                                if ($userId) {
                                    // if user has liked the quote before
                                    if ($quoteLoveCheck) { ?>
                                        <p class="<?php echo $row['id']; ?>">
                                            <a type="button" data-toggle="modal" data-target="#unlikeQuote">
                                                <i class="<?php echo $row['id']; ?> fas fa-heart red"></i>
                                                <span class="<?php echo $row['id'] ?>quoteText"><?php echo $loveQuoteString; ?></span>
                                            </a>
                                        </p>

                                    <!-- if user has not liked the quote before -->
                                        <?php 
                                    } else { ?>
                                        <p class="<?php echo $row['id']; ?>">
                                            <i class="<?php echo $row['id']; ?> fas fa-heart black"></i>
                                            <span class="<?php echo $row['id'] ?>quoteText"><?php echo $loveQuoteString ?></span>
                                        </p>
                                        <?php 
                                    }; 
                                                                    
                                    // if there is no logged in user
                                } else { ?>
                                    <p class="<?php echo $row['id']; ?>">
                                        <!-- Button trigger modal for liking quotes-->
                                        <a type="button" data-toggle="modal" data-target="#signUp">
                                            <i class="<?php echo $row['id']; ?> fas fa-heart black"></i>
                                            <span class="<?php echo $row['id'] ?>quoteText"><?php echo $loveQuoteString ?>                       
                                        </a>
                                    </p>
                                    <?php 
                                }; ?>
                            </div>
                        </footer>
                    </div>

                    <form action="index.php" method="POST">
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

                        <!-- mail sent buttons -->
                        <div class="text-center">
                            <button type="submit" name="mailButton" class="btn btn-round btn-md btn-primary text-lowercase">Mail quote </button>
                            <div class="pull-right text-right">
                            <?php if ($userId == 1) { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Edit quote" data-container="body" class="btn btn-just-icon btn-round btn-twitter" href="edit.php?id=<?php echo $quoteId ?>"><i class="fas fa-edit"></i>
                            </a> <?php 
                            } ?>
                            
                            <!-- facebook buttons -->
                            <a href="#pablo" class="btn btn-just-icon btn-round btn-facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>

                            <!-- whatsappp buttons -->
                            <a href="#pablo" class="btn btn-just-icon btn-round btn-facebook">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            
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
                        </div>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>

    <!-- tags -->
    <div class="card-description singleCardGenreList">
         <p class="tags">
            Tags: 
        </p>
        <p class="label label-primary">
            <a class="genre" href='genre.php?genre=<?php echo $row['genre1'] ?>'><?php echo $row['genre1']; ?></a>
        </p>
        <p class="label label-info">
            <a class="genre" href='genre.php?genre=<?php echo $row['genre2'] ?>'><?php echo $row['genre2']; ?></a>
        </p>
        <p class="label label-default">
            <a class="genre" href='genre.php?genre=<?php echo $row['genre3'] ?>'><?php echo $row['genre3']; ?></a>
        </p>
        <p class="label label-info">
            <a class="genre" href='genre.php?genre=<?php echo $row['author'] ?>'><?php echo imagify($row['author']); ?></a>
        </p>
    </div>
                    
    <!-- the javascript the monitor the ajax call and take full charge of the page -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".<?php echo $row['id'] ?>").click(function(){
            quoteId = '<?php echo $row['id']; ?>';

            // check if there is a logged in user
            if (userId) {
                // make ajax call to test if user has liked quote before
                $.post("includes/handlers/ajax/loveQuote.php", { quoteId:quoteId, userId:userId }, function(data){

                    if (data === "success") {
                        $(".<?php echo $row['id'] ?>quoteText").text("<?php echo $numberOfQuoteLover + 1 ?>");
                        // change the image to red and increase the number of likes
                        $(".<?php echo $row['id'] ?>.fas.fa-heart").removeClass("black").addClass("red");
                    } else if (data === "failure") {
                    console.log("cant like the quote at the moment");
                    }else {
                    console.log(data);
                    }
                });
            } else {
                var notLoggedin = true;
                console.log("you need to log in to do that");
                }
            })
        })
    </script>
    <?php 
}; ?>
<button class="loadContent">more quotes</button>
<script type="text/javascript">
    $(document).ready(function(){
        var quotePlaylist = <?php echo json_encode($rawArray); ?>;
        $(".loadContent").click(function(){
            $.post("includes/handlers/ajax/moreContent.php", {quotePlaylist: quotePlaylist}, function(data) {
                if (data) {
                    data = JSON.parse(data);
                    console.log(data);
                    for (let index = 0; index < data.length; index++) {
                        
                        var content = (data[index].content);
                        
                        console.log(content);
                        return; 
                    }
                }
                
            })
        })
    })
</script>
    
