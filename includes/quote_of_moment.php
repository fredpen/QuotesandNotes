<?php 
$randQuote = $quote->fetchRandomQuote();
$m_content = $randQuote['content'];
$m_genre1 = $randQuote['genre1'];

?>

<div id="quote_moment" class="container-fluid">
    <div class="row">
        <div class="quote_moment_card">

            <div class="tim-typo">
                <blockquote>
                    <p class="quote-description"><?php echo $randQuote['content']; ?></p>
                </blockquote>
            </div>             

        </div>

        <div class="quote_moment_footer">

            <div class="author">
                <small>
                    <span>Quote of the moment by 
                        <a class="underline" href="author.php?nm=<?php echo $randQuote['author'] ?>&author=<?php echo $quote->authorId($randQuote['author']); ?>"><?php echo imagify($randQuote['author']); ?> </a>
                    </span>
                </small>
            </div>

            <div id="quote_moment_socials" class="text-right">
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

                <?php if (detectMobile()) {
                    $urlencodedtext = urlencode($randQuote['content'] . " - " . imagify($randQuote['author'])); ?>
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

                <div id="shareBtn" onclick="fb_share('<?php echo $m_content; ?>', '<?php echo $m_genre1; ?>') " class="btn btn-just-icon btn-round btn-facebook">
                    <i class="fab fa-facebook-f"></i>
                </div>

                <a 
                    href="quote.php?q=<?php echo urlencode($row['content']); ?>&id=<?php echo $quoteId; ?>" class="btn btn-just-icon btn-round btn-github" data-toggle="tooltip" data-placement="top" title="mail quote to a friend" data-container="body">
                    <i class="fas fa-envelope"></i>
                </a>

                <a 
                    href="mailto:youremail?Subject=Illuminate,%20Inspire,%20Sustain&body=<?php echo urlencode($m_content) . 'find more quotes like this at http://quotesandnote.com' ?> " 
                    class="btn btn-just-icon btn-round btn-github" 
                    data-toggle="tooltip" 
                    data-placement="top" 
                    title="mail quote to a friend" 
                    data-container="body"
                    target="_top">
                    <i class="fas fa-envelope"></i>
                </a>

            </div>
        </div>
    </div>
</div>
