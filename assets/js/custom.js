// variables
var userId,
    firstname,
    lastname,
    username;

$(document).ready(function () {

    // fadeout the search term and bar when it loses focus
    $(".frow").on("click", function () {
        $(".searchResult").fadeOut("fast");
    })

    $(".close").on("click", function () {
        $("#errorDiv").fadeOut("fast");
    })
});

// search for quotes from the database based on user search term
function searchQuotes() {

    let quote_string = $("#seachQuotes").val();

    if (quote_string.length >= 2) {
        $("#errorDiv").css("display", "flex");
        $(".notifs_message").text('Searching . . .');

        $.get("includes/handlers/ajax/searchQuote.php", { quote_string: quote_string }, function (data) {
            if (data) {
                // make the result container visible
                $(".searchResult").fadeIn("fast");
                $("#searchResult").html(data);
                $(".notifs_message").html('Search done, thanks for the patience');
            }
        })
    } else {
        $(".searchResult").fadeOut("slow");
        $("#errorDiv").fadeOut("fast");
    }
}

// comment on a post
function post_comment(quoteId) {
    if (userId) {
        // get the details of the comment from the textarea
        var comment = $("#comment").val();
        if (comment.length == 0) {
            $("#comment").css("border", "1px solid red");
            $("#errorDiv").css("display", "flex");
            $(".notifs_message").text("Comment field cannot be empty");
        } else {
            // make ajax call to test if user has liked quote before
            $.post("includes/handlers/ajax/postComment.php", { quoteId: quoteId, userId: userId, comment: comment }, function (data) {
                // console.log(data);
                if (data) {
                    $("#commentSection").append(data);
                    $("#errorDiv").css("display", "flex");
                    $(".notifs_message").text("Your comment has been posted");
                    $("#comment").val("");
                }

            })
        }
    } else {
        $("#errorDiv").css("display", "flex");
        $(".notifs_message").html("You need to <a class='blue' href='signIn.php'> log in </a> to do that");
    }
}


// like quote
function likeQuote(quoteId, check, num) {

    if (userId) {

        if (check === true) {
            $("#errorDiv").css("display", "flex");
            $(".notifs_message").html("You have liked this quote before");

        } else {

            // make ajax call to test if user has liked quote before
            $.post("includes/handlers/ajax/loveQuote.php", { quoteId: quoteId, userId: userId }, function (data) {
                if (data === "success") {
                    $("#errorDiv").css("display", "flex");
                    $(".notifs_message").html("Thanks for the love");
                    $("." + quoteId + "quoteText").text((num + 1) + "you liked this quote");
                    $("." + quoteId + ".fas.fa-heart").removeClass("black").addClass("red");

                } else if (data === "failure") {
                    $("#errorDiv").css("display", "flex");
                    $(".notifs_message").html("server error");
                }
            });
        }

    } else {
        $("#errorDiv").css("display", "flex");
        $(".notifs_message").html("You need to <a class='blue' href='signIn.php'> log in </a> to do that");
    }
};
