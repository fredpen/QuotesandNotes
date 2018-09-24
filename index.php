<?php

  $receipientMail = "";
   require_once 'includes/header.php';
   require_once 'includes/indexLeftContainer.php';

   require_once 'includes/handlers/mailQuote-handler.php';

  

?>
   
<!-- main section of the main container -->
<div class="main-container">
  <div class="frow">

    <?php
      if ($receipientMail === 2) { ?>
        <div class='alert alert-warning alert-dismissible col-sm-12' role='alert'>
          <strong>Holy guacamole!</strong> The recepient mail can not be left blank
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
    <?php }; ?>

    <!-- <div class="fb-share-button" 
         data-href="localhost/Quotes&Notes/index.php" 
         data-layout="button_count" 
         data-size="small" 
         data-mobile-iframe="false">
         <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2FQuotes%26Notes%2Findex.php&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a>
    </div> -->
  
    <?php
      while ($row = mysqli_fetch_array($quoteArray)) {
        $quoteId = $row['id'];?>

        <div class="col-sm-6">
          <div class="rotating-card-container manual-flip">
            <div class="card card-rotate">
              <div id="width100" class="front">
                <div class="card-content">

                  <p class="card-title">
                    <?php echo $row['content']; ?>
                  </p>

                  <p class="card-description">
                    <div class="genreList">
                      <span class="label label-primary">
                        <a class="genre" href='genre.php?genre=<?php echo $row['genre1']?>'><?php echo $row['genre1']; ?></a>
                      </span>
                      <span class="label label-info">
                        <a class="genre" href='genre.php?genre=<?php echo $row['genre2']?>'><?php echo $row['genre2']; ?></a>
                      </span>
                      <span class="label label-default">
                        <a class="genre" href='genre.php?genre=<?php echo $row['genre3']?>'><?php echo $row['genre3']; ?></a>
                      </span>
                    </div>

                    <footer class="quote-footer">
                      <?php
                      // check if a user is loggedin and if the user has like the quote before
                        $numberOfQuoteLoveByUser = $quote->quoteLoveCheck($quoteId, $userId);
                        $numberOfQuoteLover =$quote->numberOfQuoteLover($quoteId);

                        if ($userId && $numberOfQuoteLoveByUser !== 0) {
                          $string = ($numberOfQuoteLover == 1 ? "you liked this quote" : "you and ". ($numberOfQuoteLover - 1) ."  people liked this quote"); ?>

                          <p>
                            <img class="<?php echo $row['id'];?> like-image" src="assets/images/loveRed.png" alt="like button">
                            <span class="<?php echo $row['id'] ?>quoteText"> <?php echo $string; ?>
                            </span>
                          </p>
                        <?php } else {
                          $string = ($numberOfQuoteLover == 1 ? "one person liked this quote" : $numberOfQuoteLover. "  people liked this quote")
                          ?>

                          <p>
                            <img class="<?php echo $row['id'];?> like-image" src="assets/images/loveBlack.png" alt="like button">
                            <span class="<?php echo $row['id'] ?>quoteText"><?php echo $string; ?>
                            </span>
                          </p>
                        <?php }; ?>
                    </footer>
                    <!-- quotes author and image -->
                    <div class="footnote">
                      <div class="author">
                        <a href="author.php?author=<?php echo $quote->authorId($row['author']);?>">
                          <img src="assets/images/author/<?php echo $row['img'] ?>" alt="<?php echo $row['author'] ?>" class="avatar img-raised">
                          <span><?php echo $row['author']; ?></span>
                        </a>
                      </div>

                    </div> <!-- end of footer -->
                  </p>

                    <!-- share and edit buttons -->
                  <div class="pull-right col-xs-12 text-right">

                    <?php if ($userId == 1 || $userId == 3) { ?>
                      <a class="label label-info" href="edit.php?id=<?php echo $quoteId ?>">Edit
                      </a>
                    <?php } ?>
                   
                    <a class="twitter-share-button"
                      href="https://twitter.com/share"
                      data-text="<?php echo $row['content'] ?>"
                      data-url="https://QuotesandNotes.com"
                      data-hashtags="<?php echo $row['genre1']. "," . $row['genre2']. "," . $row['genre3'] ?>"
                      data-via="freddgreat"
                      data-show-count="true"
                      dara-size="large"
                      data-related="twitterapi,twitter">
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-round btn-facebook">
                      <i class="fa fa-facebook"></i>
                    </a>
                    <button type="button" title="mail quote to a friend" class="btn btn-just-icon btn-round btn-rotate">
                      <i class="fas fa-envelope"></i>
                    </button>
                  </div>
                    
                </div>
              </div>

              <div class="back">
                <div class="card-content">

                 
                  <form action="index.php" method="POST">
                    <input type="text" class="displayNone" value="<?php echo $row['content'];?>" name="mailContent">
                    <input type="text" class="displayNone" value="<?php echo $row['author'];?>" name="mailAuthor">

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

                    <div class="footer text-center">
                      <button type="submit" name="mailButton" class="btn btn-round btn-sm btn-primary text-lowercase">Mail quote
                      </button>
                      <button type="button" class="btn btn-just-icon btn-sm btn-round btn-rotate">
                        Back
                      </button>
                    </div>

                  </form>
                 
                  
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- the javascript the monitor the ajax calll and take full charge of the page -->
        <script type="text/javascript">
          $(document).ready(function(){
            $(".<?php echo $row['id']?>").click(function(){
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
                    $(".<?php echo $row['id']?>").attr("src", "assets/images/loveRed.png");
                    $(".span<?php echo $row['id'];?>").text("<?php echo $numberOfQuoteLover + 1; ?>");
                    $(".<?php echo $row['id'] ?>quoteText").text("you and <?php echo $numberOfQuoteLover; ?>  people liked this quote ");

                  }else if (data === "failure") {
                   console.log("cant like the quote at the moment");
                  }else {
                  console.log(data);
                  }
                });
              } else {
               console.log("you've liked this quote before");
              }
            })
          })
        </script>
      <?php }; 
    ?>

  </div>
</div>

<!-- right section of the main container -->
<?php
  require_once 'includes/indexRightContainer.php';
  require_once 'includes/footer.php'; 
?>
