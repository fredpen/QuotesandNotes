<?php 
// fetch a quote for the quote of the moment
$randQuote = $quote->fetchRandomQuote(); ?>

<!-- quote of the moment -->
<div class="subscribe-line subscribe-line-image" style="background-image: url('assets/images/bg7.jpg'); margin-top: 0;">
    <div class="container">
        <div class="row">
                <div class="col-md-5 col-md-offset-3  topMargin50">


                        <h3 class="text-center title">Quote of the Moment</h3>

                        <div id="card" class="text-center card card-blog">
                            <div id="card-content" class="card-content" style="height: unset;"> 
                                <p class="quote-description"><?php echo $randQuote['content']; ?></p>

                                <div class="footer">

                                    <div class="author">
                                        <span>
                                            <img src="assets/images/author/<?php echo ($randQuote['author']) ?>.jpg" alt="<?php echo imagify($randQuote['author']) ?>" class="avatar img-raised">
                                            <span><?php echo imagify($randQuote['author']); ?></span>
                                        </span>
                                    </div>

                                    <div class="pull-right col-xs-12 text-right">
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
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
