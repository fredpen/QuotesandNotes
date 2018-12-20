// variables
var userId,
    firstname,
    lastname,
    username;

$(document).ready(function () {

    // fadeout the search term and bar when it loses focus
    $(".searchResult").on("blur", function () {
        $(".searchResult").fadeOut("slow");
    })
});

// search for quotes from the database based on user search term
function searchQuotes() {
    // capture the value of the search string 
    let quote_string = $("#seachQuotes").val();
    // check if the search string is atleast 3 characters
    if (quote_string.length >= 2) {
        $(".notifs").fadeIn("fast");
        $(".notifs_message").html('<p>Searching<br><img src="assets/images/gipkhy.gif" alt=""></p>');
        // make an ajax call searching for the search string
        $.get("includes/handlers/ajax/searchQuote.php", { quote_string: quote_string }, function (data) {
            if (data) {
                // make the result container visible
                $(".searchResult").fadeIn("fast");
                // $("#searchResult").html(searchString);
                $("#searchResult").html(data);
                $(".notifs").fadeOut("fast");
            }
        })
    } else {
        $(".searchResult").fadeOut("slow");
    }
}

// comment on a post
function post_comment(quoteId) {
    if (userId) {
        // get the details of the comment from the textarea
        var comment = $("#comment").val();
        if (comment.length == 0) {
            $("#comment").css("border", "1px solid red");
            $("#alert_notifs").fadeIn("fast");
            $(".notifs_message").text("Comment field cannot be empty");
        } else {
            // make ajax call to test if user has liked quote before
            $.post("includes/handlers/ajax/postComment.php", { quoteId: quoteId, userId: userId, comment: comment }, function (data) {
                // console.log(data);
                if (data) {
                    $("#commentSection").append(data);
                    $("#success_notifs").fadeIn("fast");
                    $(".notifs_message").text("Your comment has been posted");
                    $("#comment").val("");
                }

            })
        }
    } else {
        $("#alert_notifs").fadeIn("fast");
        $(".notifs_message").html("You need to <a href='signIn.php'>log in</a> to dsdsddo that");
    }
}


// like quote
function likeQuote(quoteId, check, num) {

    if (userId) {

        if (check === true) {
            $("#success_notifs").fadeIn("fast");
            $(".notifs_message").html("You have liked this quote before");

        } else {

            // make ajax call to test if user has liked quote before
            $.post("includes/handlers/ajax/loveQuote.php", { quoteId: quoteId, userId: userId }, function (data) {
                if (data === "success") {
                    $("#success_notifs").fadeIn("fast");
                    $(".notifs_message").html("Thanks for the love");
                    $("." + quoteId + "quoteText").text((num + 1) + "you liked this quote");
                    $("." + quoteId + ".fas.fa-heart").removeClass("black").addClass("red");

                } else if (data === "failure") {
                    $("#success_notifs").fadeIn("fast");
                    $(".notifs_message").html("server error");
                }
            });
        }

    } else {
        $("#alert_notifs").fadeIn("fast");
        $(".notifs_message").html("You need to <a href='signIn.php'>log in</a> to do that");
    }
};





// ---------------------upload quote------ js---------------



//     //     // call tool tip
//     //     $("[data-toggle='tooltip']").tooltip();

//     //     // diable the submit button to prevent unsuccesful uploads
//     //     $("#submitQuote").attr("disabled", "true");

//     //     // check the number of checkboxes clicked and disbled the rest at three
//     //     $("input[type= checkbox]").on("click", function () {

//     //         // number of checked boxes
//     //         numOfChecked = $("input[type = checkbox]:checked").length;

//     //         if (numOfChecked == 3) {
//     //             $("#submitQuote").removeAttr("disabled");
//     //             $("input[type = checkbox]:not(:checked)").attr("disabled", "true");
//     //         } else if (numOfChecked >= 3) {
//     //             $("#submitQuote").attr("disabled", "true");

//     //         } else {
//     //             $("input[type = checkbox]:not(:checked)").removeAttr("disabled");
//     //             $("#submitQuote").attr("disabled", "true");
//     //         }

//     //     });
// });
