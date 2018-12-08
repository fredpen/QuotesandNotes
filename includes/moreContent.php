<script>
    function test() {
        quoteId = '<?php echo $row['id']; ?>';
        // check if there is a logged in user
        if (userId) {
            // make ajax call to test if user has liked quote before
            $.post("includes/handlers/ajax/loveQuote.php", { quoteId:quoteId, userId:userId }, function(data){

                if (data === "success") {
                    $(".<?php echo $row['id'] ?>quoteText").text("<?php echo $numberOfQuoteLover + 1 ?>");
                    // change the image to red and increase the number of likes
                    $(".<?php echo $row['id'] ?>.fas.fa-heart").removeClass("black").addClass("red");
                } else if (data === "failure") {
                console.log("cant like the quote at the moment");
                }else {
                console.log(data);
                }
            });
        } else {
            var notLoggedin = true;
            console.log("you need to log in to do that");
            }
    }
</script>






