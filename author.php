<?php

if (isset($_GET['author'])) {
  $authorId = $_GET['author'];
  $authorId = strip_tags($authorId);
} else {
  header("Location: index.php");
}

   // import the header that houses the navbar and other dependencies
require_once 'includes/header.php';
require_once 'includes/error_modals.php';

   // query the all quotes of thesame author
$quotesFromSameAuthor = $quote->fetchQuotesFromSameAuthor($authorId);
   // query all the detaif the author from the database
$authorDetails = $quote->fetchAuthorDetails($authorId);
?>

 <div class="fcontainer">

    <div class="frow topMargin45">

       <!-- left section of the main container  -->
      <div class="left-container">
        <ul class="list-group">
            <li class="list-group-item active"> Similar Authors</li>
            <!-- loop through authors similar  -->
            <?php while ($row = mysqli_fetch_array($authors)) {
              if ($row['id'] !== $authorId) { ?>
                <li class="list-group-item">
                    <a href="author.php?author=<?php echo $row['id']; ?>"><?php echo imagify($row['author']); ?></a>
                </li>
                <?php 
              };
            }; ?>
        </ul>   
      </div> <!--left container-->

      <div class="main-container">

      <!-- a small card that holds the image of the author  -->
        <div class="col-sm-12">
         <div class="media-area">
            <div class="media">
              <a class="pull-left">
                <div class="avatar">               
                  <img class="media-object" src="assets/images/author/<?php echo $authorDetails['author'] ?>.jpg" alt="<?php echo imagify($authorDetails['author']) ?>" />
                </div>
              </a>
            <?php  ?>
             <!-- the other card to hold little decription or info about the author will be gotten from wikipedia -->
             <script type="text/javascript">
                 $(document).ready(function(){
                    $.ajax({
                        type: "GET",
                        url: "http://en.wikipedia.org/w/api.php?action=parse&format=json&prop=text&section=0&page=<?php echo $authorDetails['author']; ?>&callback=?",
                        contentType: "application/json; charset=utf-8",
                        async: false,
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
                        },
                        error: function (errorMessage) {
                        }
                    });
                });
             </script>

              <div class="media-body">
                <h4 class="media-heading"><?php echo imagify($authorDetails['author']); ?></h4>
                <h6 class="text-muted"></h6>
                <p class="authorBio">
                  <!-- the gif temporarily takes the page why the ajax call is made to wiki api is been made -->
                   <img class="wikiImg" src="assets/images/giphy.gif">
                </p>

                <div class="media-footer">
                  <a href="https://en.wikipedia.org/wiki/<?php echo $authorDetails['author']; ?>" 
                     class="text-lowercase btn btn-primary btn-simple pull-right"
                     target="_blank">
                    ...read more about <?php echo imagify($authorDetails['author']); ?>
                  </a>
                </div>
            </div>
          </div>
      </div>
    </div>

     <!-- the main container that houses the quotes by the author  -->
     <!-- loop through the quotes find all where author = author id -->
    <div class="title col-sm-12 text-center text-grey">
      <h3 class="title"> Quotes by <?php echo imagify($authorDetails['author']); ?></h3>
    </div>

    <div class="masonry">
    <?php
    while ($row = mysqli_fetch_array($quotesFromSameAuthor)) {
      $quoteId = $row['id']; ?>
    
       <div class="item">
        <div class="rotating-card-container manual-flip">
        <div class="card card-rotate">
          <div class="front">
          <div class="card-content">
          
          <!-- the quote  -->
            <p class="card-title">
              <?php echo $row['content']; ?>
            </p>
  
          <!-- the quote genre -->
            <p class="card-description">
            <div class="genreList">
              <span class="label label-primary">
              <a class="genre" href='genre.php?genre=<?php echo $row['genre1'] ?>'><?php echo $row['genre1']; ?></a>
              </span>
              <span class="label label-info">
              <a class="genre" href='genre.php?genre=<?php echo $row['genre2'] ?>'><?php echo $row['genre2']; ?></a>
              </span>
              <span class="label label-default">
              <a class="genre" href='genre.php?genre=<?php echo $row['genre3'] ?>'><?php echo $row['genre3']; ?></a>
              </span>
            </div>

          <footer class="quote-footer">
            <?php
            // variables
            $personString = function () {
              if ($numberOfQuoteLover == 0) {
              // return ;
              } elseif (numberOfQuoteLover == 1) {
                echo " person liked this quote";
              } else {
                echo " people liked this quote";
              }
            };

            $quoteLoveCheck = $quote->quoteLoveCheck($quoteId, $userId);
            $numberOfQuoteLover = $quote->numberOfQuoteLover($quoteId);
            $noUserString = ($numberOfQuoteLover == 0 ? "be the first to like this quote" : $numberOfQuoteLover);
            $loveQuoteString = ($numberOfQuoteLover == 1 ? "you liked this quote" : $numberOfQuoteLover . " people liked this quote");

            // check if a user is loggedin 
            if ($userId) {

              // if user has liked the quote before
              if ($quoteLoveCheck) { ?>
              <p>
               <img class="<?php echo $row['id']; ?> like-image" src="assets/images/loveRed.png" alt="love button">
               <span class="<?php echo $row['id'] ?>quoteText"><?php echo $loveQuoteString; ?></span>
              </p>
               
              <!--if user has not like quote before -->
              <?php 
            } else { ?>
               <p>
               <img class="<?php echo $row['id']; ?> like-image" src="assets/images/loveBlack.png" alt="like button">
               <span class="<?php echo $row['id'] ?>quoteText"><?php echo $noUserString ?></span>
              </p>
              <?php 
            }; 
             
             // if there is no logged in user
          } else { ?>
              <!-- Button trigger modal for liking quotes-->
               <p>
                <a type="button" data-toggle="modal" data-target="#myModal">
                  <img class="<?php echo $row['id']; ?> like-image" src="assets/images/loveBlack.png" alt="like button">
                  <span class="<?php echo $row['id'] ?>quoteText"> <?php echo $noUserString; ?>
                </a>
              </p>
               <?php 
            }; ?>
               
          </footer>
          <!-- quotes author and image -->
          <div class="footnote">
            <div class="author">
            <a href="author.php?author=<?php echo $quote->authorId($row['author']); ?>">
              <img src="assets/images/author/<?php echo $row['author']; ?>.jpg" alt="<?php echo imagify($row['author']); ?>)" class="avatar img-raised">
              <span><?php echo imagify($row['author']); ?></span>
            </a>
            </div>

          </div> <!-- end of footer -->
          </p>

          <!-- share and edit buttons -->
          <div class="pull-right col-xs-12 text-right">
         
          <?php if ($admin) { ?>
            <a data-toggle="tooltip" data-placement="top" title="Edit quote" data-container="body" class="label label-info" href="edit.php?id=<?php echo $quoteId ?>">Edit
            </a>
          <?php 
        } ?>

          <a class="twitter-share-button"
            href="https://twitter.com/share"
            data-text="<?php echo $row['content'] ?>"
            data-url="https://QuotesandNotes.com"
            data-hashtags="<?php echo $row['genre1'] . "," . $row['genre2'] . "," . $row['genre3'] ?>"
            data-via="freddgreat"
            data-show-count="true"
            data-related="twitterapi,twitter">
          </a>
          <!-- <a href="#pablo" class="btn btn-just-icon btn-round btn-facebook">
            <i class="fa fa-facebook"></i>
          </a> -->
          <a type="button" class="btn btn-just-icon btn-round btn-rotate" data-toggle="tooltip" data-placement="top" title="mail quote to a friend" data-container="body">
            <i class="fas fa-envelope"></i>
          </a>
          </div>

        </div>
        </div>

        <div class="back">
        <div class="card-content">
          <form action="index.php" method="POST">
          <input type="text" class="displayNone" value="<?php echo $row['content']; ?>" name="mailContent">
          <input type="text" class="displayNone" value="<?php echo $row['author']; ?>" name="mailAuthor">

          <p class="card-title paddingTop30"><?php echo $row['content']; ?></p>

          <div class="text-center">
            <div class="input-group">
            <span class="input-group-addon">
              <i class="material-icons"></i>
            </span>
            <input type="text" name="additionalMessage" class="form-control" placeholder="Enter additional message here">
            </div>

            <div class="input-group">
            <span class="input-group-addon">
              <i class="material-icons"></i>
            </span>
            <input type="text" name="receipientMail" class="form-control" placeholder="Enter receiver's Mail">
            </div>

          </div>

          <div class="text-center">
            <button type="submit" name="mailButton" class="btn btn-round btn-sm btn-primary text-lowercase">Mail quote
            </button>
            <button type="button" name="button" class="btn btn-white btn-round btn-rotate">
            <i class="material-icons">refresh</i> Back...
            </button>
          </div>

          </form>
        </div>
        </div>
      </div>
      </div>
    </div>

    <!-- the javascript the monitor the ajax call and take full charge of the page -->
    <script type="text/javascript">
      $(document).ready(function(){
      $(".<?php echo $row['id'] ?>").click(function(){
      // set the quote id, genres, author and user id into javascript
        quoteId = '<?php echo $row['id']; ?>';
        genre1 = '<?php echo $row['genre1']; ?>';
        genre2 = '<?php echo $row['genre2']; ?>';
        genre3 = '<?php echo $row['genre3']; ?>';
        author = '<?php echo $row['author']; ?>';
        // check if there is a logged in user
        if (userId) {
        // make ajax call to test if user has liked quote before
        $.post("includes/handlers/ajax/loveQuote.php", { quoteId:quoteId, userId:userId, genre1:genre1, genre2:genre2, genre3:genre3, author:author }, function(data){

          if (data === "success") {
          console.log(data);
          // change the image to red and increase the number of likes
          $(".<?php echo $row['id'] ?>").attr("src", "assets/images/loveRed.png");
          $(".span<?php echo $row['id']; ?>").text("<?php echo $numberOfQuoteLover + 1; ?>");
          $(".<?php echo $row['id'] ?>quoteText").text("you liked this quote ");

          }else if (data === "failure") {
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

  </div>
</div>
<!-- </div> -->


 <!-- the footer -->
<?php 
require_once 'includes/indexRightContainer.php';
require_once 'includes/footer.php' ?>
