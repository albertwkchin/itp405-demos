<?php

    require_once __DIR__ . '/Auth.php';

    $auth = new Auth();
    if (!$auth->check()) {
        header('Location: login.php');
    }

?>


<a href="logout.php">Logout</a>

<p>
    Email: <?php echo $auth->getUser()->email ?>
</p>

<p>
    Username: <?php echo $auth->getUser()->username ?>
</p>

