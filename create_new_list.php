<?php
    include_once('html/includes/init.php');
    include_once('html/database/connection.php');
    include_once('html/templates/common/header.php');

    if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
        include_once('html/database/list.php');
        $expiringLists = getExpiringLists();
        include_once('html/templates/aside/sidebar.php');
        include_once('html/templates/lists/create_new_list.php');
    } else {
        include_once('html/templates/session/login.php');
    }

    include_once('html/templates/common/footer.php');
?>
