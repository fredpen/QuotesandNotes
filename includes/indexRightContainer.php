<div class="right-container">
    <ul class="list-group">
		<li class="list-group-item active">Top Authors</li>
		<!-- get list of genre from the database -->
		<?php while ($row = mysqli_fetch_array($authorArray)) { ?>
            <li class="list-group-item text-capitalize">
                <a href="genre.php?genre=<?php echo $row['genre1']; ?>"><?php echo $row['genre1']; ?></a>
            </li>
            <?php 
        }; ?>
    </ul>
</div>
