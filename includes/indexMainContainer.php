 <?php 

$num = 1;
if ($quoteArray) {
    foreach ($quoteArray as $row) {
        $quoteId = $row['id']; ?>
        
        <div class="item">                
            <div class="card">
                <div class="card-content">
                    <a href="quote.php?id=<?php echo $quoteId; ?>"><p class="card-title"> <?php echo $row['content']; ?> </p></a>
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
                    <footer class="quote-footer quote_footer">
                        <div>
                            <?php 
                            $check = ($quote->quoteLoveCheck($quoteId, $userId) ? "true" : "false");
                            $numberOfQuoteLover = $quote->numberOfQuoteLover($quoteId);
                            $loveQuoteString = $quote->numberOfQuoteLoverString($quoteId, $userId);

                            // check if a user is loggedin 
                            if ($userId) {
                                // if user has liked the quote before
                                if ($check == "true") { ?>
                                    <p onclick="likeQuote(<?php echo $quoteId; ?>, <?php echo $check; ?>,  <?php echo $numberOfQuoteLover; ?>)" class="<?php echo $row['id']; ?>">
                                            <i class="<?php echo $row['id']; ?> fas fa-heart red"> </i>
                                            <span class="<?php echo $row['id'] ?>quoteText"><?php echo $loveQuoteString; ?></span>
                                    </p>

                                <!-- if user has not liked the quote before -->
                                    <?php 
                                } else { ?>
                                    <p onclick="likeQuote(<?php echo $quoteId; ?>, <?php echo $check; ?>,  <?php echo $numberOfQuoteLover; ?>)" class="<?php echo $row['id']; ?>">
                                        <i class="<?php echo $row['id']; ?> fas fa-heart black"></i>
                                        <span class="<?php echo $row['id'] ?>quoteText"><?php echo $loveQuoteString ?></span>
                                    </p>
                                    <?php 
                                }; 
                                                                
                                // if there is no logged in user
                            } else { ?>
                                <p onclick="likeQuote(<?php echo $quoteId; ?>, <?php echo $check; ?>,  <?php echo $numberOfQuoteLover; ?>)" class="<?php echo $row['id']; ?>">
                                    <!-- Button trigger modal for liking quotes-->
                                        <i class="<?php echo $row['id']; ?> fas fa-heart black"></i>
                                        <span class="<?php echo $row['id'] ?>quoteText"><?php echo $loveQuoteString ?>                       
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
                        <?php if (detectMobile()) {
                            $urlencodedtext = urlencode($row['content'] . " https://quotesandnote.com/") ?>
                            <a id="whatsapp" href="https://wa.me/?text=<?php echo $urlencodedtext; ?>" class="btn btn-just-icon btn-round btn-whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <?php 
                        } else { ?>
                            <a onclick="whats_app()" class="btn btn-just-icon btn-round btn-whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <?php 
                        } ?>
                       
                        
                        <!-- mail button -->
                        <a href="quote.php?id=<?php echo $quoteId; ?>" class="btn btn-just-icon btn-round btn-github" data-toggle="tooltip" data-placement="top" title="mail quote to a friend" data-container="body">
                            <i class="fas fa-envelope"></i>
                        </a>

                        <!-- twitter buttons -->
                        <a class="twitter-share-button"
                            href="https://twitter.com/share"
                            data-text="<?php echo $row['content'] ?>"
                            data-url="https://quotesandnote.com"
                            data-hashtags="<?php echo $row['genre1'] . "," . $row['genre2'] . "," . $row['genre3'] ?>"
                            data-via="d_name_is_fred"
                            data-show-count="true"
                            data-related="twitterapi,twitter">
                        </a>

                    </div>
                </div> <!-- end of card content -->
            </div>
        </div>
        <?php 
        // the ads logic: for every 5 quotes put an ad up
        if ($num % 5 == 0) { ?>
            <!-- <div class="item">                
                <div class="card">
                    <h1> ads</h1>
                </div>
            </div> -->
            <?php 
        }
        $num++;
        continue;
    };
      

// if its not quote array is not coming as an associative array
} elseif ($quoteDetails) {
    $row = $quoteDetails; ?>

    <div class="singleCard">
        <div id="singleCard" class="card">
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

                            <div class="single_card_icon">
                                <?php 
                                $check = ($quote->quoteLoveCheck($quoteId, $userId) ? "true" : "false");
                                $numberOfQuoteLover = $quote->numberOfQuoteLover($quoteId);
                                // $loveQuoteString = $quote->numberOfQuoteLoverString($quoteId, $userId);
                                // check if a user is loggedin 
                                if ($userId) {
                                    // if user has liked the quote before
                                    if ($check == "true") { ?>
                                          <p onclick="likeSingleQuote(<?php echo $quoteId; ?>, <?php echo $check; ?>,  <?php echo $numberOfQuoteLover; ?>)" class="<?php echo $row['id']; ?>">
                                                <span class="<?php echo $row['id'] ?>quoteText"><?php echo $numberOfQuoteLover ?></span>    
                                                  <i class="<?php echo $row['id']; ?> fas fa-heart red"></i> 
                                        </p>

                                    <!-- if user has not liked the quote before -->
                                        <?php 
                                    } else { ?>
                                          <p onclick="likeSingleQuote(<?php echo $quoteId; ?>, <?php echo $check; ?>,  <?php echo $numberOfQuoteLover; ?>)" class="<?php echo $row['id']; ?>">
                                            <span class="<?php echo $row['id'] ?>quoteText"><?php echo $numberOfQuoteLover ?> </span>  
                                            <i class="<?php echo $row['id']; ?> fas fa-heart black"></i>  
                                        </p>
                                        <?php 
                                    }; 
                                                                    
                                    // if there is no logged in user
                                } else { ?>
                                      <p onclick="likeSingleQuote(<?php echo $quoteId; ?>, <?php echo $check; ?>,  <?php echo $numberOfQuoteLover; ?>)" class="<?php echo $row['id']; ?>">
                                            <span class="<?php echo $row['id'] ?>quoteText"><?php echo $numberOfQuoteLover ?></span>         
                                            <i class="<?php echo $row['id']; ?> fas fa-heart black"></i>              
                                    </p>
                                    <?php 
                                }; ?>
                            </div>
                        </footer>
                    </div>

                    <div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">edit</i>
                            </span>
                            <input id="quote_text" type="text" name="additionalMessage" class="form-control" placeholder="text goes here">
                        </div>

                        <!-- enter receipientMail -->
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">mail</i>
                            </span>
                            <input id="quote_mail" autofocus type="email" name="receipientMail" class="mail_text form-control" placeholder="receipient's mail">
                        </div>

                        <!-- mail sent buttons -->
                        <div class="mailButton">
                            
                            <button onclick="mail_quote('<?php echo $row['author']; ?>', <?php echo $row['id']; ?>)" name="mailButton" class="btn btn-round btn-md btn-primary text-lowercase"> Mail quote </button>
                        </div>

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
                           <?php if (detectMobile()) {
                                $urlencodedtext = urlencode($row['content'] . " https://quotesandnote.com/") ?>
                            <a id="whatsapp" href="https://wa.me/?text=<?php echo $urlencodedtext; ?>" class="btn btn-just-icon btn-round btn-whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                                <?php 
                            } else { ?>
                            <a onclick="whats_app()" class="btn btn-just-icon btn-round btn-whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                                <?php 
                            } ?>
                            
                            <!-- twitter buttons -->
                            <a class="twitter-share-button"
                                href="https://twitter.com/share"
                                data-text="<?php echo $row['content'] ?>"
                                data-url="https://quotesandnote.com"
                                data-hashtags="<?php echo $row['genre1'] . "," . $row['genre2'] . "," . $row['genre3'] ?>"
                                data-via="d_name_is_fred"
                                data-show-count="true"
                                data-related="twitterapi,twitter">
                            </a>    
                        </div>
                    </div>

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
            <a class="genre" href='genre.php?genre=<?php echo $row['author'] ?>'><?php echo imagify($row['author']); ?> </a>
        </p>
    </div>
    <?php 
}; ?>


