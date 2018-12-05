<?php

/**
 * 
 */
class Author
{
    private $con;

    function __construct($con)
    {
        $this->con = $con;
    }

    public function authorDetails($char)
    {
        $sql = "SELECT * FROM author WHERE author LIKE '$char%'";
        $query = mysqli_query($this->con, $sql);
        $charArray = array();
        while ($row = mysqli_fetch_array($query)) {
            array_push($charArray, $row);
        }
        return $charArray;
    }

      // validate character that has authors
    public function validChar()
    {
        $validCharac = array();
        $alpha = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];

        foreach ($alpha as $char) {
            $sql = "SELECT * FROM author WHERE author LIKE '$char%'";
            $query = mysqli_query($this->con, $sql);
            if (mysqli_num_rows($query) !== 0) {
                array_push($validCharac, $char);
            }
        }
        return $validCharac;

    }



}
?>

