<?php
   require_once 'includes/header.php';

   if (isset($_SESSION['upload'])) {
      echo "kindly loggged in first";
   }
 ?>

<!-- sign in  -->
<div style="background-image: url('assets/images/bg3.jpg'); background-size: cover; background-position: top center; background-color: purple;">

	

 <div class="container-fluid">

 	<?php if ($loginFailed) { ?>
                <div class="container-fluid topMargin3">
			        <div class="alert alert-info">
			          <div class="alert-icon">
			            <i class="material-icons">info_outline</i>
			          </div>
			          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			            <span aria-hidden="true"><i class="material-icons">clear</i></span>
			          </button>
			          <b>Info alert:</b> Receipient mail column can't be left empty
			        </div>
			      </div>
          <?php  }; ?>
	<div class="row">

		 <div class="col-md-12 topMargin3">
		 	<p>my name is fred ola</p>
           
          
         </div>
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

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
