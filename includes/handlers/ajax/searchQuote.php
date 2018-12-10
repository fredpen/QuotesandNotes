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
        $searchResults = array();
        while ($row = mysqli_fetch_array($query)) {
            array_push($searchResults, $row);
        }
        echo json_encode($searchResults);
    } else {
        echo "false";
    }
}
?>
