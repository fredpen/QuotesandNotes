<?php
include_once 'includes/header.php';
include_once 'includes/classes/Comment.php';

$comment = new Comment($con);

if (isset($_GET['id'])) {
	$userId = $_GET['id'];
} else {
	header("Location: index.php");
}

$quoteDetails = $quote->fetchQuotesLovedByUser($userId);
$userBiodata = $quote->fetchUserDetails($userId);
//query all the user quotes interaction on the site
$quoteArray = $quote->fetchQuotesLovedByUser($userId);
//query the total number of quote that are loved by the user
$numOfQuoteLoveByUser = $quote->numberOfQuoteLoveByUser($userId);

// create an empty array for both the author and genre to push the vakues too fron the db
$genreArray = array();
$authorArray = array();

// only push genre or authors that are not in the array, into the newly created array
while ($row = mysqli_fetch_array($quoteDetails)) {
	if (!in_array($row['genre1'], $genreArray)) {
		array_push($genreArray, $row['genre1']);
	}
	if (!in_array($row['genre2'], $genreArray)) {
		array_push($genreArray, $row['genre2']);
	}
	if (!in_array($row['genre3'], $genreArray)) {
		array_push($genreArray, $row['genre3']);

	}
	if (!in_array($row['author'], $authorArray)) {
		array_push($authorArray, $row['author']);
	}
}
?>
<div class="profile-page">
<div class="page-header" data-parallax="true" style="background-image: url('assets/images/bg13.jpg');   background-position: center center;"></div>

	<div class="main main-raised">
		<div class="profile-content">
            <div class="container">

                <div class="row">
	                <div class="col-xs-6 col-xs-offset-3">
        	           <div class="profile">
	                        <div class="avatar">
	                            <img src="assets/images/author/Barack_Obama.jpg" alt="Circle Image" class="img-circle img-responsive img-raised">
	                        </div>
	                        <div class="name">
                                <h3 class="title"><?php echo $userBiodata['firstName'] . " " . $userBiodata['lastname']; ?> </h3>
                                <span> - joined <?php echo $comment->dateInt($userBiodata['dt']); ?> ago </span>
								<a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble"><i class="fa fa-dribbble"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-simple btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-simple btn-pinterest"><i class="fa fa-pinterest"></i></a>
	                        </div>
	                    </div>
    	            </div>
                    <div class="col-xs-2 follow">
	                   <button class="btn btn-fab btn-primary" rel="tooltip" title="Follow this user">
                            <i class="material-icons">add</i>
                        </button>
	                </div>
                </div>


                <div class="description text-center">
                    <h6>Bio</h6>
                    <p>An artist of considerable range, Chet Faker — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p>
                </div>

				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="profile-tabs">
		                    <div class="nav-align-center">
								<ul class="nav nav-pills nav-pills-icons" role="tablist">
									<li class="active">
			                            <a href="#work" role="tab" data-toggle="tab">
											<i class="material-icons">palette</i>
											Work
			                            </a>
			                        </li>
                                    <li>
										<a href="#connections" role="tab" data-toggle="tab">
											<i class="material-icons">people</i>
											Connections
										</a>
									</li>
			                        <li>
			                            <a href="#media" role="tab" data-toggle="tab">
											<i class="material-icons">camera</i>
			                                Media
			                            </a>
			                        </li>
			                    </ul>


							</div>
						</div>
						<!-- End Profile Tabs -->
					</div>
                </div>

                <div class="tab-content">

                    <!-- the tab with the quotes collections -->
			        <div class="tab-pane active work" id="work">
				        <div class="row">
	                        <div class="col-md-10">
		                        <h4 class="title"><?php echo $userBiodata['lastname']; ?>'s Latest Collections</h4>
		                        <!-- <div class="row collections"> -->
                                    <div class="col-md-12">
                                        <div class="profilePagemasonry"><?php include 'includes/indexMainContainer.php'; ?></div>
			                        </div>
                                <!-- </div> -->
		                    </div>
		                    <div class="col-md-2 stats">
			                    <h4 class="title">Interactions Stats</h4>
			                    <ul class="list-unstyled">
				                    <li><b><?php echo count($genreArray) ?></b> Genres</li>
				                    <li><b><?php echo count($authorArray) ?></b> Authors</li>
				                    <li><b><?php echo $numOfQuoteLoveByUser; ?></b> Likes</li>
				                </ul>
				                <hr />
				                <h4 class="title">About his Work</h4>
				                <p class="description">French luxury footwear and fashion. The footwear has incorporated shiny, red-lacquered soles that have become his signature.</p>
				                <hr />
				                <h4 class="title">Focus</h4>
				                <span class="label label-primary">Footwear</span>
				                <span class="label label-rose">Luxury</span>
			                </div>
	                    </div>
                    </div>
                    

                    <div class="tab-pane connections" id="connections">
                        <div class="row">
            				<div class="col-md-5 col-md-offset-1">
            					<div class="card card-profile card-plain">
            						<div class="col-md-5">
            							<div class="card-image">
            								<a href="#pablo">
            									<img class="img" src="../assets/img/faces/avatar.jpg" />
            								</a>
            							</div>
            						</div>
            						<div class="col-md-7">
            							<div class="card-content">
            								<h4 class="card-title">Gigi Hadid</h4>
            								<h6 class="category text-muted">Model</h6>

            								<p class="card-description">
            									Don't be scared of the truth because we need to restart the human foundation in truth...
            								</p>
            							</div>
            						</div>
            					</div>
            				</div>

            				<div class="col-md-5">
            					<div class="card card-profile card-plain">
            						<div class="col-md-5">
            							<div class="card-image">
            								<a href="#pablo">
            									<img class="img" src="../assets/img/faces/marc.jpg" />
            								</a>
            							</div>
            						</div>
            						<div class="col-md-7">
            							<div class="card-content">
            								<h4 class="card-title">Marc Jacobs</h4>
            								<h6 class="category text-muted">Designer</h6>

            								<p class="card-description">
            									Don't be scared of the truth because we need to restart the human foundation in truth...
            								</p>
            							</div>
            						</div>
            					</div>
            				</div>
                        </div>
                        <div class="row">
            				<div class="col-md-5 col-md-offset-1">
            					<div class="card card-profile card-plain">
            						<div class="col-md-5">
            							<div class="card-image">
            								<a href="#pablo">
            									<img class="img" src="../assets/img/faces/kendall.jpg" />
            								</a>
            							</div>
            						</div>
            						<div class="col-md-7">
            							<div class="card-content">
            								<h4 class="card-title">Kendall Jenner</h4>
            								<h6 class="category text-muted">Model</h6>

            								<p class="card-description">
            									I love you like Kanye loves Kanye. Don't be scared of the truth.
            								</p>
            							</div>
            						</div>
            					</div>
            				</div>

            				<div class="col-md-5">
            					<div class="card card-profile card-plain">
            						<div class="col-md-5">
            							<div class="card-image">
            								<a href="#pablo">
            									<img class="img" src="../assets/img/faces/card-profile2-square.jpg" />
            								</a>
            							</div>
            						</div>
            						<div class="col-md-7">
            							<div class="card-content">
            								<h4 class="card-title">George West</h4>
            								<h6 class="category text-muted">Model/DJ</h6>

            								<p class="card-description">
            									I love you like Kanye loves Kanye.
            								</p>
            							</div>
            						</div>
            					</div>
            				</div>

            			</div>
                    </div>


                    <div class="tab-pane text-center gallery" id="media">
						<div class="row">
							<div class="col-md-3 col-md-offset-3">
								<img src="../assets/img/examples/chris4.jpg" class="img-rounded" />
								<img src="../assets/img/examples/chris6.jpg" class="img-rounded" />
							</div>
							<div class="col-md-3">
								<img src="../assets/img/examples/chris7.jpg" class="img-rounded" />
								<img src="../assets/img/examples/chris5.jpg" class="img-rounded" />
								<img src="../assets/img/examples/chris9.jpg" class="img-rounded" />
							</div>
						</div>
                    </div>


			    </div>
            </div>
        </div>
	</div>
	</div>














<?php 
require_once 'includes/footer.php';
?>
