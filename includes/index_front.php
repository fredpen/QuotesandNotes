<?php
foreach ($quoteArray as $row) {
    $quoteId = $row['id']; ?>

        <div class="item">                
            <div class="rotating-card-container manual-flip">
                <div class="card card-rotate">
                    <?php include_once "includes/index_front.php"; ?>
                    <?php include_once "includes/index_back.php"; ?>
 
 
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
						  <img src="assets/images/author/<?php echo ($row['author']); ?>.jpg" alt="<?php echo imagify($row['author']); ?>" class="avatar img-raised">
						  <span><?php echo imagify($row['author']); ?></span>
						</a>
					  </div>

					</div> <!-- end of footer -->
				  </p>
					<hr class="hr">
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
