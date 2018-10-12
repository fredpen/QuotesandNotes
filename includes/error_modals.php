
<!-- Modal for liking quotes-->
<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="card-title modal-title" id="myModalLabel"></h4>
            </div>

            <div class="modal-body text-center">
            <div class="card-content">
                <h4 class="card-title">Only members can like a quote </h4>
              <p class="card-description">
                Sign up for free <a href="signIn.php"> here</a>
              </p>
              <p class="card-description">
                already have an account? <a href="signIn.php"> Login</a>
              </p>
            </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- main section of the main container -->
<div class="main-container">
  <div class="frow">
    <?php
      if (!$mail) {?>
        <div class="container">
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
      <?php };?> 
     <?php

    if ($mailSent) {?>
            <div class="container">
             <div class="alert alert-success">
              <div class="alert-icon">
                <i class="material-icons">check</i>
              </div>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
              </button>
              <b>Success:</b> quote has been sent to <?php echo $receipientMail; ?>
            </div>
          </div>
        <?php }; ?>
   </div>
 </div>
