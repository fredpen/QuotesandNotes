<?php
   require_once 'includes/header.php';

  // if ($userId !== 1 || $userId !== 3) { 
  //    header("Location: index.php");
  //   };
   $newUser = false;
   $quoteSuccessful = false;
   $uploadFailure = false;

  if (isset($_POST['uploadQuoteButton'])) {
    if ($userDetails && isset($_POST['author'])) {
      $content = $quote->sanitiseQuote($_POST['quote']);
      echo strlen($content);
      $author = $_POST['author'];
      $genre = $_POST['genreList'];   
      $genre1 = $genre[0];
      $genre2 = $genre[1];
      $genre3 = $genre[2];

      $uploadQuote = $quote->uploadQuote($content, $genre1, $genre2, $genre3,  $author, $userDetails);
      if ($uploadQuote) {
        $quoteSuccessful = true;
      } else {
        $uploadFailure = true;
      }

    }else {
      $newUser = true;
    }
  }

 ?>

<div class="container topMargin65">
    <div class="row">

      <?php
         if ($newUser) { ?>
            <div class='alert alert-info alert-dismissible col-sm-12' role='alert'>
               <strong>Holy guacamole!</strong> You need to log in first. You can do that
               <a class='alert-link' href='signIn.php'>here</a>
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
               </button>
            </div>
        <?php };

         if ($uploadFailure) { ?>
            <div class='alert alert-info alert-dismissible col-sm-12' role='alert'>
               <strong>Holy guacamole!</strong> Sorry cant upload quote at the moment
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
               </button>
            </div>
          <?php };

         if ($quoteSuccessful) { ?>
         <div class='alert alert-success alert-dismissible col-sm-12' role='alert'>
            <strong>Your quote has successfully been uploaded!</strong> Thanks for contributing.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
               <span aria-hidden='true'>&times;</span>
            </button>
         </div>
      <?php }; ?>

   <div class="col-sm-12 mx-auto">
     <form action="uploadQuote.php" method="post">
      <div class="form-group label-floating">
      <label class="control-label quote"> Enter your quote here...</label>
      <textarea class="form-control" name="quote" rows="2"></textarea>
      <span class="material-input"></span>
     </div>
   </div>
 </div>

 <div class="row">
   <div class="col-sm-6">
     <!-- <select class="selectpicker" data-style="btn btn-primary btn-round" title="Choose Author" data-size="7"> -->
     <select name="author" class="grace" data-style="btn btn-primary btn-round" title="Choose Author" data-size="7">
          <option name="select Author" value="select Author">Choose Author</option>
       <?php while ($row = mysqli_fetch_array($authors)) { ?>
          <option name="author" value="<?php echo $row['id']; ?>"><?php echo $row['author']; ?></option>
        <?php  } ?>
     </select>
   </div>
 </div>

 <div class="genreSelection">
   <?php while ($row = mysqli_fetch_array($genreAll)) { ;?>
      <div class="checkbox genreSelect">
        <label>
         <input type="checkbox" value="<?php echo $row['id'];?>" name="genreList[]">
         <?php echo $row['genre1']; ?>
       </label>
       </div>
   <?php }; ?>
</div>

 <button id="submitQuote" type="submit" name="uploadQuoteButton" class="btn btn-primary btn-lg" data-toggle="tooltip" data-Button group placement="top" title="Select three genre category before submitting the quote">Submit
 </button>

         </form>

       </div>
   </div>

</div>

<?php require_once 'includes/footer.php';



?>
