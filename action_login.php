<?php
    include_once('html/includes/init.php');
    include_once('html/database/user.php');

        if (isLoginCorrect($_POST['username'], $_POST['password'])) {
            setCurrentUser($_POST['username']);
        }
        header('Location: index.php');

?>
