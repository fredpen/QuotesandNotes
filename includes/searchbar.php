<?php 
// fetch a quote for the quote of the moment
$randQuote = $quote->fetchRandomQuote(); ?>

<div id="jumbotron" class="jumbotron">
    <div class="container">
        <h1 class="text-center">Quotes and Notes</h1>
        <p class="text-center">... illuminate, inspire, sustain</p>
        <div class="col-sm-12">
            <form method="get" action="index.php">
                <div class="form-group search">
                    <button type="submit" data-toggle="tooltip" title="search quotes"><i class="fas fa-search"></i></button>
                    <input onclick="searchQuotes()" oninput="searchQuotes()" id="seachQuotes" type="text" name="searchString" placeholder="Search quotes" class="form-control searchControl">
                </div>
            </form>
        </div>

        <div class="col-sm-12">
            <div  class="searchResult">
                <ul id="searchResult" class='list-group'></ul>
            </div>
        </div>

    </div>
</div>


