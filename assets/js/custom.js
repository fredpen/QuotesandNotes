// variables
var userId, firstname, lastname, username;

// function for fading out the errordiv
function fade_out() {
    $("#errorDiv").fadeOut("fast");
    $("#errorDiv").removeClass("class_flex");
}

// fading out the error div
function fade_in() {
    $("#errorDiv").css("display", "flex");
    $("#errorDiv").addClass("class_flex");
}

// alert users trying to share using whatsapp on desktop
function whats_app() {
    fade_in();
    $(".notifs_message").text('You can only share with whatsapp on mobile');
}

// search for quotes from the database based on user search term
function searchQuotes() {

    let quote_string = $("#seachQuotes").val();

    if (quote_string.length >= 2) {
        fade_in();
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
        $(".searchResult").fadeOut("fast");
        fade_out();
    }
}

// comment on a post
function post_comment(quoteId) {
    if (userId) {
        // get the details of the comment from the textarea
        var comment = $("#comment").val();
        if (comment.length == 0) {
            $("#comment").css("border-bottom", "1px solid red");
            fade_in();
            $(".notifs_message").text("Comment field cannot be empty");
        } else {
            // make ajax call to test if user has liked quote before
            $.post("includes/handlers/ajax/postComment.php", { quoteId: quoteId, userId: userId, comment: comment }, function (data) {
                // console.log(data);
                if (data) {
                    $("#commentSection").append(data);
                    fade_in();
                    $(".notifs_message").text("Your comment has been posted, thanks for sharing");
                    $("#comment").val("");
                }
            })
        }
    } else {
        fade_in();
        $(".notifs_message").html("You need to <a class='blue' href='signIn.php'> log in </a> to do that");
    }
}


// like quote
function likeQuote(quoteId, check, num) {

    if (userId) {

        if (check === true) {
            fade_in();
            $(".notifs_message").text(" You have liked this quote before");

        } else {

            // make ajax call to test if user has liked quote before
            $.post("includes/handlers/ajax/loveQuote.php", { quoteId: quoteId, userId: userId }, function (data) {
                if (data === "success") {
                    fade_in();
                    $(".notifs_message").html("Thanks for the love");
                    $("." + quoteId + "quoteText").text((num + 1) + " you liked this quote");
                    $("." + quoteId + ".fas.fa-heart").removeClass("black").addClass("red");

                } else if (data === "failure") {
                    fade_in();
                    $(".notifs_message").html(" server error");
                }
            });
        }

    } else {
        fade_in();
        $(".notifs_message").html("You need to <a class='blue' href='signIn.php'> log in </a> to do that");
    }
};



// like quote on the quote page
function likeSingleQuote(quoteId, check, num) {

    if (userId) {

        if (check === true) {
            fade_in();
            $(".notifs_message").html("You have liked this quote before");

        } else {

            // make ajax call to test if user has liked quote before
            $.post("includes/handlers/ajax/loveQuote.php", { quoteId: quoteId, userId: userId }, function (data) {
                if (data === "success") {
                    fade_in();
                    $(".notifs_message").html("Thanks for the love");
                    $("." + quoteId + "quoteText").html((num + 1));
                    $("." + quoteId + ".fas.fa-heart").removeClass("black").addClass("red");

                } else if (data === "failure") {
                    fade_in();
                    $(".notifs_message").html("server error");
                }
            });
        }

    } else {
        fade_in();
        $(".notifs_message").html("You need to <a class='blue' href='signIn.php'> log in </a> to do that");
    }
};

// function for validating emails
function ValidateEmail(anymail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(anymail)) {
        return (true)
    }
    return (false)
}


function mail_quote(author, quoteId) {
    let message = $("#quote_text").val();
    let email = $("#quote_mail").val();

    if (ValidateEmail(email)) {

        // make the ajax call
        $.post("includes/handlers/ajax/mail_quote_handler.php", { email: email, author: author, quoteId: quoteId, message: message }, function (data) {
            if (data) {
                alert("am back");

                console.log(data);

            }
        })

    } else {
        $(".mail_text").css("border-bottom", "1px solid red");
        fade_in();
        $(".notifs_message").text("You have entered an invalid email address !");
    }
}



$(document).ready(function () {

    // fadeout the search term and bar when it loses focus
    $(".frow").on("click", function () {
        $(".searchResult").fadeOut("fast");
    })

    // clear search term
    $("#clear").on("click", function () {
        $("#seachQuotes").val("");
        $(".searchResult").fadeOut("fast");
        $("#errorDiv").fadeOut("fast");
    })

    // clear message in the search field and fades out the error div
    $(".button_container").on("click", function () {
        fade_out();
    })

});
