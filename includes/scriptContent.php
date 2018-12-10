<script>
    function likeQuote(quoteId) {
        if (userId) {
            // make ajax call to test if user has liked quote before
            $.post("includes/handlers/ajax/loveQuote.php", { quoteId:quoteId, userId:userId }, function(data){
                if (data === "success") {
                    console.log(data);
                    $("." + quoteId + "quoteText").text("<?php echo $numberOfQuoteLover + 1 ?> you liked this quote");
                    // change the image to red and increase the number of likes
                    $("." + quoteId + ".fas.fa-heart").removeClass("black").addClass("red");
                } else if (data === "failure") {
                    alert("cant like the quote at the moment");
                }else {
                    console.log(data);
                }
            });
        }
        
    };

    <?php if ($pageTitle !== "Quote") { ?>

      
        function loadQuotes() {
            var quotePlaylist = <?php echo json_encode($rawArray); ?>;
            var content, genre1, genre2, genre3, author;
                // alert("we hehe");
                $.post("includes/handlers/ajax/moreContent.php", {quotePlaylist: quotePlaylist}, function(data) {
                    if (data) {
                        data = JSON.parse(data);
                        for (let index = 0; index < data.length; index++) {
                            content = (data[index].content);
                            genre1 = (data[index].genre1);
                            genre2 = (data[index].genre2);
                            genre3 = (data[index].genre3);
                            author = (data[index].author);
                            id = (data[index].id);
                        
                        // console.log(data);
                        let item = `<div class="item">                
                                        <div class="card">
                                            <a href="quote.php?id="` + id + `">
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
                                                                    <p onclick="likeQuote(<?php echo $quoteId; ?>)" class="<?php echo $row['id']; ?>">
                                                                        <a type="button" data-toggle="modal" data-target="#unlikeQuote">
                                                                            <i class="<?php echo $row['id']; ?> fas fa-heart red"></i>
                                                                            <span class="<?php echo $row['id'] ?>quoteText"><?php echo $loveQuoteString; ?></span>
                                                                        </a>
                                                                    </p>

                                                                <!-- if user has not liked the quote before -->
                                                                    <?php 
                                                                } else { ?>
                                                                    <p onclick="likeQuote(<?php echo $quoteId; ?>)" class="<?php echo $row['id']; ?>">
                                                                        <i class="<?php echo $row['id']; ?> fas fa-heart black"></i>
                                                                        <span class="<?php echo $row['id'] ?>quoteText"><?php echo $loveQuoteString ?></span>
                                                                    </p>
                                                                    <?php 
                                                                }; 
                                                                                                
                                                                // if there is no logged in user
                                                            } else { ?>
                                                                <p onclick="likeQuote(<?php echo $quoteId; ?>)" class="<?php echo $row['id']; ?>">
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
                                    </div>`
                       
                            $(".masonry").append(item);
                            return; 
                        }
                    }
                    
                })
        }

        <?php 
    }; ?>

</script>
    
        





