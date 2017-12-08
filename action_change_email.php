<?php
    include_once('html/includes/init.php');
    include_once('html/database/user.php');

        if (isPassCorrect($_POST['password'])) {
            updateEmail($_POST['email']);
        }
        header('Location: show_user.php');

?>
