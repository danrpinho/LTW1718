<?php
    include_once('html/includes/init.php');
    include_once('html/database/user.php');

        if (isPassCorrect($_POST['currentpassword'])) {
          if ($_POST['newpassword'] == $_POST['confirm']) {

            updatePass($_POST['newpassword']);
          }
        }
        header('Location: show_user.php');

?>
