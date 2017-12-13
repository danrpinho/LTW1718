<?php
    include_once('html/includes/init.php');
    include_once('html/database/user.php');
    if ($_SESSION['csrf'] !== $_POST['csrf']) {
        header('Location: index.php');
        die();
    }else{
        if (isPassCorrect($_POST['password'])) {
            updateName(htmlentities($_POST['name'], ENT_QUOTES));
        }
        header('Location: show_user.php');
    }
?>
