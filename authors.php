 <?php

   require_once 'includes/databaseConfig.php';
   require_once 'includes/classes/Author.php';

   	$author = new Author($con);

   require_once 'includes/navMenu.php';
   require_once 'includes/session.php';


  ?>

<div id="tables">
	<div class="title topMargin90">	</div>
	<div class="container">
	<div class="row">

		 <nav class="navbar navbar-rose">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-icons">
		                                <span class="sr-only">Toggle navigation</span>
		                                <span class="icon-bar"></span>
		                                <span class="icon-bar"></span>
		                                <span class="icon-bar"></span>
	                            	</button>
                  <a class="navbar-brand" href="#pablo">Icons</a>
                </div>

                <div class="collapse navbar-collapse" id="example-navbar-icons">
                  <ul class="nav navbar-nav navbar-right">
                    <li>
                      <a href="#pablo"><i class="material-icons">email</i></a>
                    </li>
                    <li>
                      <a href="#pablo"><i class="material-icons">face</i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
												<i class="material-icons">settings</i>
												<b class="caret"></b>
											</a>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-header">Dropdown header</li>
                        <li><a href="#pablo">Action</a></li>
                        <li><a href="#pablo">Another action</a></li>
                        <li><a href="#pablo">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#pablo">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#pablo">One more separated link</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>

       

		<div class="col-sm-12 text-center text-uppercase">
			<a class="author_list label label-info" href="#a">a</a>
			<a class="author_list label label-info" href="#b">b</a>
			<a class="author_list label label-info" href="#c">c</a>
			<!-- <a class="author_list" href="#b">b</a>
			<a class="author_list" href="#c">c</a>
			<a class="author_list" href="#d">d</a>
			<a class="author_list" href="#e">e</a>
			<a class="author_list" href="#f">f</a>
			<a class="author_list" href="#g">g</a>
			<a class="author_list" href="#h">h</a>
			<a class="author_list" href="#i">i</a>
			<a class="author_list" href="#j">j</a>
			<a class="author_list" href="#k">k</a>
			<a class="author_list" href="#l">l</a>
			<a class="author_list" href="#m">m</a>
			<a class="author_list" href="#n">n</a>
			<a class="author_list" href="#o">o</a>
			<a class="author_list" href="#p">p</a>
			<a class="author_list" href="#q">q</a>
			<a class="author_list" href="#r">r</a>
			<a class="author_list" href="#s">s</a>
			<a class="author_list" href="#t">t</a>
			<a class="author_list" href="#u">u</a>
			<a class="author_list" href="#v">v</a>
			<a class="author_list" href="#w">w</a>
			<a class="author_list" href="#x">x</a>
			<a class="author_list" href="#y">y</a>
			<a class="author_list" href="#z">z</a>
			<a class="author_list" href="#t">t</a>
			<a class="author_list" href="#t">t</a>
			<a class="author_list" href="#t">t</a>
			<a class="author_list" href="#t">t</a>
			<a class="author_list" href="#t">t</a>
			<a class="author_list" href="#t">t</a> -->
		</div>
		
		
		<div class="col-md-8 col-md-offset-2">
			<div class="table-responsive">
				<table class="table">

					<tbody>
						<?php $num = 1; $char = "a"; ?>
						<div>
							Authors starting with <span class="text-uppercase"><?php echo $char; ?></span>
						</div>

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
						<?php $num = 1; $char = "b"; ?>
						<div>
							Authors starting with <span class="text-uppercase"><?php echo $char; ?></span>
						</div>

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
						<?php $num = 1; $char = "c"; ?>
						<div>
							Authors starting with <span class="text-uppercase"><?php echo $char; ?></span>
						</div>

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
						<?php $num = 1; $char = "d"; ?>
						<div>
							Authors starting with <span class="text-uppercase"><?php echo $char; ?></span>
						</div>

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
						<div>
							Authors starting with <span class="text-uppercase"><?php echo $char; ?></span>
						</div>

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
						<div>
							Authors starting with <span class="text-uppercase"><?php echo $char; ?></span>
						</div>

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
						<?php $num = 1; $char = "t"; ?>
						<div>
							Authors starting with <span class="text-uppercase"><?php echo $char; ?></span>
						</div>

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












				</table>
			</div>
		</div>
	</div>
</div>
<a href="#fred_sample">click here to see fred sample</a>
<?php
  require_once 'includes/footer.php';
?>
