<?php 
// fetch a quote for the quote of the moment
$randQuote = $quote->fetchRandomQuote(); ?>

<div class="searchContainer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form method="get" action="index.php" class="col-sm-12 searchForm">
                    <div class="form-group search">
                        <input type="text" name="searchString" placeholder="Search quotes" class="form-control searchControl">
                        <button type="submit" data-toggle="tooltip" title="search quotes"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>

            <div class="col-sm-12" id="searchResults"">
                <div class="searchResult">
                    <h1>what are u doing here</h1>   
                </div>
            </div>
        </div>
    </div>
</div>

