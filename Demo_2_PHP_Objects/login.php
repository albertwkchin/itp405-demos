<?php
    require_once __DIR__ . '/Auth.php';


    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $auth = new Auth();
        if ($auth->attempt($username, $password)) {
            header('Location: myaccount.php');
        } else {
            header('Location: login.php');
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title> Login </title>
</head>

<body>

<form action="login.php" method="post">
    Username: <input type ="text" name="username" value="student1">
    Password: <input type="password" name="password" value="laravel">

    <input type="submit" value="Login" name="submit">
</form>

</body>


</html>