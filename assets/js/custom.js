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
        // make an ajax call searching for the search string
        $.get("includes/handlers/ajax/searchQuote.php", { quote_string: quote_string }, function (data) {
            if (data) {
                // make the result container visible
                $(".searchResult").fadeIn("fast");
                // $("#searchResult").html(searchString);
                $("#searchResult").html(data);
            }
        })
    } else {
        $(".searchResult").fadeOut("slow");
    }
}




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
