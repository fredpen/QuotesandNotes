
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
                WHERE comment.quote_id='$quoteId' ORDER BY comment.date desc";

        $query = mysqli_query($this->con, $sql);
        // $query = mysqli_fetch_array($query);
        return $query;
    }







}
?>
