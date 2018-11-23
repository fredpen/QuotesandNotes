<?php 
// fetch a quote for the quote of the moment
$randQuote = $quote->fetchRandomQuote(); ?>

<!-- search bar -->
<div class="searchbarContainer">
    <div id="searchbar" class="subscribe-line subscribe-line-image" style="background-image: url('assets/images/searchbg.jpg'); margin-top: 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-3  topMargin65">
                    <form method="post">
                        <input type="text" class="textbox" placeholder="Search">
                        <input title="Search" value="" type="submit" class="button">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
