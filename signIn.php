<?php
   require_once 'includes/header.php';

   if (isset($_SESSION['upload'])) {
      echo "kindly loggged in first";
   }
 ?>

<!-- sign in  -->
<div style="background-image: url('assets/images/bg3.jpg'); background-size: cover; background-position: top center; background-color: purple;">
 <div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

      <!-- bootstrap alert to document write unsuccessful log ins -->
      <div class="col-md-12">
         <?php
            if ($loginFailed) {
               echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <strong>" . $account->getError(Constants::$loginFailed) . "</strong>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                     <span aria-hidden='true'>&times;</span>
                  </button>
               </div>";
            }
          ?>
         </div>

			<div class="card card-signup topMargin3">

				<form class="form" method="post" action="signIn.php">
					<div class="header header-primary text-center">

               <h4 class="card-title">Log in with</h4>

						<div class="social-line">
							<a href="#pablo" class="btn btn-just-icon btn-simple">
								<i class="fa fa-facebook-square"></i>
							</a>
							<a href="#pablo" class="btn btn-just-icon btn-simple">
								<i class="fa fa-twitter"></i>
							</a>
							<!-- <a href="#pablo" class="btn btn-just-icon btn-simple">G+
								<i class="fa fa-google-plus"></i>
							</a> -->
						</div>
					</div>
					<p class="description text-center">Or Be Classical</p>
					<div class="card-content">

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fas fa-user-tie"></i>
							</span>
							<input type="text" name="loginEmail" autofocus class="form-control" placeholder="Email or Username">
						</div>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fas fa-lock"></i>
							</span>
							<input type="password" name="loginPassword" placeholder="Password..." class="form-control"/>
						</div>

					</div>
					<div class="footer text-center">
						<button type="submit" name="loginButton" class="btn btn-primary signInButton">Submit</button>
               <p><a href="#">Forget password? Reset</a>
					</div>
				</form>
 					</div>
 				</div>
 			</div>
 		</div>
 		</div>


   </form>
</div>

<?php require_once 'includes/footer.php'; ?>
