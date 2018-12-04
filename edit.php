<?php
$pageTitle = "Edit Quote";
if (isset($_GET['id'])) {
  $quoteId = $_GET['id'];
  $quoteId = strip_tags($quoteId);
} else {
  header("Location: index.php");
}
  // import the header that houses the navbar and other dependencies
require_once 'includes/header.php';

 // save the data from fetch author to authors
$authorArray = $quote->fetchAuthor("all");
// save the data from fetch genre
$genreArray = $quote->fetchGenre("all");
  // query the quote with the particular id
$editQuote = $quote->editQuote($quoteId);
// var_dump($editQuote);
?>

 

<div class ="container">
    <div class ="row">
        <div class ="col-sm-12 topMargin mx-auto">
            <div class = "col-sm-6">
                <div class ="card card-blog">
                    <div id ="card-content" class="card-content">   
                        <p class="quote-description"> 
                            <?php echo $editQuote['content']; ?></p>

          <div class="genreList">
            <span class="label label-primary">
             <a class="genre" href='genre.php?genre=<?php echo $editQuote['genre1'] ?>'><?php echo $editQuote['genre1']; ?></a>
            </span>
             <span class="label label-info">
                <a class="genre" href='genre.php?genre=<?php echo $editQuote['genre2'] ?>'><?php echo $editQuote['genre2']; ?></a>
             </span>
            <span class="label label-default">
               <a class="genre" href='genre.php?genre=<?php echo $editQuote['genre3'] ?>'><?php echo $editQuote['genre3']; ?></a>
            </span>
          </div>

          <div class="footer">
             <div class="author">
               <a href="author.php?author=<?php echo $quote->authorId($editQuote['author']); ?>">
                  <img src="assets/images/author/<?php echo $editQuote['author'] ?>" alt="<?php echo $editQuote['author'] ?>" class="avatar img-raised">
                  <span><?php echo $editQuote['author']; ?></span>
               </a>
             </div>
          </div>
     </div>
     </div>
     <!-- </div> -->
    </div>
  </div>

 <!-- the ui interface for editing the quote -->
 <div class="row">
    <form action="uploadQuote.php" method="post">
      <div class="col-sm-12 mx-auto">
        <div class="form-group label-floating">
          <label class="control-label quote"></label>
          <textarea class="form-control" autofocus name="quote" rows="3"><?php echo $editQuote['content']; ?></textarea>
          <span class="material-input"></span>
        </div>
      </div>

       <div class="col-sm-12">
         <select name="author" class="grace" data-style="btn btn-primary btn-round" title="Choose Author" data-size="7">
            <option name="author" value="<?php echo $editQuote['author'] ?>">Choose Author
            </option>
            <!-- loop through all the author in the database -->
           <?php while ($row = mysqli_fetch_array($authorArray)) {
            if ($row['author'] != $editQuote['author']) { ?>
            <option 
              name="author" value="<?php echo $row['id']; ?>"><?php echo $row['author']; ?>
            </option>
            <!-- select author of the current quote -->
            <?php 
          } else { ?>
            <option 
              name="author" selected="selected" value="<?php echo $row['id']; ?>"><?php echo $row['author']; ?>
            </option>
            <?php 
          };
        }; ?>
         </select>
       </div>

       <div class="col-sm-12 genreSelection">
         <?php while ($row = mysqli_fetch_array($genreArray)) {
          if ($row['genre1'] == $editQuote['genre1'] || $row['genre1'] == $editQuote['genre2'] || $row['genre1'] == $editQuote['genre3']) { ?>
             <div class="checkbox genreSelect">
              <label>
                 <input type="checkbox" checked value="<?php echo $row['id']; ?>" name="genreList[]">
                 <?php echo $row['genre1']; ?>
              </label>
             </div>
          <?php 
        } else { ?>
              <div class="checkbox genreSelect">
              <label>
                 <input type="checkbox" value="<?php echo $row['id']; ?>" name="genreList[]">
                 <?php echo $row['genre1']; ?>
              </label>
             </div>
          <?php 
        };

      }; ?>
       </div>
      
      <div class="col-sm-12">
       <button id="submitQuote" type="submit" name="uploadQuoteButton" class="btn btn-primary btn-lg" data-toggle="tooltip" data-Button group placement="top" title="Select three genre category before submitting the quote">Submit
       </button>
      </div>

    </form>
  </div>
</div> <!-- container -->



 <!-- the footer -->
<?php 
// require_once 'includes/footer.php' 
?>
