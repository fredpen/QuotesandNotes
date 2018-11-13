

<!-- the main container -->
<div class="fcontainer">
   <div class="frow">
    <!-- left section of the main container -->
    <div class="left-container">
       <ul class="list-group">
          <li class="list-group-item active"> Authors</li>

       <?php while ($row = mysqli_fetch_array($authorAll)) { ?>
          <li class="list-group-item text-capitalise">
             <a class="text-capitalise" href="author.php?author=<?php echo $quote->authorId($row['author']); ?>">
              <?php echo imagify($row['author']); ?></a>
          </li>
       <?php 
    }; ?>

       </ul>
    </div> <!--left container-->
   
