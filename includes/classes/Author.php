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

      // validate character that has authors
      public function validChar()
      {
         $validCharac = array();
         $alpha =["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];

         foreach ($alpha as $key) {
           $query = $this->authorDetails($key);
           $query = mysqli_fetch_array($query);

           if (is_array($query)) { 
               array_push($validCharac, $key);
            }
         }
         return $validCharac;

      }



    }
  ?>

