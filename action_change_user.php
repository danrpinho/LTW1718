<?php
    include_once('html/includes/init.php');
    include_once('html/database/user.php');

        if (isPassCorrect($_POST['password'])) {
            updateName($_POST['name']);
        }
        header('Location: show_user.php');

?>
