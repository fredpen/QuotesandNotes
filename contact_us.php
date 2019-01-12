<?php
$nav_title = "Contact us";
$pageTitle = $nav_title;
$page_description = "You can easily reach us at QN through the following communication channels";

require_once 'includes/header.php';
require_once "includes/quote_of_moment.php";
?> 

<div class="fcontainer">
    <div class="frow">

        <div class="main main-raised topMargin0">
            <div class="contact-content">
                <div class="container">
                    <h2 class="title text-center">Send us a message</h2>
                    <div class="frow">
                        <div class="col-md-6">
                            <p class="description">You can contact us with anything related to our Products. We'll get in touch with you as soon as possible.<br><br>
                            </p>
                            <form role="form" id="contact-form" method="post">
                                <div class="form-group label-floating">
                                    <label class="control-label">Your name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Email address</label>
                                    <input type="email" name="email" class="form-control"/>
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Phone(optional)</label>
                                    <input type="text" name="phone" class="form-control"/>
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Your message</label>
                                    <textarea name="message" class="form-control" id="message" rows="6"></textarea>
                                </div>
                                <div class="submit text-center">
                                    <input type="submit" class="btn btn-primary btn-raised btn-round" value="Contact Us" />
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 col-md-offset-2">
                            <div class="info info-horizontal">
                                <div class="icon icon-primary">
                                    <i class="material-icons">pin_drop</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">You can also find us at</h4>
                                    <p> 
                                        <i class="far fa-envelope"></i> fred@quotesandnotes.com<br>
                                        <i class="fab fa-twitter"></i><a href="tweetlink"></a><br>
                                        <i class="fab fa-facebook"></i><a href="facebooklink"></a><br>
                                    </p>
                                </div>
                            </div>
                            <div class="info info-horizontal">
                                <div class="icon icon-primary">
                                    <i class="material-icons">phone</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Give us a ring</h4>
                                    <p> Oladipupo Fredrick<br>
                                        +234 8110546625<br>
                                        Mon - Fri, 8:00am-04:00pm
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

   

<?php
require_once 'includes/footer.php';
?>
