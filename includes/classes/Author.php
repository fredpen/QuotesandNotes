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
            return $query;

        }



    }
  ?>

