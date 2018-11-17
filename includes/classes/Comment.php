
<?php

class Comment
{
    private $con;

    function __construct($con)
    {

        $this->con = $con;
    }

    public function fetchComments($quoteId)
    {
        $sql = "SELECT comment.comment, users.firstName, users.lastname, comment.date, users.id
            FROM comment
                INNER JOIN users ON comment.user_id=users.id
                WHERE comment.quote_id='$quoteId' ORDER BY comment.date asc";

        $query = mysqli_query($this->con, $sql);
        return $query;
    }

    public function dateInt($dbDate)
    {
        // create a datetime interface from the database date
        $dbDate = date_create($dbDate);
        
        // get the current date
        $dateNow = date("Y:m:d H:i:s");
        $dateNow = date_create($dateNow);

        // get the interval betwwen the two dates
        $dateInterval = date_diff($dbDate, $dateNow, true);

        // check if the comment is more than a year
        if ($dateInterval->format("%Y") > 0) {
            $dtString = ($dateInterval->format("%Y") == 1 ? $dateInterval->format("%Y year ") : $dateInterval->format("%Y years "));
            return $dtString;
        
        // check in relation to months
        } elseif ($dateInterval->format("%m") > 0) {
            $dtString = ($dateInterval->format("%m") == 1 ? $dateInterval->format("%m month ") : $dateInterval->format("%m months "));
            return $dtString;

        // check in relation to days
        } elseif ($dateInterval->format("%d") > 0) {
            $dtString = ($dateInterval->format("%d") == 1 ? $dateInterval->format("%d day ") : $dateInterval->format("%d days "));
            return $dtString;

        // check in relation to hours
        } elseif ($dateInterval->format("%h") > 0) {
            $dtString = ($dateInterval->format("%h") == 1 ? $dateInterval->format("%h hour ") : $dateInterval->format("%h hours "));
            return $dtString;

        // check in relation to minutes
        } elseif ($dateInterval->format("%i") > 0) {
            $dtString = ($dateInterval->format("%i") == 1 ? $dateInterval->format("%i minute ") : $dateInterval->format("%i minutes "));
            return $dtString;

        // check seconds
        } elseif ($dateInterval->format("%s") > 0) {
            $dtString = ($dateInterval->format("%s") == 1 ? $dateInterval->format("%s second ") : $dateInterval->format("%s seconds "));
            return $dtString;
        }
    }





}
?>
