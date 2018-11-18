<?php

require_once 'includes/header.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
} else {
    header("Location: index.php");
}

//query all the user quotes interaction on the site
$quoteArray = $quote->fetchQuotesLovedByUser($userId);


$quoteDetails = $quote->fetchQuotesLovedByUser($userId);

//query the total number of quote that are loved by the user
$numOfQuoteLoveByUser = $quote->numberOfQuoteLoveByUser($userId);

// query the user biodata submitted during registration from the database
$userBiodata = $quote->fetchUserDetails($userId);

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

<div class="fcontainer">
  <div class="frow">
    <!-- left section of the main container -->
    <div class="left-container topMargin65">
      <!-- list of authors the user have interacted with  -->
      <ul class="list-group">
        <li class="list-group-item active">Authors you have shown interest in</li>
        <!-- loop through authors that the user has liked  -->
        <?php
        foreach ($authorArray as $key => $value) {; ?>
          <li class="list-group-item">
            <a href="author.php?author=<?php echo $quote->authorId($value); ?>"><?php echo imagify($value); ?>
         </a>
      </li> <?php 
        }; ?>
</ul>

<div class="topMargin65">
   <ul class="list-group">
     <li class="list-group-item active">Genres you have shown interest in</li>
     <!-- loop through authors that the user has liked  -->
    <?php
    foreach ($genreArray as $key => $value) {; ?>
       <li class="list-group-item">
         <a href="author.php?author=<?php echo $quote->genreId($value); ?>"><?php echo $value; ?>
          </a>
       </li>
    <?php 
} ?>
</ul>
</div>
</div> <!--left container-->


<div class="main-container topMargin65">
  <div class="frow">

    <!-- the user bio datas -->
    <div class="col-md-12">
      <ul class="nav nav-pills nav-pills-rose">
        <li class="active"><a href="#pill1" data-toggle="tab">Profile</a></li>
        <li><a href="#pill2" data-toggle="tab">Details</a></li>

        <li><a href="#pill3" data-toggle="tab">Social interactions</a></li>
     </ul>
     <div class="tab-content tab-space">
        <div class="tab-pane active" id="pill1">
          <?php
// string conjured from the user bio data
            $nameString = $userBiodata['lastname'] . " also known as " . $userBiodata['username'] . " joined us on the " . $userBiodata['dt'] .
                "<br> He has liked " . $numOfQuoteLoveByUser . " quotes
          <br> He has interacted with 3 authors and 7 genres of quotes";
            ?>
          <div class="card">
            <div class="card-content">
              <h4 class="text-cap card-title">
                <?php echo $nameString; ?>
             </h4>
          </div>
       </div>
    </div>
    <div class="tab-pane" id="pill2">
      <?php
// more details conjured from the user bio data
        $profileString = "Full Name: " . $userBiodata['firstName'] . " " . $userBiodata['lastname'] .
            "<br>    Email: " . $userBiodata['email'] . "<br>
      Username: " . $userBiodata['username'] . "<br>
      Gender: " . $userBiodata['gender'];

        ?>
      <div class="card">
       <div class="card-content">
         <h4 class="card-title">
           <?php echo $profileString; ?>
        </h4>
     </div>
  </div>
</div>
<div class="tab-pane" id="pill3">
  <?php
// more details conjured from the user bio data
    $socialString = $userBiodata['lastname'] . " has shared 20 quotes on facebook and 30 quotes on twitter";

    ?>
  <div class="card">
    <div class="card-content">
      <h4 class="card-title">
        <?php echo $socialString; ?>
     </h4>
  </div>
</div>
</div>
</div>
</div>
<!-- the main container that houses the quotes by the author  -->
<div class="title col-sm-12 text-center text-grey">
   <h3 class="title"> Quotes that you have liked </h3>
</div>


<div class="main-container">
	<div class="masonry">
        <?php require_once 'includes/indexMainContainer.php'; ?>
    </div>
</div>


</div>
</div>



<?php require_once "includes/indexRightContainer.php";
require_once 'includes/footer.php'; ?>
