<?php
include_once('html/includes/init.php');
include_once('html/database/connection.php');
include_once ('html/templates/common/header.php');
        include_once('html/database/list.php');

        $expiringLists = getExpiringLists();

include_once('html/templates/aside/sidebar.php');
include_once ('html/templates/session/user_settings.php');
include_once ('html/templates/common/footer.php');
?>
