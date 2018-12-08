<?php
$pageTitle = "Login";
require_once 'includes/header.php';

?>

<!-- sign in  -->
<div class="" style="background-image: url('assets/images/bg0.jpg'); background-size: cover; background-position: top center;">
	<div class="container">
		<div class="row">

			<div class="col-md-4 col-md-offset-4 col-sm-7 col-sm-offset-3 topMargin160">
				<div class="card card-signup">

					<div class="header header-primary text-center">
						<h4 class="card-title">Log in with</h4>
						<div class="social-line">
							<a href="#pablo" class="btn btn-just-icon btn-simple">
								<i class="fab fa-twitter"></i>
							</a>
						</div>
					</div>

					<p class="description text-center">Or Be Classical</p>

					<form class="form" method="post" action="signIn.php">
						<div class="card-content">
						<span class="text-center"><?php echo errorGetter(Constants::$loginFailed); ?></span>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="material-icons">face</i>
								</div>
								<input type="text" name="loginEmail" value="<?php getInputValue('loginEmail'); ?>" class="form-control" placeholder="Email or Username">
							</div>

							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">lock_outline</i>
								</span>
								<input type="password" name="loginPassword" placeholder="Password..." class="form-control"/>
							</div>

							<div class="footer text-center">
								<button type="submit" name="loginButton" class="btn btn-primary btn-simple btn-wd btn-lg">Get Started</button>
		              			<p>
		              				<a href="#">Forget password? Reset</a>
		              		</div>
		              	</div>						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once 'includes/footer.php'; ?>
