 <?php 

if (isset($_GET['genre'])) {
    $genre = $_GET['genre'];
} else {
    header("Location: index.php");
}
      
// import the header that houses the navbar and other dependencies
require_once 'includes/header.php';
require_once 'includes/error_modals.php';

  // query the all quotes of thesame author
$quoteArray = $quote->fetchQuotesFromSameGenre($genre);

?>

 <!-- import the left side container ... this should shows author similar to the one we considering -->
<div class="fcontainer">
  <div class="frow topMargin45">

   <!-- left section of the main container -->
    <div class="left-container ">
      <ul class="list-group">
        <li class="list-group-item active"> Similar genres </li>

        <?php while ($row = mysqli_fetch_array($genreAll)) {
            if ($row["genre1"] !== $genre) { ?>
        <li class="list-group-item text-capitalize">
            <a href="genre.php?genre=<?php echo $row['genre1']; ?>"><?php echo $row['genre1']; ?></a>
        </li>    <?php 
            };
        }; ?>
      </ul>
    </div> <!--left container-->

  <div class="main-container">

       <!-- the main container that houses the quotes by the genre  -->
      <div class="title col-sm-12 text-center text-grey">
       <h1 class="text-capitalize"><?php echo $genre ?> Quotes</h1>
      </div>

      <div class="masonry">
        <?php
        // foreach ($quoteArray as $row) {
        require_once 'indexMainContainer.php'; ?>

    </div>
    </div>


      <!-- the right container -->
      <div class="right-container  topMargin">
        <ul class="list-group">
          <li class="list-group-item active"> Authors</li>
          <!-- loop through authors similar  -->
          <?php while ($row = mysqli_fetch_array($authorAll)) { ?>
            <li class="list-group-item">
              <a href="author.php?author=<?php echo $row['id']; ?>"><?php echo imagify($row['author']); ?></a>
            </li>
          <?php 
        }; ?>
        </ul>   
      </div> 


<?php require_once 'includes/footer.php' ?>
