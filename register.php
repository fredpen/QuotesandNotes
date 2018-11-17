<?php

require_once 'includes/databaseConfig.php';
require_once 'includes/classes/Constants.php';
require_once 'includes/classes/Account.php';

$account = new Account($con);

require_once 'includes/handlers/account_handler.php';
require_once 'includes/session.php';
require_once 'includes/navMenu.php';


?>

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

                <!-- the left container -->
                <div class="registerContainer right-column col-md-4 col-md-offset-1">

                    <div class="info info-horizontal">
                        <div class="description">
                            <h4 class="info-title purple">Words and sayings from books, quotes and poems readily available to you</h4>
                        </div>
                    </div>

                    <div class="info info-horizontal">
                        <div class="description">
                            <h4 class="info-title purple">Exercpts to get you through difficult days</h4>
                        </div>
                    </div>

                    <div class="info info-horizontal">
                        <div class="description">
                            <h4 class="info-title purple">Exercpts to get you through difficult days</h4>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                <!-- signing in with social buttons -->
                    <div class="social text-center">
                        <h4>Sign up with
                            <button class="btn btn-just-icon btn-round btn-twitter">
                                <i class="fab fa-twitter"></i>
                            </button>
                        </h4>
                        
                        <h4> or be classical </h4>
                        <p class="message text-uppercase text-muted"> all <i class="fas fa-star-of-life star"></i> fields must be filled</p>
                    </div>

            
                    <!-- the form container -->
                    <form class="padding25 form" method="post" action="register.php">

                        <div class="form-group label-floating">
                            <?php echo errorGetter(Constants::$firstnameCharacter); ?>
                            <label for="name" class="control-label"></i>First Name</label>
                            <input type="text" class="form-control" name="firstName" aria-describedby="first name" required="required" value="<?php getInputValue('firstName'); ?>">
                        </div>
                        

                        <div class="form-group label-floating">
                            <?php echo errorGetter(Constants::$lastnameCharacter); ?>
                            <label for="name" class="control-label">Last Name</label>
                            <input type="text" class="form-control" name="lastName" aria-describedby="last name" required="required"  value="<?php getInputValue('lastName'); ?>">
                        </div>

                        <div class="form-group label-floating">
                            <?php echo errorGetter(Constants::$usernameCharacter);
                            echo errorGetter(Constants::$usernameAlreadyExists); ?>
                            <label for="Username" class="control-label">Username</label>
                            <input type="text" class="form-control" name="username" aria-describedby="username" required value="<?php getInputValue('username'); ?>">
                        </div>

                        <div class="form-group label-floating">
                            <?php echo errorGetter(Constants::$emailDoNotMatch);
                            echo errorGetter(Constants::$emailInvalid);
                            echo errorGetter(Constants::$emailAlreadyExists); ?>
                            <label for="email" class="control-label"></i>Email address</label>
                            <input type="email" class="form-control" name="email" aria-describedby="email" required value="<?php getInputValue('email'); ?>">
                            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        
                        <div class="form-group label-floating">
                            <label for="email" class="control-label">Confirm Email address</label>
                            <input type="email" class="form-control" name="confirmEmail" aria-describedby="email" required value="<?php getInputValue('confirmEmail'); ?>">
                        </div>

                        <div class="form-group">
                            <div class="text-muted">
                                <span>Gender</span>
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
                            <?php echo errorGetter(Constants::$passwordDonNotMatch);
                            echo errorGetter(Constants::$passwordCharacter);
                            echo errorGetter(Constants::$passwordInvalid); ?>
                            <label for="password" class="control-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group label-floating">
                            <label for="password" class="control-label">Confirm password</label>
                            <input type="password" name="confirmPassword" class="form-control" required=required>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="mailingList" checked>Subscribe to our premium weekly newsletter
                            </label>
                        </div>

                        <div class="footer text-center">
                            <button type="submit" name="registerButton" class="btn btn-primary btn-round btn-lg">let's get you Started</button>
                        </div>              
                    </form>
                </div> <!-- end of left column -->
            </div>
        </div>
    </div>
</div>

  <?php require_once 'includes/footer.php' ?>
