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

   
</script>
    
        




