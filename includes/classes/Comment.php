
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
        // $query = mysqli_fetch_array($query);
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
        return $dateInterval;
    }




}
?>
