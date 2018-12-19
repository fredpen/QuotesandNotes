<?php
require_once '../../databaseConfig.php';

// / check if the quote, the author the genres and user id is passed
if (isset($_GET['quote_string'])) {

    $quote_string = $_GET['quote_string'];

    // sanitise the search string
    $quote_string = strip_tags($quote_string);
    $quote_string = str_replace(" ", "", $quote_string);

    // search for the string in the quotes table
    $sql = "SELECT * FROM quotes WHERE content LIKE '%$quote_string%'";
    $query = mysqli_query($con, $sql);
    
    // check if the search string has corresponding quote(s) in the database
    if (mysqli_num_rows($query) > 0) {
        // create a new array and push all search results into the array
        while ($row = mysqli_fetch_array($query)) {
            echo '<li class="list-group-item text-capitalise">
                        <a class="text-capitalise" href="quote.php?id=' . $row["id"] . '">' . $row["content"] . '</a>
                    </li>';
        }
    } else {
        echo '<li class="list-group-item text-capitalise">we do not have any quote related to your search term at the moment, please check back later</li>';
    }
}
?>
