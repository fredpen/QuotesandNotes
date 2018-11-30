<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="icon" type="image/png" href="assets/images/logo.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <!-- You can use Open Graph tags to customize link previews.
        Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
        <meta property="og:url"           content="http://localhost/Quotes&Notes/index.php" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="Quotes and Notes" />
        <meta property="og:description"   content="Bringing you the best of words from the greatest of minds" />
        <meta property="og:image"         content="" />

        <title>Quotes&Notes - <?php echo $pageTitle; ?></title>

        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
        <!-- CSS Files -->
        <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/lib/material-kit.css?v=1.2.1" rel="stylesheet"/>
        <link href="assets/css/custom.css" rel="stylesheet"/>
        <link href="assets/css/grid.css" rel="stylesheet"/>
        
        <!-- twitter script -->
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

        <!-- jquery script -->
        <script src="assets/js/lib/jquery.min.js" type="text/javascript"></script>
        <!-- custom js -->
        <script src="assets/js/custom.js"></script>

        <script>
            <?php if ($userDetails) { ?>
                userId = "<?php echo $userDetails['id']; ?>";
                firstname = "<?php echo $userDetails['firstName']; ?>";
                lastname = "<?php echo $userDetails['lastname']; ?>";
                username = "<?php echo $userDetails['username']; ?>";
                <?php 
            } else { ?>
                userId = "";
                <?php 
            }; ?>
        </script>
    </head>

    <body id="home" class="index-page">

        <!-- auth nav -->
        <nav  id="authNavContainer" class="navbar navbar-default navbar-default navbar-fixed-top">
            <div class="container-fluid"> 
                <div id="topNav">
                    <ul class="navbar-nav nav">
                        <li id="navBrand"></i><a href="authors.php">Authors: </a></li>
                    </ul>
                  
                    
                </div>
            </div>
        </nav>
        <!-- <div class="col-sm-12">
            Authors
        </div> -->
                    
        <!-- main nav -->
        <nav class="navbar navbar-default navbar-primary navbar-fixed-top auth">
            <div id="mainNavContainer" class="container-fluid">

                <ul id="mainNav" class="nav navbar-nav">
                    <li id="navBrand"></i>
                        <a href="index.php">Quotes&Notes</a></li>
                    <li>
                        <a href="uploadQuote.php">Contribute</a>
                    </li>
                    <li>
                        <a href="blog/home.php">blog</a>
                    </li>
                    <li>
                        <a href="authors.php">Authors</a>
                    </li>
                    <li>
                        <a href="genres.php">Genres</a>
                    </li>
                </ul>

                <!-- only show at smaller media screen -->
                <div id="mainNavContainerDropdown" class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fas fa-align-justify"></i> <i class="fas fa-angle-double-down"></i>
                    </button>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                    <?php if ($userDetails) { ?>
                        <li>
                            <a href="profilePage.php?id=<?php echo $userDetails['id']; ?>">Profile <i class="fas fa-user"></i></i></a>
                        </li>
                        <li>
                            <a href="logOut.php">Sign out <i class="fas fa-sign-out-alt"></i></a>
                        </li>
                        <?php 
                    } else { ?>
                        <li>
                                <a href="signIn.php">Log in <i class="fas fa-sign-in-alt"></i> </a>
                        </li>
                        <li>
                            <a href="register.php">Register <i class="fas fa-user"></i></a>
                        </li>
                        
                        <?php 
                    }; ?>
                </ul>
                
                <div id="mainNavContainerDropdown" class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Hi 
                        <?php if ($userDetails) {
                            echo $userDetails['lastname'];
                        } else {
                            echo "Guest";
                        } ?>
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                         <?php if ($userDetails) { ?>
                            <li>
                                <a href="profilePage.php?id=<?php echo $userDetails['id']; ?>">Profile <i class="fas fa-user"></i></i></a>
                            </li>
                            <li>
                                <a href="logOut.php">Sign out <i class="fas fa-sign-out-alt"></i></a>
                            </li>
                            <?php 
                        } else { ?>
                            <li>
                                <a href="signIn.php">Log in <i class="fas fa-sign-in-alt"></i> </a>
                            </li>
                            <li>
                                <a href="register.php">Register <i class="fas fa-user"></i></a>
                            </li>
                           
                            <?php 
                        }; ?>
                    </ul>
                </div>  

            </div>
        </nav>

