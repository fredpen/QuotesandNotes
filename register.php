<?php require_once 'includes/header.php';  ?>

	<div class="container">
  	<div class="row">
  		<div class="col-md-10 col-md-offset-1">
        <div class=" card card-signup topMargin65">

          <!-- the register and sign in button container -->
          <div class="col-sm-12"> 
            <h2 class="card-title text-center pillButton">
              <ul class="registerNav nav nav-pills nav-pills-rose text-center">
                <li class="active"><a href="register.php">Register</a></li>
                <li><a href="signIn.php">Sign in</a></li>
               </ul>
            </h2>
          </div>
  
          <div class="row">

             <!-- the left container -->
              <div class="registerContainer right-column col-md-3 col-md-offset-1">

            		<div class="info info-horizontal">
                  <div class="description">
                    <h4 class="info-title">Exercpts to get you through difficult days</h4>
                  </div>
                </div>

                <div class="info info-horizontal">
          				<div class="description">
          					<h4 class="info-title">Exercpts to get you through difficult days</h4>
          				</div>
            		</div>

            		<div class="info info-horizontal">
            			<div class="description">
            				<h4 class="info-title">Words and sayings from books, quotes and poems readily available to you</h4>
        		  	  </div>
        		    </div>
  		        </div> <!-- end of left column -->

              <div class="col-md-6">

                <!-- signing in with social buttons -->
                <div class="social text-center">
                  <h4>Sign up with </h4>
                  <button class="btn btn-just-icon btn-round btn-twitter">
                    <i class="fa fa-twitter"></i>
                  </button>
                  <button class="btn btn-just-icon btn-round btn-dribbble">
                    <i class="fa fa-dribbble"></i>
                  </button>
                  <button class="btn btn-just-icon btn-round btn-facebook">
                    <i class="fa fa-facebook"> </i>
                  </button>
                  <h4> or be classical </h4>
                </div>
 
                <!-- the form container -->
                <form class="padding25 form" method="post" action="register.php">
            			<div class="form-group label-floating">
                    <?php echo $account->getError(Constants::$firstnameCharacter);?>
            				<label for="name" class="control-label">First Name</label>
            				<input type="text" class="form-control" name="firstName" aria-describedby="first name" required="required" value="<?php getInputValue('firstName'); ?>">
        			    </div>

            			<div class="form-group label-floating">
            			  <?php echo $account->getError(Constants::$lastnameCharacter);?>
            				<label for="name" class="control-label">Last Name</label>
            				<input type="text" class="form-control" name="lastName" aria-describedby="last name" required="required"  value="<?php getInputValue('lastName');?>">
            			</div>

            			<div class="form-group label-floating">
            			  <?php echo $account->getError(Constants::$usernameCharacter);
            			        echo $account->getError(Constants::$usernameAlreadyExists); ?>
               			<label for="Username" class="control-label">Username</label>
               			<input type="text" class="form-control" name="username" aria-describedby="username" required value="<?php getInputValue('username');?>">
            			</div>

            			<div class="form-group label-floating">
            			  <?php echo $account->getError(Constants::$emailInvalid);
                   				echo $account->getError(Constants::$emailDoNotMatch);
                   				echo $account->getError(Constants::$emailAlreadyExists); ?>
            				<label for="email" class="control-label">Email address</label>
            				<input type="email" class="form-control" name="email" aria-describedby="email" required value="<?php getInputValue('email');?>">
            				<small class="form-text text-muted">We'll never share your email with anyone else.</small>
            			</div>

            			<div class="form-group label-floating">
                    <?php echo $account->getError(Constants::$emailInvalid);
               				echo $account->getError(Constants::$emailDoNotMatch);
               				echo $account->getError(Constants::$emailAlreadyExists);
                      ?>
            				<label for="email" class="control-label">Confirm Email address</label>
            				<input type="email" class="form-control" name="confirmEmail" aria-describedby="email" required value="<?php getInputValue('confirmEmail');?>">
            			</div>

                  <div class="form-group">
                    <div class="title">
                      <h3>Gender</h3>
                    </div>

                    <div class="genderSelection">
                      <div class="radio">
                        <label>Female
                          <input type="radio" name="gender" value="female" checked="true">
                        </label>
                      </div>

                      <div class="radio">
                        <label>Male
                          <input type="radio" name="gender" value="male">
                        </label>
                      </div>

                      <div class="radio">
                        <label>Prefer not to say
                          <input type="radio" name="gender" value="male">
                        </label>
                      </div>
                    </div>               
                  </div>

               		<div class="form-group label-floating">
               			<?php echo $account->getError(Constants::$passwordDonNotMatch);
               					echo $account->getError(Constants::$passwordCharacter);
               					echo $account->getError(Constants::$passwordInvalid); ?>
               			 <label for="password" class="control-label">Password</label>
               			 <input type="password" name="password" class="form-control" required>
           		    </div>

               		<div class="form-group label-floating">
                  	<label for="password" class="control-label">Confirm password</label>
                  	<input type="password" name="confirmPassword" class="form-control" required=required>
               		</div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="mailingList" checked>
                       Subscribe to our premium weekly newsletter
                    </label>
                  </div>

               		<div class="footer text-center">
                   	<button type="submit" name="registerButton" class="btn btn-primary btn-round btn-lg">let's get you Started
                    </button>
                  </div>              
                </form>
              </div> <!-- end of left column -->
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php require_once 'includes/footer.php' ?>
