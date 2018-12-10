<script>
    function likeQuote(quoteId) {
        if (userId) {
            // make ajax call to test if user has liked quote before
            $.post("includes/handlers/ajax/loveQuote.php", { quoteId:quoteId, userId:userId }, function(data){
                if (data === "success") {
                    console.log(data);
                    $("." + quoteId + "quoteText").text("<?php echo $numberOfQuoteLover + 1 ?> you liked this quote");
                    // change the image to red and increase the number of likes
                    $("." + quoteId + ".fas.fa-heart").removeClass("black").addClass("red");
                } else if (data === "failure") {
                    alert("cant like the quote at the moment");
                }else {
                    console.log(data);
                }
            });
        }
        
    };

    <?php if ($pageTitle === "Home") { ?>
    
        $("#seachQuotes").on("input", function () {
            // capture the value of the search string 
            var quote_string = $(this).val();
            // check if the search string is atleast 3 characters
            if (quote_string.length >= 2) {
                // make an ajax call searching for the search string
                $.get("includes/handlers/ajax/searchQuote.php", {quote_string: quote_string}, function(data) {
                if (data !== "false") {
                    // parse the data
                    data = JSON.parse(data);
                    
                    // loop and append the result to the result container
                    for (let index = 0; index < data.length; index++) {
                        content = (data[index].content);
                        genre1 = (data[index].genre1);
                        genre2 = (data[index].genre2);
                        genre3 = (data[index].genre3);
                        author = (data[index].author);
                        id = (data[index].id);
                        
                        console.log(content);
                        let searchString = `
                            <li class="list-group-item text-capitalise">
                                <a class="text-capitalise" href="quote.php?id=` + id +  `">` + content + `</a>
                            </li>`

                        // make the result container visible
                        $(".searchResult").fadeIn("slow");
                        $("#searchResult").append(searchString);
                    }
                    
                    } else {
                        console.log("we do not have any quote related to your search term at the moment, please check back later");
                        
                    }
                })
            }
        })
        <?php 
    }; ?>

</script>
    
        




