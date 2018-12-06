<?php
$pageTitle = "Authors";
require_once 'includes/header.php';
 // save the data from fetch author to authors
$authorArray = $quote->fetchAuthor("5");
// save the data from fetch genre
$genreArray = $quote->fetchGenre("5");
// save all the quotes into an array
$quoteArray = $quote->fetchQuotes();
// the numbering of the author table
$num = 0;
?> 

<div class="fcontainer">
    <div class="frow">
        <?php require_once 'includes/indexLeftContainer.php'; ?>

        <div class="main-container">
            <div class="text-center table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-left">Author</th>
                            <th class="text-center"># Quotes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($validChar as $key) { ?>
                                <?php $authorDetails = $author->authorDetails($key);
                                foreach ($authorDetails as $row) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo ++$num; ?></td>
                                        <td>
                                            <div class="text-left author">
                                                <a href="author.php?nm=<?php echo $row['author'] ?>&author=<?php echo $quote->authorId($row['author']); ?>">
                                                    <img src="assets/images/author/<?php echo ($row['author']); ?>.jpg" alt="<?php echo imagify($row['author']); ?>" class="avatar img-raised">
                                                    <span><?php echo imagify($row['author']); ?></span>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text-center"><?php echo mysqli_num_rows($quote->fetchQuotesFromSameAuthor($row['id'])); ?></td>
                                    </tr>
                                    <?php 
                                }; ?>
                            <!-- </div> -->
                             <?php 
                        }; ?>
                    </tbody>
                </table>
            </div>
            
</div>

<!-- right section of the main container -->
<?php
require_once 'includes/indexRightContainer.php';
require_once 'includes/footer.php';
?>
