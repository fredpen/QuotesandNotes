<!doctype html>
<html lang="en">
    <head>
        
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130716173-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'UA-130716173-1');
        </script>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title> QuotesandNote - <?php echo $pageTitle; ?> || Search for any quotes from our robust collection</title>
        <meta name="description" content="<?php echo $page_description; ?>">
        

        <!-- favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="assets/images/icon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/images/icon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/images/icon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/images/icon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/images/icon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/images/icon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/images/icon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/images/icon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="assets/images/icon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/images/icon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icon/favicon-16x16.png">
        <link rel="manifest" href="assets/js/lib/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="assets/images/icon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" type="image/ico" sizes="16x16" href="favicon.ico">

        <!-- You can use Open Graph tags to customize link previews. -->
        <!-- <meta property="og:url"           content="http://localhost/Quotes&Notes/index.php" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="Quotes and Notes" />
        <meta property="og:description"   content="Bringing you the best of words from the greatest of minds" />
        <meta property="og:image"         content="" /> -->

       

        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Open+Sans" rel="stylesheet">
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

        <?php if ($pageTitle == "Contribute") { ?>
            <!-- contribute script -->
            <script src="assets/js/contribute.js"></script>
            <?php 
        } ?>
        
        
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

    <nav id="topNav">
        <ul class="navbar-nav nav">
            <li id="navrand"></i>Authors:</li>
            <?php foreach ($validChar as $key) { ?>
                <li><a href="authors.php#<?php echo $key; ?>"><?php echo $key; ?></a></li>
                <?php 
            }; ?> 
        </ul>
    </nav>

  
    <nav class="navbar navbar-default navbar-fixed-top">
    
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">QN</a>

                <form method="get" action="index.php">
                    <div class="form-group nav_search">
                        <input onclick="searchQuotes()" oninput="searchQuotes()" id="seachQuotes" type="text" name="searchString" placeholder="Search quotes" class="form-control searchControl">
                        <div id="clear"> X </div>
                    </div>
                </form>

            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="blog/home.php">blog</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons"></i> Sections
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu dropdown-with-icons">
                           <li><a href="uploadQuote.php">Contribute</a></li>
                            <li><a href="authors.php">Authors</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi 
                            <?php echo ($userDetails ? $userDetails['lastname'] : "Guest"); ?>
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu dropdown-with-icons">
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
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="testing">
        <p>This site is under development. suggestions are welcome and should be submitted to contactus@quotesandnote.com</p>
    </div>
    
    <div id="errorDiv" role='alert'>
        <span class="notifs_message"></span>
        <div class="button_container">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>X</span></button>
        </div>
    </div>
