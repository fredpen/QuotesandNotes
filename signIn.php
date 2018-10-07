<?php
   require_once 'includes/header.php';

   if (isset($_SESSION['upload'])) {
      // echo "kindly loggged in first";
   }
   $loginFailed = true;
 ?>
<!-- sign in  -->
<div class="" style="background-image: url('assets/images/bg0.jpg'); background-size: cover; background-position: top center;">
	<div class="container-full">
		<div class="row">
			<div class="topMargin70"></div>
			<?php if ($loginFailed) { ?>
				<div class="notification-bar">
	                <div class="col-sm-12">
				        <div class="alert alert-info">
							<div class="alert-icon">
								<i class="material-icons">info_outline</i>
							</div>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">
									<i class="material-icons">clear</i>
								</span>
							</button>
				          	<b>Info alert:</b> Receipient mail column can't be left empty
				        </div>
				    </div>
			    </div>
			<?php }; ?>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-7 col-sm-offset-3 paddingTop30">
				<div class="card card-signup">
					<form class="form" method="post" action="signIn.php">
						<div class="header header-primary text-center">
							<h4 class="card-title">Log in with</h4>
							<div class="social-line">
								<a href="#pablo" class="btn btn-just-icon btn-simple">f
									<i class="fa fa-facebook-square"></i>
								</a>
								<a href="#pablo" class="btn btn-just-icon btn-simple">t
									<i class="fa fa-twitter"></i>
								</a>
								<a href="#pablo" class="btn btn-just-icon btn-simple">G+
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
						<p class="description text-center">Or Be Classical</p>
						<div class="card-content">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">face</i>
								</span>
								<input type="text" name="loginEmail" class="form-control" placeholder="Email or Username">
							</div>

							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">lock_outline</i>
								</span>
								<input type="password" name="loginPassword" placeholder="Password..." class="form-control"/>
							</div>

							<!-- <div class="checkbox">
								<label>
									<input type="checkbox" name="optionsCheckboxes" checked>
									Subscribe to newsletter
								</label>
							</div> -->
							<div class="footer text-center">
								<button type="submit" name="loginButton" class="btn btn-primary btn-simple btn-wd btn-lg">Get Started</button>
		              			<p>
		              				<a href="#">Forget password? Reset</a>
		              			<p>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
require_once 'includes/footer.php';
 ?>
