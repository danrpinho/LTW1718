<?php
    include_once('html/includes/init.php');
    include_once('html/database/connection.php');
    include_once('html/templates/common/header.php');
<<<<<<< HEAD
    if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
        include_once('html/database/list.php');
        $expiringLists = getExpiringItems();
        $expiredLists = getExpiredItems();
        include_once('html/templates/aside/sidebar.php');
        include_once('html/templates/session/change_pw.php');
    } else {
        include_once('html/templates/session/login.php');
    }
        include_once('html/templates/common/footer.php');
?>
=======
    include_once('html/database/list.php');
    $expiredLists = getExpiredItems();
    $expiringLists = getExpiringItems();
    include_once('html/templates/aside/sidebar.php');
    include_once('html/templates/session/change_pw.php');
    include_once('html/templates/common/footer.php');
?>
>>>>>>> d5f4094a32cc4d75cbd45e3a014c8dbca199f262
