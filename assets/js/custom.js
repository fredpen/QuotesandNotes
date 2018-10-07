var   quoteId,
      genreId,
      authorId,
      data,
      numOfChecked,
      userId;
      notLoggedIn = false;

// ---------------------upload quote------ js---------------

$(document).ready(function(){

   // call tool tip
   $("[data-toggle='tooltip']").tooltip();

   // diable the submit button to prevent unsuccesful uploads
   $("#submitQuote").attr("disabled", "true");

   // check the number of checkboxes clicked and disbled the rest at three
   $("input[type= checkbox]").on("click", function() {

      // number of checked boxes
      numOfChecked = $("input[type = checkbox]:checked").length;

      if (numOfChecked == 3) {
         $("#submitQuote").removeAttr("disabled");
         $("input[type = checkbox]:not(:checked)").attr("disabled", "true");
      } else if (numOfChecked >= 3) {
            $("#submitQuote").attr("disabled", "true");

      } else {
         $("input[type = checkbox]:not(:checked)").removeAttr("disabled");
         $("#submitQuote").attr("disabled", "true");
      }

   });
});
