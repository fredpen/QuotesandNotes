<?php
   // redirecting function
function redirect_to($url)
{
   ob_start();
   header('Location: ' . $url);
   ob_end_flush();
   die();
}

if (isset($_COOKIE['user'])) {
   echo $_COOKIE['user'];
   echo " cookie is here";
} else {
   echo "no cookie here";
}
   // keeping track of users in session
if (isset($_SESSION['email'])) {
   $email = $_SESSION['email'];

   $userDetails = $account->userDetails($email);
   $firstName = $userDetails['lastname'];
   $userId = $userDetails['id'];

   $jsonfirstName = json_encode($firstName);
} else {
   $firstName = '';
}

?>

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

   <title>Quotes&Notes - We got you</title>

   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
   <link href="https://fonts.googleapis.com/css?family=Inconsolata|PT+Mono" rel="stylesheet">

   <!-- CSS Files -->
   <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/>
   <link href="assets/css/custom.css" rel="stylesheet"/>
   <link href="assets/css/grid.css" rel="stylesheet"/>
    
    <!-- font awesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

   <!-- twitter script -->
   <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
   <!-- jquery script -->
   <script src="assets/js/jquery.min.js" type="text/javascript"></script>

</head>

 <!-- navbar-color-on-scroll" color-on-scroll=" " -->
<body id="home" class="index-page">
   <nav class="navbar navbar-default navbar-primary navbar-fixed-top" id="sectionsNav">
      <div class="container">     
      <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
               <i class="fas fa-home"></i> Quotes&Notes 
            </a>
         </div>
         <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
               <?php if ($firstName) { ?>
               <li>
                  <a href="profilePage.php?id=<?php echo $userDetails['id']; ?>"> <i class="fas fa-wrench"> </i><?php echo " " . $userDetails['lastname']; ?>
                     <!-- <i class="fas fa-user-edit"></i> -->
                  </a>
               </li>
               <?php 
            }; ?>
               <li>
                  <a href="blog/home.php">
                     <i class="fas fa-newspaper"></i>  blog 
                  </a>
               </li>
               <li>
                  <a href="authors.php">
                  <i class="fas fa-book-reader"></i> Authors</a>
               </li>
               <li>
                  <a href="genres.php">Genres</a>
               </li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <b class="caret"></b>
                  </a>
                  <?php if ($firstName) { ?>
                  <ul class="dropdown-menu">
                     <li>
                        <a href="uploadQuote.php">Contribute <i class="fab fa-joomla"></i></a>
                     </li>
                     <li class="divider"></li>
                     <li>
                        <a href="logOut.php">Sign out 
                           <i class="fas fa-sign-out-alt"></i>
                        </a>
                     </li>
                  </ul>
                  <?php 
               } else { ?>
                  <ul class="dropdown-menu dropdown-with-icons">
                     <li>
                        <a href="register.php?">Register <i class="fas fa-user-plus"></i></a>
                     </li>
                     <li>
                        <a href="signIn.php?">Log in <i class="fas fa-sign-in-alt"></i> </a>
                     </li>
                     <li>
                        <a href="uploadQuote.php">Contribute <i class="fab fa-joomla"></i></a>
                     </li>
                  </ul>
                  <?php 
               }; ?>
               </li>
            </ul>
         </div>
      </div>
   </nav>
