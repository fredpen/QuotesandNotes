<?php

 	// converting the wikiname of authors to img names
  function imagify($string){
     $string = str_replace("_", " ", $string);
     return $string;
  }

	require_once 'includes/databaseConfig.php';
	require_once 'includes/classes/Author.php';

		$author = new Author($con);

	require_once 'includes/navMenu.php';
	require_once 'includes/session.php';

 	$char = $author->validChar();

?>

	<nav class="author_nav text-center text-uppercase">
		<span class="title author_list label label-default">jump to:</span>

		<?php foreach ($char as $letter) { ?>
			<a class="author_list label label-default" href="#<?php echo $letter; ?>"><?php echo $letter; ?></a>
		<?php }; ?>

	</nav>

	<div id="tables" class="topMargin80">
		<div class="container">
		<div class="row">

			<!-- left container -->
	      <div class="col-sm-2"> 
	       </div>

				<div class="col-sm-8">
					<div class="table-responsive">
						<table class="table">
							
							<!-- <tbody> -->
								<?php foreach ($char as $key) { ?>
								<tbody>	
									<tr class="title title_border" id="<?php echo $key ?>">
										<td colspan="2">Authors starting with 
											<span class="athors_title text-uppercase"><?php echo $key; ?></span>
										</td>
									</tr>

									<?php foreach ($author->authorDetails($key) as $row) { ?>
									<tr>
										<td>
											<a href="author.php?author=<?php echo $row['id']?>"> <?php echo imagify($row['author'])?></a>
										</td>

										<td>
											<img src="assets/images/author/<?php echo $row['author'] ?>.jpg" alt="<?php echo imagify($row['author']) ?>" class=" img-circle maxwidth20">
										</td>

							 		</tr>
							 	</tbody>
								<?php }; }; ?>

							<!-- </tbody> -->
						</table>
					</div>
				</div>
				
				<!-- right container -->
				<div col-sm-2></div>

			</div>
		</div>
	</div>

<?php
  require_once 'includes/footer.php';
?>
