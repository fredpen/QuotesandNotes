<!-- <!-- 
<div id="page-header" class="page-header clear-filter" data-parallax="true" style="background-image: url('assets/images/bg8.jpg');">
   <!-- jumbotron -->
      <!-- <div class="container">
        <section class="row">
           <h1 class="display-4">Quotes&Notes</h1>
           <p class="lead">Bringing you the best instance of spoken words by the greatest of minds</p>
           <hr class="my-4">
           <p>You can help us by submitting your favourite quote or your own quotes
             <br>
             <span class=""> We do really appreciate your contribution</span>
           </p>
        </section>

        <a class="btn btn-primary btn-lg btn-round" href="uploadQuote.php" role="button">click here to begin
            <i class="material-icons"></i>
        </a>
      </div>
   </div> -->

  <!-- quote of the day -->
 <div class="subscribe-line subscribe-line-image" style="background-image: url('assets/images/bg7.jpg');">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-md-offset-3  topMargin65">
        <div class="text-center">
          <h3 class="title">Quote of the Moment</h3>
          <p class="description">
            <div id="card" class="card card-blog">
               <div id="card-content" class="card-content" style="height: unset;"> 
                <p class="text-lowercase quote-description"><?php echo $randQuote['content']; ?></p>

                 <div class="footer">
                   <div class="author">
                     <span>
                        <img src="assets/images/author/<?php echo $randQuote['img'] ?>" alt="<?php echo $randQuote['author'] ?>" class="avatar img-raised">
                        <span><?php echo $randQuote['author']; ?></span>
                     </span>
                   </div>
                   <div class="pull-right col-xs-12 text-right">
                      <a class="twitter-share-button btn btn-just-icon btn-round btn-twitter"
                        href="https://twitter.com/share"
                        data-text="<?php echo $randQuote['content'] ?>"
                        data-url="https://QuotesandNotes.com"
                        data-hashtags="<?php echo $randQuote['genre1']. "," . $randQuote['genre2']. "," . $randQuote['genre3'] ?>"
                        data-via="freddgreat"
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
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- the main container -->
<div class="fcontainer">
  <div class="frow">
    <!-- left section of the main container -->
    <div class="left-container">
       <ul class="list-group">
          <li class="list-group-item active"> Authors</li>

       <?php while ($row = mysqli_fetch_array($authorAll)) { ?>
          <li class="list-group-item text-capitalise">
             <a class="text-capitalise" href="author.php?author=<?php echo $quote->authorId($row['author']);?>">
              <?php echo $row['author']; ?></a>
          </li>
       <?php }; ?>
       </ul>
    </div> <!--left container-->
