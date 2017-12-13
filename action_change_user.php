<?php
    include_once('html/includes/init.php');
    include_once('html/database/user.php');

        if (isPassCorrect(htmlentities($_POST['password'], ENT_QUOTES))) {
            updateName(htmlentities($_POST['name'], ENT_QUOTES));
        }
        header('Location: show_user.php');

?>
