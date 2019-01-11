<?php
if (isset($_GET['author']) && isset($_GET['nm'])) {
    $authorId = (int)$_GET['author'];
    $authorId = strip_tags($authorId);
    $temp_page_title = $_GET['nm'];
    $temp_page_title = str_replace("_", " ", $temp_page_title);
    $pageTitle = "Top " . strip_tags($temp_page_title) . " Quotes";
    $page_description = "The best of spoken and written words from " . $temp_page_title . ". Read experience and opinions of people about " . $temp_page_title . "'s quotes";

} else {
    header("Location: index.php");
}

// import the header that houses the navbar and other dependencies
require_once 'includes/header.php';
include_once "includes/quote_of_moment.php";

// save the data from fetch genre
$genreArray = $quote->fetchGenre("20");

// query the all quotes of thesame author
$quoteArray = $quote->fetchQuotesFromSameAuthor($authorId);
// query all the detaif the author from the database
$authorDetails = $quote->fetchAuthorDetails($authorId);
?>

 <div class="fcontainer">
    <div class="frow">

        <!-- left section of the main container  -->
        <div class="topMargin80">
            <?php require_once 'includes/indexLeftContainer.php'; ?>
        </div>
        

        <div class="main-container">

            <!-- a small card that holds the image of the author  -->
            <div id="authorDetails" class="col-sm-12">
                <div class="media-area">
                    <div class="media">

                        <a class="pull-left">
                            <div class="avatar">               
                                <img class="media-object" src="assets/images/author/<?php echo $authorDetails['author'] ?>.jpg" alt="<?php echo imagify($authorDetails['author']) ?>" />
                            </div>
                        </a>

                        <!-- the other card to hold little decription or info about the author will be gotten from wikipedia -->
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $.ajax({
                                    type: "GET",
                                    url: "http://en.wikipedia.org/w/api.php?action=parse&format=json&prop=text&section=0&page=<?php echo $authorDetails['author']; ?>&callback=?",
                                    contentType: "application/json; charset=utf-8",
                                    async: true,
                                    dataType: "json",
                                    success: function (data, textStatus, jqXHR) {
                                        var markup = data.parse.text["*"];
                                        var blurb = $('<div></div>').html(markup);
                                        // remove links as they will not work
                                        blurb.find('a').each(function() { $(this).replaceWith($(this).html()); });
                                        // remove any references
                                        blurb.find('sup').remove();
                                        // remove cite error
                                        blurb.find('.mw-ext-cite-error').remove();
                                        $('.authorBio').html($(blurb).find('p'));
                                        $('#authorDetails').css("display", "block");
                                    },
                                    error: function (errorMessage) {
                                    }
                                });
                            });
                        </script>

                        <div class="media-body">
                            <h4 class="media-heading"><?php echo imagify($authorDetails['author']); ?></h4>
                            <p class="authorBio">
                                <!-- the gif temporarily takes the page why the ajax call is made to wiki api is been made -->
                                <!-- <img class="wikiImg" src="assets/images/giphy.gif"> -->
                            </p>

                            <div class="media-footer">
                                <a href="https://en.wikipedia.org/wiki/<?php echo $authorDetails['author']; ?>" 
                                    class="text-lowercase btn btn-primary btn-simple pull-right"
                                    target="_blank">...read more about <?php echo imagify($authorDetails['author']); ?>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!-- the main container that houses the quotes by the author  -->
            <h1 class="title text-center author_title"> <?php echo imagify($authorDetails['author']); ?>'s quotes</h1>

            <div class="masonry"><?php require_once 'includes/indexMainContainer.php'; ?>

    </div>
</div>
</div>


 <!-- the footer -->
<?php 
require_once 'includes/footer.php' ?>
