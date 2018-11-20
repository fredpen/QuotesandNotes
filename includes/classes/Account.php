<?php
class Account
{

    private $conc;
    public $errorArray;
    public $id;

    function __construct($con)
    {
        $this->con = $con;
        $this->errorArray = array();
        $this->id;
    }

      // register users data
    public function register($firstName, $lastName, $username, $email, $confirmEmail, $password, $confirmPassword)
    {
        $this->validateFirstname($firstName);
        $this->validateLastname($lastName);
        $this->validateUsername($username);
        $this->validateEmail($email, $confirmEmail);
        $this->validatePassword($password, $confirmPassword);

        return (empty($this->errorArray) ? $this->insertUserDetails($firstName, $lastName, $username, $email, $password) : false);
    }

      // login user
    public function login($email, $password)
    {   
        // encrypt the password
        $encryptedPassword = md5($password);
        $stmt = $this->con->prepare("SELECT id FROM users WHERE pwd=? AND email=? OR username=? AND pwd=?");
        $stmt->bind_param("ssss", $encryptedPassword, $email, $email, $encryptedPassword);
        $stmt->execute();
        // check if there's a user with the credentails submitted
        $stmt->get_result();
        if ($stmt->affected_rows === 1) {
            return true;
        } else {
            array_push($this->errorArray, Constants::$loginFailed);
        }
    }

    // getting user insertUserDetails
    public function userDetails($email)
    {
        $sql = "SELECT * FROM users WHERE email='$email' OR username='$email' OR id='$email'";
        $query = mysqli_query($this->con, $sql);
        return mysqli_fetch_array($query);
    }

    public function errorLog()
    {
        return $this->errorArray;
    }

    // insert user details into the database
    private function insertUserDetails($firstName, $lastName, $username, $email, $password)
    {
        $encryptedPassword = md5($password);
        $date = date("Y-m-d h:i:s");
        $stmt = $this->con->prepare("INSERT INTO users VALUES(?, ?, ?, ?, ?, ?, '')");
        $stmt->bind_param("ssssss", $firstName, $lastName, $username, $email, $encryptedPassword, $date);
        $stmt->execute();
        return ($stmt->affected_rows === 1 ? true : false);
    }

    // validate user's firstname
    private function validateFirstname($firstName)
    {
        if (strlen($firstName) < 2 || strlen($firstName) > 25) return array_push($this->errorArray, Constants::$firstnameCharacter);
    }

    // validate user's lastname
    private function validateLastname($lastName)
    {
        if (strlen($lastName) < 2 || strlen($lastName) > 25) return array_push($this->errorArray, Constants::$lastnameCharacter);
    }

    // validate username
    private function validateUsername($username)
    {
        if (strlen($username) < 5 || strlen($username) > 25) return array_push($this->errorArray, Constants::$usernameCharacter);

        $query = mysqli_query($this->con, "SELECT username FROM users WHERE username ='$username'");
        if (mysqli_num_rows($query) > 0) return array_push($this->errorArray, Constants::$usernameAlreadyExists);
    }

      // validate user's password
    private function validatePassword($password, $confirmPassword)
    {
        if (strlen($password) < 5 || strlen($password) > 30) return array_push($this->errorArray, Constants::$passwordCharacter);

        if (preg_match('/[^A-Za-z0-9]/', $password)) return array_push($this->errorArray, Constants::$passwordInvalid);

        if ($password !== $confirmPassword) return array_push($this->errorArray, Constants::$passwordDonNotMatch);
    }

      // validate emails
    private function validateEmail($email, $confirmEmail)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return array_push($this->errorArray, Constants::$emailInvalid);

        if ($email !== $confirmEmail) return array_push($this->errorArray, Constants::$emailDoNotMatch);

        $stmt = $this->con->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->get_result();
        if ($stmt->affected_rows !== 0) return array_push($this->errorArray, Constants::$emailAlreadyExists);




        // $query = mysqli_query($this->con, "SELECT * FROM users WHERE email ='$email'");
        // if (mysqli_num_rows($query) > 0) {
        //     array_push($this->errorArray, Constants::$emailAlreadyExists);
        //     return;
        // }

        // if ($email != $confirmEmail) {
        //     array_push($this->errorArray, Constants::$emailDoNotMatch);
        //     return;
        // }
    }




}
/**end of class */


?>
