<?php

if (isset($_GET['id'])) {
    $quoteId = $_GET['id'];

}


include_once "includes/header.php";
require_once 'includes/indexLeftContainer.php';
require_once 'includes/classes/Comment.php';

$quoteDetails = $quote->fetchQuoteDetails($quoteId);

?>
<div class="main-container">
 <div id="comments topMargin">
            <div class="title">
              <h3>Comments</h3>
            </div>
            <div class="row">


                  <div class="col-sm-4 rotating-card-container manual-flip">
                <div class="card card-rotate">

                    <a href="quote.php">

                        <div class="front">
                            <div class="card-content">

                                <!-- the quote  -->
                                <p class="card-title"> <?php echo $quoteDetails['content']; ?> </p>
                                <!-- the quote genre -->
                                <p class="card-description">
                                    <div class="genreList">
                                        <p class="label label-primary">
                                            <a class="genre" href='genre.php?genre=<?php echo $quoteDetails['genre1'] ?>'><?php echo $quoteDetails['genre1']; ?></a>
                                        </p>
                                        <p class="label label-info">
                                            <a class="genre" href='genre.php?genre=<?php echo $quoteDetails['genre2'] ?>'><?php echo $row['genre2']; ?></a>
                                        </p>
                                        <p class="label label-default">
                                            <a class="genre" href='genre.php?genre=<?php echo $quoteDetails['genre3'] ?>'><?php echo $row['genre3']; ?></a>
                                        </p>
                                    </div>

                                    <footer class="quote-footer">
                                        <?php 
                                        $quoteLoveCheck = $quote->quoteLoveCheck($quoteId, $userId);
                                        $numberOfQuoteLover = $quote->numberOfQuoteLover($quoteId);
                                        $noUserString = ($numberOfQuoteLover == 0 ? "be the first to like this quote" : $numberOfQuoteLover);
                                        $loveQuoteString = ($numberOfQuoteLover == 1 ? "you liked this quote" : $numberOfQuoteLover . " people liked this quote");

                                            // check if a user is loggedin 
                                        if ($userId) {

                                                // if user has liked the quote before
                                            if ($quoteLoveCheck) { ?>
                                                    <p class="<?php echo $row['id']; ?>">
                                                        <a type="button" data-toggle="modal" data-target="#unlikeQuote">
                                                        <img class="<?php echo $row['id']; ?> like-image" src="assets/images/loveRed.png" alt="love button">
                                                        <span class="<?php echo $row['id'] ?>quoteText"><?php echo $loveQuoteString; ?></span>
                                                    </p>
                                                <!--if user has not like quote before -->
                                                <?php 
                                            } else { ?>
                                                    <p class="<?php echo $row['id']; ?>">
                                                        <img class="<?php echo $row['id']; ?> like-image" src="assets/images/loveBlack.png" alt="like button">
                                                        <span class="<?php echo $row['id'] ?>quoteText"><?php echo $noUserString ?></span>
                                                        </p>
                                                <?php 
                                            }; 
                                                                        
                                            // if there is no logged in user
                                        } else { ?>
                                                <!-- Button trigger modal for liking quotes-->
                                                <p class="<?php echo $row['id']; ?>">
                                                    <a type="button" data-toggle="modal" data-target="#signUp">
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
                                    </a> <?php 
                                    } ?>
                                    
                                    <!-- twitter buttons -->
                                    <a class="twitter-share-button"
                                        href="https://twitter.com/share"
                                        data-text="<?php echo $row['content'] ?>"
                                        data-url="https://QuotesandNotes.com"
                                        data-hashtags="<?php echo $row['genre1'] . "," . $row['genre2'] . "," . $row['genre3'] ?>"
                                        data-via="freddgreat"
                                        data-show-count="true"
                                        data-related="twitterapi,twitter">
                                    </a>

                                    <!-- facebook buttons -->
                                    <a href="#pablo" class="btn btn-just-icon btn-round btn-facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>

                                    <!-- mail button -->
                                    <a type="button" class="btn btn-just-icon btn-round btn-rotate" data-toggle="tooltip" data-placement="top" title="mail quote to a friend" data-container="body">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                    
                                </div>
                            </div> <!-- end of card content -->
                        </div> <!-- end of front -->
                    </a>

                    <div class="back">
                        <div class="card-content">
                            <form action="index.php" method="POST">
                                <input type="text" class="displayNone" value="<?php echo $row['content']; ?>" name="mailContent">
                                <input type="text" class="displayNone" value="<?php echo $row['author']; ?>" name="mailAuthor">

                                <p class="card-title paddingTop30"><?php echo $row['content']; ?></p>

                                <div class="text-center">

                                    <!-- enter additional message -->
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons"></i>
                                        </span>
                                        <input type="text" name="additionalMessage" class="form-control" placeholder="Enter additional message here">
                                    </div>

                                    <!-- enter receipientMail -->
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons"></i>
                                        </span>
                                        <input type="text" name="receipientMail" class="form-control" placeholder="Enter receiver's Mail">
                                    </div>

                                </div>
                                
                                <!-- mail sent buttons -->
                                <div class="text-center">
                                    <button type="submit" name="mailButton" class="btn btn-round btn-sm btn-primary text-lowercase">Mail quote </button>
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

              <div class="col-md-8 col-md-offset-2">
                <div class="media-area">
                  <h3 class="title text-center">10 Comments</h3>
                  <div class="media">
                    <a class="pull-left" href="#pablo">
                      <div class="avatar">
                        <img class="media-object" src="assets/img/faces/avatar.jpg" alt="..." />
                      </div>
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading">Tina Andrew <small>&middot; 7 minutes ago</small></h4>
                      <h6 class="text-muted"></h6>

                      <p>Chance too good. God level bars. I'm so proud of @LifeOfDesiigner #1 song in the country. Panda! Don't be scared of the truth because we need to restart the human foundation in truth I stand with the most humility. We are so blessed!</p>
                      <p>All praises and blessings to the families of people who never gave up on dreams. Don't forget, You're Awesome!</p>

                      <div class="media-footer">
                        <a href="#pablo" class="btn btn-primary btn-simple pull-right" rel="tooltip" title="Reply to Comment">
		        									<i class="material-icons">reply</i> Reply
		        								</a>
                        <a href="#pablo" class="btn btn-danger btn-simple pull-right">
		        									<i class="material-icons">favorite</i> 243
		        								</a>
                      </div>

                      <div class="media media-post">
                        <a class="pull-left author" href="#pablo">
                          <div class="avatar">
                            <img class="media-object" alt="64x64" src="assets/img/faces/kendall.jpg">
                          </div>
                        </a>
                        <div class="media-body">
                          <textarea class="form-control" placeholder="Write a nice reply or go home..." rows="4"></textarea>
                          <div class="media-footer">
                            <a href="#pablo" class="btn btn-primary pull-right">
		        												<i class="material-icons">reply</i> Reply
		        											</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="media">
                    <a class="pull-left" href="#pablo">
                      <div class="avatar">
                        <img class="media-object" alt="Tim Picture" src="assets/img/faces/marc.jpg">
                      </div>
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading">John Camber <small>&middot; Yesterday</small></h4>

                      <p>Hello guys, nice to have you on the platform! There will be a lot of great stuff coming soon. We will keep you posted for the latest news.</p>
                      <p> Don't forget, You're Awesome!</p>

                      <div class="media-footer">
                        <a href="#pablo" class="btn btn-primary btn-simple pull-right" rel="tooltip" title="Reply to Comment">
		        								<i class="material-icons">reply</i> Reply
		        							</a>
                        <a href="#pablo" class="btn btn-default btn-simple pull-right">
		        								<i class="material-icons">favorite</i> 25
		        							</a>
                      </div>
                      <div class="media">
                        <a class="pull-left" href="#pablo">
                          <div class="avatar">
                            <img class="media-object" alt="64x64" src="assets/img/faces/avatar.jpg">
                          </div>
                        </a>
                        <div class="media-body">
                          <h4 class="media-heading">Tina Andrew <small>&middot; 2 Days Ago</small></h4>

                          <p>Hello guys, nice to have you on the platform! There will be a lot of great stuff coming soon. We will keep you posted for the latest news.</p>
                          <p> Don't forget, You're Awesome!</p>

                          <div class="media-footer">
                            <a href="#pablo" class="btn btn-primary btn-simple pull-right" rel="tooltip" title="Reply to Comment">
		        											<i class="material-icons">reply</i> Reply
		        										</a>
                            <a href="#pablo" class="btn btn-danger btn-simple pull-right">
		        											<i class="material-icons">favorite</i> 243
		        										</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="media">
                    <a class="pull-left" href="#pablo">
                      <div class="avatar">
                        <img class="media-object" alt="64x64" src="assets/img/faces/kendall.jpg">
                      </div>
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading">Rosa Thompson <small>&middot; 2 Days Ago</small></h4>

                      <p>Hello guys, nice to have you on the platform! There will be a lot of great stuff coming soon. We will keep you posted for the latest news.</p>
                      <p> Don't forget, You're Awesome!</p>

                      <div class="media-footer">
                        <a href="#pablo" class="btn btn-primary btn-simple pull-right" rel="tooltip" title="Reply to Comment">
		        										<i class="material-icons">reply</i> Reply
		        									</a>
                        <a href="#pablo" class="btn btn-danger btn-simple pull-right">
		        										<i class="material-icons">favorite</i> 243
		        									</a>
                      </div>
                    </div>
                  </div>

                  <div class="pagination-area text-center">
                    <ul class="pagination">
                      <li><a href="#pablo">&laquo;</a></li>
                      <li><a href="#pablo">1</a></li>
                      <li><a href="#pablo">2</a></li>
                      <li class="active"><a href="#pablo">3</a></li>
                      <li><a href="#pablo">4</a></li>
                      <li><a href="#pablo">5</a></li>
                      <li><a href="#pablo">&raquo;</a></li>
                    </ul>
                  </div>
                </div>


                <h3 class="text-center">Post your comment <br><small>- Logged In User -</small></h3>
                <div class="media media-post">
                  <a class="pull-left author" href="#pablo">
                    <div class="avatar">
                      <img class="media-object" alt="64x64" src="assets/img/faces/avatar.jpg">
                    </div>
                  </a>
                  <div class="media-body">
                    <textarea class="form-control" placeholder="Write some nice stuff or nothing..." rows="6"></textarea>
                    <div class="media-footer">
                      <a href="#pablo" class="btn btn-primary btn-wd pull-right">Post Comment</a>
                    </div>
                  </div>
                </div>
                <!-- end media-post -->

                <h3 class="text-center">Post your comment <br><small>- Not Logged In User -</small></h3>
                <div class="media media-post">
                  <a class="pull-left author" href="#pablo">
                    <div class="avatar">
                      <img class="media-object" alt="64x64" src="assets/img/placeholder.jpg" />
                    </div>
                  </a>
                  <div class="media-body">
                    <form class="form">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your email" />
                          </div>
                        </div>
                      </div>
                      <textarea class="form-control" placeholder="Write some nice stuff or nothing..." rows="6"></textarea>
                      <div class="media-footer">
                        <h6>Sign in with</h6>
                        <a href="" class="btn btn-just-icon btn-round btn-twitter">
		        		                                      <i class="fa fa-twitter"></i>
		        		                                </a>
                        <a href="" class="btn btn-just-icon btn-round btn-facebook">
		        		                                      <i class="fa fa-facebook-square"></i>
		        		                                </a>
                        <a href="" class="btn btn-just-icon btn-round btn-google">
		        		                                      <i class="fa fa-google-plus-square"></i>
		        		                                </a>
                        <a href="#pablo" class="btn btn-primary pull-right">Post Comment</a>
                      </div>
                    </form>

                  </div>
                  <!-- end media-body -->

                </div>
                <!-- end media-post -->


              </div>
            </div>
          </div>
          </div>


<?php
require_once 'includes/indexRightContainer.php';
include_once "includes/footer.php"


?>
