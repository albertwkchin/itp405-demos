<?php
    require_once __DIR__ . '/Database.php';

class Auth extends Database {

    public function __construct() {
        session_start();
        parent::__construct();
    }


    //login the user
    //create a session for that user
    public function attempt($user, $password)
    {
        $sql = "
            SELECT *
            FROM users
            WHERE username = ? AND password = SHA1(?)
            LIMIT 1
        ";

        $statement = static::$pdo->prepare($sql);
        $statement->bindParam(1, $user);
        $statement->bindParam(2, $password);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_OBJ);

        if ($user) {
           $_SESSION['user'] = $user;
           return true;
        }

        return false;
    }

    //return true or false if the user is logged in
    public function check()
    {
        if (isset($_SESSION['user'])) {
            return true;
        }

        return false;
    }

    //destroy the user's session
    public function logout()
    {
        session_destroy();
    }

    //return the current user's information
    public function getUser()
    {
        return $_SESSION['user'];
    }

}