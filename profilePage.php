<?php
$pageTitle = "Profile Page";
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

// create an empty array for both the author and genre to push the vakues too fron the db
$genreArray = array();
$authorArray = array();

// only push genre or authors that are not in the array, into the newly created array
foreach ($quoteDetails as $row) {
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
	<div id="profile_page_header" class="page-header" data-parallax="true"></div>

	<div class="main main-raised light">
		<div class="profile-content">
            <div class="container">

                <div class="row">
	                <div class="col-xs-6 col-xs-offset-3">
        	           <div class="profile">
	                        <div class="avatar">
								
	                            <img src="assets/images/female.jpeg" alt="Circle Image" class="img-circle img-responsive img-raised">
	                        </div>
	                        <div class="name">
                                <h3 class="title"><?php echo $userBiodata['firstName'] . " " . $userBiodata['lastname']; ?> </h3>
                                <h6 class="title"> joined <?php echo $comment->dateInt($userBiodata['dt']); ?> ago </h6>
	                        </div>
	                    </div>
    	            </div>
                </div>
              
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="profile-tabs">
		                    <div class="nav-align-center">
								<ul class="nav nav-pills nav-pills-icons" role="tablist">
									<li class="active">
			                            <a href="#work" role="tab" data-toggle="tab">
											<i class="material-icons">palette</i>
											Quotes Collection
			                            </a>
			                        </li>
                                    <li>
										<a href="#connections" role="tab" data-toggle="tab">
											<i class="material-icons">people</i>
											Interactions Stats
										</a>
									</li>
			                    </ul>
							</div>
						</div>
					</div>
                </div>

				<div class="frow">
					<div class="tab-content">

						<!-- the tab with the quotes collections -->
						<div class="tab-pane active work" id="work">
							<div class="row">
									<h4 class="title"><?php echo $userBiodata['lastname']; ?>'s Latest Collections</h4>
									
									<!-- include the quotes -->
									<div class="profilePagemasonry"><?php include 'includes/indexMainContainer.php'; ?></div>
								</div>
						</div>
						
						<!-- collection stats tab -->
						<div class="tab-pane connections" id="connections">
							<div class="row">
								<div class="col-md-12 col-md-offset-2">
									<h4 class="title">Interactions Stats</h4>
									<ul class="list-unstyled">
										<li>You have uploaded  
											<b><?php echo $quote->numOfQuoteUploaded($userId); ?></b> quote(s) so far. Thanks for contributing
										</li>
										<li>
											You have interacted with <b><?php echo count($genreArray) ?></b> different genres of quotes and
											<b><?php echo count($authorArray) ?></b> Authors
										</li>
										<li>You have liked <b><?php echo count($quoteArray); ?></b> quotes</li>
									</ul>
								</div>
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
