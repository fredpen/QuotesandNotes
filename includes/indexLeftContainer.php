<!-- quote of the moment -->
<div class="subscribe-line subscribe-line-image" style="background-image: url('assets/images/bg7.jpg'); margin-top: 0;">
   <div class="container">
      <div class="row">
         <div class="col-md-5 col-md-offset-3  topMargin65">

            <div class="text-center">
               <h3 class="title">Quote of the Moment</h3>

               <div id="card" class="card card-blog">
                  <div id="card-content" class="card-content" style="height: unset;"> 
                     <p class="text-lowercase quote-description"><?php echo $randQuote['content']; ?></p>
                     <div class="footer">

                        <div class="author">
                           <span>
                              <img src="assets/images/author/<?php echo ($randQuote['author']) ?>.jpg" alt="<?php echo imagify($randQuote['author']) ?>" class="avatar img-raised">
                              <span><?php echo imagify($randQuote['author']); ?></span>
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
              <?php echo imagify($row['author']); ?></a>
          </li>
       <?php }; ?>
       </ul>
    </div> <!--left container-->
   
