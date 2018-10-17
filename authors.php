 <?php

   require_once 'includes/databaseConfig.php';
   require_once 'includes/classes/Author.php';

   	$author = new Author($con);

   require_once 'includes/navMenu.php';
   require_once 'includes/session.php';

   
  ?>

	<nav class="author_nav text-center text-uppercase">

		<span class="title author_list label label-default">jump to:</span>
		<a class="author_list label label-default" href="#a">a</a>
		<a class="author_list label label-default" href="#b">b</a>
		<a class="author_list label label-default" href="#c">c</a>
		<a class="author_list label label-default" href="#d">d</a>
		<a class="author_list label label-default" href="#e">e</a>
		<a class="author_list label label-default" href="#f">f</a>
		<a class="author_list label label-default" href="#g">g</a>
		<a class="author_list label label-default" href="#h">h</a>
		<a class="author_list label label-default" href="#i">i</a>
		<a class="author_list label label-default" href="#j">j</a>
		<a class="author_list label label-default" href="#k">k</a>
		<a class="author_list label label-default" href="#l">l</a>
		<a class="author_list label label-default" href="#m">m</a>
		<a class="author_list label label-default" href="#n">n</a>
		<a class="author_list label label-default" href="#o">o</a>
		<a class="author_list label label-default" href="#o">o</a>
		<a class="author_list label label-default" href="#p">p</a>
		<a class="author_list label label-default" href="#q">q</a>
		<a class="author_list label label-default" href="#r">r</a>
		<a class="author_list label label-default" href="#s">s</a>
		<a class="author_list label label-default" href="#t">t</a>
		<a class="author_list label label-default" href="#u">u</a>
		<a class="author_list label label-default" href="#v">v</a>
		<a class="author_list label label-default" href="#w">w</a>
		<a class="author_list label label-default" href="#y">y</a>
		<a class="author_list label label-default" href="#z">z</a>
		
	</nav>

	<div id="tables" class="topMargin80">
		<div class="container">
		<div class="row">

			<!-- left container -->
	      <div class="col-sm-2"> 
	       </div>

			<div class="col-sm-6">
				<div class="table-responsive">
					<table class="table">

						<tbody>
							<?php $num = 1; $char = "a"; ?>
							<tr id="a">
								<td>Authors starting with <span class="athors_title"><?php echo $char; ?></span></td>
							</tr>

							<?php foreach (($author->authorDetails($char)) as $row) { ?>

							 <tr>

								<td><a href="author.php?author=<?php echo $row['id']?>"> <?php echo $row['author']?></a></td>

								<td>
									<img src="assets/images/author/<?php echo $row['img'] ?>" alt="<?php echo $row['author'] ?>" class=" img-circle maxwidth20">
								</td>

								<td><?php $row['wikiName'] ?></td>
							 </tr>
							<?php $num = $num + 1; }; ?>

						</tbody>

						<tbody>
							<?php $num = 1; $char = "b"; ?>
							<tr>
								<td>Authors starting with <span class="athors_title"><?php echo $char; ?></span></td>
							</tr>

							<?php foreach (($author->authorDetails($char)) as $row) { ?>

							 <tr>

								<td><a href="author.php?author=<?php echo $row['id']?>"> <?php echo $row['author']?></a></td>

								<td>
									<img src="assets/images/author/<?php echo $row['img'] ?>" alt="<?php echo $row['author'] ?>" class=" img-circle maxwidth20">
								</td>

								<td><?php $row['wikiName'] ?></td>
							 </tr>
							<?php $num = $num + 1; }; ?>
						</tbody>

						<tbody>
							<?php $num = 1; $char = "c"; ?>
							<tr>
								<td>Authors starting with <span class="athors_title"><?php echo $char; ?></span></td>
							</tr>

							<?php foreach (($author->authorDetails($char)) as $row) { ?>

							 <tr>

								<td><a href="author.php?author=<?php echo $row['id']?>"> <?php echo $row['author']?></a></td>

								<td>
									<img src="assets/images/author/<?php echo $row['img'] ?>" alt="<?php echo $row['author'] ?>" class=" img-circle maxwidth20">
								</td>

								<td><?php $row['wikiName'] ?></td>
							 </tr>
							<?php $num = $num + 1; }; ?>
						</tbody>

						<tbody>
							<?php $num = 1; $char = "d"; ?>
							<tr>
								<td>Authors starting with <span class="athors_title"><?php echo $char; ?></span></td>
							</tr>

							<?php foreach (($author->authorDetails($char)) as $row) { ?>

							 <tr>
								<td class="text-center"><?php echo $num; ?></td>

								<td><a href="author.php?author=<?php echo $row['id']?>"> <?php echo $row['author']?></a></td>

								<td>
									<img src="assets/images/author/<?php echo $row['img'] ?>" alt="<?php echo $row['author'] ?>" class=" img-circle maxwidth20">
								</td>

								<td><?php $row['wikiName'] ?></td>
							 </tr>
							<?php $num = $num + 1; }; ?>
						</tbody>

						<tbody>
							<?php $num = 1; $char = "e"; ?>
							<tr>
								<td>Authors starting with <span class="athors_title"><?php echo $char; ?></span></td>
							</tr>

							<?php foreach (($author->authorDetails($char)) as $row) { ?>

							 <tr>
								<td class="text-center"><?php echo $num; ?></td>

								<td><a href="author.php?author=<?php echo $row['id']?>"> <?php echo $row['author']?></a></td>

								<td>
									<img src="assets/images/author/<?php echo $row['img'] ?>" alt="<?php echo $row['author'] ?>" class=" img-circle maxwidth20">
								</td>

								<td><?php $row['wikiName'] ?></td>
							 </tr>
							<?php $num = $num + 1; }; ?>
						</tbody>

						<tbody>
							<?php $num = 1; $char = "j"; ?>
							<tr id="j">
								<td>Authors starting with <span class="athors_title"><?php echo $char; ?></span></td>
							</tr>

							<?php foreach (($author->authorDetails($char)) as $row) { ?>

							 <tr>
								<!-- <td class="text-center"><?php echo $num; ?></td> -->

								<td><a href="author.php?author=<?php echo $row['id']?>"> <?php echo $row['author']?></a></td>

								<td>
									<img src="assets/images/author/<?php echo $row['img'] ?>" alt="<?php echo $row['author'] ?>" class=" img-circle maxwidth20">
								</td>

								<td><?php $row['wikiName'] ?></td>
							 </tr>
							<?php $num = $num + 1; }; ?>
						</tbody>

						<tbody>
							<?php $num = 1; $char = "t"; ?>
							<tr>
								<td>Authors starting with <span class="athors_title"><?php echo $char; ?></span></td>
							</tr>

							<?php foreach (($author->authorDetails($char)) as $row) { ?>

							 <tr>
								<!-- <td class="text-center"><?php echo $num; ?></td> -->

								<td><a href="author.php?author=<?php echo $row['id']?>"> <?php echo $row['author']?></a></td>

								<td>
									<img src="assets/images/author/<?php echo $row['img'] ?>" alt="<?php echo $row['author'] ?>" class=" img-circle maxwidth20">
								</td>

								<td><?php $row['wikiName'] ?></td>
							 </tr>
							<?php $num = $num + 1; }; ?>
						</tbody>












					</table>
			</div>

		</div>
		
		<!-- right container -->
		<div col-sm-2></div>

	</div>
</div>

<?php
  require_once 'includes/footer.php';
?>
