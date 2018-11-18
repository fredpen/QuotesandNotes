<div class="left-container">
    <ul class="list-group">
        <li class="list-group-item active"> Authors</li>

        <?php foreach ($authorArray as $row) { ?>

            <li class="list-group-item text-capitalise">
                <a class="text-capitalise" href="author.php?author=<?php echo $quote->authorId($row['author']); ?>">
            <?php echo imagify($row['author']); ?></a>
            </li>
            <?php 
        }; ?>

    </ul>
</div>
   
