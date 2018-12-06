<div class="right-container">
    <ul class="list-group">
		<li class="list-group-item active"> Authors</li>
        <?php while ($row = mysqli_fetch_array($authorArray)) { ?>
            <li class="list-group-item text-capitalise">
                <a class="text-capitalise" href="author.php?author=<?php echo $quote->authorId($row['author']); ?>">
                <?php echo $row['author']; ?></a>
            </li>
        <?php 
    }; ?>
    </ul>
</div>
