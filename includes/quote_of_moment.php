<?php 
$randQuote = $quote->fetchRandomQuote(); ?>

<div id="quote_moment" class="container-fluid">
    <div class="row">
        <div class="quote_moment_card">
             <div class="tim-typo">

                <blockquote>
                     <p class="quote-description"><?php echo $randQuote['content']; ?></p>
                  
                        <div class="author">
                            <span><small>
                                <a href="author.php?nm=<?php echo $randQuote['author'] ?>&author=<?php echo $quote->authorId($randQuote['author']); ?>">
                                    <img src="assets/images/author/<?php echo ($randQuote['author']) ?>.jpg" alt="<?php echo imagify($randQuote['author']) ?>" class="avatar img-raised">
                                    <span><?php echo imagify($randQuote['author']); ?></span>
                                </a></small>
                            </span>
                        </div>

                         <div class="footer">

                    <div class="col-xs-12 text-right">
                        <a class="twitter-share-button"
                            href="https://twitter.com/share"
                            data-text="<?php echo $randQuote['content'] ?>"
                            data-url="https://quotesandnote.com"
                            data-hashtags="<?php echo $randQuote['genre1'] . "," . $randQuote['genre2'] . "," . $randQuote['genre3'] ?>"
                            data-via="d_name_is_fred"
                            data-show-count="true"
                            dara-size="large"
                            data-related="twitterapi,twitter">
                        </a>

                        <a href="#pablo" class="btn btn-just-icon btn-round btn-facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </div>

                </div>

                </blockquote>
            </div>

            <!--  <h3 class="text-center title">Quote of the Moment</h3> -->
        </div>
    </div>
</div>
