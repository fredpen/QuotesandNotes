<div class="left-container">
    <ul class="list-group">
        <li class="list-group-item active">Genre A - Z</li>
		<!-- get list of genre from the database -->
        <?php while ($row = mysqli_fetch_array($genreArray)) { ?>
            <a href="genre.php?genre=<?php echo $row['genre1']; ?>">
                <li class="list-group-item text-capitalize"><?php echo $row['genre1']; ?></li>
                <li class="list-group-item text-capitalize">Thanksgiving</li>
            </a>
            <?php 
        }; ?>

    </ul>
</div>
   
