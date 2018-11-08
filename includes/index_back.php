
		  <div class="back">
				<div class="card-content">
				  <form action="index.php" method="POST">
					<input type="text" class="displayNone" value="<?php echo $row['content']; ?>" name="mailContent">
					<input type="text" class="displayNone" value="<?php echo $row['author']; ?>" name="mailAuthor">

					<p class="card-title paddingTop30"><?php echo $row['content']; ?></p>

					<div class="text-center">
					  <div class="input-group">
						<span class="input-group-addon">
						  <i class="material-icons"></i>
						</span>
						<input type="text" name="additionalMessage" class="form-control" placeholder="Enter additional message here">
					  </div>

					  <div class="input-group">
						<span class="input-group-addon">
						  <i class="material-icons"></i>
						</span>
						<input type="text" name="receipientMail" class="form-control" placeholder="Enter receiver's Mail">
					  </div>

					</div>

					<div class="text-center">
					  <button type="submit" name="mailButton" class="btn btn-round btn-sm btn-primary text-lowercase">Mail quote
					  </button>
					  <button type="button" name="button" class="btn btn-white btn-round btn-rotate">
						<i class="material-icons">refresh</i> Back...
					  </button>
					</div>

				  </form>


				</div>
			  </div>
		  <div class="back">
				<div class="card-content">
				  <form action="index.php" method="POST">
					<input type="text" class="displayNone" value="<?php echo $row['content']; ?>" name="mailContent">
					<input type="text" class="displayNone" value="<?php echo $row['author']; ?>" name="mailAuthor">

					<p class="card-title paddingTop30"><?php echo $row['content']; ?></p>

					<div class="text-center">
					  <div class="input-group">
						<span class="input-group-addon">
						  <i class="material-icons"></i>
						</span>
						<input type="text" name="additionalMessage" class="form-control" placeholder="Enter additional message here">
					  </div>

					  <div class="input-group">
						<span class="input-group-addon">
						  <i class="material-icons"></i>
						</span>
						<input type="text" name="receipientMail" class="form-control" placeholder="Enter receiver's Mail">
					  </div>

					</div>

					<div class="text-center">
					  <button type="submit" name="mailButton" class="btn btn-round btn-sm btn-primary text-lowercase">Mail quote
					  </button>
					  <button type="button" name="button" class="btn btn-white btn-round btn-rotate">
						<i class="material-icons">refresh</i> Back...
					  </button>
					</div>

				  </form>


				</div>
			  </div>
