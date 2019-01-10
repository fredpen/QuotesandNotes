<?php
// converting the wikiname of authors to img names
function imagify($string)
{
    $string = str_replace("_", " ", $string);
    return $string;
}

function detectMobile()
{
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
        return true;
    } else {
        return false;
    }
}

require_once '../includes/databaseConfig.php';
require_once '../includes/classes/Constants.php';
require_once '../includes/classes/Account.php';
require_once '../includes/classes/Author.php';
require_once '../includes/session.php';
require_once '../includes/classes/Comment.php';
require_once '../includes/classes/Quote.php';


$account = new Account($con);
$author = new Author($con);
$quote = new Quote($con);
// character that has corresponding author in the database
$validChar = $author->validChar();

?>

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
        <title> QN - <?php echo $pageTitle; ?> | Search for any quotes from our robust collection</title>

        <?php 
        $temp_desc = "Bringing you the best of spoken and written words from the greatest of minds. QN is a community of word lovers; sharing thier experience and opinions about quotes and notes from great minds";

        if (empty($page_description)) {
            $page_description = $temp_desc;
        }

        ?>
        <meta name="description" content="<?php echo $page_description; ?>">
        

        <!-- favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="../assets/images/icon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../assets/images/icon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../assets/images/icon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/images/icon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../assets/images/icon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../assets/images/icon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../assets/images/icon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../assets/images/icon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/icon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="../assets/images/icon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../assets/images/icon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/icon/favicon-16x16.png">
        <link rel="manifest" href="assets/js/lib/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="../assets/images/icon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" type="image/ico" sizes="16x16" href="favicon.ico">

        <!-- You can use Open Graph tags to customize link previews. -->
        <meta property="og:url"           content="https://quotesandnote.com/" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"       content="QuotesandNote - <?php echo $pageTitle; ?> | Search for any quotes from our robust collection" />
        <meta property="og:description"   content="Bringing you the best of spoken and written words from the greatest of minds." />
        <meta property="og:image"         content="assets/images/icon/favicon-16x16.png" />

       

        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Open+Sans" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
        <!-- CSS Files -->
        <link href="../assets/css/lib/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/lib/material-kit.css?v=1.2.1" rel="stylesheet"/>
        <link href="../assets/css/custom.css" rel="stylesheet"/>
        <link href="../assets/css/grid.css" rel="stylesheet"/>
        
        <!-- twitter script -->
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <!-- jquery script -->
        <script src="../assets/js/lib/jquery.min.js" type="text/javascript"></script>

         <!-- custom js -->
        <script src="../assets/js/custom.js"></script>

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
                <a id="navBrand" class="navbar-brand" href="index.php">QN</a>

                <form method="get" action="index.php">
                    <div class="form-group nav_search">
                        <input id="search_quotes" type="text" name="searchString" placeholder="Search quotes" class="form-control searchControl" onclick="searchquotes()" oninput="searchquotes()" onkeydown="keyCode(event)">
                        <div id="nav_clear"> X </div>
                    </div>
                </form>

                <div class="col-sm-12">
                    <div class="nav_searchResult">
                        <ul id="nav_searchResult" class='list-group'></ul>
                    </div>
                </div>

            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">blog</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons"></i> Sections
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu dropdown-with-icons">
                           <li><a href="../uploadQuote.php">Contribute</a></li>
                            <li><a href="../authors.php">Authors</a></li>
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
                                    <a href="../profilePage.php?id=<?php echo $userDetails['id']; ?>">Profile <i class="fas fa-user"></i></i></a>
                                </li>
                                <li>
                                    <a href="../logOut.php">Sign out <i class="fas fa-sign-out-alt"></i></a>
                                </li>
                                <?php 
                            } else { ?>
                                <li>
                                    <a href="../signIn.php">Log in <i class="fas fa-sign-in-alt"></i> </a>
                                </li>
                                <li>
                                    <a href="../register.php">Register <i class="fas fa-user"></i></a>
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

    <?php if ($new_visitor) { ?>
        <div id="cookieConsent">
            <div id="closeCookieConsent">x</div>
            This website is using cookies. 
            <a href="../cookie_policy.php">More info</a>.
            <a onclick="cookie_consent()" class="cookieConsentOK">That's Fine</a>
        </div>

        <?php 
    }; ?>
    
    <div id="errorDiv" role='alert'>
        <span class="notifs_message"></span>
        <div class="button_container">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>X</span></button>
        </div>
    </div>

<?php require_once "../includes/quote_of_moment.php"; ?>
