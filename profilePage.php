<?php

require_once 'includes/header.php';
$userId = "";
if (isset($_GET['id'])) {
	$userId = $_GET['id'];
} else {
	echo "user not recognised";
}

//query all the user quotes interaction on the site
$profileDetails = $quote->fetchProfileDetails($userId);
$profileInfo = $quote->fetchProfileDetails($userId);
//query the total number of quote that are loved by the user
$numOfQuoteLoveByUser = $quote->numberOfQuoteLoveByUser($userId);
// query the user biodata submitted during registration from the database
$userBiodata = $quote->fetchUserDetails($userId);
// create an empty array for both the author and genre to push the vakues too fron the db
$genreArray = array();
$authorArray = array();
// only push genre or authors that are not in the array, into the newwly created array
while ($row = mysqli_fetch_array($profileDetails)) {
	if (!in_array($row['genre1'], $genreArray)) {
		array_push($genreArray, $row['genre1']);
	}
	if (!in_array($row['genre2'], $genreArray)) {
		array_push($genreArray, $row['genre2']);
	}
	if (!in_array($row['genre3'], $genreArray)) {
		array_push($genreArray, $row['genre3']);

	}if (!in_array($row['author'], $authorArray)) {
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
foreach ($authorArray as $key => $value) {;?>
          <li class="list-group-item">
            <a href="author.php?author=<?php echo $quote->authorId($value); ?>"><?php echo $value; ?>
         </a>
      </li>
   <?php }
;?>
</ul>


<div class="topMargin65">
   <ul class="list-group">
     <li class="list-group-item active">Genres you have shown interest in</li>
     <!-- loop through authors that the user has liked  -->
     <?php
foreach ($genreArray as $key => $value) {;?>
       <li class="list-group-item">
         <a href="author.php?author=<?php echo $quote->genreId($value); ?>"><?php echo $value; ?>
      </a>
   </li>
<?php }?>
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
$profileString = "Full Name: " . $userBiodata['firstname'] . " " . $userBiodata['lastname'] .
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
<!-- loop through the quotes find all where author = author id -->
<?php
while ($row = mysqli_fetch_array($profileInfo)) {
	$quoteId = $row['id'];
	?>
   <div class="col-sm-6">
     <div class="card card-blog">
      <div id="card-content" class="card-content">

       <p class="quote-description"><?php echo $row['content']; ?></p>

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
// check if a user is loggedin and if the user has like the quote before
	$numberOfQuoteLoveByUser = $quote->quoteLoveCheck($quoteId, $userId);
	$numberOfQuoteLover = $quote->numberOfQuoteLover($quoteId);

	if ($userId && $numberOfQuoteLoveByUser !== 0) {
		$string = ($numberOfQuoteLover == 1 ? "you liked this quote" : "you and " . ($numberOfQuoteLover - 1) . "  people liked this quote");?>

     <p>
      <img class="<?php echo $row['id']; ?> like-image" src="assets/images/loveRed.png" alt="love button">
      <span class="<?php echo $row['id'] ?>quoteText"> <?php echo $string; ?></span>
   </p>

<?php } else {
		$string = ($numberOfQuoteLover == 1 ? "one person liked this quote" : $numberOfQuoteLover . "  people liked this quote")
		?>

   <p>
    <img class="<?php echo $row['id']; ?> like-image" src="assets/images/loveBlack.png" alt="love button">
    <span class="<?php echo $row['id'] ?>quoteText"><?php echo $string; ?></span>
 </p>

</footer>
<?php }
	;?>

<div class="footer">
   <div class="author">
     <a href="author.php?author=<?php echo $row['author']; ?>">
      <img src="assets/images/author/<?php echo $row['img'] ?>" alt="image of <?php echo $row['author'] ?>" class="avatar img-raised">
      <span><?php echo $row['author']; ?></span>
   </a>
</div>
<!-- twitter share button -->
<div class="pull-right col-xs-12 text-right">
 <a class="twitter-share-button"
 href="https://twitter.com/share"
 data-text="<?php echo $row['content'] ?>"
 data-url="https://QuotesandNotes.com"
 data-hashtags="<?php echo $row['genre1'] . "," . $row['genre2'] . "," . $row['genre3'] ?>"
 data-via="freddgreat"
 data-show-count="true"
 data-related="freddgreat,QuotesandNotes">
</a>

<a href="#pablo" class="btn btn-just-icon btn-round btn-instagram">
   <i class="fa fa-instagram"></i>
</a>
<a href="#pablo" class="btn btn-just-icon btn-round btn-facebook">
   <i class="fa fa-facebook"></i>
</a>
</div>
</div>

</div>
</div>
</div>

<!-- the javascript the monitor the ajax calll and take full charge of the page -->
<script type="text/javascript">

  $(document).ready(function(){

   $(".<?php echo $row['id'] ?>").click(function(){

        // set the quote id and user id into javascript
        quoteId = <?php echo $row['id']; ?>

        // check if there is a logged in user
        if (userId) {
           // make ajax call to test if user has liked quote before
           $.post("includes/handlers/ajax/loveQuote.php", { quoteId:quoteId, userId:userId }, function(data){
            if (data === "success") {
             console.log(data);
                 // change the image to red and increase the number of likes
                 $(".<?php echo $row['id'] ?>").attr("src", "assets/images/loveRed.png");
                 $(".span<?php echo $row['id']; ?>").text("<?php echo $numberOfQuoteLover + 1; ?>");
                 $(".<?php echo $row['id'] ?>quoteText").text("you and <?php echo $numberOfQuoteLover; ?>  people liked this quote ");

              }else if (data === "failure") {
                 console.log("cant like the quote at the moment");
              }
           });

        } else {
           console.log("you've liked this quote before");
        }
     })
})
</script>
<?php }
;?>

</div>
</div>


<!--
// number of quotes clicked
// display the quotes clicked
// year joined
// quotes uploaded -->

<?php require_once "includes/indexRightContainer.php";
require_once 'includes/footer.php';?>
